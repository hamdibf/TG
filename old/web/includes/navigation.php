<!-- MENU LATERAL-->
<div class="container-fluid menu-lateral-container" id="menu-lateral-container">
    <div class="menu-lateral" id="menu-lateral">
        <div class="menu-top">
            <div class="menu-top-titre-croix">
                <p class="titre-content oswald-regular ml-upper">Menu</p>
                <div id="croix" class="icon-croix" onclick="openMenulateral()">
                    <span></span>
                </div>
            </div>
            <p class="menu-top-welcome oswald-regular" style="font-size: 15px;">
                <?php
                echo TgSession::getGreeting($bdd);
                ?>
            </p>
            <div class="menu-bot">
                <ul class="menu-categorie oswald-regular ml-upper">
                    <li style="font-size: 15px;"><a href="configurateur">Créez votre chemise de A à Z</a></li>
                    <li style="font-size: 15px;"><a href="catalogue-chemise.html">Catalogue chemises</a></li>
                    <li style="font-size: 15px;"><a href="catalogue-tissu.html">Catalogue tissus</a></li>
                    <li style="font-size: 15px;"><a href="tout-savoir.html">Tout savoir pour ma commande</a></li>
                    <li style="font-size: 15px;"><a href="avis-tailorgeorge.html">Ce que pensent nos clients</a></li>
                </ul>
                <ul class="menu-categorie oswald-regular">
                    <li>
                        <span class="ml-upper" style="font-size: 15px;"><a href="#" onclick="openLiensguide()">Guide<img src="img/icon-fleche-menu-deroulant.svg" alt=""></a></span>
                        <ul class="guide-menu-deroulant" id="liens-guide">
                            <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                            <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                            <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                            <li><a href="">Exemple d'un lien de catégorie à la con, genre vraiment con...</a></li>
                            <li><a href="">Voir tous les articles</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="menu-categorie oswald-regular ml-upper">
                    <li style="font-size: 15px;"><a href="service-entreprise.html">B2B</a></li>
                </ul>
                <ul class="menu-categorie oswald-regular ml-upper">
                    <li style="font-size: 15px;"><a href="cadeau-chemise-sur-mesure.html">Offrez une chemise George</a></li>
                </ul>
                <ul class="menu-categorie oswald-regular ml-upper">
                    <li style="font-size: 15px;"><a href="Aide-Nous-contacter">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-footer oswald-regular">
            <div class="contact-rapide">
                <p style="font-size: 15px;">Contactez George à<span>george@tailorgeorge.fr</span></p>
            </div>
            <div class="choix-langue">
                <span style="font-size: 15px;">Langue du site:</span>
                <img class="drapeau-langue" src="img/flag-fr.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- NAVIGATION MOBILE/FIXE -->
<nav id="header" class="navbar navbar-fixed-top" style="z-index: 99;">
    <div id="header-container" class="container navbar-container">
        <div id="navbar" class="row collapse navbar-collapse">
                            <!-- BURGER MENU -->

                                    <div id="openMenu" class="burger-menu"  style="float : left">
                                        <span class="icon-burger"></span>
                                        <span class="hide-text oswald-regular">menu</span>
                                    </div>

                                    <div id="brand" class="logo-container navbar-brand" style="margin-left: 0px;">
                                        <a class="logo" href="home"><img src="img/logo.svg" alt="Tailor George logo"></a>
                                        <div>
                                            <img src="img/flag-fr.png" alt="">
                                        </div>
                                    </div>

                                    <div class="right-navigation" style="float : left">
                                        <!-- BTN COMPTE
                                        <div class="compte-btn">
                                            <img class="compte-btn-img" src="img/icon-mon-compte.svg" alt="">
                                            <span class="hide-text oswald-regular">compte</span>
                                        </div>-->
                                        
                                        <a class="panier-btn" id="panier_btn" href="panier.html">
                                            <?php if (TgSession::getPaniersProductCount($bdd) > 0) { ?><span id="panier-pill" class="badge badge-pill" style="background-color:#dc3545;left: 28px;top: 11px;position: relative;"><?php echo TgSession::getPaniersProductCount($bdd); ?></span><?php } ?>
                                            <img class="panier-btn-img" src="img/icon-panier.svg" alt="">
                                            <span class="hide-text oswald-regular">panier</span>
                                        </a>
                                        <div class="panier-content-hover" style="display:none;position: absolute;top: 70px;right: 10px;z-index: 999;background: white;border: 1px solid #c4c4c4;">
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
                                                $total += $dd["prix"];
                                                $img = end(explode("/", $dd["jpg_face"]));
                                                $imgResult = "../../img/" . $img;
                                                ?>
                                                <div class="article-panier" style="margin:0px;padding:0px;">
                                                    <div class="photo-article-panier" style="width:100px;min-width:10px;height:60px;">
                                                        <img src="<?php echo $imgResult; ?>" alt="">
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
</nav>
<script type = "text/javascript" src = "./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script>
    var mlc = document.getElementById("menu-lateral-container"),
    ml = document.getElementById("menu-lateral");
    $(document).ready(function(){
$("#openMenu").click(function(e){
            mlc.classList.toggle("mlc-open");
            ml.classList.toggle("ml-open");
    });
$('body,html').click(function(event){
    $(".panier-content-hover").fadeOut(100);
        if (event.target.id != "" && event.target.id != "openMenu") {
            mlc.classList.remove("mlc-open");
            ml.classList.remove("ml-open");
        }
    });
/**
 * This object controls the nav bar. Implement the add and remove
 * action over the elements of the nav bar that we want to change.
 *
 * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
 */
var myNavBar = {

    flagAdd: true,

    elements: [],

    init: function (elements) {
        this.elements = elements;
    },

    add : function() {
        if(this.flagAdd) {
            for(var i=0; i < this.elements.length; i++) {
                document.getElementById(this.elements[i]).className += " fixed-theme";
            }
            this.flagAdd = false;
        }
    },

    remove: function() {
        for(var i=0; i < this.elements.length; i++) {
            document.getElementById(this.elements[i]).className =
                    document.getElementById(this.elements[i]).className.replace( /(?:^|\s)fixed-theme(?!\S)/g , '' );
        }
        this.flagAdd = true;
    }

};

/**
 * Init the object. Pass the object the array of elements
 * that we want to change when the scroll goes down
 */
myNavBar.init(  [
    "header",
    "header-container",
    "brand",
    "openMenu",
    "panier_btn"
]);

/**
 * Function that manage the direction
 * of the scroll
 */
function offSetManager(){

    var yOffset = 0;
    var currYOffSet = window.pageYOffset;

    if(yOffset < currYOffSet) {
        myNavBar.add();
    }
    else if(currYOffSet == yOffset){
        myNavBar.remove();
    }

}

function fixFilter(){                  //.navbar-fixed-top
    var y_Offset = 283;
    var currentYOffSet = window.pageYOffset;

    if(y_Offset < currentYOffSet) {
        document.getElementById("filtre_container").classList.add("filtre-fixed-top");
    }
    else if(y_Offset > currentYOffSet ){
        document.getElementById("filtre_container").classList.remove("filtre-fixed-top");
    }
}

/**
 * bind to the document scroll detection
 */
window.onscroll = function(e) {
    offSetManager();
    if (document.getElementById("filtre_container")) {
        fixFilter();
    }
}

/**
 * We have to do a first detectation of offset because the page
 * could be load with scroll down set.
 */
offSetManager();
if (document.getElementById("filtre_container")) {
    fixFilter();
}
});
</script>