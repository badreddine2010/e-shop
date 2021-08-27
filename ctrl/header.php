<!Doctype html>
<html>
        <head>
		<link rel="icon" href="/favicon.ico" />
		<!-- CSS only -->
		
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script></head>
    
		<title>E_shop.com</title>
		</head>
	
		<header class="container-fluid">
	<div id="header" class="container-fluid">
		<nav id="barre-e_shop" class="navbar">


				<a class="navbar-brand" href="<?php echo RACINE_SITE; ?>index.php"><p><img src='<?=RACINE_SITE?>ctrl/img/logo.jpeg' width="50" height="40" /></p>
					<?php
					if(internauteEstConnecteEtEstAdmin()) // admin
					{ // BackOffice
						?><span class="navbar-brand mb-0 h1"><?php
						echo '<b><a  class="nav-link"  href="' . RACINE_SITE . 'admin/gestion_membre.php">Membres</a></b>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						//echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=affichage">Produits</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=ajout">Ajout produit</a>';?></span><?php		

					}
					if(internauteEstConnecte()) // membre et admin
					{?><span class="navbar-brand mb-0 h1"><?php
						echo '<b><a class="nav-link" href="' . RACINE_SITE . 'vue/membres.php">Modifier profil</a></b>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="'.RACINE_SITE.'" >Accès boutique</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/panier.php">Panier</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/gestion_commande.php">Commandes</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/connexion.php?action=deconnexion">Logout</a>';?></span><?php
						
					}
					else // visiteur
					{?><span class="navbar-brand mb-0 h1"><span class="navbar-brand mb-0 h1"><?php
						echo '<b><a class="nav-link" href="' . RACINE_SITE . '" >Accueil</a></b>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/inscription.php">Inscription</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/panier.php">Voir votre panier</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						//echo '<a class="nav-link" href="' . RACINE_SITE . '" >Accès à la boutique</a>';
						echo '<a class="nav-link" href="' . RACINE_SITE . 'vue/connexion.php">Login</a>';?></span><?php

						
					}
					// visiteur=4 liens - membre=4 liens - admin=7 liens
					?>
					</form>
			
				
				<center>
				
				<div id="search">
					<form  class="d-flex" action="<?=RACINE_SITE?>vue/recherche.php" method="GET">
					
						<input class="form-control me-2" name="searcharea" type="search" placeholder="Search" aria-label="Search">
				
						<button class="btn btn-outline-mu my-2 my-sm-0" type="submit" name="search"><img src='<?=RACINE_SITE?>ctrl/img/search.png'></button>
					</form>
				</div>
				</nav>
				</center>
				
			</div>
	</div>

	</header>
	<body class="">
		<div class="container-fluid">

		