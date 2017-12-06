'use strict';

// ACTIVE ELEMENTS

['collar', 'wrists', 'pockets', 'bottom', 'back', 'buttons', 'embroidery', 'lining', 'epaulettes', 'throat', 'clamp', 'fabric'].forEach(v => {
    if (sessionStorage.getItem(v)) {
        document
            .querySelectorAll(`.part[data-category="${v}"]`)
            .forEach(v => v.classList.remove('active'));

        const el = document.querySelector(`.part[data-category="${v}"][data-id="${sessionStorage.getItem(v)}"]`);

        if (el) {
            el.classList.add('active');
        }
    }
});

// INIT

const shirt = new ShirtImage();


// ONCHANGE

document.querySelectorAll('.part').forEach(v => v.addEventListener('click', _ => {
    const cat = v.getAttribute('data-category');
    const id = v.getAttribute('data-id');
    const label = v.getAttribute('data-label');

    document
        .querySelectorAll(`.part[data-category="${cat}"]`)
        .forEach(v => v.classList.remove('active'));

    if (cat != 'summary') {
        v.classList.toggle('active');
        shirt[cat] = id;
        shirt.setLabel(cat, label);
        shirt.setElement(cat);

        if(cat != 'buttonholes'){
            if (cat == 'buttons') {
                shirt.setPartSummary(cat, 'png');
            } else {
                shirt.setPartSummary(cat);
            }
        }

    }
}));


