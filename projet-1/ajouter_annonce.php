<?php
    session_start();
    include "include/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Room & Mates</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/ind-sty.css.css">
</head>
<body>
   <?php
        if (isset($_POST['ajouter'])){
            $uti = $_SESSION['utilisateur']['id_user'] ;
            $titre = htmlspecialchars($_POST['titre']) ;
            $ville  = htmlspecialchars($_POST['ville']) ;
            $adresse = htmlspecialchars($_POST['adresse']) ;
            $nbr = htmlspecialchars($_POST['nbr']) ;
            $prix = htmlspecialchars($_POST['prix']) ;
            $date = htmlspecialchars($_POST['date']) ;
            $desc = htmlspecialchars($_POST['desc']) ;
            $image = "";
            if (isset($_FILES['image'])){
                $image = $_FILES['image']['name'];
                $filename = uniqid().$image ;
                move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$filename);
            }
            if (!empty($filename) && !empty($desc) && !empty($prix) && !empty($date) && !empty($ville) && !empty($adresse) && !empty($nbr) && !empty($image)){
                $PDO = new PDO('mysql:host=localhost;dbname=rmp','root','');
                $sqlstate = $PDO -> prepare('insert into annonce values (null,?,?,?,?,?,?,?,?,?)');
                $sqlstate -> execute([$titre,$desc,$ville,$adresse,$nbr,$prix,$date,$uti,$filename]);
                ?>
                    <div class="alert alert-success">
                        <strong>Annonce a etait ajouter avec succes</strong>
                    </div>
                <?php
            }else{
                ?>
                   <div class="alert alert-danger">
                       <strong>Tout les champ sont obligatoir !</strong>
                   </div>
                <?php
            }
        }
   ?>
    <div class="container my-3">
        <h2 class="m-0">Ajouter une Annonce :</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label class="form-label">Titre : </label>
                <input type="text" class="form-control" name="titre">
            </div>
            <div class="mb-3">
                <label class="form-label">Ville :</label>
                <input type="text" class="form-control" name="ville">
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse :</label>
                <input type="text" class="form-control" name="adresse">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre de Personne :</label>
                <input type="number" class="form-control" min="0" name="nbr">
            </div>
            <div class="mb-3">
                <label class="form-label">Prix par Personne :</label>
                <input type="number" class="form-control" min="0" step="0.1" name="prix">
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'annonce :</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="mb-3">
                <label class="form-label">Image :</label>
                <input type="file" class="form-control" name="image" >
            </div>
            <label for="comment">Description :</label>
            <textarea class="form-control" rows="5" name="desc"></textarea>
            <input type="submit" class="btn btn-primary my-3" value="Ajouter" name="ajouter">
        </form>
    </div>

</body>
</html>