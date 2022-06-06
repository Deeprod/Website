<!doctype html>
<html lang="en">

	<?php 
		include("app-head.php"); 
		include("app-mysql-conn.php");
		include("app-sql-functions.php");
	?>

<body>

	<?php 
		include("app-loader.php"); 
		include("app-header.php"); 
		echo header_main("Food");
	?>
	
    <div id="appCapsule">

		<?php 

			echo"
			<div class='section mt-4'>
			
				<div class='transactions'>
				
					<div class='item'>
					
						<div class='detail'>
						
							<a href='app-recipe-Chicken-Pot-Pie.html'>
								<div class='image-block imaged w48 h48 bg-seven'>
									<strong class='text-light'>" . "1" . "</strong>
								</div>
							</a>
							
							<div>
								<strong>". "Chicken Pot Pie" . "</strong>
							</div>
							
						</div>
						
					</div>

				</div>
				
			</div>";
		?>

    </div>

	<?php 
		include("app-side-bar.php"); 
		include("app-bottom-menu.php"); 
		echo bottom_menu(5);

		include("app-scripts.php"); 
	?>

</body>
</html>