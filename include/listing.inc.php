<?php
include_once('C:\MAMP\htdocs\ajc_php\essais3_bdd_PDO\bdd\produitPDO.php');
include_once('C:\MAMP\htdocs\ajc_php\essais3_bdd_PDO\bdd\categoriePDO.php');


if (!empty($_GET) && isset($_GET['idCat']) && !empty($_GET['idCat'])) {
    $produits = getProductsByCategory($_GET['idCat']);
    $categorie = getCategoryByCodeCat($_GET['idCat']);
   
    echo "<h1>Produits de la catégorie : " . $categorie['libelle'] . "</h1><br/>";

} else {
    $produits = getAllProducts();
    echo "<h1>Tous les produits</h1>";
}

if (count($produits) == 0) {
    echo "<br/><br/><br/><br/><h3>Il n'y a pas de produits proposés pour cette catégorie</h3>";
} else {
    echo "<h3>Il y a " . count($produits) . " produits proposés dans cette catégorie</h3><br/><hr>";
}

foreach ($produits as $prod) {
    echo "<br/><b>Produit n°" . $prod['idProduit'] . "</b><br/>";
    echo "<br/>Désignation : " . $prod['designation'];
    echo "<br/>Prix unitaire HT : " . $prod['prixUnitaire'] . " &euro;";
    echo "<br/>Image : " . $prod['image'] . "<br/>";
    echo "<img class='vignette' src='images/produits/{$prod['image']}' alt='{$prod['designation']}'></img>";
    echo "<br/>Stock : " . $prod['stock'] . " unités.<br/><br/><hr>";
}
