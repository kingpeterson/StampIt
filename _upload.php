<?php
require_once("./include/membersite_config.php");
require_once 'include/util.php';
require_once 'include/config.php';

define("HOST", "localhost");     // The host you want to connect to.
define("USER", "peter");    // The database username. 
define("PASSWORD", "jordan11");    // The database password. 
define("DATABASE", "secure_login");    // The database name.

/*
 *	1. $this->member for non-static members, use self::$member for static members
 *	2. isset($var) checks the existance of the variable $var
 *	3. filter_var($variable, $filter, $options) -> check if $variable is a valid variable which conform the $filter
 *	4. CURLOPT_URL - provide the URL to use in the request
 *	5 . CURLOPT_RETURNTRANSFER (the returned transfer is aka the reponse)
 *		- true: transfer will be returned as a string of the return value of curl_exec() 
 *		- false: transfer will not be returned and instead displayed in browser
 */

if(isset($_POST['url'])){
	$obj = new Download();
	$url = $_POST['url'];
	$obj->downloadFile($url);
}

if(isset($_FILES["fileToUpload"]["tmp_name"])){
	//Upload::uploadFile("http://www.dyao.co/PHPFileSharingApp/upload.php");
	//Upload::uploadFile("http://localhost/PHPFileSharingApp/upload.php");

 	foreach ( DomainInfo::$UploadAgenList as $agentKey => $agentVal ) {
 		//echo $agentKey . "--->" . $agentVal . "<br>";
 		Upload::uploadFile ( $agentVal);
 	}
	
	    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);  
	    // Check connection
		if ($mysqli->connect_error) {
	    		die("Connection failed: " . $mysqli->connect_error);
		}
		if ($fgmembersite->CheckLogin() == true){
			$email = $fgmembersite->UserEmail();	
		}
		//$email = 'kingpetersonwang@gmail.com'; 
		$sql = "SELECT url FROM temp";
			$result = $mysqli->query($sql);
		}
		if ($result->num_rows > 0) {
	    		// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        		$url = $row["url"];
	
	    		}
	    		$sql = "DELETE FROM temp";
	
			if ($mysqli->query($sql) === TRUE) {
	    			echo "Record deleted successfully";
			} else {
	    			echo "Error deleting record: " . $mysqli->error;
			}
			
			$name = $_FILES["fileToUpload"]["name"];
			$type = $_FILES["fileToUpload"]["type"];
			$size = $_FILES["fileToUpload"]["size"];
			
			$mysql = "INSERT INTO upload (name, owner, type, size, url) 
				VALUES ('$name', '$email', '$type', '$size', '$url')";
			if ($mysqli->query($mysql) === TRUE) {
				//echo "New record created successfully";
				echo '<script type="text/javascript">
	           		window.location = "http://kprealm.net/member.php"
	      			</script>';
			} 
			else{
				"Error: " . $mysql . "<br>" . $mysqli->error;
			}
	
		} else {
	    		echo "0 results in the database";
		}
	
		$mysqli->close;
		

?>

<!DOCTYPE html>
<html lang="en">

	<head>
	
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	
	    <title>Upload - STampIT </title>
	
	    <!-- Bootstrap Core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	    <!-- Custom CSS -->
	    <link href="css/business-casual.css" rel="stylesheet">
	
	    <!-- Fonts -->
	    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	
	</head>
	
	<body>
		<div class="brand">STampIT</div>
	     		<div class="row">
	     			<div class="box">
	     			    <?php if ($fgmembersite->CheckLogin() == true) : ?>

	     				<h2 class="intro-text text-center">Select the photo you want to share with
                        		<strong>StampIT!</strong>
                        		<!--<?php 
                        		$email = $fgmembersite->UserEmail(); echo $email; ?>-->

                    			</h2>
	        			<div class="col-lg-12 text-center">
				 	<form action="upload.php"
						method="post" enctype="multipart/form-data">
						<input type="file" name="fileToUpload" id="fileToUpload" /> 
						<input type="submit" value="post" />
					</form>
					<br>
					<a href='member.php'><- Go back</a>
					</div>
				   <?php else : ?>
				   	<div class="col-lg-12 text-center">
						<h2 class="intro-text">Login to upload</h2>
						<a href="register.php" class="btn btn-default btn-lg">Join</a>
	                    			<a href="login.php" class="btn btn-default btn-lg">Login</a>
                    			</div>
                    			<div class="col-lg-12 text-center">
                    				<a href='index.php'><- Go home</a>
                    			</div>
				   <?php endif; ?>
				</div>
			</div>
		
		
	    <!-- jQuery -->
	    <script src="js/jquery.js"></script>

	
	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>
  
	
	</body>	

</html>