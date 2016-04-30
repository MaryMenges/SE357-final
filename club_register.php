<?php

// Model
include ('attendance_model.php');

// Controller

$error_message = '';
$get_variables = $_GET;

if ($get_variables['action']=='username_exists') {
  session_unset();
  session_destroy();
  $error_message = 'Username already exists.';
}

//View
include ('club_register_view.php');

?>
