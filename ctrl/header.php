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
<link href="<?php echo RACINE_SITE; ?>ctrl/img/logo2.png" rel="icon" type="image/png" />
		<title>e-shop.com</title>
		</head>
    <div class="container">

			<center><div class="title"><?php echo "<img src='".RACINE_SITE ."ctrl/img/logo2.png' width='102' height='52' />";
 ?> </div></center>
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
        <li class="nav-item"><a class="nav-link" href="<?php echo RACINE_SITE; ?>admin/commentaires.php">Messages</a>  </li>    
       					<?php } if(internauteEstConnecte()) {?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/membres.php">Profil</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/panier.php">Panier</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/gestion_commande.php">Commandes</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>ctrl/logout.php">Logout</a>
        </li>
      </ul> 
    <ul>
   
<li><a class="nav" ><?=$_SESSION['membre']['prenom']?><i class="bi bi-person-check-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg></i></a></li>
                 </ul>

   
        
        <?php } else { ?>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/inscription.php">Inscription</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/panier.php">panier</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo RACINE_SITE; ?>view/connexion.php">connexion</a>
        </li>
      </ul>
      <?php } ?>
	  
      <form action="<?=RACINE_SITE?>view/recherche.php" method="GET" class="d-flex">
        <input class="form-control me-2" name="searcharea" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">