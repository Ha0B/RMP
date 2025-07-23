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
    include "include/navbar.php";
    ?>
    <div class="container my-3">
        <h2 class="m-0">Ajouter une Annonce :</h2>
        <form method="post">
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
                <label class="form-label">Prix par Perssone :</label>
                <input type="number" class="form-control" min="0" step="0.01" name="prix">
            </div>
            <div class="mb-3">
                <label class="form-label">Date de Disponibilite :</label>
                <input type="date" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Image :</label>
                <input type="file" class="form-control">
            </div>
            <label for="comment">Description :</label>
            <textarea class="form-control" rows="5" name="desc"></textarea>
            <button type="submit" class="btn btn-primary my-3">Ajouter</button>
        </form>
    </div>

</body>
</html>