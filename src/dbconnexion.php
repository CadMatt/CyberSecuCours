<?php
require_once('id.php');

try {
    $dbh = new PDO('mysql:host='. $server . ';dbname='. $db, $login, $password);
}catch(PDOException $e) {
    $dbh=null;
}
