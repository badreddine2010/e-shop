<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "db_e_shop");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

//--------- CHEMIN
define("RACINE_SITE","http://localhost/e-shop/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES ctrlLUSIONS
require_once("fonction.ctrl.php");
?>