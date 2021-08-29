

<?php
require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");
?>

    <?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['id_produit'])) 	{ $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'"); }
if($resultat->num_rows <= 0) { header("location:index.php/e_shop"); exit(); }
$produit = $resultat->fetch_assoc();

echo "<h3>Titre : $produit[titre]</h3><hr /><br />";
echo "<p>Categorie: $produit[categorie]</p>";
echo "<p>Couleur: $produit[couleur]</p>";
echo "<p>Taille: $produit[taille]</p>";
echo "<img src=".RACINE_SITE.$produit['photo']." width='150' height='150' />";
echo "<p><i>Description: $produit[description]</i></p><br />";
echo "<p>Prix : $produit[prix] €</p><br />";

if($produit['stock'] > 0)
{
	echo "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br /><br />";
	echo '<form method="post" action="panier.php">';
		echo "<input type='hidden' name='id_produit' value='$produit[id_produit]' />";
		echo '<label for="quantite">Quantité : </label>';
		echo '<select id="quantite" name="quantite">';
			for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++)
			{
				echo "<option>$i</option>";
			}
		echo '</select>';
		echo '<button type="submit"  name="ajout_panier" class="col-12 col-md-2 btn btn-primary"> Ajout panier </button></td></tr>';
	echo '</form>';
}
else
{
	echo 'Rupture de stock !';
}
echo "<br /><a href='index.php?categorie=" . $produit['categorie'] . "'>Retour vers la sélection de " . $produit['categorie'] . "</a>";
?>
<?php
require_once("../ctrl/footer.php");?>

