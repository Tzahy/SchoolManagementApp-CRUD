<?php

session_start();

require '../Database/database.php';

if( isset($_SESSION['user_id']) ){
	$records = $conn->prepare('SELECT id, name, description, image FROM courses WHERE id = :ID');
	$records->bindParam(':ID', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}
    
}

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../Styles/students/studentCard.css" />

</head>
<body ng-controller="mainCtrl">

<h2 style="text-align:center">Course Details</h2><br><br>
<p>Number of students in this course: {{ courses_num }}</p>
<div>
    <img ng-src="../{{c_image}}" alt="" onerror="this.src='../uploads/defaultCourse.jpg';" class="avatar"/>
    <div class="container">
        <h1>{{c_name}}</h1>
        <h3>{{c_description}}</h3>

    <?php if ($_SESSION['userrole'] == 'O') {?>

        <div layout="row" flex>
            <md-button class="md-primary md-raised cyan-text" ng-click='editCourse(c_id,c_name,c_description)'>EDIT</md-button><br><br>
            <md-button class="md-warn md-raised cyan-text" ng-click='deleteCourse(c_id,c_name)'>DELETE</md-button>
        </div>

    <?php } ?>

    </div>
</div>

</body>
</html>
