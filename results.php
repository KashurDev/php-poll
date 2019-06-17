<!DOCTYPE html>
<?php
	session_start();
	include ('config.php');
	$myvote = new myPoll();
	$author = $_POST["author"];
	$sql = "INSERT INTO poll (author, count) VALUES ('$author', 1)";
	if($myvote->addVote($sql)) {
		 $_SESSION["voted"]=1;		 //uncomment this if you want to allow multiple voting from a single user
	}
	$miguelcount=$myvote->getCount('miguel');
	$charlescount=$myvote->getCount('charles');
	$jjrcount=$myvote->getCount('jjr');
	$antionecount=$myvote->getCount('antoine');
	?>
<html lang="en">
   <head>
      <title>Poll Result</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    	
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>        
	  <script src="js/index.js"></script>
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <style>
	  #loader {
		  position: absolute;
		  top: 50%;
	  }
	  .wide {
	  width:300px;
	  }
	  .top50 {
	  padding-top:50px;
	  
	  }
	  .input-field label {
		color: #000000;
	}
	nav .nav-wrapper i {
		display: block;
		font-size: 3rem;
	}
	@media (max-width:600px) {
		nav .nav-wrapper i {
			display: block;
			font-size: 4rem;
		}
	}
	  </style>
	</head>
   
<body>
	
	<!--<div class="progress" id="loader">
      <div class="indeterminate"></div>
	</div>-->
	<nav>
		<div class="nav-wrapper">

		  <a href="#" class="brand-logo center"><i class="material-icons">pie_chart</i> Poll Result</a>
		  <ul id="nav-mobile" class="left hide-on-med-and-down">
			<li><a href="javascript:history.back()" title="Go Back"><i class="material-icons">backspace</i></a></li>
			
		  </ul>
		</div>
	</nav>
	<div class="row">
		 <div class="col s12 m12">
		<h6 class="center-align card-panel <?php echo $myvote->color ?> lighten-2"> <?php echo $myvote->msg ?> </h6>
		</div> 
		<div class="col s12 m12">
			<div class="collection">
				<a href="#!" class="collection-item"><span class="badge"><h5 style="color:black">Votes</h5></span><h5 style="color:black">Author</h5></a>
				<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="votes"><?php echo $miguelcount ?></span>Miguel de Cervantes</a>
				<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="votes"><?php echo $charlescount ?></span>Charles Dickens</a>
				<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="votes"><?php echo $jjrcount ?></span>J.R.R. Tolkien</a>
				<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="votes"><?php echo $antionecount ?></span>Antoine de Saint-Exuper</a>
				
			</div>		
		</div>
		<div class="col s12 m12"> 
			<div id="piechart" style="width: 100%; height: 500px;">
			</div>
			
		</div>
		
	</div>
	
		
	<script type="text/javascript">
			// Load google charts
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			// Draw the chart and set the chart values
			function drawChart() {
			  var val1 = <?php echo $miguelcount ?>;
			  var val2 = <?php echo $charlescount ?>;
			  var val3 = <?php echo $jjrcount ?>;
			  var val4 = <?php echo $antionecount ?>;
			
			  var data = google.visualization.arrayToDataTable([
			  ['Author', 'Votes'],
			  ['Miguel de Cervantes', val1],
			  ['Charles Dickens', val2],
			  ['J.R.R. Tolkien', val3],
			  ['Antoine de Saint-Exuper', val4]
			]);

			  // Optional; add a title and set the width and height of the chart
			  var options = {is3D: true};

			  // Display the chart inside the <div> element with id="piechart"
			  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			  chart.draw(data, options);
			}
	</script>
</body>   
</html>