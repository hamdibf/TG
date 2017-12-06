<?php

require_once('../config/config.php');
session_start();
$sessionid = session_id();
set_time_limit(30000);

$ch = curl_init('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "couleur=all&tissage=all&motif=all");
$data = curl_exec($ch);
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources
//encode output
$output = json_decode($data, true);

$cols = ["CLA", "ITA", "ITR", "ITO", "CTW", "BOU", "DAN", "ANG", "ACIG", "TEN", "MAO", "MMO", "OFR", "OFC", "REP", "INS", "CAS", "MBT", "MCL", "MRO", "INP", "BOU", "ITO", "ACIG"];
$tenue_col = ["R", "S"];
$baleine = ["A", "S", "ITA"];
$poignets = ["ML", "MC"];
$poches = ["0", "1", "1C", "1G", "1PS", "1SR", "2", "2C", "2G", "2PS", "2SR"];
$bas = ["L", "D"]; //, "F"];
$epaulettes = ["", "EPO"];
$gorges = ["S", "A", "C"];
$dos = ["", "P", "2P"];
$pinces = ["P", ""];
$boutonnieres = ["1938" => "Beige", "1801" => "Blanc mat", "1830" => "Bleu clair", "1966" => "Bleu marine", "1676" => "Bleu roi", "1835" => "Bordeaux", "1874" => "Gris", "1666" => "Jaune pale", "1455" => "Jaune vif", "1911" => "Mauve", "1800" => "Noir", "1965" => "Orange", "1818" => "Rose pale", "1113" => "Rose vif", "1747" => "Rouge", "1801" => "Ton sur ton", "1832" => "Vert fonce", "1647" => "Vert pomme", "1751" => "Vert vif", "1833" => "Violet"];
$i = 0;

//foreach ($output["value"] as $cle => $tissu) {
//    foreach ($cols as $col) {
//        foreach ($poignets as $poignet) {
//            foreach ($poches as $poche) {
//                foreach ($epaulettes as $epaulette) {
//                    foreach ($bas as $bas1) {
//                        foreach ($gorges as $gorge) {
//                            //foreach ($dos as $dos1) {
//                            //foreach ($pinces as $pince) {
//                            $sql = "INSERT INTO `modeles` (`tissu_ref`, `tissu_doublure_ref`, `prix`, `categorie`, `col`, `tenue_col`, `baleine`, `doublure_col`, `hp`, `poignets`, `doublure_poignets`, `dos`, `pinces`, `bas_chemise`, `gorge`, `poches`, `epaulettes`, `boutons`, `couture`, `img_file_face`, `img_file_zoom`, `img_file_dos`, `jpg_face`, `jpg_dos`, `jpg_zoom`, `api_url`, `api_titre`, `api_prix`, `api_description`, `api_h1`, `api_couleur`, `api_tissage`, `api_dessin`, `type`, `jpeg_rendu`) VALUES ('" . $tissu["reference"] . "', '', " . $tissu["prix"] . ", '', '" . $col . "', '', '', '', '', '" . $poignet . "', '', '', '', '" . $bas1 . "', '" . $gorge . "', '" . $poche . "', '" . $epaulette . "', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','face', 0)";
//                            $output = $bdd->exec($sql);
//                            //}
//                            //}
//                        }
//                    }
//                }
//            }
//        }
//    }
//}
foreach ($output["value"] as $cle => $tissu) {
    foreach ($poignets as $poignet) {
        foreach ($bas as $bas1) {
            foreach ($dos as $dos1) {
                foreach ($pinces as $pince) {
                    $sql = "INSERT INTO `modeles` (`tissu_ref`, `tissu_doublure_ref`, `prix`, `categorie`, `col`, `tenue_col`, `baleine`, `doublure_col`, `hp`, `poignets`, `doublure_poignets`, `dos`, `pinces`, `bas_chemise`, `gorge`, `poches`, `epaulettes`, `boutons`, `couture`, `img_file_face`, `img_file_zoom`, `img_file_dos`, `jpg_face`, `jpg_dos`, `jpg_zoom`, `api_url`, `api_titre`, `api_prix`, `api_description`, `api_h1`, `api_couleur`, `api_tissage`, `api_dessin`, `type`, `jpeg_rendu`) VALUES ('" . $tissu["reference"] . "', '', " . $tissu["prix"] . ", '', '', '', '', '', '', '" . $poignet . "', '', '" . $dos1 . "', '" . $pince . "', '" . $bas1 . "', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','dos', 0)";
                    $output = $bdd->exec($sql);
                }
            }
        }
    }
}

echo $sql;
?>