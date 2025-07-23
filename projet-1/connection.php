<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php
    include "include/navbar.php";
    ?>
    <div class="container my-3">
        <?php
        if(isset($_POST['con'])){
            $email = $_POST['email'] ;
            $pwd = $_POST['pwd'] ;
            if( !empty($email) && !empty($pwd)){
                $PDO = new PDO('mysql:host=localhost;dbname=rmp','root','');
                $sqlstate = $PDO -> prepare('select * from utilisateur where email = ? and mot_de_passe = ?');
                $sqlstate -> execute([$email , $pwd]);
                if( $sqlstate -> rowCount() > 0 ){
                    session_start();
                    $_SESSION['utilisateur'] = $sqlstate->fetch();
                    header('location:index.php');
                }else{
                    ?>
                    <div class="alert alert-danger">
                        <strong>Email ou le mot de pass est incorect </strong>.
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-danger">
                    <strong>Tout les champ sont obligatoir !</strong>
                </div>
                <?php
            }
        }
        ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="m-0">Se Connecter</h2>
            <a href="inscription.php" class="btn btn-success btn-sm">S'inscrire</a>
        </div>
        <form class="formulaire2" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pwd">
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Se Connecter" name="con">
        </form>
    </div>
</body>
</html>

