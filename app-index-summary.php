<?php 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	if ($conn->connect_error)   
		{ die("Connection failed: " . $conn->connect_error); }
		
	$sql  = "SELECT COUNT(*) AS Count FROM Tab_Series";  
	
	$sql2 = "SELECT SUM(CASE WHEN Rating > 0 THEN 1 ELSE 0 END) AS Count FROM Tab_Movies";  
	
	$sql3 = "SELECT
				SUM(Season) + SUM(Season_Adj) As Count
			FROM (
				SELECT 
					 CAST(SUBSTRING(J,1,LENGTH(J)-1) AS UNSIGNED) AS Season
					,CASE WHEN RIGHT(J,1) = \"T\" THEN 0
						  WHEN RIGHT(J,1) = \"S\" THEN 0
						  WHEN RIGHT(J,1) = \"W\" THEN -1
						  WHEN RIGHT(J,1) = \"A\" THEN -1
						ELSE 0 END AS Season_Adj
				FROM 
					Tab_Series
				  ) T"; 
				  
	$sql4 = "SELECT
				SUM(Season) As Count
			FROM (
				SELECT 
					CASE WHEN RIGHT(J,1) = \"T\" THEN 1
						 WHEN RIGHT(J,1) = \"S\" THEN 0
						 WHEN RIGHT(J,1) = \"W\" THEN 0
						 WHEN RIGHT(J,1) = \"A\" THEN 0
						ELSE 0 END AS Season
				FROM 
					Tab_Series
				  ) T"; 
				  
	$sql5 = "SELECT ROUND(SUM(Rating) / SUM(CASE WHEN Rating > 0 THEN 1 ELSE 0 END),2) AS Count FROM Tab_Movies"; 				  

	$sql6 = "SELECT SUM(CASE WHEN Rating = 9 THEN 1 ELSE 0 END) AS Count FROM Tab_Movies"; 				
				  
	$result  = $conn->query($sql );
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
	$result4 = $conn->query($sql4);
	$result5 = $conn->query($sql5);
	$result6 = $conn->query($sql6);
	
	if ($result ->num_rows > 0) { while($row  = $result ->fetch_assoc()) { $NbSeries  = $row["Count"]  ;}} else { echo "0 results"; }
	if ($result2->num_rows > 0) { while($row2 = $result2->fetch_assoc()) { $NbMovies  = $row2["Count"] ;}} else { echo "0 results"; }
	if ($result3->num_rows > 0) { while($row3 = $result3->fetch_assoc()) { $NbSeasons = $row3["Count"] ;}} else { echo "0 results"; }
	if ($result4->num_rows > 0) { while($row4 = $result4->fetch_assoc()) { $NbComp    = $row4["Count"] ;}} else { echo "0 results"; }
	if ($result5->num_rows > 0) { while($row5 = $result5->fetch_assoc()) { $NbRatAvg  = $row5["Count"] ;}} else { echo "0 results"; }
	if ($result6->num_rows > 0) { while($row6 = $result6->fetch_assoc()) { $Nb5Star   = $row6["Count"] ;}} else { echo "0 results"; }
	
	$conn->close();
	
?>

<?php

echo"
	<style>
		.wallet-card-section {
		  position: relative;
		}

		.wallet-card-section:before {
		  position: absolute;
		  left: 0;
		  right: 0;
		  top: 0;
		  content: '';
		  display: block;
		  height: 140px;
		  background: #6236FF;
		}

		.wallet-card {
		  background: #ffffff;
		  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.09);
		  border-radius: 10px;
		  padding: 20px 24px;
		  position: relative;
		  z-index: 1;
		}

		.wallet-card .balance {
		  display: flex;
		  align-items: center;
		  justify-content: space-between;
		  margin-bottom: 10px;
		  height: 100px;
		}

		.wallet-card .balance .left {
		  padding-right: 10px;
		}

		.wallet-card .wallet-footer {
		  border-top: 1px solid #DCDCE9;
		  padding-top: 20px;
		  display: flex;
		  align-items: flex-start;
		  justify-content: space-between;
		}

		.wallet-card .wallet-footer .item {
		  flex: 1;
		  text-align: center;
		}

		.wallet-card .wallet-footer .item .icon-wrapper {
		  background: #6236FF;
		  width: 60px;
		  height: 60px;
		  display: inline-flex;
		  align-items: center;
		  justify-content: center;
		  border-radius: 10px;
		  color: #fff;
		  font-size: 24px;
		  margin-bottom: 14px;
		}

		.wallet-card .wallet-footer .item strong {
		  display: block;
		  color: #27173E;
		  font-weight: 500;
		  font-size: 11px;
		  line-height: 1.2em;
		}
	</style>
	
	<div class='section wallet-card-section pt-1'>
		<div class='wallet-card'>
		
			<div class='balance'>
				<div class='left'>
					<h1 class='value text-primary'>". $NbMovies ." Movies</h1>
					<h1 class='value text-primary'>". $NbSeries ." Series</h1>
				</div>
			</div>
			
			<div class='wallet-footer'>
				<div class='item'>
					<div>
						<div class='icon-wrapper bg-danger'>
							". $NbSeasons ."
						</div>
						<strong>Seasons</strong>
					</div>
				</div>
				<div class='item'>
					<div>
						<div class='icon-wrapper'>
							". $Nb5Star ."
						</div>
						<strong>9/10</strong>
					</div>
				</div>
				<div class='item'>
					<div>
						<div class='icon-wrapper bg-success'>
							". $NbComp ."
						</div>
						<strong>Completed</strong>
					</div>
				</div>
				<div class='item'>
					<div>
						<div class='icon-wrapper bg-warning'>
							". $NbRatAvg ."
						</div>
						<strong>~Rating</strong>
					</div>
				</div>
			</div>

		</div>
	</div>
	
";

?>	