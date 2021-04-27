<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update course</title>
</head>
<body>
<?php
// set page header
$page_title = "Update Course";
include_once __DIR__."/config/core.php";

// include login checker
include_once __DIR__."/login_checker.php";

 include_once __DIR__."/layout_head.php";
 //get ID of the course to be edited

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once __DIR__."/config/core.php";

  
// include database and object files
include_once __DIR__.'/config/database.php';
include_once __DIR__.'/objects/course.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare objects
$course = new Course($db);
  
// set ID property of course to be edited
$course->Id = $id;
$course->user_id= $_SESSION['Id'];
  
// read the details of course to be edited
$course->readOne();

$edited_course=$course->course;
$course_code=$course->course_code;



  
echo "<div>
          <a href='read_all_courses.php' class='btn btn-default pull-right'>Read Courses</a>
     </div>";
  
?>
<?php 
// if the form was submitted
if($_POST){
  
    // set course property values
    $course->course = $_POST['course'];
    $course->course_code = $_POST['code'];
  
    // update the course
    if($course->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Course was updated.";
        echo "</div>";
    }
  
    // if unable to update the course, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update course.";
        echo "</div>";
    }
}
?>
  
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
  
  <table class='table table-hover table-responsive table-bordered'>
  
  <tr>
      <td>Course</td>
      <td><input type='text' name='course' class='form-control' value='<?php echo "$edited_course";?>' /></td>
  </tr>

  <tr>
      <td>Course Code</td>
      <td><input type='text' name='code' class='form-control' value='<?php echo "$course_code";?>' /></td>
  </tr>
  
  
  <tr>
      <td></td>
      <td>
          <button type="submit" class="btn btn-primary">Create</button>
      </td>
  </tr>
  
</table>
</form>

<?php
// set page footer
include_once __DIR__."/layout_foot.php";
?>
</body>
</html>