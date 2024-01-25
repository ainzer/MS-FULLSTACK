-- Active: 1705999240837@@127.0.0.1@3306@TheDistrict

Vous devez écrire les requêtes suivantes :

Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix ) :

SELECT date_commande , nom_client , telephone_client , email_client , adresse_client , plat.libelle , total
FROM commande , plat
WHERE commande.id_plat = plat.id;

Afficher la liste des plats en spécifiant la catégorie : 

SELECT plat.libelle , description , prix , plat.image , categorie.libelle
FROM plat , categorie
WHERE plat.id_categorie = categorie.id;

Afficher les catégories et le nombre de plats actifs dans chaque catégorie :

SELECT categorie.libelle, COUNT(plat.id)
FROM categorie
LEFT JOIN plat  ON categorie.id = plat.id_categorie AND plat.active = 'yes'
GROUP BY categorie.libelle;

Liste des plats les plus vendus par ordre décroissant :

SELECT plat.libelle , description , prix , plat.image , commande.id_plat , quantite
FROM plat , commande
WHERE commande.id_plat = plat.id 
ORDER BY quantite DESC;

Le plat le plus rémunérateur :

SELECT plat.libelle , description , prix , plat.image , commande.id_plat , total
FROM plat , commande
WHERE commande.id_plat = plat.id 
ORDER BY total DESC
LIMIT 1 ;


SELECT nom_client , total
FROM commande
ORDER by total DESC

Écrire des requêtes de modification de la base de données

Ecrivez une requête permettant de supprimer les plats non actif de la base de données :

DELETE id , libelle , description , prix , image , id_categorie , active 
FROM plat
WHERE active = 'No'

Ecrivez une requête permettant de supprimer les commandes avec le statut livré :

DELETE id , id_plat , quantite , total , date_commande , etat , nom_client , telephone_client , email_client , adresse_client
FROM commande
WHERE etat = 'livrée'



INSERT INTO categorie (id,libelle,image,active) VALUES (15,'Tacos','tacos.jpg','No')

INSERT INTO plat (id,libelle,description,prix,image,id_categorie,active) VALUES (18,'Tacos','Tacos xl','10','tacos.jpg',15,'No').


UPDATE plat
SET prix = prix * 1.10
WHERE id_categorie = (SELECT id FROM categorie WHERE libelle = 'Pizza');