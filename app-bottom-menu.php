<?php 

function bottom_menu($x)
{

if ($x == 1) 		{ $Active_r = array("", "active", "", "", "", "", ""); }
elseif ($x == 2) 	{ $Active_r = array("", "", "active", "", "", "", ""); }
elseif ($x == 3) 	{ $Active_r = array("", "", "", "active", "", "", ""); }
elseif ($x == 4) 	{ $Active_r = array("", "", "", "", "active", "", ""); }
elseif ($x == 5) 	{ $Active_r = array("", "", "", "", "", "active", ""); }
else				{ $Active_r = array("", "", "", "", "", "", ""); }

$idr = rand(1,9999999999);
	
return "
   <style>

		.BottomMenu {
		  min-height: 56px;
		  position: fixed;
		  z-index: 999;
		  width: 100%;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  background: #FFFFFF;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  border-top: 1px solid #DCDCE9;
		  padding-left: 4px;
		  padding-right: 4px;
		  padding-bottom: env(safe-area-inset-bottom);
		}

		.BottomMenu .item {
		  font-size: 9px;
		  letter-spacing: 0;
		  text-align: center;
		  width: 100%;
		  height: 56px;
		  line-height: 1.2em;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  position: relative;
		}

		.BottomMenu .item:before {
		  content: '';
		  display: block;
		  height: 2px;
		  border-radius: 0 0 10px 10px;
		  background: transparent;
		  position: absolute;
		  left: 4px;
		  right: 4px;
		  top: 0;
		}

		.BottomMenu .item .col {
		  width: 100%;
		  padding: 0 4px;
		  text-align: center;
		}

		.BottomMenu .item .icon,
		.BottomMenu .item ion-icon {
		  display: inline-flex;
		  margin: 1px auto 3px auto;
		  font-size: 24px;
		  line-height: 1em;
		  color: #27173E;
		  transition: 0.1s all;
		  display: block;
		  margin-top: 1px;
		  margin-bottom: 3px;
		}

		.BottomMenu .item strong {
		  margin-top: 4px;
		  display: block;
		  color: #27173E;
		  font-weight: 400;
		  transition: 0.1s all;
		}

		.BottomMenu .item:active {
		  opacity: .8;
		}

		.BottomMenu .item.active:before {
		  background: #6236FF;
		}

		.BottomMenu .item.active .icon,
		.BottomMenu .item.active ion-icon,
		.BottomMenu .item.active strong {
		  color: #6236FF !important;
		  font-weight: 500;
		}

		.BottomMenu .item:hover .icon,
		.BottomMenu .item:hover ion-icon,
		.BottomMenu .item:hover strong {
		  color: #27173E;
		}

   </style>

	<div class='BottomMenu'>
		<a href='app-index.php?" . $idr . "' class='item " . $Active_r[1] . "'>
			<div class='col'>
				<ion-icon name='pie-chart-outline'></ion-icon>
				<strong>Overview</strong>
			</div>
		</a>
		<a href='app-movies.php?" . $idr . "' class='item " . $Active_r[2] . "'>
			<div class='col'>
				<ion-icon name='film-outline'></ion-icon>
				<strong>Movies</strong>
			</div>
		</a>
		<a href='app-series.php?" . $idr . "' class='item " . $Active_r[3] . "'>
			<div class='col'>
				<ion-icon name='tv-outline'></ion-icon>
				<strong>Series</strong>
			</div>
		</a>
		<a href='app-food.php?" . $idr . "' class='item " . $Active_r[4] . "'>
			<div class='col'>
				<ion-icon name='pizza-outline'></ion-icon>
				<strong>Food</strong>
			</div>
		</a>
		<a href='app-recipe.php?" . $idr . "' class='item " . $Active_r[5] . "'>
			<div class='col'>
				<ion-icon name='book-outline'></ion-icon>
				<strong>Recipe</strong>
			</div>
		</a>
		
	</div>
";

}

?>