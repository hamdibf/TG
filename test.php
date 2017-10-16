<?php
	$x = 2250;
	$y = 1500;
	
	$render_png = './img/'.time().'.png';
	
	$base_png = './img/base/1500821230.png';
	$collar_png = './img/col/1500821230.png';
	$poignets_png = './img/poignets/1500821231.png';
	$white = './white.png';
	
	$final_img = imagecreatetruecolor($x, $y);
	
	imagealphablending($final_img, true);
	imagesavealpha($final_img, true);
	
	$black = imagecolorallocate($final_img, 255, 255, 255);
	imagecolortransparent($final_img,$black);
	
	$image_white = imagecreatefrompng($white);
	$image_base = imagecreatefrompng($base_png);
	$image_col = imagecreatefrompng($collar_png);
	$image_poignet = imagecreatefrompng($poignets_png);
	
	imagecopy($final_img, $image_white, 0, 0, 0, 0, $x, $y);	
	imagecopy($final_img, $image_base, 0, 0, 0, 0, $x, $y);	
	imagecopy($final_img, $image_col, 0, 0, 0, 0, $x, $y);
	imagecopy($final_img, $image_poignet, 0, 0, 0, 0, $x, $y);
	
    //save png file	
	imagepng($final_img,$render_png);
	
	echo '<img src="'.$render_png.'" />';
?>

