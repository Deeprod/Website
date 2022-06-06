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
		echo header_main("Movies");
	?>
	
    <div id="appCapsule">

		<?php 
			//include("app-movie-filter.php"); 
			
			$Filter = $_GET['Filter'];
			
			if 		($Filter == "Rating")	{include("app-movie-filter-rating.php"	);}
			elseif 	($Filter == "Year")		{include("app-movie-filter-year.php"	);}
			elseif 	($Filter == "Director")	{include("app-movie-filter-director.php");}
			elseif 	($Filter == "Actor")	{include("app-movie-filter-actor.php"   );}
			else							{include("app-movie-filter-date.php"	);}
			
			include("app-action-sheet.php");
			include("app-copyright.php"); 
		?>

    </div>

	<?php 
		include("app-side-bar.php"); 
		include("app-bottom-menu.php"); echo bottom_menu(2);
		include("app-scripts.php"); 
	?>

</body>
</html>