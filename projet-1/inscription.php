<?php
    include "include/navbar.php";
    require_once "include/DB.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire d'inscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php 
    if(isset($_POST['inscription'])){
      $nom = $_POST['nom'] ;
      $prenom = $_POST['prenom'] ;
      $email = $_POST['email'] ;
      $pwd = $_POST['pwd'] ;
      $tele = $_POST['tele'] ;
      $naissance = $_POST['naissance'] ;
      $sexe = $_POST['sexe'] ;
      if( !empty($nom) && !empty($prenom) && !empty($email) && !empty($pwd) && !empty($tele) && !empty($naissance) && !empty($sexe) ){
        $sqlState = $PDO -> prepare('insert into utilisateur values (null,?,?,?,?,?,?,null,?,null)');
        $sqlState -> execute([$nom , $prenom , $email , $pwd , $tele , $naissance , $sexe ]);
        header('location:connection.php');
      }else{
        ?>
          <div class="alert alert-danger">
            Tous les champ sont obligatoir ! 
          </div>
        <?php
      }
    }
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card shadow rounded-4 p-4">
        <h3 class="text-center mb-4">Inscription</h3>
        <form method="post">
          <!-- Nom -->
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
          </div>

          <!-- Prenom -->
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <!-- Mot de passe -->
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="pwd" class="form-control" required minlength="6" maxlength="14">
          </div>

          <!-- Tele -->
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="tel" name="tele" class="form-control" placeholder="+2126000000" required>
          </div>

          <!-- Date de naissance -->
          <div class="mb-3">
            <label class="form-label">Date de naissance</label>
            <input type="date" name="naissance" class="form-control" required>
          </div>

          <!-- Sexe -->
          <div class="mb-4">
            <label class="form-label d-block">Sexe</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sexe" id="sexeH" value="Homme" required>
              <label class="form-check-label" for="sexeH">Homme</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sexe" id="sexeF" value="Femme">
              <label class="form-check-label" for="sexeF">Femme</label>
            </div>
          </div>

          <input type="submit" class="btn btn-primary w-100" name="inscription" value="S'inscrire">
            <p class="text-center mt-3 mb-0">
             Vous avez un compte ? <a href="connection.php">Se Connecter</a>
            </p>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>