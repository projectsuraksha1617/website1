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
<title>Track Complaint</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">?

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

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
			
			<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 8em;margin-top: 10px;margin-left: 20%;text-align:center;"></span>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="user1_dash.php"><svg class="glyph stroked dashboard-dial"></svg><i class="fa fa-home" aria-hidden="true"></i><strong> Dashboard</strong></a></li>
			<li><a href="update_user.php"><svg class="glyph stroked calendar"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Update Profile</strong></a></li>
			<li><a href="view.php"><svg class="glyph stroked line-graph"></svg><i class="fa fa-eye" aria-hidden="true"></i><strong> View Profile</strong></a></li>
			<li ><a href="user_lodgecomplaint.php"><svg class="glyph stroked star"></svg><i class="fa fa-pencil-square" aria-hidden="true"></i><strong>  Lodge Complaint</strong></a></li>
			<li class="active"><a href="track.php"><svg class="glyph stroked star"></svg><i class="fa fa-location-arrow" aria-hidden="true"></i><strong> Track Complaint</strong></a></li>
			<li><a href="history.php"><svg class="glyph stroked star"></svg><i class="fa fa-history" aria-hidden="true"></i><strong> History</strong></a></li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Track Complaint</h1>
			</div>
		</div>
	<div class="row">
			<div class="panel panel-default">
		<div class="panel-body">
		<form class="form-horizontal">
		<fieldset>
		<div class="form-group">
		<label class="col-md-3 control-label" for="name">Case Type</label>
		<div class="col-md-9">
	<input type="text" style="width:200px;" class="form-control" value="Vehicle Theft" readonly/>
									</div>
	
								</div>
</fieldset>
</form>
</div>
</div>
</div>
	
<div class="row">
<div class="panel panel-default">
		<div class="panel-body">
		<form class="form-horizontal">
		<fieldset>
		<!-- Name input-->
		<div class="form-group">
		<label class="col-md-3 control-label" for="name">Tracking ID</label>
		<div class="col-md-9">
	
			<?php
			$tid=$_POST["tid"];
			$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("Can't connect to DB");
			$print = mysqli_query($mysql,"select tid from vehicletheft_history where tid='$tid'");
			while($row = mysqli_fetch_array($print))
    			{
    			$tid=$row['tid'];
			}
?>
			
	<input id="tid" style="width:200px;" name="tid" type="text" value="<?php echo $tid;?>" class="form-control" readonly/>
									</div>
	
								</div>
								
			
							</fieldset>
						</form>
					</div>
				</div>
</div>
				
<div class="row">
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><svg class="glyph stroked email"></svg><strong>Case Details</strong></div>
<div class="panel-body">
			
			<form class="form-horizontal">
			<fieldset>
			<div class="form-group">
			<?php
			if(!empty($_POST['submit'])){
			$tid=$_POST["tid"];
			$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("Can't connect to DB");
			$print = mysqli_query($mysql,"select date,tid,Name,Case_Type from vehicletheft_history where tid='$tid'");
			while($row = mysqli_fetch_array($print))
    				{
    				$name =$row['Name'];
    				$type=$row['Case_Type'];
				$date=$row['date'];
				$tid=$row['tid'];
				session_start();
				$_SESSION['tid']=$tid;
				}
			$today=date("Y-m-d");
			$date1=date_create("$date");
			$date2=date_create("$today");
			$diff=date_diff($date1,$date2);
			$dd=$diff->format("%a days ago");
			
			$res=mysqli_query($mysql,"select * from vehicletheft where tid='$tid'");
			$res1=mysqli_query($mysql,"select * from vehicletheft1 where tid='$tid'");
			$res2=mysqli_query($mysql,"select * from vehicletheft2 where tid='$tid'");
			$res3=mysqli_query($mysql,"select * from vehicletheft4 where tid='$tid'");

if(mysqli_num_rows($res)!=0)
{
echo "<label class=\"col-md-3 control-label\" for=\"name\">Name</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white; margin-top:5px;\" id=\"name\" name=\"name\" type=\"text\" value=\"$name\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Nature of Complaint</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"noc\" name=\"noc\" type=\"text\" value=\"$type\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Complaint filed on</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"cfd\" name=\"cfd\" type=\"text\" value=\"$date\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Status of the case</label>";
echo "<div class=\"col-md-9\">";
echo "<textarea style=\"resize:none;margin-top:5px;\" rows=\"4\" cols=\"62\" readonly/>The complaint of the above case named $type filed on the particular date is still not handled</textarea>";
echo "</div>";
}
else if(mysqli_num_rows($res1)!=0)
{
echo "<label class=\"col-md-3 control-label\" for=\"name\">Name</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"name\" name=\"name\" type=\"text\" value=\"$name\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Nature of Complaint</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"noc\" name=\"noc\" type=\"text\" value=\"$type\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Complaint filed on</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"cfd\" name=\"cfd\" type=\"text\" value=\"$date\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Status of the case</label>";
echo "<div class=\"col-md-9\">";
echo "<textarea style=\"resize:none;margin-top:5px;\" rows=\"4\" cols=\"62\" readonly/>The complaint of the above case named $type filed on the particular date is in the pending list</textarea>";
echo "</div>";
}
else if(mysqli_num_rows($res2)!=0)
{

echo "<label class=\"col-md-3 control-label\" for=\"name\">Name</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"name\" name=\"name\" type=\"text\" value=\"$name\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Nature of Complaint</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"noc\" name=\"noc\" type=\"text\" value=\"$type\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Complaint filed on</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"cfd\" name=\"cfd\" type=\"text\" value=\"$date\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Status of the case</label>";
echo "<div class=\"col-md-9\">";
echo "<textarea style=\"resize:none;margin-top:5px;\" rows=\"4\" cols=\"62\" readonly/>The complaint of the above case named $type filed on the particular date is being handled</textarea>";
echo "</div>";
}
else if(mysqli_num_rows($res3)!=0)
{
echo "<label class=\"col-md-3 control-label\" for=\"name\">Name</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"name\" name=\"name\" type=\"text\" value=\"$name\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Nature of Complaint</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\" id=\"noc\" name=\"noc\" type=\"text\" value=\"$type\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Complaint filed on</label>";
echo "<div class=\"col-md-9\">";
echo "<input style=\"background-color:white;margin-top:5px;\"  id=\"cfd\" name=\"cfd\" type=\"text\" value=\"$date\" class=\"form-control\" readonly/></div>";
echo "<label class=\"col-md-3 control-label\" for=\"name\">Status of the case</label>";
echo "<div class=\"col-md-9\">";
echo "<textarea style=\"resize:none;margin-top:5px;\" rows=\"4\" cols=\"62\" readonly/>The complaint of the above case named $type filed on the particular date is completed</textarea>";
echo "<a href=\"generatepdf.php\">Click here to download PDF</a>";
echo "</div>";
}
else{
echo "<p style=\"margin-left:50px;\"><strong>Invalid Tracking ID</strong></p>";
}
mysqli_close($mysql);}else{
echo "<p style=\"margin-left:50px;\"><a href=\"track.php\">Click here</a> to enter Tracking ID</p>";}
?>
			</div>
			</fieldset>
</form>
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






