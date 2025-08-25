<?php 
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}
$connecte = isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']);
$role = $connecte ? $_SESSION['utilisateur']['role'] : null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Room & Mates</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm" style="background-color: #e3f2fd;" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Room & Mates</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/projet-1/index.php">Accueil</a>
        </li>

        <!-- Partie si pas connecte -->
        <?php if(!$connecte): ?>
          <li class="nav-item">
            <a class="nav-link" href="../Projet-1/annonce.php">Annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connection.php">Se Connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">S'inscrire</a>
          </li>
        <?php endif; ?>

        <!-- Partie Admin -->
        <?php if($connecte && $role === 'admin'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Gestion des utilisateurs</a>            
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/projet-1/admin/ListeUti.php">Liste des Utilisateurs</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Gestion des annonces
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/projet-1/admin/ListeAnnonce.php">Listes des annonces</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <!-- Partie Posteur -->
        <?php if($connecte && $role === 'posteur'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Annonces
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="annonces.php">Listes des Annonces</a></li>
              <li><a class="dropdown-item" href="ajouter_annonce.php">Ajouter une Annonce</a></li>
              <li><a class="dropdown-item" href="mes_annonces.php">Mes Annonces</a></li>
            </ul>
          </li>
        <?php endif; ?>         
      </ul>

      <!-- Profil utilisateur -->
      <?php if($connecte): ?>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <?= $_SESSION['utilisateur']['nom'] ?> <?= $_SESSION['utilisateur']['prenom'] ?> 
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/projet-1/profil.php">Mon Profil</a></li>
            <li><a class="dropdown-item" href="/Projet-1/logout.php">Se Déconnecter</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
