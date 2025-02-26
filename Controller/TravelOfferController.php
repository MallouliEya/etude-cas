<?php
require_once('C:\xampp\htdocs\TravelBookingMVC\model\TravelOffer.php');

class TravelOfferController
{
    public function showTravelOffer(TravelOffer $offer): void
    {
        echo "<h2>Détails de l'offre :</h2>";
        $offer->show();
        echo "<hr>";
        echo "<h3>Debug (var_dump)</h3>";
        echo "<pre>";
        var_dump($offer);
        echo "</pre>";
    }
}
