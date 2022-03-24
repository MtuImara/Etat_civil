<?php 

	require_once 'connection.php';

	require("fpdf/fpdf.php");

	require_once 'controler_divorce.php';

	$id_divorce=$_GET['id_divorce'];

	class PDFDivorce extends FPDF
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

	 function voirExtraitDivorce($id_divorce)
	{
		foreach (affichageExtraitDivorcePdf($id_divorce) as $data) 
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
			//$this->Cell(30,10,'ACTE            : '.$data->id_mariage ,0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(30,10,'',0,1);
			$this->Cell(200,10,'EXTRAIT D\'ACTE DE DIVORCES',0,1,'C');
			$this->Cell(200,0,'______________________________',0,1,'C');

			$this->Cell(30,10,'',0,1);

			//iconv('UTF-8', 'windows-1252', 'afficher les donnees')


			foreach (afficherDivorceMatriculePersonel1($id_divorce) as $data1) 
			{
				foreach (afficherDivorceMatriculePersonel2($id_divorce) as $data2) 
				{
					foreach (afficherFutur_conjointPDF($data->cni_futur_conjoint) as $data3) 
					{
						foreach (afficherFuture_conjointePDF($data->cni_future_conjointe) as $data4) 
						{
							foreach (afficherTemoin1PDF($data->cni_temoinD1) as $data5) 
							{
								foreach (afficherTemoin2PDF($data->cni_temoinD2) as $data6) 
								{
						 $this->Multicell(200,10,iconv('UTF-8', 'windows-1252','        En date du '.$data->date_divorce.', devant nous, '.$data1->nom_demandeur.' '.$data1->prenom_demandeur.' et '.$data2->nom_demandeur.' '.$data2->prenom_demandeur.' respectivement Chef et Secrétaire de la zone '.$data->nom_zone.', ont comparu le nommé '.$data3->nom_demandeur.' '.$data3->prenom_demandeur.', résidant à '.$data3->province.', de nationnalité Burundaise et la nommée '.$data4->nom_demandeur.' '.$data4->prenom_demandeur.', résidant à '.$data4->province.', de nationnalité Burundaise, après avoir justifié, par représentation des pièces, que les formalités et delais exigés par la loi ont été remplies, sur quoi l\'état civil déclare leur mariage dissous.'),0,1);


						 			$this->Cell(30,10,'',0,1);
									$this->Cell(30,10,'',0,1);
									$this->Cell(30,10,iconv('UTF-8', 'windows-1252','Les Deux Témoins'),0,0);
									$this->Cell(200,10,iconv('UTF-8', 'windows-1252','Fait à '.$data->province.', Le '.$data->date_divorce ),0,1,'C');
									
						            $this->Cell(30,10,iconv('UTF-8', 'windows-1252', ''.$data5->nom_demandeur.' '.$data5->prenom_demandeur ),0,0); 
						            
						            $this->Cell(200,10,iconv('UTF-8', 'windows-1252','Le Chef de la zone '.$data->nom_zone ),0,1,'C');

									$this->Cell(250,10,iconv('UTF-8', 'windows-1252',''.$data1->nom_demandeur.' '.$data1->prenom_demandeur ),0,1,'C'); 
									
						            
						            	$this->Cell(30,10,iconv('UTF-8', 'windows-1252',''.$data6->nom_demandeur.' '.$data6->prenom_demandeur ),0,1); 
						            
						 		}
						 	}
						}
					}
				}
			}
		

		}
	}


	}

	// Instanciation of inherited class
	$pdf = new PDFDivorce('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//appel page
	$pdf->voirExtraitDivorce($id_divorce);
	$pdf->Output();

?>