<?php 
	function affichageMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM mariage a, declaration_mariage f, zone z WHERE  a.id_declaration_mariage = f.id_declaration_mariage AND f.id_zone = z.id_zone ");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationMariageConjoint($cni_futur_conjoint)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse ad, zone z WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? AND d.id_adresse=ad.id_adresse AND ad.id_zone=z.id_zone");
		$query->execute([$cni_futur_conjoint]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	

	function afficherDeclarationMariageConjointe($cni_future_conjointe)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse ad, zone z WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? AND d.id_adresse=ad.id_adresse AND ad.id_zone=z.id_zone");
		$query->execute([$cni_future_conjointe]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	
	function getZoneDivorse()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function ajouterDivorce($id_mariage,$date_divorce,$id_zone,$cni_temoinD1,$cni_temoinD2,$matricule_personnel1,$matricule_personnel2,$preuve_payement)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO divorce(id_mariage,date_divorce,id_zone,cni_temoinD1,cni_temoinD2,matricule_personnel1,matricule_personnel2,preuve_payement) 
                  VALUES(:id_mariage,:date_divorce,:id_zone,:cni_temoinD1,:cni_temoinD2,:matricule_personnel1,:matricule_personnel2,:preuve_payement)");
		$res = $query -> execute(array('id_mariage'=>$_POST['id_mariage'],'date_divorce'=>$_POST['date_divorce'],'id_zone'=>$_POST['id_zone'],'cni_temoinD1'=>$_POST['cni_temoinD1'],'cni_temoinD2'=>$_POST['cni_temoinD2'],'matricule_personnel1'=>$_POST['matricule_personnel1'],'matricule_personnel2'=>$_POST['matricule_personnel2'],'preuve_payement'=>$_POST['preuve_payement']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function afficherDivorce()
	{
		$con=connection();
		
		$query = $con->prepare("SELECT * FROM divorce a, zone z, mariage m, declaration_mariage dm WHERE a.id_mariage=m.id_mariage AND a.id_zone = z.id_zone AND m.id_declaration_mariage=dm.id_declaration_mariage ");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function rechercheDivorce($id)
	{
		$con=connection();
		
		$query = $con->prepare("SELECT * FROM divorce a, zone z, mariage m, declaration_mariage dm WHERE a.id_mariage=m.id_mariage AND a.id_zone = z.id_zone AND m.id_declaration_mariage=dm.id_declaration_mariage AND m.id_mariage = ? ");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function afficherFutur_conjoint($cni_futur_conjoint)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? ");
		$query->execute([$cni_futur_conjoint]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function afficherFuture_conjointe($cni_future_conjointe)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? ");
		$query->execute([$cni_future_conjointe]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherTemoin1($cni_temoinD1)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? ");
		$query->execute([$cni_temoinD1]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function afficherTemoin2($cni_temoinD2)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? ");
		$query->execute([$cni_temoinD2]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function modifierDivorce($date_divorce,$id_zone,$cni_temoinD1,$cni_temoinD2,$matricule_personnel1,$matricule_personnel2,$preuve_payement,$id_divorce)
	{
		$con=connection();
		$query = $con->prepare("UPDATE divorce SET date_divorce=:date_divorce,id_zone=:id_zone,cni_temoinD1=:cni_temoinD1,cni_temoinD2=:cni_temoinD2,matricule_personnel1=:matricule_personnel1,matricule_personnel2=:matricule_personnel2,preuve_payement=:preuve_payement WHERE id_divorce=:id_divorce");
		$res = $query->execute(['date_divorce'=>$date_divorce,'id_zone'=>$id_zone,'cni_temoinD1'=>$cni_temoinD1,'cni_temoinD2'=>$cni_temoinD2,'matricule_personnel1'=>$matricule_personnel1,'matricule_personnel2'=>$matricule_personnel2,'preuve_payement'=>$preuve_payement,'id_divorce'=>$id_divorce]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function afficherEffectifDivorce()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM divorce");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function affichageExtraitDivorcePdf($id_divorce)
	{
		$con=connection();

		//$query = $con->prepare("SELECT * FROM mariage a,zone z, declaration_mariage y, adresse d WHERE a.id_zone = z.id_zone AND a.id_demande_cni = y.id_demande_cni AND y.id_adresse = d.id_adresse AND id_mariage=:id_mariage");

		$query = $con->prepare("SELECT * FROM divorce a, zone z, mariage m, declaration_mariage dm WHERE id_divorce=:id_divorce AND a.id_mariage=m.id_mariage AND a.id_zone = z.id_zone AND m.id_declaration_mariage=dm.id_declaration_mariage");
		$query->execute(['id_divorce'=>$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDivorceMatriculePersonel1($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM divorce n, cni c, demande_cni dc, personnel p WHERE c.id_demande_cni = dc.id_demande_cni  AND n.matricule_personnel1=p.matricule AND p.num_cni=c.num_cni AND id_divorce=:id_divorce");
		$query->execute(['id_divorce'=>$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDivorceMatriculePersonel2($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM divorce n, cni c, demande_cni dc, personnel p WHERE c.id_demande_cni = dc.id_demande_cni  AND n.matricule_personnel2=p.matricule AND p.num_cni=c.num_cni AND id_divorce=:id_divorce");
		$query->execute(['id_divorce'=>$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherFutur_conjointPDF($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse a, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_adresse=a.id_adresse AND a.id_zone=z.id_zone AND num_cni = ? ");
		$query->execute([$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function afficherFuture_conjointePDF($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse a, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_adresse=a.id_adresse AND a.id_zone=z.id_zone AND num_cni = ? ");
		$query->execute([$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherTemoin1PDF($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse a, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_adresse=a.id_adresse AND a.id_zone=z.id_zone AND num_cni = ? ");
		$query->execute([$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function afficherTemoin2PDF($id_divorce)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse a, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_adresse=a.id_adresse AND a.id_zone=z.id_zone AND num_cni = ? ");
		$query->execute([$id_divorce]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

 ?>
