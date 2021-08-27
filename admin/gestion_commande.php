<?php
//-------------------------------------------------- Affichage ---------------------------------------------------------//
require_once("../ctrl/header.php");
require_once("../ctrl/init.ctrl.php");?>
<?php
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}

//require_once("../ctrl/menu.ctrl.php");
?>


<div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center"><?php
	echo '<h1> Voici les commandes passées sur le site </h1>';
	echo '<table border="1"><tr>';
	
	$information_sur_les_commandes = executeRequete("select  id_commande,commande.id_membre,montant,date_enregistrement,etat,pseudo,adresse,ville,code_postal from commande left join membre  on  membre.id_membre = commande.id_membre");
	echo "Nombre de commande(s) : " . $information_sur_les_commandes->num_rows;
	echo "<table class='table table-bordered'> <tr>";
	while($colonne = $information_sur_les_commandes->fetch_field())
	{    
		echo '<th>' . $colonne->name . '</th>';
	}
	echo "</tr>";
	$chiffre_affaire = 0;
	while ($commande = $information_sur_les_commandes->fetch_assoc())
	{
		$chiffre_affaire += $commande['montant'];
		echo '<div>';
		echo '<tr>';
		echo '<td><a href="gestion_commande.php?suivi=' . $commande['id_commande'] . '">Voir la commande ' . $commande['id_commande'] . '</a></td>';
		echo '<td>' . $commande['id_membre'] . '</td>';
		echo '<td>' . $commande['montant'] . '</td>';
		echo '<td>' . $commande['date_enregistrement'] . '</td>';
		echo '<td>' . $commande['etat'] . '</td>';
		echo '<td>' . $commande['pseudo'] . '</td>';
		echo '<td>' . $commande['adresse'] . '</td>';
		echo '<td>' . $commande['ville'] . '</td>';
		echo '<td>' . $commande['code_postal'] . '</td>';
		echo '</tr>	';
		echo '</div>';
	}
	echo '</table><br />';
	echo 'Calcul du montant total des revenus:  <br />';
		print "le chiffre d'affaires de la societe est de : $chiffre_affaire €"; 
	
	echo '<br />';
	if(isset($_GET['suivi']))
	{	
		?>
		
		<div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center"><?php
		echo '<h1> Voici le détails pour une commande :</h1>';
		echo '<table table table-bordered>';
		echo '<tr>';
		$information_sur_une_commande = executeRequete("select * from details_commande where id_commande=$_GET[suivi]");
		
		$nbcol = $information_sur_une_commande->field_count;
		echo "<table class='table table-bordered'> <tr>";
		for ($i=0; $i < $nbcol; $i++)
		{    
			$colonne = $information_sur_une_commande->fetch_field(); 
			echo '<th>' . $colonne->name . '</th>';
		}
		echo "</tr>";

		while ($details_commande = $information_sur_une_commande->fetch_assoc())
		{
			echo '<tr>';
				echo '<td>' . $details_commande['id_details_commande'] . '</td>';
				echo '<td>' . $details_commande['id_commande'] . '</td>';
				echo '<td>' . $details_commande['id_produit'] . '</td>';
				echo '<td>' . $details_commande['quantite'] . '</td>';
				echo '<td>' . $details_commande['prix'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';?>
		<?php
	}require_once("../ctrl/footer.php");?>