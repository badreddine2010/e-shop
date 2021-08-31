<?php
require_once("ctrl/init.ctrl.php");
require_once("ctrl/header.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AFFICHAGE DES CATEGORIES ---//
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");?>
<center><?php
echo '<div class="container-fluid">';

	echo"<h1><a class='link-blue active' href='" . RACINE_SITE . "/vue/vitrine.php'>Notre Catalogue</a></h1>";

echo"</nav>";?>
</div>
</center><?php
echo'<div class="container">';
?>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="photo\1.jpg" class="d-block w-70 " alt="..." width="auto" height="308">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="photo\2.jpg" class="d-block w-70" alt="..." width="auto" height="305">
    </div>
    <div class="carousel-item">
      <img src="photo\3.jpg" class="d-block w-70" alt="..." width="auto" height="303">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//

$donnees = executeRequete("SELECT id_produit,reference,titre,photo,prix FROM produit");	
	while($produit = $donnees->fetch_assoc())
	{
	?>
<center><?php
echo'<div class="card" style="width: 16rem;">';
echo"<a href=\"vue/fiche_produit.php?id_produit=$produit[id_produit]\"><img src=".RACINE_SITE.$produit['photo']." width=\"120\" height=\"188\" class='card-img-top'/></a>";
echo '<div class="card-body">';
echo "<h5 class='card-title'>$produit[titre]</h5>";
echo"<p>$produit[prix] €</p>";
echo'<a href="vue/fiche_produit.php?id_produit=' . $produit['id_produit'] . '" class="btn btn-primary">Voir la fiche</a>';
echo'</div>';
echo'</div>';
	}echo"</div>";
  
?></center>
<head>
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style1.css" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<?php
 require_once("ctrl/footer.php");?>




