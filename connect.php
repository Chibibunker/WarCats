<?php
//Fichier de Connexion

	$db = new mysqli( 'localhost' , 'rootJ' , '' , 'warcats' );
	if( $db->connect_errno ){
		die( $db->connect_error );
	}

?>
