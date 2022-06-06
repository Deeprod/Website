<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT 
				L.Director, L.Movies, L.Date, L.Year, L.Date_sort, L.Rating, R.Rating_Avg, R.Nb_Movies, R.PC
			FROM 
			  ( SELECT 
					*
					,CONCAT(SUBSTRING(Date, 7, 4),SUBSTRING(Date, 4, 2),SUBSTRING(Date, 1, 2)) AS Date_Sort 
				FROM 
					Tab_Movies
				WHERE
					Director in ('Guy Ritchie'
								,'Sam Mendes')) L

			LEFT JOIN

				(SELECT 
					DISTINCT(Director) AS Director
				    ,ROUND(SUM(Rating) / SUM(CASE WHEN Rating > 0 THEN 1 ELSE 0 END),1) AS Rating_Avg
				    ,SUM(CASE WHEN Rating > 0 THEN 1 ELSE 0 END) AS Nb_Movies
				    ,ROUND(100 * SUM(CASE WHEN Rating > 0 THEN 1 ELSE 0 END) / Count(*),0) As Pc
				FROM
					Tab_Movies
				GROUP BY
					Director) R
					
			ON 
				L.Director = R.Director

			ORDER BY 
				Director ASC, Year DESC";   

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
				$movies_array[$i][8] = $row["Rating_Avg"];
				$movies_array[$i][9] = $row["Nb_Movies"];
				$movies_array[$i][10] = $row["PC"];
				
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/* Old Style
	
	echo"
		<div class='section mt-4'>
			
			<div class='section-heading'>
				<h2 class='title'>Movies by Director</h2>
			</div>
			
			<div class='transactions'>
	";
	
	for ($x = 1; $x < $Nb_Movies; $x++) 
	{
	
		if ($x == 1 OR UpCaseFirstWords($movies_array[$x][5]) <> UpCaseFirstWords($movies_array[$x-1][5])) 
		{
			
			echo"<div class='listview-title mt-1'>". $movies_array[$x][5] ."</div>";
			
			echo"
				<div class='item bg-primary'>
					<div class='detail'>
						<div class='image-block imaged w48 h48 bg-light'>
							<strong class='text-light'>". $movies_array[$x][8] ."</strong>
						</div>
						<div>
							<strong class='text-light'>". $movies_array[$x][5] ."</strong>
							<p class='text-light'>". $movies_array[$x][9] ." movies</p>
						</div>
					</div>
					<div class='right'>
						<div class='price text-light'>". $movies_array[$x][10] ."%</div>
					</div>
				</div>
			
			";
		}
		
		echo"
			<div class='item'>
				<div class='detail'>
						<div class='image-block imaged w48 h48 " . RatingStyle($movies_array[$x][4]). "'>
							" . NoRating($movies_array[$x][4]) . "
						</div>
					<div>
						<strong>". UpCaseFirstWords($movies_array[$x][2]) ."</strong>
						
					</div>
				</div>
				<div class='right'>
					<div class='price text-danger'>". $movies_array[$x][3] ."</div>
				</div>
			</div>
		
		";
	}
	
	echo"
			</div>
		</div>
	";
	

Old Style */


	for ($x = 1; $x < $Nb_Movies; $x++) 
	{
	
		if ($x == 1 OR UpCaseFirstWords($movies_array[$x][5]) <> UpCaseFirstWords($movies_array[$x-1][5])) 
		{
			if ($x <> 1) 
			{ echo"
					</div>
				</div>";
			}
			
			echo"
			
				<div class='section full mt-4'>
					
					<div class='section-heading padding'>
					
						<h2 class='title'>". UpCaseFirstWords($movies_array[$x][5]) ."</h2>
						
						<!--<a href='app-bills.html' class='link'>View All</a>-->
						
					</div>
					
					<div class='carousel-multiple owl-carousel owl-theme shadowfix'>
	
			";
		}
		
		echo"
						<div class='item'>
						
							<div class='bill-box " . RatingStyle($movies_array[$x][4]). "'>
							
								<div class='img-wrapper'>
									<div class='iconbox bg-light'>
										" . NoRating($movies_array[$x][4]) . "
									</div>
								</div>
								
								<div class='price'>". UpCaseFirstWords($movies_array[$x][2]) ."</div>
								
								<p>". $movies_array[$x][3] ."</p>
								
								<!--<div class='btn btn-primary btn-block btn-sm'>Guy Ritchie</div>-->
								
							</div>
							
						</div>
		
		";
	}

echo "
					</div>
				</div>
";


				
?>