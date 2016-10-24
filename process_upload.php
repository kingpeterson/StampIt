<?php
require_once "include/config.php";
require_once("./include/membersite_config.php");

define("HOST", "localhost");     // The host you want to connect to.
define("USER", "peter");    // The database username. 
define("PASSWORD", "jordan11");    // The database password. 
define("DATABASE", "secure_login");    // The database name.

 if(isset($_FILES[Constants::FILE_CONTENT]["tmp_name"])){
// 	echo "<b>upload.php response: </b>" . $_FILES[Constants::FILE_TRANSFER_NAME]["tmp_name"] . "<br>";
// 	echo "<b>upload.php response: </b>" . $_FILES[Constants::FILE_TRANSFER_NAME]["name"] . "<br>";
// 	echo "<b>upload.php response: </b>" . $_FILES[Constants::FILE_TRANSFER_NAME]["type"] . "<br>";
// 	echo "<b>upload.php response: </b>" . $_FILES[Constants::FILE_TRANSFER_NAME]["size"] . "<br>";
// 	echo "<b>upload.php response: </b>" . $_FILES[Constants::FILE_TRANSFER_NAME]["error"] . "<br>";
	
	
// 	$path = "uploads/".$_FILES[Constants::FILE_TRANSFER_NAME]["name"];
// 	move_uploaded_file($_FILES[Constants::FILE_TRANSFER_NAME]["tmp_name"], $path);
	//echo "im here";
 	
 	move_uploaded_file($_FILES[Constants::FILE_CONTENT]["tmp_name"], "uploads/".$_POST[Constants::FILE_NAME]);
 	
 	$path = "http://www.kprealm.net/uploads/".$_POST[Constants::FILE_NAME];
 	$email = $_POST["SessionEmail"];

	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($mysqli->connect_error) {
    		die("Connection failed: " . $mysqli->connect_error);
	}
	$sql = "INSERT INTO upload (owner, url) VALUES ( '$email', '$path')";
	if ($mysqli->query($sql) === TRUE) {
		echo "New record created successfully";
	} 
	else{
		"Error: " . $sql . "<br>" . $mysqli->error;
	}
	$mysqli->close();
 }


	

?>