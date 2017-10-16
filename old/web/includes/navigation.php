<!-- MENU LATERAL-->
    <div class="container-fluid menu-lateral-container" id="menu-lateral-container">
        <div class="menu-lateral" id="menu-lateral">
            <div class="menu-top">
               <div class="menu-top-titre-croix">
                    <p class="titre-content oswald-regular">Menu</p>
                    <div class="icon-croix" onclick="openMenulateral()">
                        <span></span>
                    </div>
                </div>    
                <p class="menu-top-welcome">				
				<?php 
					echo TgSession::getGreeting($bdd);
				?>
				</p>
                <div class="menu-bot">
                    <ul class="menu-categorie dinpro-medium">
                        <li><a href="configurateur">Créez votre chemise de A à Z</a></li>
                        <li><a href="catalogue-chemise.html">Catalogue chemises</a></li>
                        <li><a href="catalogue-tissu.html">Catalogue tissus</a></li>
                        <li><a href="tout-savoir.html">Tout savoir pour ma commande</a></li>
                        <li><a href="avis-clients.html">Ce que pensent nos clients</a></li>
                    </ul>
                    <ul class="menu-categorie dinpro-medium">
                        <li>
                            <span><a href="#" onclick="openLiensguide()">Guide<img src="img/icon-fleche-menu-deroulant.svg" alt=""></a></span>
                            <ul class="guide-menu-deroulant dinpro-regular" id="liens-guide">
                                <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                                <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                                <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                                <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                                <li><a href="">Voir tous les articles</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="menu-categorie dinpro-medium">
                        <li><a href="service-entreprise.html">B2B</a></li>
                    </ul>
                    <ul class="menu-categorie dinpro-medium">
                        <li><a href="cadeau-chemise-sur-mesure.html">Offrez une chemise George</a></li>
                    </ul>    
                    <ul class="menu-categorie dinpro-medium">
                        <li><a href="Aide-Nous-contacter">Contact</a></li>
                    </ul>            
                </div>
            </div>
            <div class="menu-footer">
                <div class="contact-rapide">
                    <p>Contactez George à<span>george@tailorgeorge.fr</span></p>
                </div>
                <div class="choix-langue">
                    <span>Langue du site:</span>
                    <img class="drapeau-langue" src="img/flag-fr.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- NAVIGATION MOBILE/FIXE -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="navigation-fixe">
                    <!-- BURGER MENU -->
                    <div class="burger-menu" onclick="openMenulateral()">
                        <span class="icon-burger"></span>
                        <span class="hide-text oswald-regular">menu</span>
                    </div>
                    <!-- LOGO -->
                    <div class="logo-container">
                        <a class="logo" href="home"><img src="img/logo.svg" alt="Tailor George logo"></a>
                        <img src="img/flag-fr.png" alt="">
                    </div>    
                    <!-- RIGHT NAVIGATION -->
                    <div class="right-navigation">
                        <!-- BTN COMPTE                   
                        <div class="compte-btn">
                            <img class="compte-btn-img" src="img/icon-mon-compte.svg" alt="">
                            <span class="hide-text oswald-regular">compte</span>
                        </div>
                        -->						
                        <a class="panier-btn" href="panier-step-1.php">
                            <?php if(TgSession::getPaniersProductCount($bdd)>0) { ?><span id="panier-pill" class="badge badge-pill" style="background-color:#dc3545;left: 28px;top: 11px;position: relative;"><?php echo TgSession::getPaniersProductCount($bdd); ?></span><?php } ?>
							<img class="panier-btn-img" src="img/icon-panier.svg" alt="">
                            <span class="hide-text oswald-regular">panier</span>							
                        </a>
						<div class="panier-content-hover" style="display:none;position: absolute;top: 70px;right: 10px;z-index: 999;background: white;border: 1px solid #c4c4c4;">
							<?php 
								$id = session_id();
								$total = 0;
								$sql = 'select * from tg_paniers_items where panier_id="'.$id.'"';
								$query = $bdd->query($sql);
								while($data = $query->fetch()) 
								{
									$ss = 'select * from tailorgeorge_modele where id_auto="'.$data['product_id'].'"';
									$qq = $bdd->query($ss);
									$dd = $qq->fetch();
									$total += $dd["prix"];
							?>
							<div class="article-panier" style="margin:0px;padding:0px;">
								<div class="photo-article-panier" style="width:100px;min-width:10px;height:60px;">
									<img src="../../<?php echo $dd["jpg_face"]; ?>" alt="">
								</div>
								<div class="description-article-panier" style="height:100px;">
									<div class="description-top">
										<p class="nom-article-panier" style="font-size:13px;margin-right:0px;width:130px;height:60px;"><?php echo $dd["h1"]; ?></p>
										<p class="prix-article-panier oswald-bold" style="font-size:13px;width:50px;height:60px;"><?php echo $dd["prix"]; ?>€</p>
									</div>
								</div>
							</div>
							<?php } ?>	
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>