<?php

session_start();

require '../Database/database.php';

if( isset($_SESSION['user_id']) ){
	$records = $conn->prepare('SELECT id, role FROM users WHERE id = :ID');
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
 
    <h2 style="text-align:center">Student Profile Details</h2><br><br>

    <div>
     <img ng-src="../{{s_image}}" alt="" onerror="this.src='../uploads/defaultStudent.png';" class="avatar"/>
      <div class="container">
    
        <h1>{{s_name}}</h1>
          <h3>Phone Number: {{s_phone}}</h3>
          <h4>E-Mail: {{s_email}}</h4>

          <h5>Participant in Course:</h5>
        <p>{{s_course}}</p>
    <!-- show the edit and delete options only for user role owner (check the logged in user role)  -->
    <?php if ($_SESSION['userrole'] == 'O') {?>
        <div layout="row" flex>
            <md-button class="md-primary md-raised cyan-text" ng-click='editStudent(s_id,s_name,s_phone,s_email,s_course)'>EDIT</md-button><br><br>
            <md-button class="md-warn md-raised cyan-text" ng-click='deleteStudent(s_id,s_name)'>DELETE</md-button>
        </div>
    <?php } ?>
      </div>
    </div>

</body>
</html>
