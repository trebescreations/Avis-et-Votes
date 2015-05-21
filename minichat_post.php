<?php
 if (isset($_POST['pseudo']) && !empty($_POST['pseudo']))
		setcookie('pseudoUtil',$_POST['pseudo'],time()+24*3600,null,null,false,true);
	/*else 
		setcookie('pseudoUtil',$_POST['pseudo'],time()+24*3600,null,null,false,true);*/
?>

<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req=$bdd->prepare('INSERT INTO chatmini (pseudo, message, date_poster) VALUES (? , ?, NOW() ) ');

	if(isset($_COOKIE['pseudoUtil']) && isset($_POST['message'])  && !empty($_COOKIE['pseudoUtil']) && !empty($_POST['message']))  //pour ne pas enregistre des champ vide
	{

		if (!empty($_POST['pseudo'])) {  //si le champ n'est pas vide on l'insert 

			$lePseudo=$_POST['pseudo'];

		} else {  //sinon le cookie;

			$lePseudo=$_COOKIE['pseudoUtil'];
		}
		
		if ( $req->execute(array($lePseudo,$_POST['message'])) )  //on les inserts
			{
				header('Location: minichat.php');	
			}
		else echo "requete pas executer";
	}
	else 
		header('Location: minichat.php');
?>