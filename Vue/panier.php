

<?php
require ("../ctrl/init.ctrl.php");
include ("../ctrl/header.php");

if(isset($_POST['valider'])){
        
	

	echo "<script type='text/javascript'> document.location = '".RACINE_SITE."vue/paiement.php'; </script>";
}

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AJOUT PANIER ---//
if(isset($_POST['ajout_panier'])) 
{	// debug($_POST);
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit='$_POST[id_produit]'");
	$produit = $resultat->fetch_assoc();

	
	ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'],$_POST['quantite'],$produit['prix'],$produit['photo']);
	$stock = $produit['stock'] - $_POST['quantite'];
	$stocker= executeRequete("UPDATE produit set stock='$stock' WHERE id_produit='$_POST[id_produit]'");

}
//--- VIDER PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
	unset($_SESSION['panier']);
}

//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>
 
 <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center"><?php
//echo 'Panier';
echo '<h2> Votre panier </h2>';
echo "<table class='table table-bordered'>";
echo "<tr><th>Désignation produit</th><th>Produit</th><th>Quantité</th><th>Prix Unitaire</th><th>Photo</th></tr>";

if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
	echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else
{
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
	{
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] .'€'. "</td>";
		echo "<td><img src=".RACINE_SITE.$_SESSION['panier']['photo'][$i] .  " width='70' height='70' /></td>";
		echo "</tr>";
	}
	echo "<tr><th colspan='3'>Total</th><td colspan='2'>" . montantTotal() . "€</td></tr>";
	if(internauteEstConnecte()) 
	{
		echo '<form method="post" action="">';
		echo '<tr><td colspan="5"> <button type="submit"  name="valider" class="col-12 col-md-5 btn btn-primary"> Valider et déclarer le paiement </button></td></tr>';
		echo '</form>';	
	}
	else 
	{
		echo '<tr><td colspan="3">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir payé</td></tr>';
	}
	echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
}
echo "</table><br />";
?><?php
include ("../ctrl/footer.php");?>
