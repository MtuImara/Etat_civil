<?php
	function getZoneUser()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function getFonctionUser()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM fonction");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function ajouterUser($num_cni,$login,$password,$matricule,$id_fonction,$id_zone)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO personnel(num_cni,login,password,matricule,id_fonction,id_zone) 
                  VALUES(:num_cni,:login,:password,:matricule,:id_fonction,:id_zone)");
		$res = $query -> execute(array('num_cni'=>$_POST['num_cni'],'login'=>$_POST['login'],'password'=>$_POST['password'],'matricule'=>$_POST['matricule'],'id_fonction'=>$_POST['id_fonction'],'id_zone'=>$_POST['id_zone']))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function afficherUser()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM personnel a, fonction f, zone z WHERE  a.id_fonction = f.id_fonction AND a.id_zone = z.id_zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheUser($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM personnel a, fonction f, zone z WHERE  a.id_fonction = f.id_fonction AND a.id_zone = z.id_zone AND a.login=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function supprimerUser($matricule)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM personnel WHERE matricule=:matricule");

        $res = $query -> execute(array('matricule'=>$matricule))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function modifierUser($num_cni,$login,$password,$id_fonction,$id_zone,$matricule)
	{
		$con=connection();
		$query = $con->prepare("UPDATE personnel SET num_cni=:num_cni,login=:login,password=:password,id_fonction=:id_fonction,id_zone=:id_zone WHERE matricule=:matricule");
		$res = $query->execute(['num_cni'=>$num_cni,'login'=>$login,'password'=>$password,'id_fonction'=>$id_fonction,'id_zone'=>$id_zone,'matricule'=>$matricule]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function afficherEffectifUser()
	{
		$con=connection();
		$query = $con->prepare("SELECT COUNT(*) AS effectif FROM personnel");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherNomUser($num_cni)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM cni c, demande_cni d WHERE c.id_demande_cni = d.id_demande_cni AND num_cni = ? ");
		$query->execute([$num_cni]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	function authentificationUser($login,$password)
	{
		$con=connection();
		$nom=trim($_POST['login']);
        $pwd=trim($_POST['password']);
		$query = $con->prepare("SELECT * FROM personnel where login=? AND password=?");
		$query->execute(array($login,$password));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function afficherDataLoginUser()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM personnel a, fonction f, zone z WHERE  a.id_fonction = f.id_fonction AND a.id_zone = z.id_zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

?>