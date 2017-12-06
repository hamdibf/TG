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
                    <li><a href="../configurateur">Créez votre chemise de A à Z</a></li>
                    <li><a href="../catalogue-chemise.html">Catalogue chemises</a></li>
                    <li><a href="../catalogue-tissu.html">Catalogue tissus</a></li>
                    <li><a href="../tout-savoir.html">Tout savoir pour ma commande</a></li>
                    <li><a href="../avis-clients.html">Ce que pensent nos clients</a></li>
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