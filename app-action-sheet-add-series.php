<?php 

echo"

<div class='modal fade action-sheet' id='AddSeriesActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Add Series</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=SeriesNew' method='GET'>
					
						<div class='form-group basic'>
							<label class='label'>Series</label>
							<div class='input-group mb-2'>
								<input type='text' id='TextNewSeries' name='TextNewSeries' class='form-control form-control-lg' value=''>
							</div>
						</div>

						<div class='form-group basic'>
							<label class='label'>Tag</label>
							<div class='input-group mb-2'>
								<input type='text' id='TextNewSeriesTag' name='TextNewSeriesTag' class='form-control form-control-lg' value=''>
							</div>
						</div>
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='SeriesNew'>
						
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