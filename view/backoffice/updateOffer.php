<?php
require_once('C:\xampp\htdocs\TravelBookingMVC\Controller\TravelOfferController.php');

$error = "";
$offer = null;
$offerController = new TravelOfferController();

if (
    isset($_POST["titre"], $_POST["destination"], $_POST["departureDate"], $_POST["returnDate"], $_POST["price"], $_POST["category"])
    && !empty($_POST["titre"]) && !empty($_POST["destination"]) && !empty($_POST["departureDate"]) && !empty($_POST["returnDate"]) && !empty($_POST["price"]) && !empty($_POST["category"])
) {
    $disponible = isset($_POST['disponible']) ? true : false;
    $offer = new TravelOffer(
        null,
        $_POST['titre'],
        $_POST['destination'],
        new DateTime($_POST['departureDate']),
        new DateTime($_POST['returnDate']),
        (float)$_POST['price'],
        $disponible,
        $_POST['category']
    );
    $offerController->updateOffer($offer, $_POST['id']);
    header('Location: offerList.php');
    exit();
} else {
    $error = "Informations manquantes.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une offre de voyage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #8cbfe0;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #34495e;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #1abc9c;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(135deg, #e0f2f7, #ffffff);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #34495E;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 15px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        footer {
            background-color: #34495e;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <nav>
        <img src="esprit.png" alt="esprit" width="100">
        <a href="index.php">Accueil</a>
        <a href="offerList.php">Voir les offres</a>
        <a href="contact.php">Contact</a>
        <a href="dashboard.php">Dashboard</a>
    </nav>

    <div class="container">
        <h2>Nouvelle offre de voyage</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="titre">Titre de l'offre :</label>
            <input type="text" id="titre" name="titre" required>

            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required>

            <label for="departureDate">Date de départ :</label>
            <input type="date" id="departureDate" name="departureDate" required>

            <label for="returnDate">Date de retour :</label>
            <input type="date" id="returnDate" name="returnDate" required>

            <label for="price">Prix (€) :</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="category">Catégorie :</label>
            <select id="category" name="category" required>
                <option value="Aventure">Aventure</option>
                <option value="Plage">Plage</option>
                <option value="Culture">Culture</option>
            </select>

            <label for="disponible">Disponibilité :</label>
            <select id="disponible" name="disponible" required>
                <option value="1">Disponible</option>
                <option value="0">Non disponible</option>
            </select>

            <button type="submit">Ajouter l'offre</button>
        </form>
    </div>

    <footer>
        <p>Copyright © Travel Booking 2024</p>
    </footer>
</body>

</html>