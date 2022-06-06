<?php 
	
echo"
	<style>

		.panelbox-left .listview > li,
		.panelbox-right .listview > li {
		  padding: 10px 16px;
		}

		.panelbox-left .link-listview > li,
		.panelbox-right .link-listview > li {
		  padding: 0;
		}

		.panelbox-left .link-listview > li a,
		.panelbox-right .link-listview > li a {
		  padding: 10px 36px 10px 16px;
		}

		.panelbox-left .image-listview > li,
		.panelbox-right .image-listview > li {
		  padding: 0;
		}

		.panelbox-left .image-listview > li .item,
		.panelbox-right .image-listview > li .item {
		  padding: 10px 16px;
		}

		.panelbox-left .image-listview > li a.item,
		.panelbox-right .image-listview > li a.item {
		  padding-right: 36px;
		}
		
	</style>";
	
echo"

	<div class='modal fade panelbox panelbox-left' id='sidebarPanel' tabindex='-1' role='dialog'>
        
		<div class='modal-dialog' role='document'>
            
			<div class='modal-content'>
                
				<div class='modal-body p-0'>";

					include('app-side-bar-header.php'); 
					include('app-side-bar-actions.php'); 
					include('app-side-bar-movie-filter.php'); 
					include('app-side-bar-food.php'); 
					include('app-side-bar-devlog.php'); 

echo"
				</div>
				
            </div>
			
        </div>
		
    </div>

";
		
?>