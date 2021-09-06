<?php
	require_once("../ctrl/init.ctrl.php");
	require_once("../ctrl/header.php");
?>

<?php
							if(isset($_POST['valider']))
							{
								$commentaire = $_POST['comment'];
								$objet = $_POST['objet'];
								$nom=$_POST['nom'];
								$now = date('Y-m-d');
		
								$query = executeRequete("INSERT into `comments` (nom,objet,comment,dater)
								VALUES ('$nom','$objet','$commentaire','$now')");
								echo "<script>alert(\"On a bien reçu votre commentaire, nous le traitons dans les meilleurs délais\")</script>";
							}
						?>

<!DOCTYPE html>
<html>

<body>
	<div class="wrapper">
	
		<section>
		<br><br><br>
			<div class="wrap">
				<h2>Votre Commentaire</h2><br>
					<form  action="" method="post">
							<input class="form-control" type="text" name="nom" placeholder="Votre nom" required><br><br>
							<input class="form-control" type="text" name="objet" placeholder="L'objet de votre commentaire" required><br><br>		
							<textarea class="form-control" type="text" name="comment" placeholder="Rédiger votre commentaire ici..." required></textarea><br><br>
                            <button type="submit" name="valider" class="col-12 col-md-12 btn btn-primary">Envoyer votre commentaire </button></td></tr>					
                        </form>
				<br><br>
					<div class="scroll">
						
					</div>
			</div>
		<br><br><br><br><br><br>
		</section>
		<?php require_once '../ctrl/footer.php'?>
	</div>
</body>
</html>