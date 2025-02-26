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
            color: #2c3e50;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #34495e;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Ajouter une offre de voyage</h2>
        <form id="offerForm" action="Verification.php" method="POST">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>

            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required>

            <label for="departureDate">Date de départ :</label>
            <input type="date" id="departureDate" name="departureDate" required>

            <label for="returnDate">Date de retour :</label>
            <input type="date" id="returnDate" name="returnDate" required>

            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" required min="0">

            <label for="category">Catégorie :</label>
            <select id="category" name="category">
                <option value="Adventure">Aventure</option>
                <option value="Relaxation">Détente</option>
                <option value="Cultural">Culturel</option>
            </select>

            <button type="submit">Ajouter l'offre</button>
        </form>
    </div>

</body>

</html>