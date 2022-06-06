<!DOCTYPE html>
<html>

<?php
	$servername = "localhost"      ;
	$username   = "joxsrbmy_WPFE6" ;
	$password   = "qwe123QWE,./qq" ;
	$dbname     = "joxsrbmy_WPFE6" ;
?>

<?php 
	$Body_Fontsize	  = 25	;
	$Border_Size	  = 20	;
	$Box_Height		  = 70	;
	$Title_Height	  = 150	;
	$Title_Fontsize	  = 60	;
	$Star_Size	      = 40	;
	$Star_Size_Small  = 20	;
	$Form_Size        = 35  ;
?>
	
<?php 
	$Filter = $_GET['FilterGET'];
?>

<head>

<style type="text/css">

	html, body {
	  margin:0;
	  padding:0;
	  <?php echo "font-size:". $Body_Fontsize ."px;"  ?>
	}
	
	@font-face {
	  font-family: myFirstFont;
	  <?php 
	  
	  $Random = mt_rand(1, 5);
	  if ($Random == 1) { $FontUrl = "Wildwood-Medium.otf"; }
	  if ($Random == 2) { $FontUrl = "AkufadhlRoladeThin.otf"; }
	  if ($Random == 3) { $FontUrl = "geomanist-regular-webfont.woff"; }
	  if ($Random == 4) { $FontUrl = "Matchstick-Regular.woff"; }
	  if ($Random == 5) { $FontUrl = "jaapokki-regular.woff"; }
	  
	  $FontUrl = "Wildwood-Medium.otf";
	  echo "src: url(". $FontUrl .");" ?>
	}

	* {
      font-family: myFirstFont; }
	
	table {
	  border-collapse: collapse; 
	  width:100%;  }
	  
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
	
	.td_stats {
		width:50px;
		text-align:center;
		height:50px;
	}
	
	.img_Full {
	  <?php echo "width:". $Star_Size ."px;"  ?>
	  <?php echo "height:". $Star_Size ."px;"  ?>
	}
	
	.img_Small {
	  <?php echo "width:". $Star_Size_Small ."px;"  ?>
	  <?php echo "height:". $Star_Size_Small ."px;"  ?>
	}

	button {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	}
	
	select {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	  width:200px;
	}
	input {
	  <?php echo "font-size: ". $Form_Size ."px;"  ?>
	  width:255px;
	}

</style>
</head>
<body bgcolor="#fcfdfe">


<!----------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------ HEADER ----------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------->


<table>
	<tr>
		<td class='td_Title'><a href="Series.php">SERIES</a></td>
		<td class='td_Title_Color'><button onClick="window.location.href='Movies.php'">MOVIES</button></td>
		<td class='td_Title'><a href="Admin.php">ADMIN</a></td>
	</tr>
</table>

<br>


<!----------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------ FILTERS ---------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------->


<div width=100%>
	<table>
		<tr>
		<td>&nbsp; FILTERS&nbsp;</td>
		<td>
	<form action="Movies.php?FilterGET=FilterGET" method="GET">
		<select id="FilterGET" name="FilterGET">

			<option></option>
			<option>0 Star</option>
			<option>1 Star</option>
			<option>2 Stars</option>
			<option>3 Stars</option>
			<option>4 Stars</option>
			<option>5 Stars</option>
			<option></option>
			
			<?php
			
			for ($i = 1960; $i <= 2020; $i++) 
			{
				echo "<option>" . $i . "</option>";
			}
			
			?>
			
		</select>
		
		<input type="submit" value="Submit">
		
	</form> 
	</td>
	</tr>
	</table>
</div>



<!----------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------ WATCHED ---------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------->


<br><div width=100%>&nbsp; WATCHED&nbsp; <?php if ($Filter != "") { echo "(" . $Filter . ")"; } ?></div>
<p id='movies1'></p>


<script>


var movies = [	
<?php

$servername = "localhost";
$username = "joxsrbmy_WPFE6";
$password = "qwe123QWE,./qq";
$dbname = "joxsrbmy_WPFE6";
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
			1 = 1
		";

if ($Filter != "") 
	{  
		if ($Filter == "5 Stars") { $sql .= "AND Rating = 10"; }
		if ($Filter == "4 Stars") { $sql .= "AND Rating = 9"; }
		if ($Filter == "3 Stars") { $sql .= "AND Rating = 8"; }
		if ($Filter == "2 Stars") { $sql .= "AND Rating = 7"; }
		if ($Filter == "1 Star")  { $sql .= "AND Rating = 6"; }
		if ($Filter == "0 Star")  { $sql .= "AND Rating = 5"; }
		
		if ($Filter >= 1960) 	  { $sql .= "AND Year = " . $Filter. ""; }
 
	}
	
$sql .= "
		 ORDER BY 
			Date_Sort DESC";   

$result = $conn->query($sql);
$firstline = "Yes";

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		if ($row["Movies"] != "")
		{
			if ($firstline == "No") { echo ","; }
			echo "\"" . $row["Date"]. "\",\"" . $row["Movies"]. "\",\"" . $row["Year"]. "\",\"" . $row["Rating"]. "\",\"" . $row["Director"]. "\"";
			$firstline = "No";
			
									   $Year_Array[$row["Year"]]    = $Year_Array[$row["Year"]] + 1;
			if ($row["Rating"] == 9) { $Year_4S_Array[$row["Year"]] = $Year_4S_Array[$row["Year"]] + 1; }
			if ($row["Rating"] == 8) { $Year_3S_Array[$row["Year"]] = $Year_3S_Array[$row["Year"]] + 1; }
			if ($row["Rating"] == 7) { $Year_2S_Array[$row["Year"]] = $Year_2S_Array[$row["Year"]] + 1; }
			if ($row["Rating"] == 6) { $Year_1S_Array[$row["Year"]] = $Year_1S_Array[$row["Year"]] + 1; }
			if ($row["Rating"] <= 5) { $Year_0S_Array[$row["Year"]] = $Year_0S_Array[$row["Year"]] + 1; }
			
		}
    }
} 
else 
{
    echo "0 results";
}
$conn->close();

?>
];

var text = "";
var i;
var nb_movies = (movies.length)/5

//window.alert(nb_movies);

text += "<table>"
	
for (j = 0; j < nb_movies; j++) 
{ 
	text += "<tr>"
	
	movies_date = movies[5*j]
	movies_name = movies[5*j+1]
	movies_year = movies[5*j+2]
	movies_rating = movies[5*j+3]
	movies_director = movies[5*j+4]

	text += "<td height='80' style='border-bottom: 1px solid LightGray';>&nbsp;&nbsp;"
	text += movies_date.toUpperCase()
	text += "</td><td style='border-bottom: 1px solid LightGray';>"
	text += movies_name.toUpperCase()
	text += "<span style='color:rgb(200,200,200);'><br>";
	text += movies_director
	text += "</span>"
	text += "</td><td style='border-bottom: 1px solid LightGray';>"
	text += movies_year.toUpperCase()
	text += "</td><td style='border-bottom: 1px solid LightGray';>"
	
	for (k = 6; k <=10; k++) 
    {   
	    if (movies_rating >= k)
		{
		text += "<img src='img/img_Star2.png' class='img_Full'>" //text += movies_rating.toUpperCase()	
		}

	}
	//text += "</td><td>"
	//text += movies_name.toUpperCase()
	text += "</td>"
	text += "</tr>"
}

text += "</table>"

document.getElementById("movies1").innerHTML = text;


</script>
   
   
<br><div width=100%>&nbsp; STATS&nbsp; </div>
<br>

<table>



	<tr>
		<td class='td_stats'>Year
		</td>

		<td class='td_stats'>Total
		</td>
		
		<td class='td_stats'>-
		</td>
		
		<td class='td_stats'><img src='img/img_Star2.png' class='img_Small'>
		</td>
		
		<td class='td_stats'><img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
		</td>
		
		<td class='td_stats'><img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
		</td>
		
		<td class='td_stats'><img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
							 <img src='img/img_Star2.png' class='img_Small'>
		</td>
	</tr>
	

<?php 

for ($j = 2020; $j > 1960; $j--) 
{

	echo"
	<tr>
		<td class='td_stats'>" . $j . "
		</td>

		<td class='td_stats'>". $Year_Array[$j] . "
		</td>
		
		<td class='td_stats'>". $Year_0S_Array[$j] . "
		</td>
		
		<td class='td_stats'>". $Year_1S_Array[$j] . "
		</td>
		
		<td class='td_stats'>". $Year_2S_Array[$j] . "
		</td>
		
		<td class='td_stats'>". $Year_3S_Array[$j] . "
		</td>
		
		<td class='td_stats'>". $Year_4S_Array[$j] . "
		</td>
	</tr>";
	
}



?>
	
</table>

<br>
<br>
<br>

  
</body>
</html>
