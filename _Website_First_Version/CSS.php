<?php
    header("Content-type: text/css");
?>

<?php 
	$Body_Fontsize	= 30    ;
	$Border_Size	= 20	;
	$Box_Height		= 70	;
	$Title_Height	= 150	;
	$Title_Fontsize	= 60	;
	$Star_Size	    = 50	;
	$Form_Size      = 45    ;
?>
	
html, body {
  margin:0;
  padding:0;
  <?php echo "font-size:". $Body_Fontsize ."px;";  ?>
}

@font-face {
  font-family: myFirstFont;
  src: url(Wildwood-Medium.otf);
  }

* {
  font-family: myFirstFont; }

table {
  border-collapse: collapse; 
  width:100%;  }

.td_green_light {
  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
  <?php echo "height:".$Box_Height."px;" ?>
  background-color:rgb(198,224,180);
  color:rgb(112,173,71);
  font-size:30px;
  width:30px;
  text-align:center}

.td_green_dark {
  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
  <?php echo "height:".$Box_Height."px;" ?>
  background-color:rgb(112,173,71);
  color:rgb(198,224,180);
  font-size:30px;
  width:30px;
  text-align:center;
  font-weight: bold;}

.td_blue_dark {
  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
  <?php echo "height:".$Box_Height."px;" ?>
  background-color:#0080ff;
  color:#ffffff;
  font-size:30px;
  width:30px;
  text-align:center;
  font-weight: bold;}
  
.td_red_dark {
  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
  <?php echo "height:".$Box_Height."px;" ?>
  background-color:#FF0000;
  color:#ffe5e5;
  font-size:30px;
  width:30px;
  text-align:center;
  font-weight: bold;
}
  
.td_white {
  <?php echo "border: ".$Border_Size."px solid #fcfdfe;" ?>
  <?php echo "height:".$Box_Height."px;" ?>
  width:30px;
  background-color:#fcfdfe; 
}
  
div {
  width:100%
  height:100%;
  background-color:#F0F0F0;
  font-size:60px;
  padding:20px;	  
}
  
.td_Title {
  <?php echo "height:".$Title_Height."px; " ?>
  width:33%;
  text-align:center;
  <?php echo "font-size:".$Title_Fontsize."px;" ?>	 
}
  
.td_Title_Color {
  <?php echo "height:".$Title_Height."px; " ?>
  width:34%;
  text-align:center;
  <?php echo "font-size:".$Title_Fontsize."px;" ?>
  background-color:#F0F0F0;	  
}

.img_Full {
  <?php echo "width:". $Star_Size ."px;"  ?>
  <?php echo "height:". $Star_Size ."px;"  ?>
}

button {
  <?php echo "font-size: ". $Form_Size ."px;"  ?>
}