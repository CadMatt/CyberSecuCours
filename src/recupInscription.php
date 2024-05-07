<?php
if (isset($_POST["btInscription"])) {
    echo "Formulaire envoyer";

}

$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
$rue = filter_input(INPUT_POST, 'rue', FILTER_SANITIZE_STRING);
$ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
$bac = filter_input(INPUT_POST, 'bac', FILTER_SANITIZE_STRING);

$mdp = $_POST['mdp'];

$date = $_POST['date'];
$count = 0;

if (empty($nom)) {
    errorMessage('<br /> Veuillez saisir un nom');
} else if(strlen($nom) >= 30){
    errorMessage('<br /> Veuillez saisir un nom de moins de 30 caractères');
    
    if (preg_match('/\d/', $nom)) {
        echo ' <br /> Veuillez ne pas entrez de chiffre !';
    }
    
}else{
    $count++;
}
if (empty($prenom)) {
    errorMessage('<br /> Veuillez saisir un prenom');
} else if(strlen($prenom) >= 30) {
        errorMessage('<br /> Veuillez saisir un prenom de moins de 30 caractères');
    
    if (preg_match('/\d/', $prenom)) {
        echo ' <br /> Veuillez ne pas entrez de chiffre !';
    }

}else {
    $count++;
}
if(empty($age)){
    errorMessage('<br /> Veuillez saisir votre âge');
}else if(strlen($age) > 3){
    errorMessage('<br /> Vous n\'êtes pas immortel menteur');
    if (!preg_match('/[A-Z]/', $age)) {
        errorMessage('<br /> Veuillez ne pas mettre de lettre majuscule');
    }
    if(preg_match('/[a-z]/', $age)){
        echo '<br /> Veuillez ne pas mettre de lettre minuscule';
    }
    if (preg_match('/[^a-zA-Z\d]/', $age)) {
        errorMessage('<br />Veuillez ne pas ajoutez de caractère speciaux !');
    }
}else{
    $count++;
}

if (empty($email)) {
    errorMessage('<br /> Veuillez saisir un email');
} else if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
    errorMessage('<br /> Veuillez saisir une email valide');
}else{
    $count++;
}

if (empty($date)) {
    errorMessage('<br /> Veuillez saisir une date');
} else if(!dateVerif($format ='Y-m-d', $date)) {
   errorMessage('<br /> Le format de la date est incorrect');
}else{
    $count++;
}

if (empty($tel)) {
    errorMessage('<br /> Veuillez saisir un numéro de téléphone');
} else if(strlen($tel) != 10){
    errorMessage('<br /> Votre numéro est trop court ou trop long');
    if (preg_match('/\d/', $nom)) {
        echo ' <br /> Veuillez ne pas entrez de chiffre !';
    }
}else{
    $count++;
}

if (empty($cp)) {
    errorMessage('<br /> Veuillez saisir un code postal');
}else if(strlen($cp) != 5){
    errorMessage('<br /> Votre code postal est trop court ou trop long');
    if (preg_match('/[^a-zA-Z\d]/', $cp)) {
        errorMessage('<br />Veuillez ne pas ajoutez de caractère speciaux !');
    }
}else{
    $count++;
}

if (empty($rue)) {
    errorMessage('<br /> Veuillez saisir une rue');
}else{
    $count++;
}

if (empty($ville)) {
    errorMessage('<br /> Veuillez saisir une ville');
}else if(preg_match('/\d/', $ville)){
    echo ' <br /> Veuillez ne pas entrez de chiffre !';
}else{
    $count++;
}

if (empty($bac)) {
    errorMessage('<br /> Veuillez saisir votre année d\'obtention de BAC');
}else if(strlen($bac) != 4){
    errorMessage('<br /> Votre année est trop court ou trop long');
    if (!preg_match('/[A-Z]/', $bac)) {
        errorMessage('<br /> Veuillez ne pas mettre de lettre majuscule');
    }
    if(preg_match('/[a-z]/', $bac)){
        echo '<br /> Veuillez ne pas mettre de lettre minuscule';
    }
}else{
    $count++;
}

if (empty($mdp)) {
    errorMessage(" <br /> Entrez un mot de passe !");
} else if(strlen($mdp) < 12){
    errorMessage("<br /> Veuillez saisir un mot de passe de plus de 12 caractère fdp !");
    if (!preg_match('/\d/', $mdp)) {
        echo ' <br /> Veuillez entrez au moins un chiffre !';
    }
    if (!preg_match('/[A-Z]/', $mdp)) {
        errorMessage('<br /> Veuillez ajoutez au moins une majuscule !');
    }
    if (!preg_match('/[^a-zA-Z\d]/', $mdp)) {
        errorMessage('<br />Veuillez ajoutez au moins un caractère speciaux !');
    }
}else{
    $count++;
}

if($count == 11){
    echo "<br /> Félicitation vous êtes inscrit !";
    $user = new User($dbh);
    $user->log();
    if($user->emailVerif($email) === false){
        $user->insert($nom, $prenom, $age, $email, $date, $tel, $cp, $rue, $ville, $bac, $mdp);
    }else{
        echo "<br /> Email déjà utilisé trouve toi de l'inspi";
    }
}