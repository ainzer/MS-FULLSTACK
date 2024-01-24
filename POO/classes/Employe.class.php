<?php

class Employe
{
    private $nom;
    private $prenom;
    private $dateEmbauche;
    private $fonction;
    private $salaire;
    private $service;

     // Constructeur
    public function __construct($nom = "", $prenom = "", $dateEmbauche = "", $fonction = "", $salaire = "", $service = "") {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateEmbauche = $dateEmbauche;
        $this->fonction = $fonction;
        $this->salaire = $salaire;
        $this->service = $service;
    }

    // Getters
}