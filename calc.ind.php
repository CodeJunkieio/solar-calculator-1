<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 <?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname= "project_solar_app";

//Open a new connection to the MySQL server
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
	
$wtt1	= $_POST["wtt1"];
$qty1 	= $_POST["qty1"];	
$hrd1	= $_POST["hrd1"];
$wth1	= $_POST["wth1"];

//calculating total load
$tpower = $wtt1 * $qty1 * $hrd1;

//solar energy available for 6 hours of sunlight
$solarp = $tpower/6; 

//batter capacity in amphere hours
$batt = $tpower/12;

//echo  "total watts consume per day is " .$tpower. "watts";

//echo  "solar power per day is " .$solarp. "watts";


}
?> 
	<main>
	<form action="" method="post" >
			<div style=" border: solid; padding: 10px; margin : 10px; float: left; ">
			<p>Electronic type</p>

				<select id="electronic" name="electronics">
					<option value="">Select Electronic</option>

					<!-- insert the data into the select element -->
					<?php
						$sql = "SELECT * FROM `electronics`";
						$result = $conn->query($sql);
    					$rowCount = $result->num_rows;

    					if ($rowCount > 0) {
    						while ($row = $result->fetch_assoc()) {
			    	?>
			    		<option value="<?php echo $row['id']; ?>"><?php echo $row['elect_type']; ?></option>		
			    	<?php } } else {
			    		echo "<option>Electronics Data Not Available</option>";
			   	 	} ?>
				   	
			   </select>
				<p>power consumption (in watt)</p>
				<select name="wtt1" id="wattsNumber">
					<option value="">Select Electronics Before Selecting Watts</option>
				</select>

				<p>quantity</p>
				<input type="number" name="qty1" required="" placeholder="quantity">

				<p>Hours On per Day</p>
				<input type="number" name="hrd1" required="" placeholder="Hours On per Day">

				<p>watt Hours per Day</p>
				<input type="number" name="wth1" value="<?php echo $wth1 ?>" placeholder="watt Hours per Day">
			</div>
			

			<div style="  ">
			<h2>total watts consume per day (watts)</h2>
				<input type="" name="" value="<?php echo $tpower ?>" placeholder= "watts">	
			
			
			
			<h2>solar power per day (watts)</h2>
				<input type="" name="" value="<?php echo $solarp ?>" placeholder= "watts">

			<h2>batter capacity in amphere hours</h2>
				<input type="" name="" value="<?php echo $batt ?>" placeholder="amphere Hours" >		
			</div>

			<div>
				<button name="submit">calculate</button>
			</div>
			

	</form>
	</main>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>