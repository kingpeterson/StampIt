<?php

require_once "config.php";

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
 	$path = "uploads/".$_POST[Constants::FILE_NAME];
 }


	

?>