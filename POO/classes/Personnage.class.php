<?php

class Personnage
{
    private $nom;
    private $prenom;
    private $age;
    private $sexe;

    public function __construct($nom = "", $prenom = "", $age = 0, $sexe = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->sexe = $sexe;
    }

    // Getters
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    // Setters
    public function setNom($nouveauNom)
    {
        $this->nom = $nouveauNom;
    }

    public function setPrenom($nouveauPrenom)
    {
        $this->prenom = $nouveauPrenom;
    }

    public function setAge($nouvelAge)
    {
        $this->age = $nouvelAge;
    }

    public function setSexe($nouveauSexe)
    {
        $this->sexe = $nouveauSexe;
    }

    // Méthode magique pour afficher le personnage
    public function __toString()
    {
        return "Nom: " . $this->nom . "\n" .
            "Prenom: " . $this->prenom . "\n" .
            "Age: " . $this->age . "\n" .
            "Sexe: " . $this->sexe . "\n";
    }
}