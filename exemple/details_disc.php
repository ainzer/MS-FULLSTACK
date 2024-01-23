<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si la clé "disc_id" existe dans $_GET
    if (isset($_GET["disc_id"]) && is_numeric($_GET["disc_id"])) {
        $disc_id = (int)$_GET["disc_id"];

        $requete = $db->prepare("SELECT * FROM disc WHERE disc_id = ?");
        $requete->execute(array($disc_id));
        $disc = $requete->fetch(PDO::FETCH_OBJ);

        // Vérifier si l'enregistrement a été trouvé
        if ($disc) {
            ?>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Test PDO</title>
            </head>
            <body>
                Disc N° <?= htmlspecialchars($disc->disc_id) ?>
                Disc name <?= htmlspecialchars($disc->disc_title) ?>
                Disc year <?= htmlspecialchars($disc->disc_year) ?>
            </body>
            </html>
            <?php
        } else {
            echo "Aucun enregistrement trouvé pour disc_id = " . htmlspecialchars($disc_id);
        }
    } else {
        echo "Paramètre disc_id non spécifié ou non valide dans l'URL.";
    }
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
?>
