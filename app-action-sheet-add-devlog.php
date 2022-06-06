<?php 

echo"

<div class='modal fade action-sheet' id='AddDevLogActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Add Devlog</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=DevlogNew' method='GET'>
					
						<div class='form-group basic'>
						
							<label class='label'>New Devlog Content</label>
							
							<div class='input-group mb-2'>
								<input type='text' id='TextNewDevlog' name='TextNewDevlog' class='form-control form-control-lg' value=''>
							</div>
							
						</div>
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='DevlogNew'>
						
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