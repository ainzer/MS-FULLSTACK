<?php

class Employe
{
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
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    public function getFonction()
    {
        return $this->fonction;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function getService()
    {
        return $this->service;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }

    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    // Méthode pour afficher les informations de l'employé
    public function afficherInformations()
    {
        echo "Nom : " . $this->nom . "<br>";
        echo "Prénom : " . $this->prenom . "<br>";
        echo "Date d'embauche : " . $this->dateEmbauche . "<br>";
        echo "Fonction : " . $this->fonction . "<br>";
        echo "Salaire : " . $this->salaire . " K euros brut annuel<br>";
        echo "Service : " . $this->service . "<br>";
    }

    // Méthode pour calculer l'ancienneté
    public function calculerAnciennete()
    {
        $dateEmbauche = new DateTime($this->dateEmbauche);
        $aujourdHui = new DateTime();

        $difference = $aujourdHui->diff($dateEmbauche);

        return $difference->y;
    }

    // Méthode pour calculer le montant de la prime
    public function calculerPrime()
    {
        $prime = $this->salaire * 0.05;

        $prime += $this->salaire * 0.02 * $this->calculerAnciennete();

        return $prime;
    }

    // Méthode pour donner l'ordre de transfer à la banque
    public function donnerOrdreTransfert()
    {
        
        $prime = $this->calculerPrime();
        $dateDuJour = new DateTime();
        $dateVersement = new DateTime("2023-11-30");

        if ($dateDuJour >= $dateVersement)
        {
            echo "L'ordre de transfert de la prime de " . $this->nom . " " . $this->prenom . " a été envoyé à la banque. Montant : " . $prime . " euros.<br>";
        } else {
            echo "La prime de " . $this->nom . " " . $this->prenom . " sera versée le 30/11.<br>";
        }
    }
}

// Création des employés
$employe1 = new Employe("Doe", "John", "2022-01-23", "Responsable des Ventes", 50, "Commercial");
$employe2 = new Employe("Smith", "Alice", "2020-03-15", "Comptable", 60, "Comptabilité");
$employe3 = new Employe("Johnson", "Bob", "2019-07-10", "Commercial", 55, "Commercial");
$employe4 = new Employe("Williams", "Emma", "2018-05-02", "Chef de Projet", 70, "Informatique");
$employe5 = new Employe("Brown", "Charlie", "2017-09-28", "Assistant RH", 45, "Ressources Humaines");

/*// Utilisation des getters
echo "Nom de l'employé : " . $employe1->getNom() . "<br>";
echo "Prénom de l'employé : " . $employe1->getPrenom() . "<br>";
echo "Date d'embauche de l'employé : " . $employe1->getDateEmbauche() . "<br>";
echo "Fonction de l'employé : " . $employe1->getFonction() . "<br>";
echo "Salaire de l'employé : " . $employe1->getSalaire() . " K euros brut annuel<br>";
echo "Service de l'employé : " . $employe1->getService() . "<br>";*/

/*// Affichage de l'ancienneté de l'employé
echo "Ancienneté de l'emloyé : " . $employe1->calculerAnciennete() . " ans";*/

// Affichage du montant des primes de chaque employé
echo "Montant des prime :<br>";
echo $employe1->getNom() . " " . $employe1->getPrenom() . ": " . $employe1->calculerPrime() . " euros<br>";
echo $employe2->getNom() . " " . $employe2->getPrenom() . ": " . $employe2->calculerPrime() . " euros<br>";
echo $employe3->getNom() . " " . $employe3->getPrenom() . ": " . $employe3->calculerPrime() . " euros<br>";
echo $employe4->getNom() . " " . $employe4->getPrenom() . ": " . $employe4->calculerPrime() . " euros<br>";
echo $employe5->getNom() . " " . $employe5->getPrenom() . ": " . $employe5->calculerPrime() . " euros<br>";

// Test de l'ordre de transfert
echo "<br>Ordre de transfert :<br>";
$employe1->donnerOrdreTransfert();
$employe2->donnerOrdreTransfert();
$employe3->donnerOrdreTransfert();
$employe4->donnerOrdreTransfert();
$employe5->donnerOrdreTransfert();