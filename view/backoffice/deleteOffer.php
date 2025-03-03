<?php
require_once('C:\xampp\htdocs\TravelBookingMVC\Controller\TravelOfferController.php');
$travelOfferC = new TravelOfferController();
$travelOfferC->deleteOffer($_GET["id"]);
header('Location:offerList.php');
