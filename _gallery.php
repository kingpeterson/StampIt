<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Squad theme CSS -->
    <!--<link href="css/style.css" rel="stylesheet">-->
    <!--<link href="color/default.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/blueimp-gallery.min.css">
	
	<style type="text/css">

		/* overall gallery table */
		table.gallery{
		border-collapse: collapse;
		}

		/* images in the gallery */
		table.gallery img {
		border:0px;
		}

		/* table cells in gallery */
		table.gallery td {
		border:1px black solid;
		font-size:8pt;
		font-family:verdana;
		}

		/*  "Showing results X - Y of Z entries" entry row */
		table.gallery td.entries {
		text-align:right;
		padding:3px;
		}

		/* spacer between each row of images */
		table.gallery td.spacer {
		background-color:#E2E2E2;
		height:16px;
		}

		/*  "Page (5): <<Prev  - [1] 2 3 4 5  - Next>>" pagenumber */
		table.gallery td.pagenumbers {
		text-align:center;
		padding:3px;
		font-weight:bold;
		}

		/* page number links */
		table.gallery td.pagenumbers a {
		text-decoration:none;
		}

		/* page number links:hover */
		table.gallery td.pagenumbers a:hover {
		color:#3399FF;
		}
		
		.imageBox {
  
    padding:10px;
    border-width: 1px;
    border-color: Black;
}

	</style>

    <title>Photo Gallery</title>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
		<h3 style="text-align:center;"> Photo Gallery </h3>



    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>

	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
	    <div class="slides"></div>
	    <h3 class="title"></h3>
	    <a class="prev"></a>
	    <a class="next"></a>
	    <a class="close"></a>
	    <a class="play-pause"></a>
	    <ol class="indicator"></ol>
	</div>

	<ul class="bxslider">
	<?php
		$dirname = "uploads/";
		$images = scandir($dirname);
		$ignore = Array(".", "..");
		foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
				echo '<a href="uploads/' .$curimg .'" >';
				echo '<li>';
				echo '<img src="uploads/' .$curimg .'" width=30% height=30% style="margin-right:20px;" /></a>';
				echo '</li>';
			}
		}
	?>
	</ul>


     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Po Tsung Wang 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script> 

    <script src="/js/jquery.bxslider.min.js"></script>


    <!-- Custom Theme JavaScript -->


<script src="js/blueimp-gallery.min.js"></script>
<script>
$('.bxslider').bxSlider({
  mode: 'horizontal',
  useCSS: false,
  infiniteLoop: false,
  hideControlOnEnd: true,
  easing: 'easeOutElastic',
  speed: 2000
});
</script>
<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
</body>
</html>