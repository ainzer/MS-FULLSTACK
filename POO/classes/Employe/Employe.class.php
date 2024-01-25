<?php

class Magasin {
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;

    public function __construct($nom, $adresse, $codePostal, $ville)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
    }

    // Ajouter des getters si nécessaire
    public function getNom() {
        return $this->nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getVille() {
        return $this->ville;
    }
}






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
    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function setPrenom($nouveauPrenom) {
        $this->prenom = $nouveauPrenom;
    }

    public function setDateEmbauche($nouvelleDateEmbauche) {
        $this->dateEmbauche = $nouvelleDateEmbauche;
    }

    public function setFonction($nouvelleFonction) {
        $this->fonction = $nouvelleFonction;
    }

    public function setSalaire($nouveauSalaire) {
        $this->salaire = $nouveauSalaire;
    }

    public function setService($nouveauService) {
        $this->service = $nouveauService;
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

    // Méthode pour calculer le nombre d'années dans l'entreprise
    public function anneesDansEntreprise() {
        // Convertir la date d'embauche en objet DateTime
        $dateEmbauche = new DateTime($this->dateEmbauche);

        // Obtenir la date actuelle
        $dateActuelle = new DateTime();

        // Calculer la différence en années
        $difference = $dateEmbauche->diff($dateActuelle);

        // Retourner le nombre d'années
        return $difference->y;
    }

    // Méthode pour calculer la prime
    public function calculerPrime() {
        // Calculer la prime basée sur le salaire annuel
        $primeSalaire = 0.05 * $this->salaire;

        // Calculer la prime basée sur l'ancienneté
        $primeAnciennete = 0.02 * $this->salaire * $this->anneesDansEntreprise();

        // Retourner le montant total de la prime
        return $primeSalaire + $primeAnciennete;
    }

    // Méthode pour générer l'ordre de transfer à la banque
    public function ordreTransfertPrime() {
        // Utiliser une date fixe (30/11) pour la simulation
        $dateActuelle = new DateTime(2024-11-30);

        // Vérifier si c'est le 30/11
        if ($dateActuelle->format('d-m') === '30-11') {
            // Calculer la prime
            $montantPrime = $this->calculerPrime();

            // Générer et retourner le message d'odre de transfert
            return "Odre de transfert de la prime de " . $montantPrime . " euros envoyé à la banque pour l'employé " . $this->nom . " " . $this->prenom;
        } else {
            // Si ce n'est pas le 30/11, retourner un message indiquant que la prime n'est pas encore due
            return "La prime n'est pas encore due.";
        }
    }
}

// Création d'objets Employe
$employe1 = new Employe("Doe", "John", "2010-01-01", "Développeur", 50, "Informatique");
$employe2 = new Employe("Smith", "Alice", "2015-03-15", "Comptable", 60, "Comptabilité");
$employe3 = new Employe("Johnson", "Bob", "2018-07-20", "Commercial", 70, "Ventes");
$employe4 = new Employe("Williams", "Emma", "2012-11-10", "Chef de projet", 65, "Informatique");
$employe5 = new Employe("Brown", "Charlie", "2016-06-05", "Assistant RH", 55, "Ressources Humaines");

// Changer la date actuelle pour la simulation
date_default_timezone_set('Europe/Paris'); // Définir le fuseau horaire si nécessaire
$newDate = strtotime('2024-11-30'); // Changer la date selon vos besoins
date_modify(new DateTime(), date("Y-m-d H:i:s", $newDate));


// Affichage du montant des primes pour chaque employé
echo "Prime pour " . $employe1->getNom() . " " . $employe1->getPrenom() . ": " . $employe1->calculerPrime() . " euros<br>";
echo "Prime pour " . $employe2->getNom() . " " . $employe2->getPrenom() . ": " . $employe2->calculerPrime() . " euros<br>";
echo "Prime pour " . $employe3->getNom() . " " . $employe3->getPrenom() . ": " . $employe3->calculerPrime() . " euros<br>";
echo "Prime pour " . $employe4->getNom() . " " . $employe4->getPrenom() . ": " . $employe4->calculerPrime() . " euros<br>";
echo "Prime pour " . $employe5->getNom() . " " . $employe5->getPrenom() . ": " . $employe5->calculerPrime() . " euros<br>";

// Affichage du montant des primes pour chaque employé
echo $employe1->ordreTransfertPrime() . "<br>";
echo $employe2->ordreTransfertPrime() . "<br>";
echo $employe3->ordreTransfertPrime() . "<br>";
echo $employe4->ordreTransfertPrime() . "<br>";
echo $employe5->ordreTransfertPrime() . "<br>";