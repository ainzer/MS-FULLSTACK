<?php

class Magasin {
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;
    private $modeRestauration;

    public function __construct($nom, $adresse, $codePostal, $ville, $modeRestauration)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->modeRestauration = $modeRestauration;
    }

    // Getters
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

    public function getModeRestauration() {
        return $this->modeRestauration;
    }

    // Setters
    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function setAdresse($nouvelleAdresse) {
        $this->adresse = $nouvelleAdresse;
    }

    public function setCodePostal($nouveauCodePostal) {
        $this->codePostal = $nouveauCodePostal;
    }

    public function setVille($nouvelleVille) {
        $this->ville = $nouvelleVille;
    }

    public function setModeRestauration($nouveauModeRestauration) {
        $this->modeRestauration = $nouveauModeRestauration;
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
    private $magasin;
    private $enfants = [];

    // Constructeur
    public function __construct($nom, $prenom, $dateEmbauche, $fonction, $salaire, $service, $magasin)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateEmbauche = $dateEmbauche;
        $this->fonction = $fonction;
        $this->salaire = $salaire;
        $this->service = $service;
        $this->magasin = $magasin;
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

    public function getMagasin() {
        return $this->magasin;
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

    public function setMagasin($nouveauMagasin) {
        $this->magasin = $nouveauMagasin;
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

    // Méthode pour afficher le mode de restauration du magasin de l'employé
    public function afficherModeRestauration() {
        echo $this->nom . " " . $this->prenom . " travaille dans le magasin " . $this->magasin->getNom() . " à " . $this->magasin->getVille() . "<br>";
        echo "Mode de restauration : " . $this->magasin->getModeRestauration() . "<br>";
    }

    // Méthode pour vérifier l'éligibilité aux chèques-vacances
    public function estEligibleChequesVacances() {
        // Vérifier si l'employé a une ancienneté d'au moins un an
        return $this->anneesDansEntreprise() >= 1;
    }

    // Méthode pour ajouter un enfant à l'employé
    public function ajouterEnfant($nom, $age) {
        $this->enfants[] = ['nom' => $nom, 'age' => $age];
    }

    // Méthode pour obtenir le nombre d'enfants
    public function nombreEnfants() {
        return count($this->enfants);
    }

    // Méthode pour obtenir le tableau d'enfants
    public function getEnfants() {
        return $this->enfants;
    }

    // Méthode pour vérifier l'éligibilité et obtenir le nombre de chèques Noël
    public function obtenirChequesNoel() {
        $nombreCheques = [
            '20€' => 0,
            '30€' => 0,
            '50€' => 0,
        ];

        // Vérifier si l'employé a des enfants
        $nombreEnfants = $this->nombreEnfants();
        if ($nombreEnfants > 0) {
            // Parcourir chaque enfant pour calculer le montant des chèques Noël
            foreach ($this->enfants as $enfant) {
                $ageEnfant = $enfant->getAge();

                // // Attribution du montant en fonction de l'âge
                if ($ageEnfant >= 0 && $ageEnfant <= 10) {
                    $nombreCheques['20€']++;
                } elseif ($ageEnfant >= 11 && $ageEnfant <= 15) {
                    $nombreCheques['30€']++;
                } elseif ($ageEnfant >= 16 && $ageEnfant <= 18) {
                    $nombreCheques['50€']++;
                }
            }
        }
        return $nombreCheques;
    }
}

// Exemple d'utilisation des classes Employe et simulation des enfants
$magasin1 = new Magasin("Nom Magasin", "Adresse Magasin", "Code Postal", "Ville", "Mode de Restauration");
$employe1 = new Employe("Doe", "John", "2010-01-01", "Développeur", 50, "Informatique", $magasin1);

// Simulation des enfants de l'employé
$employe1->ajouterEnfant("Alice", 8);
$employe1->ajouterEnfant("Bob", 14);

// Afficher si l'employé a le droit d'avoir des chèques Noël (Oui/Non)
$eligibiliteChequesNoel = $employe1->obtenirChequesNoel();

echo $employe1->getNom() . " " . $employe1->getPrenom() . " a le droit d'avoir des chèques Noël : " . ($eligibiliteChequesNoel['20€'] > 0 || $eligibiliteChequesNoel['30€'] > 0 || $eligibiliteChequesNoel['50€'] > 0 ? "Oui" : "Non") . "<br>";

// Afficher le nombre de chèques de chaque montant
foreach ($eligibiliteChequesNoel as $montant => $nombre) {
    if ($nombre > 0) {
        echo "Nombre de chèques de " . $montant . " : " . $nombre . "<br>";
    }
}