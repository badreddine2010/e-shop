<!Doctype html>
<html>
    <header>
        
        <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css" />
		<link rel="icon" href="/favicon.ico" />
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<title>E_shop.com</title>

		<body>
	
  
	  
	
				<nav class="navbar" >
				<div class="container-fluid">
				<form class="d-flex ">
				<p> <img src='<?=RACINE_SITE?>inc/img/e_shop_logo.png' width="60" height="50" />
		  <b>E-SHOP</b></p>
					<?php
					if(internauteEstConnecteEtEstAdmin()) // admin
					{ // BackOffice
						?><span class="navbar-brand mb-0 h1"><?php
						echo '<a  class="nav-link"  href="' . RACINE_SITE . 'admin/gestion_membre.php">Membres</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						//echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=affichage">Produits</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a  class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php?action=ajout">Ajout produit</a>';?></span><?php		

					}
					if(internauteEstConnecte()) // membre et admin
					{?><span class="navbar-brand mb-0 h1"><?php
						echo '<a class="nav-link" href="' . RACINE_SITE . 'membres.php">Modifier profil</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="'.RACINE_SITE.'" >Accès boutique</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'panier.php">Panier</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'gestion_commande.php">Commandes</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Logout</a>';?></span><?php
						
					}
					else // visiteur
					{?><span class="navbar-brand mb-0 h1"><?php
						echo '<a class="nav-link" href="." >Accueil</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'inscription.php">Inscription</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						echo '<a class="nav-link" href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';?></span><?php
						?><span class="navbar-brand mb-0 h1"><?php

						//echo '<a class="nav-link" href="' . RACINE_SITE . '" >Accès à la boutique</a>';
						echo '<a class="nav-link" href="' . RACINE_SITE . 'connexion.php">Login</a>';?></span><?php

						
					}
					// visiteur=4 liens - membre=4 liens - admin=7 liens
					?>
					</form>
			
				
				<center>
				
				<div id="search">
					<form  class="d-flex" action="<?=RACINE_SITE?>recherche.php" method="GET">
					
						<input class="form-control me-2" name="searcharea" type="search" placeholder="Search" aria-label="Search">
				
						<button class="btn btn-outline-mu my-2 my-sm-0" type="submit" name="search"><img src='<?=RACINE_SITE?>inc/img/search.png'></button>
					</form>
				</div>
				</nav>
				</center>
				
				</div>
				</header>

				<section>