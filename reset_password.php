<?php
// core configuration
include_once __DIR__."/config/core.php";
 
// set page title
$page_title = "Reset Password";
 
// include login checker
include_once "login_checker.php";
 
// include classes
include_once __DIR__."/config/database.php";
include_once __DIR__."/objects/user.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$user = new User($db);
 
// include page header HTML
include_once __DIR__."/layout_head.php";
 
echo "<div class='col-sm-12'>";
    
// get given a Id
$id=isset($_GET['Id']) ? $_GET['Id'] : die("Id not found.");
 
// pass Id to the user table
$user->Id = $id;
  
    // if form was posted
        if($_POST){
                   
            // set values to object properties
            $user->password=$_POST['new_password'];
        
            // reset password
            if($user->updatePassword()){
                echo "<div class='alert alert-info'>Password was reset. Please <a href='{$home_url}login.php'>login.</a></div>";
            }
        
            else{
                echo "<div class='alert alert-danger'>Unable to reset password.</div>";
            }
        }
        
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?Id={$id}' method='post'>
            <table class='table table-hover table-responsive table-bordered'>
                
                <tr>
                    <td>New Password</td>
                    <td><input type='password' name='new_password' class='form-control' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type='submit' class='btn btn-primary'>Reset</button></td>
                </tr>
            </table>
        </form>";


echo "</div>";


 

 
// include page footer HTML
include_once "layout_foot.php";
?>
