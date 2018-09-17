<?php
session_start();

// verify the user was logged in first
if( !isset($_SESSION['user_id']) ){
	header("Location: /theschool");
}

require '../Database/database.php';

$message = '';
$sql = "UPDATE courses SET name = :name, description = :description WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':description', $_POST['description']);

if( $stmt->execute() ):
    header("Location: /theschool/PHP/home.php");
    //for my debugging
    $message = "Successfully updated course";
else:
    $message = 'Sorry there must have been an issue updating the course';
endif;

if(!empty($message)):
    echo "<p>$message</p>";
endif;
?>

