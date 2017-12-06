'use strict';

const shirtContainer = document.querySelector('#shirt-container');
const zoom = ['fabric', 'collar', 'wrists', 'pockets', 'bottom', 'back', 'buttons', 'embroidery', 'lining'];

let dataId = null;

function isMobile(e) {
    return !( e.offsetWidth || e.offsetHeight || e.getClientRects().length );
}

// PRELOADING
[
    'bas-hover.png',
    'boutons-hover.png',
    'broderies-hover.png',
    'cols-hover.png',
    'dos-hover.png',
    'doublures-hover.png',
    'poches-hover.png',
    'poignets-hover.png',
    'tissus-hover.png'
].forEach(v => new Image().src = `img/icons/${v}`);

document.querySelector('button.back').addEventListener('click', e => {
    document.querySelectorAll('.step').forEach(v => v.classList.add('hidden'));
    document.querySelector(`#step-0`).classList.remove('hidden');

    document.querySelector('nav').classList.add('hidden');
    document.querySelector('button.back').classList.add('hidden');
});

document.querySelectorAll('#configurator nav li, #step-0 .part').forEach(v => {

    v.addEventListener('click', _ => {

        dataId = parseInt(v.getAttribute('data-id'));
        console.log(dataId);

        document.querySelector('nav').classList.remove('hidden');
        document.querySelector('button.back').classList.remove('hidden');
        document.querySelector(`#step-0`).classList.add('hidden');
        document.querySelector(`#step-${dataId}`).classList.remove('hidden');


        document.querySelectorAll('#configurator nav li').forEach(v => v.classList.remove('active'));

        document.querySelector(`.item-${dataId}`).classList.add('active');
        document.querySelectorAll('.step').forEach(v => v.classList.add('hidden'));

        document.querySelector(`#step-${dataId}`).classList.remove('hidden');

        shirtContainer.className = '';
        shirtContainer.classList.add(`img-${zoom[dataId - 1]}`);


        /*if (isMobile(document.querySelector('#configurator footer'))) {
         document.querySelector('#configurator .step').style.display = "block";
         }*/
    });

});


document.querySelectorAll('#configurator .content .close').forEach(v => v.addEventListener('click', e => {
    document.querySelectorAll('#configurator .step').forEach(v => v.classList.add('hidden'));
    document.querySelector(`#step-0`).classList.remove('hidden');
}));


