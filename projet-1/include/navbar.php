<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$connecte = isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']);
?>
<nav class="navbar navbar-expand-sm" style="background-color: #e3f2fd;" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Room & Mates</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="annonce.php">Annonce</a>
                </li>
                <?php if ($connecte): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouter_annonce.php">Ajouter une Annonce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" >Se Déconnecter</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">👤 <?= htmlspecialchars($_SESSION['utilisateur']['nom']) ?>
                        <?= htmlspecialchars($_SESSION['utilisateur']['prenom']) ?></span>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connection.php">Se Connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">S'inscrire</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
