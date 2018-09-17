<!DOCTYPE html>
<html>
<head>
	<title>Add New Student</title>
	<link rel="stylesheet" type="text/css" href="../Styles/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body ng-controller="mainCtrl">

		<h1>Add New Student</h1>
	
    <form action="studentAdded.php" method="POST" enctype="multipart/form-data" ng-submit="showAlertStudent()">

		<br><input type="text" placeholder="Student Name..." name="name" required><br>
		<input type='tel' pattern='^(\d+-?)+\d+$' placeholder='Phone Number...' name="phone" required><br>
        <input type="email" placeholder="Student E-Mail..." name="email" required><br><br>
       
        Course: 
        <select name="course">
            <option placeholder=''></option>
            <option ng-repeat="c in courses">{{c.name}}</option>
        </select><br><br><br><br>
           		       
		<label>Student Image:</label><br><br><br>
        <div><input type="file" name="fileToUpload" id="fileToUpload" /></div>
		<br><br><br><br><br>
				
        <input type="submit" value="ADD">

	</form>

</body>
</html>