<body class="conteneur">

<?php
require_once("inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['id_produit'])) 	{ $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'"); }
if($resultat->num_rows <= 0) { header("location:index.php/e_shop"); exit(); }

$produit = $resultat->fetch_assoc();
$contenu .= "<h3>Titre : $produit[titre]</h3><hr /><br />";
$contenu .= "<p>Categorie: $produit[categorie]</p>";
$contenu .= "<p>Couleur: $produit[couleur]</p>";
$contenu .= "<p>Taille: $produit[taille]</p>";
$contenu .= "<img src='$produit[photo]' width='150' height='150' />";
$contenu .= "<p><i>Description: $produit[description]</i></p><br />";
$contenu .= "<p>Prix : $produit[prix] €</p><br />";

if($produit['stock'] > 0)
{
	$contenu .= "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br /><br />";
	$contenu .= '<form method="post" action="panier.php">';
		$contenu .= "<input type='hidden' name='id_produit' value='$produit[id_produit]' />";
		$contenu .= '<label for="quantite">Quantité : </label>';
		$contenu .= '<select id="quantite" name="quantite">';
			for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++)
			{
				$contenu .= "<option>$i</option>";
			}
		$contenu .= '</select>';
		$contenu .= '<button type="submit"  name="ajout_panier" class="col-12 col-md-2 btn btn-primary"> Ajout panier </button></td></tr>';
	$contenu .= '</form>';
}
else
{
	$contenu .= 'Rupture de stock !';
}
$contenu .= "<br /><a href='index.php?categorie=" . $produit['categorie'] . "'>Retour vers la sélection de " . $produit['categorie'] . "</a>";
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("inc/header.php");
echo $contenu;
require_once("inc/footer.php");?>
<body class="conteneur">
