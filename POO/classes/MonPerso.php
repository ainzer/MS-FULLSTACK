<?php

require_once 'Personnage.class.php'; // Inclure le fichier contenant la classe Personnage

$p = new Personnage();
$p->setNom("Lebowski");
$p->setPrenom("Jeff");

echo $p;