<?php

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure la classe Personnage
require_once 'Personnage.class.php';

// Créer un objet Personnage
$p = new Personnage("Lebowski", "Jeff", "H");

// Afficher le personnage
echo $p;