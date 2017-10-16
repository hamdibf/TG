'use strict';


function changeFabric(body){
    fetch('/findAll', {
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
f.append('couleur','tous');
f.append('motif','tous');
f.append('tissage','tous');

changeFabric(f);