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
		echo header_main("Series");
	?>
	
    <div id="appCapsule">

		<?php 
			include("app-series-full-list.php"); 
			include("app-action-sheet.php");
			include("app-copyright.php"); 
		?>

    </div>

	<?php 
		include("app-side-bar.php"); 
		include("app-bottom-menu.php"); 
		echo bottom_menu(3);

		include("app-scripts.php"); 
	?>

</body>
</html>