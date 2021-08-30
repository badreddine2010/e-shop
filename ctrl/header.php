<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- CSS only -->			
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script></head>
<link href="http://localhost/e-shop/ctrl/img/logo2.png" rel="icon" type="image/png" />
		<title>e-shop.com</title>
		</head>
			<center><?php echo "<img src='http://localhost/e-shop/ctrl/img/logo2.png' width='102' height='52' />";
 ?> </center>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">      <img src="<?php echo RACINE_SITE; ?>ctrl/img/logo2.png" class="d-block w-70 " alt="..." width="52" height="30">
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
<a class="nav" ><?=$_SESSION['membre']['prenom']?><i class="bi bi-person-check-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg></i></a>       
        
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
        <input class="form-control me-2" name="searcharea" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
	