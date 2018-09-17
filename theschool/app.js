app = angular.module('schoolhApp', ['ngMaterial','ngRoute']);

app.config(function($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('');
    
    $routeProvider
    .when("/addStudent", {
        templateUrl : "addStudent.php"
    })
    .when("/studentDetails", {
        templateUrl : "studentDetails.php"
    })
    .when("/courseDetails", {
        templateUrl : "courseDetails.php"
    })
    .when("/studentAdded", {
        templateUrl : "studentAdded.php"
    })
    .when("/addCourse", {
        templateUrl : "addCourse.php"
    })
    .when("/courseAdded", {
        templateUrl : "courseAdded.php"
    })
     .when("/editStudent", {
        templateUrl : "editStudent.php"
    })
    .when("/studentUpdated", {
        templateUrl : "studentUpdated.php"
    })
    .when("home", {
        templateUrl : "home.php"
    })
    .when("/courseUpdated", {
        templateUrl : "courseUpdated.php"
    })
    .when("/editCourse", {
        templateUrl : "editCourse.php"
    });
    
});





