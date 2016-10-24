<?php 
$filename=$_GET['fileName'];
  $fileData=file_get_contents('php://input');

  if (!file_exists('./uploads/'))
{
	mkdir ("./uploads");
}

  move_uploaded_file($_FILES["fileName"],"upload/" . $_FILES["fileName"]);
  $fhandle=fopen("./uploads/".$filename, 'wb');
  fwrite($fhandle, $fileData);
  fclose($fhandle);
  echo("Done with uploading");
?>