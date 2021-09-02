<body class="conteneur">

<?php

require_once("../ctrl/init.ctrl.php");
include("../ctrl/header.php");
if(internauteEstConnecteEtEstAdmin())
{

//-------------------------------------------------- Affichage ---------------------------------------------------------//

//require_once("../inc/menu.inc.php");
	echo '<h2> Voici les commandes passées sur le site </h2>';
	echo '<table border="1"><tr>';
	
	$information_sur_les_commandes = executeRequete("select  id_commande,nom,prenom,montant,date_enregistrement,etat,adresse,ville,code_postal from commande left join membre  on  membre.id_membre = commande.id_membre");
	echo "Nombre de commande(s) : " . $information_sur_les_commandes->num_rows;
	echo "<table class='table table-bordered'> <tr>";
	//while($colonne = $information_sur_les_commandes->fetch_field())
	{    
		//echo '<th>' . $colonne->name . '</th>';
		?>
		<thead>
				<tr>
					<th>Commande</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Montant</th>
					<th>Date d'achat</th>
					<th>Etat</tthh>
					<th>Adresse</th>
					<th>Ville</th>
					<th>Code_postal</th>
				</tr>
			</thead> <?php
	}
	echo "</tr>";
	$chiffre_affaire = 0;
	while ($commande = $information_sur_les_commandes->fetch_assoc())
	{
		$chiffre_affaire += $commande['montant'];
		echo '<div>';
		echo '<tr>';
		echo '<td><a href="gestion_commande.php?suivi=' . $commande['id_commande'] . '">Voir la commande ' . $commande['id_commande'] . '</a></td>';
		echo '<td>' . $commande['nom'] . '</td>';
		echo '<td>' . $commande['prenom'] . '</td>';
		echo '<td>' . $commande['montant'] . '</td>';
		echo '<td>' .strftime('%d-%m-%Y',strtotime($commande['date_enregistrement'])).'</td>';
		echo '<td>' . $commande['etat'] . '</td>';	
		echo '<td>' . $commande['adresse'] . '</td>';
		echo '<td>' . $commande['ville'] . '</td>';
		echo '<td>' . $commande['code_postal'] . '</td>';
		echo '</tr>	';
		echo '</div>';
	}
	echo '</table><br />';
	echo 'Calcul du montant total des revenus:  <br />';
		print "le chiffre d'affaires de la sociéte est de : $chiffre_affaire €"; 
	
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	if(isset($_GET['suivi']))
	{	
		echo '<h2> Voici le détails pour une commande :</h2>';
		echo '<table table table-bordered>';
		echo '<tr>';
		$information_sur_une_commande = executeRequete("select * from details_commande where id_commande=$_GET[suivi]");
	
		//$nbcol = $information_sur_une_commande->field_count;
		//$nbcol = $information_sur_une_commande->field_count;
		echo "<table class='table table-bordered'> <tr>";
		//for ($i=0; $i < $nbcol; $i++)
		{    
			//$colonne = $information_sur_une_commande->fetch_field(); 
			//echo '<th>' . $colonne->name . '</th>';
			?>
			<thead>
					<tr>
						<th>Id_Détail_Commande</th>
						<th>Numéro de Commande</th>
						<th>Id_Produit</th>
						<th>Désignation</th>
						<th>Quantité</th>
						<th>Montant</th>
						<th>Photo</th>

					</tr>
				</thead> <?php
		}
		echo "</tr>";
		
		while ($details_commande = $information_sur_une_commande->fetch_assoc())

		{
			
			echo '<tr>';
				echo '<td>' . $details_commande['id_details_commande'] . '</td>';
				echo '<td>' . $details_commande['id_commande'] . '</td>';
				echo '<td>' . $details_commande['id_produit'] . '</td>';
				echo '<td>' . $details_commande['designation'] . '</td>';
				echo '<td>' . $details_commande['quantite'] . '</td>';
				echo '<td>' . $details_commande['prix'] . '</td>';
				echo "<td><img src=".RACINE_SITE.$details_commande['photo'] .  " width='70' height='70' /></td>";

			echo '</tr>';
		}
		echo '</table>';
	}require_once("../ctrl/footer.php");
}
else{ if(internauteEstConnecte()) {

//-------------------------------------------------- Affichage ---------------------------------------------------------//
require_once("../ctrl/header.php");
//require_once("../inc/menu.inc.php");
$id_membre = $_SESSION['membre']['id_membre'];

	echo '<h2> Voici les commandes passées sur le site </h2>';
	echo '<table border="1"><tr>';
	
	$information_sur_les_commandes = executeRequete("select id_commande,montant,date_enregistrement,etat from commande where id_membre = '$id_membre'");
	echo "Nombre de commande(s) : " . $information_sur_les_commandes->num_rows;
	echo "<table class='table table-bordered'> <tr>";
	//while($colonne = $information_sur_les_commandes->fetch_field())
	{    
		//echo '<th>' . $colonne->name . '</th>';
		?>
		<thead>
				<tr>
					<th>Commande</th>
					<th>Montant</th>
					<th>Date d'achat</th>
					<th>Etat</th>
					<th>Facture</th>
				</tr>
			</thead> <?php
	}
	echo "</tr>";
	$chiffre_affaire = 0;
	while ($commande = $information_sur_les_commandes->fetch_assoc())
	{
		$chiffre_affaire += $commande['montant'];
		echo '<div>';
		echo '<tr>';
		echo '<td><a href="gestion_commande.php?suivi=' . $commande['id_commande'] . '">Voir la commande ' . $commande['id_commande'] . '</a></td>';	
		echo '<td>' . $commande['montant'] . '€'.'</td>';
		echo '<td>' .strftime('%d-%m-%Y',strtotime($commande['date_enregistrement'])).'</td>';
		echo '<td>' . $commande['etat'] . '</td>';
		echo '<td><a class="" target="_blank" href="facture.php?id_commande='.$commande["id_commande"].'">Facture au format pdf</a></td>';
		echo '</tr>	';
		echo '</div>';
	}
	echo '</table><br />';
	
	
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	if(isset($_GET['suivi']))
	{	
		echo '<h2> Voici le détails pour une commande :</h2>';
		echo '<table table table-bordered>';
		echo '<tr>';
		$information_sur_une_commande = executeRequete("select * from details_commande where id_commande=$_GET[suivi]");
		
		//$nbcol = $information_sur_une_commande->field_count;
		echo "<table class='table table-bordered'> <tr>";
		//for ($i=0; $i < $nbcol; $i++)
		{    
			//$colonne = $information_sur_une_commande->fetch_field(); 
			//echo '<th>' . $colonne->name . '</th>';
			?>
			<thead>
					<tr>
						<th>Id_Détail_Commande</th>
						<th>Numéro de Commande</th>
						<th>Id_Produit</th>
						<th>Désignation</th>
						<th>Quantité</th>
						<th>Montant</th>
						<th>Photo</th>
					</tr>
				</thead> <?php
		}
		echo "</tr>";
		
		while ($details_commande = $information_sur_une_commande->fetch_assoc())
	
		{
			echo '<tr>';
				echo '<td>' . $details_commande['id_details_commande'] . '</td>';
				echo '<td>' . $details_commande['id_commande'] . '</td>';
				echo '<td>' . $details_commande['id_produit'] . '</td>';
				echo '<td>' . $details_commande['designation'] . '</td>';
				echo '<td>' . $details_commande['quantite'] . '</td>';
				echo '<td>' . $details_commande['prix'] .'€'. '</td>';
				echo "<td><img src=".RACINE_SITE.$details_commande['photo'] .  " width='70' height='70' /></td>";
			echo '</tr>';
		}
		echo '</table>';
	}require_once("../ctrl/footer.php");
	

}}?>
</body>