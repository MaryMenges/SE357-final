<?php

// Model
include ('attendance_model.php');

// Controller

$error_message = '';
$get_variables = $_GET;

if ($get_variables['action']=='username_exists') {
  session_unset();
  session_destroy();
  $username = "";
  $password = "";
  $error_message = 'USERNAME ALREADY EXISTS';
}
else if ($get_variables['action']=='password_mismatch') {
  session_unset();
  session_destroy();
  $username = "";
  $password = "";
  $error_message = 'PASSWORDS DID NOT MATCH';
}

//View
include ('club_register_view.php');

?>
