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
	$post_variables = $_POST;
  print_r($post_variables);
	$student_id = $post_variables['student_id'];
  print_r($student_id);
  session_start();
	$member_id = validateMemberForEvent($student_id, $_SESSION['club_id']);
  print_r($member_id);

	if (!is_null($member_id)) {
		session_start();
    //insert attendance of student id
    date_default_timezone_set('America/New_York');
    $last_login_date_time = date('Y-m-d H:i:s');
    $attendance_id = insertAttendance($_SESSION['event_id'], $member_id, $last_login_date_time);
  }
	else {
		header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_sign_in.php?action=invalid_login");
		exit();
	}
}

session_start();
$data[event_name] = $_SESSION['event_name'];


//View
include('member_sign_in_view.php');


 ?>
