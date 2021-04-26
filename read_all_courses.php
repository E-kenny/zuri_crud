<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Courses</title>
</head>
<body>
<?php

include_once __DIR__."/config/core.php";

// set page header
$page_title = "Read Courses";

// include login checker
$require_login=true;
include_once __DIR__."/login_checker.php";


include_once __DIR__.'/layout_head.php';

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$id=$_SESSION['Id'];
  
  
// include database and object files
include_once 'config/database.php';
include_once 'objects/course.php';
  
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
  
$course = new Course($db);
$course->Id = $id; 
// query products
$stmt = $course->readAll();
$num = $stmt->rowCount();
echo "<div>
<a href='create_course.php'><button>Create Course</button></a>
</div>"; 

// display the course if there are any
if($num>0){
  
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>course</th>";
            echo "<th>Course_Code</th>";
            echo "<th>Created</th>";
            echo "<th>Update</th>";
        echo "</tr>";
  
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  
            extract($row);
  
            echo "<tr>";
                echo "<td>{$Id}</td>";
                echo "<td>{$course}</td>";
                echo "<td>{$course_code}</td>";
                echo "<td>{$created}</td>";
                echo "<td>{$updated}</td>";;
  
                echo "<td>";
                    // edit and delete button
                echo    "<a href=\"{$home_url}delete_course.php?id={$Id}\"><button>Delete</button></a>";

                echo    "<a href=\"{$home_url}update_course.php?id={$Id}\"><button>Update</button></a>";

                echo "</td>";
  
            echo "</tr>";
  
        }
  
    echo "</table>";
  
   
}
  

else{
    echo "<div class='alert alert-info'>No Courses found.</div>";
}
  
// set page footer
include_once __DIR__."/layout_foot.php";
?>
</body>
</html>