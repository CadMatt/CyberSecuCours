<?php
require_once 'src/dbconnexion.php';
require_once 'src/header.php';
require_once 'src/fonction.php';
require_once 'src/menu.php';
require_once 'src/classes/class_user.php';

if($dbh != null){

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

switch ($page) {

    case 'connexion':
        if (!file_exists('src/connexion.php')) {
            error();
        } else {
            require_once 'src/connexion.php';
        }
        break;

    case 'recupConnexion':
        if (!file_exists('src/recupConnexion.php')) {
            error();
        } else {
            require_once 'src/recupConnexion.php';
        }
        break;

    case 'ajoutProduit':
        if (!file_exists('src/ajoutProduit.php')) {
            error();
        } else {
            require_once 'src/ajoutProduit.php';
        }
        break;

    case 'recupProduit':
        if (!file_exists('src/recupProduit.php')) {
            error();
        } else {
            require_once 'src/recupProduit.php';
        }
        break;
    case 'recupInscription':
        if (!file_exists('src/recupInscription.php')) {
            error();
        } else {
            require_once 'src/recupInscription.php';
        }
        break;
    case 'inscription':
        if (!file_exists('src/inscription.php')) {
            error();
        } else {
            require_once 'src/inscription.php';
        }
        break;
    default:
        echo "<h1>Acceuil</h1>";
        break;

}
}else{
    echo "Site en maintenance !!!!!!! vous jure";
}
require_once 'src/footer.php';