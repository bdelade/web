<?php
	
	session_start();
	
	session_destroy();
	
	header('Location: ../vues/PageDeconnecteVue.php');

?>