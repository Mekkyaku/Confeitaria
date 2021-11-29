<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<?php
	session_start();
	session_destroy();
	header("Location: index.php");
?>