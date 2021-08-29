<?php
require_once("ctrl/init.ctrl.php");
require_once("ctrl/header.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AFFICHAGE DES CATEGORIES ---//
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
echo '<div id="header">';
echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">';
echo '<div class="container">';

while($cat = $categories_des_produits->fetch_assoc())
{
	echo"<a class='link-dark' href='" . RACINE_SITE . "/vue/vitrine.php?categorie="	. $cat['categorie'] . "'>" . $cat['categorie'] . "</a>";
}

echo"</nav>";

echo'<div class="boutique-droite">';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script></head>
</head>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="photo\1.jpg" class="d-block w-70 " alt="..." width="1500" height="300">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="photo\2.jpg" class="d-block w-70" alt="..." width="1500" height="300">
    </div>
    <div class="carousel-item">
      <img src="photo\3.jpg" class="d-block w-70" alt="..." width="1500" height="300">
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
echo"</div>";

//--- AFFICHAGE DES PRODUITS ---//
echo'<div class="boutique-milieu">';

if(isset($_GET['categorie']))
{
	$donnees = executeRequete("SELECT id_produit,reference,titre,photo,prix FROM produit WHERE categorie='$_GET[categorie]'");	
	while($produit = $donnees->fetch_assoc())
	{
	

echo'<div class="card" style="width: 16rem;">';
echo"<a href=\"vue/fiche_produit.php?id_produit=$produit[id_produit]\"><img src=\"$produit[photo]\" width=\"130\" height=\"188\" class='card-img-top'/></a>";
echo '<div class="card-body">';
echo "<h5 class='card-title'>$produit[titre]</h5>";
echo"<p>$produit[prix] €</p>";
echo'<a href="vue/fiche_produit.php?id_produit=' . $produit['id_produit'] . '" class="btn btn-primary">Voir la fiche</a>';
echo'</div>';
echo'</div>';
	}}
?>
<head>
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style1.css" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<?php
 require_once("ctrl/footer.php");?>




