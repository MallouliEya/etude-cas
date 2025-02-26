<?php
session_start(); // Démarrer la session

require_once('C:\xampp\htdocs\TravelBookingMVC\model\TravelOffer.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $title = htmlspecialchars($_POST["title"]);
    $destination = htmlspecialchars($_POST["destination"]);
    $departureDate = $_POST["departureDate"];
    $returnDate = $_POST["returnDate"];
    $price = floatval($_POST["price"]);
    $category = htmlspecialchars($_POST["category"]);

    // Validation
    if (empty($title) || empty($destination) || empty($departureDate) || empty($returnDate) || empty($price) || empty($category)) {
        die("❌ Erreur : Tous les champs sont obligatoires.");
    }

    if ($price < 0) {
        die("❌ Erreur : Le prix ne peut pas être négatif.");
    }

    if ($departureDate > $returnDate) {
        die("❌ Erreur : La date de retour doit être après la date de départ.");
    }

    // Création de l'offre
    $offre1 = new TravelOffer($title, $destination, $departureDate, $returnDate, $price, $category);

    // Stockage dans la session
    if (!isset($_SESSION['offers'])) {
        $_SESSION['offers'] = [];
    }
    $_SESSION['offers'][] = $offre1;

    // Redirection vers offerList.php
    header("Location: offerList.php");
    exit();
}
