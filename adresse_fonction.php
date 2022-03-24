<?php
	

	function getAdresses()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM adresse a,zone z WHERE a.id_zone = z.id_zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function rechercheAdresse($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM adresse a,zone z WHERE a.id_zone = z.id_zone AND a.quartier=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function getZotes()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM zone");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function updateAdresse($id_zone,$quartier,$avenue ,$numero,$id_adresse)
	{
		$con=connection();
		$query = $con->prepare("UPDATE adresse SET id_zone=:id_zone,quartier=:quartier,avenue=:avenue,numero=:numero WHERE id_adresse=:id_adresse");
		$res = $query->execute(['id_zone'=>$id_zone,'quartier'=>$quartier,'avenue'=>$avenue ,'numero'=>$numero ,'id_adresse'=>$id_adresse]) or die(print_r($query->errorInfo()));
		return $res;
	}


	function ajouterAdresse($id_zone,$quartier,$avenue ,$numero)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO adresse(id_zone,quartier,avenue,numero) 
                  VALUES(?,?,?,?)");
		$res = $query -> execute(array($id_zone,$quartier,$avenue,$numero))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function supprimerAdresse($id_adresse)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM adresse WHERE id_adresse=:id_adresse");

        $res = $query -> execute(array('id_adresse'=>$id_adresse))

        or die(print_r($query->errorInfo()));

        return $res;
	}




	function getFonction()
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM fonction");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
	function rechercheFonction($id)
	{
		$con=connection();
		$query = $con->prepare("SELECT * FROM fonction WHERE nom_fonction=?");
		$query->execute([$id]);
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	function ajouterFonction($nom_fonction)
	{
		$con=connection();

		$query = $con->prepare("INSERT INTO fonction(nom_fonction) 
                  VALUES(?)");
		$res = $query -> execute(array($nom_fonction))

        or die(print_r($query->errorInfo()));

        return $res;
	}

	function supprimerFonction($id_fonction)
	{
		$con=connection();
		$query=$con->prepare("DELETE FROM fonction WHERE id_fonction=:id_fonction");

        $res = $query -> execute(array('id_fonction'=>$id_fonction))

        or die(print_r($query->errorInfo()));

        return $res;
	}


	function updateFonction($nom_fonction,$id_fonction)
	{
		$con=connection();
		$query = $con->prepare("UPDATE fonction SET nom_fonction=:nom_fonction WHERE id_fonction=:id_fonction");
		$res = $query->execute(['nom_fonction'=>$nom_fonction,'id_fonction'=>$id_fonction])
		 or die(print_r($query->errorInfo()));
		return $res;
	}

?>