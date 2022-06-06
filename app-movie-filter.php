<?php 

echo"
        <div class='section mt-4'>
            <div class='section-heading'>
                <h2 class='title'>Categories</h2>
            </div>
			
			<!-- Stats -->
			<div>
                <a href='app-movies.php?Filter=Rating' class='btn btn-block btn-primary btn-lg'>
					<ion-icon name='bar-chart-outline'></ion-icon>Rating
				</a>
            </div>
			<br>
			<div>
                <a href='app-movies.php?Filter=Director' class='btn btn-block btn-primary btn-lg'>
					<ion-icon name='videocam-outline'></ion-icon>Director
				</a>
            </div>
			<br>
			<div>
                <a href='app-movies.php?Filter=Year' class='btn btn-block btn-primary btn-lg'>
					<ion-icon name='hourglass-outline'></ion-icon>Year
				</a>
            </div>
			<br>
			<div>
                <a href='app-movies.php?Filter=Date' class='btn btn-block btn-primary btn-lg'>
					<ion-icon name='calendar-outline'></ion-icon>Date
				</a>
            </div>
        </div>
";

?>