<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT 
				Distinct Year, Count(*) As CountYear
			FROM
				Tab_Movies 
			WHERE
				Rating > 0
			GROUP BY 
				Year
			ORDER BY 
				Year DESC";   

	$result = $conn->query($sql);


	for($i = 0; $i <= 3000; $i++)
	{
		$CountYear[$i] = 0;
	}
		
	$i = 0;
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if ($row["CountYear"] != "")
			{			
				$i++;
				$tempyear = $row["Year"];
				$YearInt = (int)$tempyear;
				$CountYear[$YearInt] = $row["CountYear"]; 
				// echo $Year[$i];
			}
		}
	} 
	else 
	{
		echo "0 results";
	}

	$MaxYear = $i;
	
	$conn->close();
?>

<?php

echo"

<div class='section mt-4'>
	
	<div class='section-heading'>
		<h2 class='title'>Movies by Year</h2>
	</div>
	
	<div class='transactions'>
		<div class='item'>
			<div id='chart' style='width: 100%'></div>
		</div>
	</div>
</div>

";

?>

<script src='https://cdn.jsdelivr.net/npm/apexcharts'>
</script>

<script>
    var options = 
	    {
          series: 
		    [
			<?php
				
				
				
				for($i = 1970; $i <= 2020; $i = $i + 10)
				{
					echo"
					{
					  name: '" . $i . "s',
					  data: [".$CountYear[$i].",".$CountYear[$i+1].",".$CountYear[$i+2].",".$CountYear[$i+3].",".$CountYear[$i+4].",".$CountYear[$i+5].",".$CountYear[$i+6].",".$CountYear[$i+7].",".$CountYear[$i+8].",".$CountYear[$i+9]."]
					}
					,		
					";
				}
			
			?>
			]
		,
          chart: {
          height: 250,
          type: 'heatmap',
		  toolbar: { show: false }
        },
        stroke: {
          width: 1
        },
        plotOptions: {
          heatmap: {
            radius: 0,
            enableShades: false,
            colorScale: {
              ranges: [
			    {
                  from: 0,
                  to: 0,
                  color: '#FFFFFF'
                },
                {
                  from: 1,
                  to: 4,
                  color: '#F1C40F'
                },
                {
                  from: 5,
                  to: 10,
                  color: '#3498DB'
                },
                {
                  from: 11,
                  to: 25,
                  color: '#28B463'
                },
                {
                  from: 26,
                  to: 100,
                  color: '#8E44AD'
                },
              ],
            },
        
          }
        },
        dataLabels: {
          enabled: true,
		  textAnchor: 'middle',
		  offsetX:0,
          style: {
            colors: ['#fff']
          }
        },
        xaxis: {
          axisBorder: { show: false },
	      type: 'category',
		  tickPlacement: 'between',
		  labels: {
          show: false}
        },
        title: {
          text: ''
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
</script>
	
	
