<!-- MESURE CHEMISE -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESUREZ-VOUS -->
            <form action="inscription-adresse.html" method="POST">
                <input type="hidden" name="typeMesure" value="mesurez-vous" >
                <!-- AGE / TAILLE / POIDS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Aide au calibrage</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- AGE -->
                                    <div class="input-group">
                                        <label class="label" for="age">Age</label>
                                        <input class="input" type="text" name="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['age'])) echo $mesures['age']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['taille'])) echo $mesures['taille']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poids'])) echo $mesures['poids']; ?>">
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