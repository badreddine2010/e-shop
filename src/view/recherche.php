

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
                    echo "<h3>Titre : $produit[titre]</h3><hr /><br />";
                    echo "<p>Categorie: $produit[categorie]</p>";
                    echo "<p>Couleur: $produit[couleur]</p>";
                    echo "<p>Taille: $produit[taille]</p>";
                    echo "<img src=".RACINE_SITE.$produit['photo']." width='150' height='150' />";
                    echo "<p><i>Description: $produit[description]</i></p><br />";
                    echo "<p>Prix : $produit[prix] €</p><br />";
                    
                    if($produit['stock'] > 0)
                    {
                        echo "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br /><br />";
                        echo '<form method="post" action="panier.php">';
                            echo "<input type='hidden' name='id_produit' value='$produit[id_produit]' />";
                            echo '<label for="quantite">Quantité : </label>';
                            echo '<select id="quantite" name="quantite">';
                                for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++)
                                {
                                    echo "<option>$i</option>";
                                }
                            echo '</select>';
                            echo '<button type="submit"  name="ajout_panier" class="col-12 col-md-2 btn btn-primary"> Ajout panier </button></td></tr>';
                        echo '</form>';
                    }
                    else
                    {
                        echo 'Rupture de stock !';
                    }
                    echo "<br /><a href='index.php?categorie='></a>";
                    
        }
//--------------------------------- AFFICHAGE HTML ---------------------------------//
    } else{
        echo '<div class="alert alert-warning">Aucun produit disponible</div>';
       
    }
    }?><?php
require_once("../ctrl/footer.php");?>
