<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "db_e_shop");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

//--------- CHEMIN
<<<<<<< HEAD
define("RACINE_SITE","http://localhost/e-shop/");
=======
define("RACINE_SITE","http://localhost/e_shop/");
>>>>>>> d73a1dc0bac2577b24b8b2aa24c2499edfdf454c
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES ctrlLUSIONS
require_once("fonction.ctrl.php");
?>