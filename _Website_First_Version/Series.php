<!DOCTYPE html>
<html>

<?php
	$servername = "localhost"      ;
	$username   = "joxsrbmy_WPFE6" ;
	$password   = "qwe123QWE,./qq" ;
	$dbname     = "joxsrbmy_WPFE6" ;
?>

<head>
	<link rel="stylesheet" href="CSS.php" media="screen">

</head>

<body bgcolor="#fcfdfe">

<table>
	<tr>
		<td class='td_Title_Color'><button onClick="window.location.reload();">SERIES</button></td>
		<td class='td_Title'><a href="Movies.php">MOVIES</a></td>
		<td class='td_Title'><a href="Admin.php">ADMIN</a></td>
	</tr>
</table>

<br>

<div width=100%>&nbsp; WATCHING&nbsp; </div>
<p id='series1'></p>
<div width=100%>&nbsp; WAITING&nbsp; </div>
<p id='series2'></p>
<div width=100%>&nbsp; FINISHED&nbsp; </div>
<p id='series3'></p>
<div width=100%>&nbsp; ABORTED&nbsp; </div>
<p id='series4'></p>
<div width=100%>&nbsp; TO WATCH&nbsp; </div>
<p id='series5'></p>

<script>
	
var series = [

<?php
$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error)   
	{ die("Connection failed: " . $conn->connect_error); }
	
$sql = "SELECT * FROM Tab_Series";
$result = $conn->query($sql);
$firstline = "Yes";

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		if ($firstline == "No") { echo ","; }
        echo "\"" . $row["Series"]. "\",\"" . $row["J"]. "\"";
		$firstline = "No";
    }
} 
else 
{
    echo "0 results";
}
$conn->close();

?>

]

var text = "";
var text_W = "";
var text_T = "";
var text_A = "";
var text_S = "";
var text_N = "";
var i;
var break_tab = 10
var nb_series = (series.length-1)/2

for (j = 0; j < nb_series; j++) 
{ 
	text = "";
	series_txt = series[2*j+1]
	series_flag = series[2*j+1].substring(series_txt.length-1,series_txt.length)
	max_loop =  series_txt.substring(0,series_txt.length-1)

	text += "&nbsp;&nbsp;" + series[2*j].toUpperCase()
	text += "<table>"
	
	for (i = 1; i <= Math.max(max_loop,break_tab); i++)   //Math.max(max_loop,break_tab)
	{ 
	  if(i % break_tab == 1) 	{ text += "<tr>" }
									 
	  if(i > max_loop)  		{ text += "<td class='td_white'></td>"; } 
	  else if (i == max_loop) 	{ if      (series_flag == "A") { text += "<td class='td_red_dark'>"    + i + "</td>"; } 
								  else if (series_flag == "S") { text += "<td class='td_green_light'>" + i + "</td>"; }
								  else if (series_flag == "W") { text += "<td class='td_blue_dark'>"   + i + "</td>"; } 								  
								  else					       { text += "<td class='td_green_dark'>"  + i + "</td>"; } 
								}
	  else 						{ text += "<td class='td_green_light'>" + i + "</td>"; }
	  
	  if(i % break_tab == 0) 	{ text += "</tr>" }
	}
	
	text += "</table>"  
	if (series_flag == "W") {text_W += text}
	if (series_flag == "T") {text_T += text}
	if (series_flag == "A") {text_A += text}
	if (series_flag == "S") {text_S += text}
	if (series_flag == "N") {text_N += "&nbsp;&nbsp;" + series[2*j].toUpperCase() + "<BR>"}
}

document.getElementById("series1").innerHTML = text_W;
document.getElementById("series2").innerHTML = text_S;
document.getElementById("series3").innerHTML = text_T;
document.getElementById("series4").innerHTML = text_A;
document.getElementById("series5").innerHTML = text_N;

</script>

</body>
</html>
