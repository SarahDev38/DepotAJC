<?php
include_once('C:\MAMP\htdocs\ajc_php\essais3_bdd_PDO\bdd\categoriePDO.php');
$categories = getAllCategories();
?>

<ul>
    <?php
    foreach ($categories as $cat) {
        echo "<li><a href='accueil.php?idCat={$cat['codeCat']}'>" . $cat['libelle'] . "</a></li>";
    }

    ?>
    <li><a href='accueil.php'>Tous les produits</a></li><br/><hr><br/>
    <li><a href='ajoutCat.php'>Ajouter une catégorie</a></li><br/><hr><br/>
    <li><a href='ajoutProduit.php'>Ajouter un produit</a></li>
</ul>