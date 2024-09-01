<?php
// read.php

if (isset($_GET['manga'])) {
    $manga = $_GET['manga'];
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lire <?php echo htmlspecialchars($manga); ?></title>
        <link rel="stylesheet" href="styles.css"> <!-- Lien vers le CSS -->
    </head>
    <body>

    <!-- En-tête -->
    <header>
        <h1>Site de Manga</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="about.php">À Propos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="reading-container">
        <h1>Lecture de <?php echo htmlspecialchars($manga); ?></h1>
        <p>Contenu de <?php echo htmlspecialchars($manga); ?>...</p>
        <!-- Ici, tu peux ajouter le contenu du manga ou une image par exemple -->
    </div>

    </body>
    </html>
    <?php
} else {
    echo "<p>Aucun manga sélectionné.</p>";
}
?>
