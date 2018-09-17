<?php

session_start();

require '../Database/database.php';

if( isset($_SESSION['user_id']) ){
	$records = $conn->prepare('SELECT id, name, password, phone, role, email FROM users WHERE id = :ID');
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
<?php if( empty($user) ): 
		header("Location: /theschool/PHP/login.php");
	else: ?>
    
    <html ng-app="schoolhApp">

    <head>
    <link rel="stylesheet" href="../node_modules/angular-material/angular-material.min.css" />
    <link rel="stylesheet" href="../Styles/style.css" />
    </head>
    <body ng-controller="mainCtrl" layout="column">
         
        <md-toolbar>
            
            <h1 style="display:inline">School Management App</h1>
                              
        <md-tabs md-stretch-tabs class="md-primary">
         
<!--          check if user role is owner. If not owner will not be able to add, edit, delete, update courses and students  -->
         <?php if ($_SESSION['userrole'] == 'O') {?>
          <md-tab  layout="row">
              <md-button ng-click="add_student()">add student</md-button>
         </md-tab>
          
          <md-tab  layout="row">
           <md-button ng-click="add_course()">add course</md-button>
          </md-tab>
           
           <md-tab  layout="row">
           <md-button href="#">clear screen</md-button>
          </md-tab>
<!--         end if    -->
         <?php } ?>
            
                       
          <md-tab layout="row"  >
           <md-button href="logout.php">logout</md-button>
          </md-tab>
            
        </md-tabs>
            
        </md-toolbar>

        <!-- Students List -->
        <div class="container" layout="row" flex>
            <md-sidenav md-is-locked-open="true" class="md-whiteframe-4dp">
                <h2>Students</h2>
                <br>
                <md-list>
                    <md-list-item ng-repeat="s in users">
                        <md-button ng-click="choosen_student(s)">
                            <img ng-src="../{{s.image}}" alt="" onerror="this.src='../uploads/defaultStudent.png';" class="avatar"/>
                            {{s.name}}
                        </md-button>
                    </md-list-item>
                </md-list>
            </md-sidenav>
        
        <!-- Courses List -->
<!--        <div ng-controller="coursesCtrl" class="container" layout="row" flex>-->
            <md-sidenav md-is-locked-open="true" class="md-whiteframe-4dp">
                <h2>Courses</h2>
                <br>
                <md-list>
                    <md-list-item ng-repeat="c in courses">
                        <md-button ng-click="choosen_course(c)">
<!--                            <img ng-src="../Styles/courses/img/{{c.img}}" class="avatar">-->
<!--                           <img ng-src="{{c.image}}" class="avatar">-->
                           <img ng-src="../{{c.image}}" alt="" onerror="this.src='../uploads/defaultCourse.jpg';" class="avatar"/>
                            {{c.name}}
                        </md-button>
                    </md-list-item>
                </md-list>
            </md-sidenav>
            
           <md-content flex layout="row" layout-align="center" flex>
               <md-content >
                 <div ng-view></div>
               </md-content>
           </md-content>

        </div>

    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../node_modules/angular-animate/angular-animate.min.js"></script>
    <script src="../node_modules/angular-aria/angular-aria.min.js"></script>
    <script src="../node_modules/angular-material/angular-material.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.5/angular-route.js"></script>
    <script src="../app.js"></script>
    <script src="../Controllers/mainCtrl.js"></script>     
   
   <footer>
        <div layout="row" layout-align="center center">
            <p>&#169; Created by Tzahy Segal</p>
        </div>
    </footer> 
      
    </body>
<?php endif; ?>
</html>

