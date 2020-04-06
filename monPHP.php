<?php
function connexion(){
	try{
		//On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;port=3308, dbname=id12794175_zombiblio;charset=utf8', 'id12794175_admin', 'admin');
		//$bdd = new PDO('mysql:host=localhost;port=3308, dbname=id12794175_zombiblio;charset=utf8', 'id12794175_admin', 'admin');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e){
		//En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}

function filiere(){
	$bdd = connexion();
	//Si tout va bien, on peut continuer

	//On récupère tout le contenu de la table filiere
	$reponse = $bdd-> query("SELECT * FROM id12794175_zombiblio.filiere");
	return $reponse;
};

function avoirModule($idFiliere){
	$bdd = connexion();

	$sql = "SELECT * FROM id12794175_zombiblio.module WHERE module.id_filiere = $idFiliere";
	$reponse = $bdd-> query($sql);

	return $reponse;
};

function avoirQuestion($idModule){
	$bdd = connexion();

	$sql = "SELECT * FROM id12794175_zombiblio.question1 WHERE question1.id_module1 = $idModule";
	$reponse = $bdd-> query($sql);

	return $reponse;
};

function avoirQuestion2($idModule){
	$bdd = connexion();

	$sql = "SELECT * FROM id12794175_zombiblio.question2 WHERE question2.id_module2 = $idModule";
	$reponse = $bdd-> query($sql);

	return $reponse;
};

function avoirUneQuestion($idQuestion){
	$bdd = connexion();

	$sql = "SELECT * FROM id12794175_zombiblio.question1 WHERE question1.id_question1 = $idQuestion";
	$reponse = $bdd-> query($sql);

	return $reponse;
};

function avoirUneQuestion2($idQuestion){
	$bdd = connexion();

	$sql = "SELECT * FROM id12794175_zombiblio.question2 WHERE question2.id_question2 = $idQuestion";
	$reponse = $bdd-> query($sql);

	return $reponse;
};

function ajoutQuestion($contenu, $reponse, $coteA, $coteB, $coteC, $coteD, $coteE, $id_module, $numPage, $numLigne, $numMot){
	$bdd = connexion();
	print_r("test");
	
	if(empty($coteA)){
		$coteA="--";
	}

	if(empty($coteB)){
		$coteB="--";
	}

	if(empty($coteC)){
		$coteC="--";
	}

	if(empty($coteD)){
		$coteD="--";
	}

	if(empty($coteE)){
		$coteE="--";
	}

	$sql = "INSERT INTO id12794175_zombiblio.question1 (contenu, coteA, coteB, coteC, coteD, coteE, reponse, id_module1, numPage, numLigne, numMot) VALUES ('$contenu', '$coteA', '$coteB', '$coteC', '$coteD', '$coteE', '$reponse', $id_module, $numPage, $numLigne, $numMot)";
    
    
	$bdd-> query($sql);
	echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-2)';</script>";
    
    
    
	exit();
	
	return $rep;
};

function ajoutquestion2($auteur, $livre, $annee, $reponse, $id_module){
	$bdd = connexion();

	$sql = "INSERT INTO id12794175_zombiblio.question2 (auteur, livre, annee, reponse, id_module2) VALUES ('$auteur', '$livre', '$annee', '$reponse', '$id_module')";
	$bdd-> query($sql);

	echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-2)';</script>";
	
	exit();
	return $rep;
};

function majQuestion($id_question, $contenu, $reponse, $coteA, $coteB, $coteC, $coteD, $coteE, $numPage, $numLigne, $numMot, $id_module){
	$bdd = connexion();

	if(empty($coteA)){
		$coteA="--";
	}

	if(empty($coteB)){
		$coteB="--";
	}

	if(empty($coteC)){
		$coteC="--";
	}

	if(empty($coteD)){
		$coteD="--";
	}

	if(empty($coteE)){
		$coteE="--";
	}

	$sql = "UPDATE id12794175_zombiblio.question1 SET contenu = '$contenu', reponse = '$reponse', coteA='$coteA', coteB='$coteB', coteC='$coteC', coteD='$coteD', coteE='$coteE', numPage=$numPage, numLigne=$numLigne, numMot=$numMot WHERE id_question1 = $id_question";

	$rep = $bdd-> query($sql);
	echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-2)';</script>";
	//header('Location: https://zombiblioevry.000webhostapp.com/question.php?&id_module='.$id_module);
	
	exit();
	return $rep;
};

function majQuestion2($id_question, $auteur, $livre, $annee, $reponse, $id_module){
	$bdd = connexion();

	$sql = "UPDATE id12794175_zombiblio.question2 SET auteur = '$auteur', livre = '$livre', annee='$annee', reponse='$reponse' WHERE id_question2 = $id_question";

	$rep = $bdd-> query($sql);
	echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-2)';</script>";
//	header('Location: http://zombiblio/question.php?&id_module='.$id_module);
	exit();
	return $rep;
};

function supprimerQuestion($idQuestion, $id_module){
	$bdd = connexion();

	$sql = "DELETE FROM id12794175_zombiblio.question1 WHERE  question1.id_question1 = $idQuestion";

	$rep = $bdd-> query($sql);
    echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-1)';</script>";
	//header('Location: http://zombiblio/question.php?id_module='.$id_module);
	exit();
	return $rep;
};

function supprimerQuestion2($idQuestion, $id_module){
	$bdd = connexion();

	$sql = "DELETE FROM id12794175_zombiblio.question2 WHERE  question2.id_question2 = $idQuestion";

	$rep = $bdd-> query($sql);
	echo " <script type='text/javascript'> window.location.href = 'javascript:history.go(-1)';</script>";
	//header('Location: http://zombiblio/question.php?id_module='.$id_module);
	exit();
	return $rep;
};

function AvoirNomModule($idModule){
	$bdd = connexion();

	$sql = "SELECT nom FROM id12794175_zombiblio.module WHERE module.id_module = $idModule";
	$reponse = $bdd-> query($sql);

	return $reponse;
};


?>