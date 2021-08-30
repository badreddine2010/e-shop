
	

<?php

require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}
if(isset($_GET['msg']) && $_GET['msg'] == "supok")
{
	executeRequete("delete from membre where id_membre=$_GET[id_membre]");
	header("Location:gestion_membre.php");
}
//-------------------------------------------------- Affichage ---------------------------------------------------------//

//require_once("../ctrl/menu.ctrl.php");
?>
	   <!-- For demo purpose -->
	  <?php
echo '<h2> Voici les membres inscrits au site </h2>';
	$resultat = executeRequete("SELECT id_membre,nom,prenom,email,ville,code_postal,adresse FROM membre where statut='user'");
	echo "Nombre de membre(s) : " . $resultat->num_rows;
	echo "<table class='table table-bordered'> <tr>";
	while($colonne = $resultat->fetch_field())
	{    
		echo '<th>' . $colonne->name . '</th>';
	}
	echo '<th> Supprimer </th>';
	echo "</tr>";
	while ($membre = $resultat->fetch_assoc())
	{
		echo '<tr>';
		foreach ($membre as $information)
		{
			echo '<td>' . $information . '</td>';
		}
		echo "<td><a href='gestion_membre.php?msg=supok&&id_membre=" . $membre['id_membre'] . "' onclick='return(confirm(\"Etes-vous sûr de vouloir supprimer ce membre?\"));'> <img src='../ctrl/img/delete.png' /> </a></td>";
		
		echo '</tr>';
	}
	echo '</table>';
	?>
	</div>


	 <?php require_once("../ctrl/footer.php");?>
	