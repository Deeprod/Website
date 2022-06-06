<!DOCTYPE html>
<html>

<?php
	$servername = "localhost"      ;
	$username   = "joxsrbmy_WPFE6" ;
	$password   = "qwe123QWE,./qq" ;
	$dbname     = "joxsrbmy_WPFE6" ;
?>

<head>
<link rel="stylesheet" href="CSS.php">
<style type="text/css">

<?php
	$servername = "localhost"      ;
	$username   = "joxsrbmy_WPFE6" ;
	$password   = "qwe123QWE,./qq" ;
	$dbname     = "joxsrbmy_WPFE6" ;
?>

<?php 
	$Body_Fontsize	= 50	;
	$Border_Size	= 20	;
	$Box_Height		= 70	;
	$Title_Height	= 150	;
	$Title_Fontsize	= 60	;
	$Star_Size	    = 30	;
	$Form_Size      = 45    ;
?>
	
	html, body {
	  margin:0;
	  padding:0;
	  <?php echo "font-size:". $Body_Fontsize ."px;"  ?>
	}
	
	@font-face {
      font-family: myFirstFont;
	  src: url(Wildwood-Medium.otf);
	  }

	* {
      font-family: myFirstFont; }
	
	table {
	  border-collapse: collapse; 
	  width:100%;  }

	.td_green_light {
	  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
	  <?php echo "height:".$Box_Height."px;" ?>
	  background-color:rgb(198,224,180);
	  color:rgb(112,173,71);
	  font-size:30px;
	  width:30px;
	  text-align:center}

	.td_green_dark {
	  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
	  <?php echo "height:".$Box_Height."px;" ?>
	  background-color:rgb(112,173,71);
	  color:rgb(198,224,180);
	  font-size:30px;
	  width:30px;
	  text-align:center;
	  font-weight: bold;}

	.td_blue_dark {
	  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
	  <?php echo "height:".$Box_Height."px;" ?>
	  background-color:#0080ff;
	  color:#ffffff;
	  font-size:30px;
	  width:30px;
	  text-align:center;
	  font-weight: bold;}
	  
	.td_red_dark {
	  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
	  <?php echo "height:".$Box_Height."px;" ?>
	  background-color:#FF0000;
	  color:#ffe5e5;
	  font-size:30px;
	  width:30px;
	  text-align:center;
	  font-weight: bold;
	}
	  
	.td_white {
	  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
	  <?php echo "height:".$Box_Height."px;" ?>
	  width:30px;
	  background-color:#fcfdfe; 
	}
	  
	div {
	  width:100%
	  height:100%;
	  background-color:#F0F0F0;
	  font-size:60px;
	  padding:20px;	  
	}
	
	.td_Title {
	  <?php echo "height:".$Title_Height."px; " ?>
	  width:33%;
	  text-align:center;
	  <?php echo "font-size:".$Title_Fontsize."px;" ?>	 
	}
	  
	.td_Title_Color {
	  <?php echo "height:".$Title_Height."px; " ?>
	  width:34%;
	  text-align:center;
	  <?php echo "font-size:".$Title_Fontsize."px;" ?>
	  background-color:#F0F0F0;	  
	}
	
	.img_Full {
	  <?php echo "width:". $Star_Size ."px;"  ?>
	  <?php echo "height:". $Star_Size ."px;"  ?>
	}
  
	select {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	  width:300px;
	}
	
	input {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	  width:255px;
	}
	
	button {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	}

</style>
</head>

<body bgcolor="#fcfdfe">

<table>
	<tr>
		<td class='td_Title'><a href="Series.php">SERIES</a></td>
		<td class='td_Title'><a href="Movies.php">MOVIES</a></td>
		<td class='td_Title_Color'><button onClick="window.location.reload();">ADMIN</button></td>
	</tr>
</table>
<br>


<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- SERIES UPDATE BOX ------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->

<div width=100%>&nbsp; SERIES - UPDATE&nbsp; </div><br>

<form action="_Query.php" method="GET">
	<table>
		<tr>
			<td>
				&nbsp; Series
			</td>
			
			<td>	
				<select id="SelectSeries" name="SelectSeries">

					<?php
						$conn = new mysqli($servername, $username, $password, $dbname); 

						if ($conn->connect_error)   
							{ die("Connection failed: " . $conn->connect_error); }
							
						$sql = "SELECT * FROM Tab_Series ORDER BY Series ASC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) 
						{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo "<option>" . $row["Series"]. "</option>";
							}
						} 
						else 
						{
							echo "0 results";
						}
						$conn->close();
					?>

				</select> 									
			</td>
			
			<td>
			</td>
			
		</tr>
		
		<tr>	
			<td>
				&nbsp; Tag
			</td>
			
			<td>	
				<input type="text" id="TextSeries" name="TextSeries" value="">	
			</td>

			<td>
				<input type="hidden" id="HiddenForm" name="HiddenForm" value="SeriesUpdate">
				<input type="submit" value="Submit">
			</td>
			
		</tr>
		
	</table>
</form> 

<br>
<font style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;W - Watching<br>&nbsp;&nbsp;&nbsp;&nbsp;T - Terminated<br>&nbsp;&nbsp;&nbsp;&nbsp;A - Abandoned<br>&nbsp;&nbsp;&nbsp;&nbsp;S - Stopped<br>&nbsp;&nbsp;&nbsp;&nbsp;N - Not Started
<br>



<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- SERIES NEW BOX ---------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->



<br> <div width=100%>&nbsp; SERIES - NEW&nbsp; </div><br>
</font>


<form action="_Query.php?HiddenForm=SeriesUpdate" method="GET">
	&nbsp; Series
	<input type="text" id="TextNewSeries" name="TextNewSeries" value="">
	<br>
	&nbsp; Tag &nbsp;
	&nbsp; <input type="text" id="TextNewSeriesTag" name="TextNewSeriesTag" value="">
	<input type="hidden" id="HiddenForm" name="HiddenForm" value="SeriesNew">
	&nbsp; <input type="submit" value="Submit">
</form> 



<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- SERIES DELETE BOX ---------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->



<br> <div width=100%>&nbsp; SERIES - DELETE&nbsp; </div><br>

<form action="_Query.php?HiddenForm=SeriesDelete" method="GET">
	&nbsp; Series
	<select id="DeleteSeries" name="DeleteSeries">

		<?php
			$conn = new mysqli($servername, $username, $password, $dbname); 

			if ($conn->connect_error)   
				{ die("Connection failed: " . $conn->connect_error); }
				
			$sql = "SELECT * FROM Tab_Series ORDER BY Series ASC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{	
				echo "<option>--------</option>";
				
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<option>" . $row["Series"]. "</option>";
				}
			} 
			else 
			{
				echo "0 results";
			}
			$conn->close();
		?>

	</select>
	<input type="hidden" id="HiddenForm" name="HiddenForm" value="SeriesDelete">
	&nbsp; <input type="submit" value="Submit">
</form> 
<br> 


<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- MOVIES NEW BOX ---------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->


<div width=100%>&nbsp; MOVIES - NEW&nbsp; </div><br>

<form action="_Query.php?HiddenForm=MoviesNew" method="GET">

	<table>
	
		<tr>
			<td>
				&nbsp; Movie
			</td>
			<td>
				<input type="text" id="TextNewMovies" name="TextNewMovies" value="">
			</td>
			<td>
			</td>	
		</tr>
		
		<tr>
			<td>
				&nbsp; Date
			</td>
			<td>
				<input type="text" id="TextNewDate" name="TextNewDate" value="">
			</td>
			<td>
			</td>	
		</tr>
		
		<tr>
			<td>
				&nbsp; Rating
			</td>
			<td>
				<input type="text" id="TextNewRating" name="TextNewRating" value="">
			</td>
			<td>
			</td>	
		</tr>
		
		<tr>
			<td>
				&nbsp; Year
			</td>
			<td>
				<input type="text" id="TextNewYear" name="TextNewYear" value="">
			</td>
			<td>
			</td>	
		</tr>
		
		
		<tr>
			<td>
				&nbsp; Director
			</td>
			<td>
				<input type="text" id="TextNewDirector" name="TextNewDirector" value="">
			</td>
			<td>
				<input type="hidden" id="HiddenForm" name="HiddenForm" value="MoviesNew">
				<input type="submit" value="Submit">
			</td>	
		</tr>


	</table>
	
</form> 
<br> 



<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- MOVIES DELETE BOX ------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->

<div width=100%>&nbsp; MOVIES - DELETE&nbsp; </div><br>

<form action="_Query.php?HiddenForm=MoviesDelete" method="GET">
	&nbsp; Movies
	<select id="DeleteMovies" name="DeleteMovies">

		<?php
			$conn = new mysqli($servername, $username, $password, $dbname); 

			if ($conn->connect_error)   
				{ die("Connection failed: " . $conn->connect_error); }
				
			$sql = "SELECT * FROM Tab_Movies ORDER BY Movies ASC";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{	
				echo "<option>--------</option>";
				
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<option>" . $row["Movies"]. "</option>";
				}
			} 
			else 
			{
				echo "0 results";
			}
			$conn->close();
		?>

	</select>
	<input type="hidden" id="HiddenForm" name="HiddenForm" value="MoviesDelete">
	&nbsp; <input type="submit" value="Submit">
</form> 
<br> 


<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!-- MOVIES UPDATE BOX     --------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->

<div width=100%>&nbsp; MOVIES - UPDATE&nbsp; </div><br>

<form action="_Query.php?HiddenForm=MoviesUpdate" method="GET">
	
	<table>
		<tr>
			<td>&nbsp; Field
			</td>
			<td>
				<select id="UpdateMoviesField" name="UpdateMoviesField">
					<option>Date</option>
					<option>Year</option>
					<option>Rating</option>
					<option>Director</option>
				</select>
			</td>	
			<td>
			</td>
		</tr>
		
		<tr>
			<td>&nbsp; Movies
			</td>
			<td>
				<select id="UpdateMoviesName" name="UpdateMoviesName">

					<?php
						$conn = new mysqli($servername, $username, $password, $dbname); 

						if ($conn->connect_error)   
							{ die("Connection failed: " . $conn->connect_error); }
							
						$sql = "SELECT * FROM Tab_Movies ORDER BY Movies ASC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) 
						{	
							echo "<option>--------</option>";
							
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo "<option>" . $row["Movies"]. "</option>";
							}
						} 
						else 
						{
							echo "0 results";
						}
						$conn->close();
					?>

				</select>
			</td>
			<td>	
			</td>
		</tr>

		<tr>
			<td>&nbsp; Value
			</td>
			<td>
				<input type="text" id="UpdateMoviesValue" name="UpdateMoviesValue" value="">
			</td>
			<td>	
				<input type="hidden" id="HiddenForm" name="HiddenForm" value="MoviesUpdate">
				<input type="submit" value="Submit">
			</td>
		</tr>
		
	</table>

</form> 

<br>
<br>
<br>
			
</body>
</html>
