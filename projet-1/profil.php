<?php
    include "include/navbar.php";
    require_once "include/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<?php
    $id = $_SESSION['utilisateur']['id_user'] ;
    $sqlstate = $PDO -> prepare('select * from utilisateur where id_user = ?');
    $sqlstate -> execute([$id]) ;
    $utilisateur = $sqlstate -> Fetch(PDO::FETCH_ASSOC);
?>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center bg-primary text-white rounded-top-4">
          <h4 class="mb-0">Mon Profil</h4>
        </div>
        <div class="card-body p-4">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($utilisateur['nom']) ?></li>
            <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($utilisateur['prenom']) ?></li>
            <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($utilisateur['email']) ?></li>
            <li class="list-group-item"><strong>Mot de passe :</strong> <?= htmlspecialchars($utilisateur['mot_de_passe']) ?></li>
            <li class="list-group-item"><strong>Téléphone :</strong> <?= htmlspecialchars($utilisateur['telephone']) ?></li>
            <li class="list-group-item"><strong>Date de naissance :</strong> <?= htmlspecialchars($utilisateur['date_naissance']) ?></li>
          </ul>
        </div>
        <div class="card-footer text-center bg-light rounded-bottom-4">
          <a href="ModifierProfil.php" class="btn btn-warning btn-sm">Modifier</a>
          <a href="logout.php" class="btn btn-danger btn-sm">Se Déconnecter</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>