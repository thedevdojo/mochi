<?php

ini_set("display_errors", true);
error_reporting( E_ALL );

// ******************** //
// SETUP THE ROUTER
// ******************** //

// Get the current request URI
$uri = $_SERVER['REQUEST_URI'];

// Trim off any additional forward slashes
$uri = trim( $uri, "/" );

// Convert the URI parameters into an array
$url = explode('/', $uri);

// Set the default file to the home page
$file = 'home';

// if the first parameter exists
if(!empty($url[0])):

	// Set the file to be the first parameter
	$file = $url[0];

endif;

// Create arguments and set it to the url parameters except the first
array_shift($url);
$args = $url;

// include 'functions.php';

// $data = [];

// if(function_exists($file)){
// 	$data = call_user_func($file);
// }

// LOAD THE CONTROLLER
if(file_exists('app/controllers/' . $file . '.php')){
	require 'app/controllers/' . $file . '.php';
}


// LOAD THE VIEW

if(file_exists('app/views/' . $file . '.php')){
	require 'app/views/' . $file . '.php';
} else {
	require 'app/views/404.php';
}