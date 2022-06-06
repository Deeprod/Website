<?php 

echo"

<div class='modal fade action-sheet' id='AddMealActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Add Meal</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=AddMeal' method='GET'>
					
						<div class='form-group basic'>
							<label class='label'>Meal</label>
							<div class='input-group mb-2'>
								<input type='text' id='AddMealFreeForm' name='AddMealFreeForm' class='form-control form-control-lg' value=''>
							</div>
						</div>

						<div class='row'>
						
							<div class='col-6'>
								<div class='form-group basic'>
									<div class='input-wrapper'>
										
										<div class='form-group basic'>
											<label class='label' for='account1'>Meal (Wheel #1)</label>
											<select class='form-control id='AddMealWheel1' name='AddMealWheel1' custom-select' id='account1'>";
											
												$conn = new mysqli($servername, $username, $password, $dbname); 

												if ($conn->connect_error)   
													{ die("Connection failed: " . $conn->connect_error); }
													
												$sql = "SELECT DISTINCT(Category1) AS Food FROM Tab_Food ORDER BY Category1 ASC";
												$result = $conn->query($sql);
												
												$Cat1 = "";
												$Cat2 = "";
												
												echo "<option> </option>";
												
												if ($result->num_rows > 0) 
												{			
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														echo "<option>" . $row["Food"] . "</option>";
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
										
										
									</div>
								</div>
							</div>
							
							<div class='col-6'>
								<div class='form-group basic'>
									<div class='input-wrapper'>
								
										
										<div class='form-group basic'>
											<label class='label' for='account1'>Meal (Wheel #2)</label>
											<select class='form-control id='AddMealWheel2' name='AddMealWheel2' custom-select' id='account1'>";
											
												$conn = new mysqli($servername, $username, $password, $dbname); 

												if ($conn->connect_error)   
													{ die("Connection failed: " . $conn->connect_error); }
													
												$sql = "SELECT DISTINCT(Category2) AS Food FROM Tab_Food ORDER BY Category2 ASC";
												$result = $conn->query($sql);
												
												$Cat1 = "";
												$Cat2 = "";
												
												echo "<option> </option>";
												
												if ($result->num_rows > 0) 
												{			
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														echo "<option>" . $row["Food"] . "</option>";
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
										
									</div>
								</div>
							</div>
							
						</div>
						
						
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='AddMeal'>
						
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