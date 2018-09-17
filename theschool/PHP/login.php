<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /theschool");
}

require_once '../Database/database.php';

if(!empty($_POST['name']) && !empty($_POST['password'])):

	$records = $conn->prepare('SELECT id, name, password, role, phone, email FROM users WHERE name = :username');
	$records->bindParam(':username', $_POST['name']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
    	
	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
		$_SESSION['user_id'] = $results['id'];
        $_SESSION['username'] = $results['name'];
        $_SESSION['userrole'] = $results['role'];
        $_SESSION['userphone'] = $results['phone'];
        $_SESSION['useremail'] = $results['email'];

        header("Location: /theschool/PHP/home.php");
    } else {
        $message = 'Sorry, your credentials do not match, please try again.';
	}

endif;

?>
    <!DOCTYPE html>
     <html ng-app="schoolhApp">

    <head>
    <link rel="stylesheet" href="../node_modules/angular-material/angular-material.min.css" />
    <link rel="stylesheet" href="../Styles/style.css" />
    </head>
    
    <body layout="column">

        <md-toolbar>
            <h1>School Management App</h1>
        </md-toolbar>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <h1>Login</h1>
        
        <form action="login.php" method="POST">
            <input type="text" placeholder="Enter your name" name="name">
            <input type="password" placeholder="and password" name="password">
            <input type="submit"> </form>
                    
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../node_modules/angular-animate/angular-animate.min.js"></script>
    <script src="../node_modules/angular-aria/angular-aria.min.js"></script>
    <script src="../node_modules/angular-material/angular-material.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.5/angular-route.js"></script>
    <script src="../app.js"></script>
    </body>

    </html>