<?php
echo "<h1>Accueil</h1>";
$user = new User($dbh);

$users = $user->getUsers();
foreach ($users as $user) {
    echo "<br />";
    echo  " ".$user['nom'];
    echo  " ".$user['prenom'];
}

//compte Erwan
//Maaa7rr-//*ogjri