<?php 
	require_once 'connection.php';

	require("fpdf/fpdf.php");

	require_once 'controler_demande_cni.php';

	$num_cni=$_GET['num_cni'];

	/**
	 * 
	 */
	class pdfcni extends FPDF
	{

		// Page header
		function Header()
		{
			/*
		    // Logo
		    $this->Image('img/burundi.png',10,6,30);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(80);
		    // Title
		    $this->Cell(30,10,'REPUBLIQUE DU BURUNDI',0,1,'C');
		    $this->Cell(190,10,'CARTE NATIONALE D\'IDENTITE',0,0,'C');
		    // Line break
		    $this->Ln(20);
		    */
		}

		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','B','10');
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		} 


		function voirTableau($num_cni)
		{
			foreach (affichagePdfCNI($num_cni) as $data) 
			{
				//$this->Cell(45,10, $valeur->nom_demandeur  ,1,0);
			$this->SetFont('Times','B','10');
		  /*  $this->Cell(60,7,'IZINA:  '.$data->nom_demandeur  ,1,0);
		    $this->Cell(45,7,'IGIKUMU CA NYENEYO  ' ,1,1);


		    $this->Cell(60,7,'AMATAZIRANO:  '.$data->prenom_demandeur  ,1,1);
		    $this->Cell(60,7,'SE:  '.$data->cni_pere  ,1,1);
		    $this->Cell(60,7,'NYINA:  '.$data->cni_mere  ,1,1);
		    $this->Cell(60,7,'PROVENSI:  '.$data->province  ,1,1);
		    $this->Cell(60,7,'KOMINE:  '.$data->commune  ,1,1);
		    $this->Cell(60,7,'YAVUKIYE:  '.$data->province  ,1,1);
		    $this->Cell(60,7,'ITALIKI:  '.$data->date_naissance  ,1,1);
		    $this->Cell(60,7,'ARUBATSE:  '.$data->etat_civil  ,1,1);
		    $this->Cell(60,7,'AKAZI AKORA:  '.$data->profession  ,1,1);

		    */

    //RECTO
    $width_cell=array(73,43,73);
    $this->SetFillColor(255,255,255);
    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','IZINA :'.$data->nom_demandeur),0,0,'L',true);
    $this->Cell($width_cell[1],0,'IGIKUMU CA NYENYEYO',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','AMATAZIRANO :'.$data->prenom_demandeur),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'L',true);
    
    foreach (afficherNomPerePdf($data->cni_pere) as $data1) 
	{
    	$this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','SE : '.$data1->nom_demandeur.' '.$data1->prenom_demandeur ),0,0,'L',true);
	}
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    foreach (afficherNomPerePdf($data->cni_mere) as $data2) 
	{
    	$this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','NYINA '.$data2->nom_demandeur.' '.$data2->prenom_demandeur),0,0,'L',true);
    }
    $this->Image('img/'.$data->photo,90,53,30);
    //$this->Cell($width_cell[1],30,''.$data->photo,1,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','PROVENSI :'.$data->province),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','KOMINE :'.$data->commune),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','YAVUKIYE :'.$data->province),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);


    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','ITALIKI : '.$data->date_naissance),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);  
    
    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','ARUBATSE : '.$data->etat_civil),0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,iconv('UTF-8', 'windows-1252','AKAZI AKORA : '.$data->profession),0,0,'L',true);
    $this->Cell($width_cell[1],0,'IKASHE',0,0,'C',true);
    $this->Image('img/CARTE.png',150,6,50);

   
    //new line : empty elements
    $this->Cell($width_cell[0],1,'',0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,'',0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,'',0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);

    $this->Cell($width_cell[0],1,'',0,0,'L',true);
    $this->Cell($width_cell[1],0,'',0,0,'C',true);
    $this->Cell($width_cell[2],10,'',0,1,'C',true);


	}

}

	//VERSO

function voirTableauVerso($num_cni)
{
		foreach (affichagePdfCNI($num_cni) as $data) 
		{
		//this->Cell(40,7,$data)
			$width_cell=array(73,43,73);
		    $this->SetFillColor(255,255,255);
		    
		    $this->Image('img/CARTE.png',10,140,50);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'',0,1,'C',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'REPUBLIKA Y UBURUNDI',0,1,'C',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'',0,1,'C',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'IKARATA KARANKAMUNTU',1,1,'C',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'MIFP :' .$data->num_cni,0,1,'L',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,iconv('UTF-8', 'windows-1252','ITANGIWE I :' .$data->nom_zone),0,1,'L',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,iconv('UTF-8', 'windows-1252','ITALIKI :' .$data->date_delivrance),0,1,'L',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,iconv('UTF-8', 'windows-1252','UWUYITANZE :' .$data->nom_personnel.'  '.$data->prenom_personnel),0,1,'L',true);


		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'',0,1,'L',true);

		    $this->Cell($width_cell[0],0,'',0,0,'L',true);
		    $this->Cell($width_cell[1],1,'',0,0,'C',true);
		    $this->Cell($width_cell[2],10,'',0,1,'L',true);

	
		}
	}
	}

	$cni=new pdfcni('P','mm','A4');

	$cni->AliasNbPages();
	$cni->AddPage();

	//appel fonction
	//$cni->HeaderTable($num_cni);
	$cni->voirTableau($num_cni);
	$cni->voirTableauVerso($num_cni);
	$cni->Output();

 ?>