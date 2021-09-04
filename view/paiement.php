
 <head>   
<?php
    
    require_once("../ctrl/init.ctrl.php");
    require_once("../ctrl/header.php");
	@$valider=$_POST["valider"];
	$date = new DateTime('Y');
    ?>
        <?php
    //--- PAIEMENT ---//
	if(isset($_POST['payer']))
{
	for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++) 
	{
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]."");
		$produit = $resultat->fetch_assoc();
		if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
		{
			echo '<hr /><div class="alert alert-warning">Stock Restant: ' . $produit['stock'] . '</div>';
			echo '<div class="alert alert-warning">Quantité demandée: ' . $_SESSION['panier']['quantite'][$i] . '</div>';
			if($produit['stock'] > 0)
			{
				echo '<div class="alert alert-warning">la quantité de produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats.</div>';
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
			}
			else
			{
				echo '<div class="alert alert-warning">Votre commande a été annulée, vous ne serez pas débités car nous sommes en rupture de stock, veuillez vérifier vos achats.</div>';
				retirerproduitDuPanier($_SESSION['panier']['id_produit'][$i]);
				$i--;
			}
			$erreur = true;
		}
	}
	if(!isset($erreur))
	{
		executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (" . $_SESSION['membre']['id_membre'] . "," . montantTotal() . ", NOW())");
		$id_commande = $mysqli->insert_id;
		for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
		{
            
			executeRequete("INSERT INTO details_commande (id_commande, id_produit,designation, quantite, prix, photo) VALUES ($id_commande, " . $_SESSION['panier']['id_produit'][$i] . ",'". $_SESSION['panier']['titre'][$i] . "'," . $_SESSION['panier']['quantite'][$i] . "," . $_SESSION['panier']['prix'][$i] . ",'" . $_SESSION['panier']['photo'][$i] ."') ");
		}

		unset($_SESSION['panier']);
		//mail($_SESSION['membre']['email'], "confirmation de la commande", "Merci votre numéro de suivi est le $id_commande", "From:vendeur@dp_site.com");
		echo "<div class='alert alert-success'>Merci pour votre commande. Votre numéro de suivi est le $id_commande</div>";
	}
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//


      ?>   
		
	
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="	https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ ctrllude the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		
        <div class=" py-1">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
            <h2 class="text-center">Formulaire de paiement</h2>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active"> <i class="fas fa-credit-card mr-2"></i> Carte de crédit </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Virement Bancaire </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form  method="post" action="">
                                    <div class="form-group"> <label for="username">
                                            <h6>Nom mentionné sur la carte</h6>
                                        </label> <input type="text" name="username" placeholder="Propriétaire de la carte" required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Numéro carte</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Numéro de carte valide" class="form-control " pattern="^4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$" required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Date d'expiration</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="AA" name="" class="form-control" required> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Code CVV à trois chiffres au dos de votre carte">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control" pattern="^[0-9]{3}$"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" name="payer" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                    </form>

                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <h6 class="pb-2">Selectionnez votre type de compte Paypal</h6>
                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> National </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                            <p> <a href="https://www.paypal.com/fr/signin" target="_blank" class="btn btn-primary btn-block shadow-sm" ><i class="fab fa-paypal mr-2"></i> Se connecter à mon Paypal</a> </p>
                            <p class="text-muted"> Remarque : Après avoir cliqué sur le bouton, vous serez dirigé vers une passerelle sécurisée pour le paiement. Après avoir terminé le processus de paiement, vous serez redirigé vers le site Web pour afficher les détails de votre commande. </p>
                        </div> <!-- End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                           
                                <dt>Coordonnées de notre compte bancaire :</dt><br>
                                <dl class="param">
                                <dt>Banque: </dt>
                                <dd> THE E_SHOP BANK</dd>
                                </dl>
                                <dl class="param">
                                <dt>Numéro d'accréditation: </dt>
                                <dd> 12345678912345</dd>
                                </dl>
                                <dl class="param">
                                <dt>IBAN: </dt>
                                <dd> FR5212739000502454276512N40</dd>
                                </dl>
                                <dl class="param">
                                <dt>BIC: </dt>
                                <dd>  SOGEFRTT</dd>
                                </dl>
                        </div> <!-- End -->
                        <!-- End -->
                        </div>
                        </div>
                        </div>
                        </div>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ ctrllude the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<?php require_once("../ctrl/footer.php");?>

