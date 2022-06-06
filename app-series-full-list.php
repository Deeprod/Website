<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT
				*
			FROM (
					SELECT 
						 CAST(SUBSTRING(J,1,LENGTH(J)-1) AS UNSIGNED) AS Season
						,CASE WHEN RIGHT(J,1) = \"T\" THEN 1
							  WHEN RIGHT(J,1) = \"S\" THEN 2
							  WHEN RIGHT(J,1) = \"W\" THEN 3
							  WHEN RIGHT(J,1) = \"A\" THEN 4
							ELSE 4 END AS Flag_Sort
						,RIGHT(J,1) AS Flag
						,Series
						,J 
						,Year
					FROM 
						Tab_Series
				  ) T
			ORDER BY
				Season DESC, Flag_Sort ASC";   

	$result = $conn->query($sql);

	$i = 1;
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if ($row["Series"] != "")
			{	
				$series_array[$i][1] = $row["Series"];
				$series_array[$i][2] = $row["Season"];
				$series_array[$i][3] = $row["Flag"];
				$series_array[$i][4] = $row["Year"];
				
				$i++;
			}
		}
	} 
	else 
	{
		echo "0 results";
	}
	$Nb_Series = $i;
	$conn->close();
	
	echo"
		<div class='section mt-4'>
			
			<div class='section-heading'>
				<h2 class='title'>All Series</h2>
			</div>
			
			<div class='transactions'>
	";
	
	for ($x = 1; $x < $Nb_Series; $x++) 
	{
		
		echo"
			<div class='item'>
				<div class='detail'>
						<div class='image-block imaged w48 h48 " . FlagToStyle($series_array[$x][3]) . "'>
							" . $series_array[$x][2] . "
						</div>
					<div>
						<strong>". UpCaseFirstWords($series_array[$x][1]) ."</strong>
						<p>". UpCaseFirstWords($series_array[$x][4]) ."</p>
					</div>
				</div>
				<div class='right'>
					<div class='price text-danger'></div>
				</div>
			</div>
		
		";
	}
	
	echo"
			</div>
		</div>
	";
				
?>