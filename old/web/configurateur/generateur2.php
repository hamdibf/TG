<?php

require_once('../config/config.php');
session_start();
set_time_limit(300000);

$sql = 'select * from modeles where tissu_ref = "T1420" and col in ("CLA","ITA","ITR","ITO","CTW","BOU","DAN","ANG","ACIG","TEN")';
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

    if ($bas == "F") {
        $bas = "D";
    }
    $path_face = 'test2/' . $reference . '/' . $col . '/' . $poignets . '/' . $poches . '/' . $bas . '/' . $gorge . '/' . $path_epaulettes . '/';
    //$path_zoom = 'test2/zoom/' . $reference . '/' . $col . '/' . $poignets . '/' . $poches . '/' . $bas . '/' . $gorge . '/' . $path_dos . '/' . $path_epaulettes . '/' . $path_pinces . '/';
    //$path_dos = 'test2/dos/' . $reference . '/' . $poignets . '/' . $bas . '/' . $path_dos . '/' . $path_pinces . '/';

    if (!is_dir($path_face)) {
        mkdir($path_face, 0777, true);
    }
    /* if (!is_dir($path_zoom)) {
      mkdir($path_zoom, 0777, true);
      }
      if (!is_dir($path_dos)) {
      mkdir($path_dos, 0777, true);
      } */

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
    $quality = 100;
    $t = time();
    $render_face_jpg = $path_face . 'image.png';
    //$render_zoom_jpg = $path_zoom . 'image.jpg';
    //$render_dos_jpg = $path_dos . 'image.jpg';
    $render = '';

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
        $base_dos_png = '';
    }
    if ($poignets == 'MC') {
        $base_dos_png = '';
    }

    //Merge PNG
    $final_render_file = $path_face;
    $command = 'python m2.py ' . $final_render_file . ' ' . $quality . ' ' . $base_face_png . ' ' . $collar_png . ' ' . $poignets_png . ' ' . $poches_png . ' ' . $epaulettes_png . ' ';
    $out = exec($command);
    //$command = 'python m2.py ' . $final_render_file . ' ' . $quality . ' ' . $base_dos_png . ' ';
    /* $command = 'composite -gravity center ' . $collar_png . ' ' . $base_face_png . ' ' . $final_render_file . 'image.png';
      $out = exec($command);
      $command = 'composite -gravity center ' . $poignets_png . ' ' . $final_render_file . 'image.png' . ' ' . $final_render_file . 'image.png';
      $out = exec($command);
      $command = 'composite -gravity center ' . $poches_png . ' ' . $final_render_file . 'image.png' . ' ' . $final_render_file . 'image.png';
      $out = exec($command);
      $command = 'composite -gravity center ' . $epaulettes_png . ' ' . $final_render_file . 'image.png' . ' ' . $final_render_file . 'image.png';
      $out = exec($command); */
    //PREPARE OUTPUT
    //$calque_final = '<img src="./test/' . $final_render_file . '">';
    //$render .= $calque_final;
    //$render .= '<input type="hidden" name="img_file_face" value="' . $final_render_file . '" id="img_file_face" />';
    //$render .= '<input type="hidden" name="img_file_dos" value="' . $render_dos_jpg . '" id="img_file_dos" />';
    //$render .= '<input type="hidden" name="img_file_zoom" value="' . $render_zoom_jpg . '" id="img_file_zoom" />';
    /* try {
      //$command_compress = 'jpegoptim -m90 --strip-all /var/www/html/tg/old/web/configurateur/' . $path_face . 'image.jpg';
      $command_compress = 'optipng -o5 -strip all  /var/www/html/tg/old/web/configurateur/' . $path_face . 'image.png';
      $out1 = exec($command_compress);
      } catch (Exception $e) {
      echo 'Exception reçue : ' . $path_face . '/image.png \n';
      } */

    //$update = 'update modeles set img_file_face="' . $render_face_jpg . '", img_file_zoom="' . $render_zoom_jpg . '", img_file_dos="' . $render_dos_jpg . '", jpeg_rendu = 1 where id_auto=' . $id;
    //$bdd->exec($update);
}

