<?php

	ob_start();
	
	$Cookie_name = "Admin";
	$Cookie_value = "aaa";
	setcookie($Cookie_name, $Cookie_value, time() - 3600, "/"); // 86400 = 1 day
	
	ob_end_flush();
	
	$idr = rand(1,9999999999);
	echo "<script>window.location.href = \"app-index.php?".	$idr ."\"</script>";
	
?>
