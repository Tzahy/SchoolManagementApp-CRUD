<?php
session_start();

// verify the user was logged in first
if( !isset($_SESSION['user_id']) ){
	header("Location: /theschool");
}

require '../Database/database.php';

$message = '';
$sql = "UPDATE students SET name = :name, phone = :phone, email = :email, courses = :course WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':phone', $_POST['phone']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':course', $_POST['course']);

if( $stmt->execute() ):
    header("Location: /theschool/PHP/home.php");
    //for my debugging
    $message = "Successfully updated student";
else:
    $message = 'Sorry there must have been an issue updating student';
endif;

if(!empty($message)):
    echo "<p>$message</p>";
endif;
?>

