<?php
echo 'Recapitulatif de votre produit : ';

$designation = filter_input(INPUT_POST, 'designation', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
if (empty($prix)) {
    errorMessage("Veuillez saisir un prix valide");
} else {

    if ($prix === false) {
        $prix = "le prix des produits n'est pas valide";
    } else {
        echo "<br> <br> Désignation du produit : $designation";
        echo "<br> <br> Description du produit : $description";
        echo "<br> <br> Prix hors taxe du produit : $prix €";
    }
}
