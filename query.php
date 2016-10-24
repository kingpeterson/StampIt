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

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$users_gender = $_POST['gender'];

$required = array('lastname', 'firstname', 'gender');
$error = false;
foreach($required as $field) {
  	if (empty($_POST[$field])) {
    	$error = true;
  	}
}

if ($error) {
	echo "<script>
	alert('Cannot leave anything blank!');
	window.location.href='query.html';
	</script>";
} 

$sql = "SELECT * FROM user WHERE lastname = '$lastname'
	AND firstname = '$firstname' AND gender = '$users_gender'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo "E-mail: " . $row["email"]. "<br>";
        echo "Gender: " .$row["gender"]. "<br>";
        echo "Comment: " . $row["comment"]. "<br>";
        echo "Time: " .$row["time"]. "<br><br>";
    }
} else {
    echo "0 results in the database";
}
$conn->close();
?>

<html>
	<head><title>Query</title></head>
		<body>
			<form>
			<input type="button" value="Back"  onclick="location.href='query.html'">
			</form>
		</body>
</html>