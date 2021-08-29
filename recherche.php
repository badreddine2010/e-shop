<body class="conteneur">

<?php
	// Initialiser la session

    require_once("inc/init.inc.php");
    require_once("inc/header.php");
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
		$get_prod_search="select * from produit where titre like '%$searcharea%' ";
		$resultat=$mysqli->query($get_prod_search);
        echo '<h2> Résultat de votre recherche</h2>';
            if(mysqli_num_rows($resultat) > 0){	
                while($produit = $resultat->fetch_assoc()){
                $contenu .= "<h3>Titre : $produit[titre]</h3><hr/><br />";
                $contenu .= "<p>Categorie: $produit[categorie]</p>";
                $contenu .= "<p>Couleur: $produit[couleur]</p>";
                $contenu .= "<p>Taille: $produit[taille]</p>";
                $contenu .= "<img src='$produit[photo]' width='150' height='150' />";
                $contenu .= "<p><i>Description: $produit[description]</i></p><br />";
                $contenu .= "<p>Prix : $produit[prix] €</p><br />";
                $contenu .= "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br /><br />";
        }
//--------------------------------- AFFICHAGE HTML ---------------------------------//
        echo $contenu;	
    } else{
        $contenu .= '<div class="erreur">Aucun produit disponible</div>';

    echo $contenu;
       
    }
    }
require_once("inc/footer.php");?>
</body>
