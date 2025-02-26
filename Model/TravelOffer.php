<?php
class TravelOffer
{
    private string $title;
    private string $destination;
    private string $departureDate;
    private string $returnDate;
    private float $price;
    private string $category;

    public function __construct(string $title, string $destination, string $departureDate, string $returnDate, float $price, string $category)
    {
        $this->title = $title;
        $this->destination = $destination;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->price = $price;
        $this->category = $category;
    }

    public function show(): void
    {
        echo "<p><strong>Titre :</strong> {$this->title}</p>";
        echo "<p><strong>Destination :</strong> {$this->destination}</p>";
        echo "<p><strong>Date de départ :</strong> {$this->departureDate}</p>";
        echo "<p><strong>Date de retour :</strong> {$this->returnDate}</p>";
        echo "<p><strong>Prix :</strong> {$this->price} €</p>";
        echo "<p><strong>Catégorie :</strong> {$this->category}</p>";
    }

    // Ajout des getters
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getDepartureDate(): string
    {
        return $this->departureDate;
    }

    public function getReturnDate(): string
    {
        return $this->returnDate;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}
