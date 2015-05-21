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
<?php include("menu.php")?>
<div class="contenu">
<?php
if($_SESSION['nEtudiant']=="34000430")
{
	?>
    <div class="menu">
    <div class="jumbotron navbar-fixed-top">
    Vous êtes connecté en tant que TREBES FLORIAN, n°<?php echo $_SESSION['nEtudiant']; ?>
    </div></div>
    <div class="jumbotron">
    <?php
	$reponse=$bdd->prepare('SELECT * FROM jeux_video WHERE ID=?');
	$reponse->execute(array($_SESSION['nEtudiant']));
	while($donnees=$reponse->fetch())
	{
		echo 'Bienvenue';
		echo $donnees['nom'];
		?><br><?php
	}
	$reponse->closeCursor();
	if(isset($_POST['entree']))
	{
		$entree=$bdd->prepare('INSERT INTO jeux_video(nom) VALUES(:nom)');
		$entree->execute(array(
			'nom'=>$_POST['entree'],
		));
		echo 'Entree Ajoutee';
	}
	else
	{?>
		<form class="form-inline" action="modify.php" method="post">
        <input name="entree" type="text" class="form-control">
        <button class="btn btn-success" type="submit">Valider</button>
        </form><?php
	}
	?>
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