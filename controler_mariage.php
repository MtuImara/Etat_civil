<?php 
	
	function getZoneMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function ajouterDeclarationMariage($cni_futur_conjoint,$cni_future_conjointe,$cni_temoin1,$cni_temoin2,$date_declaration,$id_zone,$regime)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO declaration_mariage(cni_futur_conjoint,cni_future_conjointe,cni_temoin1,cni_temoin2,date_declaration,id_zone,regime,situation) 
                  VALUES(:cni_futur_conjoint,:cni_future_conjointe,:cni_temoin1,:cni_temoin2,:date_declaration,:id_zone,:regime,:situation)");
		$res = $query -> execute(array('cni_futur_conjoint'=>$_POST['cni_futur_conjoint'],'cni_future_conjointe'=>$_POST['cni_future_conjointe'],'cni_temoin1'=>$_POST['cni_temoin1'],'cni_temoin2'=>$_POST['cni_temoin2'],'date_declaration'=>$_POST['date_declaration'],'id_zone'=>$_POST['id_zone'],'regime'=>$_POST['regime'],'situation'=>'non'))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function afficherDeclarationMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM declaration_mariage a, zone z,cni c,demande_cni d WHERE  a.id_zone = z.id_zone AND a.cni_futur_conjoint = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND a.situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	

		/* $query = $con->prepare("SELECT * FROM declaration_mariage ");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
		*/
	}
	function rechercheDeclaMariage($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM declaration_mariage a, zone z,cni c,demande_cni d WHERE  a.id_zone = z.id_zone AND a.cni_futur_conjoint = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND a.situation='non' AND a.cni_futur_conjoint = ? ");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
		
	}

	function afficherDeclarationMariageConjointe($cni_future_conjointe)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, adresse ad, zone z WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? AND d.id_adresse=ad.id_adresse AND ad.id_zone=z.id_zone");
		$query->execute([$cni_future_conjointe]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationMariageTemoin1($cni_temoin1)
	{
		$con=connection();
		$query = $con->prepare("SELECT nom_demandeur,prenom_demandeur FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_temoin1]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationMariageTemoin2($cni_temoin2)
	{
		$con=connection();
		$query = $con->prepare("SELECT nom_demandeur,prenom_demandeur FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_temoin2]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationMariageMatricule($id_mariage)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM mariage m, cni c, demande_cni d, personnel p WHERE c.id_demande_cni = d.id_demande_cni  AND m.matricule_personnel1=p.matricule AND p.num_cni=c.num_cni AND id_mariage=:id_mariage");
		$query->execute(['id_mariage'=>$id_mariage]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function modifierDeclarationMariage($cni_futur_conjoint,$cni_future_conjointe,$cni_temoin1,$cni_temoin2,$date_declaration,$id_zone,$regime,$id_declaration_mariage)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_mariage SET cni_futur_conjoint=:cni_futur_conjoint,cni_future_conjointe=:cni_future_conjointe,cni_temoin1=:cni_temoin1,cni_temoin2=:cni_temoin2,date_declaration=:date_declaration,id_zone=:id_zone,regime=:regime WHERE id_declaration_mariage=:id_declaration_mariage");
		$res = $query->execute(['cni_futur_conjoint'=>$cni_futur_conjoint,'cni_future_conjointe'=>$cni_future_conjointe,'cni_temoin1'=>$cni_temoin1,'cni_temoin2'=>$cni_temoin2,'date_declaration'=>$date_declaration,'id_zone'=>$id_zone,'regime'=>$regime,'id_declaration_mariage'=>$id_declaration_mariage]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function supprimerDeclarationMariage($id_declaration_mariage)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM declaration_mariage WHERE id_declaration_mariage=:id_declaration_mariage");

        $res = $query -> execute(array('id_declaration_mariage'=>$id_declaration_mariage))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function ajouterMariage($id_declaration_mariage,$date_celebration,$matricule_personnel1,$matricule_personnel2,$preuve_payement)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO mariage(id_declaration_mariage,date_celebration,matricule_personnel1,matricule_personnel2,preuve_payement) 
                  VALUES(:id_declaration_mariage,:date_celebration,:matricule_personnel1,:matricule_personnel2,:preuve_payement)");
		$res = $query -> execute(array('id_declaration_mariage'=>$_POST['id_declaration_mariage'],'date_celebration'=>$_POST['date_celebration'],'matricule_personnel1'=>$_POST['matricule_personnel1'],'matricule_personnel2'=>$_POST['matricule_personnel2'],'preuve_payement'=>$_POST['preuve_payement']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function modifierSituationDeclarationMariage($id_declaration_mariage)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_mariage SET situation=:situation WHERE id_declaration_mariage=:id_declaration_mariage");
		$res = $query->execute(['situation'=>'oui','id_declaration_mariage'=>$id_declaration_mariage]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function affichageMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM mariage a, declaration_mariage f, zone z, cni c, demande_cni d WHERE  a.id_declaration_mariage = f.id_declaration_mariage AND f.id_zone = z.id_zone AND f.cni_futur_conjoint = c.num_cni AND c.id_demande_cni = d.id_demande_cni");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheMariage($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM mariage a, declaration_mariage f, zone z, cni c, demande_cni d WHERE  a.id_declaration_mariage = f.id_declaration_mariage AND f.id_zone = z.id_zone AND f.cni_futur_conjoint = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND a.id_mariage = ? ");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function modifierMariage($date_celebration,$matricule_personnel1,$matricule_personnel2,$preuve_payement,$id_mariage)
	{
		$con=connection();
		$query = $con->prepare("UPDATE mariage SET date_celebration=:date_celebration,matricule_personnel1=:matricule_personnel1,matricule_personnel2=:matricule_personnel2,preuve_payement=:preuve_payement WHERE id_mariage=:id_mariage");
		$res = $query->execute(['date_celebration'=>$date_celebration,'matricule_personnel1'=>$matricule_personnel1,'matricule_personnel2'=>$matricule_personnel2,'preuve_payement'=>$preuve_payement,'id_mariage'=>$id_mariage]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function afficherEffectifMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM mariage");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherEffectifDeclarationMariage()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM declaration_mariage WHERE situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}








/*	function afficherConcatDeclarationMariage($etat)
	{
		$con=connection();
		$query = $con->prepare("SELECT declaration_mariage.id_declaration_mariage,etat,cni.num_cni,demande_cni.nom_demandeur,demande_cni.prenom_demandeur FROM declaration_mariage,cni,demande_cni WHERE declaration_mariage.id_declaration_mariage =  ");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
*/

	function affichageExtraitPdf($id_mariage)
	{
		$con=connection();

		//$query = $con->prepare("SELECT * FROM mariage a,zone z, declaration_mariage y, adresse d WHERE a.id_zone = z.id_zone AND a.id_demande_cni = y.id_demande_cni AND y.id_adresse = d.id_adresse AND id_mariage=:id_mariage");

		$query = $con->prepare("SELECT * FROM mariage m, declaration_mariage dc, zone z,adresse ad,cni c,demande_cni d  WHERE id_mariage=:id_mariage AND m.id_declaration_mariage = dc.id_declaration_mariage AND dc.id_zone = z.id_zone AND dc.cni_futur_conjoint = c.num_cni AND c.id_demande_cni = d.id_demande_cni AND d.id_adresse=ad.id_adresse");
		$query->execute(['id_mariage'=>$id_mariage]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}



 ?>