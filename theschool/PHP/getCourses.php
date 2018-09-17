<?php

require '../Database/database.php';

$query = $conn->prepare('SELECT * FROM courses');
$query->execute();

while($rows = $query->fetch(PDO::FETCH_ASSOC)){
    $results[] = $rows;
}

echo json_encode($results);

?>