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
<title>Jurisdiction</title>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  
  
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">?
<script src="js/lumino.glyphs.js"></script>
<body>
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
				<?php
				$conn=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
				$res=mysqli_query($conn,"select First_Name,Adhaar_No from user where Adhaar_No='".$_SESSION['adhaar']."'");
				while($row = mysqli_fetch_array($res))
    				{
    				$name =$row['First_Name'];
				$adhaar=$row['Adhaar_No'];
 				}
 				?>
				
				<!--<ul class="blah-menu"><p style="font-size: 1em;margin-left:25%">PoliceID:</br> Name:<?php echo $name;?></br> Role:</p></ul>-->
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
			<li><a href="user1_dash.php"><svg class="glyph stroked dashboard-dial"></svg><i class="fa fa-home" aria-hidden="true"></i><strong> Dashboard</strong></a></li>
			<li><a href="update_user.php"><svg class="glyph stroked calendar"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Update Profile</strong></a></li>
			<li><a href="view.php"><svg class="glyph stroked line-graph"></svg><i class="fa fa-eye" aria-hidden="true"></i><strong> View Profile</strong></a></li>
			<li><a href="user_lodgecomplaint.php"><svg class="glyph stroked star"></svg><i class="fa fa-pencil-square" aria-hidden="true"></i><strong>  Lodge Complaint</strong></a></li>
			<li><a href="track.php"><svg class="glyph stroked star"></svg><i class="fa fa-location-arrow" aria-hidden="true"></i><strong> Track Complaint</strong></a></li>
			<li><a href="history.php"><svg class="glyph stroked star"></svg><i class="fa fa-history" aria-hidden="true"></i><strong> History</strong></a></li>
		
			<li role="presentation" class="divider"></li>
		
		</ul>
<div class="form-group">
<div class="col-md-12">
<button type="submit" onclick="showPosition();" class="btn btn-primary btn-md pull-right active"><i class="fa fa-location-arrow" aria-hidden="true"></i> Know Your Jurisdiction</button>
</div>
</div>
<script type="text/javascript">
    function showPosition(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                var positionInfo = " "+ "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude +" ";
             localStorage.setItem("loc",positionInfo);
           	window.location="juri.php";
            });
        } else{
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Jurisdiction</h1>

	



	
	
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"></svg><i class="fa fa-location-arrow" aria-hidden="true"></i><strong> My Jurisdiction</strong></div>
					<div class="panel-body">
						<form class="form-horizontal" action="up_user.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Your Current Location</label>
									<script>
									var loc=localStorage.getItem("loc");
									</script>
									<?php
									$loc="<script>document.write(loc);</script>";
									$loc1=$loc;
									echo "User's current location : $loc1";
									?>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Police Station</label>
									<div class="col-md-9" style="width: 12%;">
										<input id="station" name="station" type="text" class="form-control" readonly/>
										<input id="address" name="address" type="text" class="form-control" readonly/>
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Contact Number</label>
									<div class="col-md-9">
										<input class="form-control" type="text" maxlength=10 id="message" name="contact" readonly/>
									</div>
									
									
									
									
								</div>
								
								
								<div class="container">
								<ul>
								<a data-toggle="tab" href="#ambulance"><button type="submit" class="btn btn-primary" name="submit" style="margin-left: 12%;">Ambulance</button></a>
								<a data-toggle="tab" href="#fire"><button type="submit" class="btn btn-primary" name="submit" style="margin-left: 12%;">Fire Station</button></a>
								</ul>
								<div class="tab-content">
								<div id="ambulance" class="tab-pane fade in active">
								<h3>Ambulance</h3>
								<p>108</p>
								</div>
								<div id="fire" class="tab-pane fade">
								<h3>Fire Station</h3>
								<p>080 2297 1538</p>
								</div>
								</div>
								</div>



							</fieldset>
						</form>
					</div>
				</div>
				
		</div><!--/.row-->
	</div>	
	
	
	
	




</div>


			</div>
	</div>	<!--/.main-->

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
</body>

</html>
