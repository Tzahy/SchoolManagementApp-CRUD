<?php

session_start();

require 'Database/database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT uID,username,password FROM users WHERE uID = :uID');
	$records->bindParam(':uID', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

if( empty($user) ){
		header("Location: /theschool/PHP/login.php");
	}else{ 
    header("Location: /theschool/PHP/home.php");
}
?>
