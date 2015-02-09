<?php
session_start();
// Connexion
require_once('include/connect.php');

if (count($_POST) > 0){

	$sql="SELECT `pseudo`,`motdepasse`,`email` FROM `login` WHERE `pseudo`='".$_POST['pseudo']."'";
	if (!($result = $db->query($sql))){
		die('Erreur de requete SQL');
	}
	if ( $result->num_rows > 0){
		$row = $result->fetch_assoc();
		if ($row['motdepasse'] == $_POST['password']){
			echo 'Félicitations vous etes connectés ';
			$_SESSION['pseudo'] = $row['pseudo'];
			$_SESSION['motdepasse'] = $row['motdepasse'];
			$_SESSION['email'] = $row['email'];
			echo $_SESSION['pseudo'];
		}
		else{
			echo 'Mot de passe incorrect';
		}
	}
	else {echo 'Vous n\'etes pas encore inscrit ? <a href="inscription.php">Inscrivez vous !</a>';}
};


?>

<form method="post" action="connexion.php">
	<input type="text" name="pseudo" placeholder="Pseudo"/>
	<input type="password" name="password" placeholder="Mot de passe"/>
	<input type="submit"/>
</form>
