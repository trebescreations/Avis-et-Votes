<?php session_start();?>
<?php include('config/db.php');?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Suivi des licences</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
if(isset($_POST['nEtudiant']))
{
	$nEtudiant=$_POST['nEtudiant'];
	$_SESSION['nEtudiant']=$nEtudiant;
}
else
{
	echo "Erreur : Aucun numéro saisi";
	end();
}?>
<?php include("menu.php")?>
<div class="contenu">
<?php
if($nEtudiant=="34000430")
{
	?>
    <div class="jumbotron">
    <h3>Vous êtes :</h3>
	<p>Monsieur TREBES FLORIAN</p>
	<p><strong>Inscrit en</strong> : L1 MIP</p>
    <a href="modify.php">Mon espace</a>
	</div>
    <?php
}
else
{
	?>
    <div class="alert alert-danger">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
    Votre numéro étudiant est incorrect</div>
    <?php
}
?>
</div>
</body>
</html>