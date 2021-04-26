<?php
// core configuration
include_once __DIR__."/config/core.php";
 
// set page title
$page_title = "Register";
 
// include login checker
include_once __DIR__."/login_checker.php";
 
// include classes
include_once __DIR__.'/config/database.php';
include_once __DIR__.'/objects/user.php';
include_once __DIR__."/libs/php/utils.php";
 
// include page header HTML
include_once __DIR__."/layout_head.php";
 
echo "<div class='col-md-12'>";
 
    // if form was posted
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $user = new User($db);
    $utils = new Utils();
 
    // set user email to detect if it already exists
    $user->email=$_POST['email'];
 
    // check if email already exists
    if($user->emailExists()){
        echo "<div class='alert alert-danger'>";
            echo "The email you specified is already registered. Please try again or <a href='{$home_url}login.php'>login.</a>";
        echo "</div>";
    }
 
    else{
        // set values to object properties
$user->name=$_POST['name'];
$user->email=$_POST['email'];
$user->password=$_POST['password'];
 
// create the user
if($user->create()){
 
    echo "<div class='alert alert-info'>";
        echo "Successfully registered. <a href='{$home_url}login.php'>Please login</a>.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
    }
}
?>
<form action='register.php' method='post' id='register'>
 
    <table class='table table-responsive'>
 
        <tr>
            <td class='width-30-percent'>Name</td>
            <td><input type='text' name='name' class='form-control' required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
     
        
        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Register
                </button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>
