<?php
ob_start();
session_start();
if($_SESSION['adhaar']==FALSE)
{
header("Location:user.html");
}
ob_end_clean();
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
window.history.forward(1);
function noBack(){
window.history.forward();
}
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lodge Complaint</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">​

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
  </style>
 
</head>

<body style="background:white;">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>SURA</span>KSHA</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout_user.php"><svg class="glyph stroked cancel"></svg><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><strong> Logout</strong></a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form>
			<div class="form-group">
			
				<?php
				ob_start();
				$conn=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
				$res=mysqli_query($conn,"select Photo from user where Adhaar_No='".$_SESSION['adhaar']."'");
				$row = mysqli_fetch_assoc($res);
				
 				header("Content-type:image/*");
				echo $row['Photo'];
				ob_end_clean();
				?>
				
		<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 8em;margin-top: 10px;margin-left: 20%;text-align:center;"></span>
			</div>
		</form>
		<ul class="nav menu">
		<li ><a href="user1_dash.php"><svg class="glyph stroked dashboard-dial"></svg><i class="fa fa-home" aria-hidden="true"></i><strong> Dashboard</strong></a></li>
			<li><a href="update_user.php"><svg class="glyph stroked calendar"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Update Profile</strong></a></li>
			<li><a href="view.php"><svg class="glyph stroked line-graph"></svg><i class="fa fa-eye" aria-hidden="true"></i><strong> View Profile</strong></a></li>
			<li class="active"><a href="user_lodgecomplaint.php"><svg class="glyph stroked star"></svg><i class="fa fa-pencil-square" aria-hidden="true"></i><strong>  Lodge Complaint</strong></a></li>
			<li><a href="track.php"><svg class="glyph stroked star"></svg><i class="fa fa-location-arrow" aria-hidden="true"></i><strong> Track Complaint</strong></a></li>
			<li><a href="history.php"><svg class="glyph stroked star"></svg><i class="fa fa-history" aria-hidden="true"></i><strong> History</strong></a></li>
		
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		
		<div class="row" >
			<div class="col-lg-12" style="margin-top: 50px">
				<h1 class="page-header">Lodge Complaint</h1>
			</div>
		</div><!--/.row-->
		
		
		
		<section class="regular slider" style="width: 80%">
    <div>
      <a class="h" href="lostsim.php"><img src="images/sim case.PNG"></a>
    </div>
    <div>
      <a class="h" href="lostmobile.php"><img src="images/mobile case.PNG"></a>
    </div>
    <div>
      <a class="h" href="accident.php"><img src="images/accident.PNG"></a>
    </div>
    <div>
      <a class="h" href="missingperson.php"><img src="images/person case.PNG"></a>
    </div>
    <div>
      <a class="h" href="vehicletheft.php"><img src="images/vehicle case.PNG"></a>
    </div>
    <div>
      <a class="h" href=""><img src="images/assault case.PNG"></a>
    </div>
  </section>
  
<div class="alert alert-info" role="alert">
  <h4 style="text-align:center;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>Warning!</strong>  Legal actions will be initiated agaisnt the false reporting of any cases</h4>
</div>
  
  
		
		
			<!--<div style="margin-top:35px;margin-left:20%;" class="col-md-8">
					<a class="h" href="lostsim.php"><img class="h" src="images/LostSim.PNG" alt="Lost Sim" /></a>
					<a class="h" href="theft.php"><img class="h" src="images/theft.PNG" alt="Theft" /></a>
					<a class="h" href="accident.php"><img class="h" src="images/Accident.PNG" alt="Accidents" /></a>
					<a class="h" href=""><img class="h" src="images/assault.PNG" alt="Physical assault" /></a>		-->		
		<!--/.row-->
	<!--/.main-->
		  
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
		
	 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
    });
  </script>

</body>

</html>
