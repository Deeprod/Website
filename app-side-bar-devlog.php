<?php 

echo"
	<div class='listview-title mt-1'>Devlog</div>
	<ul class='listview flush transparent no-line image-listview'>
";

for ($i=1; $i<=$Devlog_Max; $i++)
{
	echo"
		<li>
			<a href='app-index.php' class='item' data-toggle='modal' data-target='#DeleteDevLogActionSheet" . $Devlog_ID[$i] . "'>
				<div class='icon-box bg-primary'>
					<ion-icon name='construct-outline'></ion-icon>
				</div>
				<div class='in text-devlog'>
					" . $Devlog_Text[$i] . "
				</div>
			</a>
		</li>";
}

echo"
		<li>
			<a href='app-index.php' class='item' data-toggle='modal' data-target='#AddDevLogActionSheet'>
				<div class='icon-box bg-primary'>
					<ion-icon name='add-outline'></ion-icon>
				</div>
				<div class='in text-devlog-muted'>
					Add Devlog
				</div>
			</a>
		</li>";
		
echo"
	</ul>
	<br>
	<br>
	<br>
";

?>