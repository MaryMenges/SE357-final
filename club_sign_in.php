<?php

// Model
include ('attendance_model.php');

$error_message = 'my error';

// Controller

$error_message = '';
$get_variables = $_GET;

if ($get_variables['action']=='invalid_login') {
  session_unset();
  session_destroy();
  $username = "";
  $password = "";
  $error_message = 'INVALID USERNAME AND PASSWORD';
}

// View
include ('club_sign_in_view.php');

?>
