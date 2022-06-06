<?php 
	$idr = rand(1,9999999999);
?>

<!DOCTYPE html>
<html>
<head>

	<?php

		if ($_COOKIE["Admin"] != "aaa" AND $_COOKIE["Admin"] != "bbb")
		{
			echo "<meta http-equiv='refresh' content='3;url=app-index.php?" . $idr ."' />";
		}

	?>	


</head>
<body>

<?php

	if ($_COOKIE["Admin"] != "aaa" AND $_COOKIE["Admin"] != "bbb")
	{
		echo "You are not admin, redirect in 3 seconds.";
	}
	else
	{
		include("app-loader.php"); 
		include("app-mysql-conn.php");
		include("app-sql-functions.php");

		$conn = new mysqli($servername, $username, $password, $dbname); 

		if ($conn->connect_error)   
			{ die("Connection failed: " . $conn->connect_error); }
		
		$HiddenForm = $_GET['HiddenForm'];

		function redirect_page($page)
		{
			echo "<script>window.location.href = \"". $page ."\"</script>";
		}

		if ($HiddenForm == "SeriesUpdate")
		{
			$UpdateSeriesName 	= $_GET['UpdateSeriesName']	;
			$UpdateSeriesValue 	= $_GET['UpdateSeriesValue'];
			$UpdateSeriesField 	= $_GET['UpdateSeriesField'];
			
			$sql = 'UPDATE Tab_Series SET ' . $UpdateSeriesField . '=\'' . $UpdateSeriesValue . '\' WHERE Series = \'' . $UpdateSeriesName . '\'';
			$result = $conn->query($sql);	
			
			$conn->close();
			
			redirect_page("app-series.php?" . $idr);
		}

		elseif ($HiddenForm == "SeriesNew")
		{	
			$TextNewSeries 		= $_GET['TextNewSeries']	;
			$TextNewSeriesTag 	= $_GET['TextNewSeriesTag']	;
			
			$sql = 'INSERT INTO Tab_Series (Series, J) VALUES (\''. $TextNewSeries .'\',\''. $TextNewSeriesTag .'\')';  
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-series.php?" . $idr);
		} 
		
		elseif ($HiddenForm == "SeriesDelete")
		{	
			$DeleteSeries 		= $_GET['DeleteSeries']	;
			
			$sql = 'DELETE FROM Tab_Series WHERE Series = \''.$DeleteSeries.'\'';
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-series.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "MoviesNew")
		{	
			$TextNewMovies 		= $_GET['TextNewMovies']	;
			$TextNewDate 		= $_GET['TextNewDate']		;
			$TextNewRating 		= $_GET['TextNewRating']	;
			$TextNewYear 		= $_GET['TextNewYear']		;
			$TextNewDirector 	= ""                    	;
		
			$sql = 'INSERT INTO 
						Tab_Movies(Movies, Date, Rating, Year, Director) 
					VALUES 
						(\''. UpCaseFirstWords($TextNewMovies) .'\',\''. $TextNewDate .'\',\''. $TextNewRating .'\',\''. $TextNewYear .'\',\''. UpCaseFirstWords($TextNewDirector) .'\')';  
						
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-movies.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "MoviesDelete")
		{	
			$DeleteMovies = $_GET['DeleteMovies'];
			
			$sql = 'DELETE FROM 
						Tab_Movies 
					WHERE 
						Movies = \''.$DeleteMovies.'\'';
						
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-movies.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "MoviesUpdate")
		{	
			$UpdateMoviesName 	= $_GET['UpdateMoviesName']	;
			$UpdateMoviesValue 	= $_GET['UpdateMoviesValue'];
			$UpdateMoviesField 	= $_GET['UpdateMoviesField'];
		
			$sql = 'UPDATE Tab_Movies SET ' . $UpdateMoviesField . '=\'' . $UpdateMoviesValue . '\' WHERE Movies = \'' . $UpdateMoviesName . '\'';
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-movies.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "DevlogNew")
		{	
			$TextNewDevlog = $_GET['TextNewDevlog'];
			
			$sql = 'INSERT INTO 
						Tab_Devlog(Log) 
					VALUES 
						(\''. UpCaseFirstWords($TextNewDevlog) .'\')';  
						
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-index.php?" . $idr);
		}	

		elseif ($HiddenForm == "DevlogDelete")
		{	
			$DeleteDevlogID 	= $_GET['DeleteDevlogID'];
			
			$sql = 'DELETE FROM 
						Tab_Devlog
					WHERE 
						ID = \''.$DeleteDevlogID.'\'';
						
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-index.php?" . $idr);
		}	

		elseif ($HiddenForm == "LogMeal")
		{	
			$LogMealCook 		= $_GET['LogMealCook'];
			$LogMealWheel1 		= $_GET['LogMealWheel1'];
			$LogMealWheel2 		= $_GET['LogMealWheel2'];
			$LogMealFreeForm 	= $_GET['LogMealFreeForm'];
			$LogMealDate 		= $_GET['LogMealDate'];
			
			if ($LogMealFreeForm != "")
				{ $MealInput = $LogMealFreeForm; }
			elseif($LogMealWheel1 != "")
				{ $MealInput = $LogMealWheel1; }
			else
				{ $MealInput = $LogMealWheel2; }
			
			$sql = 'UPDATE 
						Tab_Meal 
					SET 
						Meal = \''.$MealInput.'\', 
						Cook = \''.$LogMealCook.'\' 
					WHERE 
						Date = \''.$LogMealDate.'\'';
					
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-food.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "AddMeal")
		{	
			$AddMealFreeForm 	= $_GET['AddMealFreeForm'];
			$LogMealWheel1 		= $_GET['AddMealWheel1'];
			$LogMealWheel2 		= $_GET['AddMealWheel2'];
			
			$sql = 'INSERT INTO 
						Tab_Food(Food, Category1, Category2) 
					VALUES 
						(\''. UpCaseFirstWords($AddMealFreeForm) .'\',\''. $LogMealWheel1 .'\',\''. $LogMealWheel2 .'\')';  
					
					
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-food.php?" . $idr);
		}	
		
		elseif ($HiddenForm == "MealDelete")
		{	
			$DeleteMeal		= $_GET['DeleteMeal']	;
			
			$sql = 'DELETE FROM Tab_Food WHERE Food = \''.$DeleteMeal.'\'';
			$result = $conn->query($sql);
			
			$conn->close();
			
			redirect_page("app-food.php?" . $idr);
		}	
		
		else
		{
			echo "blablabla";
		}
	
	}
?>

<?php 
	include("app-scripts.php"); 
?>

</body>
</html>