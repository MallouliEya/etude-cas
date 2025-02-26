<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>

<body>

    <div class="container">
        <h2>Liste des Offres de Voyage</h2>

        <?php
        require_once 'C:\xampp\htdocs\TravelBookingMVC\model\TravelOffer.php';

        session_start();

        // Autoloading des classes
        spl_autoload_register(function ($class) {
            $file_path = 'C:\xampp\htdocs\TravelBookingMVC\model\\' . $class . '.php';
            if (file_exists($file_path)) {
                require_once $file_path;
            }
        });

        if (isset($_SESSION['offers']) && is_array($_SESSION['offers'])) {
            $offers = $_SESSION['offers'];

            echo "<table>";
            echo "<tr><th>Titre</th><th>Destination</th><th>Départ</th><th>Retour</th><th>Prix (€)</th><th>Catégorie</th></tr>";

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
            echo "<p style='text-align: center; color: red;'>Aucune offre disponible.</p>";
        }
        ?>
    </div>

</body>

</html>