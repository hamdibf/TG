<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Panier Step 1 - TailorGeorge.fr</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>

        <!-- INFO-LIVRAISON -->
        <?php include("includes/info-livraison.php"); ?>

        <!-- NAVIGATION -->
        <?php include("includes/navigation.php"); ?>

        <!-- LIENS -->
        <?php
        if ($ds['client_id'] == 0) {
            $href_recap = "#";
            $href_coordonnees = "#";
        } else {
            $href_recap = "recapitulatif.html";
            $href_coordonnees = "panier-3.html";
        }
        ?>

        <!-- HEADER PANIER -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="header-panier">
                        <li><a class="header-panier-lien lien-actif" href="panier.html">1. Panier</a></li>
                        <li><a class="header-panier-lien" href="panier-2.html">2. Mesures</a></li>
                        <li><a class="header-panier-lien" href="<?php echo $href_coordonnees; ?>">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien" href="<?php echo $href_recap; ?>">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  PANIER  -->
        <?php
        $cols = ["CLA" => "Classique", "ITA" => "Italien", "ITR" => "Italien rond", "ITO" => "Italien ouvert", "CTW" => "Cutaway", "BOU" => "Boutonné", "DAN" => "Dandy", "ANG" => "Anglais", "ACIG" => "Napolitain", "TEN" => "Longues Pointes", "MAO" => "Mao", "MMO" => "Maomao", "OFR" => "Officier", "OFC" => "Officier carré", "REP" => "Indien", "INS" => "Inversé", "CAS" => "Cérémonie", "MBT" => "Mini boutonné", "MCL" => "Mini classique", "MRO" => "Mini rond", "INP" => "Mini inversé", "BOU" => "Boutonné 2 boutons", "ITO" => "Italien ouvert 2 boutons", "ACIG" => "Napolitain 2 boutons"];
        $tenue_col = ["R" => "Rigide", "S" => "Souple"];
        $baleine = ["A" => "Avec", "S" => "Sans", "ITA" => "Amovibles"];
        $poignets = ["A11" => "1 bouton", "A22" => "2 boutons", "A12" => "Ajustable", "B11" => "1 bouto", "B22" => "2 bouton", "B12" => "Ajustable", "PMR" => "Rond", "PMC" => "Carré", "N22" => "Portofino", "MC" => "Manches courtes"];
        $poches = ["0" => "Aucune poche", "1" => "Ronde", "1C" => "Carrée", "1G" => "Rabat", "1PS" => "Soufflet", "1SR" => "Aviateur", "2" => "Rondes (x2)", "2C" => "Carrées (x2)", "2G" => "Rabats (x2)", "2PS" => "Soufflets (x2)", "2SR" => "Aviateurs (x2)"];
        $bas = ["L" => "Arrondi", "D" => "Droit", "F" => "Droit avec fentes"];
        $gorge = ["S" => "Simple", "A" => "Américaine", "C" => "Cachée"];
        $dos = ["" => "Sans plis", "P" => "Pli central", "2P" => "Chevrons"];
        $pinces = ["P" => "Avec", "" => "Sans"];
        $boutonnieres = ["1938" => "Beige", "1801" => "Blanc mat", "1830" => "Bleu clair", "1966" => "Bleu marine", "1676" => "Bleu roi", "1835" => "Bordeaux", "1874" => "Gris", "1666" => "Jaune pale", "1455" => "Jaune vif", "1911" => "Mauve", "1800" => "Noir", "1965" => "Orange", "1818" => "Rose pale", "1113" => "Rose vif", "1747" => "Rouge", "1801" => "Ton sur ton", "1832" => "Vert fonce", "1647" => "Vert pomme", "1751" => "Vert vif", "1833" => "Violet"];

        $broderie_position = ["PCO" => "Milieu poche", "B4" => "4eme boutonnière", "PDR" => "Poignet droit", "PGA" => "Poignet gauche"];
        $doublure_col = ["-" => "Sans", "" => "Sans", "C" => "Col blanc", "EPC" => "Ext. pied col", "IPC" => "Int. pied col", "PCE" => "Full pied col", "CC" => "Full col"];
        $doublure_poignet = ["-" => "Sans", "" => "Sans", "PP" => "Poignets blancs", "IP" => "Int. poignets", "P" => "Full poignets"];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-offset-1 col-md-10 col-md-offset-1" >
                    <?php
                    $id = session_id();
                    $total = 0;
                    $sql = 'select * from tg_paniers_items where panier_id="' . $id . '"';
                    $query = $bdd->query($sql);
                    $img = "";
                    while ($data = $query->fetch()) {
                        $ss = 'select * from tailorgeorge_modele where id_auto="' . $data['product_id'] . '"';
                        $qq = $bdd->query($ss);
                        $dd = $qq->fetch();
                        $total += $dd["prix"] * $data["quantite"];
                        $img = end(explode("/", $dd["jpg_face"]));
                        $imgResult = "../../img/" . $img;
                        ?>
                        <div class="methode-mesure methode-medium" style="overflow: hidden;">
                            <div class="row">
                                <div class="col-xs-12 col-md-4" >
                                    <!--<div class="photo-article-panier" style="width: 410px; float: left;">-->
                                    <img src="<?php echo $imgResult; ?>" alt="" style="width: 410px; left: -50px; transform: translate(-70px);">
                                </div>
                                <!--<div class="description-article-panier" style="display: inline-block; float: left;">-->
                                <div class="col-xs-12 col-md-8">
                                    <div class="description-top">
                                        <p class="nom-article-panier"><?php echo $dd["h1"]; ?></p>
                                        <p class="prix-article-panier oswald-bold"><?php echo $dd["prix"]; ?>€</p>
                                    </div>
                                    <div class="description-bottom" style="margin-top: 20px;">
                                        <div id="btn_detail_<?php echo $dd['id_auto']; ?>"><p class="option-article" style="cursor:pointer;" onclick="showDetail('<?php echo $dd['id_auto']; ?>')">Voir le détail</p></div>
                                        <div><p class="option-article option-supprimer" onclick="deletePanierItem('<?php echo $data["id_auto"]; ?>')" style="cursor:pointer; float: right">Supprimer</p></div>
                                        <div><p class="option-article option-supprimer" onclick="editPanierItem('<?php echo $data["product_id"]; ?>',<?php echo $data["id_auto"]; ?>)" style="cursor:pointer; float: right">Modifier</p></div>
                                    </div>
                                    <div id="datail_<?php echo $dd['id_auto']; ?>" style="margin-top: 40px; font-size: 13px; display: none" >
                                        <div style="float: left; width: 180px; text-align: left; margin-top: 10px; margin-left: 10px;">
                                            <ul><p class="oswald-regular">TISSUS :</p>
                                                <li class="puce"><p><?php echo ' Référence : ' . $dd["tissu_ref"] . ' - ' . $dd["libelle"]; ?></p></li>
                                            </ul>
                                            <ul style="margin-top: 10px;">
                                                <p class="oswald-regular"><strong>COL :</strong></p>
                                                <li class="puce"><p><?php echo ' Type col : ' . $cols[$dd["col"]] ?></p></li>
                                                <li class="puce"><p><?php echo ' Tenue col : ' . $tenue_col[$dd["tenue_col"]] ?></p></li>
                                                <li class="puce"><p><?php echo ' Baleine : ' . $baleine[$dd["baleine"]] ?></p></li>
                                            </ul>
                                            <ul style="margin-top: 10px;"><p class="oswald-regular"><strong>POIGNETS : </strong></p>
                                                <li class="puce"><?php if ($dd["poignets"]) echo $poignets[$dd["poignets"]] ?></p></li>
                                            </ul>
                                            <ul style="margin-top: 10px;"><p class="oswald-regular"><strong>POCHES :</strong></p>
                                                <li class="puce"><?php echo $poches[$dd["poches"]] ?></li>
                                            </ul>
                                        </div>
                                        <div style="float: left; width: 180px; text-align: left; margin-top: 10px; margin-left: 10px;">
                                            <ul><p class="oswald-regular"><strong>DOS :</strong></p>
                                                <li class="puce"><?php echo ' Dos : ' . $dos[$dd["dos"]] ?></li>
                                                <li class="puce"><?php echo ' Pinces : ' . $pinces[$dd["pinces"]] ?></li>
                                            </ul>
                                            <ul style="margin-top: 10px;"><p class="oswald-regular"><strong>FINITION :</strong></p>
                                                <li class="puce"><p><?php if ($dd["dos"]) echo " Dos : " . $dos[$dd["dos"]] ?></p></li>
                                                <li class="puce"><p><?php if ($dd["pinces"]) echo " Pinces : " . $pinces[$dd["pinces"]] ?></p></li>
                                                <li class="puce"><p><?php if ($dd["gorge"]) echo " Gorge : " . $gorge[$dd["gorge"]] ?></p></li>
                                                <li class="puce"><p><?php if ($dd["bas_chemise"]) echo " Bas de chemise : " . $bas[$dd["bas_chemise"]] ?></p></li>
                                                <li class="puce"><p><?php if ($dd["epaulettes"]) echo " Epaulettes : " . $dd["epaulettes"] ?></p></li>
                                            </ul>
                                            <ul style="margin-top: 10px;"><p class="oswald-regular"><strong>BOUTONS :</strong></p>
                                                <li class="puce"><p><?php if ($dd["boutons"]) echo " Boutons : " . $dd["boutons"] ?></p></li>
                                                <li class="puce"><p><?php if ($dd["couture"]) echo " Boutonnière : " . $boutonnieres[$dd["couture"]] ?></p></li>
                                            </ul>
                                        </div>
                                        <div style="float: left; width: 180px; text-align: left; margin-top: 10px; margin-left: 10px;">
                                            <ul><p class="oswald-regular"><strong>BRODERIE :</strong></p>
                                                <li class="puce"><p><?php
                                                        if (!empty($dd["broderie"]))
                                                            echo " Motif : " . $dd["broderie"];
                                                        else
                                                            echo "Pas de Monogramme"
                                                            ?></p></li>
                                                <li class="puce"><p><?php if (!empty($dd["broderie_couleur"])) echo " Couleur : " . $dd["broderie_couleur"] ?></p></li>
                                                <li class="puce"><p><?php if (!empty($dd["broderie_style"])) echo " Style : " . $dd["broderie_style"] ?></p></li>
                                                <li class="puce"><p><?php if (!empty($dd["broderie_emplacement"])) echo " Emplacement : " . $broderie_position[$dd["broderie_emplacement"]] ?></p></li>
                                            </ul>
                                            <ul style="margin-top: 10px;"><p class="oswald-regular"><strong>DOUBLURE :</strong></p>
                                                <li class="puce"><p><?php if ($dd["tissu_doublure_ref"]) echo " Tissus : " . $dd["tissu_doublure_ref"] ?></p></li>
                                                <li class="puce"><p>
                                                        <?php
                                                        if (!empty($dd["doublure_col"]))
                                                            echo " Doublure col : " . $doublure_col[$dd["doublure_col"]];
                                                        else
                                                            echo " Doublure col : Sans";
                                                        ?></p></li>
                                                <li class="puce"><p>
                                                        <?php
                                                        if (!empty($dd["doublure_poignets"]))
                                                            echo " Doublure poignets : " . $doublure_poignet[$dd["doublure_poignets"]];
                                                        else
                                                            echo " Doublure poignets : Sans";
                                                        ?></p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row" style="font-size: 13px; text-align: right">
                                        <div class="col-xs-offset-5 col-xs-7 col-sm-offset-8 col-sm-4 col-md-offset-8 col-md-4" style="margin-top: 100px;">
                                            <!--<div style="margin-top: 100px; font-size: 13px; text-align: right">-->
                                            <div style="float: left;">Quantité : <span id="span_qte_<?php echo $data['id_auto']; ?>"><?php echo $data['quantite']; ?></span></div>
                                            <div class="oswald-bold btn_plus" onclick="update_total(<?php echo $data['id_auto']; ?>,<?php echo $dd['prix']; ?>, 'up');">+</div>
                                            <div class="oswald-bold btn_plus" onclick="update_total(<?php echo $data['id_auto']; ?>,<?php echo -abs($dd['prix']); ?>, 'down');">-</div>
                                            <input type="hidden" id="qte_<?php echo $data['id_auto']; ?>" name="qte_<?php echo $data['id_auto']; ?>" value="<?php echo $data['quantite']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-8 col-md-4" style="">
                    <div class="prix-panier-container">
                        <ul class="prix-panier">
                            <li>Total de vos achat <span class="li-span-tarif" id="totalSansLivr"><?php echo $total; ?>€</span></li>
                            <li>Frais de livraison <span class="li-span-tarif">OFFERTE</span></li>
                            <li>Montal total ttc <span class="li-span-tarif" id="totalAvecLivr"><?php echo $total; ?>€</span></li>
                        </ul>
                        <a href="panier-2.html" class="btn-rose btn-block">Valider mon panier</a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
        </div>
        <div id=formToSubmit></div>
        <!-- JAVASCRIPT -->
        <?php include("includes/footer.php"); ?>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>

    </body>

</html>