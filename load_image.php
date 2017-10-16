<?php 
session_start();
$sessionid = session_id();


//GET REQUEST VAR
$reference = $_REQUEST['reference'];
$col = $_REQUEST['col'];
$hp = $_REQUEST['hp'];
$baleine = $_REQUEST['baleine'];
$tenue_col = $_REQUEST['tenue_col'];
$poignets = $_REQUEST['poignets'];
$poches = $_REQUEST['poches'];
$epaulettes = $_REQUEST['epaulettes'];
$bas = $_REQUEST['bas'];
$gorge = $_REQUEST['gorge'];		
$dos = $_REQUEST['dos'];
$pinces = $_REQUEST['pinces'];
$boutons = $_REQUEST['boutons'];
$couture = $_REQUEST['couture'];
$tissu_doublure_reference = $_REQUEST['tissu_doublure_reference'];
$tissu_doublure_code = $_REQUEST['tissu_doublure_code'];
$tissu_doublure_id = $_REQUEST['tissu_doublure_id'];
$doublure_col = $_REQUEST['doublure_col'];
$doublure_poignets = $_REQUEST['doublure_poignets'];

//INIT VAR
$t = time();
$render_face_jpg = './img/'.$sessionid.'_face.jpg';
$render_zoom_jpg = './img/'.$sessionid.'_zoom.jpg';
$render_dos_jpg = './img/'.$sessionid.'_dos.jpg';

// API CALL 
$ch = curl_init('http://storage.tailorgeorge.com/api/getTemplates/'.$reference.'/format/json'); //setup the request, you can also use CURLOPT_URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
$TOKEN = "N0g9fKVS53INO5js0Dj4N0e26G06TtcA";
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer ' . $TOKEN)); //Set your auth headers
$data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources 
//encode output
$output = json_decode($data, true); 
//var_dump($output);
//INIT PNG FACE
$x = 2250;
$y = 1500;
$quality = 70;

//INIT FACE JPEG 
$white = './white.png';
$final_img = imagecreatetruecolor($x, $y); //init final image
imagealphablending($final_img, true);//prendre en compte la transparence
imagesavealpha($final_img, true);//prendre en compte la transparence
$black = imagecolorallocate($final_img, 255, 255, 255);//supprimer le fond noir
imagecolortransparent($final_img,$black);//supprimer le fond noir
$image_white = imagecreatefrompng($white); //creation des images composantes de la chemise
imagecopy($final_img, $image_white, 0, 0, 0, 0, $x, $y); //fusionner avec un fond blanc
imagedestroy($image_white); //libere la memoire

//INIT PNG COMPONENTS (FACE) 

//#vue face (bas + gorge)
$tmp_file_name = $gorge.'_'.$bas;
if($poignets=="MC") {$tmp_file_name = $gorge['gorge'].'_'.$bas['bas'].'_MC';}
$base_face_png = $output[$reference][$tmp_file_name]["png"];
$image_base = imagecreatefrompng($base_face_png);
imagecopy($final_img, $image_base, 0, 0, 0, 0, $x, $y);	
imagedestroy($image_base);

//#col
$collar_png = $output[$reference][$col]["png"];
//echo $collar_png;
$image_col = imagecreatefrompng($collar_png);
imagecopy($final_img, $image_col, 0, 0, 0, 0, $x, $y);
imagedestroy($image_col);

//#baleine

//#tenue_col

//#poignet
$poignets_png = $output[$reference][$poignets]["png"];
$image_poignet = imagecreatefrompng($poignets_png);
imagecopy($final_img, $image_poignet, 0, 0, 0, 0, $x, $y);
imagedestroy($image_poignet);

//#poches
$poches_png = $output[$reference][$poches]["png"];
if($poches_png!='')
{
	$image_poches = imagecreatefrompng($poches_png);
	imagecopy($final_img, $image_poches, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_poches);
}

//#epaulettes
$epaulettes_png = $output[$reference][$epaulettes]["png"];
if($epaulettes_png!='')
{
	$image_epaulettes = imagecreatefrompng($epaulettes_png);
	imagecopy($final_img, $image_epaulettes, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_epaulettes);
}

//#couture
if($gorge != "C")
{
	$buttonholes_throat_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/bases/'.$couture.'.png'; 
	$image_throat_png = imagecreatefrompng($buttonholes_throat_png);
	imagecopy($final_img, $image_throat_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_throat_png);
}
if($poignets!="MC") 
{
	$buttonholes_wrists_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/manche/'.$couture.'.png'; 
	$image_wrists_png = imagecreatefrompng($buttonholes_wrists_png);
	imagecopy($final_img, $image_wrists_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_wrists_png);
}
if($epaulettes_png!='')
{	
	$buttonholes_epaulettes_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/epaulettes/'.$couture.'.png'; 
	$image_epaulettes_png = imagecreatefrompng($buttonholes_epaulettes_png);
	imagecopy($final_img, $image_epaulettes_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_epaulettes_png);
}

//#boutons
if($gorge != "C")
{
	$buttons_throat_png = 'http://storage.tailorgeorge.com/storage/boutons/gorge/'.$boutons.'.png';
	$image_throat_png = imagecreatefrompng($buttons_throat_png);
	imagecopy($final_img, $image_throat_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_throat_png);
}
if($poignets!="MC") 
{
	$buttons_wrists_png = 'http://storage.tailorgeorge.com/storage/boutons/manche/manche_'.$boutons.'.png';
	$image_wrists_png = imagecreatefrompng($buttons_wrists_png);
	imagecopy($final_img, $image_wrists_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_wrists_png);
	
	$buttons_poignets_png = 'http://storage.tailorgeorge.com/storage/boutons/poignets/'.$poignets.'/'.$boutons.'.png';
	$image_poignets_png = imagecreatefrompng($buttons_poignets_png);
	imagecopy($final_img, $image_poignets_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_poignets_png);
	
	
}
if($epaulettes_png!='')
{
	$buttons_epaulettes_png = 'http://storage.tailorgeorge.com/storage/boutons/epaulettes/'.$boutons.'.png';
	$image_epaulettes_png = imagecreatefrompng($buttons_epaulettes_png);
	imagecopy($final_img, $image_epaulettes_png, 0, 0, 0, 0, $x, $y);
	imagedestroy($image_epaulettes_png);
}



//DOUBLURE
if($tissu_doublure_reference!='')
{
	//get png from tissu refernece
	$ch = curl_init('http://storage.tailorgeorge.com/api/getTemplates/'.$tissu_doublure_reference.'/format/json'); //setup the request, you can also use CURLOPT_URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
	$TOKEN = "N0g9fKVS53INO5js0Dj4N0e26G06TtcA";
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer ' . $TOKEN)); //Set your auth headers
	$data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
	$info = curl_getinfo($ch); // get info about the request
	curl_close($ch); // close curl resource to free up system resources 
	$output_doublure = json_decode($data, true); 
	//doublure col
	$doublure_collar_png = "";
	$doublure_collar_png_2 = "";
	if($doublure_col=="IPC") { $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$col.'_int_col.png'; }
	if($doublure_col=="EPC") { $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$col.'_gorge.png'; }
	if($doublure_col=="C") { $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/T1676/'.$col.'.png'; } //a modifier par un code couleur Blanc !!!!!!!!!!!!!!!!!!!!!!
	if($doublure_col=="PCE") 
	{ 
		$doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$col.'_int_col.png'; 
		$doublure_collar_png_2 = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$col.'_gorge.png';
	}
	if($doublure_col=="CC") { $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$col.'.png'; } 	
	if($doublure_collar_png!="")
	{
		$image_doublure_col = imagecreatefrompng($doublure_collar_png);
		imagecopy($final_img, $image_doublure_col, 0, 0, 0, 0, $x, $y);
		imagedestroy($image_doublure_col);
	}
	if($doublure_collar_png_2!="")
	{
		$image_doublure_col_2 = imagecreatefrompng($doublure_collar_png_2);
		imagecopy($final_img, $image_doublure_col_2, 0, 0, 0, 0, $x, $y);
		imagedestroy($image_doublure_col_2);
	}
	//doublure poignets
	$doublure_poignets_png = "";
	if($doublure_poignets=="IP") { $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$poignets.'_int_int.png'; }
	if($doublure_poignets=="P") { $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/'.$tissu_doublure_reference.'/'.$poignets.'.png'; }
	if($doublure_poignets=="PP") { $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/T1676/'.$poignets.'.png'; }
	if($doublure_poignets_png!="")
	{
		$image_doublure_poignets = imagecreatefrompng($doublure_poignets_png);
		imagecopy($final_img, $image_doublure_poignets, 0, 0, 0, 0, $x, $y);
		imagedestroy($image_doublure_poignets);
	}
}

//SAVE FINAl IMAGE (FACE) JPEG
imagejpeg($final_img,$render_face_jpg,$quality);
imagedestroy($final_img);

//GENERATE ZOOM JPEG 
$final_img_zoom = imagecreatetruecolor(($x/2), ($y/2));
$image_face = imagecreatefromjpeg($render_face_jpg);
imagecopy($final_img_zoom, $image_face, 0, 0, ($x/4), 0, ($x/2), ($y/2));
imagedestroy($image_face);
imagejpeg($final_img_zoom,$render_zoom_jpg,$quality);
imagedestroy($final_img_zoom);

//INIT DOS JPEG 
$white = './white.png';
$final_img_dos = imagecreatetruecolor($x, $y); //init final image
imagealphablending($final_img_dos, true);//prendre en compte la transparence
imagesavealpha($final_img_dos, true);//prendre en compte la transparence
$black = imagecolorallocate($final_img_dos, 255, 255, 255);//supprimer le fond noir
imagecolortransparent($final_img_dos,$black);//supprimer le fond noir
$image_white = imagecreatefrompng($white); //creation des images composantes de la chemise
imagecopy($final_img_dos, $image_white, 0, 0, 0, 0, $x, $y); //fusionner avec un fond blanc
imagedestroy($image_white); //libere la memoire

//INIT PNG COMPONENTS (DOS) 
//#vue dos (bas + gorge)
$tmp_file_name = 'D_'.$bas;
if($dos!="") {$tmp_file_name = 'D_'.$bas.'_'.$dos;}
$base_dos_png = $output[$reference][$tmp_file_name]["png"];
$image_base = imagecreatefrompng($base_dos_png);
imagecopy($final_img_dos, $image_base, 0, 0, 0, 0, $x, $y);	
imagedestroy($image_base);



//SAVE FINAl IMAGE (DOS) JPEG
imagejpeg($final_img_dos,$render_dos_jpg,$quality);
imagedestroy($final_img_dos);

$render = '	<div id="shirt-container" style="position: relative;width: 100%;height: 85vh;overflow: hidden;">
				<div class="base"><input type="hidden" name="img_file_face" value="'.$render_face_jpg.'" id="img_file_face" /><img id="view_face" src="'.$render_face_jpg.'?t='.$t.'" style="width:100%;position:absolute;top:0;left:0;display:block;"></div>
				<div class="base"><input type="hidden" name="img_file_dos" value="'.$render_dos_jpg.'" id="img_file_dos" /><img id="view_dos" src="'.$render_dos_jpg.'?t='.$t.'" style="width:100%;position:absolute;top:0;left:0;display:none;"></div>
				<div class="base"><input type="hidden" name="img_file_zoom" value="'.$render_zoom_jpg.'" id="img_file_zoom" /><img id="view_zoom" src="'.$render_zoom_jpg.'?t='.$t.'" style="width:100%;position:absolute;top:0;left:0;display:none;"></div>
			</div>';
echo $render;
?>