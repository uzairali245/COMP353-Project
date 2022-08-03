<?php
	session_start();
	include "dbConnection.php";

    if ( isset( $_POST['addUser'] ) ) {
		unset( $_POST['addUser'] ); //remove unused mysql index from post

		//query to add into database
		$query = $db->prepare( "INSERT INTO `users` (`username`, `password` ,`first_name`, `last_name`, `email`, `phone`, `dob`, `citizenship`, `user_type`) VALUES (:username, :password, :firstname, :lastname, :email, :phone, :dob, :citizenship, :usertype);" );
		$query->execute( $_POST );

		//success message
		$_SESSION['msg'] = $_POST['firstname'] . " " . $_POST['lastname'] . " has been added successfully";
		header( "location: adminCrud.php" );
	} else if ( isset( $_GET['action'] ) && $_GET['action'] == "ban" ) {

		//query to update database
		$query = $db->prepare( "UPDATE `users` SET `status` = 0 WHERE `userID` = ?;" );
		$query->execute( array( $_GET['id'] ) );

		//success message
		$_SESSION['msg'] = "User #" . $_GET['id'] . " has been suspended successfully";
		header( "location: adminCrud.php" );
	} else if ( isset( $_GET['action'] ) && $_GET['action'] == "unban" ) {

		//query to update database
		$query = $db->prepare( "UPDATE `users` SET `status` = 1 WHERE `userID` = ?;" );
		$query->execute( array( $_GET['id'] ) );

		//success message
		$_SESSION['msg'] = "User #" . $_GET['id'] . " has been reactivated successfully";
		header( "location: adminCrud.php" );
	} else if ( isset( $_GET['action'] ) && $_GET['action'] == "delete" ) {

		//query to update database
		$query = $db->prepare( "DELETE FROM `users` WHERE `userID` = ?;" );
		$query->execute( array( $_GET['id'] ) );

		//success message
		$_SESSION['msg'] = "User #" . $_GET['id'] . " has been deleted successfully";
		header( "location: adminCrud.php" );
	}
