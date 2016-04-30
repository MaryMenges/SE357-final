<?php

// Model
include ('attendance_model.php');

// Controller
$error_message = '';
$get_variables = $_GET;

if ($get_variables['action']=='validate') {
	$post_variables = $_POST;
	$username = $post_variables['username'];
	$password = $post_variables['password'];

	// date_default_timezone_set('America/New_York');
	// $last_login_date_time = date('Y-m-d H:i:s');
	$club_id = validateCredentials($username, $password);
	if (!is_null($club_id)) {
		session_start();
		$_SESSION['club_id'] = $club_id;
		$_SESSION['club_name'] = selectClubName($_SESSION['club_id']);
	}
	else {
		header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_sign_in.php?action=invalid_login");
		exit();
	}
}

else if ($get_variables['action']=='create_account') {
	$post_variables = $_POST;

	$club_name = $post_variables['club_name'];
	$username = $post_variables['username'];
	$password = $post_variables['password'];
	$confirm_password = $post_variables['confirm_password'];

	// if(strcmp($password, $confirm_password) == 0){
		$club_id = insertClub($club_name, $username, $password);
		if($club_id == -1){
			header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_register.php?action=username_exists");
			exit();
		}
		else {
			session_start();
			$_SESSION['club_id'] = $club_id;
			$_SESSION['club_name'] = selectClubName($_SESSION['club_id']);
		}
	// }
	// else {
	// 	header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_register.php?action=password_mismatch");
	// 	exit();
	// }
}

else if ($get_variables['action']=='new_event') {
	$post_variables = $_POST;

	$event_name = $post_variables['event_name'];
	$event_type = $post_variables['event_type'];
	$date = $post_variables['date'];

	$myDate = DateTime::createFromFormat('m-d-Y', $date);
	$sqlDate = $myDate->format('Y-m-d');

	session_start();
	$event_id = insertEvent($_SESSION['club_id'], $event_name, $event_type, $sqlDate);
	$_SESSION['event_id'] = $event_id;
}

else if ($get_variables['action']=='new_member') {
	$post_variables = $_POST;

	$student_id = $post_variables['student_id'];
	$first_name = $post_variables['first_name'];
	$last_name = $post_variables['last_name'];
	$email = $post_variables['email'];
	$phone = $post_variables['phone'];
	$major = $post_variables['major'];
	$grad_year = $post_variables['grad_year'];

	session_start();
	$member_id = insertMember($_SESSION['club_id'], $student_id, 'FALSE', $first_name, $last_name, $email, $phone, $major, $grad_year);
	if($member_id == -1){
		echo "member already exists for this club";
	}
	else {
		$_SESSION['member_id'] = $member_id;
		echo "member insert successful";
	}
}

session_start();
$data[club_name] = $_SESSION['club_name'];
$member = selectMember($_SESSION['club_id']);
$event = selectEvent($_SESSION['club_id']);
//$printevent = selectEvent($_SESSION['club_id']);
$attendance = getClubAttendance($_SESSION['club_id']);
//print_r($attendance);

// View
include ('club_main_page_view.php');

?>
