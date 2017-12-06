<?php

require_once('../config/config.php');
session_start();
set_time_limit(300000);

$sql = 'select * from modeles where tissu_ref = "T1420" and type = "dos"';
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

    if ($pinces == '')
        $path_pinces = "-";
    else
        $path_pinces = $pinces;

    if ($bas == "F") {
        $bas = "D";
    }
    $poignets_path = 'MC';
    if ($poignets != 'MC') {
        $poignets_path = 'ML';
    }

    $path_dos = 'test2/dos/' . $reference . '/' . $poignets_path . '/' . $bas . '/' . $path_dos . '/' . $path_pinces . '/';

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
    $quality = 100;
    $t = time();

    $render_dos_jpg = $path_dos . 'image.png';
    $render = '';

    //#poignet
    /* $poignets_png = $output[$reference][$poignets]["png"];
      if ($poignets_png != '') {
      //>>>> ECHO image poignets_png
      $calque_poignets_png = '<img src="' . $poignets_png . '">';
      //$render .= $calque_poignets_png;
      } else {
      $poignets_png = '';
      } */

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
    $final_render_file = $path_dos;
    //$command = 'python m2.py ' . $final_render_file . ' ' . $quality . ' ' . $base_face_png . ' ' . $collar_png . ' ' . $poignets_png . ' ' . $poches_png . ' ' . $epaulettes_png . ' ';

    $command = 'python m3.py ' . $final_render_file . ' ' . $quality . ' ' . $base_dos_png;
    $out = exec($command);
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


