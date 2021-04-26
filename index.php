<?php
// core configuration
include_once __DIR__."/config/core.php";
 
// set page title
$page_title="Dashboard";
 
// include login checker
$require_login=true;
include_once __DIR__."/login_checker.php";
 
// include page header HTML
include_once __DIR__.'/layout_head.php';
 
echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success'){
        echo "<div class='alert alert-info'>";
            echo "<strong>Hi " . $_SESSION['name'] . ", welcome back!</strong>";
        echo "</div>";
    }
 
    // if user is already logged in, shown when user tries to access the login page
    else if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }
 
    // content once logged in
    echo "<div class='alert alert-info'>";
        echo "<h3>This is the Zuri Intership</h3>";
        echo '<li><a href='."$home_url".'read_all_courses.php?><button>Read All My Courses</button></a></li>';
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include 'layout_foot.php';
?>