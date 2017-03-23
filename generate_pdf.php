<?php
ob_start();
session_start();
if($_SESSION['adhaar']==FALSE)
{
header("Location:cop.html");
}
ob_end_clean();
?>
<?php
$tid=$_POST["tid"];
$type=$_POST["case"];
$name=$_POST["name"];
$mob=$_POST["mobile"];
$loc=$_POST["loc"];
$severity=$_POST["sev"];
$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");
$query="insert into lostsim4(tid,Case_type,Name,Mobile,Location,Severity) values('".$tid."','".$type."','".$name."','".$mob."','".$loc."','".$severity."')";
$res=mysqli_query($mysql,$query);
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
<title>Generate PDF</title>
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
						<li><a href="logout_cop.php"><svg class="glyph stroked cancel"></svg><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><strong> Logout</strong></a></li>
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
			<li><a href="cop_dashboard.php"><svg class="glyph stroked dashboard-dial"></svg><i class="fa fa-home" aria-hidden="true"></i><strong> Dashboard</strong></a></li>
			<li><a href="update_cop.php"><svg class="glyph stroked calendar"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Update Profile</strong></a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"></svg><i class="fa fa-eye" aria-hidden="true"></i><strong> View Profile</strong></a></li>
			<li ><a href="casenoti.php"><svg class="glyph stroked table"></svg><i class="fa fa-inbox" aria-hidden="true"></i><strong> Case Notification</strong></a></li>
			<li ><a href="pending.php"><svg class="glyph stroked pencil"></svg><i class="fa fa-list-alt" aria-hidden="true"></i><strong> Pending Cases</strong></a></li>
			<li><a href="active_cases.php"><svg class="glyph stroked app-window"></svg><i class="fa fa-taxi" aria-hidden="true"></i><strong> Active Case</strong></a></li>
			<li class="active"><a href="completed.php"><svg class="glyph stroked star"></svg><i class="fa fa-check-square-o" aria-hidden="true"></i><strong> Completed Cases</strong></a></li>
			
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Completed cases</h1>
			</div>
	</div>	<!--/.main-->
	
	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Enter the details</strong></div>
					<div class="panel-body">
						<form class="form-horizontal" action="insert_pdf.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<?php
									$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");								
									$tid=$_POST['tid'];
									
									$res=mysqli_query($mysql,"select tid from lostsim4 where tid='$tid'");
									while($row = mysqli_fetch_array($res))
    									{
    									$tid =$row['tid'];
    								
									}
 									?>
									<label class="col-md-3 control-label" for="name">Tracking ID</label>
									<div class="col-md-9">
									<input id="copname" name="tid" type="text" value="<?php echo $tid;?>" required class="form-control" readonly/>
									</div>
									
									<label class="col-md-3 control-label" for="name">Case Handled By</label>
									<div class="col-md-9">
									<input id="copname" name="copname" type="text" placeholder="Name of cop" required class="form-control" pattern="[A-Za-z_ ]*" title="please enter only alphabets">
									</div>
									<label class="col-md-3 control-label" for="name">Case Status</label>
									<div class="col-md-9">
									<input id="status" name="status" type="text" placeholder="Status" required class="form-control" pattern="[A-Za-z_ ]*" title="please enter only alphabets">
									</div>
									<label class="col-md-3 control-label" for="message">Mobile Number</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="message" maxlength="10" required name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" title="Must contain your 10-digit mobile number">
									</div>
									<label class="col-md-3 control-label" for="message">Details of the case</label>
									<div class="col-md-9">
										<textarea class="form-control" style="resize:none;" type="text" id="message" required name="details"></textarea>
									</div>
								</div>
								<div class="form-group">
									
									<div class="col-md-12 widget-right">
										<input type="submit" name="submit" value="Submit" class="btn btn-default btn-md pull-right"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
		</div><!--/.row-->
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
