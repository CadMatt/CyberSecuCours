<?php

echo 'RecupConnexion';

$nom = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$password = $_POST['mdp'];

if (empty($nom)) {
    errorMessage(" <br /> Entrez un nom fdp !");
}

if (empty($password)) {
    errorMessage(" <br /> Entrez un mot de passe fdp !");
} else {
    if (strlen($password) < 12) {
        errorMessage("<br /> Veuillez saisir un mot de passe de plus de 12 caractère fdp !");
    }
    if (!preg_match('/\d/', $password)) {
        echo ' <br /> Veuillez entrez au moins un chiffre !';
    }
    if (!preg_match('/[A-Z]/', $password)) {
        errorMessage('<br /> Veuillez ajoutez au moins une majuscule !');
    }
    if (!preg_match('/[^a-zA-Z\d]/', $password)) {
        errorMessage('<br />Veuillez ajoutez au moins un caractère speciaux !');
    }
    if (empty($nom) == false && empty($password) == false && preg_match('/\d/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[^a-zA-Z\d]/', $password)){
        echo "<br /> <br /> Nom : $nom / Mot de passe : ";
    }
}

$user = new User($dbh);

if($user->compteVerify($nom, $password)){
    echo '<br /> mot de passe bon';
}else{
    errorMessage('<br /> Mot de passe incorrect');
}

/*if(preg_match('/[a-z]/', $password)){
echo 'alphabet en min';
}*/


?>