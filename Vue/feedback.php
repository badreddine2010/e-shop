<?php
	require_once("../ctrl/init.ctrl.php");
	require_once("../ctrl/header.php");
?>

<?php
							if(isset($_POST['submit']))
							{
								$commentaire = $_POST['comment'];
								$nom=$_POST['nom'];
								$now = date('Y-m-d');
		
								$query = executeRequete("INSERT into `comments` (nom,comment,dater)
								VALUES ('$nom','$commentaire','$now')");
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
				<h2>Si vous avez des suggestions ou des questions, veuillez écrire ci-dessous :</h2><br>
					<form style="" action="" method="post">
							<textarea class="form-control" type="text" name="comment" placeholder="Ecrire Quelque Chose..." required></textarea><br><br>
                            <input class="form-control" type="text" name="nom" placeholder="Votre nom" required><br><br>		
                            <button type="submit" name="submit" class="col-12 col-md-12 btn btn-primary">Envoyer votre commentaire </button></td></tr>					
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