
<?php require_once("../ctrl/init.ctrl.php");?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style.css" />

</head>

<?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//

if(internauteEstConnecte()) 
{
	header("location:profil.php");
}
if($_POST)
{ 
    $_POST['email'] = htmlentities($_POST['email'], ENT_QUOTES);

    $resultat = executeRequete("SELECT * FROM membre WHERE email='$_POST[email]'");
   
    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();
        
        if($membre['mdp'] == hash('sha256', $_POST['mdp']))
        {
            foreach($membre as $indice => $element) 
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element; 
                }
            }
            header("location:profil.php"); 
        }
        else
        {
            echo '<div class="alert alert-warning">Erreur de MDP</div>';
        }       
    }
    else
    {
        echo '<div class="alert alert-warning">Erreur de email</div>';
    }
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//

 ?>
<p class="box-return"><a href="<?php echo RACINE_SITE; ?>"><i class="bi bi-skip-backward-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
  <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
</svg></i>
			<u>Retour</u></a></p>
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
 <h2> Connexion </h2>
<form class="box" method="post" action="">
    <label for="email">Email</label><br />
    <input type="text" class="form-control" id="email" name="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /><br /> <br />
         
    <label for="mdp">Mot de passe</label><br />
    <input type="password" class="form-control" id="mdp" name="mdp" /><br /><br />
 
    <button type="submit"  class="col-12 col-md-12 btn btn-primary"> Se connecter </button></td></tr>
</form>
<p class="box-register"><a href="pwlost.php"><u>Vous avez oublié votre mot de passe ?</u></a></p>

</div>
</div>

