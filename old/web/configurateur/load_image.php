<?php
session_start();
$sessionid = session_id();

//GET REQUEST VAR
$view = $_REQUEST['view'];
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
$render_face_jpg = '../../../img/' . $sessionid . '_face.jpg';
$render_zoom_jpg = '../../../img/' . $sessionid . '_zoom.jpg';
$render_dos_jpg = '../../../img/' . $sessionid . '_dos.jpg';

// API CALL
$ch = curl_init('http://storage.tailorgeorge.com/api/getTemplates/' . $reference . '/format/json'); //setup the request, you can also use CURLOPT_URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
$TOKEN = "N0g9fKVS53INO5js0Dj4N0e26G06TtcA";
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $TOKEN)); //Set your auth headers
$data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources
$output = json_decode($data, true);
$x = 2250;
$y = 1500;
$quality = 90;

$render = '';

//INIT PNG COMPONENTS (FACE)
//#vue face (bas + gorge)
$tmp_file_name = $gorge . '_' . $bas;
if ($poignets == "MC") {
    $tmp_file_name = $gorge['gorge'] . '_' . $bas['bas'] . '_MC';
}
$base_face_png = $output[$reference][$tmp_file_name]["png"];
//>>>> ECHO image base_face_png
$calque_base_face_png = '<img src="'.$base_face_png.'">';
//$render .=  $calque_base_face_png;

//#col
$collar_png = $output[$reference][$col]["png"];
if ($collar_png != '') 
{
	//>>>> ECHO image base_face_png
	$calque_collar_png = '<img src="'.$collar_png.'">';
	//$render .= $calque_collar_png;
} 
else 
{
    $collar_png = '';
}



//#baleine
//#tenue_col
//#poignet
$poignets_png = $output[$reference][$poignets]["png"];
if ($poignets_png != '') 
{
	//>>>> ECHO image poignets_png
	$calque_poignets_png = '<img src="'.$poignets_png.'">';
	//$render .= $calque_poignets_png;
} 
else 
{
    $poignets_png = '';
}


//#poches
if ($poches != "0") 
{
    $poches_png = $output[$reference][$poches]["png"];
    if ($poches_png != '') 
	{
		//>>>> ECHO image poignets_png
		$calque_poches_png = '<img src="'.$poches_png.'">';
		//$render .= $calque_poches_png;
    } 
	else 
	{
        $poches_png = '';
    }
}




//#epaulettes
if ($epaulettes) 
{
    $epaulettes_png = $output[$reference][$epaulettes]["png"];
    if ($epaulettes_png != '') 
	{
		//>>>> ECHO image epaulettes_png
		$calque_epaulettes_png = '<img src="'.$epaulettes_png.'">';
		//$render .= $calque_epaulettes_png;
    }
} 
else {
    $epaulettes_png = '';
}


//#couture
if ($gorge != "C") 
{
    $buttonholes_throat_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/bases/' . $couture . '.png';
	//>>>> ECHO image buttonholes_throat_png
	$calque_buttonholes_throat_png = '<img src="'.$buttonholes_throat_png.'">';
	//$render .= $calque_buttonholes_throat_png;
}
if ($poignets != "MC") 
{
    $buttonholes_wrists_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/manche/' . $couture . '.png';
	//>>>> ECHO image buttonholes_wrists_png
	$calque_buttonholes_wrists_png = '<img src="'.$buttonholes_wrists_png.'">';
	//$render .= $calque_buttonholes_wrists_png;
}
if ($epaulettes_png != '') 
{
    $buttonholes_epaulettes_png = 'http://storage.tailorgeorge.com/storage/boutonnieres/epaulettes/' . $couture . '.png';
    //>>>> ECHO image buttonholes_epaulettes_png
	$calque_buttonholes_epaulettes_png = '<img src="'.$buttonholes_epaulettes_png.'">';
	//$render .= $calque_buttonholes_epaulettes_png;
}

//#boutons
if ($gorge != "C") {
    $buttons_throat_png = 'http://storage.tailorgeorge.com/storage/boutons/gorge/' . $boutons . '.png';
    //>>>> ECHO image buttons_throat_png
	$calque_buttons_throat_png = '<img src="'.$buttons_throat_png.'">';
	//$render .= $calque_buttons_throat_png;
}

if ($poignets != "MC") 
{
    $buttons_wrists_png = 'http://storage.tailorgeorge.com/storage/boutons/manche/manche_' . $boutons . '.png';
    //>>>> ECHO image buttons_wrists_png
	$calque_buttons_wrists_png = '<img src="'.$buttons_wrists_png.'">';
	//$render .= $calque_buttons_wrists_png;

    $buttons_poignets_png = 'http://storage.tailorgeorge.com/storage/boutons/poignets/' . $poignets . '/' . $boutons . '.png';
    //>>>> ECHO image buttons_poignets_png
	$calque_buttons_poignets_png = '<img src="'.$buttons_poignets_png.'">';
	//$render .= $calque_buttons_poignets_png;
}
if ($epaulettes_png != '') 
{
    $buttons_epaulettes_png = 'http://storage.tailorgeorge.com/storage/boutons/epaulettes/' . $boutons . '.png';
    //>>>> ECHO image buttons_epaulettes_png
	$calque_buttons_epaulettes_png = '<img src="'.$buttons_epaulettes_png.'">';
	//$render .= $calque_buttons_epaulettes_png;
}


//DOUBLURE
if ($tissu_doublure_reference != '') 
{
    //get png from tissu refernece
    $ch = curl_init('http://storage.tailorgeorge.com/api/getTemplates/' . $tissu_doublure_reference . '/format/json'); //setup the request, you can also use CURLOPT_URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
    $TOKEN = "N0g9fKVS53INO5js0Dj4N0e26G06TtcA";
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $TOKEN)); //Set your auth headers
    $data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
    $info = curl_getinfo($ch); // get info about the request
    curl_close($ch); // close curl resource to free up system resources
    $output_doublure = json_decode($data, true);
    //doublure col
    $doublure_collar_png = "";
    $doublure_collar_png_2 = "";
    if ($doublure_col == "IPC") 
	{
        $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $col . '_int_col.png';
    }
    if ($doublure_col == "EPC") 
	{
        $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $col . '_gorge.png';
    }
    if ($doublure_col == "C") 
	{
        $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/T1676/' . $col . '.png';
    } //a modifier par un code couleur Blanc !!!!!!!!!!!!!!!!!!!!!!
    if ($doublure_col == "PCE") 
	{
        $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $col . '_int_col.png';
        $doublure_collar_png_2 = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $col . '_gorge.png';
    }
    if ($doublure_col == "CC") 
	{
        $doublure_collar_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $col . '.png';
    }
    
	if ($doublure_collar_png != "") 
	{
        //>>>> ECHO image doublure_collar_png
		$calque_doublure_collar_png = '<img src="'.$doublure_collar_png.'">';
		//$render .= $calque_doublure_collar_png;
    }
    
	if ($doublure_collar_png_2 != "") 
	{
        //>>>> ECHO image doublure_collar_png_2
		$calque_doublure_collar_png_2 = '<img src="'.$doublure_collar_png_2.'">';
		//$render .= $calque_doublure_collar_png_2;
    }
	
    //doublure poignets
    $doublure_poignets_png = "";
    if ($doublure_poignets == "IP") 
	{
        $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $poignets . '_int_int.png';
    }
    if ($doublure_poignets == "P") 
	{
        $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/' . $tissu_doublure_reference . '/' . $poignets . '.png';
    }
    if ($doublure_poignets == "PP") 
	{
        $doublure_poignets_png = 'http://storage.tailorgeorge.com/storage/Resultat/T1676/' . $poignets . '.png';
    }
    if ($doublure_poignets_png != "") 
	{
        //>>>> ECHO image doublure_poignets_png
		$calque_doublure_poignets_png = '<img src="'.$doublure_poignets_png.'">';
		//$render .= $calque_doublure_poignets_png;
    }
}

//INIT PNG COMPONENTS (DOS)
//#vue dos (bas + gorge)
$tmp_file_name = 'D_' . $bas;
if ($dos != "") {
    $tmp_file_name = 'D_' . $bas . '_' . $dos;
}
$base_dos_png = $output[$reference][$tmp_file_name]["png"];
if ($base_dos_png != '') {
    
	//$image_base = imagecreatefrompng($base_dos_png);
    //imagecopy($final_img_dos, $image_base, 0, 0, 0, 0, $x, $y);
    //imagedestroy($image_base);
	
	
	//>>>> ECHO image base_dos_png
	$calque_base_dos_png = '<img src="'.$base_dos_png.'">';
	//echo $calque_base_dos_png;
} else {
    $base_dos_png != '';
}

//Display view
if ($view == 'face') 
{
    $face = 'block';
    $dos = 'none';
} 
else 
{
    $face = 'none';
    $dos = 'block';
}

//Merge PNG 
$final_render_file = time().'.jpg';
$command = 'python m.py '.$final_render_file.' '.$_REQUEST['q'].' '.$base_face_png.' '.$collar_png.' '.$poignets_png.' '.$poches_png.' '.$epaulettes_png.' '.$buttonholes_throat_png.' '.$buttonholes_wrists_png.' '.$buttonholes_epaulettes_png.' '.$buttons_throat_png.' '.$buttons_wrists_png.' '.$buttons_poignets_png.' '.$buttons_epaulettes_png.' '.$doublure_collar_png.' '.$doublure_collar_png_2.' '.$doublure_poignets_png.' ';
$out = system ($command);	

//PREPARE OUTPUT
$calque_final = '<img src="./render/'.$final_render_file.'">';
$render .= $calque_final;
$render .= '<input type="hidden" name="img_file_face" value="' . $final_render_file . '" id="img_file_face" />';
$render .= '<input type="hidden" name="img_file_dos" value="' . $render_dos_jpg . '" id="img_file_dos" />';
$render .= '<input type="hidden" name="img_file_zoom" value="' . $render_zoom_jpg . '" id="img_file_zoom" />';

echo $final_render_file;
?>