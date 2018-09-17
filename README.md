School Management App use PHP + Angular + MySQL (PHPmyAdmin/XAMMP). POC of them working together.

This app has students list + courses list with data, that can be modified, connected with each other and been saved in a database.
I've been demonstrating two user accounts: One with "ADMIN" privilege which can do all CRUD operations on the students list and the courses list and all changes are saved into the database, and one account that can only "READ" privilege.

Database name: test

Base URL: http://localhost/theschool  - will redirect to login.

To login use:
"admin1" "admin1" - as user and password. This is an "owner" role user which can add/modify students and courses.
"sales1" "sales1" - as user and password. This user has not "owner" role so he can only view the data and not add or modify it.

Some API's (works after login):
http://localhost/theschool/PHP/home.php#/addStudent - add new student.
http://localhost/theschool/PHP/home.php#/addCourse - add new course.
http://localhost/theschool/PHP/home.php - "CLEAR SCREEN" just clear the MVC content view.
http://localhost/theschool/PHP/logout.php - "LOGOUT" logs out the system and redirect you back to the login screen: http://localhost/theschool/PHP/login.php

Clicking on one of the already existing student or course will redirect you to modify it or delete it (No API here since it is redirected by angular router (no URL).

