<?php
require_once('C:\xampp\htdocs\TravelBookingMVC\config.php');
require_once('C:\xampp\htdocs\TravelBookingMVC\model\TravelOffer.php');

class TravelOfferController
{
    public function listOffre()
    {
        $sql = "SELECT * FROM traveloffer";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function deleteOffer($id)
    {
        $sql = "DELETE FROM traveloffer WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addOffer($offer)
    {
        var_dump($offer);
        $sql = "INSERT INTO traveloffer  
        VALUES (NULL, :titre, :destination, :departureDate, :return_date, :price, :disponible, :category)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $offer->getTitre(),  // Correction : correspondance avec la requête SQL
                'destination' => $offer->getDestination(),
                'departureDate' => $offer->getDepartureDate()->format('Y-m-d'),
                'return_date' => $offer->getReturnDate()->format('Y-m-d'),
                'price' => (float)$offer->getPrice(), // Cast en float pour éviter les erreurs SQL
                'disponible' => $offer->isDisponible() ? 1 : 0,
                'category' => $offer->getCategory()
            ]);
        } catch (PDOException $e) {  // Interception spécifique des erreurs SQL
            echo 'Erreur SQL : ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    function updateOffer($offer, $id)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE traveloffer SET 
                    title = :titre,
                    destination = :destination,
                    departureDate = :departureDate,
                    returnDate = :returnDate,
                    price = :price,
                    disponible = :disponible,
                    category = :category
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'title' => $offer->getTitle(),
                'destination' => $offer->getDestination(),
                'departureDate' => $offer->getDepartureDate()->format('Y-m-d'),
                'returnDate' => $offer->getReturnDate()->format('Y-m-d'),
                'price' => $offer->getPrice(),
                'disponible' => $offer->isDisponible() ? 1 : 0,
                'category' => $offer->getCategory()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function showOffer($id)
    {
        $sql = "SELECT * from traveloffer where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $offer = $query->fetch();
            return $offer;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
