<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style-insc.css">
</head>
<body>
    <?php
    include "include/navbar.php";
    ?>
    <div class="container my-3">
        <?php
            if(isset($_POST['insc'])){
                $nom = $_POST['nom'] ;
                $prenom = $_POST['prenom'] ;
                $email = $_POST['email'] ;
                $pwd = $_POST['pwd'] ;
                $tele = $_POST['phone'] ;
                $sexe = $_POST['sexe'] ;
                if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($pwd) && !empty($tele) && !empty($sexe)){
                    $PDO = new PDO("mysql:host=localhost;dbname=rmp", "root", "");
                    $sqlstate = $PDO -> prepare('insert into utilisateur values (null , ? , ? , ?, ?, ?, ?)');
                    $sqlstate -> execute([$nom,$prenom,$email,$pwd,$tele,$sexe]);
                    ?>
                    <div class="alert alert-success">
                        Bienvenue <?php echo" $nom $prenom " ;?> .
                    </div>
                    <?php
                        header('location:connection.php');
                }else{
                    ?>
                    <div class="alert alert-danger">
                        <strong>Tout les champ sont obligatoir !</strong>
                    </div>
                    <?php
                }
            }
        ?>
        <form method="post" >
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="m-0">S'inscrire</h2>
                <a href="connection.php" class="btn btn-success btn-sm">Se Connecter</a>
            </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nom" name="nom">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Mot de passe" name="pwd">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Numéro de Téléphone" maxlength="10" name="phone">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Sexe" name="sexe">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="S'inscrire" name="insc">
            </form>
        </div>
    </form>
</body>
</html>
