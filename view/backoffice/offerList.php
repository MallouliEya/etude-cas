<?php
session_start(); // Démarrer la session

// Autoloading
spl_autoload_register(function ($TravelOffer) {
    $file_path = 'C:\xampp\htdocs\TravelBookingMVC\model' . $TravelOffer . '.php';
    if (file_exists($file_path)) {
        require_once $file_path;
    }
});

echo "<pre>";
var_dump($_SESSION['offers']);
echo "</pre>";

if (isset($_SESSION['offers'])) {
    $offers = $_SESSION['offers'];
    echo "<h2>Liste des offres :</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Titre</th><th>Destination</th><th>Départ</th><th>Retour</th><th>Prix</th><th>Catégorie</th></tr>";
    foreach ($offers as $offer) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($offer->getTitle()) . "</td>";
        echo "<td>" . htmlspecialchars($offer->getDestination()) . "</td>";
        echo "<td>" . htmlspecialchars($offer->getDepartureDate()) . "</td>";
        echo "<td>" . htmlspecialchars($offer->getReturnDate()) . "</td>";
        echo "<td>" . htmlspecialchars($offer->getPrice()) . " €</td>";
        echo "<td>" . htmlspecialchars($offer->getCategory()) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Aucune offre disponible.</p>";
}
