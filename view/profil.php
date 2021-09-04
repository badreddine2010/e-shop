

<?php
require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");
?>
    <?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) 
{
	header("location:connexion.php");
}
echo '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['prenom'] . '</strong></p>'; 
echo '<div class="cadre"><h2> Voici vos informations de profil </h2>';
echo '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
echo 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
echo 'votre cp est: ' . $_SESSION['membre']['code_postal'] . '<br>';
echo 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br /><br />';

?><?php
	
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("../ctrl/footer.php");?>

