<?php 
	session_start();

	require("dbConnector.php");

	$db = loadDatabase();

	$stmt = $db->prepare('DELETE FROM photos WHERE P_ID = :P_ID');
	$stmt->bindValue(':P_ID', $_SESSION["P_ID"]);
	$stmt->execute();
?>