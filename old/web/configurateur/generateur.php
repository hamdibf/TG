<?php

require_once('../config/config.php');
session_start();
set_time_limit(300000);

$sql = 'select * from modeles where tissu_ref="T1630"';
$query = $bdd->query($sql);

while ($data = $query->fetch()) {
    $id = $data['id_auto'];
    $reference = $data['tissu_ref'];
    $col = $data['col'];
    $hp = $data['hp'];
    $baleine = $data['baleine'];
    $tenue_col = $data['tenue_col'];
    $poignets = $data['poignets'];
    $poches = $data['poches'];
    $epaulettes = $data['epaulettes'];
    $bas = $data['bas_chemise'];
    $gorge = $data['gorge'];
    $dos = $data['dos'];
    $pinces = $data['pinces'];
    $boutons = $data['boutons'];
    $couture = $data['couture'];

    if ($dos == '')
        $path_dos = "-";
    else
        $path_dos = $dos;
    if ($epaulettes == '')
        $path_epaulettes = "-";
    else
        $path_epaulettes = $epaulettes;
    if ($pinces == '')
        $path_pinces = "-";
    else
        $path_pinces = $pinces;

    $path_face = 'render_jpeg/face/' . $reference . '/' . $col . '/' . $poignets . '/' . $poches . '/' . $bas . '/' . $gorge . '/' . $path_dos . '/' . $path_epaulettes . '/' . $path_pinces . '/';

    $path_zoom = 'render_jpeg/zoom/' . $reference . '/' . $col . '/' . $poignets . '/' . $poches . '/' . $bas . '/' . $gorge . '/' . $path_dos . '/' . $path_epaulettes . '/' . $path_pinces . '/';

    $path_dos = 'render_jpeg/dos/' . $reference . '/' . $col . '/' . $poignets . '/' . $poches . '/' . $bas . '/' . $gorge . '/' . $path_dos . '/' . $path_epaulettes . '/' . $path_pinces . '/';

    if (!is_dir($path_face)) {
        mkdir($path_face, 0777, true);
    }
    if (!is_dir($path_zoom)) {
        mkdir($path_zoom, 0777, true);
    }
    if (!is_dir($path_dos)) {
        mkdir($path_dos, 0777, true);
    }

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
    $quality = 85;
    $t = time();
    $render_face_jpg = $path_face . 'image.jpg';
    $render_zoom_jpg = $path_zoom . 'image.jpg';
    $render_dos_jpg = $path_dos . 'image.jpg';
    /* $render = '';

      //INIT PNG COMPONENTS (FACE)
      //#vue face (bas + gorge)
      $tmp_file_name = $gorge . '_' . $bas;
      if ($poignets == "MC") {
      $tmp_file_name = $gorge['gorge'] . '_' . $bas['bas'] . '_MC';
      }
      $base_face_png = $output[$reference][$tmp_file_name]["png"];
      //>>>> ECHO image base_face_png
      $calque_base_face_png = '<img src="' . $base_face_png . '">';
      //$render .=  $calque_base_face_png;
      //#col
      $collar_png = $output[$reference][$col]["png"];
      if ($collar_png != '') {
      //>>>> ECHO image base_face_png
      $calque_collar_png = '<img src="' . $collar_png . '">';
      //$render .= $calque_collar_png;
      } else {
      $collar_png = '';
      }

      //#poignet
      $poignets_png = $output[$reference][$poignets]["png"];
      if ($poignets_png != '') {
      //>>>> ECHO image poignets_png
      $calque_poignets_png = '<img src="' . $poignets_png . '">';
      //$render .= $calque_poignets_png;
      } else {
      $poignets_png = '';
      }

      //#poches
      if ($poches != "0") {
      $poches_png = $output[$reference][$poches]["png"];
      if ($poches_png != '') {
      //>>>> ECHO image poignets_png
      $calque_poches_png = '<img src="' . $poches_png . '">';
      //$render .= $calque_poches_png;
      } else {
      $poches_png = '';
      }
      } else {
      $poches_png = '';
      }
      //#epaulettes
      if ($epaulettes) {
      $epaulettes_png = $output[$reference][$epaulettes]["png"];
      if ($epaulettes_png != '') {
      //>>>> ECHO image epaulettes_png
      $calque_epaulettes_png = '<img src="' . $epaulettes_png . '">';
      //$render .= $calque_epaulettes_png;
      }
      } else {
      $epaulettes_png = '';
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
      $calque_base_dos_png = '<img src="' . $base_dos_png . '">';
      //echo $calque_base_dos_png;
      } else {
      $base_dos_png != '';
      }

      //Merge PNG
      $final_render_file = time() . '.jpg';
      $command = 'python m.py2 ' . $final_render_file . ' ' . $quality . ' ' . $base_face_png . ' ' . $collar_png . ' ' . $poignets_png . ' ' . $poches_png . ' ' . $epaulettes_png . ' ';
      $out = exec($command);

      //PREPARE OUTPUT
      //$calque_final = '<img src="./test/' . $final_render_file . '">';
      //$render .= $calque_final;
      //$render .= '<input type="hidden" name="img_file_face" value="' . $final_render_file . '" id="img_file_face" />';
      //$render .= '<input type="hidden" name="img_file_dos" value="' . $render_dos_jpg . '" id="img_file_dos" />';
      //$render .= '<input type="hidden" name="img_file_zoom" value="' . $render_zoom_jpg . '" id="img_file_zoom" />';

      //echo $final_render_file; */
    //INIT FACE JPEG

    $white = './white.png';
    $final_img = imagecreatetruecolor($x, $y); //init final image
    imagealphablending($final_img, true); //prendre en compte la transparence
    imagesavealpha($final_img, true); //prendre en compte la transparence
    $black = imagecolorallocate($final_img, 255, 255, 255); //supprimer le fond noir
    imagecolortransparent($final_img, $black); //supprimer le fond noir
    $image_white = imagecreatefrompng($white); //creation des images composantes de la chemise
    imagecopy($final_img, $image_white, 0, 0, 0, 0, $x, $y); //fusionner avec un fond blanc
    imagedestroy($image_white); //libere la memoire
//INIT PNG COMPONENTS (FACE)
//#vue face (bas + gorge)
    $tmp_file_name = $gorge . '_' . $bas;
    if ($poignets == "MC") {
        $tmp_file_name = $gorge['gorge'] . '_' . $bas['bas'] . '_MC';
    }
    $base_face_png = $output[$reference][$tmp_file_name]["png"];
    if ($base_face_png) {
        $image_base = imagecreatefrompng($base_face_png);
        imagecopy($final_img, $image_base, 0, 0, 0, 0, $x, $y);
        imagedestroy($image_base);
    }
//#col
    $collar_png = $output[$reference][$col]["png"];
    if ($collar_png != '') {
        $image_col = imagecreatefrompng($collar_png);
        imagecopy($final_img, $image_col, 0, 0, 0, 0, $x, $y);
        imagedestroy($image_col);
    } else {
        $collar_png = '';
    }

//#baleine
//#tenue_col
//#poignet
    $poignets_png = $output[$reference][$poignets]["png"];
    if ($poignets_png != '') {
        $image_poignet = imagecreatefrompng($poignets_png);
        imagecopy($final_img, $image_poignet, 0, 0, 0, 0, $x, $y);
        imagedestroy($image_poignet);
    } else {
        $poignets_png = '';
    }

//#poches
    if ($poches != "0") {
        $poches_png = $output[$reference][$poches]["png"];
        if ($poches_png != '') {
            $image_poches = imagecreatefrompng($poches_png);
            imagecopy($final_img, $image_poches, 0, 0, 0, 0, $x, $y);
            imagedestroy($image_poches);
        } else {
            $poches_png = '';
        }
    }

//#epaulettes
    if ($epaulettes) {
        $epaulettes_png = $output[$reference][$epaulettes]["png"];
        if ($epaulettes_png != '') {
            $image_epaulettes = imagecreatefrompng($epaulettes_png);
            imagecopy($final_img, $image_epaulettes, 0, 0, 0, 0, $x, $y);
            imagedestroy($image_epaulettes);
        }
    } else {
        $epaulettes_png = '';
    }

//SAVE FINAl IMAGE (FACE) JPEG
    imagejpeg($final_img, $render_face_jpg, $quality);
    imagedestroy($final_img);

//GENERATE ZOOM JPEG
    $final_img_zoom = imagecreatetruecolor(($x / 2), ($y / 2));
    $image_face = imagecreatefromjpeg($render_face_jpg);
    imagecopy($final_img_zoom, $image_face, 0, 0, ($x / 4), 0, ($x / 2), ($y / 2));
    imagedestroy($image_face);
    imagejpeg($final_img_zoom, $render_zoom_jpg, $quality);
    imagedestroy($final_img_zoom);

//INIT DOS JPEG
    $white = './white.png';
    $final_img_dos = imagecreatetruecolor($x, $y); //init final image
    imagealphablending($final_img_dos, true); //prendre en compte la transparence
    imagesavealpha($final_img_dos, true); //prendre en compte la transparence
    $black = imagecolorallocate($final_img_dos, 255, 255, 255); //supprimer le fond noir
    imagecolortransparent($final_img_dos, $black); //supprimer le fond noir
    $image_white = imagecreatefrompng($white); //creation des images composantes de la chemise
    imagecopy($final_img_dos, $image_white, 0, 0, 0, 0, $x, $y); //fusionner avec un fond blanc
    imagedestroy($image_white); //libere la memoire
//INIT PNG COMPONENTS (DOS)
//#vue dos (bas + gorge)
    $tmp_file_name = 'D_' . $bas;
    if ($dos != "") {
        $tmp_file_name = 'D_' . $bas . '_' . $dos;
    }
    $base_dos_png = $output[$reference][$tmp_file_name]["png"];
    if ($base_dos_png != '') {
        $image_base = imagecreatefrompng($base_dos_png);
        imagecopy($final_img_dos, $image_base, 0, 0, 0, 0, $x, $y);
        imagedestroy($image_base);
    } else {
        $base_dos_png != '';
    }

//SAVE FINAl IMAGE (DOS) JPEG
    imagejpeg($final_img_dos, $render_dos_jpg, $quality);
    imagedestroy($final_img_dos);

    $update = 'update modeles set img_file_face="' . $render_face_jpg . '", img_file_zoom="' . $render_zoom_jpg . '", img_file_dos="' . $render_dos_jpg . '", jpeg_rendu = 1 where id_auto=' . $id;
    $bdd->exec($update);
}