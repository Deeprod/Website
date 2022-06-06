<?php 

function header_main($title)
{
	
	if ($_COOKIE["Admin"] == "aaa" OR $_COOKIE["Admin"] == "bbb")
		{ $ionicon = "<ion-icon name='earth-outline'></ion-icon>";
		  $actionsheet = "LogoffActionSheet"; }
	else
		{ $ionicon = "<ion-icon name='log-in-outline'></ion-icon>";
		  $actionsheet = "LoginActionSheet"; }
	
	return "
	
		<style>
			
			.appHeader {
			  height: 56px;
			  display: flex;
			  justify-content: center;
			  align-items: center;
			  position: fixed;
			  top: 0;
			  left: 0;
			  right: 0;
			  z-index: 999;
			  background: #FFFFFF;
			  color: #27173E;
			  border-bottom: 1px solid #DCDCE9;
			  border: 0;
			}

			.appHeader .left,
			.appHeader .right {
			  height: 56px;
			  display: flex;
			  align-items: center;
			  position: absolute;
			}

			.appHeader .left .icon,
			.appHeader .left ion-icon,
			.appHeader .right .icon,
			.appHeader .right ion-icon {
			  font-size: 26px;
			}

			.appHeader .left .headerButton,
			.appHeader .right .headerButton {
			  min-width: 36px;
			  height: 56px;
			  display: flex;
			  align-items: center;
			  justify-content: center;
			  padding: 10px;
			  color: #6236FF;
			  position: relative;
			}

			.appHeader .left {
			  left: 10px;
			  top: 0;
			}

			.appHeader .right {
			  right: 10px;
			  top: 0;
			}

			.appHeader .pageTitle {
			  font-size: 17px;
			  font-weight: 500;
			  padding: 0 10px;
			}

			.appHeader.text-light {
			  color: #FFF;
			}

			.appHeader.text-light .headerButton {
			  color: #FFF;
			}

		</style>
		
		<div class='appHeader bg-primary text-light'>
			<div class='left'>
				<a href='#' class='headerButton' data-toggle='modal' data-target='#sidebarPanel'>
					<ion-icon name='menu-outline'></ion-icon>
				</a>
			</div>
			<div class='pageTitle'>
				" . $title . "
			</div>
			<div class='right'>
				<a href='#' class='headerButton' data-toggle='modal' data-target='#" . $actionsheet . "'>
					" . $ionicon . "
				</a>
			</div>
		</div>
	";

}

?>