'use strict';

// CLICK OUTSIDE
document.addEventListener('click', function (e) {
    var target = e.target || e.srcElement;
    var parents = document.querySelectorAll('.selected-item');
    var list = document.querySelectorAll('.select-custom ul');

    for (var i = 0; i < parents.length; i++) {
        if (!parents[i].contains(target)) {
            list[i].className = "";
        }
    }
}, false);

var selectCustom = document.querySelectorAll('.select-custom');

for (var i = 0; i < selectCustom.length; i++) {
    (function (i) {
        var textZone = selectCustom[i].querySelector('.value');
        var selectOriginal = selectCustom[i].parentElement.querySelector('select');
        var selectList = selectCustom[i].querySelector('ul');

        // CUSTOM SELECT SEEDING
        var text = "";
        for (var j = 0; j < selectOriginal.options.length; j++) {
            text += `<li data-id="${j}">${selectOriginal.options[j].text}</li>`;
        }
        selectList.innerHTML = text;

        // CUSTOM SELECT LIST CLICK
        var selectListElement = selectCustom[i].querySelectorAll('li');

        for (var k = 0; k < selectListElement.length; k++) {
            selectListElement[k].addEventListener('click', function (e) {
                e.preventDefault();


                for (var j = 0; j < selectOriginal.options.length; j++) {
                    if (j == this.dataset.id) {
                        selectOriginal.options[j].selected = true;
                    } else {
                        selectOriginal.options[j].selected = false;
                    }
                }

                textZone.innerHTML = this.innerHTML;
                selectOriginal.dispatchEvent(new Event('change'));
            });
        }

        // SELECT OPENING
        selectCustom[i].addEventListener('click', function (e) {
            e.preventDefault();
            selectList.classList.toggle('active');
        });
    })(i);
}

