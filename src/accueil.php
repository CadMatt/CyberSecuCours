<?php
$user = new User($dbh);

$users = $user->getUsers();
foreach ($users as $user) {
    echo "<br />";
    echo  " ".$user['nom'];
    echo  " ".$user['prenom'];
}
?>