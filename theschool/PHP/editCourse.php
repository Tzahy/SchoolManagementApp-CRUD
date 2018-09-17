<!DOCTYPE html>
<html>
    <head>
	    <title>Update Course Details</title>
	    <link rel="stylesheet" type="text/css" href="../Styles/style.css">
	    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    </head>
    
    <body ng-controller="mainCtrl">

        <h1>Update Course Details</h1>

        <form action="courseUpdated.php" method="POST" enctype="multipart/form-data">
            <br><input type="text" placeholder="{{c_name}}" name="name" value="{{c_name}}"><br>
		    <input type="hidden" name="id" value="{{c_id}}">
            
            <textarea name="description"rows="4" cols="50">
                {{c_description}}
            </textarea><br><br><br><br>
              
            <input type="submit" value="UPDATE">
	    </form>

    </body>
</html>