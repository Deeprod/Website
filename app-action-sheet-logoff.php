<?php 

echo"

<div class='modal fade action-sheet' id='LogoffActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Logoff</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='app-index.php' method='GET'>
						
						<input type='hidden' id='LogoffForm' name='LogoffForm' value='LogoffForm'>
						
						<input type='hidden' id='id' name='id' value='". $idr . "'>
						
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