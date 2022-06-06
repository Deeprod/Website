<?php 

$today = date('d/m/Y');

echo"

<div class='modal fade action-sheet' id='AddMovieActionSheet' tabindex='-1' role='dialog'>
	
	<div class='modal-dialog' role='document'>
		
		<div class='modal-content'>
			
			<div class='modal-header'>
				<h5 class='modal-title'>Add Movie</h5>
			</div>
			
			<div class='modal-body'>
			
				<div class='action-sheet-content'>
					
					<form action='_Query.php?HiddenForm=MoviesNew' method='GET'>
					
						<div class='form-group basic'>
							<label class='label'>Movie</label>
							<div class='input-group mb-2'>
								<input type='text' id='TextNewMovies' name='TextNewMovies' class='form-control form-control-lg' value=''>
							</div>
						</div>
						
						<div class='form-group basic'>
							<label class='label'>Date</label>
							<div class='input-group mb-2'>
								<input type='text' id='TextNewDate' name='TextNewDate' class='form-control form-control-lg' value='" . $today . "'>
							</div>
						</div>
					
						<div class='row'>
						
							<div class='col-6'>
								<div class='form-group basic'>
									<div class='input-wrapper'>
										
										<label class='label' for='currency1'>Year</label>
										
										<input type='text' id='TextNewYear' name='TextNewYear' class='form-control form-control-lg' value=''>
										
									</div>
								</div>
							</div>
							
							<div class='col-6'>
								<div class='form-group basic'>
									<div class='input-wrapper'>
									
										<label class='label' for='currency2'>Rating</label>
										
										<input type='text' id='TextNewRating' name='TextNewRating' class='form-control form-control-lg' value=''>
										
									</div>
								</div>
							</div>
							
						</div>
						
						<input type='hidden' id='HiddenForm' name='HiddenForm' value='MoviesNew'>
						
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