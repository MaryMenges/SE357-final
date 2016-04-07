<?php

require_once ('mysql_pdo_connect.php');

//test

// $username = 'IEEEACM';
// $password = 'password';
// $club_name = 'IEEE/ACM Monmouth University';
//
// if(usernameExists($username)){
//   print('username exists -');
//   $club_id = validateCredentials($username, $password);
//   if(!is_null($club_id)){
//     print(' valid credentials - club_id = ');
//     print ($club_id);
//   } else {
//     print(' invalid credentials');
//   }
// } else {
//   print('username does not exist -');
//   print(' inserting new club - club_id = ');
//   $club_id = insertClub($club_name, $username, $password);
//   print($club_id);
// }



// returns true if the username exists in the club_login table, returns false if it does not
function usernameExists($username) {
	global $db;
	$result = array();

	try {
		$stmt = $db->query("SELECT username FROM club_login ");
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $ex) {
    echo "Exception in usernameExists";
	}
	foreach($result as $test){
		if (strcmp($test['username'], $username) == 0){
			return true;
		}
	}
	return false;
}

// returns the club_id if the username and password are valid, returns NULL if they are not
function validateCredentials($username, $password) {
	global $db;
	$result = array();

	try {
		$stmt = $db->query("SELECT club_id FROM club_login WHERE username = '$username' AND password = '$password' ");
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 0) {
      return NULL;
    } else {
      return $result['club_id'];
    }
	}
	catch (PDOException $ex) {
			echo "Exception in validateCredentials";
	}
}

// inserts a new club and returns the club_id *** should use a transaction ***
function insertClub($club_name, $username, $password) {
	global $db;

	try {
		$stmt = $db->prepare("INSERT INTO club (club_id, club_name) VALUES (NULL, :club_name) ");
		$stmt->execute(array(':club_name' => $club_name));
    $last_id = $db->lastInsertId();

		$stmt = $db->prepare("INSERT INTO club_login (club_id, username, password) VALUES (:last_id, :username, :password) ");
		$stmt->execute(array(':last_id' => $last_id, ':username' => $username, ':password' => $password));

		return $last_id;
	}
	catch (PDOException $ex) {
    echo "Exception in insertClub";
	}
}

?>
