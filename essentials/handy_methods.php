<?php

//tidzonen till vår så att den visar rätt tid!
date_default_timezone_set("Europe/Helsinki");

error_reporting(E_ALL);
ini_set('display_errors', '1');

//starta session för varje användare
session_start(); 

//Function för input sanitation
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


