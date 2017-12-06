<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tailor George</title>
        <meta name="description" content="Tailor George">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Crimson+Text" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <!-- scripts area -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <noscript>Vous devez avoir le javascript d'activé pour utiliser cette page</noscript>
        <section id="shirt">
            <header><img class="menu" src="img/icons/menu.svg" width="20">
                <div class="logo">TG</div>
                <button class="buy">
                    <img src="img/icons/cart.svg" width="20">
                </button>
                <div class="price">79€</div>
                <div class="delivery">Livraison gratuite</div>
            </header>
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
            <footer>
                <img class="menu" src="img/icons/menu.svg" width="20">
                <img src="img/icons/logo.svg">
            </footer>
        </section>
        <section id="configurator">
            <button class="back hidden">
                <img src="img/icons/back.svg" height="15">
            </button>
            <nav class="hidden">
                <ul>
                    <li class="item-1 active" data-id="1">
                        <div class="img"></div>
                        tissus
                    </li>
                    <li class="item-2" data-id="2">
                        <div class="img"></div>
                        cols
                    </li>
                    <li class="item-3" data-id="3">
                        <div class="img"></div>
                        poignets
                    </li>
                    <li class="item-4" data-id="4">
                        <div class="img"></div>
                        poches
                    </li>
                    <li class="item-5" data-id="5">
                        <div class="img"></div>
                        bas
                    </li>
                    <li class="item-6" data-id="6">
                        <div class="img"></div>
                        dos
                    </li>
                    <li class="item-7" data-id="7">
                        <div class="img"></div>
                        boutons
                    </li>
                    <li class="item-8" data-id="8">
                        <div class="img"></div>
                        broderies
                    </li>
                    <li class="item-9" data-id="9">
                        <div class="img"></div>
                        doublures
                    </li>
                </ul>
            </nav>
            <div class="content">
                <section class="step" id="step-0">
                    <h2 class="first"> Cliquez sur un élément pour le modifier</h2><br>
                    <div class="parts">
                        <div class="part summary-fabric" data-id="1" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-collar" data-id="2" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-wrists" data-id="3" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-pockets" data-id="4" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-bottom" data-id="5" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-back" data-id="6" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-buttons" data-id="7" data-category="summary">
                            <div class="img">
                                <img src="">
                            </div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-embroidery_position" data-id="8" data-category="summary">
                            <div class="img">
                                <img src=""></div>
                            <div class="name"></div>

                        </div>
                        <div class="part summary-lining" data-id="9" data-category="summary">
                            <div class="img">
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
                    <strong id="fabric-number"><span></span>tissus</strong>
                    <section id="fabrics-container"></section>
                    <script>
                        $(document).ready(function() {
                            const shirt = new ShirtImage();
                            document.querySelectorAll('.part').forEach(v => v.addEventListener('click', _ => {
                                    const cat = v.getAttribute('data-category');
                                    const id = v.getAttribute('data-id');
                                    const label = v.getAttribute('data-label');

                                    document.querySelectorAll(`.part[data-category="${cat}"]`).forEach(v => v.classList.remove('active'));
                                    if (cat != 'summary') {
                                        v.classList.toggle('active');
                                        shirt[cat] = id;
                                        shirt.setLabel(cat, label);
                                        shirt.setElement(cat);

                                        if (cat != 'buttonholes') {
                                            if (cat == 'buttons') {
                                                shirt.setPartSummary(cat, 'png');
                                            } else {
                                                shirt.setPartSummary(cat);
                                            }
                                        }
                                    }
                                    switch (cat) {
                                        case 'pockets':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'collar':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'wrists':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'epaulettes':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'bottom':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'throat':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'fabric':
                                            document.getElementById("poches").value = id;
                                            break;
                                        case 'buttons':
                                            document.getElementById("poches").value = id;
                                            this.setButtons();
                                        case 'buttonholes':
                                            document.getElementById("poches").value = id;
                                            break;
                                    }
                                }));

                            charger_tissu();
                            reload_chemise_png('face');
                            document.querySelectorAll("select").forEach(function(t) {
                                return t.addEventListener("change", function(t) {
                                    var col = $('select[name="couleur"]').val();
                                    var tiss = $('select[name="tissage"]').val();
                                    var mot = $('select[name="motif"]').val();
                                    return charger_tissu(col, tiss, mot);
                                });
                            });
                        });
                        function charger_tissu(couleur = 'all', tissage = 'all', motif = 'all')
                        {
                            $.ajax({
                                url: "ajax/fabricsLoad.php",
                                type: 'POST',
                                data: 'couleur=' + couleur + '&tissage=' + tissage + '&motif=' + motif,
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
                            document.querySelectorAll('.fabric[data-category="fabric"]').forEach(function(t) {
                                return t.classList.remove("active")
                            });
                            var e = document.querySelector('.fabric[data-category="fabric"][data-id="' + sessionStorage.getItem("fabric") + '"]');
                            e.classList.add("active");
                            $('#tissu_select_referece').val(reference);
                            //$('#'+id).css('border','1px solid #c4c4c4');
                            document.querySelectorAll('.part[data-category="summary"][data-id="1"]').forEach(function(t) {
                                return t.innerHTML = '<div class="img"><img src="http://www.ls-chemise.com/tissu/150/' + code + '.jpg" style="width:100%;" /></div><div class="name">' + reference + '</div>';
                            });

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
                            $('#shirt-container').html('<img style=" height: 50px; top: 50%" src="img/icons/curved-bars.svg" />');
                            //collecte des valeurs
                            //reference = $("#tissu_select_referece").html();
                            reference = sessionStorage.getItem("fabric") ? sessionStorage.getItem("fabric") : "T2870";
                            hp = $("#col").find(':selected').data("hp");
                            col = "CLA";
                            baleine = "A";
                            tenue_col = "R";
                            poignets = "A11";
                            poches = "1";
                            epaulettes = "";
                            bas = "L";
                            gorge = "S";
                            dos = "";
                            pinces = "";
                            boutons = "standard";
                            couture = "1801";
                            tissu_doublure_reference = "";
                            tissu_doublure_code = "";
                            tissu_doublure_id = "";
                            doublure_col = "";
                            doublure_poignets = "";
                            //check if undefined
                            if (typeof reference == 'undefined') {
                                reference = "T2870";
                            }
                            if (typeof col == 'undefined') {
                                col = "CLA";
                            }
                            if (typeof baleine == 'undefined') {
                                baleine = "A";
                            }
                            if (typeof tenue_col == 'undefined') {
                                tenue_col = "R";
                            }
                            if (typeof poignets == 'undefined') {
                                poignets = "A11";
                            }
                            if (typeof poches == 'undefined') {
                                poches = "1";
                            }
                            if (typeof epaulettes == 'undefined') {
                                epaulettes = "";
                            }
                            if (typeof bas == 'undefined') {
                                bas = "L";
                            }
                            if (typeof gorge == 'undefined') {
                                gorge = "S";
                            }
                            if (typeof dos == 'undefined') {
                                dos = "";
                            }
                            if (typeof pinces == 'undefined') {
                                pinces = "";
                            }
                            if (typeof boutons == 'undefined') {
                                boutons = "standard";
                            }
                            if (typeof couture == 'undefined') {
                                couture = "1801";
                            }
                            if (typeof tissu_doublure_reference == 'undefined') {
                                tissu_doublure_reference = "";
                            }
                            if (typeof tissu_doublure_code == 'undefined') {
                                tissu_doublure_code = "";
                            }
                            if (typeof tissu_doublure_id == 'undefined') {
                                tissu_doublure_id = "";
                            }
                            if (typeof doublure_col == 'undefined') {
                                doublure_col = "";
                            }
                            if (typeof doublure_poignets == 'undefined') {
                                doublure_poignets = "";
                            }
                            //ajax call
                            $.ajax({
                                url: 'load_image.php',
                                type: 'POST',
                                data: 'view=' + view + '&reference=' + reference + '&col=' + col + '&hp=' + hp + '&baleine=' + baleine + '&tenue_col=' + tenue_col + '&poignets=' + poignets + '&poches=' + poches + '&epaulettes=' + epaulettes + '&bas=' + bas + '&gorge=' + gorge + '&dos=' + dos + '&pinces=' + pinces + '&boutons=' + boutons + '&couture=' + couture + '&tissu_doublure_reference=' + tissu_doublure_reference + '&tissu_doublure_code=' + tissu_doublure_code + '&tissu_doublure_id=' + tissu_doublure_id + '&doublure_col=' + doublure_col + '&doublure_poignets=' + doublure_poignets + '&timecall=<?php echo time(); ?>',
                                error: function(data, errorThrown) {
                                    console.log(errorThrown);
                                    console.log(data);
                                },
                                success: function(result)
                                {
                                    $('#shirt-container').html(result);
                                }
                            });
                        }
                    </script>

                </section>
                <section class="hidden step" id="step-2">
                    <header>
                        <div class="name">Cols</div>
                        <div class="close">x</div>
                    </header>
                    <form>
                        <div class="select">
                            <select name="col">
                                <option value="Rigide">Rigide</option>
                                <option value="Souple">Souple</option>
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
                                <option value="Avec">Avec</option>
                                <option value="Sans">Sans</option>
                                <option value="Amovibles">Amovibles</option>
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
                        <div class="part active" data-category="collar" data-id="CLA" data-label="Classique">
                            <div class="img">
                                <img src="img/pictos/col_CLA.svg" width="85">
                            </div>
                            <div class="name">Classique</div>

                        </div>
                        <div class="part" data-category="collar" data-id="ITA" data-label="Italien">
                            <div class="img"><img src="img/pictos/col_ITA.svg" width="85"></div>
                            <div class="name">Italien</div>

                        </div>
                        <div class="part" data-category="collar" data-id="ITO" data-label="Italien rond">
                            <div class="img"><img src="img/pictos/col_ITO.svg" width="85"></div>
                            <div class="name">Italien rond</div>

                        </div>
                        <div class="part" data-category="collar" data-id="CTW" data-label="Italien ouvert">
                            <div class="img"><img src="img/pictos/col_CTW.svg" width="85"></div>
                            <div class="name">Italien ouvert</div>

                        </div>
                        <div class="part" data-category="collar" data-id="CTW" data-label="Cutaway">
                            <div class="img"><img src="img/pictos/col_CTW.svg" width="85"></div>
                            <div class="name">Cutaway</div>

                        </div>
                        <div class="part" data-category="collar" data-id="BOU" data-label="Boutonné">
                            <div class="img"><img src="img/pictos/col_BOU.svg" width="85"></div>
                            <div class="name">Boutonné</div>

                        </div>
                        <div class="part" data-category="collar" data-id="DAN" data-label="Dandy">
                            <div class="img"><img src="img/pictos/col_DAN.svg" width="85"></div>
                            <div class="name">Dandy</div>

                        </div>
                        <div class="part" data-category="collar" data-id="ANG" data-label="Anglais">
                            <div class="img"><img src="img/pictos/col_ANG.svg" width="85"></div>
                            <div class="name">Anglais</div>

                        </div>
                        <div class="part" data-category="collar" data-id="ACIG" data-label="Napolitain">
                            <div class="img"><img src="img/pictos/col_ACIG.svg" width="85"></div>
                            <div class="name">Napolitain</div>

                        </div>
                        <div class="part" data-category="collar" data-id="TEN" data-label="Longues Pointes">
                            <div class="img">
                                <img src="img/pictos/col_TEN.svg" width="85">
                            </div>
                            <div class="name">Longues Pointes</div>

                        </div>

                    </div>
                    <h2>Cols spéciaux</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-label="Mao" data-id="MAO">
                            <div class="img"><img src="img/pictos/col_MAO.svg" width="85"></div>
                            <div class="name">Mao</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Maomao" data-id="MMO">
                            <div class="img"><img src="img/pictos/col_MMO.svg" width="85"></div>
                            <div class="name">Maomao</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Officier" data-id="OFR">
                            <div class="img"><img src="img/pictos/col_OFR.svg" width="85"></div>
                            <div class="name">Officier</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Officier carré" data-id="OFC">
                            <div class="img"><img src="img/pictos/col_OFC.svg" width="85"></div>
                            <div class="name">Officier carré</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Indien" data-id="REP">
                            <div class="img"><img src="img/pictos/col_REP.svg" width="85"></div>
                            <div class="name">Indien</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Inversé" data-id="INS">
                            <div class="img"><img src="img/pictos/col_INS.svg" width="85"></div>
                            <div class="name">Inversé</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Cérémonie" data-id="CAS">
                            <div class="img"><img src="img/pictos/col_CAS.svg" width="85"></div>
                            <div class="name">Cérémonie</div>

                        </div>

                    </div>
                    <h2>Minis cols</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-label="Mini boutonné" data-id="MBT">
                            <div class="img"><img src="img/pictos/col_MBT.svg" width="85"></div>
                            <div class="name">Mini boutonné</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Mini classique" data-id="MCL">
                            <div class="img"><img src="img/pictos/col_MCL.svg" width="85"></div>
                            <div class="name">Mini classique</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Mini rond" data-id="MRO">
                            <div class="img"><img src="img/pictos/col_MRO.svg" width="85"></div>
                            <div class="name">Mini rond</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Mini inversé" data-id="INP">
                            <div class="img"><img src="img/pictos/col_INP.svg" width="85"></div>
                            <div class="name">Mini inversé</div>

                        </div>

                    </div>
                    <h2>Cols 2 boutons</h2>
                    <div class="parts">
                        <div class="part" data-category="collar" data-label="Boutonné 2 boutons" data-id="BOU">
                            <div class="img"><img src="img/pictos/col_BOU.svg" width="85"></div>
                            <div class="name">Boutonné 2 boutons</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Italien ouvert 2 boutons" data-id="ITO">
                            <div class="img"><img src="img/pictos/col_ITO.svg" width="85"></div>
                            <div class="name">Italien ouvert 2 boutons</div>

                        </div>
                        <div class="part" data-category="collar" data-label="Napolitain 2 boutons" data-id="ACIG2">
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
                        <div class="part active" data-category="epaulettes" data-label="Sans" data-id="sans">
                            <div class="img"><img src="img/pictos/epaulettes_sans.svg" width="85"></div>
                            <div class="name">Sans</div>

                        </div>
                        <div class="part" data-category="epaulettes" data-label="Avec (+ 6€)" data-id="avec">
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
                        <div class="part active" data-category="back" data-label="Sans plis" data-id="0">
                            <div class="img"><img src="img/pictos/dos_0.svg" width="85"></div>
                            <div class="name">Sans plis</div>

                        </div>
                        <div class="part" data-category="back" data-label="Pli central" data-id="1">
                            <div class="img"><img src="img/pictos/dos_1.svg" width="85"></div>
                            <div class="name">Pli central</div>

                        </div>
                        <div class="part" data-category="back" data-label="Chevrons" data-id="avec">
                            <div class="img"><img src="img/pictos/dos_avec.svg" width="85"></div>
                            <div class="name">Chevrons</div>

                        </div>

                    </div>
                    <h2>Pinces</h2>
                    <div class="parts">
                        <div class="part active" data-category="clamp" data-label="Avec" data-id="P">
                            <div class="img"><img src="img/pictos/dos_pinces_P.svg" width="85"></div>
                            <div class="name">Avec</div>

                        </div>
                        <div class="part" data-category="clamp" data-label="Sans" data-id="0">
                            <div class="img"><img src="img/pictos/dos_pinces_0.svg" width="85"></div>
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
                        <div class="part" data-category="buttons" data-id="blanc" data-label="Blanc">
                            <div class="img"><img src="img/pictos/boutons_blanc.png" width="85"></div>
                            <div class="name">Blanc</div>

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
                        <div class="part active" data-category="buttonholes" data-id="beige" data-label="Beige">
                            <div class="img"><img src="img/pictos/boutonnieres_beige.svg" width="30"></div>
                            <div class="name">Beige</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="blanc_mat" data-label="Blanc_mat">
                            <div class="img"><img src="img/pictos/boutonnieres_blanc_mat.svg" width="30"></div>
                            <div class="name">Blanc mat</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="bleu_clair" data-label="Bleu_clair">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_clair.svg" width="30"></div>
                            <div class="name">Bleu clair</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="bleu_marine" data-label="Bleu_marine">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_marine.svg" width="30"></div>
                            <div class="name">Bleu marine</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="bleu_roi" data-label="Bleu_roi">
                            <div class="img"><img src="img/pictos/boutonnieres_bleu_roi.svg" width="30"></div>
                            <div class="name">Bleu roi</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="bordeaux" data-label="Bordeaux">
                            <div class="img"><img src="img/pictos/boutonnieres_bordeaux.svg" width="30"></div>
                            <div class="name">Bordeaux</div>

                        </div>
                        <div class="part active" data-category="buttonholes" data-id="gris" data-label="Gris">
                            <div class="img"><img src="img/pictos/boutonnieres_gris.svg" width="30"></div>
                            <div class="name">Gris</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="jaune_pale" data-label="Jaune_pale">
                            <div class="img"><img src="img/pictos/boutonnieres_jaune_pale.svg" width="30"></div>
                            <div class="name">Jaune pale</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="jaune_vif" data-label="Jaune_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_jaune_vif.svg" width="30"></div>
                            <div class="name">Jaune vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="mauve" data-label="Mauve">
                            <div class="img"><img src="img/pictos/boutonnieres_mauve.svg" width="30"></div>
                            <div class="name">Mauve</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="noir" data-label="Noir">
                            <div class="img"><img src="img/pictos/boutonnieres_noir.svg" width="30"></div>
                            <div class="name">Noir</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="orange" data-label="Orange">
                            <div class="img"><img src="img/pictos/boutonnieres_orange.svg" width="30"></div>
                            <div class="name">Orange</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="rose_pale" data-label="Rose_pale">
                            <div class="img"><img src="img/pictos/boutonnieres_rose_pale.svg" width="30"></div>
                            <div class="name">Rose pale</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="rose_vif" data-label="Rose_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_rose_vif.svg" width="30"></div>
                            <div class="name">Rose vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="rouge" data-label="Rouge">
                            <div class="img"><img src="img/pictos/boutonnieres_rouge.svg" width="30"></div>
                            <div class="name">Rouge</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="ton_sur_ton" data-label="Ton_sur_ton">
                            <div class="img"><img src="img/pictos/boutonnieres_ton_sur_ton.svg" width="30"></div>
                            <div class="name">Ton sur ton</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="vert_fonce" data-label="Vert_fonce">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_fonce.svg" width="30"></div>
                            <div class="name">Vert fonce</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="vert_pomme" data-label="Vert_pomme">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_pomme.svg" width="30"></div>
                            <div class="name">Vert pomme</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="vert_vif" data-label="Vert_vif">
                            <div class="img"><img src="img/pictos/boutonnieres_vert_vif.svg" width="30"></div>
                            <div class="name">Vert vif</div>

                        </div>
                        <div class="part" data-category="buttonholes" data-id="violet" data-label="Violet">
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
                    <div class="parts">

                        <input type="text" data-category="embroidery" class="ajustement-input" name="inputEmb" id="inputEmb" style="margin-right: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 2px" placeholder="Ecrivez-ici...">
                        <button class="ok">OK</button>

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
                    <h2 class="first">Doublure col</h2>
                    <div class="parts">
                        <div class="part active" data-category="lining" data-id="01" data-label="Col classique">
                            <div class="img"><img src="img/pictos/Doublure_poignets_01.png" width="85"></div>
                            <div class="name">Col classique</div>

                        </div>
                        <div class="part" data-category="lining" data-id="02" data-label="Col blans">
                            <div class="img"><img src="img/pictos/Doublure_poignets_02.png" width="85"></div>
                            <div class="name">Col blanc</div>

                        </div>
                        <div class="part" data-category="lining" data-id="03" data-label="Ext. pied col">
                            <div class="img"><img src="img/pictos/Doublure_poignets_03.png" width="85"></div>
                            <div class="name">Ext. pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="04" data-label="Int. pied col">
                            <div class="img"><img src="img/pictos/Doublure_poignets_04.png" width="85"></div>
                            <div class="name">Int. pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="05" data-label="Full pied col">
                            <div class="img"><img src="img/pictos/Doublure_poignets_05.png" width="85"></div>
                            <div class="name">Full pied col</div>

                        </div>
                        <div class="part" data-category="lining" data-id="06" data-label="Full col">
                            <div class="img"><img src="img/pictos/Doublure_poignets_06.png" width="85"></div>
                            <div class="name">Full col</div>

                        </div>
                    </div>
                    <h2 class="first">Doublure poignets</h2>
                    <div class="parts">
                        <div class="part active" data-category="lining" data-id="07" data-label="Poignets classiques">
                            <div class="img"><img src="img/pictos/Doublure_poignets_07.png" width="85"></div>
                            <div class="name">Poignets classiques</div>

                        </div>
                        <div class="part" data-category="lining" data-id="08" data-label="Poignets blancs">
                            <div class="img"><img src="img/pictos/Doublure_poignets_08.png" width="85"></div>
                            <div class="name">Poignets blancs</div>

                        </div>
                        <div class="part" data-category="lining" data-id="09" data-label="Int. poignets">
                            <div class="img"><img src="img/pictos/Doublure_poignets_09.png" width="85"></div>
                            <div class="name">Int. poignets</div>

                        </div>
                        <div class="part" data-category="lining" data-id="10" data-label="Full poignets">
                            <div class="img"><img src="img/pictos/Doublure_poignets_10.png" width="85"></div>
                            <div class="name">Full poignets</div>

                        </div>
                    </div>
                </section>
                <!--                <form name="toPanier" action="../panier-step-1.php">
                                    <input type="hidden" id="shirtDetails" name="shirtDetails" value="">
                                </form>-->
            </div>
            <footer>
                <button>Ajouter au panier</button>
            </footer>
        </section>
        <script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>
        <script src="js/min/all.js"></script>

        <input type="hidden" name="api_url" id="api_url" value="" />
        <input type="hidden" name="api_titre" id="api_titre" value="" />
        <input type="hidden" name="api_prix" id="api_prix" value="" />
        <input type="hidden" name="api_description" id="api_description" value="" />
        <input type="hidden" name="api_h1" id="api_h1" value="" />
        <input type="hidden" name="api_couleur" id="api_couleur" value="" />
        <input type="hidden" name="api_tissage" id="api_tissage" value="" />
        <input type="hidden" name="api_dessin" id="api_dessin" value="" />
        <input type="hidden" name="tissu_select_referece" id="tissu_select_referece" value="" />

        <input type="hidden" name="reference" id="reference" value="T2870" />
        <input type="hidden" name="hp" id="hp" value="" />
        <input type="hidden" name="col" id="col" value="CLA" />
        <input type="hidden" name="baleine" id="baleine" value="A" />
        <input type="hidden" name="tenue_col" id="tenue_col" value="R" />
        <input type="hidden" name="poignets" id="poignets" value="A11" />
        <input type="hidden" name="poches" id="poches" value="1" />
        <input type="hidden" name="epaulettes" id="epaulettes" value="" />
        <input type="hidden" name="bas" id="bas" value="L" />
        <input type="hidden" name="gorge" id="gorge" value="S" />
        <input type="hidden" name="dos" id="dos" value="" />
        <input type="hidden" name="pinces" id="pinces" value="" />
        <input type="hidden" name="boutons" id="boutons" value="standard" />
        <input type="hidden" name="couture" id="couture" value="1801" />
        <input type="hidden" name="tissu_doublure_reference" id="tissu_doublure_reference" value="" />
        <input type="hidden" name="tissu_doublure_code" id="tissu_doublure_code" value="" />
        <input type="hidden" name="tissu_doublure_id" id="tissu_doublure_id" value="" />
        <input type="hidden" name="doublure_col" id="doublure_col" value="" />
        <input type="hidden" name="doublure_poignets" id="doublure_poignets" value="" />
           <!--<script src="js/Shirt.js"></script>
           <script src="js/ShirtImage.js"></script>
           <script src="js/tabs.js"></script>
           <script src="js/select.js"></script>
           <script src="js/main.js"></script>
           <script src="js/fabrics.js"></script>
           <script src="js/app.js"></script>-->

    </body>
</html>
