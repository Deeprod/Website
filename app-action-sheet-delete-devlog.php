<?php 

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error)   
	{ die("Connection failed: " . $conn->connect_error); }
	
$sql = "SELECT * FROM Tab_Devlog WHERE ID <> 1 ORDER BY id DESC";
$result = $conn->query($sql);

$x = 0;
if ($result->num_rows > 0) 
{	
	
	// output data of each row
	while($row = $result->fetch_assoc()) 
	{
		$x++;
		$Devlog_Text[$x] = $row["Log"];
		$Devlog_ID[$x]   = $row["ID"];
	}
} 
else 
{
	echo "0 results";
}
$conn->close();

$Devlog_Max = $x;

for ($i=1; $i<=$Devlog_Max; $i++)
{

	echo"

	<div class='modal fade action-sheet' id='DeleteDevLogActionSheet" .  $Devlog_ID[$i] . "' tabindex='-1' role='dialog'>
		
		<div class='modal-dialog' role='document'>
			
			<div class='modal-content'>
				
				<div class='modal-header'>
					<h5 class='modal-title'>Delete Devlog ID = " . $Devlog_ID[$i] . "</h5>
				</div>
				
				<div class='modal-body'>
				
					<div class='action-sheet-content'>
						
						<form action='_Query.php' method='GET'>
						
							<div class='form-group basic'>
								<label class='label' for='account1'>". $Devlog_Text[$i] ."</label>
							</div>
							
							<input type='hidden' id='HiddenForm' name='HiddenForm' value='DevlogDelete'>
							
							<input type='hidden' id='DeleteDevlogID' name='DeleteDevlogID' value='" . $Devlog_ID[$i] . "'>
							
							<div class='form-group basic'>
								<button type='submit' value='Submit' class='btn btn-primary btn-block btn-lg'>Submit</button>
							</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

	";

}
		
?>