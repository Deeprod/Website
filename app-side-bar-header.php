<?php 

if ($_SESSION["SessionName"] == "Admin") 
	{ 	$headername = "Admin"; 
		$headertext = "Welcome Jonathan"; 
	}
else 
	{ 	$headername = "Guest"; 
		$headertext = "Welcome to " . $Site_Name; 
	}

echo"

	<style>
	
		.profileBox {
		  padding: 0 16px;
		  display: flex;
		  align-items: center;
		}

		.profileBox .image-wrapper {
		  margin-right: 16px;
		}

		.profileBox .in {
		  line-height: 1.4em;
		  padding-right: 25px;
		}


		.profileBox .in strong {
		  display: block;
		  font-weight: 500;
		  color: #27173E;
		}
		  
		.profileBox .in .text-muted {
		  font-size: 14px;
		  color: #A9ABAD !important;
		}
	
	</style>
	
	<div class='profileBox pt-2 pb-2'>
	
		<div class='image-wrapper'>
			<img src='assets\img\LogoJIK.png' alt='image' class='imaged w64' style='border-radius:0px;'>
		</div>
		
		<div class='in'>
			<strong>". $headername ."</strong>
			<div class='text-muted'>" . $headertext . "</div>
		</div>
		
		<a href='#' class='btn btn-link btn-icon sidebar-close' data-dismiss='modal'>
			<ion-icon name='close-outline'></ion-icon>
		</a>
		
	</div>

";
		
?>