<?php

if($_GET['PasswordForm'] == "aaa" OR $_GET['PasswordForm'] == "bbb")
{
	echo "<script>window.location.href = \"app-cookie-in.php\"</script>";
}
elseif($_GET['LogoffForm'] == "LogoffForm")
{	
	echo "<script>window.location.href = \"app-cookie-out.php\"</script>";
}

?>


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
		echo header_main($Site_Name);
	?>

    <div id="appCapsule">

		<?php 
			include("app-index-summary.php"); 
			include("app-action-sheet.php");
			include("app-index-chart01.php"); 
			include("app-index-chart02.php"); 
			include("app-index-last-movies.php"); 
			include("app-copyright.php"); 
		?>

    </div>
	
	<?php 
		include("app-side-bar.php"); 
		include("app-bottom-menu.php"); echo bottom_menu(1);
		include("app-scripts.php"); 
	?>

</body>

</html>