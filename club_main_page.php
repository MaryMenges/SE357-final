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

	$username_exists = usernameExists($username);

	if($username_exists){
		$club_id = validateCredentials($username, $password);
		if (!is_null($club_id)) {
			session_start();
			$_SESSION['club_id'] = $club_id;

			// date_default_timezone_set('America/New_York');
			// $last_login_date_time = date('Y-m-d H:i:s');

			echo 'WELCOME - YOU HAVE SUCCESSFULLY SIGNED IN AND SESSION VARIABLE club_id HAS BEEN SET';
		}
	  else {
			header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_sign_in.php?action=invalid_login");
			exit();
	  }
	}
	else {
		header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_register.php");
		exit();
	}
}

else if ($get_variables['action']=='create_account') {
	$post_variables = $_POST;

	$club_name = $post_variables['club_name'];
	$username = $post_variables['username'];
	$password = $post_variables['password'];
	$confirm_password = $post_variables['confirm_password'];

	$username_exists = usernameExists($username);

	if(!$username_exists){
		if(strcmp($password, $confirm_password) == 0){

			$club_id = insertClub($club_name, $username, $password);
			session_start();
			$_SESSION['club_id'] = $club_id;

			$status_message = 'WELCOME - YOUR NEW ACCOUNT HAS BEEN CREATED AND SESSION VARIABLE club_id HAS BEEN SET';
			echo $status_message;
		}
		else {
			header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_sign_in.php?action=password_mismatch");
			exit();
		}
	}
	else {
		header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/club_sign_in.php?action=username_exists");
		exit();
	}
}

// View
include ('club_main_page_view.php');

?>
