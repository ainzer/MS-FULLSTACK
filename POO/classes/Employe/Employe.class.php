<?php
 
    class employe
    {
        // création d'objets
        private $nom;
        private $prenom;
        private $dateEmbauche;
        private $poste;
        private $salaire;
        private $service;
        public  $lieux;

        // construction des objects
        public function __construct ($nom, $prenom, $dateEmbauche, $poste, $salaire, $service, $lieux)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateEmbauche = $dateEmbauche;
            $this->poste = $poste;
            $this->salaire = $salaire;
            $this->service = $service;
            $this->lieux = $lieux;

        }

        // fonction pour connaître la durer d'ancienneté de chaque employer
        public function combienAnnee($dateEmbauche)
        {
            $aujourdhui = new DateTime("now");
            $ancien = new DateTime($this->dateEmbauche);
            $difference = $aujourdhui->diff($ancien);
            return $difference->y;

        }

        // fonction pour afficher les differentes informations 
        public function afficheInfos()
        {
            // calcule pour avoir le montant de la prime
            $aujourdhui = new DateTime('2024-11-17');
            $dureeEntreprise = $this->combienAnnee($this->dateEmbauche);
            $prime = $this->salaire / 100 * (5 + $dureeEntreprise * 2);

            echo "<h1>Liste de renseignements</h1>";
            echo "<strong>Nom : </strong>" . $this->nom . "<br><br>";
            echo "<strong>Prenom : </strong>" . $this->prenom . "<br><br>";
            echo "<strong>Lieux de l'entreprise : </strong>" . $this->lieux . "<br><br>";
            echo "<strong>Date d'enbauche : </strong>" . $this->dateEmbauche . "<br><br>";
            echo "<strong>Poste dans l'entreprise : </strong>" . $this->poste . "<br><br>";
            echo "<strong>Salaire : </strong>" . $this->salaire . " euros<br><br>";
            echo "<strong>Service occuper : </strong>" . $this->service . "<br><br>";
            echo "<strong>Années de service dans l'entreprise : </strong>" . $dureeEntreprise . "ans<br><br>";
            echo "<strong>Prime : </strong>" . $prime . " euros<br><br>";
            
            // conditions d'envois de virement annuel pour la banque
            if ($aujourdhui->format('m-d') === '11-30')
            {
                echo "<strong>Virement annuel : </strong>Virement banquier de la prime de {$prime} euros le 30 novembre.<br>";
            }
            else
            {
                echo "<strong>Virement annuel : </strong>La prime n'est pas encore due, le virement de {$prime} euros sera effectué le 30 novembre.<br>";
            }

            // conditions droit chèques-vacances
            if ($dureeEntreprise >= 1 )
            {
                echo "<br><strong>Chèques-vanacances : </strong>Félicitations vous bénéficier d'un chèques-vacances merci pour votre loyauté<br><br>";
            }
            else
            {
                echo "<br><strong>Chèques-vanacances : </strong>Vous devez faire partie de l'entreprise minimum 1 ans pour bénéficier du chèques-vacances<br><br>";
            }

        }

        // fonction chèques-vacances par enfants
        public function enfant($_age)
        {
            // tableau avec montants
            $cheques = array 
            (
                "20€" => 0,
                "30€" => 0,
                "50€" => 0
            );

            // parcourir la tableau avec les conditions
            foreach ($_age as $age)
            {
                if ($age >= 0 && $age <= 10)
                {
                    $cheques ["20€"] ++;
                }
                else if ($age >= 11 && $age <= 15)
                {
                    $cheques ["30€"] ++;
                }
                else if ($age >= 16 && $age <= 18)
                {
                    $cheques ["50€"] ++;
                }
            };
        
            // compter le nombres d'enfants
            $nombreEnfant = count($_age);

            // alert
            echo "<strong>Droit au chèques de noêl : </strong>";
            echo $nombreEnfant ? "OUI, " : "NON, ";

            // parcourir les resultats plus alert avec les droits
            foreach ($cheques as $euros => $nombreE)
            {
                if ($nombreE > 0) 
                {
                    echo "L'employer à le droit à $nombreE chèques de $euros pour Noël.  <br>";
                }
            }

            echo "<br><strong>________________________________________________________________________________________________________</strong><br><br>"; 

        }

    }

    class magasins
    {
        // création d'objets
        private $nomMagasin;
        private $adresse;
        private $codePostal;
        private $ville;

        // construction d'objets
        public function __construct($nomMagasin, $adresse, $codePostal, $ville)
        {
            $this->nomMagasin = $nomMagasin;
            $this->adresse = $adresse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
        }

        // fonction d'affichage
        public function afficheMag()
        {

            echo "<br><strong>___________________________________________MAGASIN______________________________________________________</strong><br><br><br>"; 

            echo "<strong>Nom du magasins : </strong>" . $this->nomMagasin . "<br><br>";
            echo "<strong>Adresse du magasins : </strong>" . $this->adresse . "<br><br>";
            echo "<strong>Code postal : </strong>" . $this->codePostal . "<br><br>";
            echo "<strong>Ville : </strong>" . $this->ville . "<br><br>";

            if ($this->ville === "marseille" || $this->ville ==="orgemont")
            {
                echo "<strong>Tikets restaurant : </strong>Vous bénéficier d'un carnet de tikets de restaurations car votre entreprise ne dispose pas d'une cantine.<br><br>";
            }
            else
            {
                echo "<strong>Tikets restaurant : </strong>Vous bénéficier pas d'un carnet de tikets de restaurations car votre entreprise dispose d'une cantine.<br><br>";
            }

        }

    }


   // Informations des magasins
$magasin1 = new magasins("Nouveau Magasin", "10 rue de la nouvelle adresse", "75001", "Paris");
$magasin1->afficheMag();

$magasin2 = new magasins("SuperMarketing", "5 avenue de la réussite", "13008", "Marseille");
$magasin2->afficheMag();

$magasin3 = new magasins("Cuisine Excellence", "15 rue de l'innovation", "93800", "Epinay-sur-Seine");
$magasin3->afficheMag();

$magasin4 = new magasins("Dance Fusion", "25 avenue de la créativité", "93800", "Orgemont");
$magasin4->afficheMag();

$magasin5 = new magasins("Healthy Bites", "35 rue de la vitalité", "75018", "Porte de Clignancourt");
$magasin5->afficheMag();


   // Informations des employés
$employe1 = new employe("Dupont", "Jean", "1990-03-20", "Marketing", "60.000", "Employeur", $magasin1->$ville);
$employe1->afficheInfos();
$employe1->enfant(array(3, 8, 15));

$employe2 = new employe("Leroux", "Marie", "1985-08-10", "Ventes", "45.000", "Associé", $magasin2->$ville);
$employe2->afficheInfos();
$employe2->enfant(array(12, 18));

$employe3 = new employe("Martin", "François", "1970-01-15", "Ressources Humaines", "55.000", "Directeur", $magasin3->$ville);
$employe3->afficheInfos();
$employe3->enfant(array(5, 10));

$employe4 = new employe("Dubois", "Sophie", "1995-06-25", "Logistique", "35.000", "Employé", $magasin4->$ville);
$employe4->afficheInfos();
$employe4->enfant(array(7, 14, 20));

$employe5 = new employe("Girard", "Paul", "1980-12-05", "Finance", "70.000", "Directeur", $magasin5->$ville);
$employe5->afficheInfos();
$employe5->enfant(array(4, 9, 11, 13));

    
?>   