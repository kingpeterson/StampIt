<?PHP
require_once("./include/membersite_config.php");

$success = false;
if($fgmembersite->ResetPassword())
{
    $success=true;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

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
        			<div class="col-lg-12 text-center">
					<div id='fg_membersite_content'>
						<?php
						if($success){
						?>
						<h2>Password is Reset Successfully</h2>
						Your new password is sent to your email address.
						<a href='index.php'><- Go Home</a>
						<?php
						}else{
						?>
						<h2>Error</h2>
						<span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span>
						<a href='index.php'><- Go Home</a>

						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

</body>
</html>