<?php 
	function getZoneDeces()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function ajouterDeclarationDeces($cni_defunt,$date_deces,$certificat_deces,$id_zone,$cni_declarant1,$cni_declarant2)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO declaration_deces(cni_defunt,date_deces,certificat_deces,id_zone,cni_declarant1,cni_declarant2,situation) 
                  VALUES(:cni_defunt,:date_deces,:certificat_deces,:id_zone,:cni_declarant1,:cni_declarant2,:situation)");
		$res = $query -> execute(array('cni_defunt'=>$_POST['cni_defunt'],'date_deces'=>$_POST['date_deces'],'certificat_deces'=>$_POST['certificat_deces'],'id_zone'=>$_POST['id_zone'],'cni_declarant1'=>$_POST['cni_declarant1'],'cni_declarant2'=>$_POST['cni_declarant2'],'situation'=>'non'))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function afficherDeclarationDeces()
	{
		$con=connection();
		$query = $con->prepare("SELECT DISTINCT * FROM declaration_deces a, zone z, cni c, demande_cni d WHERE  a.id_zone = z.id_zone AND a.cni_defunt = c.num_cni  AND c.id_demande_cni = d.id_demande_cni AND a.situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheDeclaDeces($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT DISTINCT * FROM declaration_deces a, zone z, cni c, demande_cni d WHERE  a.id_zone = z.id_zone AND a.cni_defunt = c.num_cni  AND c.id_demande_cni = d.id_demande_cni AND a.situation='non' AND a.cni_defunt=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationDecesDeclarant1($cni_declarant1)
	{
		$con=connection();
		$query = $con->prepare("SELECT nom_demandeur,prenom_demandeur FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_declarant1]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationDecesDeclarant2($cni_declarant2)
	{
		$con=connection();
		$query = $con->prepare("SELECT nom_demandeur,prenom_demandeur FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_declarant2]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function modifierDeclarationDeces($cni_defunt,$date_deces,$certificat_deces,$id_zone,$cni_declarant1,$cni_declarant2,$id_declaration_deces)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_deces SET cni_defunt=:cni_defunt,date_deces=:date_deces,certificat_deces=:certificat_deces,id_zone=:id_zone,cni_declarant1=:cni_declarant1,cni_declarant2=:cni_declarant2 WHERE id_declaration_deces=:id_declaration_deces");
		$res = $query->execute(['cni_defunt'=>$cni_defunt,'date_deces'=>$date_deces,'certificat_deces'=>$certificat_deces,'id_zone'=>$id_zone,'cni_declarant1'=>$cni_declarant1,'cni_declarant2'=>$cni_declarant2,'id_declaration_deces'=>$id_declaration_deces]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function supprimerDeclarationDeces($id_declaration_deces)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM declaration_deces WHERE id_declaration_deces=:id_declaration_deces");

        $res = $query -> execute(array('id_declaration_deces'=>$id_declaration_deces))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function ajouterDeces($id_declaration_deces,$date_enregistrement,$matricule_personnel,$preuve_payement)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO deces(id_declaration_deces,date_enregistrement,matricule_personnel,preuve_payement) 
                  VALUES(:id_declaration_deces,:date_enregistrement,:matricule_personnel,:preuve_payement)");
		$res = $query -> execute(array('id_declaration_deces'=>$_POST['id_declaration_deces'],'date_enregistrement'=>$_POST['date_enregistrement'],'matricule_personnel'=>$_POST['matricule_personnel'],'preuve_payement'=>$_POST['preuve_payement']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function modifierSituationDeclarationDeces($id_declaration_deces)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_deces SET situation=:situation WHERE id_declaration_deces=:id_declaration_deces");
		$res = $query->execute(['situation'=>'oui','id_declaration_deces'=>$id_declaration_deces]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function affichageDeces()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM deces a, declaration_deces y, cni c, demande_cni d WHERE a.id_declaration_deces = y.id_declaration_deces AND y.cni_defunt = c.num_cni AND c.id_demande_cni = d.id_demande_cni");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheDeces($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM deces a, declaration_deces y, cni c, demande_cni d WHERE a.id_declaration_deces = y.id_declaration_deces AND y.cni_defunt = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND y.cni_defunt=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function modifierDeces($date_enregistrement,$matricule_personnel,$preuve_payement,$id_deces)
	{
		$con=connection();
		$query = $con->prepare("UPDATE deces SET date_enregistrement=:date_enregistrement,matricule_personnel=:matricule_personnel,preuve_payement=:preuve_payement,id_deces=:id_deces WHERE id_deces=:id_deces");
		$res = $query->execute(['date_enregistrement'=>$date_enregistrement,'matricule_personnel'=>$matricule_personnel,'preuve_payement'=>$preuve_payement,'id_deces'=>$id_deces]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function afficherEffectifDeces()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM deces");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherEffectifDeclarationDeces()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM declaration_deces");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function affichageExtraitDecesPdf($id_deces)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM deces a, declaration_deces y, cni c, demande_cni d,zone z WHERE a.id_declaration_deces = y.id_declaration_deces AND y.cni_defunt = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND id_deces=:id_deces AND y.id_zone=z.id_zone");
		$query->execute(['id_deces'=>$id_deces]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function afficherDesesMatricule($id_deces)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM deces n, declaration_deces d, cni c, demande_cni dc, personnel p WHERE n.id_declaration_deces=d.id_declaration_deces AND c.id_demande_cni = dc.id_demande_cni  AND n.matricule_personnel=p.matricule AND p.num_cni=c.num_cni AND id_deces=:id_deces");
		$query->execute(['id_deces'=>$id_deces]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDesesAdresse($id_deces)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM deces n, declaration_deces d, cni c, demande_cni dc, adresse p WHERE n.id_declaration_deces=d.id_declaration_deces AND c.id_demande_cni = dc.id_demande_cni AND d.cni_defunt=c.num_cni AND dc.id_adresse=p.id_adresse AND id_deces=:id_deces");
		$query->execute(['id_deces'=>$id_deces]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

 ?>