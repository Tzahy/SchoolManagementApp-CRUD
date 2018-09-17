<?php

require '../Database/database.php';

$query = $conn->prepare('SELECT name FROM users');
	$query->bindParam(':username', $_POST['name']);
	$query->execute();

while($rows = $query->fetch(PDO::FETCH_ASSOC)){
    $results[] = $rows;
}

echo json_encode($results);

?>