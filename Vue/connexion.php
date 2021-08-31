
<head>
<?php

require_once("../ctrl/init.ctrl.php");?>
<?php require_once("../ctrl/header.php");?>
<?php
?></head>
<?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") 
{
	session_destroy(); 
    header("location:../index.php"); 

}
if(internauteEstConnecte()) 
{
	header("location:profil.php");
}
if($_POST)
{ 
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

<?php require_once("../ctrl/footer.php"); ?>
