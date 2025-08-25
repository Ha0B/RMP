<?php
include "../include/navbar.php";
require_once "../include/DB.php";

$id = $_GET['id'];

if ($id) {
    $sqlstate = $PDO->prepare('SELECT * FROM utilisateur WHERE id_user = ?');
    $sqlstate->execute([$id]);
    $utilisateur = $sqlstate->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $tele = $_POST['tele'];
    $sexe = $_POST['sexe'];
    $dn = $_POST['dn'];
    $role = $_POST['role'];

    $sqlupdate = $PDO->prepare('UPDATE utilisateur 
                                SET nom = ?, 
                                    prenom = ?, 
                                    email = ?, 
                                    mot_de_passe = ?, 
                                    telephone = ?, 
                                    sexe = ?, 
                                    date_naissance = ?, 
                                    role = ?  
                                WHERE id_user = ?');
    $sqlupdate->execute([$nom, $prenom, $email, $mdp, $tele, $sexe, $dn, $role, $id]);

    header("Location: ListeUti.php");
    exit();
}
if (isset($_POST['supprimer'])){
    $sqldelete = $PDO -> prepare('delete from utilisateur where id_user =?  ');
    $sqldelete -> execute([$id]);
    header("Location: ListeUti.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Comptes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form method="post" class="container mt-4 p-4 border rounded shadow-sm bg-light">
    <h3 class="mb-4">Modifier le compte</h3>

    <input type="hidden" name="id_user" value="<?= $utilisateur['id_user'] ?>">

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="<?= $utilisateur['nom'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?= $utilisateur['prenom'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $utilisateur['email'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de Passe</label>
        <input type="text" class="form-control" name="mdp" value="<?= $utilisateur['mot_de_passe'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Telephone</label>
        <input type="tel" class="form-control" name="tele" value="<?= $utilisateur['telephone'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Sexe</label>
        <select class="form-select" name="sexe">
            <option value="Homme" <?= ($utilisateur['sexe'] === "Homme") ? "selected" : "" ?>>Homme</option>
            <option value="Femme" <?= ($utilisateur['sexe'] === "Femme") ? "selected" : "" ?>>Femme</option>
        </select>        
    </div>
    <div class="mb-3">
        <label class="form-label">Date Naissance</label>
        <input type="date" class="form-control" name="dn" value="<?= $utilisateur['date_naissance'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label>
        <select class="form-select" name="role">
            <option value="admin" <?= ($utilisateur['role'] === "admin") ? "selected" : "" ?>>Admin</option>
            <option value="utilisateur" <?= ($utilisateur['role'] === "visiteur") ? "selected" : "" ?>>Utilisateur</option>
            <option value="posteur" <?= ($utilisateur['role'] === "posteur") ? "selected" : "" ?>>Posteur</option>
        </select>        
    </div>
    <input type="submit" value="Modifier" name="modifier" class="btn btn-outline-warning">
    <input type="submit" value="Supprimer" name="supprimer" class="btn btn-outline-danger">
</form>
</body>
</html>
