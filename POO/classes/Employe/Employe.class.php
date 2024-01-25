<?php

class Employe
{
    // Création d'objets
    private $nom;
    private $prenom;
    private $dateEmbauche;
    private $poste;
    private $salaire;
    private $service;
    private $lieux;

    // Construction des objets
    public function __construct($nom, $prenom, $dateEmbauche, $poste, $salaire, $service, $lieux)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateEmbauche = $dateEmbauche;
        $this->poste = $poste;
        $this->salaire = $salaire;
        $this->service = $service;
        $this->lieux = $lieux;
    }

    // Fonction pour connaitre la durer d'ancienneté de chaque employer
    public function combienAnnee($dateEmbauche)
    {
        $aujourdhui = new DateTime("now");
        $ancien = new DateTime($this->dateEmbauche);
        $difference = $aujourdhui->diff($ancien);
        return $difference->y;
    }

    // Fonction pour afficher les différentes informations
    public function afficheInfos()
    {
        // Calcule pour avoir le montant de la prime
        $aujourdhui = new DateTime('2024-11-17');
        $dureeEntreprise = $this->combienAnnee($this->dateEmbauche);
        $prime = $this->salaire / 100 * (5 + $dureeEntreprise * 2);

        echo "<h1>Liste de renseignements</h1>";
        echo "<strong>Nom : </strong>" . $this->nom . "<br><br>";
        echo "<strong>Prenom : </strong>" . $this->prenom . "<br><br>";
        echo "<strong>Lieux de l'entreprise : </strong>" . $this->lieux . "<br><br>";
        echo "<strong>Date d'embauche : </strong>" . $this->dateEmbauche . "<br><br>";
        echo "<strong>Poste dans l'entreprise : </strong>" . $this->poste . "<br><br>";
        echo "<strong>Salaire : </strong>" . $this->salaire . " euros<br><br>";
        echo "<strong>Service occuper : </strong>" . $this->service . "<br><br>";
        echo "<strong>Années de service dans l'entreprise : </strong>" . $dureeEntreprise . "ans<br><br>";
        echo "<strong>Prime : </strong>" . $prime . " euros<br><br>";

        // Condition d'envois de virement annuel pour la banque
        if ($aujourdhui->format('m-d') === '11-30')
        {
            echo "<strong>Virement annuel : </strong>Virement banquier de la prime de {$prime} euros le 30 novembre.<br>";
        }
        else
        {
            echo "<strong>Virement annuel : </strong>La prime n'est pas encore due, le virement de {$prime} euros sera effectué le 30 novembre.<br>";
        }

        // Condition droit chèque-vacances
        if ($dureeEntreprise >= 1)
        {
            echo "<br><strong>Chèque-vacances : </strong>Fèlicitations vous bénéficier d'un chèques-vacances merci pour votre loyauté<br><br>";
        }
        else
        {
            echo "<br><strong>Chèque-vacances : </strong>Vous devez faire partie de l'entreprise minimum 1 ans pour bénéficier du chèques-vacances<br><br>";
        }
    }

    // Fonction chèques-vacances par enfants
    public function enfant($age)
    {
        // Tableau avec montantsS
    }
}