<?php

echo"

<style>

	.lastmovies .item {
	  background: #ffffff;
	  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.09);
	  border-radius: 10px;
	  padding: 5px 6px;
	  margin-bottom: 5px;
	  display: flex;
	  align-items: center;
	  justify-content: space-between;
	}

	.lastmovies .item:last-child {
	  margin-bottom: 0;
	}

	.lastmovies .item .detail {
	  display: flex;
	  align-items: center;
	  justify-content: flex-start;
	  line-height: 1.2em;
	}

	.lastmovies .item .detail .image-block {
	  margin-right: 8px;
	  text-align: center;
	  line-height: 24px;
	}

	.lastmovies .item .detail strong {
	  display: block;
	  font-weight: 500;
	  color: #27173E;
	  margin-bottom: 0px;
	}

	.lastmovies .item .right {
	  padding-left: 10px;
	}

</style>


<div class='section mt-4'>
	
	<div class='section-heading'>
		<h2 class='title'>Last 10 Movies</h2>
	</div>
	
	<div class='lastmovies'>
";

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error)   
	{ die("Connection failed: " . $conn->connect_error); }
	
$sql = "SELECT * FROM 
			(SELECT 
				*
				,CONCAT(SUBSTRING(Date, 7, 4),SUBSTRING(Date, 4, 2),SUBSTRING(Date, 1, 2)) AS Date_Sort 
			FROM 
				Tab_Movies) T 
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

$conn->close();
$Nb_Movies = $i;

for ($x = 1; $x <= 10; $x++) 
{
	if ($movies_array[$x][5] <> "") { $logged =  "<ion-icon name='checkbox-outline'></ion-icon> "; } else { $logged = ""; }
	
	echo"
		<div class='item'>
			<div class='detail'>
				<div class='image-block imaged w24 h24  " . RatingStyle($movies_array[$x][4]) . "'>
					" . $movies_array[$x][4] . "
				</div>
				<div>
					<strong>" . $logged . UpCaseFirstWords($movies_array[$x][2]) . "</strong>
				</div>
			</div>
			<div class='right'>
				<div>". $movies_array[$x][3] ."</div>
			</div>
		</div>

	";
}
		
echo"
	
	</div>

</div>
";

?>