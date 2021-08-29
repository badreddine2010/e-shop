

<?php
	// Initialiser la session

    require_once("../ctrl/init.ctrl.php");
    require_once("../ctrl/header.php");
    ?>
    <?php
?>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/style2.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
			<?php
        if(isset($_GET['search'])){
		$searcharea=$_GET['searcharea'];
		$get_prod_search="select * from produit where titre like '$searcharea%' ";
		$resultat=$mysqli->query($get_prod_search);
        echo '<h2> Résultat de votre recherche</h2>';
            if(mysqli_num_rows($resultat) > 0){	
                while($produit = $resultat->fetch_assoc()){
                echo "<h3>Titre : $produit[titre]</h3><hr/><br>";
                echo "<p>Categorie: $produit[categorie]</p>";
                echo "<p>Couleur: $produit[couleur]</p>";
                echo "<p>Taille: $produit[taille]</p>";
                echo "<img src=".RACINE_SITE.$produit['photo']." width='150' height='150' />";
                echo "<p><i>Description: $produit[description]</i></p><br />";
                echo "<p>Prix : $produit[prix] €</p><br />";
                echo "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br><br><br><br>";
        }
//--------------------------------- AFFICHAGE HTML ---------------------------------//
    } else{
        echo '<div class="alert alert-warning">Aucun produit disponible</div>';
       
    }
    }?><?php
require_once("../ctrl/footer.php");?>

