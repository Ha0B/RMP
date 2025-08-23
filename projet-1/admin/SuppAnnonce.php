<?php
    require_once "../include/DB.php" ;
    $id = $_GET['id'];

    if(isset($_POST['supprimer'])){
    $id = $_POST['id_annonce'];
    $sqldelete = $PDO -> prepare('delete from annonce where id = ? ');
    $sqldelete -> execute([$id]);
    header("location:ListeAnnonce.php");
    exit();
}
?>