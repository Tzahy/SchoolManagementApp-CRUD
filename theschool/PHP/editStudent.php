<!DOCTYPE html>
<html>
    <head>
	    <title>Update Student Details</title>
	    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
	    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    </head>
    
    <body ng-controller="mainCtrl">

        <h1>Update Student Details</h1>

        <form action="studentUpdated.php" method="POST" enctype="multipart/form-data">
            <br><input type="text" placeholder="{{s_name}}" name="name" value="{{s_name}}"><br>
		    <input type='tel' pattern='^(\d+-?)+\d+$' placeholder="{{s_phone}}" name="phone" value="{{s_phone}}"><br>
		    <input type="email" placeholder="{{s_email}}" name="email" value="{{s_email}}"><br><br><br>
            <input type="hidden" name="id" value="{{s_id}}">
            
            <select name="course">
                <option placeholder=''></option>
                <option ng-repeat="c in courses">{{c.name}}</option>
            </select><br><br><br><br>
              
            <input type="submit" value="UPDATE">
	    </form>

    </body>
</html>