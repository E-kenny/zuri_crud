<?php
 
// if $require_login was set and value is 'true'
if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['logged_in'])){
        header("Location: {$home_url}login.php?action=please_login");
    } 
// if it was the 'login' or 'register' or 'sign up' page but the student was already logged in
}else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
    // if user not yet logged in, redirect to login page
    if(isset($_SESSION['logged_in']) ){
        header("Location: {$home_url}index.php?action=already_logged_in");
    }
}
 
else{
    // no problem, stay on current page
}
?>