<?php 
													
echo"

	<style>

		.sidebar-balance {
		  padding: 6px 4px;
		  background: #6236FF;
		}


	</style>

	<div class='sidebar-balance'>

	</div>

	<div class='action-group'>

		<div class='action-button'>
			<div class='in'>
				<div class='iconbox bg-white text-primary'>
					<ion-icon name='film'></ion-icon>
				</div>
				Movies
			</div>
		</div>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#AddMovieActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='add-outline'></ion-icon>
				</div>
				Add <br> Movie
			</div>
		</a>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#DeleteMovieActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='remove-outline'></ion-icon>
				</div>
				Delete <br> Movie
			</div>
		</a>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#UpdateMovieActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='swap-horizontal-outline'></ion-icon>
				</div>
				Update <br> Movie
			</div>
		</a>
		
		<a class='action-button'>
			<div class='in'>
				<div class='iconbox bg-primary'>
				</div>
			</div>
		</a>
		
	</div>

	<div class='action-group'>

		<div class='action-button'>
			<div class='in'>
				<div class='iconbox bg-white text-primary'>
					<ion-icon name='tv'></ion-icon>
				</div>
				Series
			</div>
		</div>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#AddSeriesActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='add-outline'></ion-icon>
				</div>
				Add <br> Series
			</div>
		</a>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#DeleteSeriesActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='remove-outline'></ion-icon>
				</div>
				Delete <br> Series
			</div>
		</a>
		
		<a href='app-index.php' class='action-button' data-toggle='modal' data-target='#UpdateSeriesActionSheet'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='swap-horizontal-outline'></ion-icon>
				</div>
				Update <br> Series
			</div>
		</a>

		<a class='action-button'>
			<div class='in'>
				<div class='iconbox bg-primary'>
				</div>
			</div>
		</a>
		
	</div>

";
		
?>