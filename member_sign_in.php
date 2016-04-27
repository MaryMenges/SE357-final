<?php

//Model
include('attendance_model.php');

$error_message = '';

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
	$post_variables = $_POST;
	$student_id = $post_variables['student_id'];
  session_start();
	$member_id = validateMemberForEvent($student_id, $_SESSION['club_id']);

	if (!is_null($member_id)) {
		session_start();
    //insert attendance of student id
    date_default_timezone_set('America/New_York');
    $last_login_date_time = date('Y-m-d H:i:s');
    $attendance_id = insertAttendance($_SESSION['event_id'], $member_id, $last_login_date_time);
    $error_message= 'You have successfully signed into this event!';
  }
	else {
		header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/member_sign_in.php?action=invalid_student_id");
		exit();
	}
}

else if ($get_variables['action']=='invalid_student_id') {
  $error_message = 'Student ID not recognized, please go back and join this club!';

}

session_start();
$data[event_name] = $_SESSION['event_name'];


//View
include('member_sign_in_view.php');


 ?>
