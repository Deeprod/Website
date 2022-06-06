<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT 
				MONTH
				,YEAR
				,Rating
				,COUNT(*) AS Count_Rating 
			FROM
				(
				SELECT 
					SUBSTRING(Date,4,2) AS MONTH
					,SUBSTRING(Date,9,2) AS YEAR
					,Rating 
				FROM 
					Tab_Movies 
				WHERE 
					Date <> ''
				) T

			GROUP BY 
				MONTH, YEAR, Rating

			ORDER BY 
				YEAR DESC, MONTH DESC, Rating ASC";   

	$result = $conn->query($sql);

	$i = 0;
	$k = 0;
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if ($row["Rating"] != "")
			{					
				$i++;
				$Year[$i]  = $row["YEAR"]; 
				$Month[$i] = $row["MONTH"]; 
				
				if($Year[$i] == $Year[$i-1] AND $Month[$i] == $Month[$i-1]) 
					{ } 
				else 
					{ 	
						$k++;
						$Year_Step[$k] = $Year[$i];
						$Month_Step[$k] = $Month[$i];
					}
				
				$chart01_array[$Year[$i]][$Month[$i]][$row["Rating"]] = $row["Count_Rating"];

			}
		}
	} 
	else 
	{
		echo "0 results";
	}
	$Nb_Line = $k;

	$conn->close();
?>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: ""
	},
	axisX: {
		valueFormatString: "MMM, YYYY"
	},
	axisY: {
		prefix: ""
	},
	toolTip: {
		shared: true
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: 
	[
		<?php
		
		for($i = 5; $i <= 9; $i++)
		{	
			if($i > 5) { echo","; }

			echo"
					{
						type: 'stackedBar',
						name: '" . $i . "',
						showInLegend: 'true',
						xValueFormatString: 'MMM, YYYY',
						yValueFormatString: '#,##0',
						dataPoints: 
						[
				";
				
							for($j = 1; $j <= $Nb_Line; $j++)
							{	
								if($j > 1) { echo","; }
								
								$temp_rating_count = $chart01_array[$Year_Step[$j]][$Month_Step[$j]][$i];
								if($temp_rating_count == "") { $temp_rating_count = 0; }
								
								echo"{ x: new Date(20". $Year_Step[$j] .", " . strval(intval($Month_Step[$j])-1) . ", 1), y: " . $temp_rating_count . " }";
								
								// In the Date() function, January is 0 - December is 11
							}
							
		    echo"
						]
					}
				";
		}
		
		?>
	]
});
chart.render();

function toggleDataSeries(e) {
	if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>

<?php

echo"

<div class='section mt-4'>
	
	<div class='section-heading'>
		<h2 class='title'>Movies by Watching Month</h2>
	</div>
	
	<div class='transactions'>
		<div class='item'>
			<div id='chartContainer' style='height: 300px; width: 100%;'></div>
		</div>
	</div>
</div>

";

?>