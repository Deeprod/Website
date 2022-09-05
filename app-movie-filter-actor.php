<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql = "SELECT 
	             Actor
				,Count_Movie
				,Count_Movie_m
				,Rank
				,Rank_m
				,JKScore_Avg
				,JKScore_Hist
				,Movie_List
			FROM 
			    Tab_Actor";   

	$result = $conn->query($sql);

	$is_Actor = 1;
	$is_Count_Movie = 2;
	$is_Count_Movie_m = 3;
	$is_Rank = 4;
	$is_Rank_m = 5;
	$is_JKScore_Avg = 6;
	$is_JKScore_Hist = 7;
	$is_Movie_List = 8;
	
	$i = 1;
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if ($row["Actor"] != "")
			{	
				$actor_array[$i][$is_Actor]         = $row["Actor"];
				$actor_array[$i][$is_Count_Movie]   = $row["Count_Movie"];
				$actor_array[$i][$is_Count_Movie_m] = $row["Count_Movie_m"];
				$actor_array[$i][$is_Rank]    		= $row["Rank"];
				$actor_array[$i][$is_Rank_m]  		= $row["Rank_m"];
				$actor_array[$i][$is_JKScore_Avg]   = $row["JKScore_Avg"];
				$actor_array[$i][$is_JKScore_Hist]  = $row["JKScore_Hist"];
				$actor_array[$i][$is_Movie_List]    = $row["Movie_List"];
				
				$i++;
			}
		}
	} 
	else 
	{
		echo "0 results";
	}
	$Nb_Actor = $i;
	$conn->close();
	
	echo"
		<!-- All Actor -->
		<div class='section mt-4'>
			
			<div class='section-heading'>
				<h2 class='title'>All Actors</h2>
			</div>
			
			<div class='transactions'>
	";
	
	for ($x = 1; $x < $Nb_Actor; $x++) 
	{
	
		// if ($x == 1 OR $movies_array[$x][6] <> $movies_array[$x-1][6]) 
		if ($x == 1) 
		{
			echo"<div class='listview-title mt-1'>Top 10</div>";
		}
		
		$movie_array         = explode (",", $actor_array[$x][$is_Movie_List]);
		$movie_rating_array  = explode (", ", $actor_array[$x][$is_JKScore_Hist]);
		$movie_count_movie_m = $actor_array[$x][$is_Count_Movie_m];
		$Rank_mov = ($actor_array[$x][$is_Rank_m] + 0) - ($actor_array[$x][$is_Rank] + 0);
		
		$Movie_String = "";
		for ($c = 0; $c < count($movie_array); $c++) 
		{
			if ($c >= $movie_count_movie_m) { $Movie_String = $Movie_String . "<ion-icon name='arrow-redo-outline'></ion-icon>"; }
			$Movie_String = $Movie_String . $movie_array[$c] . " (" . $movie_rating_array[$c] . ") <br>";
		}

		// str_replace(",", "<br>", $actor_array[$x][5])
		// line-height:" . max($actor_array[$x][2] * 22, 48) . "px;
		
		
		
		
		//if($Rank_mov > 0)
		//{
			echo"
				<div class='item'>
					<div style='display         : flex;
								justify-content : flex-start;
								line-height     : 1.2em;'>
					
						<div style='margin-right  : 10px;
									padding-right : 8px;
									padding-left  : 8px;
									text-align    : center;
									line-height   : 35px;
									border-radius : 10px;
									width         : 24px;' 
									class='" . RatingStyle($actor_array[$x][$is_Count_Movie] + 2) . "'>
							" . $actor_array[$x][$is_Count_Movie] . "
						</div>
						
						<div>
							<strong style=' display       : block;
											font-weight   : 500;
											color         : #27173E;
											margin-bottom : 3px;'>
								". $x . ". ". $actor_array[$x][$is_Actor] ." (". $actor_array[$x][$is_JKScore_Avg] . ")" . "
							</strong>
							<p>". $Movie_String ."</p>
						</div>
					</div>
					<div class='right'>";
				
						

						if($Rank_mov == 0) 
						{ 
							echo "<div class='price text-six'><ion-icon name='reorder-two-outline'></ion-icon>" . "</div>" ;
						}
						if($Rank_mov > 0) 
						{ 
							echo "<div class='price text-eight'><ion-icon name='caret-up-outline'></ion-icon>". $Rank_mov . "</div>" ;
						}
						if($Rank_mov < 0) 
						{ 
							echo "<div class='price text-five'><ion-icon name='caret-down-outline'></ion-icon>". -$Rank_mov . "</div>" ;
						}
							
			echo"
					</div>
				</div>
			";
		//}
		
		
		
		
		
		
		
	}
	
	echo"
			</div>
		</div>
		<!-- * All Actor -->
	";
				
?>