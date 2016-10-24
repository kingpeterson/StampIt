<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("member.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>

      <!--<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />-->
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <meta charset="utf-8">
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
			<!-- Form Code Start -->
				<div id='fg_membersite'>
				<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
				<fieldset >
					<legend>Login</legend>

					<input type='hidden' name='submitted' id='submitted' value='1'/>

					<div class='short_explanation'>* required fields</div>

					<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
					<div class='container'>
    						<label for='username' >UserName*:</label><br/>
   						<input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    						<span id='login_username_errorloc' class='error'></span>
					</div>
					<div class='container'>
    						<label for='password' >Password*:</label><br/>
    						<input type='password' name='password' id='password' maxlength="50" /><br/>
    						<span id='login_password_errorloc' class='error'></span>
					</div>

					<div class='container'>
    						<input type='submit' name='Submit' value='Submit' />
					</div>
						<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
				</fieldset>
				</form>
				<a href='index.php'><- Go Home</a>
				<!-- client-side Form Validations:
				Uses the excellent form validation script from JavaScript-coder.com-->
				</div>
			</div>
		</div>
	</div>

	<script type='text/javascript'>
	// <![CDATA[

	    var frmvalidator  = new Validator("login");
	    frmvalidator.EnableOnPageErrorDisplay();
	    frmvalidator.EnableMsgsTogether();
	
	    frmvalidator.addValidation("username","req","Please provide your username");
	    
	    frmvalidator.addValidation("password","req","Please provide the password");
	
	// ]]>
	</script>

<!--
Form Code End 
-->

</body>
</html>