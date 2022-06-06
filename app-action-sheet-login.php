<?php 

echo"

<div class='modal fade action-sheet' id='LoginActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Login</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='app-index.php?id=". $idr . "' method='GET'>
						
						<div class='form-group basic'>
							<label class='label'>Password</label>
							<div class='input-group mb-2'>
								<input type='text' id='PasswordForm' name='PasswordForm' class='form-control form-control-lg' value=''>
							</div>
						</div>
						
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