<?php 
    require '../fpdf/fpdf.php';
    require_once("../ctrl/init.ctrl.php");
    
    $username=$_SESSION['membre']['prenom'];
	$sql = executeRequete("SELECT * FROM membre WHERE prenom='$username'");
    $client = $sql->fetch_assoc();
 

	if($sql->num_rows < 1){
		header('Location: #');
		echo "<script type='text/javascript'> document.location = 'gestion_commande.php'; </script>";
		exit;
	}

    //Debut PDF
    
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    
    $pdf->Image('http://localhost/e_shop/ctrl/img/logo.jpeg',10,6,18);
    $pdf->Ln(18);
    
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0, 6,"e_shop", 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0, 6, utf8_decode('67 69 Avenue du Général de Gaulle'), 0, 1);
    $pdf->Cell(0, 6, utf8_decode("Champs sur Marne, 77300, France"), 0, 1);
    $pdf->Cell(0, 6, utf8_decode('Tél : 01 23 56 89 56'), 0, 1);
    $pdf->Ln(8);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(130, 6,'', 0, 0);
    $pdf->Cell(59, 6, utf8_decode($client['civilite']) .' '. utf8_decode($client['prenom']).' '.utf8_decode($client['nom']), 0, 1);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(130, 6,'', 0, 0);
    $pdf->Cell(59, 6, utf8_decode($client['adresse']), 0, 1);

    $pdf->Cell(130, 6,'', 0, 0);
    $pdf->Cell(59, 6, utf8_decode($client['code_postal']).' '.utf8_decode($client['ville']), 0, 1);
    $pdf->Ln(8);

    $idCmd=$_GET['id_commande'];

    $sqlQuery= executeRequete("select * from commande where id_commande='$idCmd'");
		while ($rowCmd = $sqlQuery->fetch_assoc()){
            $pdf->SetFont('Arial','B',16);
            $pdf->cell(0,10, utf8_decode("Facture n°:"). " " . $rowCmd['id_commande'], 'TB', 1, 'C');
            $pdf->SetFont('Arial','',14);
            $pdf->Ln(8);
            $pdf->write(7, 'Le : '. $rowCmd['date_enregistrement']."\n");
            
    }
    $pdf->Ln(4);

    $pdf->SetFont('Arial','B',14);
    $pdf->cell(90,6,utf8_decode("Désignation ") , 1, 0, 'C');
    $pdf->cell(25,6,utf8_decode("Qte ") , 1, 0, 'C');
    $pdf->cell(35,6,utf8_decode("Prix ") , 1, 0, 'C');
    $pdf->cell(40,6,utf8_decode("Total ") , 1, 1, 'C');

    $euro = chr(128);
    $stmtLigneCmd = executeRequete("SELECT * FROM details_commande WHERE id_commande='$idCmd'");
    $MontantTotal = 0;
    while ($rowtLigneCmd = $stmtLigneCmd->fetch_assoc()){    
        //extract($rowtLigneCmd);
        $pdf->SetFont('Arial','',12);
        //Designation
        $pdf->cell(90,6,utf8_decode(ucfirst($rowtLigneCmd['designation'])) , 1, 0);
        //quantite
        $pdf->cell(25,6,$rowtLigneCmd['quantite'], 1, 0);
        //prix
        $pdf->cell(35,6,$rowtLigneCmd['prix'].' '. $euro, 1, 0);
        //prix total par article
        $prixT = $rowtLigneCmd['quantite'] * $rowtLigneCmd['prix'];
        $pdf->cell(40,6,$prixT .' '. $euro , 1, 1);
        //On ajoute le total de la ligne au montant total
        $MontantTotal = $MontantTotal + $prixT;
    }
    // Recapitulatif

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(115,6, '',0,0);
    $pdf->Cell(35,6, 'Prix total ',1,0);
    $pdf->Cell(40,6, $MontantTotal .' '. $euro ,1,1);
    $pdf->Ln(133);
    $pdf->SetFont('Arial','B',16);
    $pdf->cell(0,10, utf8_decode("© 2021 Copyright: E_SHOP - Tous droits reservés."), 'TB', 1, 'C');
    $pdf->Output();

    


?>