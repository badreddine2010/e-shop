
	
<?php
require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");?>
    <?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- VERIFICATION ADMIN ---//
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}

//--- SUPPRESSION PRODUIT ---//
if(isset($_GET['action']) && $_GET['action'] == "suppression")
{	// echo $_GET['id_produit']
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit=$_GET[id_produit]");
	$produit_a_supprimer = $resultat->fetch_assoc();
	$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];
	if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer))	unlink($chemin_photo_a_supprimer);
	echo '<div class="validation">Suppression du produit : ' . $_GET['id_produit'] . '</div>';
	executeRequete("DELETE FROM produit WHERE id_produit=$_GET[id_produit]");
	$_GET['action'] = 'affichage';
}
//--- ENREGISTREMENT PRODUIT ---//
if(!empty($_POST))
{	// debug($_POST);
	$photo_bdd = ""; 
	if(isset($_GET['action']) && $_GET['action'] == 'modification')
	{
		$photo_bdd = $_POST['photo_actuelle'];
	}
	if(!empty($_FILES['photo']['name']))
	{	// debug($_FILES);
		$nom_photo = $_FILES['photo']['name'];
		$photo_bdd = RACINE_SITE . "photo/$nom_photo";
		
		$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$nom_photo"; 
		copy($_FILES['photo']['tmp_name'],$photo_dossier);
	}
	foreach($_POST as $indice => $valeur)
	{
		$_POST[$indice] = htmlEntities(addSlashes($valeur));
	}
	executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) values ('$_POST[id_produit]', '$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')");
	echo '<div class="validation">Le produit a été enregistré avec succès!!!</div>';
	$_GET['action'] = 'affichage';
}
//--- LIENS PRODUITS ---//
//echo '<a href="?action=affichage">Affichage des produits</a><br />';
//echo '<a href="?action=ajout">Ajout d\'un produit</a><br /><br /><hr /><br />';
//--- AFFICHAGE PRODUITS ---//
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
	$resultat = executeRequete("SELECT * FROM produit");
	?><div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center"><?php
	echo '<h2> Affichage des produits </h2>';

	//echo 'Nombre de produit(s) dans la boutique : ' . $resultat->num_rows;
	echo '<table class="table table-bordered"><tr>';
	
	while($colonne = $resultat->fetch_field())
	{    
		echo '<th>' . $colonne->name . '</th>';
	}
	echo '<th>Modification</th>';
	echo '<th>Supression</th>';
	echo '</tr>';

	while ($ligne = $resultat->fetch_assoc())
	{
		echo '<tr>';
		foreach ($ligne as $indice => $information)
		{
			if($indice == "photo")
			{
				echo '<td><img src="' . $information . '" width="70" height="70" /></td>';
			}
			else
			{
				echo '<td>' . $information . '</td>';
			}
		}
		echo '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] .'"><img src="../ctrl/img/edit.png" /></a></td>';
		echo '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../ctrl/img/delete.png" /></a></td>';
		echo '</tr>';
	}
	echo '</table><br />';
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
{
	if(isset($_GET['id_produit']))
	{
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit=$_GET[id_produit]");
		$produit_actuel = $resultat->fetch_assoc();
	}?>

<div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center"><?php
	echo '

	<h2> Formulaire Produit </h2>
	<div class="box">
	<form method="post" enctype="multipart/form-data" action="">
	
		<input type="hidden" id="id_produit"  name="id_produit" value="'; if(isset($produit_actuel['id_produit'])) echo $produit_actuel['id_produit']; echo '" />
			
		<label for="reference">Référence</label><br />
		<input type="text" class="form-control" id="reference" name="reference" required placeholder="la référence de produit" value="'; if(isset($produit_actuel['reference'])) echo $produit_actuel['reference']; echo '" /><br />

		<label for="categorie">Catégorie</label><br />
		<input type="text" class="form-control" id="categorie" name="categorie" required placeholder="la categorie de produit" value="'; if(isset($produit_actuel['categorie'])) echo $produit_actuel['categorie']; echo '"  /><br />

		<label for="titre">Titre</label><br>
		<input type="text" class="form-control" id="titre" name="titre" required placeholder="le titre du produit" value="'; if(isset($produit_actuel['titre'])) echo $produit_actuel['titre']; echo '"  /> <br />

		<label for="description">Description</label><br />
		<textarea name="description" id="description" required placeholder="la description du produit">'; if(isset($produit_actuel['description'])) echo $produit_actuel['description']; echo '</textarea><br />
		
		<label for="couleur">Couleur</label><br />
		<input type="text" class="form-control" id="couleur" name="couleur" required placeholder="la couleur du produit"  value="'; if(isset($produit_actuel['couleur'])) echo $produit_actuel['couleur']; echo '" /> <br />

		<label for="taille">Taille</label><br />
		<select required name="taille">
			<option value="S"'; if(isset($produit_actuel) && $produit_actuel['taille'] == 'S') echo ' selected '; echo '>S</option>
			<option value="M"'; if(isset($produit_actuel) && $produit_actuel['taille'] == 'M') echo ' selected '; echo '>M</option>
			<option value="L"'; if(isset($produit_actuel) && $produit_actuel['taille'] == 'L') echo ' selected '; echo '>L</option>
			<option value="XL"'; if(isset($produit_actuel) && $produit_actuel['taille'] == 'XL') echo ' selected '; echo '>XL</option>
		</select><br />

		<label for="public">Public</label><br />
		<input required type="radio" name="public" value="m"'; if(isset($produit_actuel) && $produit_actuel['public'] == 'm') echo ' checked '; elseif(!isset($produit_actuel) && !isset($_POST['public'])) echo 'checked'; echo '/>Homme
		<input required type="radio" name="public" value="f"'; if(isset($produit_actuel) && $produit_actuel['public'] == 'f') echo ' checked '; echo '/>Femme<br>
		
		<label for="photo">Photo</label><br />
		<input class="form-control" type="file" id="photo" name="photo" /><br />';
		if(isset($produit_actuel))
		{
			echo '<i>Vous pouvez charger une nouvelle photo si vous souhaitez la changer</i><br />';
			echo '<img src="' . $produit_actuel['photo'] . '"  width="90" height="90" /><br />';
			echo '<input type="hidden" name="photo_actuelle" value="' . $produit_actuel['photo'] . '" /><br />';
		}
		
		echo '
		<label for="prix">Prix</label><br />
		<input required type="text" class="form-control" id="prix" name="prix" placeholder="le prix du produit"  value="'; if(isset($produit_actuel['prix'])) echo $produit_actuel['prix']; echo '" /><br />
		
		<label for="stock">Stock</label><br />
		<input required type="text" id="stock" class="form-control" name="stock" placeholder="le stock du produit"  value="'; if(isset($produit_actuel['stock'])) echo $produit_actuel['stock']; echo '" /><br />
		
		<input type="submit" class="col-12 col-md-12 btn btn-primary" value="'; echo ucfirst($_GET['action']) . ' du produit"/>
	</form>
	</div>
	
	</div>
	
	</div>
	
	</div>
	';
}
require_once("../ctrl/footer.php"); ?>
