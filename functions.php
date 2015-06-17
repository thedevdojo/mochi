<?php

function home(){

	session_start();

	require 'database.php';
		
	$user = NULL;
	if( isset($_SESSION['user_id']) ){
		$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = NULL;

		if( count($results) > 0){
			$user = $results;
		}
	}

	return $user;
}

function login(){
	session_start();

	if( isset($_SESSION['user_id']) ){
		header("Location: /");
	}

	require 'database.php';

	if(!empty($_POST['email']) && !empty($_POST['password'])):
		
		$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

			$_SESSION['user_id'] = $results['id'];
			header("Location: /");

		} else {
			$message = 'Sorry, those credentials do not match';
		}

	endif;
}


function register(){
	session_start();

	if( isset($_SESSION['user_id']) ){
		header("Location: /");
	}

	require 'database.php';

	$message = '';

	if(!empty($_POST['email']) && !empty($_POST['password'])):
		
		// Enter the new user in the database
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

		if( $stmt->execute() ):
			$message = 'Successfully created new user';
		else:
			$message = 'Sorry there must have been an issue creating your account';
		endif;

	endif;
}

?>