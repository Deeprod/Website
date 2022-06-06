<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); } 
		

    $d = strtotime("now");
	
	for ($x = 0; $x < 100; $x++) 
	{
		$d = strtotime("+" . $x . " day", strtotime("now"));
		$month_name = date('F', mktime(0, 0, 0, date("m",$d), 10));
		
		$month   = date("m", strtotime("+" . $x   . " day", strtotime("now")));
		$month_m = date("m", strtotime("+" . $x-1 . " day", strtotime("now")));
		
		
		
		if ($x == 0)
		{
			echo"
				<div class='section mt-4'>
					
					<div class='section-heading'>
						<h2 class='title'>" . $month_name . "</h2>
					</div>
					
					<div class='transactions'>
				";	
		}
		
		elseif ($month != $month_m)
		
		{
			echo"
					</div>
				</div>
			";
			echo"
				<div class='section mt-4'>
					
					<div class='section-heading'>
						<h2 class='title'>" . $month_name . "</h2>
					</div>
					
					<div class='transactions'>
				";	
		}
		
		/*
		if (date('l',$d) == "Saturday" or date('l',$d) == "Sunday") 
			{ $bgwe = "bg-light"; } 
		else 
			{ $bgwe = ""; }
		*/
		$bgwe = "";
		
		
		
		
		$ddmmyyyy = date("d",$d) . "/" . date("m",$d) . "/20" . date("y",$d);
		
		$sql = "SELECT Meal, Cook FROM `Tab_Meal` WHERE Date = '" . $ddmmyyyy . "'";   

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) {$meal = $row["Meal"]; $cook = $row["Cook"]; }
		} 
		
		if ($cook == "J") 
			{ $bgcook = "bg-blue"; 
			  $txcook = "text-light"; } 
		elseif ($cook == "K")  
			{ $bgcook = "bg-pink"; 
			  $txcook = "text-light"; }
		elseif ($cook == "Takeaway")  
			{ $bgcook = "bg-seven"; 
			  $txcook = "text-light"; }	
		else
			{ $bgcook = "bg-empty"; 
			  $txcook = "text-dark"; }	
		
		echo"
			<div class='item " . $bgwe . "' id='clickid" . $x ."'>
				<div class='detail'>
					<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#LogMealActionSheet'>
						<div class='image-block imaged w48 h48 " . $bgcook . "'>
							<strong class='".$txcook."'>" . date("d",$d) . "</strong>
						</div>
					</a>
				<div>
					". date('l',$d) ."
					<strong>". $meal . "</strong>
				</div>
			</div>
		</div>
		
		";
		
		if (date('l',$d) == "Sunday") { echo"<br>"; }
		
		
		
		
		
		
		
		echo"
			<script> 
				document.getElementById('clickid".$x."').onclick = function() {change_id('".$ddmmyyyy."')};
			</script> 
		";
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
	
	echo"
			</div>
		</div>
	";
	
	$conn->close();
				
?>

<script> 

	function change_id(text) 
	{
	  document.getElementById("LogMealDate").value = text;
	  //alert(text);
	}

</script>