<?php 

	require_once 'connection.php';

	require("fpdf/fpdf.php");

	require_once 'controler_deces.php';

	$id_deces=$_GET['id_deces'];

	class PDFDeces extends FPDF
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

	 function voirZone($id_deces)
	{
		foreach (affichageExtraitDecesPdf($id_deces) as $data) 
		{
			//$this->Cell(45,10, $valeur->nom_demandeur  ,1,0);
			//$this->Cell(40);
			$this->SetFont('Times','B','14');
			$this->Cell(30,10,'REPUBLIQUE DU BURUNDI',0,1);
		    $this->Cell(30,10,'MINISTERE DE L\'INTERIEUR',0,1);
		    $this->Cell(30,10,'DU DEVELOPPEMENT COMMUNAUTAIRE ET DE',0,1);
		    $this->Cell(30,10,'LA SECURITE PUBLIQUE',0,1);
			$this->Cell(30,10,'MUNICIPALITE DE '.$data->province ,0,1);
			$this->Cell(30,10,'COMMUNE '.$data->commune ,0,1);
			$this->Cell(30,10,'ZONE '.$data->nom_zone ,0,1);
			$this->Cell(30,0,'___________________________________________________',0,1);
			
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(200,10,'EXTRAIT D\'ACTE DE DECES',0,1,'C');
			$this->Cell(200,0,'_____________________________',0,1,'C');

			$this->Cell(30,10,'',0,1);

			foreach (afficherDesesMatricule($id_deces) as $data1) 
			{
				$this->Cell(30,10,iconv('UTF-8', 'windows-1252','Je sousigné, '.$data1->nom_demandeur.' '.$data1->prenom_demandeur.' Chef de zone '.$data->nom_zone.', atteste par la présente que') ,0,1); 
			}
//			$this->Cell(30,10, 'le(la) nomme(e) '.$data->nom_demandeur.' '.$data->prenom_demandeur ,0,1);
			foreach(afficherDeclarationDecesDeclarant1($data->cni_declarant1) as $data2) 
            {
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252','le(la) nommé(e) '.$data->nom_demandeur.' '.$data->prenom_demandeur.', en présence de '.$data2->nom_demandeur.' '.$data2->prenom_demandeur.' et de') ,0,1); 
            }

			foreach(afficherDeclarationDecesDeclarant2($data->cni_declarant2) as $data3) 
            {
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252',''.$data3->nom_demandeur.' '.$data3->prenom_demandeur.', résidant dans la zone '.$data->nom_zone.', commune '.$data->commune.', province '.$data->province ),0,1); 
            }

            foreach(afficherDesesAdresse($id_deces) as $data4) 
            {
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252','est décédé au quartier '.$data4->quartier.', en date du '.$data->date_deces.'.') ,0,1); 
        	}

        	$this->Cell(30,5,'',0,1);
			$this->Cell(30,10,iconv('UTF-8', 'windows-1252','Par la présente attestation est délivrée pour usage administratif.'),0,1);

			
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,iconv('UTF-8', 'windows-1252','Les Deux Témoins'),0,0);
			$this->Cell(200,10,iconv('UTF-8', 'windows-1252','Fait a '.$data->province.', Le '.$data->date_enregistrement ),0,1,'C');
			foreach(afficherDeclarationDecesDeclarant1($data->cni_declarant1) as $data2) 
            {
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252', ''.$data2->nom_demandeur.' '.$data2->prenom_demandeur ),0,0); 
            }
            $this->Cell(200,10,iconv('UTF-8', 'windows-1252','Le Chef de la zone '.$data->nom_zone ),0,1,'C');

            foreach (afficherDesesMatricule($id_deces) as $data1) 
			{
				$this->Cell(250,10,iconv('UTF-8', 'windows-1252',''.$data1->nom_demandeur.' '.$data1->prenom_demandeur ),0,1,'C'); 
			}
            foreach(afficherDeclarationDecesDeclarant2($data->cni_declarant2) as $data3) 
            {
            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252',''.$data3->nom_demandeur.' '.$data3->prenom_demandeur ),0,1); 
            }


		}
	}


	}

	// Instanciation of inherited class
	$pdf = new PDFDeces('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//appel page
	$pdf->voirZone($id_deces);
	$pdf->Output();

?>