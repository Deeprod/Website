<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
	$servername = "localhost"      ;
	$username   = "joxsrbmy_WPFE6" ;
	$password   = "qwe123QWE,./qq" ;
	$dbname     = "joxsrbmy_WPFE6" ;
?>

<?php
	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }

	$SelectSeries 		= $_GET['SelectSeries']		;
	$DeleteSeries 		= $_GET['DeleteSeries']		;
	$DeleteMovies 		= $_GET['DeleteMovies']		;
	
	$UpdateMoviesName 	= $_GET['UpdateMoviesName']	;
	$UpdateMoviesValue 	= $_GET['UpdateMoviesValue'];
	$UpdateMoviesField 	= $_GET['UpdateMoviesField'];
	
	$TextSeries 		= $_GET['TextSeries']		;
	$TextNewSeries 		= $_GET['TextNewSeries']	;
	$TextNewSeriesTag 	= $_GET['TextNewSeriesTag']	;
	$TextNewMovies 		= $_GET['TextNewMovies']	;
	$TextNewDate 		= $_GET['TextNewDate']		;
	$TextNewRating 		= $_GET['TextNewRating']	;
	$TextNewYear 		= $_GET['TextNewYear']		;
	$TextNewDirector 	= $_GET['TextNewDirector']	;
	$HiddenForm 		= $_GET['HiddenForm']		;
?>

<?php
	if ($HiddenForm == "SeriesUpdate")
	{
		$sql = 'UPDATE Tab_Series SET J=\'' . $TextSeries . '\' WHERE Series=\'' . $SelectSeries . '\'';
		$result = $conn->query($sql);	
		
		echo "<script>window.location.href = \"Series.php\"</script>";
	}

	elseif ($HiddenForm == "SeriesNew")
	{	
		$sql = 'INSERT INTO Tab_Series (Series, J) VALUES (\''. $TextNewSeries .'\',\''. $TextNewSeriesTag .'\')';  
		$result = $conn->query($sql);

		echo "<script>window.location.href = \"Series.php\"</script>";
	} 
	elseif ($HiddenForm == "SeriesDelete")
	{	
		$sql = 'DELETE FROM Tab_Series WHERE Series = \''.$DeleteSeries.'\'';
		$result = $conn->query($sql);

		echo "<script>window.location.href = \"Series.php\"</script>";
	}	
	elseif ($HiddenForm == "MoviesNew")
	{	
		$sql = 'INSERT INTO Tab_Movies(Movies, Date, Rating, Year, Director) VALUES (\''. $TextNewMovies .'\',\''. $TextNewDate .'\',\''. $TextNewRating .'\',\''. $TextNewYear .'\',\''. $TextNewDirector .'\')';  
		$result = $conn->query($sql);

		echo "<script>window.location.href = \"Movies.php\"</script>";
	}	
	elseif ($HiddenForm == "MoviesDelete")
	{	
		$sql = 'DELETE FROM Tab_Movies WHERE Movies = \''.$DeleteMovies.'\'';
		$result = $conn->query($sql);

		echo "<script>window.location.href = \"Movies.php\"</script>";
	}	
	elseif ($HiddenForm == "MoviesUpdate")
	{	
		$sql = 'UPDATE Tab_Movies SET ' . $UpdateMoviesField . '=\'' . $UpdateMoviesValue . '\' WHERE Movies = \'' . $UpdateMoviesName . '\'';
		$result = $conn->query($sql);
		
		echo $sql;
		
	}	
	else
	{
		echo "blablabla";
	}
?>

</body>
</html>