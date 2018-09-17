<?php

require '../Database/database.php';

$data = json_decode(file_get_contents("php://input"));

if (count($data)>0){
    $id = $data->id;
    $query = $conn->prepare("DELETE FROM courses WHERE id='$id'");
    $query->execute();
}

?>