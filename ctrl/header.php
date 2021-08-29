<!Doctype html>
<html>
<head>
		<!-- CSS only -->
		
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<meta charset="utf-8">

<link href="photo/e_shop_logo.png" rel="icon" type="photo/png" />

<title>E_shop.com</title>
</head>
	
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="img/e_shop_logo.png" class="d-block w-70" alt="..." width="32" height="30">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
					
	<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
						<?php if(internauteEstConnecteEtEstAdmin()){ ?>
						<li class="nav-item"><?php
						echo '<a  class="nav-link"  href="' . RACINE_SITE . 'admin/gestion_membre.php">Membres</a>';?>
						</li>

						<li class="nav-item"><?php
						//echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=affichage">Produits</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=ajout">Ajout produit</a>';?>
						</li>

						<?php } if(internauteEstConnecte()) { ?>
						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/membres.php">Modifier profil</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="'.RACINE_SITE.'" >Accès boutique</a>';?></li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/panier.php">Panier</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/gestion_commande.php">Commandes</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/connexion.php?action=deconnexion">Logout</a>';?>
						</li>

						<?php } else { ?>        
						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . '" >Accueil</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/inscription.php">Inscription</a>';?>
						</li>

						<li class="nav-item"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/panier.php">Voir votre panier</a>';?>
						</li>

						<li class="nav-item"><?php
						//echo '<a class="nav-link" href="' . RACINE_SITE . '" >Accès à la boutique</a>';
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/connexion.php">Login</a>';?>
						</li>
						<?php } ?>
				
				</ul>
				
					<form  class="d-flex" action="<?=RACINE_SITE?>vue/recherche.php" method="GET">
					
						<input class="form-control me-2" name="searcharea" type="search" placeholder="Search" aria-label="Search">
				
						<button class="btn btn-outline-mu my-2 my-sm-0" type="submit" name="search"><img src='<?=RACINE_SITE?>ctrl/img/search.png'></button>
					</form>
				</div>
				</div>

				</nav>