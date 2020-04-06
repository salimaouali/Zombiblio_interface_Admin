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
      $reponse = avoirQuestion($_GET['id_module']);
?>
 
<div class="container">
  <h2>Liste des questions module 1 <div class="pull-right"><button type="button" class="btn btn-success" onclick="javascript:location.href='<?php 
  echo "ajoutquestion.php?id_module=".$_GET['id_module'] ?>'"> Ajouter</button></div></h2>
</div>
<br>


<div class="container">	
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Réponse</th>
      <th scope="col">Cote A</th>
      <th scope="col">Cote B</th>
      <th scope="col">Cote C</th>
      <th scope="col">Cote D</th>
      <th scope="col">Cote E</th>
      <th scope="col">Numéro page</th>
      <th scope="col">Numéro ligne</th>
      <th scope="col">Numéro mot</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php
    $i=0;
    while ($donnees=$reponse->fetch())
    {
      $i = $i+1;
  ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $donnees['contenu'] ?></td>
      <td><?php echo $donnees['reponse'] ?></td>
      <td><?php echo $donnees['coteA'] ?></td>
      <td><?php echo $donnees['coteB'] ?></td>
      <td><?php echo $donnees['coteC'] ?></td>
      <td><?php echo $donnees['coteD'] ?></td>
      <td><?php echo $donnees['coteE'] ?></td>
      <td><?php echo $donnees['numPage'] ?></td>
      <td><?php echo $donnees['numLigne'] ?></td>
      <td><?php echo $donnees['numMot'] ?></td>
      <td><a href="<?php echo "majquestion.php?id_question=".$donnees['id_question1'].'&id_module='.$_GET['id_module']?>">Modifier</a> <a href=" <?php echo "suppresion.php?id_question=".$donnees['id_question1'].'&id_module='.$_GET['id_module']?>">Supprimer</a></td>
    </tr>

  <?php
    }
  ?>
  </tbody>
</table>
</div>

<?php 
}else{ 
  $reponse = avoirQuestion2($_GET['id_module']);
?>

</div>
<div class="container">
  <h2>Liste des questions module 2 <div class="pull-right"><button type="button" class="btn btn-success" onclick="javascript:location.href='<?php 
  echo "ajoutquestion.php?id_module=".$_GET['id_module'] ?>'"> Ajouter</button></div></h2>
</div>
<br>
<div class="container"> 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Auteur</th>
      <th scope="col">Livre</th>
      <th scope="col">Année</th>
      <th scope="col">Réponse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php
    $i=0;
    while ($donnees=$reponse->fetch())
    {
      $i = $i+1;
  ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $donnees['auteur'] ?></td>
      <td><?php echo $donnees['livre'] ?></td>
      <td><?php echo $donnees['annee'] ?></td>
      <td><?php echo $donnees['reponse'] ?></td>

      <td><a href="<?php echo "majquestion.php?id_question=".$donnees['id_question2'].'&id_module='.$_GET['id_module']?>">Modifier</a> <a href=" <?php echo "suppresion.php?id_question=".$donnees['id_question2'].'&id_module='.$_GET['id_module']?>">Supprimer</a></td>
    </tr>

  <?php
    }
  ?>
  </tbody>
</table>
</div>

<?php
  }
?>

</body>
</html>