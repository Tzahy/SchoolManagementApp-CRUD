// My main controller that controlls the whole app view logic.
app.controller('mainCtrl', function($scope, $http, $location, $routeParams, $mdDialog){
    
    // get students list
    $http.post("getStudents.php").then(function(data){
        console.log(data);
       $scope.users = data.data; 
    }); 
    
    // get courses list
    $http.post("getCourses.php").then(function(data){
        console.log(data);
       $scope.courses = data.data; 
    });
    
    // chosen student
    $scope.choosen_student = function(s){ 
        $scope.s_name = s.name;
        $scope.s_phone = s.phone;
        $scope.s_email = s.email;
        $scope.s_course = s.courses;
        $scope.s_image = s.image;
        $scope.s_id = s.id;
        $location.path('studentDetails');
      }
    
    // chosen course
    $scope.choosen_course = function(c){ 
        $scope.courses_num = "";
        // return the number of student in each chosen course
        $http.post("countStudentsInCourse.php", {'course':c.name}).then(function(data){
        //console.log(data.data);
            $scope.courses_num = data.data; 
        });
        $scope.c_name = c.name;
        $scope.c_description = c.description;
        $scope.c_image = c.image;
        $scope.c_id = c.id;
        $location.path('courseDetails');
      }
    
    // get add student view
    $scope.add_student = function(){ 
        $location.path('addStudent');
      }
    // actually adding the student to the database
    $scope.studentAdded = function(){ 
        $location.path('studentAdded');
      }
    
    // just alert that a student was added to the database
    $scope.showAlertStudent = function() {
       alert('Student Added!');  
    }
    
    // delete a chosen student 
    $scope.deleteStudent = function(s,n) {
        var confirm = $mdDialog.confirm()
        .title('Would you like to delete '+n+'?')
        .textContent('This action will remove '+n+' From the database.')
        .ok('Yes, please delete...')
        .cancel('No, go back!');
    // dialog to ask if you sure to delete the student    
    $mdDialog.show(confirm).then(function() {
        console.log('You decided to delete '+n+' From the database.');
        $http.post("deleteStudent.php", {'id':s})
            .then(function(data){
                $http.post("getStudents.php").then(function(data){
                    console.log(data+' from delete student');
                    $scope.users = data.data; 
                });
            $location.path('home');
            })
            .catch(function(data, status) {
//           console.error('error deleting student');
            })
         }, function() {
            console.log('You decided to keep '+n+'.');
            });
    }
    // delete a chosen course
    $scope.deleteCourse = function(s,n) {
        var confirm = $mdDialog.confirm()
        .title('Would you like to delete '+n+'?')
        .textContent('This action will remove '+n+' From the database.')
        .ok('Yes, please delete...')
        .cancel('No, go back!');
    // dialog to ask if you sure to delete the course    
    $mdDialog.show(confirm).then(function() {
        console.log('You decided to delete '+n+' From the database.');
        $http.post("deleteCourse.php", {'id':s})
            .then(function(data){
                $http.post("getCourses.php").then(function(data){
                    console.log(data+' from delete courses');
                    $scope.courses = data.data;  
                });
            $location.path('home');
            })
            .catch(function(data, status) {
    // console.error('error deleting course.');
            })
         }, function() {
            console.log('You decided to keep '+n+'.');
            });
    }
    
    // add new course view
    $scope.add_course = function(){ 
        $location.path('addCourse');
      }
    
    // actually add the course to the database
    $scope.courseAdded = function(){ 
        $location.path('courseAdded');
      }
    
    // notify a course was added
    $scope.showAlertCourse = function() {
       alert('Course Added!');      
    }
    
    // modify existing student 
    $scope.editStudent = function(id,name,phone,email,course){ 
        $scope.s_id = id;
        $scope.s_name = name;
        $scope.s_phone = phone;
        $scope.s_email = email;
        $scope.s_course = course;
        
        $location.path('editStudent');
    }
               
    // alert student was added
    $scope.showAlertStudentUpdate = function() {
       alert('Student Updated!');  
    }
    
    // modify existing course 
    $scope.editCourse = function(id,name,description){ 
        $scope.c_id = id;
        $scope.c_name = name;
        $scope.c_description = description;
        
        $location.path('editCourse');
    } 
});
