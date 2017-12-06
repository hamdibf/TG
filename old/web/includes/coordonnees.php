<!-- COORDONEES -->
<div class="row">
    <div class="col-xs-12">
        <!--  COORDONNEE  -->
        <form id="formEditCoordonnees" name="formEditCoordonnees" action="espace-client-coordonnees.php" method="post">
            <!-- NOM / PRENOM / NUM -->
            <input type="hidden" name="adresse_identique" id="adresse_identique" value="<?php echo $adresse_identique; ?>">
            <div class="row">
                <div class="col-xs-12">
                    <div class="methode-mesure methode-small" style="margin-bottom: 0px">
                        <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Votre adresse de livraison</h2>
                        <div class="row">
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- NOM -->
                                <div class="input-group">
                                    <label class="label" for="nom_livraison">Nom</label>
                                    <input class="input" type="text" name="nom_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["nom_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- PRENOM -->
                                <div class="input-group">
                                    <label class="label" for="prenom_livraison">Prénom</label>
                                    <input class="input" type="text" name="prenom_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["prenom_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- SOCIETE -->
                                <div class="input-group">
                                    <label class="label" for="societe">Societé</label>
                                    <input class="input" type="text" name="societe_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["societe_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- TEL -->
                                <div class="input-group no-margin-bottom">
                                    <label class="label" for="number">Numéro de Tél.</label>
                                    <input class="input" type="number" name="number" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["telephone"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- ADRESSE -->
                                <div class="input-group">
                                    <label class="label" for="adresse">Adresse</label>
                                    <input class="input" type="text" name="adresse" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["adresse_livraison"]; ?>">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- RENSEIGNEMENT -->
                                <div class="input-group">
                                    <label class="label" for="renseignement">Infos (code, étage...)</label>
                                    <input class="input" type="text" name="renseignement" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["renseignement_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- CODE POSTAL -->
                                <div class="input-group">
                                    <label class="label" for="code-postal">Code postal</label>
                                    <input class="input" type="text" name="code-postal" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["postal_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- VILLE -->
                                <div class="input-group">
                                    <label class="label" for="ville">Ville</label>
                                    <input class="input" type="text" name="ville" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["ville_livraison"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- PAYS -->
                                <div class="input-group">
                                    <select class="select-mesure input" name="pays" style="width: 100%;">
                                        <?php
                                        $selectPays = 'select * from tg_pays';
                                        $queryPays = $bdd->query($selectPays);
                                        while ($pays = $queryPays->fetch()) {
                                            $selected = '';
                                            //if ($pays['nom'] == 'France métropole') { A voir pourquoi
                                            if ($pays['code'] == $client["pays_livraison"]) {
                                                $selected = ' selected="selected"';
                                            }
                                            echo '<option value="' . $pays['code'] . '" ' . $selected . '>' . $pays['nom'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADRESSE DE FACTURATION -->
            <div class="row">
                <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto; background-image: -webkit-linear-gradient(#dcdcdc, white);background-image: -moz-linear-gradient(#dcdcdc, white);background-image: -ms-linear-gradient(#dcdcdc, white);background-image: -o-linear-gradient(#dcdcdc, white);">
                    <!-- PAYS -->
                    <h2 class="oswald-regular" style="margin-bottom: 20px; text-align: center; font-size: 1.5em; padding-top: 20px;padding-bottom: 20px;">Adresse de facturation identique  <span id="yes" style="background: url(img/<?php if ($adresse_identique == "yes") echo 'checked.png'; else echo 'unchecked.png';?>) no-repeat; background-size: 17px; padding: 0 10px 0 15px; display: inline-block; height: 17px; cursor: pointer; margin-left: 20px;" onclick="affiche_facturation('on');"></span>Oui<span id="no" style="background: url(img/<?php if ($adresse_identique == "yes") echo 'unchecked.png'; else echo 'checked.png';?>) no-repeat; background-size: 17px; padding: 0 10px 0 15px; display: inline-block; height: 17px; cursor: pointer;  margin-left: 20px;" onclick="affiche_facturation('off');"></span>Non</h2>
                </div>
            </div>
            <div id="bloc_facturation" class="row" <?php if ($adresse_identique == "yes") echo 'style="display: none"'?>>
                <div class="col-xs-12">
                    <div class="methode-mesure methode-small">
                        <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de facturation</h2>
                        <div class="row">
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- NOM -->
                                <div class="input-group">
                                    <label class="label" for="taille">Nom</label>
                                    <input class="input" type="text" name="nom" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["nom"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- PRENOM -->
                                <div class="input-group">
                                    <label class="label" for="prenom">Prénom</label>
                                    <input class="input" type="text" name="prenom" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["prenom"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- ADRESSE -->
                                <div class="input-group">
                                    <label class="label" for="adresse">Adresse</label>
                                    <input class="input" type="text" name="adresse_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["adresse"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- ADRESSE SUITE -->
                                <div class="input-group">
                                    <label class="label" for="societe">Societé</label>
                                    <input class="input" type="text" name="societe_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["societe"]; ?>" >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- RENSEIGNEMENT -->
                                <div class="input-group">
                                    <label class="label" for="renseignement">Infos (code, étage...)</label>
                                    <input class="input" type="text" name="renseignement_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["renseignement"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- CODE POSTAL -->
                                <div class="input-group">
                                    <label class="label" for="code-postal">Code postal</label>
                                    <input class="input" type="text" name="code-postal_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["postal"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- VILLE -->
                                <div class="input-group">
                                    <label class="label" for="ville">Ville</label>
                                    <input class="input" type="text" name="ville_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["ville"]; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- PAYS -->
                                <div class="input-group">
                                    <select class="select-mesure input" name="pays_facturation" style="width: 100%;">
                                        <?php
                                        $s = 'select * from tg_pays';
                                        $q = $bdd->query($s);
                                        while ($pays = $q->fetch()) {
                                            $selected = '';
                                            //if ($pays['nom'] == 'France métropole') {
                                            if ($pays['code'] == $client["pays"]) {
                                                $selected = ' selected="selected"';
                                            }
                                            echo '<option value="' . $pays['code'] . '" ' . $selected . '>' . $pays['nom'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>