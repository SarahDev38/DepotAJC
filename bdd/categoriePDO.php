<?php
include_once('sqlPDO.php');

function createCategory(string $libelle): void
{
    global $cnx;
    $query = 'INSERT INTO tblcategories (libelle) VALUES (:pLib)';
    $inst = $cnx->prepare($query);
    $inst->bindparam(':pLib', $libelle);
    $exec_OK = $inst->execute() or die(print_r($cnx->errorInfo()));
    if ($exec_OK) {
        echo "<p>$libelle ajouté avec succès</p>";
        header("Location:accueil.php");
    } else {
        echo "<p class='err'>Erreur SQL à la création de la catégorie </p>";
    }
}

function getCategoryByCodeCat(string $codecat): array
{
    global $cnx;
    $query = 'SELECT * FROM tblcategories WHERE codeCat = :pCat';
    $inst = $cnx->prepare($query);
    $inst->bindparam(':pCat', $codecat);
    $inst->execute() or die(print_r($cnx->errorInfo()));
    $categorie = $inst->fetch(PDO::FETCH_ASSOC);
    return $categorie;
}

function getAllCategories(): array
{
    global $cnx;
    $query = 'SELECT * FROM tblcategories';
    $inst = $cnx->prepare($query);
    $inst->execute() or die(print_r($cnx->errorInfo()));
    return $inst->fetchAll();
}
