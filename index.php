<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/title.png">
<title>ENDOCELL STORE </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery.countdown.css" /> <!-- countdown --> 
 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
</head> 
<body>

<?php
include "modal_login.php";
?>
 
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<script>
		$('#myModal88').modal('show');
	</script> 
	<style>
        /* Gaya elemen wrapper untuk animasi berjalan */
        .marquee-wrapper {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        /* Gaya elemen teks berjalan */
        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 15s linear infinite; /* Waktu dan efek animasi dapat disesuaikan */
        }

        /* Animasi teks berjalan */
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
	 
	<div class="header" aria-hidden="true" id="home1">
		<div class="container">
		<a class="fa fa-file-text navbar-form navbar-left" style="font-size:20px;" href="index.php?page=tutorial">How To Buy?</a>
			<div class="w3l_logo">
				<h1><a href="index.html">ENDOCELL STORE</a></h1>
			</div>
					<form action="cari.php" method="GET" class="navbar-form navbar-right">
						<input type="text" name="cari" class="form-control" placeholder="Search...">
						<button class="btn btn-primary">CARI</button>
					</form>
					<div class="marquee-wrapper">
        				<div class="marquee-text">
			            <?php
                            echo "Buka dari jam 08:00 sampai jam 22:00 Low respon waktu sholat";
?>
			        		</div>
			    		</div>
					</div>  
			</div>  
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
				
						<li><a href="index.php" class=""><span class="badge"></span>Home<span class="glyphicon glyphicon-qrcode"></span></a></li>	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Mobiles</h6>
											<li><a href="index.php?page=mobiles/handphone">Handphone</a></li>
											<li><a href="index.php?page=audio/audio">Mp3 Players</a></li> 
											<li><a href="index.php?page=aksesorishp/aksesorishp">Aksesoris HP</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Spare Part</h6>
											<li><a href="index.php?page=mobiles/sphp">Handphone</a></li>
											<li><a href="index.php?page=audio/spau">Mp3 Players</a></li> 
											<li><a href="index.php?page=komputer/komputer">Komputer</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Pulsa</h6>
											<li><a href="index.php?page=pulsa/pulsaregular">Pulsa Regular</a></li>
											<li><a href="index.php?page=pulsa/pulsadata">Pulsa Data</a></li> 
											<li><a href="index.php?page=pulsa/pulsalistrik">Pulsa Listrik</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
						<!-- -->
						<li><a href="index.php?page=view_cart"><span class="badge"></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>

						<li><a href="index.php?page=checkout"><span class="badge"></span> Checkout <span class="glyphicon glyphicon-usd"></span></a></li>
						<!-- -->
						<li><a href="index.php?page=status/status"><span class="badge"></span>Status<span class="glyphicon glyphicon-bookmark"></span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><u><b><?php echo $_SESSION['pembeli']['nama'];?></u></b> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<?php if($_SESSION['pembeli']): ?>
					<li class="active"><a href="logout.php">Logout</a></li>
					<?php else: ?>
					<li class="active"><a data-toggle="modal" data-target="#myModal" class="">Login</a></li>
					<?php endif ?>
					<li class="active"><a href="index.php?page=status/info">Info</a></li>
										</ul>
									</div>
									
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- //navigation -->
		
		<!-- banner -->
		<?php include("function/content.php"); ?>
		<?php include("testimmoni.php"); ?>
	
	
	
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<div id="flexiselDemo1">			
					<li>
						<img src="images/tb1.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb2.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb3.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb4.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb5.jpg" alt=" " class="img-responsive" />
					</li>
				</div>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 
		<?php
    include "top_brand.php";
?>
	</div>
	<!-- //newsletter -->
	<?php
include "foother.php";
?>
			

</body>
</html>