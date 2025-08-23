<?php
session_start();
include "include/navbar.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger m-4'>ID d'annonce invalide.</div>";
    exit;
}

$id = intval($_GET['id']);

try {
    $PDO = new PDO('mysql:host=localhost;dbname=rmp', 'root', '');
    $stmt = $PDO->prepare("
        SELECT a.*, u.telephone 
        FROM annonce a 
        JOIN utilisateur u ON a.id_user = u.id_user 
        WHERE a.id_annonce = ?
    ");
    $stmt->execute([$id]);
    $annonce = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$annonce) {
        echo "<div class='alert alert-warning m-4'>Annonce introuvable.</div>";
        exit;
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger m-4'>Erreur de connexion : " . $e->getMessage() . "</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($annonce['titre']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="card">
        <img src="upload/<?= htmlspecialchars($annonce['image']) ?>" class="card-img-top" alt="Image de l'annonce" style="max-height: 400px; object-fit: cover;">
        <div class="card-body">
            <h2 class="card-title"><?= htmlspecialchars($annonce['titre']) ?></h2>
            <p class="card-text"><?= nl2br(htmlspecialchars($annonce['description'])) ?></p>

            <ul class="list-group list-group-flush mt-4">
                <li class="list-group-item"><strong>Ville :</strong> <?= htmlspecialchars($annonce['ville']) ?></li>
                <li class="list-group-item"><strong>Adresse :</strong> <?= htmlspecialchars($annonce['adresse']) ?></li>
                <li class="list-group-item"><strong>Nombre de personnes :</strong> <?= $annonce['nombre_personnes'] ?></li>
                <li class="list-group-item"><strong>Prix par personne :</strong> <?= $annonce['prix_par_personne'] ?> MAD</li>
                <li class="list-group-item"><strong>Date de disponibilité :</strong> <?= $annonce['date_disponibilite'] ?></li>
            </ul>
            <?php if (!empty($annonce['telephone'])): ?>
            <div class="text-center mt-4">
                <a href="https://wa.me/212<?= substr(preg_replace('/[^0-9]/', '', $annonce['telephone']), 1) ?>"
                 class="btn btn-success btn-lg" target="_blank">
                💬 Contacter sur WhatsApp
                </a>
            </div>
<?php endif; ?>

            <a href="annonce.php" class="btn btn-secondary mt-4">← Retour</a>
        </div>
    </div>
</div>
</body>
</html>
