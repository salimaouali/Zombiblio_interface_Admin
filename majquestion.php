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
    $reponse = avoirUneQuestion($_GET['id_question'])
?>



<div class="container">
  <h2>Mettre à jour une question du module 1</h2>
</div>
<br><dr><dr>

<?php 
    while ($donnees=$reponse->fetch())
    {
?>

<div class="container">

  <form name="majquestion" method="post" action="<?php 
  echo "majquestion.php?id_question=".$_GET['id_question']."&id_module=".$_GET['id_module'] ?>">
    
    <div class="col-xs-6">
      <label for="question">Contenu de la question</label>
      <textarea class="form-control" name="question" rows="3" value= "<?php echo $donnees['contenu'] ?>"><?php echo $donnees['contenu'] ?></textarea>
      <!-- <input type="text" class="form-control" id="question" placeholder=""> -->
      <br>
    </div>
    <div class="col-xs-6">
      <label for="reponse">Réponse</label>
      <textarea class="form-control" name="reponse" rows="3"><?php echo $donnees['reponse'] ?></textarea>
      <!-- <input type="text" class="form-control" id="reponse" placeholder=""> -->
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteA">Cote A</label>
      <input type="text" class="form-control" name="coteA" placeholder="" value= "<?php echo $donnees['coteA'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteB">Cote B</label>
      <input type="text" class="form-control" name="coteB" placeholder="" value= "<?php echo $donnees['coteB'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteC">Cote C</label>
      <input type="text" class="form-control" name="coteC" placeholder="" value= "<?php echo $donnees['coteC'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteD">Cote D</label>
      <input type="text" class="form-control" name="coteD" placeholder="" value= "<?php echo $donnees['coteD'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="coteE">Cote E</label>
      <input type="text" class="form-control" name="coteE" placeholder="" value= "<?php echo $donnees['coteE'] ?>">
      <br>
    </div>

    <div class="col-xs-6">
      <label for="numPage">Numéro de la page</label>
      <input type="text" class="form-control" name="numPage" placeholder="" value= "<?php echo $donnees['numPage'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="numLigne">Numéro de la ligne</label>
      <input type="text" class="form-control" name="numLigne" placeholder="" value= "<?php echo $donnees['numLigne'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="numMot">Numéro du mot</label>
      <input type="text" class="form-control" name="numMot" placeholder="" value= "<?php echo $donnees['numMot'] ?>">
      <br>
    </div>
    <div class="container">
      <div class="right">
        <input type="submit" name="valider" value="Mettre à jour" class="btn btn-success" ></input>
      </div>
    </div>
  </form>
</div>

<?php 
  }

  if(isset($_POST["valider"])){

    majQuestion($_GET['id_question'], $_POST['question'], $_POST['reponse'], $_POST['coteA'], $_POST['coteB'], $_POST['coteC'], $_POST['coteD'], $_POST['coteE'], $_POST['numPage'], $_POST['numLigne'], $_POST['numMot'], $_GET['id_module']);
  }
}else {
  $reponse = avoirUneQuestion2($_GET['id_question'])
?>

<div class="container">
  <h2>Mettre à jour une question du module 2</h2>
</div>
<br><dr><dr>

<?php 
    while ($donnees=$reponse->fetch())
    {
?>
<div class="container">

  <form name="majquestion" method="post" action="<?php 
  echo "majquestion.php?id_question=".$_GET['id_question']."&id_module=".$_GET['id_module'] ?>">
    
    <div class="col-xs-6">
      <label for="auteur">Auteur</label>
      <input type="text" class="form-control" name="auteur" placeholder="" value= "<?php echo $donnees['auteur'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="livre">Livre</label>
      <input type="text" class="form-control" name="livre" placeholder="" value= "<?php echo $donnees['livre'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="annee">Année</label>
      <input type="text" class="form-control" name="annee" placeholder="" value= "<?php echo $donnees['annee'] ?>">
      <br>
    </div>
    <div class="col-xs-6">
      <label for="reponse">Réponse</label>
      <input type="text" class="form-control" name="reponse" placeholder="" value= "<?php echo $donnees['reponse'] ?>">
      <br>
    </div>
    <div class="container">
      <div class="right">
        <input type="submit" name="valider" value="Mettre à jour" class="btn btn-success" ></input>
      </div>
    </div>
  </form>
</div>

<?php 
  }

  if(isset($_POST["valider"])){

    majQuestion2($_GET['id_question'], $_POST['auteur'], $_POST['livre'], $_POST['annee'], $_POST['reponse'], $_GET['id_module']);
  }
}
?>

</body>
</html>