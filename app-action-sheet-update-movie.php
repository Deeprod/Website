<?php 

echo"

<div class='modal fade action-sheet' id='UpdateMovieActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Update Movie</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=MoviesUpdate' method='GET'>
					
						<div class='form-group basic'>
							<label class='label' for='account1'>Movie</label>
							<select class='form-control id='UpdateMoviesName' name='UpdateMoviesName' custom-select' id='account1'>";
							
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

								echo"

							</select>
						</div>

						<div class='form-group basic'>
							<label class='label'>Field</label>
							<div class='input-group mb-2'>
								<select class='form-control id='UpdateMoviesField' name='UpdateMoviesField' custom-select' id='account2'>
									<option>Date</option>
									<option>Year</option>
									<option>Rating</option>
									<option>Director</option>
								</select>
							</div>
						</div>
						
						<div class='form-group basic'>
							<label class='label'>Value</label>
							<div class='input-group mb-2'>
								<input type='text' id='UpdateMoviesValue' name='UpdateMoviesValue' class='form-control form-control-lg' value=''>
							</div>
						</div>
					
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='MoviesUpdate'>
						
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