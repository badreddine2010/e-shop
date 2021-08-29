<body class="conteneur">
<?php
require_once("inc/init.inc.php");
require_once("inc/header.php");
if(isset($_GET['msg']) && $_GET['msg'] == "supok")
{
	executeRequete("delete from membre where id_membre=$_GET[id_membre]");
	header("Location:connexion.php?action=deconnexion");
}
if($_POST)
{
	if(!empty($_POST['mdp']))
	{
		executeRequete("update membre SET  mdp='".hash('sha256', $_POST['mdp'])."', nom='$_POST[nom]', prenom='$_POST[prenom]', email='$_POST[email]', civilite='$_POST[civilite]', ville='$_POST[ville]', code_postal='$_POST[code_postal]', adresse='$_POST[adresse]' where id_membre='".$_SESSION['membre']['id_membre']."'");
		unset($_SESSION['membre']);		
		foreach($membre as $indice => $element)
		{
			if($indice != 'mdp')
			{
				$_SESSION['membre'][$indice] = $element;
			}
			else
			{
				$_SESSION['membre'][$indice] = $_POST['mdp'];
			}
		}
		header("Location:membres.php?action=modif");
	}
	else
	{
		echo "le nouveau mot de passe doit être renseigné !";
	}
}
if(isset($_GET['action']) && $_GET['action'] == 'modif')
{
	echo '<meta http-equiv="refresh" content="1; url=\'connexion.php\'">';
echo "<script>alert(\"la modification a bien été prise en compte, reconnectez-vous!!!\")</script>";

	
}


//require_once("inc/menu.inc.php");
// se désabonner
?><span class="navbar-brand mb-0 h1"><?php
echo "<td><a href='membres.php?msg=supok&&id_membre=" . $_SESSION['membre']['id_membre'] . "' onclick='return(confirm(\"Etes-vous sûr de vouloir supprimer votre compte?\"));'> Se désabonner </a></td>";
?></span><?php
?>
		<h2> Modification de vos informations </h2>
		
		<form class="box" method="post" action="">
		<input type="hidden" id="id_membre" name="id_membre" value="<?php if(isset($_SESSION['membre'])) echo $_SESSION['membre']['id_membre']; ?>" />

		<div class="mb-3">
			<label for="civilite">civilite</label>
					<select class="form-control" name="civilite">
						<option value="M." <?php if(isset($_SESSION['membre']['civilite']) && $_SESSION['membre']['civilite'] == "M.") print "selected"; ?>>M.</option>
						<option value="Mme" <?php if(isset($_SESSION['membre']['civilite']) && $_SESSION['membre']['civilite'] == "Mme") print "selected"; ?>>Mme</option>
					</select><br />
					</div>

		
				<div class="mb-3">
			<label for="nom">Nom</label>
				<input type="text" class="form-control" name="nom" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['nom']; ?>"/><br />
				</div>
				<div class="mb-3">
			<label for="prenom">Prénom</label>
				<input type="text" class="form-control" name="prenom" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['prenom']; ?>"/><br />
				</div>
				<div class="mb-3">
			<label for="email">Email</label>
				<input type="text" class="form-control" name="email" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['email']; ?>"/><br />
				</div>
			
					<div class="mb-3">	
			<label for="ville">Ville</label>
				<input type="text" class="form-control" name="ville" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['ville']; ?>"/><br />
				</div>
				<div class="mb-3">
		<label for="cp">Cp</label>
			<input type="text" class="form-control" name="code_postal" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['code_postal']; ?>"/><br />
			</div>
			<div class="mb-3">
		<label for="adresse">Adresse</label>
					<textarea class="form-control" name="adresse"><?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['adresse']; ?></textarea>
					<input type="hidden" name="statut" value="<?php if(isset($_SESSION['membre'])) print $_SESSION['membre']['statut']; ?>"/><br />
					</div>
					<div class="mb-3">
			<label for="mdp">Mot de passe</label>
				<input type="password" class="form-control" name="mdp" value="<?php if(isset($mdp)) echo $_SESSION['membre']['mdp']; ?>"/><br />
				</div>
			<br /><br />
			 <button type="submit" name="modification" class="col-12 col-md-12 btn btn-primary"> Mise à jour </button>	
			</form>
<?php require_once("inc/footer.php");?>
</body>