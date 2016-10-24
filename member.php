<?PHP
require_once("./include/membersite_config.php");
include ("include/function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Po Tsung Wang">

    <title>Your Space - STampIT </title>

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

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <?php if ($fgmembersite->CheckLogin() == true) : ?>
                    	<span class="icon-bar"></span>
                    <?php endif; ?>

                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">STampIT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="gallery.php">Gallery</a>
                    </li>
                    <li>
                        <a href="member.php">Member</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php if ($fgmembersite->CheckLogin() == true) : ?>
                    	<li>
                        	<a href="logout.php">Logout</a>
                    	</li>                    
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <?php if ($fgmembersite->CheckLogin() == true) : ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?= $fgmembersite->UserFullName() ?>'s
                        <strong>timeline</strong>
                        <a href="upload.php" class="btn btn-default btn-lg pull-right">Upload</a>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <?php
                    	$email = $fgmembersite->UserEmail(); 
                    	//echo $email;
                    	$mysqli = new mysqli('localhost', 'peter', 'jordan11', 'secure_login');
			// Check connection
			if ($mysqli->connect_error) {
		    		die("Connection failed: " . $mysqli->connect_error);
			}
			$sql = "SELECT id, url FROM upload WHERE owner = '$email'";
			$result = $mysqli->query($sql);
			if ($result->num_rows > 0) {
				$index = 0;
				while($row = $result->fetch_assoc()) {
					$url["$index"] = $row["url"];
					$id["$index"] = $row["id"];
					$index++;
				}
				$max = $index - 1;
			}
			$index = $index - 1;
		
                    ?>
                    <?php while ($index >= 0) :?>
                    

                    	<?php 
                    		echo '<a href="'.$url["$index"].'" >';
                    		echo '<img src="'.$url["$index"].'" height=70% width=70%>';
                    	
	                    	$url_temp = $url["$index"];
	                    	$comment_query = 
						"SELECT *
						FROM comment
						WHERE pic_url = '$url_temp'
						ORDER BY id DESC"; 
					$result = $mysqli->query($comment_query);
					if ($result->num_rows > 0) {
						$count = 0;
						while($row = $result->fetch_assoc()) {
							$name["$count"] = $row["name"];
							$comment["$count"] = $row["comment"];
							$date["$count"] = $row["date"];
							$count++;					
						}
					}
					$count = $count - 1;
					$number = $id["$index"];
					$url_temp = $url["$index"];
				

			?>
			
				<li class="bar">
				<!--<div align="center">-->
					<!--<?php echo $number; ?>-->
					<p>Click Comment Button and submit comment</p>
						<!--<span style="font-style:inherit; font-family:Georgia; font-size:14px;padding:500px; float:center; width:20px">-->
							<a href="#" class="comment_button" id="<?php echo $number; ?>">Comment</a>
						<!--</span>-->
				
				</li>
				

				<div id="flash<?php echo $number; ?>"></div>
				<div class="panel panel-success" id="slidepanel<?php echo $number; ?>">
					<?php 
						while($count >= 0){
							echo '<div class="panel-heading">';
							echo $date["$count"];
							echo '</div>';
							echo '<div class="panel-body">';
							echo '<h4>';
							echo $name["$count"];
							echo " says:";
							echo '</h4>';
							echo $comment["$count"];
							echo '</div>';
							echo "<br>";
							$count--;
						} 
					?>
					<div id="loadplace<?php echo $number; ?>"></div>
					<form action="" id="form" method="post" name="<?php echo $number; ?>">
						<input type="text" name="name" id="name<?php echo $number; ?>" placeholder="Your name here...." />
						<br><br>

						<textarea rows="3" cols="40" id="textboxcontent<?php echo $number; ?>" placeholder="Type your comment here...." ></textarea><br />
						<input type="hidden" name="picurl" value="<?php echo $url_temp; ?>" id="url<?php echo $number; ?>"/>
						<input type="submit" value="Submit" 
						class="comment_submit" id="<?php echo $number; ?>" />
					</form>
				</div>
				<br><br>
				
                    	
                    	<?php $index--; ?>
                    <?php endwhile; ?>
                    
                    <hr>
                </div>
                
            </div>
        </div>

    </div>
    <!-- /.container -->
    
    
    <?php else: ?>
    	<div class="row">
     		<div class="box">
    			<div class="col-lg-12 text-center">
                    		<h2>Oops you cannot go in yet
                        	<br>
                    		</h2>
                    		<p>Login to see the content inside.</p>
                    		<a href="login.php" class="btn btn-default btn-lg">Login</a>
                    		<br>
                    		<p>Don't have an account yet? Signup now!</p>
                    		<a href="register.php" class="btn btn-default btn-lg">Signup</a>
                    		<hr>
                	</div>
                </div>
        </div>
    <?php endif; ?>
    
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Po Tsung Wang 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

    
    <script type="text/javascript">

	    $(document).ready(function(){
		$(".comment_button").click(function(){
		
			var element = $(this);
			var I = element.attr("id");
			
			$("#slidepanel"+I).slideToggle(300);
			$(this).toggleClass("active"); 
			
			return false;
		});
	    });
	</script>

<script type="text/javascript">
		$(document).ready(function(){
		$(".comment_submit").click(function(){
		
		
			var element = $(this);
			var Id = element.attr("id");
			
			var test = $("#textboxcontent"+Id).val();
			var test1 = $("#url"+Id).val();
			var test2 = $("#name"+Id).val();
			var dataString = 'textcontent='+ test + '&picurl=' + test1 +'&name=' + test2;


			
			if(test==''){
				alert("Please Enter Some Text");
			}
			else{
				$("#flash"+Id).show();
				$("#flash"+Id).fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle"> loading.....');		
				
				$.ajax({
					type: "POST",
					url: "insertajax.php",
					data: dataString,
					cache: true,
					success: function(html){
						$("#loadplace"+Id).append(html);
						$("#flash"+Id).hide();
					}
				});
			
			document.getElementById('form').reset();
			}
			
		
		return false;});});
</script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>