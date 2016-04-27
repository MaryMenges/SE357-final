<?php

require_once ('mysql_pdo_connect.php');

// returns true if the username exists in the club_login table, returns false if it does not
// function usernameExists($username) {
// 	global $db;
// 	$result = array();
//
// 	try {
// 		$stmt = $db->query("SELECT username FROM club_login ");
// 		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	}
// 	catch (PDOException $ex) {
//     echo "Exception in usernameExists";
// 	}
// 	foreach($result as $test){
// 		if (strcmp($test['username'], $username) == 0){
// 			return true;
// 		}
// 	}
// 	return false;
// }

// returns the club_id if the username and password are valid, returns NULL if they are not
function validateCredentials($username, $password) {
	global $db;

	try {
		//$stmt = $db->query("SELECT club_id FROM club_login WHERE username = '$username' AND password = '$password' ");
		$stmt = $db->prepare("CALL validateCredentials(:username, :password) ");
		$stmt->execute(array(':username' => $username, ':password' => $password));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 0) {
      return NULL;
    } else {
      return $result['out_club_id'];
    }
	}
	catch (PDOException $ex) {
			echo "Exception in validateCredentials";
	}
}

function validateMemberForEvent($student_id, $club_id) {
	global $db;

	try {
		//$stmt = $db->query("SELECT club_id FROM club_login WHERE username = '$username' AND password = '$password' ");
		$stmt = $db->prepare("CALL validateMemberForEvent(:student_id, :club_id) ");
		$stmt->execute(array(':student_id' => $student_id, ':club_id' => $club_id));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 0) {
      return NULL;
    } else {
      return $result['out_member_id'];
    }
	}
	catch (PDOException $ex) {
			echo "Exception in validateMemberForEvent";
	}
}


// inserts a new club and returns the club_id *** should use a transaction ***
function insertClub($club_name, $username, $password) {
	global $db;

	try {
		// $stmt = $db->prepare("INSERT INTO club (club_id, club_name) VALUES (NULL, :club_name) ");
		// $stmt->execute(array(':club_name' => $club_name));
    // $last_id = $db->lastInsertId();
		//
		// $stmt = $db->prepare("INSERT INTO club_login (club_id, username, password) VALUES (:last_id, :username, :password) ");
		// $stmt->execute(array(':last_id' => $last_id, ':username' => $username, ':password' => $password));
		$stmt = $db->prepare("CALL insertClub(:club_name, :username, :password) ");
		$stmt->execute(array(':club_name' => $club_name, ':username' => $username, ':password' => $password));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['new_club_id'];
	}
	catch (PDOException $ex) {
    echo "Exception in insertClub";
	}
}

// inserts a new event
function insertEvent($club_id, $event_name, $event_type, $date) {
	global $db;

	try {
		$stmt = $db->prepare("CALL insertEvent(:club_id, :event_name, :event_type, :date) ");
		$stmt->execute(array(':club_id' => $club_id, ':event_name' => $event_name, ':event_type' => $event_type, ':date' => $date));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['new_event_id'];
	}
	catch (PDOException $ex) {
    echo "Exception in insertEvent";
	}
}

// inserts a new member
function insertMember($club_id, $student_id, $officer, $first_name, $last_name, $email, $phone, $major, $grad_year) {
	global $db;

	try {
		$stmt = $db->prepare("CALL insertMember(:club_id, :student_id, :officer, :first_name, :last_name, :email, :phone, :major, :grad_year) ");
		$stmt->execute(array(':club_id' => $club_id, ':student_id' => $student_id, ':officer' => $officer, ':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':phone' => $phone, ':major' => $major, ':grad_year' => $grad_year));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['new_member_id'];
	}
	catch (PDOException $ex) {
    echo "Exception in insertMember";
	}
}

// inserts a new attendance
function insertAttendance($event_id, $member_id, $date_time) {
	global $db;

	try {
		$stmt = $db->prepare("CALL insertAttendance(:event_id, :member_id, :date_time) ");
		$stmt->execute(array(':event_id' => $event_id, ':member_id' => $member_id, ':date_time' => $date_time));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['new_attendance_id'];
	}
	catch (PDOException $ex) {
    echo "Exception in insertAttendance";
	}
}

function selectClubName($club_id) {
	global $db;
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectClubName(:club_id) ");
			$stmt->execute(array(':club_id' => $club_id));

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['club_name'];
		}
		catch (PDOException $ex) {
				echo "Exception in selectClubName";
		}
}

function selectMember($club_id) {
	global $db;
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectMember(:club_id) ");
			$stmt->execute(array(':club_id' => $club_id));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		catch (PDOException $ex) {
				echo "Exception in selectMember";
		}
}

function selectEvent($club_id) {
	global $db;
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectEvent(:club_id) ");
			$stmt->execute(array(':club_id' => $club_id));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		catch (PDOException $ex) {
				echo "Exception in selectEvent";
		}
}

function selectEventName($event_id) {
	global $db;
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectEventName(:event_id) ");
			$stmt->execute(array(':event_id' => $event_id));

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['event_name'];
		}
		catch (PDOException $ex) {
				echo "Exception in selectEventName";
		}
}



function selectEventDetails($event_id) {
	global $db;
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectEventDetails(:event_id) ");
			$stmt->execute(array(':event_id' => $event_id));

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		catch (PDOException $ex) {
				echo "Exception in selectEventDetails";
		}
}

// returns an associative array with the key being the student_id and the value being an array of events attended (event_id)
function getClubAttendance($club_id) {
	global $db;
	$memberResult = array();
	$attendanceResult = array();
	$result = array();

		try {
			$stmt = $db->prepare("CALL selectMember(:club_id) ");
			$stmt->execute(array(':club_id' => $club_id));

			$memberResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
			unset($stmt);

			//$stmt = $db->prepare("CALL selectAttendance(:member_id) ");
			foreach($memberResult as $member) {
				//print_r($member['member_id']);

				$stmt = $db->prepare("CALL selectAttendance(:member_id) ");
				$stmt->execute(array(':member_id' => $member['member_id']));

				$attendanceResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
				unset($stmt);

				$myIndexedArray = array();

				foreach($attendanceResult as $attendance) {
					$myIndexedArray[] = $attendance['event_id'];
				}

				$result[$member['member_id']] = $myIndexedArray;
			}

			return $result;

		}
		catch (PDOException $ex) {
				echo "Exception in getClubAttendance";
				echo $ex->getMessage();
		}
}

?>
