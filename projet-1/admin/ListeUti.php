<?php
    include "../include/navbar.php";
    require_once "../include/DB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    $Utilisateurs = $PDO -> query('Select * from utilisateur ')->FetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container mt-3">
        <h2>Liste des Utilisateurs </h2>
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Mot de Pass</th>
                <th>Telephone</th>
                <th>Sexe</th>
                <th>Date de creation du compte</th>
                <th>Date de Naissance</th>
                <th>Role</th>
                <th>Modification</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach( $Utilisateurs as $utilisateur ){ ?>
                <tr>
                    <td><?= $utilisateur['id_user'] ?></td>
                    <td><?= $utilisateur['nom'] ?></td>
                    <td><?= $utilisateur['prenom'] ?></td>
                    <td><?= $utilisateur['email'] ?></td>
                    <td><?= $utilisateur['mot_de_passe'] ?></td>
                    <td><?= $utilisateur['telephone'] ?></td>
                    <td><?= $utilisateur['sexe'] ?></td>
                    <td><?= $utilisateur['date_creation'] ?></td>
                    <td><?= $utilisateur['date_naissance'] ?></td>
                    <td><?= $utilisateur['role'] ?></td>
                    <td>
                        <form method="post">
                            <a href="ModiCompte.php?id=<?= $utilisateur['id_user'] ?>" class="btn btn-outline-warning btn-sm">Modifier</a>
                        </form>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        
    </div>
</body>
</html>