<!-- COORDONEES -->
    <div class="row">
        <div class="col-xs-12">
            <!--  COORDONNEE  -->
            <form action="">
                <!-- NOM / PRENOM / NUM -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vous</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- PRENOM -->
                                    <div class="input-group">
                                        <label class="label" for="prenom">Prénom</label>
                                        <input class="input" type="text" name="prenom" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["prenom"]; ?>"> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- NOM -->
                                    <div class="input-group">
                                        <label class="label" for="taille">Nom</label>
                                        <input class="input" type="text" name="nom" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["nom"]; ?>"> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- POIDS -->
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="number">Numéro de Tél.</label>
                                        <input class="input" type="number" name="number" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["telephone"]; ?>"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ADRESSE DE FACTURATION -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de facturation</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- ADRESSE -->
                                    <div class="input-group">
                                        <label class="label" for="adresse">Adresse</label>
                                        <input class="input" type="text" name="adresse" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["adresse"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- ADRESSE SUITE -->
                                    <div class="input-group">
                                        <label class="label" for="societe">Societé</label>
                                        <input class="input" type="text" name="societe" onfocus="activLabel(this)" onblur="activLabel(this)">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- RENSEIGNEMENT -->
                                    <div class="input-group">
                                        <label class="label" for="renseignement">Infos (code, étage...)</label>
                                        <input class="input" type="text" name="renseignement" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["renseignement"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- CODE POSTAL -->
                                    <div class="input-group">
                                        <label class="label" for="code-postal">Code postal</label>
                                        <input class="input" type="text" name="code-postal" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["postal"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- VILLE -->
                                    <div class="input-group">
                                        <label class="label" for="ville">Ville</label>
                                        <input class="input" type="text" name="ville" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["ville"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- PAYS -->
                                    <div class="input-group">
                                        <select class="select-mesure input" name="" style="width: 100%;">
                                            <?php 
												$s = 'select * from tg_pays';
												$q = $bdd->query($s);
												while($pays=$q->fetch())
												{
													$selected = '';
													if($pays['nom']=='France métropole'){ $selected = ' selected="selected"'; } 
													echo '<option value="'.$pays['code'].'" '.$selected.'>'.$pays['nom'].'</option>';
												}
											?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ADRESSE DE LIVRAISON -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de livraison</h2>
                            <p class="livraison-info">Les livraisons ont lieu du lundi au vendredi de 9h à 18h. Vous pouvez nous indiquer une adresse différente (bureau, amis...)</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <!-- ADRESSE -->
                                    <div class="input-group">
                                        <label class="label" for="adresse">Adresse</label>
                                        <input class="input" type="text" name="adresse" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["adresse_livraison"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- SOCIETE -->
                                    <div class="input-group">
                                        <label class="label" for="societe">Societé</label>
                                        <input class="input" type="text" name="societe" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["societe_livraison"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- RENSEIGNEMENT -->
                                    <div class="input-group">
                                        <label class="label" for="renseignement">Infos (code, étage...)</label>
                                        <input class="input" type="text" name="renseignement" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["renseignement_livraison"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- CODE POSTAL -->
                                    <div class="input-group">
                                        <label class="label" for="code-postal">Code postal</label>
                                        <input class="input" type="text" name="code-postal" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["postal_livraison"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- VILLE -->
                                    <div class="input-group">
                                        <label class="label" for="ville">Ville</label>
                                        <input class="input" type="text" name="ville" onfocus="activLabel(this)" onblur="activLabel(this)" value="<?php echo $client["ville_livraison"]; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <!-- PAYS -->
                                    <div class="input-group">
                                        <select class="select-mesure input" name="" style="width: 100%;">
                                            <?php 
												$s = 'select * from tg_pays';
												$q = $bdd->query($s);
												while($pays=$q->fetch())
												{
													$selected = '';
													if($pays['nom']=='France métropole'){ $selected = ' selected="selected"'; } 
													echo '<option value="'.$pays['code'].'" '.$selected.'>'.$pays['nom'].'</option>';
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