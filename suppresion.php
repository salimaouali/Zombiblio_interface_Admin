<?php

include("monPHP.php");


if(isset($_GET["id_question"])){
	$nomModule = AvoirNomModule($_GET['id_module']);
	$nomModule = $nomModule->fetch(PDO::FETCH_ASSOC);

  	if ($nomModule['nom'] == "module 1"){
    	supprimerQuestion($_GET["id_question"], $_GET["id_module"]);
    }else{
    	supprimerQuestion2($_GET["id_question"], $_GET["id_module"]);
    }
}

?>