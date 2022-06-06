<?php 

echo"

<div class='modal fade action-sheet' id='LogMealActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Log Meal</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=LogMeal' method='GET'>
					
						<div class='form-group basic'>
							<label class='label'>Meal (Free Form)</label>
							<div class='input-group mb-2'>
								<input type='text' id='LogMealFreeForm' name='LogMealFreeForm' class='form-control form-control-lg' value=''>
							</div>
						</div>

						<div class='row'>
						
							<div class='col-6'>
								<div class='form-group basic'>
									<div class='input-wrapper'>
										
										
										
										<div class='form-group basic'>
											<label class='label' for='account1'>Meal (Wheel #1)</label>
											<select class='form-control id='LogMealWheel1' name='LogMealWheel1' custom-select' id='account1'>";
											
												$conn = new mysqli($servername, $username, $password, $dbname); 

												if ($conn->connect_error)   
													{ die("Connection failed: " . $conn->connect_error); }
													
												$sql = "SELECT * FROM Tab_Food ORDER BY Category1 ASC, Food ASC";
												$result = $conn->query($sql);
												
												$Cat1 = "";
												$Cat2 = "";
												
												echo "<option> </option>";
												
												if ($result->num_rows > 0) 
												{			
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														if ($row["Category1"] != $Cat1) { echo "<option> *** " . $row["Category1"] . " *** </option>"; }
														echo "<option>" . $row["Food"] . "</option>";
														
														$Cat1 = $row["Category1"];
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
											<select class='form-control id='LogMealWheel2' name='LogMealWheel2' custom-select' id='account1'>";
											
												$conn = new mysqli($servername, $username, $password, $dbname); 

												if ($conn->connect_error)   
													{ die("Connection failed: " . $conn->connect_error); }
													
												$sql = "SELECT * FROM Tab_Food ORDER BY Category2 ASC, Food ASC";
												$result = $conn->query($sql);
												
												$Cat1 = "";
												$Cat2 = "";
												
												echo "<option> </option>";
												
												if ($result->num_rows > 0) 
												{			
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														if ($row["Category2"] != $Cat2) { echo "<option> *** " . $row["Category2"] . " *** </option>"; }
														echo "<option>" . $row["Food"] . "</option>";
														
														$Cat2 = $row["Category2"];
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
						
						
						<div class='form-group basic'>
							<div class='input-group mb-2'>
								
								<div class='form-group basic'>
									<label class='label' for='account1'>Cook</label>
									<select class='form-control id='LogMealCook' name='LogMealCook' custom-select' id='account1'>
										<option>K</option>
										<option>J</option>
										<option>Takeaway</option>
									</select>
								</div>
													
							</div>
						</div>
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='LogMeal'>
						
						<input type='hidden' id='LogMealDate' name='LogMealDate' value='TBD'>
						
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