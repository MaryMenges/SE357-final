<?php

// Model
include ('attendance_model.php');

// Controller

$error_message = '';
$get_variables = $_GET;

if ($get_variables['action']=='invalid_login') {
  session_unset();
  session_destroy();
  $username = "";
  $password = "";
  $error_message = 'Invalid Username and Password.';
}

else if ($get_variables['action']=='sign_out') {
  session_unset();
  session_destroy();
  console.log("sign out successful");
}

// View
include ('club_sign_in_view.php');

?>
