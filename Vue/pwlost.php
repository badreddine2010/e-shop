

<?php
	$_SESSION['root']="http://.RACINE_SITE./e_shop";
	

    require_once("../ctrl/init.ctrl.php");
    require_once("../ctrl/header.php");
	?>
		<?php
	@$email=$_POST["email"];
	
	@$valider=$_POST["valider"];
	
	if(isset($valider)){

		if(empty($email)) $message="email invalide!";
		
		if(empty($message)){


            $resultat = executeRequete("SELECT * FROM membre WHERE email='$_POST[email]'");
   
            $membre = $resultat->fetch_assoc();
			
            
            if($resultat->num_rows === 0) {
				
                $message="Adresse e-mail n'existe pas!";

            }else{

				if($membre["valideuser"]!=0){


					$sqlQuery = executeRequete("UPDATE membre SET changepwd=1  WHERE email='$email'");
			

					$message="Vous avez reçu un lien sur votre boite mail pour modifier votre mot de passe!";

					echo '
					<div id="modal" class="modal fade show show-message" tabindex="-1">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Information</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						  <p>'.$message.'</p>
						</div>
						<div class="modal-footer">
						<a id="btn-modal" class="btn btn-primary" data-bs-toggle="modal" href="'.RACINE_SITE.'/index.php" role="button" data-bs-dismiss="modal">OK</a>			  
						</div>
					  </div>
					</div>
				  </div>';

				}else{

					$message="Votre compte n'a pas encore été validé par l'administrateur";
	
				}      
				
			}
		}
	}

	
?>
<div class="jumbotron">
    
<h2> Mot de passe oublié </h2>


    <form class="box" action="" method="post" name="login">
	
        <div class="mb-3">
            <h4 class="title">Vous avez oublié votre mot de passe</h4>
        </div>    

		<div class="form-floating mb-3">
			<input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
			<label for="floatingInput">Adresse e-mail</label>
		</div>
        <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
        <div class="center col-md-6 col-lg-4">
			<input type="submit" value="Envoyer " name="valider" class="col-12 col-md-12 btn btn-primary">
        </div>
	
    </form>
</div>
<?php require_once("../ctrl/footer.php"); ?>
