<?php 

	function getZoneDemandeCNI()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function getAdresseDemandeCNI()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM adresse");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function ajouterDemandeCNI($nom_demandeur,$prenom_demandeur,$cni_pere,$cni_mere,$id_zone,$id_adresse,$lieu_naissance,$date_naissance,$etat_civil,$profession,$photo,$phone_mail)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO demande_cni(nom_demandeur,prenom_demandeur,cni_pere,cni_mere,id_zone,id_adresse,lieu_naissance,date_naissance,etat_civil,profession,photo,phone_mail,situation) VALUES(:nom_demandeur,:prenom_demandeur,:cni_pere,:cni_mere,:id_zone,:id_adresse,:lieu_naissance,:date_naissance,:etat_civil,:profession,:photo,:phone_mail,:situation)");
		$res = $query -> execute(array('nom_demandeur'=>$_POST['nom_demandeur'] , 'prenom_demandeur'=>$_POST['prenom_demandeur'] , 'cni_pere'=>$_POST['cni_pere'], 'cni_mere'=>$_POST['cni_mere'], 'id_zone'=>$_POST['id_zone'], 'id_adresse'=>$_POST['id_adresse'], 'lieu_naissance'=>$_POST['lieu_naissance'],'date_naissance'=>$_POST['date_naissance'], 'etat_civil'=>$_POST['etat_civil'], 'profession'=>$_POST['profession'], 'photo'=>$_POST['photo'], 'phone_mail'=>$_POST['phone_mail'], 'situation'=>'non')) or die(print_r($prod->errorInfo()));

	    return $res;
	}


	function getDemandeCNI()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM demande_cni a,zone z,adresse d WHERE a.id_zone = z.id_zone AND a.id_adresse = d.id_adresse AND situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheDemandeCNI($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM demande_cni a,zone z,adresse d WHERE a.id_zone = z.id_zone AND a.id_adresse = d.id_adresse AND situation='non' AND a.nom_demandeur=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDemandeCNIPere($cni_pere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_pere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDemandeCNIMere($cni_mere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ?");
		$query->execute([$cni_mere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}



	function updateDemandeCNI($id_demande_cni,$nom_demandeur,$prenom_demandeur,$cni_pere,$cni_mere,$id_zone,$id_adresse,$lieu_naissance,$date_naissance,$etat_civil,$profession,$photo,$phone_mail)
	{

		$con=connection();
		$query = $con->prepare("UPDATE demande_cni SET nom_demandeur=:nom_demandeur,prenom_demandeur=:prenom_demandeur,cni_pere=:cni_pere,cni_mere=:cni_mere,id_zone=:id_zone,id_adresse=:id_adresse,lieu_naissance=:lieu_naissance,date_naissance=:date_naissance,etat_civil=:etat_civil,profession=:profession,photo=:photo,phone_mail=:phone_mail WHERE id_demande_cni=:id_demande_cni");
		$res = $query->execute(['id_demande_cni'=>$id_demande_cni,'nom_demandeur'=>$nom_demandeur,'prenom_demandeur'=>$prenom_demandeur,'cni_pere'=>$cni_pere,'cni_mere'=>$cni_mere,'id_zone'=>$id_zone,'id_adresse'=>$id_adresse,'lieu_naissance'=>$lieu_naissance,'date_naissance'=>$date_naissance,'etat_civil'=>$etat_civil,'profession'=>$profession,'photo'=>$photo,'phone_mail'=>$phone_mail]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function supprimerDemandeCNI($id_demande_cni)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM demande_cni WHERE id_demande_cni=:id_demande_cni");

        $res = $query -> execute(array('id_demande_cni'=>$id_demande_cni))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function ajouterCNI($num_cni,$id_demande_cni,$id_zone,$date_delivrance,$nom_personnel,$prenom_personnel)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO cni(num_cni,id_demande_cni,id_zone,date_delivrance,nom_personnel,prenom_personnel) 
                  VALUES(:num_cni,:id_demande_cni,:id_zone,:date_delivrance,:nom_personnel,:prenom_personnel)");
		$res = $query -> execute(array('num_cni'=>$_POST['num_cni'],'id_demande_cni'=>$_POST['id_demande_cni'],'id_zone'=>$_POST['id_zone'],'date_delivrance'=>$_POST['date_delivrance'],'nom_personnel'=>$_POST['nom_personnel'],'prenom_personnel'=>$_POST['prenom_personnel']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function updateSituationDemandeCNI($id_demande_cni)
	{

		$con=connection();
		$query = $con->prepare("UPDATE demande_cni SET situation=:situation WHERE id_demande_cni=:id_demande_cni");
		$res = $query->execute(['situation'=>'oui','id_demande_cni'=>$id_demande_cni]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function affichageCNI()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni a,zone z, demande_cni y, adresse d WHERE a.id_zone = z.id_zone AND a.id_demande_cni = y.id_demande_cni AND y.id_adresse = d.id_adresse");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheCNI($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni a,zone z, demande_cni y, adresse d WHERE a.id_zone = z.id_zone AND a.id_demande_cni = y.id_demande_cni AND y.id_adresse = d.id_adresse AND a.num_cni=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function modifierCNI($num_cni,$id_zone,$date_delivrance,$nom_personnel,$prenom_personnel)
	{
		$con=connection();
		$query = $con->prepare("UPDATE cni SET id_zone=:id_zone,date_delivrance=:date_delivrance,nom_personnel=:nom_personnel,prenom_personnel=:prenom_personnel WHERE num_cni=:num_cni");
		$res = $query->execute(['num_cni'=>$num_cni,'id_zone'=>$id_zone,'date_delivrance'=>$date_delivrance,'nom_personnel'=>$nom_personnel,'prenom_personnel'=>$prenom_personnel]) or die(print_r($query->errorInfo()));
		return $res;
	}

	function afficherEffectifDemandeCNI()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM demande_cni WHERE situation='non'");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function affichagePdfCNI($num_cni)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni a,zone z, demande_cni y, adresse d WHERE a.id_zone = z.id_zone AND a.id_demande_cni = y.id_demande_cni AND y.id_adresse = d.id_adresse AND num_cni=:num_cni");
		$query->execute(['num_cni'=>$num_cni]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function afficherDeclarationNaissanceMere($cni_mere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_zone=z.id_zone AND num_cni = ?");
		$query->execute([$cni_mere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDeclarationCniPere($cni_pere)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d, zone z WHERE c.id_demande_cni = d.id_demande_cni AND d.id_zone=z.id_zone AND num_cni = ?");
		$query->execute([$cni_pere]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function afficherNomPerePdf($num_cni)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni =:num_cni ");
		$query->execute(['num_cni'=>$num_cni]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherNomMerePdf($num_cni)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni =:num_cni ");
		$query->execute(['num_cni'=>$num_cni]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}




 ?>