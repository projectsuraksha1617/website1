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
<title>Missing Person</title>
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
			<li><a href="charts.html"><svg class="glyph stroked line-graph"></svg><i class="fa fa-eye" aria-hidden="true"></i><strong> View Profile</strong></a></li>
			<li class="active"><a href="user_lodgecomplaint.php"><svg class="glyph stroked star"></svg><i class="fa fa-pencil-square" aria-hidden="true"></i><strong>  Lodge Complaint</strong></a></li>
			<li><a href="track.php"><svg class="glyph stroked star"></svg><i class="fa fa-location-arrow" aria-hidden="true"></i><strong> Track Complaint</strong></a></li>
			<li><a href="forms.html"><svg class="glyph stroked star"></svg><i class="fa fa-history" aria-hidden="true"></i><strong> History</strong></a></li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Missing Person</h1>
			</div>
	</div>	<!--/.main-->
	
	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"></svg><i class="fa fa-pencil" aria-hidden="true"></i><strong> Enter the details</strong></div>
					<div class="panel-body">
						<form class="form-horizontal" action="persondetails.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Case type</label>
									<div class="col-md-9">
									<input id="name" name="type" type="text" value="Missing Person" class="form-control" readonly/>
									</div>
									<label class="col-md-3 control-label" for="name">Missing Person's Name</label>
									<div class="col-md-9">
									<input id="name" name="name" type="text" placeholder="Name" required class="form-control" pattern="[A-Za-z_ ]*" title="please enter only alphabets">
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label" for="name"> Gender</label>
									<div class="col-md-9">
									 <label><input type="radio" name="gender" required>Female</label>
									 <label><input type="radio" name="gender" required>Male</label>
									</div>
									</div>
									<div class="form-group">
									<label for="name" class="col-md-3 control-label">Date of Birth</label>
									<div class="col-md-9">
									<input class="field" name="date" type="date" required="required" />
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label" for="name"> Age</label>
									<div class="col-md-9">
									<input id="name" name="age" type="text" placeholder="Age" required class="form-control" maxlength="3" pattern="[0-9]*" title="Enetr only numbers">
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">Languages Spoken</label>
									<div class="col-md-9">
									<select name="lang" class="field" required >
									<option selected="" value="">Please select a language spoken by the missing person</option>
									<option value="H">Hindi</option>				  	
									<option value="K">Kannada</option>	
									<option value="E">English</option>
									<option value="B">Bengali</option>	
									<option value="M">Marathi</option>			  	
									<option value="G">Gujrathi</option>	
									<option value="T">Tamil</option>
									<option value="TE">Telugu</option>
									<option value="O">Odia</option>				  	
									<option value="MA">Malayalam</option>	
									<option value="P">Punjabi</option>
									<option value="U">Urdu</option>
									</select>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label" for="message">Contact Number</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="message" maxlength="10" required name="mob" placeholder="Mobile Number" pattern="[0-9]{10}" title="Must contain your 10-digit mobile number">
									</div>
									<label class="col-md-3 control-label" for="message">Missing Person's Photo</label><br/>
									<div class="col-md-9">
									<input type="file" accept="image/*" name="image" required/>
									</div>
									</div>
									
									<div class="form-group">
								<label class="col-md-3 control-label" for="name">Severity</label>
								<div class="col-md-9">
								 <input type="radio" name="severity" value="Low"> Low
								<input type="radio" name="severity" value="Medium">Medium
								<input type="radio" name="severity" value="High">High
								</div>
									</div>
									
									</div>
								
									<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Submit</button>
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
