<?php
include_once('bdd/categoriePDO.php');
include_once('bdd/produitPDO.php');
$categories = getAllCategories();

if (isset($_POST) && !empty($_POST)) {
    $designation = $_POST['txtDesignation'];
    $prix = $_POST['txtPrix'];
    $stock = $_POST['txtStock'];
    $img = $_POST['txtImg'];
    $cat = $_POST['cat'];

    if (empty($designation)) {
        $errorDesignation = "* désignation manquante";
    } elseif (strlen($designation) > 50) {
        $errorDesignation = "* désignation trop longue";
    }

    if (empty($prix)) {
        $errorPrix = "* prix unitaire manquant";
    } else {
        $prix = str_replace(",", ".", $prix);
        if (!is_numeric($prix)) {
            $errorPrix = "* le prix doit être numérique";
        } else {
            list($entiere, $decimale) = explode(".", $prix);
            if (strlen($entiere) + strlen($decimale) >5 ) {
                $errorPrix = "* le prix  ne peut contenir plus de 5 chiffres.";
            } elseif ( strlen($decimale) >2) {
                $errorPrix = "* le prix ne peut contenir plus de 2 chiffres après la virgule.";
            }
        }
    }

    if (empty($stock)) {
        $errorStock = "* stock manquant : valeur par défaut = 10";
    }
    if (empty($cat)) {
        $errorCat = "* catégorie manquante";
    }

    if (!isset($errorDesignation) && !isset($errorPrix) && !isset($errorStock) && !isset($errorCat)) {
        createProduct($designation, $prix, $stock, $img, $cat);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>ajc Gabarit</title>
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
                <h1>Ajouter un produit </h1><br />

                <form method="post">
                    <table>
                        <tr>
                            <td><label for="idDesignation">Désignation :</label></td>
                            <td><input type="text" id="idDesignation" name="txtDesignation" maxlength="50" /></td>
                            <td><?php if (isset($errorDesignation)) {
                                    echo "<p class='err'>$errorDesignation</p>";
                                }; ?></td>
                        </tr>

                        <tr>
                            <td><label for="idPrix">Prix Unitaire (HT) :</label></td>
                            <td><input type="text" id="idPrix" name="txtPrix" maxlength="6" /></td>
                            <td><?php if (isset($errorPrix)) {
                                    echo "<p class='err'>$errorPrix</p>";
                                }; ?></td>
                        </tr>

                        <tr>
                            <td><label for="idStock">Stock :</label></td>
                            <td><input type="number" id="idStock" name="txtStock" value="10" /></td>
                            <td><?php if (isset($errorStock)) {
                                    echo "<p class='err'>$errorStock</p>";
                                }; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="idImg">Image :</label></td>
                            <td><input type="text" id="idImg" name="txtImg" maxlength="100" /></td>
                            <td><?php if (isset($errorImg)) {
                                    echo "<p class='err'>$errorImg</p>";
                                }; ?>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="idCat">Catégorie :</label></td>
                            <td>
                                <select name="cat" id="idCat">
                                    <option value="">choisir une catégorie</option>
                                    <?php
                                    foreach ($categories as $cat) {
                                        echo "<option value={$cat['codeCat']}>$cat[libelle]</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <?php if (isset($errorCat)) {
                                    echo "<p class='err'>$errorCat</p>";
                                }; ?>
                            </td>
                        </tr>
                    </table>

                    <button type="submit" name="btnValider" value="Ajouter Catégorie">Ajouter un produit</button>
                </form><br />

                <?php
                ?>

            </div>
        </div>
        <?php include('include/footer.inc.php'); ?>
</body>

</html>