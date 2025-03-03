<?php
class TravelOffer
{
    private ?int $id;
    private string $titre;
    private string $destination;
    private DateTime $departureDate;
    private DateTime $returnDate;
    private float $price;
    private bool $disponible;
    private string $category;


    public function __construct(?int $id, string $titre, string $destination, DateTime $departureDate, DateTime $returnDate, float $price, bool $disponible, string $category)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->destination = $destination;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->price = $price;
        $this->disponible = $disponible;
        $this->category = $category;
    }

    public function show(): void
    {
        echo "<p><strong>ID :</strong> {$this->id}</p>";
        echo "<p><strong>Titre :</strong> {$this->titre}</p>";
        echo "<p><strong>Destination :</strong> {$this->destination}</p>";
        echo "<p><strong>Date de départ :</strong> {$this->departureDate}</p>";
        echo "<p><strong>Date de retour :</strong> {$this->returnDate}</p>";
        echo "<p><strong>Prix :</strong> {$this->price} €</p>";
        echo "<p><strong>Disponible :</strong> " . ($this->disponible ? 'Oui' : 'Non') . "</p>";
        echo "<p><strong>Catégorie :</strong> {$this->category}</p>";
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getDepartureDate(): DateTime
    {
        return $this->departureDate;
    }

    public function getReturnDate(): DateTime
    {
        return $this->returnDate;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    // Setters
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }

    public function setDepartureDate(string $departureDate): void
    {
        $this->departureDate = new DateTime($departureDate);
    }

    public function setReturnDate(string $returnDate): void
    {
        $this->returnDate = new DateTime($returnDate);
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setDisponible(bool $disponible): void
    {
        $this->disponible = $disponible;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
