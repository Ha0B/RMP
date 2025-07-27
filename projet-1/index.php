<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Room & Mates – Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <?php include "include/navbar.php"; ?>

    <section class="bg-primary text-white text-center py-5">
        <div class="container text-center">
            <img src="upload\photo_acceuil.png" alt="Deux étudiants utilisant une plateforme de colocation" class="img-fluid rounded shadow mb-4" style="max-height: 530px; object-fit: cover;">

            <h1 class="display-5 fw-bold">Trouvez votre colocataire idéal</h1>
            <p class="lead mt-3">
                Bienvenue sur Room & Mates – la plateforme qui connecte les étudiants à la recherche d’une colocation parfaite.
            </p>
            <a href="annonce.php" class="btn btn-light btn-lg mt-4">
                Parcourir les annonces
            </a>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center mb-4">Recherche rapide</h2>
        <form method="get" action="annonce.php" class="row g-3 justify-content-center">
            <div class="col-md-3">
                <input type="text" name="ville" class="form-control" placeholder="Ville">
            </div>
            <div class="col-md-3">
                <input type="number" name="prix_max" class="form-control" placeholder="Prix max (MAD)">
            </div>
            <div class="col-md-3">
            <input type="number" name="personnes_max" class="form-control" placeholder="Places max">
        </div>
            <div class="col-md-2">
                <button class="btn btn-outline-primary w-100">Rechercher</button>
            </div>
        </form>
    </section>

    <section class="container my-5">
        <h2 class="text-center mb-4">Comment ça marche ?</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-search display-4 text-primary"></i>
                <h5 class="mt-3">Cherchez</h5>
                <p>Trouvez des annonces dans votre ville selon votre budget.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-pencil-square display-4 text-primary"></i>
                <h5 class="mt-3">Publiez</h5>
                <p>Proposez votre logement en quelques clics gratuitement.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-whatsapp display-4 text-primary"></i>
                <h5 class="mt-3">Contactez</h5>
                <p>Échangez directement avec les propriétaires via WhatsApp.</p>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5 ">
        <div class="container text-center">
            <p class="mb-0">© <?= date("Y") ?> Hassan & Yassine. Tous droits réservés.</p>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
