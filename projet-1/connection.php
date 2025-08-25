<?php
  include "include/navbar.php";
  require_once "include/DB.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php
  if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    if( !empty($email) && !empty($pwd) ){
      $sqlState = $PDO -> prepare('select * from utilisateur where email = ? and mot_de_passe = ? ');
      $sqlState -> execute([ $email , $pwd ]);
      $dispo = $sqlState -> rowCount() ;
      if( $dispo >= 1 ){
        session_start() ;
        $_SESSION['utilisateur'] = $sqlState -> fetch() ;
        header('location:index.php') ;
      }else{
        ?>
          <div class="alert alert-danger container my-5">
            Login ou Mot de Passe incorrect !
          </div>
        <?php
      }
    }else{
        ?>
          <div class="alert alert-danger container my-5">
            Tous les champ sont obligatoir ! 
          </div>
        <?php
      }
  }
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
      <div class="card shadow rounded-4 p-4">
        <h3 class="text-center mb-4">Connexion</h3>

        <form method="post">
          <!-- Email -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="exemple@mail.com" >
          </div>

          <!-- Mot de passe -->
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="pwd" class="form-control" placeholder="********" >
          </div>

          <input type="submit" class="btn btn-primary w-100" name="connexion" value="Se connecter">
        </form>

        <p class="text-center mt-3 mb-0">
          Pas encore de compte ? <a href="inscription.php">S'inscrire</a>
        </p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
