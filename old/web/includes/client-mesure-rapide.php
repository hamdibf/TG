
<!-- MESURE RAPIDE -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESURE RAPIDE -->
            <form action="nouveau-compte.html" method="POST">
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
                                        <input class="input" type="text" name="age" id="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['age']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                   <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" id="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['taille']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                   <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" id="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['poids']; ?>">
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
                                <option value="XS" <?php if($mesures["mesure_rapide_taille"]=="XS") { echo 'selected'; } ?>>37 - (XS) - 14,5</option>
                                <option value="S" <?php if($mesures["mesure_rapide_taille"]=="S") { echo 'selected'; } ?>>38 - (S) - 14,5</option>
                                <option value="S+" <?php if($mesures["mesure_rapide_taille"]=="S+") { echo 'selected'; } ?>>39 - (S+) - 14,5</option>
                                <option value="M" <?php if($mesures["mesure_rapide_taille"]=="M") { echo 'selected'; } ?>>40 - (M) - 14,5</option>
                                <option value="M+" <?php if($mesures["mesure_rapide_taille"]=="M+") { echo 'selected'; } ?>>41 - (M+) - 14,5</option>
                                <option value="L" <?php if($mesures["mesure_rapide_taille"]=="L") { echo 'selected'; } ?>>42 - (L) - 14,5</option>
                                <option value="L+" <?php if($mesures["mesure_rapide_taille"]=="L+") { echo 'selected'; } ?>>43 - (L+) - 14,5</option>
                                <option value="XL" <?php if($mesures["mesure_rapide_taille"]=="XL") { echo 'selected'; } ?>>44 - (XL) - 14,5</option>
                                <option value="XL+" <?php if($mesures["mesure_rapide_taille"]=="XL+") { echo 'selected'; } ?>>45 - (XL+) - 14,5</option>
                                <option value="XXL" <?php if($mesures["mesure_rapide_taille"]=="XXL") { echo 'selected'; } ?>>46 - (XXL) - 14,5</option>
                                <option value="XXL+" <?php if($mesures["mesure_rapide_taille"]=="XXL+") { echo 'selected'; } ?>>47 - (XXL+) - 14,5</option>
                                <option value="XXXl" <?php if($mesures["mesure_rapide_taille"]=="XXXl") { echo 'selected'; } ?>>48 - (XXXL) - 14,5</option>
                            </select>
                            <p class="mesure-conseil">(Choisissez la taille qui vous va le mieux au niveau du corps)</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez votre encolure</h2>
                            <div class="methode-mesure-img mesure-rapide-col"></div>
                            <select class="select-mesure" name="mesure-rapide-col" id="mesure-rapide-col" required>
                                <option value="37">37 cm</option>
                                <option value="38">38 cm</option>
                                <option value="39">39 cm</option>
                                <option value="40">40 cm</option>
                                <option value="41">41 cm</option>
                                <option value="42">42 cm</option>
                                <option value="43">43 cm</option>
                                <option value="44">44 cm</option>
                                <option value="45">45 cm</option>
                                <option value="46">46 cm</option>
                                <option value="47">47 cm</option>
                                <option value="48">48 cm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez la longueur de vos manches</h2>
                            <div class="methode-mesure-img mesure-rapide-bras"></div>
                            <select class="select-mesure" name="mesure-rapide-bras" id="mesure-rapide-bras" required>
                                <option value="extracourte">Manches extra-courtes (-4 cm)</option>
                                <option value="courte">Manches plus courtes (-2 cm)</option>
                                <option value="standard" selected="selected">Manches standards</option>
                                <option value="longue">Manches plus longues (+2 cm)</option>
                                <option value="extralongue">Manches extra-longues (+4 cm)</option>
                            </select>
                            <p class="mesure-conseil">Longueur standard = 64 cm</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="methode-mesure-rapide">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Choisissez la coupe de votre chemise</h2>
                            <div class="methode-mesure-img aisance-coupe"></div>
                            <select class="select-mesure" name="aisance-coupe_rapide" id="aisance-coupe_rapide" required>
                                <option value="droit">Droite</option>
                                <option value="cintre">Cintrée</option>
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