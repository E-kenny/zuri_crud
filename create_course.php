<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create course</title>
</head>
<body>
<?php


include_once __DIR__."/config/core.php";
$id = $_SESSION['Id'];
// include database and object files
include_once __DIR__.'/config/database.php';
include_once __DIR__.'/objects/course.php';
 
// include login checker
$require_login=true;
include_once __DIR__."/login_checker.php";


// get database connection
$database = new Database();
$db = $database->getConnection();



// pass connection to course object
$course = new Course($db);
// set page headers
$page_title = "Add Course";

include_once "layout_head.php";

echo "<div>
<a href='read_all_courses.php' class='btn btn-default pull-right'>All Courses</a>
</div>";

    
?>

<?php 

// if the form was submitted 
if($_POST){
  
    // set course property values
    $course->course = $_POST['course'];
    $course->course_code = $_POST['code'];
    $course->user_id = $_POST['user_id'];
  
    // create the course
    if($course->create()){
        echo "<div class='alert alert-success'>course was created.</div>";
    }
  
    // if unable to create the course, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create course.</div>";
    }
}

?>  
<!-- HTML form for creating a course -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
    <table class='table table-hover table-responsive table-bordered'>
  
        <tr>
            <td>Course</td>
            <td><input type='text' name='course' class='form-control' /></td>
        </tr>
  
        <tr>
            <td>Course Code</td>
            <td><input type='text' name='code' class='form-control' /></td>
        </tr>
        
        <input type='hidden' name='user_id' class='form-control' value='<?php echo "{$id}" ;?>'/>
       
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
        
  </table>
  
</form>
<?php
  
// footer
include_once __DIR__."/layout_foot.php";
?>

</body>
</html>