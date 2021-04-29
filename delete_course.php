<?php
$page_title = 'Delete Course';
include_once __DIR__."/config/core.php";
$id = $_SESSION['Id'];

// include login checker
$require_login=true;
include_once __DIR__."/login_checker.php";

include_once "layout_head.php";

echo "<div>
<a href='read_all_courses.php' class='btn btn-default pull-right'>All Courses</a>
</div>";

 
// check if value was posted
if($_GET){
  
    // include database and object file
    include __DIR__.'/config/database.php';
    include_once 'objects/course.php';
  
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
  
    // prepare course object
    $course = new Course($db);
    $course->user_id= $_SESSION['Id'];

      
    // set course id to be deleted
    $course->id = $_GET['id'];
      
    // delete the product
    if($course->delete()){
        echo "course was deleted.";
    }
      
    // if unable to delete the product
    else{
        echo "Unable to delete course.";
    }
}
?>