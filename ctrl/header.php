<!Doctype html>
<html>
<<<<<<< HEAD
        <head>
=======
<head>
>>>>>>> d73a1dc0bac2577b24b8b2aa24c2499edfdf454c
		<!-- CSS only -->
		
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script></head>
<link href="http://localhost/e-shop/ctrl/img/logo.jpeg" rel="icon" type="image/jpeg" />
		<title>E_shop.com</title>
		</head>
			
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">      <img src="<?php echo RACINE_SITE; ?>ctrl/img/logo.jpeg" class="d-block w-70 " alt="..." width="32" height="30">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo RACINE_SITE; ?>">Accueil</a>
        </li>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

		<?php if(internauteEstConnecteEtEstAdmin()) {?>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>admin/gestion_boutique.php?action=affichage" >Produits</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href='<?php echo RACINE_SITE; ?>admin/gestion_membre.php'>Membres</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>admin/gestion_boutique.php?action=ajout">Ajout Produit</a>
        </li>

       					<?php } if(internauteEstConnecte()) {?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/membres.php">Profil</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/panier.php">Panier</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/gestion_commande.php">Commandes</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/connexion.php?action=deconnexion">Logout</a>
        </li>
      </ul>
<a class="nav" href="<?php echo RACINE_SITE; ?>vue/connexion.php"><i class="bi bi-person"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg><?=$_SESSION['membre']['prenom']?></i></a>       
        
        <?php } else { ?>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/inscription.php">Inscription</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/panier.php"><i class="bi bi-cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></i></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>vue/connexion.php"><i class="bi bi-person"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg></i></a>
        </li>
      </ul>
      <?php } ?>
	  
      <form action="<?=RACINE_SITE?>vue/recherche.php" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
		
=======
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
>>>>>>> d73a1dc0bac2577b24b8b2aa24c2499edfdf454c
