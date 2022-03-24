<?php 

	require_once 'connection.php';

	require("fpdf/fpdf.php");

	require_once 'controler_mariage.php';

	$id_mariage=$_GET['id_mariage'];

	class PDFMariage extends FPDF
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

	 function voirZone($id_mariage)
	{
		foreach (affichageExtraitPdf($id_mariage) as $data) 
		{
			//$this->Cell(45,10, $valeur->nom_demandeur  ,1,0);
			//$this->Cell(40);
			$this->SetFont('Times','B','14');
			$this->Cell(30,10,'REPUBLIQUE DU BURUNDI',0,1);
		    $this->Cell(30,10,'MINISTERE DE L\'INTERIEUR',0,1);
		    $this->Cell(30,10,'DU DEVELOPPEMENT COMMUNAUTAIRE ET DE',0,1);
		    $this->Cell(30,10,'LA SECURITE PUBLIQUE',0,1);
			$this->Cell(30,10,'MUNICIPALITE DE '.$data->province ,0,1);
			$this->Cell(30,10,'BUREAU D\'ETAT CIVIL',0,1);
			$this->Cell(30,10,'COMMUNE '.$data->commune ,0,1);
			$this->Cell(30,10,'ZONE '.$data->nom_zone ,0,1);
			$this->Cell(30,0,'___________________________________________________',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'ACTE            : '.$data->id_mariage ,0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(200,10,'EXTRAIT D\'ACTE DE MARIAGE',0,1,'C');
			$this->Cell(200,0,'______________________________',0,1,'C');

			$this->Cell(30,10,'',0,1);

			$this->Cell(30,10,iconv('UTF-8', 'windows-1252','En date du '.$data->date_celebration.' ont contracté mariage devant nous, le nommé '.$data->nom_demandeur.' '.$data->prenom_demandeur.' ' ),0,1); 
			$this->Cell(30,10,iconv('UTF-8', 'windows-1252', 'né le '.$data->date_naissance.', '.$data->profession.', résidant a '.$data->province.', '.$data->nom_zone.', Q. '.$data->quartier ),0,1); 

			foreach(afficherDeclarationMariageConjointe($data->cni_future_conjointe) as $data1) 
            {
            	$this->Cell(120,10,iconv('UTF-8', 'windows-1252','de nationalité Burundaise et la nommée '.$data1->nom_demandeur.' '.$data1->prenom_demandeur.', ' ),0,1);
            	//$this->Cell(30,10,' fille de .....' ,0,1);
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252','né le '.$data1->date_naissance.', '.$data1->profession.', résidant à '.$data1->province.', '.$data1->nom_zone.', Q. '.$data1->quartier ),0,1);
            }

			foreach(afficherDeclarationMariageTemoin1($data->cni_temoin1) as $data2) 
            {
			
				$this->Cell(30,10,iconv('UTF-8', 'windows-1252','de nationalité Burundaise, en présence de '.$data2->nom_demandeur.' '.$data2->prenom_demandeur.' et de ' ),0,0);
			}
			foreach(afficherDeclarationMariageTemoin2($data->cni_temoin2) as $data3) 
            {
			
				$this->Cell(230,10,iconv('UTF-8', 'windows-1252',' '.$data3->nom_demandeur.' '.$data3->prenom_demandeur ),0,1,'C');
			}
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(210,10,'POUR EXTRAIT CERTIFIE CONFORME',0,1,'C');
			$this->Cell(200,10,iconv('UTF-8', 'windows-1252','FAIT A BUJUMBURA LE '.$data->date_celebration ),0,1,'C');

			foreach(afficherDeclarationMariageMatricule($id_mariage) as $data4) 
            {
				$this->Cell(219,10,iconv('UTF-8', 'windows-1252','L\'OFFICIER DE L\'ETAT CIVIL :'.$data4->nom_demandeur.' '.$data4->prenom_demandeur ),0,1,'C');
			}
			

		}
	}


	}

	// Instanciation of inherited class
	$pdf = new PDFMariage('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//appel page
	$pdf->voirZone($id_mariage);
	$pdf->Output();

?>