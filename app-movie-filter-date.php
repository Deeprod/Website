<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT * FROM 
				(SELECT 
					*
					,CONCAT(SUBSTRING(Date, 7, 4),SUBSTRING(Date, 4, 2),SUBSTRING(Date, 1, 2)) AS Date_Sort 
				FROM 
					Tab_Movies) T 
			WHERE
				Rating > 0
			ORDER BY 
				Date_Sort DESC";   

	$result = $conn->query($sql);

	$i = 1;
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if ($row["Movies"] != "")
			{	
				$movies_array[$i][1] = $row["Date"];
				$movies_array[$i][2] = $row["Movies"];
				$movies_array[$i][3] = $row["Year"];
				$movies_array[$i][4] = $row["Rating"];
				$movies_array[$i][5] = $row["Director"];
				$movies_array[$i][6] = explode('/',$movies_array[$i][1])[1];   	//Month
				$movies_array[$i][7] = explode('/',$movies_array[$i][1])[2];	//Year
				
				$i++;
			}
		}
	} 
	else 
	{
		echo "0 results";
	}
	$Nb_Movies = $i;
	$conn->close();
	
	echo"
		<!-- All Movies -->
		<div class='section mt-4'>
			
			<div class='section-heading'>
				<h2 class='title'>All Movies Watched</h2>
			</div>
			
			<div class='transactions'>
	";
	
	for ($x = 1; $x < $Nb_Movies; $x++) 
	{
	
		if ($x == 1 OR $movies_array[$x][6] <> $movies_array[$x-1][6]) 
		{
			
			echo"<div class='listview-title mt-1'>". Nb_to_Month($movies_array[$x][6]) . " " . $movies_array[$x][7] ."</div>";
		}
		
		echo"
			<div class='item'>
				<div class='detail'>
					<div class='image-block imaged w48 h48 " . RatingStyle($movies_array[$x][4]) . "'>
						" . $movies_array[$x][4] . "
					</div>
					<div style='width: calc(100% - 62px);'>
						<strong>". UpCaseFirstWords($movies_array[$x][2]) ."</strong>
						<p>". UpCaseFirstWords($movies_array[$x][5]) ."</p>
					</div>
				</div>
				<div class='right'>
					<div class='image-block imaged w48 h48 bg-white text-bold'>". $movies_array[$x][3] ."</div>
				</div>
					
			</div>
		
		";
	}
	
	echo"
			</div>
		</div>
		<!-- * All Movies -->
	";
				
?>