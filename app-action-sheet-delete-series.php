<?php 

echo"

<div class='modal fade action-sheet' id='DeleteSeriesActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Delete Series</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=SeriesDelete' method='GET'>
					
						<div class='form-group basic'>
							<label class='label' for='account1'>Series</label>
							<select class='form-control id='DeleteSeries' name='DeleteSeries' custom-select' id='account1'>";
							

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


echo"

							</select>
						</div>
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='SeriesDelete'>
						
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
		
?>