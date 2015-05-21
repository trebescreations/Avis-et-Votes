<?php include('config/db.php');?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Avis L1 MIP</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include("menu.php")?>
<div class="contenu">
<div class="jumbotron">
<h3>Merci de saisir votre numéro étudiant</h3>
<form class="form-inline" action="result.php" method="post">
  <div class="input-group col-lg-3"> 
    <input type="text" name="nEtudiant" class="form-control" style="text-align:right">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit">Valider</button>
    </span>
  </div>
</form>
</div>
</div>
</body>
</html>