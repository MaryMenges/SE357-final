<?php

//Model
include('attendance_model.php');

// $error_message = 'my error';

//Controller


$get_variables = $_GET;
//print_r($post_variables);


if($get_variables['action']=='start_event_sign_in') {
$post_variables = $_POST;
session_start();
$_SESSION['event_id'] = $post_variables['event_id'];
$_SESSION['event_name'] = selectEventName($_SESSION['event_id']);
//print_r($_SESSION);

// $data = selectEventDetails($_SESSION['event_id']);
}

else if ($get_variables['action']=='sign_in') {
$post_variables=$_POST;


}

session_start();
$data[event_name] = $_SESSION['event_name'];


//View
include('member_sign_in_view.php');


 ?>
