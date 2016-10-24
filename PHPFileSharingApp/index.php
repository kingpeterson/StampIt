<?php
/*
 *	1. $this->member for non-static members, use self::$member for static members
 *	2. isset($var) checks the existance of the variable $var
 *	3. filter_var($variable, $filter, $options) -> check if $variable is a valid variable which conform the $filter
 *	4. CURLOPT_URL - provide the URL to use in the request
 *	5 . CURLOPT_RETURNTRANSFER (the returned transfer is aka the reponse)
 *		- true: transfer will be returned as a string of the return value of curl_exec() 
 *		- false: transfer will not be returned and instead displayed in browser
 */

require_once 'util.php';
require_once 'config.php';

if(isset($_POST['url'])){
	$obj = new Download();
	$url = $_POST['url'];
	$obj->downloadFile($url);
}

if(isset($_FILES["fileToUpload"]["tmp_name"])){
	//$obj1 = new Upload();
	
	//Upload::uploadFile("http://www.dyao.co/PHPFileSharingApp/upload.php");
	//Upload::uploadFile("http://localhost/PHPFileSharingApp/upload.php");
	//echo "safsafdsfdsfsda";
 	foreach ( DomainInfo::$UploadAgenList as $agentKey => $agentVal ) {
 		echo $agentKey . "--->" . $agentVal . "<br>";
 		Upload::uploadFile ( $agentVal );
 	}
}

?>

<form action="index.php"
	method="post">
	<input type="text" , name="url" , maxlength="2000" /> <input
		type="submit" , value="download" />
</form>

<form action="index.php"
	method="post" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" id="fileToUpload" /> <input
		type="submit" value="post" />
</form>
