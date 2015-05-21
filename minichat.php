<!DOCTYPE html>
<html>
	<header>
		<meta charset="utf-8"/>
	</header>
	<body>
		
	<a href="http://localhost/minichat.php" style="color: green;">Rafraichir la page</a>
	<form method="POST" action="minichat_post.php" style="text-align : center;">
	 
	<p>
	   <label for="pseudo"> Pseudo :</label> <input type="text" name="pseudo" value="<?php if(isset($_COOKIE['pseudoUtil'])) { echo  $_COOKIE['pseudoUtil']; } else {echo  'pseudo ici' ;} ?> "<br/>
	   <br/>
	   <label for="message"> Message :</label> <input type="text" name="message" /> 
	    <br/>
	   <input type="submit" value="envoyer"/>

	</p>

	</form>
		
		<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

	$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_poster, \'%d/%m/%Y à %Hh%imin%ss\') AS laDate FROM chatmini ORDER BY ID DESC LIMIT 0,10 ');

	while ($donnee = $reponse->fetch()) 
		{
		echo '<p>[<em> Le '.htmlspecialchars($donnee['laDate']).'</em>]<strong> '.htmlspecialchars($donnee['pseudo']).'</strong> :'.htmlspecialchars($donnee['message']).'</p>';
		}
	?>

	</body>
</html>
