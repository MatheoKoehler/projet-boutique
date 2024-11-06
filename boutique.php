<?php

//Initialisation du stock

$articles = ["Brie", "Lait", "Jambon", "Farine", "Sucre", "Pain de mie"];
echo "ID|Nom article\n";
for ($index = 0; $index != count($articles); $index++) {
    echo " $index" . "|" . $articles[$index];
    echo PHP_EOL;
}

echo PHP_EOL;
echo "ID|Nom article\n";
foreach ($articles as $index => $article) {
    echo " $index" . "|" . $article;
    echo PHP_EOL;
}
echo PHP_EOL;

//Gestion des stock

$stocks = [12, 40, 60, 35, 96, 3];
echo "ID|Nom article : stock \n";
for ($index = 0; $index != count($articles); $index++) {
    echo " $index" . "|" . $articles[$index] . " : " . $stocks[$index];
    echo PHP_EOL;
}
echo PHP_EOL;

//Réalisation d'une vente (Et declaration du tableau de suivi des ventes)

$suiviVentes = [0, 0, 0, 0, 0, 0];
$idVendu = readline("Saisir l'ID de l'article a vendre : ");
$qteVendu = readline("Saisir la quantitée vendue : ");
if ($stocks[$idVendu] >= $qteVendu) {
    $suiviVentes[$idVendu] += $qteVendu;
    $stocks[$idVendu] -= $qteVendu;
    echo "La vente de " . $articles[$idVendu] . " a été effectué avec succes";
} else {
    echo "Vente impossible : stock insufisant";
}
echo PHP_EOL;
echo PHP_EOL;

//Réaprovisionnement d'un article


$id = readline("Quel article a réaprovisioner (idex) : ");
$qtéAjouter = readline("Quelle quantité rajouter : ");
$stocks[$id] += $qtéAjouter;
echo ("L'article " . $articles[$id] . " a été réaprovisioné : actuellement ") . $stocks[$id];
echo PHP_EOL;
echo PHP_EOL;

//Synthèse et affichage du stocks

foreach ($stocks as $index => $stock) {
    if ($stock > 0) {
        echo " $index" . "|" . $articles[$index] . " : " . $stocks[$index];
        echo PHP_EOL;
    } else {
        echo "L'article " . $articles[$index] . " est en rupture de stock";
        echo PHP_EOL;
    }
}
echo PHP_EOL;
echo PHP_EOL;

//Suivi des ventes totales par articles

echo PHP_EOL;
echo "ID|Nom article\n";
foreach ($suiviVentes as $index => $vente) {
    echo " $index" . "|" . $articles[$index] . " a été vendu " . $vente . " fois";
    echo PHP_EOL;
}
echo PHP_EOL;

//Supression d'un article
$id = readline("Choisissez un élément a supprimé :");
unset($articles[$id]);
unset($stocks[$id]);
unset($suiviVentes[$id]);
$articles = array_values($articles) ;
$stocks = array_values($stocks) ;
$suiviVentes = array_values($suiviVentes);

for ($index = 0; $index != count($articles); $index++) {
    echo " $index" . "|" . $articles[$index] . " : " . $stocks[$index];
    echo PHP_EOL;
}
