<?php
$servername = "localhost";
$username = "peter";
$password = "jordan11";
$dbname = "Lab6_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$agree = $_POST['agree'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$users_email = $_POST['email'];
$users_gender = $_POST['gender'];
$users_comment = $_POST['comment'];

$required = array('agree', 'lastname', 'firstname', 'email', 'gender');
$error = false;
foreach($required as $field) {
  	if (empty($_POST[$field])) {
    	$error = true;
  	}
}

if ($error) {
	echo "<script>
	alert('Cannot leave anything blank!');
	window.location.href='form.html';
	</script>";
}

$sql = "SELECT * FROM user WHERE email = '$users_email'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	echo "<script>
	alert('This email is already in the database, please choose another one!');
	window.location.href='form.html';
	</script>";
} 
	
$sql = "INSERT INTO user (lastname, firstname, email, gender, comment, time)
VALUES ('$lastname', '$firstname','$users_email', '$users_gender',		 	
'$users_comment',CURRENT_TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} 
else{
	"Error: " . $sql . "<br>" . $conn->error;
}
	

$conn->close();
?>


<html>
	<head><title>Query</title></head>
		<body>
			<form>
			<input type="button" value="Back"  onclick="location.href='form.html'">
			</form>
		</body>
</html>