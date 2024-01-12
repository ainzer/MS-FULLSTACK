<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Disques</title>
    <!-- Ajoutez la référence au fichier Bootstrap CSS (à télécharger ou à partir d'un CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

    </style>
</head>

<body>
    <?php
    // Inclure le fichier de connexion à la base de données
    include("connexiondb.php");

    // Requête SQL pour récupérer les enregistrements de la table "disc"
    $sql = "SELECT disc_id, disc_title, disc_year, disc_picture, disc_genre, disc_label FROM disc";

    try {
        $result = $conn->query($sql);

        // Vérification de la réussite de la requête
        if ($result->rowCount() > 0) {
            $count = 0;
            echo '<h1>Liste des Disques (' . $result->rowCount() . ' disque)</h1>';
            echo '<a class="btn btn-primary" href="add_form.php">Ajouter</a><hr>';
        }
    } catch (PDOException $e) {
    }
    ?>
</body>

</html>