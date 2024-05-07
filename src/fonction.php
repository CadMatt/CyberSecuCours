<?php

function error()
{
    echo "<h1>Erreur sur le site !</h1>";
}

function errorMessage($text)
{
    echo $text;
}

function dateVerif($format, $date){
    return DateTime::createFromFormat($format, $date);
}

