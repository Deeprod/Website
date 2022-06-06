<?php 
$idr = rand(1,9999999999);

echo"

	<div class='action-group'>

		<div class='action-button'>
			<div class='in'>
				<div class='iconbox bg-white text-primary'>
					<ion-icon name='filter-outline'></ion-icon>
				</div>
				Movie <br> Filters
			</div>
		</div>

		<a href='app-movies.php?Filter=Rating' class='action-button'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='bar-chart-outline'></ion-icon>
				</div>
				Rating
			</div>
		</a>
		
		<a href='app-movies.php?Filter=Director' class='action-button'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='videocam-outline'></ion-icon>
				</div>
				Director
			</div>
		</a>
		
		<a href='app-movies.php?Filter=Year' class='action-button'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='hourglass-outline'></ion-icon>
				</div>
				Year
			</div>
		</a>
		
		<a href='app-movies.php?Filter=Date' class='action-button'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='calendar-outline'></ion-icon>
				</div>
				Date
			</div>
		</a>
		
	</div>

";
	

													
echo"

	<div class='action-group'>

		<div class='action-button'>
			<div class='in'>
				<div class='iconbox bg-white text-primary'>
					<ion-icon name='stats-chart-outline'></ion-icon>
				</div>
				Movie <br> Stats
			</div>
		</div>

		<a href='app-movies.php?" . $idr . "&Filter=Actor' class='action-button'>
			<div class='in'>
				<div class='iconbox'>
					<ion-icon name='people-outline'></ion-icon>
				</div>
				Actors
			</div>
		</a>
		
		<a class='action-button'>
			<div class='in'>
				<div class='iconbox bg-primary'>
				</div>
			</div>
		</a>
		
		<a class='action-button'>
			<div class='in'>
				<div class='iconbox bg-primary'>
				</div>
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