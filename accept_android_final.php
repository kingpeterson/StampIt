<?php
$uploaddir = realpath('uploads') . '/';
$uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);
// echo '<pre>';
if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $uploadfile)) {
	mail("+16264612922", "Success", "File has been uploaded from Android by Vivek!");
	mail('kingpetersonwang@gmail.com', 'Success', "Vivek has successfully uploaded a file from Android");
// echo "File is valid, and was successfully uploaded.\n";
} 
// else {
// echo "Possible file upload attack!\n";
// }
// echo 'Here is some more debugging info:';
// print_r($_FILES);
// echo "\n<hr />\n";
// print_r($_POST);
// print "</pr" . "e>\n";
?>