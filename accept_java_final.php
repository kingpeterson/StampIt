<html>
<head>
</head>
<body>
<?php
$uploaddir = realpath('uploads') . '/';
$uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);

if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $uploadfile)) {
mail("+16264612922", "Success", "File has been uploaded from Java Client by kaushik!");
mail('kingpetersonwang@gmail.com', 'Success', "Kaushik has successfully uploaded a file from Java Client");

} 
?>
</body>
</html>