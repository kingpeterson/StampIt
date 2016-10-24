<?php
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "peter");    // The database username. 
define("PASSWORD", "jordan11");    // The database password. 
define("DATABASE", "secure_login");    // The database name.

if(isSet($_POST['textcontent']) && isSet($_POST['name'])){
	$comment=$_POST['textcontent'];
	$picurl=$_POST['picurl'];
	$name=$_POST['name'];

	// Sql data insert values into comment table
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($mysqli->connect_error) {
    		die("Connection failed: " . $mysqli->connect_error);
	}
	$sql = "INSERT INTO comment (name, comment, pic_url) VALUES ('$name', '$comment', '$picurl')";
	if ($mysqli->query($sql) === TRUE) {
		//echo "New record created successfully";
		
	} 
	else{
		"Error: " . $sql . "<br>" . $mysqli->error;
		
	}
	
	$comment_query = "SELECT *
			FROM comment
			WHERE comment = '$comment'"; 
			$result = $mysqli->query($comment_query);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$date = $row["date"];
				}
			}
	$mysqli->close();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Po Tsung Wang">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
        <div class="row">
            	<div class="box">

			<div class="panel panel-success">

			<?php 
				echo '<div class="panel-heading">';
				echo $date;
				echo '</div>';
				echo '<div class="panel-body">';
				echo '<h4>';
				echo $name;
				echo " says:";
				echo '</h4>';
				echo $comment;
				echo '</div>';
				echo "<br>";	
			?>
			</div>
		</div>
	</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

 