<?php 

	function getAdresseNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM adresse a, zone z WHERE a.id_zone = z.id_zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function getZoneNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function ajouterDeclarationNaissance($nom_enfant,$prenom_enfant,$jour,$mois,$annee,$id_zone,$cni_pere,$cni_mere,$cni_temoin1,$cni_temoin2,$certificat,$date_declaration,$statut_enfant,$id_adresse)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO declaration_naissance(nom_enfant,prenom_enfant,jour,mois,annee,id_zone,cni_pere,cni_mere,cni_temoin1,cni_temoin2,certificat,date_declaration,statut_enfant,id_adresse,situation) VALUES(:nom_enfant,:prenom_enfant,:jour,:mois,:annee,:id_zone,:cni_pere,:cni_mere,:cni_temoin1,:cni_temoin2,:certificat,:date_declaration,:statut_enfant,:id_adresse,:situation)");
		$res = $query -> execute(array('nom_enfant'=>$_POST['nom_enfant'],'prenom_enfant'=>$_POST['prenom_enfant'],'jour'=>$_POST['jour'],'mois'=>$_POST['mois'],'annee'=>$_POST['annee'],'id_zone'=>$_POST['id_zone'],'cni_pere'=>$_POST['cni_pere'],'cni_mere'=>$_POST['cni_mere'],'cni_temoin1'=>$_POST['cni_temoin1'],'cni_temoin2'=>$_POST['cni_temoin2'],'certificat'=>$_POST['certificat'],'date_declaration'=>$_POST['date_declaration'],'statut_enfant'=>$_POST['statut_enfant'],'id_adresse'=>$_POST['id_adresse'],'situation'=>'non')) or die(print_r($query->errorInfo()));

        return $res;
	}


	function afficherDeclarationNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM declaration_naissance a, zone z,adresse d WHERE a.id_zone = z.id_zone AND a.id_adresse = d.id_adresse AND situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheDeclNaissance($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM declaration_naissance a, zone z,adresse d WHERE a.id_zone = z.id_zone AND a.id_adresse = d.id_adresse AND situation='non' AND nom_enfant=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationNaissanceMere($cni_mere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_zone=z.id_zone AND num_cni = ?");
		$query->execute([$cni_mere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationNaissancePere($cni_pere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_zone=z.id_zone AND num_cni = ?");
		$query->execute([$cni_pere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationNaissanceTemoin1($cni_temoin1)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_temoin1]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationNaissanceTemoin2($cni_temoin2)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_temoin2]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function modifierDeclarationNaissance($nom_enfant,$prenom_enfant,$id_zone,$jour,$mois,$annee,$cni_pere,$cni_mere,$cni_temoin1,$cni_temoin2,$certificat,$date_declaration,$statut_enfant,$id_adresse,$id_declaration_naissance)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_naissance SET nom_enfant=:nom_enfant,prenom_enfant=:prenom_enfant,id_zone=:id_zone,jour=:jour,mois=:mois,annee=:annee,cni_pere=:cni_pere,cni_mere=:cni_mere,cni_temoin1=:cni_temoin1,cni_temoin2=:cni_temoin2,certificat=:certificat,date_declaration=:date_declaration,statut_enfant=:statut_enfant,id_adresse=:id_adresse WHERE id_declaration_naissance=:id_declaration_naissance");
		$res = $query->execute(['nom_enfant'=>$nom_enfant,'prenom_enfant'=>$prenom_enfant,'id_zone'=>$id_zone,'jour'=>$jour,'mois'=>$mois,'annee'=>$annee,'cni_pere'=>$cni_pere,'cni_mere'=>$cni_mere,'cni_temoin1'=>$cni_temoin1,'cni_temoin2'=>$cni_temoin2,'certificat'=>$certificat,'date_declaration'=>$date_declaration,'statut_enfant'=>$statut_enfant,'id_adresse'=>$id_adresse,'id_declaration_naissance'=>$id_declaration_naissance]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function supprimerDeclarationNaissance($id_declaration_naissance)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM declaration_naissance WHERE id_declaration_naissance=:id_declaration_naissance");

        $res = $query -> execute(array('id_declaration_naissance'=>$id_declaration_naissance))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function ajouterNaissance($id_declaration_naissance,$date_enregistrement,$matricule_personnel,$preuve_payement)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO naissance(id_declaration_naissance,date_enregistrement,matricule_personnel,preuve_payement) 
                  VALUES(:id_declaration_naissance,:date_enregistrement,:matricule_personnel,:preuve_payement)");
		$res = $query -> execute(array('id_declaration_naissance'=>$_POST['id_declaration_naissance'],'date_enregistrement'=>$_POST['date_enregistrement'],'matricule_personnel'=>$_POST['matricule_personnel'],'preuve_payement'=>$_POST['preuve_payement']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function modifierSituationDeclarationNaissance($id_declaration_naissance)
	{
		$con=connection();
		$query = $con->prepare("UPDATE declaration_naissance SET situation=:situation WHERE id_declaration_naissance=:id_declaration_naissance");
		$res = $query->execute(['situation'=>'oui','id_declaration_naissance'=>$id_declaration_naissance]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function afficherNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM naissance a, zone z,declaration_naissance d WHERE a.id_declaration_naissance = d.id_declaration_naissance AND d.id_zone = z.id_zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheNaissance($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM naissance a, zone z,declaration_naissance d WHERE a.id_declaration_naissance = d.id_declaration_naissance AND d.id_zone = z.id_zone AND a.id_naissance=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function modifierNaissance($date_enregistrement,$matricule_personnel,$preuve_payement,$id_naissance)
	{
		$con=connection();
		$query = $con->prepare("UPDATE naissance SET date_enregistrement=:date_enregistrement,matricule_personnel=:matricule_personnel,preuve_payement=:preuve_payement WHERE id_naissance=:id_naissance");
		$res = $query->execute(['date_enregistrement'=>$date_enregistrement,'matricule_personnel'=>$matricule_personnel,'preuve_payement'=>$preuve_payement,'id_naissance'=>$id_naissance]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function afficherEffectifNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM naissance");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherEffectifDeclarationNaissance()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM declaration_naissance WHERE situation='nom'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function affichageExtraitPdfNaissance($id_naissance)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM naissance a, zone z,declaration_naissance d WHERE a.id_declaration_naissance = d.id_declaration_naissance AND d.id_zone = z.id_zone AND id_naissance=:id_naissance");
		$query->execute(['id_naissance'=>$id_naissance]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function afficherDeclarationNaissanceMatricule($id_naissance)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM naissance n, declaration_naissance d, cni c, demande_cni dc, personnel p WHERE n.id_declaration_naissance=d.id_declaration_naissance AND c.id_demande_cni = dc.id_demande_cni  AND n.matricule_personnel=p.matricule AND p.num_cni=c.num_cni AND c.id_demande_cni=dc.id_demande_cni AND id_naissance=:id_naissance");
		$query->execute(['id_naissance'=>$id_naissance]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


 ?>