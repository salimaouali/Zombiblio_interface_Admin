<!DOCTYPE html>
<html>
<head>
  
  <title>Page Web</title>
  <link rel="stylesheet" href="monStyle.css">
	
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <h1><a href="<?php echo "index.php"?>">Page administration</a></h1>
  <br><br><br>
 
<?php 
  include("monPHP.php");

  $nomModule = AvoirNomModule($_GET['id_module']);
  $nomModule = $nomModule->fetch(PDO::FETCH_ASSOC);

  if ($nomModule['nom'] == "module 1"){
?>



<div class="container">
  <h2>Ajout d'une question module 1</h2>
</div>
<br><dr><dr>

<div class="container">

  <form name="ajoutquestion" method="post" action="<?php 
  echo "ajoutquestion.php?id_module=".$_GET['id_module'] ?>" >
    <div class="col-xs-6">
      <label for="question">Contenu de la question</label>
      <textarea class="form-control" name="question" rows="3"></textarea>
      <!-- <input type="text" class="form-control" id="question" placeholder=""> -->
      <br>
    </div>
    <div class="col-xs-6">
      <label for="reponse">Réponse</label>
      <textarea class="form-control" name="reponse" rows="3"></textarea>
      <!-- <input type="text" class="form-control" id="reponse" placeholder=""> -->
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteA">Cote A</label>
      <input type="text" class="form-control" name="coteA" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteB">Cote B</label>
      <input type="text" class="form-control" name="coteB" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteC">Cote C</label>
      <input type="text" class="form-control" name="coteC" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteD">Cote D</label>
      <input type="text" class="form-control" name="coteD" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteE">Cote E</label>
      <input type="text" class="form-control" name="coteE" placeholder="">
      <br>
    </div>

    <div class="col-xs-6">
      <label for="numPage">Numéro de la page</label>
      <input type="text" class="form-control" name="numPage" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="numLigne">Numéro de la ligne</label>
      <input type="text" class="form-control" name="numLigne" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="numMot">Numéro du mot</label>
      <input type="text" class="form-control" name="numMot" placeholder="">
      <br>
    </div>
    <div class="container">
      <div class="right">
        <input type="submit" name="valider" value="Ajouter" class="btn btn-success" ></input>
      </div>
    </div>
  </form>
</div>

<?php 
  if(isset($_POST["valider"])){

    
    $id_module = $_GET['id_module'];
    

    ajoutquestion($_POST['question'], $_POST['reponse'], $_POST['coteA'], $_POST['coteB'], $_POST['coteC'], $_POST['coteD'], $_POST['coteE'], $_GET['id_module'], $_POST['numPage'], $_POST['numLigne'], $_POST['numMot']);
  }
}else{
?>

<div class="container">
  <h2>Ajout d'une question module 2</h2>
</div>
<br><dr><dr>

<div class="container">

  <form name="ajoutquestion" method="post" action="<?php 
  echo "ajoutquestion.php?id_module=".$_GET['id_module'] ?>" >
    
    
    <div class="col-xs-6">
      <label for="coteA">Auteur</label>
      <input type="text" class="form-control" name="auteur" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteA">Livre</label>
      <input type="text" class="form-control" name="livre" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteB">Année</label>
      <input type="text" class="form-control" name="annee" placeholder="">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteC">Réponse</label>
      <input type="text" class="form-control" name="reponse" placeholder="">
      <br>
    </div>
    
    <div class="container">
      <div class="right">
        <input type="submit" name="valider" value="Ajouter" class="btn btn-success" ></input>
      </div>
    </div>
  </form>
</div>

<?php 
  if(isset($_POST["valider"])){


    $id_module = $_GET['id_module'];
    

    ajoutquestion2($_POST['auteur'], $_POST['livre'], $_POST['annee'], $_POST['reponse'], $_GET['id_module']);
  }
?>

<?php 
  }
?>
</body>
</html>