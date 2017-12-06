<?php
session_start();
require_once('../config/config.php');
require_once('../config/session.php');
TgSession::add($bdd);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tailor George</title>
        <meta name="description" content="Tailor George">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Crimson+Text" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- scripts area -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <noscript>Vous devez avoir le javascript d'activé pour utiliser cette page</noscript>
        <?php
        include("includes/navigation.php");
        if (!empty($_POST["poignets"])) {
            ?>
            <input type="hidden" id="fromPost" name="fromPost" value="1">
        <?php } else {
            ?>
            <input type="hidden" id="fromPost" name="fromPost" value="0">
            <?php
        }
        if (!empty($_POST["id"]))
            $p_id = $_POST["id"];
        else
            $p_id = "";
        if (!empty($_POST["reference"]))
            $p_reference = $_POST["reference"];
        else if (!empty($_POST["tissu_ref"]))
            $p_reference = $_POST["tissu_ref"];
        else
            $p_reference = "T1420";
        if (!empty($_POST["api_code"]))
            $p_code = $_POST["api_code"];
        else if (!empty($_POST["code"]))
            $p_code = $_POST["code"];
        else
            $p_code = "T1420";
        if (!empty($_POST["api_url"]))
            $p_url = $_POST["api_url"];
        else
            $p_url = "twill-90s-bleu-barbeau-uni-T1420";
        if (!empty($_POST["api_titre"]))
            $p_titre = $_POST["api_titre"];
        else
            $p_titre = "Twill 90s bleu barbeau uni - Chemise sur mesure - T1420";
        if (!empty($_POST["api_prix"]))
            $p_prix = $_POST["api_prix"];
        else
            $p_prix = "89";
        if (!empty($_POST["api_description"]))
            $p_description = $_POST["api_description"];
        else
            $p_description = "Twill 90s bleu barbeau uni - chemise sur mesure - T1420";
        if (!empty($_POST["api_h1"]))
            $p_h1 = $_POST["api_h1"];
        else
            $p_h1 = "Twill 90s bleu barbeau uni - T1420";
        if (!empty($_POST["api_couleur"]))
            $p_couleur = $_POST["api_couleur"];
        else
            $p_couleur = "rouge";
        if (!empty($_POST["api_tissage"]))
            $p_tissage = $_POST["api_tissage"];
        else
            $p_tissage = "oxford";
        if (!empty($_POST["api_dessin"]))
            $p_dessin = $_POST["api_dessin"];
        else
            $p_dessin = "carreaux";
        if (!empty($_POST["hp"]))
            $p_hp = $_POST["hp"];
        else
            $p_hp = "S";
        if (!empty($_POST["col"]))
            $p_col = $_POST["col"];
        else
            $p_col = "CLA";
        if (!empty($_POST["baleine"]))
            $p_baleine = $_POST["baleine"];
        else
            $p_baleine = "A";
        if (!empty($_POST["tenue_col"]))
            $p_tenue_col = $_POST["tenue_col"];
        else
            $p_tenue_col = "R";

        if (!empty($_POST["poignets"])) {
            $p_poignets = $_POST["poignets"];
            if ($p_poignets == "MC") {
                $path_poignets = "MC";
            } else {
                $path_poignets = "ML";
            }
        } else {
            $p_poignets = "A11";
            $path_poignets = "ML";
        }
        if (!empty($_POST["poches"]))
            $p_poches = $_POST["poches"];
        else
            $p_poches = "0";
        if (!empty($_POST["epaulettes"])) {
            $p_epaulettes = $_POST["epaulettes"];
            $path_epaulettes = $_POST["epaulettes"];
        } else {
            $p_epaulettes = "";
            $path_epaulettes = "-";
        }
        if (!empty($_POST["bas"]))
            $p_bas = $_POST["bas"];
        else
            $p_bas = "L";
        if (!empty($_POST["gorge"]))
            $p_gorge = $_POST["gorge"];
        else
            $p_gorge = "S";
        if (!empty($_POST["dos"])) {
            $p_dos = $_POST["dos"];
            $path_dos = $_POST["dos"];
        } else {
            $p_dos = "";
            $path_dos = "-";
        }
        if (!empty($_POST["pinces"])) {
            $p_pinces = $_POST["pinces"];
            $path_pinces = $_POST["pinces"];
        } else {
            $p_pinces = "";
            $path_pinces = "-";
        }
        if (!empty($_POST["boutons"]))
            $p_boutons = $_POST["boutons"];
        else
            $p_boutons = "standard";
        if (!empty($_POST["couture"]))
            $p_couture = $_POST["couture"];
        else
            $p_couture = "1801";
        if (!empty($_POST["tissu_doublure_reference"]))
            $p_tissu_doublure_reference = $_POST["tissu_doublure_reference"];
        else if (!empty($_POST["tissu_doublure_ref"]))
            $p_tissu_doublure_reference = $_POST["tissu_doublure_ref"];
        else
            $p_tissu_doublure_reference = "";
        if (!empty($_POST["tissu_doublure_code"]))
            $p_tissu_doublure_code = $_POST["tissu_doublure_code"];
        else
            $p_tissu_doublure_code = "";
        if (!empty($_POST["tissu_doublure_id"]))
            $p_tissu_doublure_id = $_POST["tissu_doublure_id"];
        else
            $p_tissu_doublure_id = "";
        if (!empty($_POST["doublure_col"]))
            $p_doublure_col = $_POST["doublure_col"];
        else
            $p_doublure_col = "";
        if (!empty($_POST["doublure_poignets"]))
            $p_doublure_poignets = $_POST["doublure_poignets"];
        else
            $p_doublure_poignets = "";
        if (!empty($_POST["broderie"]))
            $p_broderie = $_POST["broderie"];
        else
            $p_broderie = "";
        if (!empty($_POST["broderie_couleur"]))
            $p_broderie_couleur = $_POST["broderie_couleur"];
        else
            $p_broderie_couleur = "";
        if (!empty($_POST["broderie_style"]))
            $p_broderie_style = $_POST["broderie_style"];
        else
            $p_broderie_style = "";
        if (!empty($_POST["broderie_emplacement"]))
            $p_broderie_emplacement = $_POST["broderie_emplacement"];
        else
            $p_broderie_emplacement = "";
        $cols = ["CLA" => "Classique", "ITA" => "Italien", "ITR" => "Italien rond", "ITO" => "Italien ouvert", "CTW" => "Cutaway", "BOU" => "Boutonné", "DAN" => "Dandy", "ANG" => "Anglais", "ACIG" => "Napolitain", "TEN" => "Longues Pointes", "MAO" => "Mao", "MMO" => "Maomao", "OFR" => "Officier", "OFC" => "Officier carré", "REP" => "Indien", "INS" => "Inversé", "CAS" => "Cérémonie", "MBT" => "Mini boutonné", "MCL" => "Mini classique", "MRO" => "Mini rond", "INP" => "Mini inversé", "BOU" => "Boutonné 2 boutons", "ITO" => "Italien ouvert 2 boutons", "ACIG" => "Napolitain 2 boutons"];
        $poignets = ["A11" => "1 bouton", "A22" => "2 boutons", "A12" => "Ajustable", "B11" => "1 bouto", "B22" => "2 bouton", "B12" => "Ajustable", "PMR" => "Rond", "PMC" => "Carré", "N22" => "Portofino", "MC" => "Manches courtes"];
        $poches = ["0" => "Aucune poche", "1" => "Ronde", "1C" => "Carrée", "1G" => "Rabat", "1PS" => "Soufflet", "1SR" => "Aviateur", "2" => "Rondes (x2)", "2C" => "Carrées (x2)", "2G" => "Rabats (x2)", "2PS" => "Soufflets (x2)", "2SR" => "Aviateurs (x2)"];
        $bas = ["L" => "Arrondi", "D" => "Droit", "F" => "Droit avec fentes"];
        $dos = ["" => "Sans plis", "P" => "Pli central", "2P" => "Chevrons"];
        $boutons = ["standard" => "Standard", "anthracite" => "anthracite", "blanc" => "Blanc", "blanc_epais" => "Blanc épais", "bleu_ciel" => "Bleu ciel", "bleu_fonce" => "Bleu fonce", "bleu_gris" => "Bleu gris", "brun_epais" => "Brun épais", "corne_clair" => "Corne clair", "corne_fonce" => "Corne_ fonce", "jaune" => "Jaune", "nacre" => "Nacre", "noir" => "Noir", "noir_epais" => "Noir épais", "rouge" => "Rouge", "ton_sur_ton" => "Ton sur ton", "vert" => "Vert"];
        $boutonnieres = ["1938" => "Beige", "1801" => "Blanc mat", "1830" => "Bleu clair", "1966" => "Bleu marine", "1676" => "Bleu roi", "1835" => "Bordeaux", "1874" => "Gris", "1666" => "Jaune pale", "1455" => "Jaune vif", "1911" => "Mauve", "1800" => "Noir", "1965" => "Orange", "1818" => "Rose pale", "1113" => "Rose vif", "1747" => "Rouge", "1801" => "Ton sur ton", "1832" => "Vert fonce", "1647" => "Vert pomme", "1751" => "Vert vif", "1833" => "Violet"];
        $broderie_position = ["" => "Sans broderie", "PCO" => "Milieu poche", "B4" => "4eme boutonnière", "PDR" => "Poignet droit", "PGA" => "Poignet gauche"];
        $doublure_col = ["-" => "Sans", "" => "Sans", "C" => "Col blanc", "EPC" => "Ext. pied col", "IPC" => "Int. pied col", "PCE" => "Full pied col", "CC" => "Full col"];
        $doublure_poignet = ["-" => "Sans", "" => "Sans", "PP" => "Poignets blancs", "IP" => "Int. poignets", "P" => "Full poignets"];
        ?>
        <section id="shirt">
            <header><img class="menu" src="img/icons/menu.svg" width="20">
                <div class="logo">TG</div>
                <button class="buy">
                    <img src="img/icons/cart.svg" width="20">
                </button>
                <div class="price">89€</div><br>
                <!--                <div class="delivery">Livraison gratuite</div>-->
            </header>

            <div id="shirt-container">

                <img style="position:fixed;top:0;left:0;width: 48px;z-index: 9999;display:none;" id="load_img" src="img/icons/curved-bars.svg">
                <?php ?>
                <img src="<?php echo "./test2/" . $p_reference . "/" . $p_col . "/" . $p_poignets . "/" . $p_poches . "/" . $p_bas . "/" . $p_gorge . "/" . $path_epaulettes . "/image.png"; ?>" id="img_face">
                <input type="hidden" id="img_file_face" name="img_file_face" value="<?php echo "./test2/" . $p_reference . "/" . $p_col . "/" . $p_poignets . "/" . $p_poches . "/" . $p_bas . "/" . $p_gorge . "/" . $path_epaulettes . "/image.png"; ?>">
                <input type="hidden" id="img_file_dos" name="img_file_dos" value="<?php echo "./test2/dos/" . $p_reference . "/" . $p_col . "/" . $path_poignets . "/" . $p_poches . "/" . $p_bas . "/" . $p_gorge . "/" . $path_epaulettes . "/image.png"; ?>">
                <input type="hidden" id="img_file_zoom" name="img_file_zoom" value="./start.png">

                <div class="base">
                    <img>
                </div>
                <div class="collar">
                    <img>
                </div>
                <div class="wrists">
                    <img>
                </div>
                <div class="pockets">
                    <img>
                </div>
                <div class="epaulettes">
                    <img>
                </div>
                <div class="buttons_throat">
                    <img>
                </div>
                <div class="buttons_wrists">
                    <img>
                </div>
                <div class="buttons_epaulettes">
                    <img>
                </div></div>

            <!--
<div id="shirt-container">

    <div class="base">
        <img>
    </div>
    <div class="collar">
        <img>
    </div>
    <div class="wrists">
        <img>
    </div>
    <div class="pockets">
        <img>
    </div>
    <div class="epaulettes">
        <img>
    </div>
    <div class="buttons_throat">
        <img>
    </div>
    <div class="buttons_wrists">
        <img>
    </div>
    <div class="buttons_epaulettes">
        <img>
    </div>
</div>
            -->


            <footer>
                <img class="menu" src="img/icons/menu.svg" width="20"  onclick="openMenulateral()"/>
                <a href="./../"><img src="img/icons/logo.svg"></a>
                <div id="price" class="price" style="position: absolute;right: 15px; font-family: 'Oswald', sans-serif;font-weight: 700; font-size: 2.3em; line-height: 1.4em; color: #da0404;">89€</div><br>
                <!--                <div class="delivery" style="position: absolute;right: 15px;">Livraison gratuite</div>-->
            </footer>
        </section>
        <section id="configurator">
            <button class="back hidden">
                <img src="img/icons/back.svg" height="15">
            </button>
            <nav class="hidden">
                <ul>
                    <li class="item-1 active" data-id="1">
                        <div class="img" onclick="view_chemise('face')"></div>
                        tissus
                    </li>
                    <li class="item-2" data-id="2">
                        <div class="img" onclick="view_chemise('face')"></div>
                        cols
                    </li>
                    <li class="item-3" data-id="3">
                        <div class="img" onclick="view_chemise('face')"></div>
                        poignets
                    </li>
                    <li class="item-4" data-id="4">
                        <div class="img" onclick="view_chemise('face')"></div>
                        poches
                    </li>
                    <li class="item-5" data-id="5">
                        <div class="img" onclick="view_chemise('face')"></div>
                        bas
                    </li>
                    <li class="item-6" data-id="6">
                        <div class="img" onclick="view_chemise('dos')"></div>
                        dos
                    </li>
                    <li class="item-7" data-id="7">
                        <div class="img" onclick="view_chemise('face')"></div>
                        boutons
                    </li>
                    <li class="item-8" data-id="8">
                        <div class="img" onclick="view_chemise('face')"></div>
                        broderies
                    </li>
                    <li class="item-9" data-id="9">
                        <div class="img" onclick="view_chemise('face')"></div>
                        doublures
                    </li>
                </ul>
            </nav>
            <div class="content">
                <section class="step" id="step-0">
                    <h2 class="first"> Cliquez sur un élément pour le modifier</h2><br>
                    <div class="parts">
                        <div class="part summary-fabric" data-id="1" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-collar" data-id="2" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-wrists" data-id="3" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-pockets" data-id="4" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-bottom" data-id="5" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-back" data-id="6" data-category="summary">
                            <div class="img" onclick="view_chemise('dos')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-buttons" data-id="7" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-embroidery_position" data-id="8" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src=""></div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-lining" data-id="9" data-category="summary">
                            <div class="img" onclick="view_chemise('face')">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-1">
                    <header>
                        <div class="name">Tissus</div>
                        <div class="close">x</div>
                    </header>
                    <form>
                        <div class="select first">
                            <select name="couleur">
                                <option value="">tous</option>
                                <option value="blanc">blanc</option>
                                <option value="beige">beige</option>
                                <option value="gris">gris</option>
                                <option value="noir">noir</option>
                                <option value="bleu">bleu</option>
                                <option value="marron">marron</option>
                                <option value="vert">vert</option>
                                <option value="rouge">rouge</option>
                                <option value="rose">rose</option>
                                <option value="violet">violet</option>
                                <option value="orange">orange</option>
                                <option value="jaune">jaune</option>
                            </select>
                            <div class="select-custom">
                                <div class="selected-item">
                                    <span class="value">Couleur</span>
                                    <img src="img/icons/down.svg">
                                </div>
                                <ul></ul>
                            </div>
                        </div>
                        <div class="select">
                            <select name="motif">
                                <option value="">tous</option>
                                <option value="unis">unis</option>
                                <option value="rayes">rayes</option>
                                <option value="carreaux">carreaux</option>
                                <option value="ecossais">ecossais</option>
                                <option value="faitaisies">faitaisies</option>
                                <option value="best">best</option>
                            </select>
                            <div class="select-custom">
                                <div class="selected-item">
                                    <span class="value">Motif</span>
                                    <img src="img/icons/down.svg">
                                </div>
                                <ul></ul>
                            </div>
                        </div>
                        <div class="select last">
                            <select name="tissage">
                                <option value="">tous</option>
                                <option value="popeline">popeline</option>
                                <option value="oxford">oxford</option>
                                <option value="flanelle">flanelle</option>
                                <option value="lin">lin</option>
                                <option value="twill">twill</option>
                                <option value="chevron">chevron</option>
                            </select>
                            <div class="select-custom">
                                <div class="selected-item">
                                    <span class="value">Tissage</span>
                                    <img src="img/icons/down.svg">
                                </div>
                                <ul></ul>
                            </div>
                        </div>
                    </form>
                    <h2><span></span>Tissus</strong></h2>
                    <section id="fabrics-container"></section>
                </section>
                <section class="hidden step" id="step-2">
                    <header>
                        <div class="name">Cols</div>
                        <div class="close">x</div>
                    </header>
                    <form>
                        <div class="select">
                            <select name="col">
                                <option value="R">Rigide</option>
                                <option value="S">Souple</option>
                            </select>
                            <div class="select-custom">
                                <div class="selected-item">
                                    <span class="value">Col</span>
                                    <img src="img/icons/down.svg">
                                </div>
                                <ul></ul>
                            </div>
                        </div>
                        <div class="select">
                            <select name="baleine">
                                <option value="A">Avec</option>
                                <option value="S">Sans</option>
                                <option value="ITA">Amovibles</option>
                            </select>
                            <div class="select-custom">
                                <div class="selected-item">
                                    <span class="value">Baleine</span>
                                    <img src="img/icons/down.svg">
                                </div>
                                <ul></ul>
                            </div>
                        </div>
                    </form>
                    <h2>Cols 1 bouton</h2>
                    <div class="parts">
                        <div class="part active" data-category="collar" data-hp="S" data-id="CLA" data-label="Classique">
                            <div class="img">
                                <img src="img/pictos/col_CLA.svg" width="85">
                            </div>
                            <div class="name">Classique</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="ITA" data-label="Italien">
                            <div class="img"><img src="img/pictos/col_ITA.svg" width="85"></div>
                            <div class="name">Italien</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="ITR" data-label="Italien rond">
                            <div class="img"><img src="img/pictos/col_ITR.svg" width="85"></div>
                            <div class="name">Italien rond</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="ITO" data-label="Italien ouvert">
                            <div class="img"><img src="img/pictos/col_ITO.svg" width="85"></div>
                            <div class="name">Italien ouvert</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="CTW" data-label="Cutaway">
                            <div class="img"><img src="img/pictos/col_CTW.svg" width="85"></div>
                            <div class="name">Cutaway</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="BOU" data-label="Boutonné">
                            <div class="img"><img src="img/pictos/col_BOU.svg" width="85"></div>
                            <div class="name">Boutonné</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="DAN" data-label="Dandy">
                            <div class="img"><img src="img/pictos/col_DAN.svg" width="85"></div>
                            <div class="name">Dandy</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="ANG" data-label="Anglais">
                            <div class="img"><img src="img/pictos/col_ANG.svg" width="85"></div>
                            <div class="name">Anglais</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="ACIG" data-label="Napolitain">
                            <div class="img"><img src="img/pictos/col_ACIG.svg" width="85"></div>
                            <div class="name">Napolitain</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-id="TEN" data-label="Longues Pointes">
                            <div class="img">
                                <img src="img/pictos/col_TEN.svg" width="85">
                            </div>
                            <div class="name">Longues Pointes</div>

                        </div>

                    </div>
                    <h2>Cols spéciaux</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-hp="S" data-label="Mao" data-id="MAO">
                            <div class="img"><img src="img/pictos/col_MAO.svg" width="85"></div>
                            <div class="name">Mao</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Maomao" data-id="MMO">
                            <div class="img"><img src="img/pictos/col_MMO.svg" width="85"></div>
                            <div class="name">Maomao</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Officier" data-id="OFR">
                            <div class="img"><img src="img/pictos/col_OFR.svg" width="85"></div>
                            <div class="name">Officier</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Officier carré" data-id="OFC">
                            <div class="img"><img src="img/pictos/col_OFC.svg" width="85"></div>
                            <div class="name">Officier carré</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Indien" data-id="REP">
                            <div class="img"><img src="img/pictos/col_REP.svg" width="85"></div>
                            <div class="name">Indien</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Inversé" data-id="INS">
                            <div class="img"><img src="img/pictos/col_INS.svg" width="85"></div>
                            <div class="name">Inversé</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Cérémonie" data-id="CAS">
                            <div class="img"><img src="img/pictos/col_CAS.svg" width="85"></div>
                            <div class="name">Cérémonie</div>

                        </div>

                    </div>
                    <h2>Minis cols</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-hp="S" data-label="Mini boutonné" data-id="MBT">
                            <div class="img"><img src="img/pictos/col_MBT.svg" width="85"></div>
                            <div class="name">Mini boutonné</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Mini classique" data-id="MCL">
                            <div class="img"><img src="img/pictos/col_MCL.svg" width="85"></div>
                            <div class="name">Mini classique</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Mini rond" data-id="MRO">
                            <div class="img"><img src="img/pictos/col_MRO.svg" width="85"></div>
                            <div class="name">Mini rond</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="S" data-label="Mini inversé" data-id="INP">
                            <div class="img"><img src="img/pictos/col_INP.svg" width="85"></div>
                            <div class="name">Mini inversé</div>

                        </div>

                    </div>
                    <h2>Cols 2 boutons</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-hp="G2" data-label="Boutonné 2 boutons" data-id="BOU">
                            <div class="img"><img src="img/pictos/col_BOUG2.svg" width="85"></div>
                            <div class="name">Boutonné 2 boutons</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="G2" data-label="Italien ouvert 2 boutons" data-id="ITO">
                            <div class="img"><img src="img/pictos/col_ITOG2.svg" width="85"></div>
                            <div class="name">Italien ouvert 2 boutons</div>

                        </div>
                        <div class="part" data-category="collar" data-hp="G2" data-label="Napolitain 2 boutons" data-id="ACIG">
                            <div class="img"><img src="img/pictos/col_ACIG2.svg" width="85"></div>
                            <div class="name">Napolitain 2 boutons</div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-3">
                    <header>
                        <div class="name">Poignets</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Poignets ronds</h2>
                    <div class="parts">
                        <div class="part active" data-category="wrists" data-label="1 bouton" data-id="A11">
                            <div class="img"><img src="img/pictos/poignet_A11.svg" width="85"></div>
                            <div class="name">1 bouton</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="2 boutons" data-id="A22">
                            <div class="img"><img src="img/pictos/poignet_A22.svg" width="85"></div>
                            <div class="name">2 boutons</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="Ajustable" data-id="A12">
                            <div class="img"><img src="img/pictos/poignet_A12.svg" width="85"></div>
                            <div class="name">Ajustable</div>

                        </div>

                    </div>
                    <h2>Poignets biais</h2>
                    <div class="parts">
                        <div class="part" data-category="wrists" data-label="1 bouton" data-id="B11">
                            <div class="img"><img src="img/pictos/poignet_B11.svg" width="85"></div>
                            <div class="name">1 bouton</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="2 boutons" data-id="B22">
                            <div class="img"><img src="img/pictos/poignet_B22.svg" width="85"></div>
                            <div class="name">2 boutons</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="Ajustable" data-id="B12">
                            <div class="img"><img src="img/pictos/poignet_B12.svg" width="85"></div>
                            <div class="name">Ajustable</div>

                        </div>

                    </div>
                    <h2>Poignets mousquetaires</h2>
                    <div class="parts">
                        <div class="part" data-category="wrists" data-label="Rond" data-id="PMR">
                            <div class="img"><img src="img/pictos/poignet_PMR.svg" width="85"></div>
                            <div class="name">Rond</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="Carré" data-id="PMC">
                            <div class="img"><img src="img/pictos/poignet_PMC.svg" width="85"></div>
                            <div class="name">Carré</div>

                        </div>
                        <div class="part" data-category="wrists" data-label="Portofino" data-id="N22">
                            <div class="img"><img src="img/pictos/poignet_N22.svg" width="85"></div>
                            <div class="name">Portofino</div>

                        </div>

                    </div>
                    <h2>Manches courtes</h2>
                    <div class="parts">
                        <div class="part" data-category="wrists" data-label="Manches courtes" data-id="MC">
                            <div class="img"><img src="img/pictos/poignet_MC.svg" width="85"></div>
                            <div class="name">Manches courtes</div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-4">
                    <header>
                        <div class="name">Poches</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Poches</h2>
                    <div class="parts">
                        <div class="part active" data-category="pockets" data-label="Aucune poche" data-id="0">
                            <div class="img"><img src="img/pictos/poche_0.svg" width="85"></div>
                            <div class="name">Aucune poche</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Ronde" data-id="1">
                            <div class="img"><img src="img/pictos/poche_1.svg" width="85"></div>
                            <div class="name">Ronde</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Carrée" data-id="1C">
                            <div class="img"><img src="img/pictos/poche_1C.svg" width="85"></div>
                            <div class="name">Carrée</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Rabat" data-id="1G">
                            <div class="img"><img src="img/pictos/poche_1G.svg" width="85"></div>
                            <div class="name">Rabat</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Soufflet" data-id="1PS">
                            <div class="img"><img src="img/pictos/poche_1PS.svg" width="85"></div>
                            <div class="name">Soufflet</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Aviateur" data-id="1SR">
                            <div class="img"><img src="img/pictos/poche_1SR.svg" width="85"></div>
                            <div class="name">Aviateur</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Rondes (x2)" data-id="2">
                            <div class="img"><img src="img/pictos/poche_2.svg" width="85"></div>
                            <div class="name">Rondes (x2)</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Carrées (x2)" data-id="2C">
                            <div class="img"><img src="img/pictos/poche_2C.svg" width="85"></div>
                            <div class="name">Carrées (x2)</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Rabats (x2)" data-id="2G">
                            <div class="img"><img src="img/pictos/poche_2G.svg" width="85"></div>
                            <div class="name">Rabats (x2)</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Soufflets (x2)" data-id="2PS">
                            <div class="img"><img src="img/pictos/poche_2PS.svg" width="85"></div>
                            <div class="name">Soufflets (x2)</div>

                        </div>
                        <div class="part" data-category="pockets" data-label="Aviateurs (x2)" data-id="2SR">
                            <div class="img"><img src="img/pictos/poche_2SR.svg" width="85"></div>
                            <div class="name">Aviateurs (x2)</div>

                        </div>

                    </div>
                    <h2>Épaulettes</h2>
                    <div class="parts">
                        <div class="part active" data-category="epaulettes" data-label="Sans" data-id="">
                            <div class="img"><img src="img/pictos/epaulettes_sans.svg" width="85"></div>
                            <div class="name">Sans</div>

                        </div>
                        <div class="part" data-category="epaulettes" data-label="Avec (+ 6€)" data-id="EPO">
                            <div class="img"><img src="img/pictos/epaulettes_avec.svg" width="85"></div>
                            <div class="name">Avec (+ 6€)</div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-5">
                    <header>
                        <div class="name">Bas</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Bas de chemise</h2>
                    <div class="parts">
                        <div class="part active" data-category="bottom" data-id="L" data-label="Arrondi">
                            <div class="img"><img src="img/pictos/bas_L.svg" width="85"></div>
                            <div class="name">Arrondi</div>

                        </div>
                        <div class="part" data-category="bottom" data-id="D" data-label="Droit">
                            <div class="img"><img src="img/pictos/bas_D.svg" width="85"></div>
                            <div class="name">Droit</div>

                        </div>
                        <div class="part" data-category="bottom" data-id="F" data-label="Droit avec fentes">
                            <div class="img"><img src="img/pictos/bas_F.svg" width="85"></div>
                            <div class="name">Droit avec fentes</div>

                        </div>

                    </div>
                    <h2>Gorge</h2>
                    <div class="parts">
                        <div class="part active" data-category="throat" data-id="S" data-label="Simple">
                            <div class="img"><img src="img/pictos/gorge_S.svg" width="85"></div>
                            <div class="name">Simple</div>

                        </div>
                        <div class="part" data-category="throat" data-id="A" data-label="Américaine">
                            <div class="img"><img src="img/pictos/gorge_A.svg" width="85"></div>
                            <div class="name">Américaine</div>

                        </div>
                        <div class="part" data-category="throat" data-id="C" data-label="Cachée">
                            <div class="img"><img src="img/pictos/gorge_C.svg" width="85"></div>
                            <div class="name">Cachée</div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-6">
                    <header>
                        <div class="name">Dos</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Dos</h2>
                    <div class="parts">
                        <div class="part active" data-category="back" data-label="Sans plis" data-id="">
                            <div class="img"><img src="img/pictos/dos_.svg" width="85"></div>
                            <div class="name">Sans plis</div>

                        </div>
                        <div class="part" data-category="back" data-label="Pli central" data-id="P">
                            <div class="img"><img src="img/pictos/dos_P.svg" width="85"></div>
                            <div class="name">Pli central</div>

                        </div>
                        <div class="part" data-category="back" data-label="Chevrons" data-id="2P">
                            <div class="img"><img src="img/pictos/dos_2P.svg" width="85"></div>
                            <div class="name">Chevrons</div>

                        </div>

                    </div>
                    <h2>Pinces</h2>
                    <div class="parts">
                        <div class="part active" data-category="clamp" data-label="Avec" data-id="P">
                            <div class="img"><img src="img/pictos/dos_pinces_P.svg" width="85"></div>
                            <div class="name">Avec</div>

                        </div>
                        <div class="part" data-category="clamp" data-label="Sans" data-id="">
                            <div class="img"><img src="img/pictos/dos_pinces_.svg" width="85"></div>
                            <div class="name">Sans</div>

                        </div>

                    </div>
                </section>
                <section class="hidden step" id="step-7">
                    <header>
                        <div class="name">Boutons</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Boutons</h2>
                    <div class="parts">
                        <div class="part active" data-category="buttons" data-id="anthracite" data-label="Anthracite">
                            <div class="img"><img src="img/pictos/boutons_anthracite.png" width="85"></div>
                            <div class="name">Anthracite</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="standard" data-label="Standard">
                            <div class="img"><img src="img/pictos/boutons_standard.png" width="85"></div>
                            <div class="name">Standard</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="blanc_epais" data-label="Blanc épais">
                            <div class="img"><img src="img/pictos/boutons_blanc_epais.png" width="85"></div>
                            <div class="name">Blanc épais</div>
                        </div>
                        <div class="part" data-category="buttons" data-id="bleu_ciel" data-label="Bleu ciel">
                            <div class="img"><img src="img/pictos/boutons_bleu_ciel.png" width="85"></div>
                            <div class="name">Bleu ciel</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="bleu_fonce" data-label="Bleu fonce">
                            <div class="img"><img src="img/pictos/boutons_bleu_fonce.png" width="85"></div>
                            <div class="name">Bleu foncé</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="bleu_gris" data-label="Bleu gris">
                            <div class="img"><img src="img/pictos/boutons_bleu_gris.png" width="85"></div>
                            <div class="name">Bleu gris</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="brun_epais" data-label="Brun épais">
                            <div class="img"><img src="img/pictos/boutons_brun_epais.png" width="85"></div>
                            <div class="name">Brun épais</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="corne_clair" data-label="Corne clair">
                            <div class="img"><img src="img/pictos/boutons_corne_clair.png" width="85"></div>
                            <div class="name">Corne clair</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="corne_fonce" data-label="Corne_ fonce">
                            <div class="img"><img src="img/pictos/boutons_corne_fonce.png" width="85"></div>
                            <div class="name">Corne foncé</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="jaune" data-label="Jaune">
                            <div class="img"><img src="img/pictos/boutons_jaune.png" width="85"></div>
                            <div class="name">Jaune</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="nacre" data-label="Nacre">
                            <div class="img"><img src="img/pictos/boutons_nacre.png" width="85"></div>
                            <div class="name">Nacre</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="noir" data-label="Noir">
                            <div class="img"><img src="img/pictos/boutons_noir.png" width="85"></div>
                            <div class="name">Noir</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="noir_epais" data-label="Noir épais">
                            <div class="img"><img src="img/pictos/boutons_noir_epais.png" width="85"></div>
                            <div class="name">Noir épais</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="rouge" data-label="Rouge">
                            <div class="img"><img src="img/pictos/boutons_rouge.png" width="85"></div>
                            <div class="name">Rouge</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="ton_sur_ton" data-label="Ton_sur_ton">
                            <div class="img"><img src="img/pictos/boutons_ton_sur_ton.png" width="85"></div>
                            <div class="name">Ton sur ton</div>

                        </div>
                        <div class="part" data-category="buttons" data-id="vert" data-label="Vert">
                            <div class="img"><img src="img/pictos/boutons_vert.png" width="85"></div>
                            <div class="name">Vert</div>

                        </div>

                    </div>
                    <header>
                        <div class="name">Boutonnière</div>
                        <div class="close">x</div>
                    </header>
                    <h2 class="first">Boutonnière</h2>
                    <div class="parts">
                        <div class="part active" data-category="buttonholes" data-id="1938" data-label="Beige">
                            <div class="img"><img src="img/pictos/boutonnieres_beige.svg" width="30"></div>
                            <div class="name">Beige</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1801" data-label="Blanc_mat">
                            <div class="img"><img src="img/pictos/boutonnieres_blanc_mat.svg" width="30"></div>
                            <div class="name">Blanc mat</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1830" data-label="Bleu_clair">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_clair.svg" width="30"></div>
                            <div class="name">Bleu clair</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1966" data-label="Bleu_marine">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_marine.svg" width="30"></div>
                            <div class="name">Bleu marine</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1676" data-label="Bleu_roi">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_roi.svg" width="30"></div>
                            <div class="name">Bleu roi</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1835" data-label="Bordeaux">
                            <div class="img"><img src="img/pictos/boutonnieres_bordeaux.svg" width="30"></div>
                            <div class="name">Bordeaux</div>

                        </div>
                        <div class="part active" data-category="buttonholes" data-id="1874" data-label="Gris">
                            <div class="img"><img src="img/pictos/boutonnieres_gris.svg" width="30"></div>
                            <div class="name">Gris</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1666" data-label="Jaune_pale">
                            <div class="img"><img src="img/pictos/boutonnieres_jaune_pale.svg" width="30"></div>
                            <div class="name">Jaune pale</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1455" data-label="Jaune_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_jaune_vif.svg" width="30"></div>
                            <div class="name">Jaune vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1911" data-label="Mauve">
                            <div class="img"><img src="img/pictos/boutonnieres_mauve.svg" width="30"></div>
                            <div class="name">Mauve</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1800" data-label="Noir">
                            <div class="img"><img src="img/pictos/boutonnieres_noir.svg" width="30"></div>
                            <div class="name">Noir</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1965" data-label="Orange">
                            <div class="img"><img src="img/pictos/boutonnieres_orange.svg" width="30"></div>
                            <div class="name">Orange</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1818" data-label="Rose_pale">
                            <div class="img"><img src="img/pictos/boutonnieres_rose_pale.svg" width="30"></div>
                            <div class="name">Rose pale</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1113" data-label="Rose_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_rose_vif.svg" width="30"></div>
                            <div class="name">Rose vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1747" data-label="Rouge">
                            <div class="img"><img src="img/pictos/boutonnieres_rouge.svg" width="30"></div>
                            <div class="name">Rouge</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1801" data-label="Ton_sur_ton">
                            <div class="img"><img src="img/pictos/boutonnieres_ton_sur_ton.svg" width="30"></div>
                            <div class="name">Ton sur ton</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1832" data-label="Vert_fonce">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_fonce.svg" width="30"></div>
                            <div class="name">Vert fonce</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1647" data-label="Vert_pomme">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_pomme.svg" width="30"></div>
                            <div class="name">Vert pomme</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1751" data-label="Vert_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_vif.svg" width="30"></div>
                            <div class="name">Vert vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="1833" data-label="Violet">
                            <div class="img"><img src="img/pictos/boutonnieres_violet.svg" width="30"></div>
                            <div class="name">Violet</div>

                        </div>
                </section>
                <section class="hidden step" id="step-8">
                    <header>
                        <div class="name">Broderies</div>
                        <div class="close">x</div>
                    </header>

                    <h2 class="first">
                        Ajouter un monogramme
                    </h2>
                    <div class="parts_broderie">

                        <input type="text" data-category="embroidery" class="ajustement-input" name="inputEmb" id="inputEmb" style="margin-right: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 2px" placeholder="Ecrivez-ici...">
                        <button class="ok">ajouter</button>

                    </div>
                    <h2 class="first">Couleur</h2>
                    <div class="parts">
                        <?php for ($id = 1; $id <= 21; $id ++) { ?>
                            <div class="part " data-category="embroidery_color" <?php echo 'data-id="' . $id . '" data-label="' . $id . '"' ?> >
                                <div class="img">
                                    <?php echo '<img src="img/pictos/couleur_' . $id . '.svg" width="85">'; ?>
                                </div>
                                <div class="name"><?php echo $id ?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <h2 class="first">Style</h2>
                    <div class="parts">
                        <div class="part " data-category="embroidery_style" data-id="baton" data-label="Baton">
                            <div class="img">
                                <img src="img/pictos/style_serif-01.svg" width="85">
                            </div>
                            <div class="name">Baton</div>
                        </div>
                        <div class="part " data-category="embroidery_style" data-id="anglaise" data-label="Anglaise">
                            <div class="img">
                                <img src="img/pictos/style_serif-02.svg" width="85">
                            </div>
                            <div class="name">Anglaise</div>
                        </div>
                    </div>
                    <h2 class="first">Emplacement</h2>
                    <div class="parts">
                        <div class="part " data-category="embroidery_position" data-id="PCO" data-label="PCO">
                            <div class="img">
                                <img src="img/pictos/emplacement_broderie_PCO.svg" width="85">
                            </div>
                            <div class="name">Milieu poche</div>
                        </div>
                        <div class="part " data-category="embroidery_position" data-id="B4" data-label="B4">
                            <div class="img">
                                <img src="img/pictos/emplacement_broderie_B4.svg" width="85">
                            </div>
                            <div class="name">4eme boutonnière</div>
                        </div>
                        <div class="part " data-category="embroidery_position" data-id="PDR" data-label="PDR">
                            <div class="img">
                                <img src="img/pictos/emplacement_broderie_PDR.svg" width="85">
                            </div>
                            <div class="name">Poignet droit</div>
                        </div>
                        <div class="part " data-category="embroidery_position" data-id="PGA" data-label="PGA">
                            <div class="img">
                                <img src="img/pictos/emplacement_broderie_PGA.svg" width="85">
                            </div>
                            <div class="name">Poignet gauche</div>
                        </div>
                    </div>
                </section>
                <section class="hidden step" id="step-9">
                    <header>
                        <div class="name">Doublures</div>
                        <div class="close">x</div>
                    </header>
<!--                    <p>doublures</p>-->
                    <h2 class="first">Tissus doublure</h2>
                    <div class="parts_broderie">
                        <button class="ok" style="width: 110px" data-toggle="modal" data-target="#modal_doubure">Choisir</button>
                        <span style="margin-left:20px;" id="tissu_doublure_code_label"></span>
                        <!--<button class="ok" id="modal_doubure" style="width: 110px">Choisir</button>-->
                    </div>
                    <h2 class="first">Doublure col</h2>
                    <div class="parts">
                        <div class="part active" data-category="lining" data-id="-" data-label="Col classique">
                            <div class="img"><img src="img/pictos/Doublure_col_-.png" width="85"></div>
                            <div class="name">Col classique</div>

                        </div>
                        <div class="part" data-category="lining" data-id="C" data-label="Col blans">
                            <div class="img"><img src="img/pictos/Doublure_col_C.png" width="85"></div>
                            <div class="name">Col blanc</div>

                        </div>
                        <div class="part" data-category="lining" data-id="EPC" data-label="Ext. pied col">
                            <div class="img"><img src="img/pictos/Doublure_col_EPC.png" width="85"></div>
                            <div class="name">Ext. pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="IPC" data-label="Int. pied col">
                            <div class="img"><img src="img/pictos/Doublure_col_IPC.png" width="85"></div>
                            <div class="name">Int. pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="PCE" data-label="Full pied col">
                            <div class="img"><img src="img/pictos/Doublure_col_PCE.png" width="85"></div>
                            <div class="name">Full pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="CC" data-label="Full col">
                            <div class="img"><img src="img/pictos/Doublure_col_CC.png" width="85"></div>
                            <div class="name">Full col</div>

                        </div>
                    </div>
                    <h2 class="first">Doublure poignets</h2>
                    <div class="parts">
                        <div class="part active" data-category="lining_wrists" data-id="-" data-label="Poignets classiques">
                            <div class="img"><img src="img/pictos/Doublure_poignets_-.png" width="85"></div>
                            <div class="name">Poignets classiques</div>

                        </div>
                        <div class="part" data-category="lining_wrists" data-id="PP" data-label="Poignets blancs">
                            <div class="img"><img src="img/pictos/Doublure_poignets_PP.png" width="85"></div>
                            <div class="name">Poignets blancs</div>

                        </div>
                        <div class="part" data-category="lining_wrists" data-id="IP" data-label="Int. poignets">
                            <div class="img"><img src="img/pictos/Doublure_poignets_IP.png" width="85"></div>
                            <div class="name">Int. poignets</div>

                        </div>
                        <div class="part" data-category="lining_wrists" data-id="P" data-label="Full poignets">
                            <div class="img"><img src="img/pictos/Doublure_poignets_P.png" width="85"></div>
                            <div class="name">Full poignets</div>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
                <button id="toPanier" class="toPanier">Ajouter au panier</button>
            </footer>
        </section>

        <input type="hidden" name="api_url" id="api_url" value="<?php echo htmlspecialchars($p_url) ?>" />
        <input type="hidden" name="api_titre" id="api_titre" value="<?php echo htmlspecialchars($p_titre) ?>" />
        <input type="hidden" name="api_prix" id="api_prix" value="<?php echo htmlspecialchars($p_prix) ?>" />
        <input type="hidden" name="api_description" id="api_description" value="<?php echo htmlspecialchars($p_description) ?>" />
        <input type="hidden" name="api_h1" id="api_h1" value="<?php echo htmlspecialchars($p_h1) ?>" />
        <input type="hidden" name="api_couleur" id="api_couleur" value="<?php echo htmlspecialchars($p_couleur) ?>" />
        <input type="hidden" name="api_tissage" id="api_tissage" value="<?php echo htmlspecialchars($p_tissage) ?>" />
        <input type="hidden" name="api_dessin" id="api_dessin" value="<?php echo htmlspecialchars($p_dessin) ?>" />
        <input type="hidden" name="api_code" id="api_code" value="<?php echo htmlspecialchars($p_code) ?>" />
        <input type="hidden" name="tissu_select_referece" id="tissu_select_referece" value="<?php echo htmlspecialchars($p_reference) ?>" />
        <input type="hidden" name="hp" id="hp" value="<?php echo htmlspecialchars($p_hp) ?>" />
        <input type="hidden" name="col" id="col" value="<?php echo htmlspecialchars($p_col) ?>" />
        <input type="hidden" name="baleine" id="baleine" value="<?php echo htmlspecialchars($p_baleine) ?>" />
        <input type="hidden" name="tenue_col" id="tenue_col" value="<?php echo htmlspecialchars($p_tenue_col) ?>" />
        <input type="hidden" name="poignets" id="poignets" value="<?php echo htmlspecialchars($p_poignets) ?>" />
        <input type="hidden" name="poches" id="poches" value="<?php echo htmlspecialchars($p_poches) ?>" />
        <input type="hidden" name="epaulettes" id="epaulettes" value="<?php echo htmlspecialchars($p_epaulettes) ?>" />
        <input type="hidden" name="bas" id="bas" value="<?php echo htmlspecialchars($p_bas) ?>" />
        <input type="hidden" name="gorge" id="gorge" value="<?php echo htmlspecialchars($p_gorge) ?>" />
        <input type="hidden" name="dos" id="dos" value="<?php echo htmlspecialchars($p_dos) ?>" />
        <input type="hidden" name="pinces" id="pinces" value="<?php echo htmlspecialchars($p_pinces) ?>" />
        <input type="hidden" name="boutons" id="boutons" value="<?php echo htmlspecialchars($p_boutons) ?>" />
        <input type="hidden" name="couture" id="couture" value="<?php echo htmlspecialchars($p_couture) ?>" />
        <input type="hidden" name="tissu_doublure_reference" id="tissu_doublure_reference" value="<?php echo htmlspecialchars($p_tissu_doublure_reference) ?>" />
        <input type="hidden" name="tissu_doublure_code" id="tissu_doublure_code" value="<?php echo htmlspecialchars($p_tissu_doublure_code) ?>" />
        <input type="hidden" name="tissu_doublure_id" id="tissu_doublure_id" value="<?php echo htmlspecialchars($p_tissu_doublure_id) ?>" />
        <input type="hidden" name="doublure_col" id="doublure_col" value="<?php echo htmlspecialchars($p_doublure_col) ?>" />
        <input type="hidden" name="doublure_poignets" id="doublure_poignets" value="<?php echo htmlspecialchars($p_doublure_poignets) ?>" />
        <input type="hidden" name="broderie" id="broderie" value="<?php echo htmlspecialchars($p_broderie) ?>" />
        <input type="hidden" name="broderie_couleur" id="broderie_couleur" value="<?php echo htmlspecialchars($p_broderie_couleur) ?>" />
        <input type="hidden" name="broderie_style" id="broderie_style" value="<?php echo htmlspecialchars($p_broderie_style) ?>" />
        <input type="hidden" name="broderie_emplacement" id="broderie_emplacement" value="<?php echo htmlspecialchars($p_broderie_emplacement) ?>" />
        <input type="hidden" name="totalPrix" id="totalPrix" value="<?php echo htmlspecialchars($p_prix) ?>" />
        <?php
        if (empty($_POST["editer"]))
            echo '<input type="hidden" name="editer" id="editer" value="0" />';
        else
            echo '<input type="hidden" name="editer" id="editer" value="' . $_POST["editer"] . '" />';
        ?>


        <!-- Modal Tissu Doublure -->
        <div class="modal fade" id="modal_doubure" tabindex="-1" role="dialog" aria-labelledby="modal_doubure_label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal_doubure_label">Choisir un tissu doublure</h4>
                    </div>
                    <div class="modal-body" id="body_modal_doublure_tissu" style="height:400px;overflow: auto;">
                        <div id="tissus_liste_doublure"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $('#modal_doubure').on('shown.bs.modal', function(e) {
                charger_tissu_doublure();
            });
            $('#modal_doubure').on('hidden.bs.modal', function(e) {
                $('#body_modal_doublure_tissu').html('<div id="tissus_liste_doublure"></div>');
            });
            function tissu_doublure_select(id, reference, code)
            {
                $('#tissu_doublure_id').val(id);
                $('#tissu_doublure_code').val(code);
                $('#tissu_doublure_reference').val(reference);
                $('#tissu_doublure_code_label').html(reference);
            }

            function charger_tissu_doublure()
            {
                $.ajax({
                    url: "http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus",
                    type: 'POST',
                    data: 'couleur=all&tissage=all&motif=all',
                    success: function(result)
                    {
                        $.each(result.value, function(i, item) {
                            if (item.reference != '')
                            {
                                $('#tissus_liste_doublure').append('<div class="col-md-3 tissu" id="tissu_code_' + item.reference + '" data-toggle="tooltip" data-placement="bottom" title="' + item.titre + '" onclick="tissu_doublure_select(\'tissu_code_' + item.reference + '\',\'' + item.reference + '\',\'' + item.code + '\')"><div>' + item.reference + '</div><div><img src="http://www.ls-chemise.com/tissu/150/' + item.code + '.jpg" style="width:100%;" /></div></div>');
                            }
                        });
                    }
                });
            }
        </script>

        <!--<script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>-->
        <script src="js/min/all.js?t=<?php echo time(); ?>"></script>
        <script src="js/main.js?t=<?php echo time(); ?>"></script>
        <script>
            $(document).ready(function()
            {
                sessionStorage.clear();
                const shirt = new ShirtImage();
                Array.from(document.querySelectorAll('.part')).forEach(v => v.addEventListener('click', _ =>
                    {
                        const cat = v.getAttribute('data-category');
                        const id = v.getAttribute('data-id');
                        const label = v.getAttribute('data-label');
                        const hp = v.getAttribute('data-hp');
                        Array.from(document.querySelectorAll('.part[data-category="' + cat + '"]')).forEach(v => v.classList.remove('active'));
                        if (cat != 'summary') {
                            var vue = 'face';
                            v.classList.toggle('active');
                            shirt[cat] = id;
                            shirt.setLabel(cat, label);
                            shirt.setElement(cat);
                            if (cat != 'buttonholes' && cat != 'clamp' && cat != 'epaulettes' && cat != 'throat' && cat != 'lining_wrists' && cat != 'embroidery_style' && cat != 'embroidery_color') {
                                if (cat == 'buttons') {
                                    shirt.setPartSummary(cat, 'png');
                                } else if (cat == 'back') {
                                    vue = 'dos';
                                    shirt.setPartSummary(cat);
                                } else {
                                    shirt.setPartSummary(cat);
                                }
                            }
                            switch (cat)
                            {
                                case 'pockets':
                                    document.getElementById("poches").value = id;
                                    break;
                                case 'collar':
                                    document.getElementById("col").value = id;
                                    document.getElementById("hp").value = hp.valueOf();
                                    //console.log(hp.valueOf());
                                    break;
                                case 'wrists':
                                    document.getElementById("poignets").value = id;
                                    break;
                                case 'epaulettes':
                                    document.getElementById("epaulettes").value = id;
                                    break;
                                case 'bottom':
                                    document.getElementById("bas").value = id;
                                    break;
                                case 'throat':
                                    document.getElementById("gorge").value = id;
                                    break;
                                case 'fabric':
                                    document.getElementById("poches").value = id;
                                    break;
                                case 'buttons':
                                    document.getElementById("boutons").value = id;
                                    break;
                                case 'buttonholes':
                                    document.getElementById("couture").value = id;
                                    break;
                                case 'back':
                                    document.getElementById("dos").value = id;
                                    vue = 'dos';
                                    break;
                                case 'clamp':
                                    document.getElementById("pinces").value = id;
                                    vue = 'dos';
                                    break;
                                case 'embroidery_color':
                                    document.getElementById("broderie_couleur").value = id;
                                    break;
                                case 'embroidery_style':
                                    document.getElementById("broderie_style").value = id;
                                    break;
                                case 'embroidery_position':
                                    document.getElementById("broderie_emplacement").value = id;
                                    break;
                                case 'lining':
                                    document.getElementById("doublure_col").value = id;
                                    break;
                                case 'lining_wrists':
                                    document.getElementById("doublure_poignets").value = id;
                                    break;
                            }
                            reload_chemise_png(vue);
                        }
                    }));
                charger_tissu();
                //console.log(document.getElementById('api_code').value);
                if (document.getElementById('api_code').value == "T1420")
                {
                    document.querySelector('.part[data-category="summary"][data-id="1"]').innerHTML = '<div class="img"><img src="http://www.ls-chemise.com/tissu/150/3090.W020.2633.jpg" style="width:100%;" /></div><div class="name">' + document.getElementById('tissu_select_referece').value + '</div>';
                } else
                {
                    document.querySelector('.part[data-category="summary"][data-id="1"]').innerHTML = '<div class="img"><img src="http://www.ls-chemise.com/tissu/150/' + document.getElementById('api_code').value + '.jpg" style="width:100%;" /></div><div class="name">' + document.getElementById('tissu_select_referece').value + '</div>';
                }

                if (document.getElementById('fromPost').value == 1) {
                    document.querySelector('.part[data-category="summary"][data-id="2"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/col_' + document.getElementById("col").value + '.svg" width="85"></div><div class="name"><?php echo $cols[$p_col]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="3"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/poignet_' + document.getElementById("poignets").value + '.svg" width="85"></div><div class="name"><?php echo $poignets[$p_poignets]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="4"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/poche_' + document.getElementById("poches").value + '.svg" width="85"></div><div class="name"><?php echo $poches[$p_poches]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="5"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/bas_' + document.getElementById("bas").value + '.svg" width="85"></div><div class="name"><?php echo $bas[$p_bas]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="6"]').innerHTML = '<div class="img" onclick="view_chemise(\'dos\')"><img src="img/pictos/dos_' + document.getElementById("dos").value + '.svg" width="85"></div><div class="name"><?php echo $dos[$p_dos]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="7"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/boutons_' + document.getElementById("boutons").value + '.png" width="85"></div><div class="name"><?php echo $boutons[$p_boutons]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="8"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/emplacement_broderie_' + document.getElementById("broderie_emplacement").value + '.svg" width="85"></div><div class="name"><?php echo $broderie_position[$p_broderie_emplacement]; ?></div>';
                    document.querySelector('.part[data-category="summary"][data-id="9"]').innerHTML = '<div class="img" onclick="view_chemise(\'face\')"><img src="img/pictos/Doublure_col_' + document.getElementById("doublure_col").value + '.png" width="85"></div><div class="name"><?php echo $doublure_col[$p_doublure_col]; ?></div>';
                    $('#tissu_doublure_code_label').html("<?php echo $p_tissu_doublure_reference; ?>");
                }
                document.getElementById('price').innerHTML = document.getElementById('api_prix').value + "€";
                reload_chemise_png('face');
                Array.from(document.querySelectorAll("select")).forEach(function(t) {
                    return t.addEventListener("change", function(e) {
                        if (t.getAttribute("name") == 'couleur' || t.getAttribute("name") == 'tissage' || t.getAttribute("name") == 'motif') {
                            var col = $('select[name="couleur"]').val();
                            var tiss = $('select[name="tissage"]').val();
                            var mot = $('select[name="motif"]').val();
                            return charger_tissu(col, tiss, mot);
                        } else {
                            document.getElementById(t.getAttribute("name")).value = $('select[name="' + t.getAttribute("name") + '"]').val();
                        }
                    });
                });
                document.querySelector(".ok").addEventListener("click", function(e) {
                    var n = document.getElementById("inputEmb").value;
                    document.getElementById("broderie").value = n;
                    sessionStorage.setItem("embroidery", n);
                })
            });
            Array.from(document.querySelectorAll(".toPanier,.buy")).forEach(v => v.addEventListener('click', _ => {
                    var edit = document.getElementById('editer').value;
                    var total = amountCalculate();
                    var data = 'tissu_ref=' + document.getElementById('tissu_select_referece').value +
                            '&col=' + document.getElementById('col').value +
                            '&hp=' + hp +
                            '&baleine=' + document.getElementById('baleine').value +
                            '&tenue_col=' + document.getElementById('tenue_col').value +
                            '&poignets=' + document.getElementById('poignets').value +
                            '&poches=' + document.getElementById('poches').value +
                            '&epaulettes=' + document.getElementById('epaulettes').value +
                            '&bas_chemise=' + document.getElementById('bas').value +
                            '&gorge=' + document.getElementById('gorge').value +
                            '&dos=' + document.getElementById('dos').value +
                            '&pinces=' + document.getElementById('pinces').value +
                            '&boutons=' + document.getElementById('boutons').value +
                            '&couture=' + document.getElementById('couture').value +
                            '&tissu_doublure_ref=' + document.getElementById('tissu_doublure_reference').value +
                            '&tissu_doublure_code=' + document.getElementById('tissu_doublure_code').value +
                            '&tissu_doublure_id=' + document.getElementById('tissu_doublure_id').value +
                            '&doublure_col=' + document.getElementById('doublure_col').value +
                            '&doublure_poignets=' + document.getElementById('doublure_poignets').value +
                            '&prix=' + document.getElementById('totalPrix').value +
                            '&img_file_face=' + document.getElementById('img_file_face').value +
                            '&img_file_zoom=' + document.getElementById('img_file_zoom').value +
                            '&img_file_dos=' + document.getElementById('img_file_dos').value +
                            '&api_url=' + document.getElementById('api_url').value +
                            '&api_titre=' + document.getElementById('api_titre').value +
                            '&api_prix=' + document.getElementById('api_prix').value +
                            '&api_description=' + document.getElementById('api_description').value +
                            '&api_h1=' + document.getElementById('api_h1').value +
                            '&api_couleur=' + document.getElementById('api_couleur').value +
                            '&api_tissage=' + document.getElementById('api_tissage').value +
                            '&api_dessin=' + document.getElementById('api_dessin').value +
                            '&broderie=' + document.getElementById('broderie').value +
                            '&broderie_couleur=' + document.getElementById('broderie_couleur').value +
                            '&broderie_style=' + document.getElementById('broderie_style').value +
                            '&edit=' + edit +
                            '&broderie_emplacement=' + document.getElementById('broderie_emplacement').value +
                            '&categorie=&timecall=<?php echo time(); ?>';
                    //ajax call
                    $.ajax({
                        url: 'ajax/modele_sauvegarde.php',
                        type: 'POST',
                        data: data,
                        beforeSend: function(xhr) {},
                        error: function(data, errorThrown) {
                            //console.log(errorThrown);
                        },
                        success: function(result)
                        {
                            window.location.href = "../panier.html"
                        }
                    });
                }));


            function charger_tissu(couleur = 'all', tissage = 'all', motif = 'all')
            {
                tissu_ref_select = document.getElementById('tissu_select_referece').value;
                //console.log(tissu_ref_select);
                $.ajax({
                    url: "ajax/fabricsLoad.php",
                    type: 'POST',
                    data: 'couleur=' + couleur + '&tissage=' + tissage + '&motif=' + motif + '&tissu_ref_select=' + tissu_ref_select,
                    success: function(result)
                    {
                        $("#fabrics-container").html(result);
                    }
                });
            }


            function tissu_select(id, reference, code, url, titre, prix, description, h1, couleur, tissage, dessin)
            {
                sessionStorage.setItem("fabric", reference);
                //$("[id*='tissu_code_']").css('border','0px solid #fff');
                Array.from(document.querySelectorAll('.fabric[data-category="fabric"]')).forEach(function(t) {
                    return t.classList.remove("active")
                });
                var e = document.querySelector('.fabric[data-category="fabric"][data-id="' + sessionStorage.getItem("fabric") + '"]');
                e.classList.add("active");
                $('#tissu_select_referece').val(reference);
                //$('#'+id).css('border','1px solid #c4c4c4');
                Array.from(document.querySelectorAll('.part[data-category="summary"][data-id="1"]')).forEach(function(t) {
                    return t.innerHTML = '<div class="img"><img src="http://www.ls-chemise.com/tissu/150/' + code + '.jpg" style="width:100%;" /></div><div class="name">' + reference + '</div>';
                });
                document.getElementById('price').innerHTML = prix + "€";
                document.getElementById('totalPrix').value = prix;
                //$('#tissu_select_img').html('<img src="http://www.ls-chemise.com/tissu/150/'+code+'.jpg" style="width:100%;" />');
                $('#api_url').val(url);
                $('#api_titre').val(titre);
                $('#api_prix').val(prix);
                $('#api_description').val(description);
                $('#api_h1').val(h1);
                $('#api_couleur').val(couleur);
                $('#api_tissage').val(tissage);
                $('#api_dessin').val(dessin);
                reload_chemise_png('face');
            }


            function reload_chemise_png(view)
            {
                //$('#shirt-container').html('<img style="margin-left: auto; margin-right: auto; height: 50px; top: 50%" src="img/icons/curved-bars.svg" />');
                $('#load_img').css('display', 'block');
                //collecte des valeurs
                reference = document.getElementById('tissu_select_referece').value;
                hp = document.getElementById('hp').value;
                col = document.getElementById('col').value;
                baleine = document.getElementById('baleine').value;
                tenue_col = document.getElementById('tenue_col').value;
                poignets = document.getElementById('poignets').value;
                poches = document.getElementById('poches').value;
                epaulettes = document.getElementById('epaulettes').value;
                bas = document.getElementById('bas').value;
                gorge = document.getElementById('gorge').value;
                dos = document.getElementById('dos').value;
                pinces = document.getElementById('pinces').value;
                boutons = document.getElementById('boutons').value;
                couture = document.getElementById('couture').value;
                tissu_doublure_reference = document.getElementById('tissu_doublure_reference').value;
                tissu_doublure_code = document.getElementById('tissu_doublure_code').value;
                tissu_doublure_id = document.getElementById('tissu_doublure_id').value;
                doublure_col = document.getElementById('doublure_col').value;
                doublure_poignets = document.getElementById('doublure_poignets').value;
                broderie = document.getElementById('broderie').value;
                broderie_couleur = document.getElementById('broderie_couleur').value;
                broderie_style = document.getElementById('broderie_style').value;
                broderie_emplacement = document.getElementById('broderie_emplacement').value;
                //check if undefined
                if (typeof hp === 'undefined') {
                    hp = "S";
                }
                if (typeof reference === 'undefined') {
                    reference = "T1420";
                }
                if (typeof col === 'undefined') {
                    col = "CLA";
                }
                if (typeof baleine === 'undefined') {
                    baleine = "A";
                }
                if (typeof tenue_col === 'undefined') {
                    tenue_col = "R";
                }
                if (typeof poignets === 'undefined') {
                    poignets = "A11";
                }
                if (typeof poches === 'undefined') {
                    poches = "0";
                }
                if (typeof epaulettes === 'undefined') {
                    epaulettes = "";
                }
                if (typeof bas === 'undefined') {
                    bas = "L";
                }
                if (typeof gorge === 'undefined') {
                    gorge = "S";
                }
                if (typeof dos === 'undefined') {
                    dos = "";
                }
                if (typeof pinces === 'undefined') {
                    pinces = "";
                }
                if (typeof boutons === 'undefined') {
                    boutons = "blanc";
                }
                if (typeof couture === 'undefined') {
                    couture = "1801";
                }
                if (typeof tissu_doublure_reference === 'undefined') {
                    tissu_doublure_reference = "";
                }
                if (typeof tissu_doublure_code === 'undefined') {
                    tissu_doublure_code = "";
                }
                if (typeof tissu_doublure_id === 'undefined') {
                    tissu_doublure_id = "";
                }
                if (typeof doublure_col === 'undefined') {
                    doublure_col = "";
                }
                if (typeof doublure_poignets === 'undefined') {
                    doublure_poignets = "";
                }
                if (typeof broderie === 'undefined') {
                    broderie = "";
                }
                if (typeof broderie_couleur === 'undefined') {
                    broderie_couleur = "";
                }
                if (typeof broderie_style === 'undefined') {
                    broderie_style = "";
                }
                if (typeof broderie_emplacement === 'undefined') {
                    broderie_emplacement = "";
                }

                if (dos == '')
                    path_dos = '-'
                else
                    path_dos = dos;
                if (epaulettes == '')
                    path_epaulettes = '-'
                else
                    path_epaulettes = epaulettes;
                if (pinces == '')
                    path_pinces = '-'
                else
                    path_pinces = pinces;
                if (bas == 'F')
                    bas = 'D'

                poignets_path = 'MC';
                if (poignets != 'MC') {
                    poignets_path = 'ML';
                }
                //view_chemise(view);
                $('#load_img').css('display', 'none');
                document.getElementById("toPanier").removeAttribute("disabled");
                $("#img_file_face").val("./test2/" + reference + "/" + col + "/" + poignets + "/" + poches + "/" + bas + "/" + gorge + "/" + path_epaulettes + "/image.png");
                $("#img_file_dos").val("./test2/dos/" + reference + "/" + poignets_path + "/" + bas + "/" + path_dos + "/" + path_pinces + "/image.png");
                if (view == "face") {
                    $("#img_face").attr("src", "./test2/" + reference + "/" + col + "/" + poignets + "/" + poches + "/" + bas + "/" + gorge + "/" + path_epaulettes + "/image.png");//.fadeIn();//.delay(20);
                } else {
                    $("#img_face").attr("src", "./test2/dos/" + reference + "/" + poignets_path + "/" + bas + "/" + path_dos + "/" + path_pinces + "/image.png");
                }
                //$("#img_file_zoom").val("./test/zoom/" + reference + "/" + col + "/" + poignets + "/" + poches + "/" + bas + "/" + gorge + "/" + path_dos + "/" + path_epaulettes + "/" + path_pinces + "/image.jpg");




                //ajax call
                /*$.ajax({
                 url: 'load_image.php',
                 type: 'POST',
                 data: 'view=' + view + '&reference=' + reference + '&col=' + col + '&hp=' + hp + '&baleine=' + baleine + '&tenue_col=' + tenue_col + '&poignets=' + poignets + '&poches=' + poches + '&epaulettes=' + epaulettes + '&bas=' + bas + '&gorge=' + gorge + '&dos=' + dos + '&pinces=' + pinces + '&boutons=' + boutons + '&couture=' + couture + '&tissu_doublure_reference=' + tissu_doublure_reference + '&tissu_doublure_code=' + tissu_doublure_code + '&tissu_doublure_id=' + tissu_doublure_id + '&doublure_col=' + doublure_col + '&doublure_poignets=' + doublure_poignets + '&broderie=' + broderie + '&broderie_couleur=' + broderie_couleur + '&broderie_style=' + broderie_style + '&broderie_emplacement=' + broderie_emplacement + '&q=55&timecall=<?php //echo time();                                                                       ?>',
                 beforeSend: function(xhr)
                 {
                 document.getElementById("toPanier").setAttribute("disabled", "disabled");
                 },
                 error: function(data, errorThrown) {
                 //console.log(errorThrown);
                 },
                 success: function(result)
                 {
                 $('#load_img').css('display', 'none');
                 document.getElementById("toPanier").removeAttribute("disabled");
                 $("#img_face").attr("src", "./render/" + result).fadeIn().delay(20);
                 $("#img_file_face").val("./render/" + result);
                 $("#img_file_dos").val("./render/" + result);
                 $("#img_file_zoom").val("./render/" + result);

                 /*$.ajax({
                 url: 'load_image.php',
                 type: 'POST',
                 data: 'view=' + view + '&reference=' + reference + '&col=' + col + '&hp=' + hp + '&baleine=' + baleine + '&tenue_col=' + tenue_col + '&poignets=' + poignets + '&poches=' + poches + '&epaulettes=' + epaulettes + '&bas=' + bas + '&gorge=' + gorge + '&dos=' + dos + '&pinces=' + pinces + '&boutons=' + boutons + '&couture=' + couture + '&tissu_doublure_reference=' + tissu_doublure_reference + '&tissu_doublure_code=' + tissu_doublure_code + '&tissu_doublure_id=' + tissu_doublure_id + '&doublure_col=' + doublure_col + '&doublure_poignets=' + doublure_poignets + '&broderie=' + broderie + '&broderie_couleur=' + broderie_couleur + '&broderie_style=' + broderie_style + '&broderie_emplacement=' + broderie_emplacement + '&q=95&timecall=<?php //echo time();                                                                         ?>',
                 beforeSend: function(xhr)
                 {
                 document.getElementById("toPanier").setAttribute("disabled", "disabled");
                 },
                 error: function(data, errorThrown) {
                 //console.log(errorThrown);
                 },
                 success: function(result)
                 {
                 $('#load_img').css('display', 'none');
                 document.getElementById("toPanier").removeAttribute("disabled");
                 $("#img_face").attr("src", "./render/" + result).fadeIn().delay(20);
                 $("#img_file_face").val("./render/" + result);
                 $("#img_file_dos").val("./render/" + result);
                 $("#img_file_zoom").val("./render/" + result);
                 }
                 });
                 }
                 }); */
            }


            function view_chemise(view)
            {
                path_ = $("#img_file_" + view).val();
                $("#img_face").attr("src", path_).fadeIn().delay(20);
                /*$('#view_face,#view_dos,#view_zoom').each(function() {
                 $(this).css('display', 'none');
                 });
                 $("#view_" + view).css('display', 'block');
                 $("#face,#dos,#zoom").each(function() {
                 $(this).css('background-color', '#dddddd');
                 });*/
                $("#" + view).css('background-color', '#483f40');
            }


            function amountCalculate() {

            }

        </script>
    </body>
</html>
