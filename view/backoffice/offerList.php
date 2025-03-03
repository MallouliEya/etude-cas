<?php
require_once('C:\xampp\htdocs\TravelBookingMVC\Controller\TravelOfferController.php');
$travelOfferC = new TravelOfferController();
$list = $travelOfferC->listOffre();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Liste des Offres de Voyage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 14px;
        }

        .btn-update {
            background-color: #007bff;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Liste des Offres de Voyage</h2>

        <?php
        require_once 'C:\xampp\htdocs\TravelBookingMVC\model\TravelOffer.php';

        if (!empty($list)) { // Vérifiez si la liste n'est pas vide
            echo "<table>";
            echo "<tr><th>Titre</th><th>Destination</th><th>Départ</th><th>Retour</th><th>Prix (€)</th><th>Catégorie</th><th>Actions</th></tr>";

            foreach ($list as $offer) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($offer['titre']) . "</td>";
                echo "<td>" . htmlspecialchars($offer['destination']) . "</td>";
                echo "<td>" . htmlspecialchars($offer['departureDate']) . "</td>";
                echo "<td>" . htmlspecialchars($offer['returnDate']) . "</td>";
                echo "<td>" . htmlspecialchars($offer['price']) . " €</td>";
                echo "<td>" . htmlspecialchars($offer['category']) . "</td>";
                echo "<td>";
                echo "<a href='updateOffer.php?id=" . urlencode($offer['id']) . "' class='btn btn-update'>Modifier</a> ";
                echo "<a href='deleteOffer.php?id=" . urlencode($offer['id']) . "' class='btn btn-delete'>Supprimer</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='text-align: center; color: red;'>Aucune offre disponible.</p>";
        }
        ?>
    </div>

</body>

</html>