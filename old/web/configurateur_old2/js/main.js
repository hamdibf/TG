/* global $ */

var info = document.getElementById("info"),
    filtres = document.getElementById("filtres-catalogue"),
    spanafficher = document.getElementById("span-afficher"),
    spanmasquer = document.getElementById("span-masquer"),
    liensguide = document.getElementById("liens-guide"),
    mlc = document.getElementById("menu-lateral-container"),
    ml = document.getElementById("menu-lateral");

function fermerInfo() {
    info.classList.toggle("fermer-info");
}

function openFiltres() {
    filtres.classList.toggle("open-filtres");
    spanafficher.classList.toggle("masquer-span");
    spanmasquer.classList.toggle("masquer-span");
}

function openLiensguide() {
    liensguide.classList.toggle("open-guide");
}

function openMenulateral() {
    mlc.classList.toggle("mlc-open");
    ml.classList.toggle("ml-open");
}

function activLabel(el) {
    el.previousElementSibling.classList.toggle("label-activ");
}


//$('#trigger_stripe_payment').on('click', function () {
  //  $('#stripe_payment button').click();
//});


var colorFilter,
    weavingFilter,
    patternFilter,
    filters = $('#filtres-catalogue .pattern-choice li,#filtres-catalogue .color-choice li,#filtres-catalogue .weaving-choice li');


filters.on('click', function () {

    var $this = $(this),
        parent = $this.parent().parent(),
        fabrics = $('.fabric-item'),
        number = 0;


    parent.find('li').each(function(){
       $(this).removeClass('selected');
    });

    $(this).addClass('selected');

    colorFilter = $('#filtres-catalogue .color-choice li.selected').attr('data-value');
    weavingFilter = $('#filtres-catalogue .weaving-choice li.selected').attr('data-value');
    patternFilter = $('#filtres-catalogue .pattern-choice li.selected').attr('data-value');

    parent.find('span').text($this.text());
    fabrics.hide();


    fabrics.each(function () {
        var color = true,
            weaving = true,
            pattern = true;

        if (colorFilter != 'all' && $(this).attr('data-color') != colorFilter) {
            color = false;
        }

        if (weavingFilter != 'all' && $(this).attr('data-weaving') != weavingFilter) {
            weaving = false;
        }

        if (patternFilter != 'all' && $(this).attr('data-pattern') != patternFilter) {
            pattern = false;
        }

        if (color && weaving && pattern) {
            $(this).show();
            number++;
        } else {
            $(this).hide();
        }
    });

    $('.modele-find span').text(number);
});