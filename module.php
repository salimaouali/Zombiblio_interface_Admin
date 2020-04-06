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
  $reponse = avoirModule($_GET['id_filiere']);
?>

<div class="container">
  <h2>Liste des modules</h2>
</div>
<br>


<div class="container">	
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Mudule</th>
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
      <td><?php echo $donnees['nom'] ?></td>
      <td><a href="<?php echo "question.php?id_filiere=".$donnees['id_filiere']."&id_module=".$donnees['id_module']; ?>">Ouvrir</a></td>
    </tr>

  <?php
    }
  ?>
  </tbody>
</table>
</div>
	
</body>
</html>