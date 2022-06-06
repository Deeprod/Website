<?php 

$idr = rand(1,99999999);
$idrcss = rand(1,99999999);

$Site_Name = "Home Office";
		
echo"
	<head>
		<meta charset='utf-8' />
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		
		<title>" . $Site_Name . "</title>
		
		<link rel='stylesheet' href='assets/css/style.css?id=".$idrcss."'>
		
		<meta name='viewport'
			content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover' />
			
		<meta name='description' content='" . $Site_Name . "'>
		<meta name='keywords' content='' />
		
		<link rel='apple-touch-icon' sizes='180x180' href='assets/img/LogoJIK_apple.png'>
		<link rel='icon' type='image/png' href='assets/img/LogoJIK.png' sizes='32x32'>
		<link rel='shortcut icon' href='assets/img/LogoJIK.png'>
	</head>
";

?>