<!-- MESURE RAPIDE -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-4">
                <p class="choix-methode-mesure"><a id="rapide" style="font-size: 1.2em; text-decoration: underline;" > <b>Mesures rapides</b></a></p>
            </div>
            <div class="col-md-4">
                <p class="choix-methode-mesure"><a id="corporelle" style="font-size: 1.2em; text-decoration: underline;"> Mesures corporelle</a></p>
            </div>
            <div class="col-md-4">
                <p class="choix-methode-mesure"><a id="chemise" style="font-size: 1.2em; text-decoration: underline;"> Mesures sur chemise</a></p>
            </div>
        </div>
    </div>
</div>
<div id="mesure_rapide" class="container" style="<?php
if (!empty($_SESSION['type_mesure']) && ($_SESSION['type_mesure'] == "mesure-chemise" || $_SESSION['type_mesure'] == "mesurez-vous"))
    echo 'display:none';
?> ">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESURE RAPIDE -->
            <form action="espace-client-mesures.php" method="POST">
                <input type="hidden" name="typeMesure" value="mesure-rapide" >
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Aide au calibrage</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- AGE -->
                                    <div class="input-group">
                                        <label class="label" for="age">Age</label>
                                        <input class="input" type="text" name="age" id="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['age'])) {
                                            echo $mesures['age'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" id="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['taille'])) {
                                            echo $mesures['taille'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" id="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['poids'])) {
                                            echo $mesures['poids'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MESURE RAPIDE -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Choisissez votre taille de chemise</h2>
                            <div class="methode-mesure-img mesure-rapide-taille"></div>
                            <select class="select-mesure" name="mesure-rapide-taille" id="mesure-rapide-taille" required>
                                <option value="XS" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XS") {
                                    echo 'selected';
                                }
                                ?>>37 - (XS) - 14,5</option>
                                <option value="S" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "S") {
                                    echo 'selected';
                                }
                                ?>>38 - (S) - 14,5</option>
                                <option value="S+" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "S+") {
                                    echo 'selected';
                                }
                                ?>>39 - (S+) - 14,5</option>
                                <option value="M" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "M") {
                                    echo 'selected';
                                }
                                ?>>40 - (M) - 14,5</option>
                                <option value="M+" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "M+") {
                                    echo 'selected';
                                }
                                ?>>41 - (M+) - 14,5</option>
                                <option value="L" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "L") {
                                    echo 'selected';
                                }
                                ?>>42 - (L) - 14,5</option>
                                <option value="L+" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "L+") {
                                    echo 'selected';
                                }
                                ?>>43 - (L+) - 14,5</option>
                                <option value="XL" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XL") {
                                    echo 'selected';
                                }
                                ?>>44 - (XL) - 14,5</option>
                                <option value="XL+" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XL+") {
                                    echo 'selected';
                                }
                                ?>>45 - (XL+) - 14,5</option>
                                <option value="XXL" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXL") {
                                    echo 'selected';
                                }
                                ?>>46 - (XXL) - 14,5</option>
                                <option value="XXL+" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXL+") {
                                    echo 'selected';
                                }
                                ?>>47 - (XXL+) - 14,5</option>
                                <option value="XXXl" <?php
                                if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXXl") {
                                    echo 'selected';
                                }
                                ?>>48 - (XXXL) - 14,5</option>
                            </select>
                            <p class="mesure-conseil">(Choisissez la taille qui vous va le mieux au niveau du corps)</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez votre encolure</h2>
                            <div class="methode-mesure-img mesure-rapide-col"></div>
                            <select class="select-mesure" name="mesure-rapide-col" id="mesure-rapide-col" required>
                                <option value="37" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "37") {
                                    echo 'selected';
                                }
                                ?>>37 cm</option>
                                <option value="38" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "38") {
                                    echo 'selected';
                                }
                                ?>>38 cm</option>
                                <option value="39" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "39") {
                                    echo 'selected';
                                }
                                ?>>39 cm</option>
                                <option value="40" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "40") {
                                    echo 'selected';
                                }
                                ?>>40 cm</option>
                                <option value="41" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "41") {
                                    echo 'selected';
                                }
                                ?>>41 cm</option>
                                <option value="42" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "42") {
                                    echo 'selected';
                                }
                                ?>>42 cm</option>
                                <option value="43" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "43") {
                                    echo 'selected';
                                }
                                ?>>43 cm</option>
                                <option value="44" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "44") {
                                    echo 'selected';
                                }
                                ?>>44 cm</option>
                                <option value="45" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "45") {
                                    echo 'selected';
                                }
                                ?>>45 cm</option>
                                <option value="46" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "46") {
                                    echo 'selected';
                                }
                                ?>>46 cm</option>
                                <option value="47" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "47") {
                                    echo 'selected';
                                }
                                ?>>47 cm</option>
                                <option value="48" <?php
                                if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "48") {
                                    echo 'selected';
                                }
                                ?>>48 cm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez la longueur de vos manches</h2>
                            <div class="methode-mesure-img mesure-rapide-bras"></div>
                            <select class="select-mesure" name="mesure-rapide-bras" id="mesure-rapide-bras" required>
                                <option value="extracourte" <?php
                                if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "extracourte") {
                                    echo 'selected';
                                }
                                ?>>Manches extra-courtes (-4 cm)</option>
                                <option value="courte" <?php
                                if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "courte") {
                                    echo 'selected';
                                }
                                ?>>Manches plus courtes (-2 cm)</option>
                                <option value="standard"  <?php
                                if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "standard") {
                                    echo 'selected';
                                }
                                ?>>Manches standards</option>
                                <option value="longue" <?php
                                if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "longue") {
                                    echo 'selected';
                                }
                                ?>>Manches plus longues (+2 cm)</option>
                                <option value="extralongue" <?php
                                if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "extralongue") {
                                    echo 'selected';
                                }
                                ?>>Manches extra-longues (+4 cm)</option>
                            </select>
                            <p class="mesure-conseil">Longueur standard = 64 cm</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Choisissez la coupe de votre chemise</h2>
                            <div class="methode-mesure-img aisance-coupe"></div>
                            <select class="select-mesure" name="aisance-coupe_rapide" id="aisance-coupe_rapide" required>
                                <option value="droit" <?php
                                if (!empty($mesures['coupe_vous']) && $mesures["coupe_vous"] == "droit") {
                                    echo 'selected';
                                }
                                ?>>Droite</option>
                                <option value="cintre" <?php
                                if (!empty($mesures['coupe_vous']) && $mesures["coupe_vous"] == "cintre") {
                                    echo 'selected';
                                }
                                ?>>Cintrée</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ENREGISTRER MESURE-RAPIDE -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="submit-container">
                            <input class="btn-rose" type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MESUREZ VOUS -->
<div id="mesure_corporelle" class="container" style="<?php if (!empty($_SESSION['type_mesure']) && ($_SESSION['type_mesure'] == "mesure-chemise" || $_SESSION['type_mesure'] == "mesure-rapide")) echo 'display:none'; ?> ">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESUREZ-VOUS -->
            <form action="espace-client-mesures.php" method="POST">
                <input type="hidden" name="typeMesure" value="mesurez-vous" >
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Aide au calibrage</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- AGE -->
                                    <div class="input-group">
                                        <label class="label" for="age">Age</label>
                                        <input class="input" type="text" name="age" id="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['age'])) {
                                            echo $mesures['age'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" id="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['taille'])) {
                                            echo $mesures['taille'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" id="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['poids'])) {
                                            echo $mesures['poids'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MESURE RAPIDE -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Cou</h2>
                            <div class="methode-mesure-img big mesurez-vous-cou"></div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="cou_vous">Cou (cm)</label>
                                <input class="input" type="text" name="cou_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['cou'])) echo $mesures['cou']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez le tour de cou en dessous de la pomme d'Adam en insérant un doigt entre le mètre ruban et le cou.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poitrine</h2>
                            <div class="methode-mesure-img big mesurez-vous-poitrine"></div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="poitrine_vous">Poitrine (cm)</label>
                                <input class="input" type="text" name="poitrine_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poitrine'])) echo $mesures['poitrine']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez votre tour de poitrine en plaçant votre mètre sous les bras, sans gonfler la poitrine.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ceinture</h2>
                            <div class="methode-mesure-img big mesurez-vous-ceinture"></div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="ceinture_vous">Ceinture (cm)</label>
                                <input class="input" type="text" name="ceinture_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['ceinture'])) echo $mesures['ceinture']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez votre tour de taille en plaçant le mètre au creux de la taille, sans rentrer le ventre.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Carrure</h2>
                            <div class="methode-mesure-img big mesurez-vous-carrure"></div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="carrure_vous">Carrure (cm)</label>
                                <input class="input" type="text" name="carrure_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['carrure'])) echo $mesures['carrure']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez d'un bord de l'épaule à l'autre.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Dos</h2>
                            <div class="methode-mesure-img big mesurez-vous-dos"></div>
                            <div class="input-group">
                                <label class="label" for="dos_vous">Dos (cm)</label>
                                <input class="input" type="text" name="dos_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['dos'])) echo $mesures['dos']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis le bas du cou jusqu'à la longueur désirée, sous les fesses.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poignet</h2>
                            <div class="methode-mesure-img big mesurez-vous-poignet"></div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="poignet_vous">Poignet (cm)</label>
                                <input class="input" type="text" name="poignet_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poignet'])) echo $mesures['poignet']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez votre tour de poignet au niveau de l'os.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Bras</h2>
                            <div class="methode-mesure-img big mesurez-vous-bras"></div>
                            <div class="input-group">
                                <label class="label" for="bras-gauche_vous">Gauche (cm)</label>
                                <input class="input" type="text" name="bras-gauche_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['brasgauche'])) echo $mesures['brasgauche']; ?>">
                            </div>
                            <div class="input-group no-margin-bottom">
                                <label class="label" for="bras-droit">Droit (cm)</label>
                                <input class="input" type="text" name="bras-droit_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['brasdroit'])) echo $mesures['brasdroit']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez de la pointe d'épaule à la jointure du pouce.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Coupe / Aisance</h2>
                            <div class="methode-mesure-img aisance-coupe"></div>
                            <div class="input-group">
                                <select class="select-mesure" name="coupe_vous" id="coupe_vous" required value="<?php if (!empty($mesures['aisance1'])) echo $mesures['aisance1']; ?>">
                                    <option value="droit">Droite</option>
                                    <option value="cintre">Cintrée</option>
                                </select>
                            </div>
                            <div class="input-group no-margin-bottom">
                                <select class="select-mesure" name="aisance_vous" id="aisance_vous" required value="<?php if (!empty($mesures['aisance2'])) echo $mesures['aisance2']; ?>">
                                    <option value="ample">Ample</option>
                                    <option value="standard" selected="selected">Standard</option>
                                    <option value="pres-du-corps">Près du corps</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ENREGISTRER MESURE-RAPIDE -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="submit-container">
                            <input class="btn-rose" type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MESURE CHEMISE -->
<div id="mesure_chemise" class="container" style="<?php if (!empty($_SESSION['type_mesure']) && ($_SESSION['type_mesure'] == "mesure-rapide" || $_SESSION['type_mesure'] == "mesurez-vous")) echo 'display:none'; ?> ">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESURE SUR CHEMISE -->
            <form action="espace-client-mesures.php" method="POST">
                <input type="hidden" name="typeMesure" value="mesure-chemise" >
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Aide au calibrage</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- AGE -->
                                    <div class="input-group">
                                        <label class="label" for="age">Age</label>
                                        <input class="input" type="text" name="age" id="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['age'])) {
                                            echo $mesures['age'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" id="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['taille'])) {
                                            echo $mesures['taille'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" id="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                        if (!empty($mesures['poids'])) {
                                            echo $mesures['poids'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MESURE RAPIDE -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Col</h2>
                            <div class="methode-mesure-img mesure-chemise-col"></div>
                            <div class="input-group">
                                <label class="label" for="col_chemise">Col (cm)</label>
                                <input class="input" type="text" name="col_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['cou_chem'])) echo $mesures['cou_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis le centre du bouton, jusqu'au centre de la boutonnière, le col étant à plat.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poignet</h2>
                            <div class="methode-mesure-img mesure-chemise-poignet"></div>
                            <div class="input-group">
                                <label class="label" for="poignet_chemise">Poignet (cm)</label>
                                <input class="input" type="text" name="poignet_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poignet_chem'])) echo $mesures['poignet_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez d'un bord à l'autre, le poignet étant bien à plat.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Manche</h2>
                            <div class="methode-mesure-img mesure-chemise-manche"></div>
                            <div class="input-group">
                                <label class="label" for="manche_chemise">Manche (cm)</label>
                                <input class="input" type="text" name="manche_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['manchestandard'])) echo $mesures['manchestandard']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis la couture de l'épaule jusqu'au bout du poignet.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Demi-poitrine</h2>
                            <div class="methode-mesure-img mesure-chemise-demi-poitrine"></div>
                            <div class="input-group">
                                <label class="label" for="demi-poitrine_chemise">Demi-poitrine (cm)</label>
                                <input class="input" type="text" name="demi-poitrine_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poitrine_chem'])) echo $mesures['poitrine_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis la couture gauche jusqu'à la couture droite, juste en-dessous des manches.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Demi-taille</h2>
                            <div class="methode-mesure-img mesure-chemise-demi-taille"></div>
                            <div class="input-group">
                                <label class="label" for="demi-taille_chemise">Demi-taille (cm)</label>
                                <input class="input" type="text" name="demi-taille_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['taillestandard'])) echo $mesures['taillestandard']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis la couture gauche jusqu'à la couture droite, au niveau de la taille.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Dos</h2>
                            <div class="methode-mesure-img mesure-chemise-dos"></div>
                            <div class="input-group">
                                <label class="label" for="dos_chemise">Dos (cm)</label>
                                <input class="input" type="text" name="dos_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['dos_chem'])) echo $mesures['dos_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis la couture du col, jusqu'au bas de la chemise.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Carrure</h2>
                            <div class="methode-mesure-img mesure-chemise-carrure"></div>
                            <div class="input-group">
                                <label class="label" for="carrure_chemise">Carrure (cm)</label>
                                <input class="input" type="text" name="carrure_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['carrure_chem'])) echo $mesures['carrure_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez d'un bord de l'épaule à l'autre.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Épaule</h2>
                            <div class="methode-mesure-img mesure-chemise-epaule"></div>
                            <div class="input-group">
                                <label class="label" for="epaule_chemise">Épaule (cm)</label>
                                <input class="input" type="text" name="epaule_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['epaule_chem'])) echo $mesures['epaule_chem']; ?>">
                            </div>
                            <p class="mesure-conseil">Mesurez depuis la base du cou jusqu'à la pointe de l'épaule.</p>
                        </div>
                    </div>
                </div>
                <!-- ENREGISTRER MESURE-RAPIDE -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="submit-container">
                            <input class="btn-rose" type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>