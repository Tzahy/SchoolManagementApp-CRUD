<!DOCTYPE html>
<html>
<head>
	<title>Add New Course</title>
	<link rel="stylesheet" type="text/css" href="../Styles/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body ng-controller="mainCtrl">
	<h1>Add New Course</h1>

    <form action="courseAdded.php" method="POST" enctype="multipart/form-data" ng-submit="showAlertCourse()">

		<br><input type="text" placeholder="Course Name..." name="name" required><br>
		<md-input-container class="md-block">
          <label>Course Description:</label>
<!--         Course Description:-->
          <textarea rows="5" md-select-on-focus name="description" required></textarea>
        </md-input-container>
        
        <label>Course Image:</label><br><br><br>
        <div><input type="file" name="fileToUpload" id="fileToUpload" /></div>
		<br><br><br><br><br>
				
        <input type="submit" value="ADD">

	</form>

</body>
</html>