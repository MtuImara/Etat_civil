<?php 

	require_once 'connection.php';

	require("fpdf/fpdf.php");

	require_once 'controler_naissance.php';

	$id_naissance=$_GET['id_naissance'];

	class PDFnaissance extends FPDF
	{
	// Page header
	function Header()
	{
		/*
	    // Logo
	    //$this->Image('logo.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(40);
	    // Title
	    $this->Cell(30,10,'REPUBLIQUE DU BURUNDI',0,1,'R');
	    
	    //$this->Cell(50);

	   
	    // Line break
	    $this->Ln(40);
	    */
	}


	
	// Page footer
	function Footer()
	{
		/*
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	    */
	}

	 function voirExtraitNaissance($id_naissance)
	{
		foreach (affichageExtraitPdfNaissance($id_naissance) as $data) 
		{
			//$this->Cell(45,10, $valeur->nom_demandeur  ,1,0);
			//$this->Cell(40);
			$this->SetFont('Times','B','14');
			$this->Cell(30,10,'REPUBLIQUE DU BURUNDI',0,1);
			$this->Cell(30,10,'PROVINCE DE '.$data->province ,0,1);
			$this->Cell(30,10,'COMMUNE DE '.$data->commune ,0,1);
			$this->Cell(30,10,'OFFICE D\'ETAT CIVIL',0,1);
			$this->Cell(30,0,'___________________________________________________',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'ACTE            : '.$data->id_declaration_naissance ,0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(200,10,'EXTRAIT D\'ACTE DE NAISSANCE NUMERO '.$data->id_naissance,0,1,'C');
			$this->Cell(200,0,'___________________________________________',0,1,'C');

			$this->Cell(30,10,'',0,1);

			$this->Cell(30,10,iconv('UTF-8', 'windows-1252','L\'an '.$data->annee.', le '.$data->jour.'e jour du mois de '.$data->mois.', est né à '.$data->commune.', le nommé '.$data->nom_enfant.' '.$data->prenom_enfant ),0,1);

			foreach (afficherDeclarationNaissancePere($data->cni_pere) as $data1) 
			{
				$this->Cell(30,10,iconv('UTF-8', 'windows-1252','fils de '.$data1->nom_demandeur.' '.$data1->prenom_demandeur.', Profession '.$data1->profession.', résidant actuellement a '.$data1->province ),0,1);
			}

			foreach (afficherDeclarationNaissanceMere($data->cni_mere) as $data2) 
			{
				$this->Cell(30,10,iconv('UTF-8', 'windows-1252','de nationalité Burundaise et la nommée '.$data2->nom_demandeur.' '.$data2->prenom_demandeur.', Profession '.$data2->profession.',' ),0,1);
				$this->Cell(30,10,iconv('UTF-8', 'windows-1252','résidant actuellement à '.$data2->province.' de nationalité Burundaise.' ),0,1);
			}

			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(210,10,'POUR EXTRAIT CERTIFIE CONFORME',0,1,'C');
			$this->Cell(200,10,'FAIT A BUJUMBURA LE '.$data->date_enregistrement ,0,1,'C');

			foreach(afficherDeclarationNaissanceMatricule($id_naissance) as $data3) 
            {
				$this->Cell(219,10,iconv('UTF-8', 'windows-1252','L\'OFFICIER DE L\'ETAT CIVIL :'.$data3->nom_demandeur.' '.$data3->prenom_demandeur ),0,1,'C');
			}
			

		}
	}


	}

	// Instanciation of inherited class
	$pdf = new PDFnaissance('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//appel page
	$pdf->voirExtraitNaissance($id_naissance);
	$pdf->Output();

?>