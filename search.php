<?php
// search.php

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    
    // Tableau de mangas avec les images associées et les liens
    $mangas = [
        'Start Rising Dragon of today' => ['image' => 'Mangas/start.jpg', 'link' => 'Start_rising.php'],
        'One Piece' => ['image' => 'Mangas/one_piece.jpg', 'link' => 'one_piece.php'],
        'Dragon Ball' => ['image' => 'Mangas/dragon_ball.jpg', 'link' => 'dragon_ball.php'],
        'Attack on Titan' => ['image' => 'Mangas/attack_on_titan.jpg', 'link' => 'attack_on_titan.php'],
        'My Hero Academia' => ['image' => 'Mangas/my_hero_academia.jpg', 'link' => 'my_hero_academia.php'],
        'Death Note' => ['image' => 'Mangas/death_note.jpg', 'link' => 'death_note.php']
    ];

    // Filtrer les mangas selon la requête
    $results = array_filter($mangas, function($mangaName) use ($query) {
        return stripos($mangaName, $query) !== false; // Recherche insensible à la casse
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
        <link rel="icon" href="Mangas/start.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

    <!-- En-tête -->
    <header>
        <div class="chapter-list"><a href="index.html"><h1>LunoxScan</h1></a></div>
        
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
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
                        <a href='" . htmlspecialchars($data['link']) . "'>
                            <img src='" . htmlspecialchars($data['image']) . "' alt='" . htmlspecialchars($manga) . "'>
                            <p>" . htmlspecialchars($manga) . "</p>
                        </a>
                      </div>"; // Afficher les résultats
            }
        } else {
            echo "<p>Aucun résultat trouvé.</p>";
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 LunoxScan. Tous droits réservés.</p>
        <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>
    
    </body>
    </html>
    <?php
}
?>
