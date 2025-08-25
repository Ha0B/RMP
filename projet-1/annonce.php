<?php
session_start();
include "include/navbar.php";

$PDO = new PDO('mysql:host=localhost;dbname=rmp','root','');

// Récupérer les filtres
$ville = isset($_GET['ville']) ? trim($_GET['ville']) : '';
$prixMax = isset($_GET['prix_max']) ? floatval($_GET['prix_max']) : null;
$personnesMax = isset($_GET['personnes_max']) ? intval($_GET['personnes_max']) : null;


$query = "SELECT * FROM annonce WHERE 1=1";
$params = [];

if (!empty($ville)) {
    $query .= " AND ville LIKE ?";
    $params[] = "%$ville%";
}
if (!empty($prixMax)) {
    $query .= " AND prix_par_personne <= ?";
    $params[] = $prixMax;
}
if (!empty($personnesMax)) {
    $query .= " AND nombre_personnes <= ?";
    $params[] = $personnesMax;
}

$query .= " ORDER BY date_disponibilite DESC";
$stmt = $PDO->prepare($query);
$stmt->execute($params);
$annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Annonces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4">Rechercher des Annonces</h2>


    <form method="get" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="ville" class="form-control" placeholder="Ville" value="<?= htmlspecialchars($ville) ?>">
        </div>
        <div class="col-md-3">
            <input type="number" step="0.1" name="prix_max" class="form-control" placeholder="Prix max (MAD)" value="<?= htmlspecialchars($prixMax) ?>">
        </div>
        <div class="col-md-3">
            <input type="number" name="personnes_max" class="form-control" placeholder="Places max" value="<?= htmlspecialchars($personnesMax) ?>">
        </div>
        <div class="col-md-2 d-grid">
            <button class="btn btn-primary" type="submit">Filtrer</button>
        </div>
    </form>

    <div class="row">
        <?php if (empty($annonces)): ?>
            <div class="col-12">
                <div class="alert alert-warning">Aucune annonce trouvée avec les critères donnés.</div>
            </div>
        <?php endif; ?>

        <?php foreach ($annonces as $annonce): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="upload/<?= htmlspecialchars($annonce['image']) ?>" class="card-img-top" alt="Image Annonce" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($annonce['titre']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars(substr($annonce['description'], 0, 100))) ?>...</p>
                        <ul class="list-unstyled">
                            <li><strong>Ville :</strong> <?= htmlspecialchars($annonce['ville']) ?></li>
                            <li><strong>Adresse :</strong> <?= htmlspecialchars($annonce['adresse']) ?></li>
                            <li><strong>Places dispo :</strong> <?= $annonce['nombre_personnes'] ?></li>
                            <li><strong>Prix/personne :</strong> <?= $annonce['prix_par_personne'] ?> MAD</li>
                            <li><strong>Date dispo :</strong> <?= $annonce['date_disponibilite'] ?></li>
                        </ul>
                        <a href="annonce-1.php?id=<?= $annonce['id_annonce'] ?>" class="btn btn-primary">Voir Annonce</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
