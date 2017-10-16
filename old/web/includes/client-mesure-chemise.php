<!-- MESURE CHEMISE -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- FORMULAIRE MESURE SUR CHEMISE -->
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
                                        <input class="input" type="text" name="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['age']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                   <!-- TAILLE -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Taille (cm)</label>
                                        <input class="input" type="text" name="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['taille']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                   <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poids">Poids (kg)</label>
                                        <input class="input" type="text" name="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['poids']; ?>">
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
                                <input class="input" type="text" name="col_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['cou_chem']; ?>">
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
                                <input class="input" type="text" name="poignet_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['poignet_chem']; ?>">
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
                                <input class="input" type="text" name="manche_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['manche_chem']; ?>">
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
                                <input class="input" type="text" name="demi-poitrine_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['poitrine_chem']; ?>">
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
                                <input class="input" type="text" name="demi-taille_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['taille_chem']; ?>">
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
                                <input class="input" type="text" name="dos_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['dos_chem']; ?>">
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
                                <input class="input" type="text" name="carrure_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['carrure_manche']; ?>">
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
                                <input class="input" type="text" name="epaule_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php echo $mesures['epaule_chem']; ?>">
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