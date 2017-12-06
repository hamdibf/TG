'use strict';


function changeFabric(body){

    fetch('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus', {
        method: 'POST',
        body: body
    })
        .then(response => response.json())
        .then(data => {
            let inject = '';
            if (data.value) {
                data.value.forEach(v => {
                    inject += `<div class="fabric" data-category="fabric" data-id="${v.code}" data-ref="${v.reference}">
                            <img src="http://www.ls-chemise.com/tissu/150/${v.code}.jpg"/>
                            <div class="text">
                                <span class="name">${v.reference}</span>
                                <span class="price">${v.prix}€</span>
                                <span class="desc">${v.construction}</span></div>
                        </div>`;
                });
            }

            document.querySelector('#fabric-number span').innerHTML = (data.value) ? data.value.length : 0;
            document.querySelector('#fabrics-container').innerHTML = inject;


            document.querySelectorAll('.fabric').forEach(v => v.addEventListener('click', _ => {
                shirt.fabricID = v.getAttribute('data-id');
                shirt.fabric = v.getAttribute('data-ref');
                shirt.setElement('fabric');

                document.querySelectorAll('.fabric').forEach(v => v.classList.remove('active'));
                v.classList.add('active');
            }));



        })
}

document
    .querySelectorAll('select')
    .forEach(v => v.addEventListener('change', _ => changeFabric(new FormData(document.querySelector('form')))));

// INIT
var f = new FormData();
f.append('couleur','all');
f.append('motif','all');
f.append('tissage','all');

changeFabric(f);