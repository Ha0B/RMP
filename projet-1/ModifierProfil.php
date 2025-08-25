<?php
    include "include/navbar.php";
    require_once "include/DB.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    $id = $_SESSION['utilisateur']['id_user'] ;
    $sqlstate = $PDO -> prepare('select * from utilisateur where id_user = ?');
    $sqlstate -> execute([$id]) ;
    $utilisateur = $sqlstate -> Fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['modifier'])){
        $nom = $_POST['nom'] ;
        $prenom = $_POST['prenom'] ;
        $mdp = $_POST['mdp'] ;
        $tele = $_POST['tele'] ;
        $dateNaiss = $_POST['dateNai'] ;
        $sqlupdate = $PDO -> prepare('update utilisateur set nom = ? , prenom = ? , mot_de_passe = ? , telephone = ? , date_naissance = ?  where id_user = ? ');
        $sqlupdate -> execute([$nom , $prenom , $mdp , $tele , $dateNaiss , $id ]) ;
    }
?>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center bg-warning text-dark rounded-top-4">
          <h4 class="mb-0">Modifier mon profil</h4>
        </div>
        <div class="card-body p-4">
          <form method="post">
            <div class="mb-3">
              <label class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($utilisateur['nom']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Prénom</label>
              <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($utilisateur['prenom']) ?>" >
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($utilisateur['email']) ?>" >
            </div>
            <div class="mb-3">
              <label class="form-label">Téléphone</label>
              <input type="text" name="tele" class="form-control" value="<?= htmlspecialchars($utilisateur['telephone']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Date de naissance</label>
              <input type="date" name="dateNai" class="form-control" value="<?= htmlspecialchars($utilisateur['date_naissance']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Nouveau mot de passe (laisser vide si inchangé)</label>
              <input type="password" name="mdp" class="form-control">
            </div>
            <div class="d-flex justify-content-between">
              <a href="profil.php" class="btn btn-secondary">Annuler</a>
              <input type="submit" name="modifier" class="btn btn-success" value="Enregistrer" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>