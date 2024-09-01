<?php
// search.php

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    
    // Tableau de mangas avec les images associées et les liens
    $mangas = [
        'Start Rising Dragon of today' => ['image' => 'Mangas/start_rising.jpg', 'link' => 'Start_rising.php'],
        'One Piece' => ['image' => 'one_piece.jpg', 'link' => 'one_piece.php'],
        'Dragon Ball' => ['image' => 'dragon_ball.jpg', 'link' => 'dragon_ball.php'],
        'Attack on Titan' => ['image' => 'attack_on_titan.jpg', 'link' => 'attack_on_titan.php'],
        'My Hero Academia' => ['image' => 'my_hero_academia.jpg', 'link' => 'my_hero_academia.php'],
        'Death Note' => ['image' => 'death_note.jpg', 'link' => 'death_note.php']
    ];

    // Filtrer les mangas selon la requête
    $results = array_filter($mangas, function($manga) use ($query) {
        return stripos($manga, $query) !== false; // Recherche insensible à la casse
    }, ARRAY_FILTER_USE_KEY);

    // Affichage des résultats
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Résultats de la recherche</title>
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

    <div class="results-container">
        <h1>Résultats de la recherche pour : "<?php echo htmlspecialchars($query); ?>"</h1>

        <?php
        if (count($results) > 0) {
            foreach ($results as $manga => $data) {
                // Créer un lien pour chaque manga avec une image
                echo "<div class='result-item'>
                        <a href='" . $data['link'] . "'>
                            <img src='images/" . $data['image'] . "' alt='" . htmlspecialchars($manga) . "'>
                            <p>$manga</p>
                        </a>
                      </div>"; // Afficher les résultats
            }
        } else {
            echo "<p>Aucun résultat trouvé.</p>";
        }
        ?>
    </div>

    </body>
    </html>
    <?php
}
?>
