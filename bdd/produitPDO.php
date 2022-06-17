<?php
include_once('sqlPDO.php');

function createProduct(string $designation, string $prix, string $stock, string $img, string $idCat): void
{
    global $cnx;
    $query = 'INSERT INTO tblproduits (designation, prixUnitaire, stock, image, codeCat) VALUES (:pDesig, :pPrixU, :pStock, :pImg, :pCat)';
    $inst = $cnx->prepare($query);
    $inst->bindparam(':pDesig', $designation);
    $inst->bindparam(':pPrixU', $prix);
    $inst->bindparam(':pStock', $stock);
    $inst->bindparam(':pImg', $img);
    $inst->bindparam(':pCat', $idCat);
    $exec_OK = $inst->execute() or die(print_r($cnx->errorInfo()));
    if ($exec_OK) {
        header("Location:accueil.php");
    } else {
        echo "<br/><p class='err'>Erreur SQL à la création du produit</p>";
    }
}

function getAllProducts(): array
{
    global $cnx;
    $query = 'SELECT * FROM tblproduits';
    $inst = $cnx->prepare($query);
    $inst->execute() or die(print_r($cnx->errorInfo()));
    return $inst->fetchAll();
}

function getProductsByCategory(string $cat): array
{
    global $cnx;
    $query = 'SELECT * FROM tblproduits WHERE codeCat = :pCat';
    $inst = $cnx->prepare($query);
    $inst->bindparam(':pCat', $cat);
    $inst->execute() or die(print_r($cnx->errorInfo()));
    return $inst->fetchAll();
}
