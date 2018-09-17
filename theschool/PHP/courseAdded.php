<?php


session_start();

// verify the user was logged in first
if( !isset($_SESSION['user_id']) ){
	header("Location: /theschool");
}

require '../Database/database.php';

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
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
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
$query = '';
if(!empty($_POST['name']) && !empty($_POST['description'])):

    $query = mysql_query("SELECT name FROM courses WHERE name='".$coursename."'");

    // Enter the new user into the database
    $sql = "INSERT INTO courses (name, description, image) VALUES (:coursename, :description, :image)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':coursename', $_POST['name']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':image', $target_file_for_databse);

    if( $stmt->execute() ):
        header("Location: /theschool/PHP/home.php");
        $message = "Successfully created new course.";
    else:
        $message = 'Sorry there must have been an issue creating your course creation.';
    endif;

    if(!empty($message)):
        echo "<p>$message</p>";
    endif;

endif;

?>

