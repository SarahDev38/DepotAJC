<?php
include_once('bdd/sqlPDO.php');
include_once('bdd/categoriePDO.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>ajc PDO</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/gabarit.css" />
</head>

<body>
    <div id="global">

        <?php include('include/header.inc.php'); ?>

        <div id="centre">
            
            <div id="navigation">
                <?php include('include/menu.inc.php'); ?>
            </div>

            <div id="contenu">
                <h1>Ajouter une catégorie de produit </h1>
                <br />

                <form method="post">
                    <p>
                        <label for="idLib">Nom :</label>
                        <input type="text" id="idLib" name="txtLib" placeholder="Libellé de la catégorie" maxlength="30" />
                        <button type="submit" name="btnValider" value="Ajouter Catégorie">Valider</button>
                    </p>
                </form><br />

                <?php
                if (isset($_POST['txtLib'])) {
                    $lib = $_POST['txtLib'];
                    if (!empty($lib)) {
                        createCategory($lib);
                    } else {
                        echo "<p class='err'>Libellé manquant</p>";
                    }
                }
                ?>

            </div>
        </div>
        <?php include('include/footer.inc.php'); ?>
</body>

</html>