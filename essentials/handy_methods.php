<?php

//tidzonen till vår så att den visar rätt tid!
date_default_timezone_set("Europe/Helsinki");

error_reporting(E_ALL);
ini_set('display_errors', '1');

//starta session för varje användare
session_start(); 

//function för input sanitation
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//databaskonfiguration
$servername = "localhost";
include "lösenord.php";
$dbname = "salminth";
$username = "salminth";

//skapar en instans av PDO klassen som vi kallar $conn
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
print("Connected to DataBase");

?>


