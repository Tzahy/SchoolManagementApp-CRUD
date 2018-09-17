<?php


session_start();

// verify the user was logged in first
if( !isset($_SESSION['user_id']) ){
	header("Location: /theschool");
}

require '../Database/database.php';

// move selected image to "uploads" directory and enter the image location in the database

$target_dir = "../Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_dir_for_database = "Uploads/";
$target_file_for_databse = $target_dir_for_database . basename($_FILES["fileToUpload"]["name"]);
echo '<script>console.log("Your stuff here")</script>';
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists. if exists remove and add a new one
if(file_exists($target_file)){ 
    unlink($target_file);
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$message = '';
  
if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])):
// Enter the new student into the database
    $sql = "INSERT INTO students (name, phone, email, image, courses) VALUES (:username, :phone, :email, :image, :course)";
    $stmt = $conn->prepare($sql);
// fetch the necessary details from the POST method to bind it to the sql query
    $stmt->bindParam(':username', $_POST['name']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':course', $_POST['course']);
    $stmt->bindParam(':image', $target_file_for_databse);

    if( $stmt->execute() ):
        header("Location: /theschool/PHP/home.php");
// for my debugging
            $message = "Successfully created new student"; 
        else:
            $message = 'Sorry there must have been an issue creating your account';
        endif;

        if(!empty($message)):
            echo "<p>$message</p>";
        endif;

    endif;

?>

