<?php
require '../Database/database.php';

$data = json_decode(file_get_contents("php://input"));

if (count($data)>0){
    $c = $data->course;
    $query = $conn->prepare("SELECT * FROM students WHERE courses='$c'");
    $query->execute();

    while($rows = $query->fetch(PDO::FETCH_ASSOC)){
        $results[] = $rows;
    }

    if (empty($results)) {
        echo "No students in this course :(";
    }else{
        echo count($results);
    }   
}
?>