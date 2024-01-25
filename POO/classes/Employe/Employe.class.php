<?php

class Employe {

    // Propriétés
    private $nom;
    private $prenom;
    private $dateEmbauche;
    private $fonction;
    private $salaire;
    private $service;

    // Constructeur
    public function __construct($nom, $prenom, $dateEmbauche, $fonction, $salaire, $service)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateEmbauche = $dateEmbauche;
        $this->fonction = $fonction;
        $this->salaire = $salaire;
        $this->service = $service;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateEmbauche() {
        return $this->dateEmbauche;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function getService() {
        return $this->service;
    }

    // Setters
    public function setSalaire($nouveauSalaire) {
        $this->salaire = $nouveauSalaire;
    }

    // Méthode pour afficher les détails de l'emplyé
    public function afficherDetails() {
        echo "Nom : " . $this->getNom() . "<br>";
        echo "Prénom : " . $this->getPrenom() . "<br>";
        echo "Date d'embauche : " . $this->getDateEmbauche() . "<br>";
        echo "Fonction : " . $this->getFonction() . "<br>";
        echo "Salaire : " . $this->getSalaire() . " K euros brut annuel<br>";
        echo "Service : " . $this->getService() . "<br>";
    }
}

// Exemple d'utilisation de la classe Employe
$employe1 = new Employe("Doe", "John", "2022-01-01", "Développeur", 50, "Informatique");

// Afficher les détails après modification
$employe1->afficherDetails();