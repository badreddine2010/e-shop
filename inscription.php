<body class="conteneur">
<?php
require_once("inc/init.inc.php");

if(isset($_REQUEST['mdp'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['email'], $_REQUEST['civilite'], $_REQUEST['ville'], $_REQUEST['code_postal'], $_REQUEST['adresse']))
{
	
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$mdp = stripslashes($_REQUEST['mdp']);
	$mdp = mysqli_real_escape_string($mysqli,$mdp); 
	$repass = stripslashes($_REQUEST['repass']);
	$repass = mysqli_real_escape_string($mysqli,$repass); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($mysqli, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$nom = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($mysqli, $nom);
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($mysqli, $prenom);
	$civilite = mysqli_real_escape_string($mysqli, $prenom);
	$ville = stripslashes($_REQUEST['ville']);
	$ville= mysqli_real_escape_string($mysqli, $ville);
	$code_postal = stripslashes($_REQUEST['code_postal']);
	$code_postal = mysqli_real_escape_string($mysqli, $code_postal);
	$adresse = stripslashes($_REQUEST['adresse']);
	$adresse = mysqli_real_escape_string($mysqli, $adresse);

	if($mdp!=$repass) {
	
		echo "<script>alert ('Mots de passe non identiques!!!!!');</script>";
		echo '<meta http-equiv="refresh" content="2; url=\'inscription.php\'">';
		exit();}
	
		$membre = executeRequete("SELECT * FROM membre WHERE email='$_POST[email]'"); 
		if(mysqli_num_rows($membre)) {

			echo "<script>alert(\"email existedéjà!!!\")</script>";

					echo '<meta http-equiv="refresh" content="2; url=\'inscription.php\'">';
					exit();
		}
			executeRequete("INSERT INTO membre ( mdp, nom, prenom, email, civilite, ville, code_postal, adresse,statut) VALUES ('".hash('sha256', $_POST['mdp'])."', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]', 'user' )");
			$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
	
}

?>
<?php require_once("inc/header.php"); ?>
<?php echo $contenu; ?>
<h2> Inscription </h2>

<div class="box">
<form method="post" action="">

         
<label for="civilite">Civilité</label><br>
    <input name="civilite" value="M." checked="" type="radio">M.
    <input name="civilite" value="Mme" type="radio">Mme<br>
         
    <label for="nom">Nom</label><br>
    <input type="text" class="form-control" required id="nom" name="nom" placeholder="votre nom"><br>
         
    <label for="prenom">Prénom</label><br>
    <input type="text" class="form-control" required id="prenom" name="prenom" placeholder="votre prénom"><br>
 
    <label for="email">Email</label><br>
    <input type="email" class="form-control" required id="email" name="email" placeholder="exemple@gmail.com" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
         
    
                 
    <label for="ville">Ville</label><br>
    <input type="text" class="form-control" required id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br>
         
    <label for="cp">Code Postal</label><br>
    <input type="text" class="form-control" required id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br>
         
    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" required placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br>

	<label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" class="form-control" name="mdp" required="required"><br>

	<div class="mb-3">
            <label for="floatingInput">Confirmation du mot de passe</label>
            <input type="password" class="form-control" name="repass" placeholder=""
                required>
        </div>
 
	 <button type="submit" name="inscription" class="col-12 col-md-12 btn btn-primary"> S'inscrire </button>
</form>
</div>

<?php require_once("inc/footer.php"); ?>
	</body>

