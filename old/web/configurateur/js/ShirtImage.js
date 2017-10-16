'use strict';

class ShirtImage extends Shirt {
    constructor() {
        super();
        this._translate = {
            'collar': 'col',
            'back': 'dos',
            'throat': 'gorge',
            'pockets': 'poche',
            'wrists': 'poignet',
            'bottom': 'bas',
            'buttons': 'boutons',
            'embroidery': 'couleur'
        };

        this._translateButtonholes = {
            'ton_sur_ton': 1801,
            'beige': 1938,
            'blanc_mat': 1801,
            'bleu_clair': 1830,
            'bleu_marine': 1966,
            'bleu_roi': 1676,
            'bordeaux': 1835,
            'gris': 1874,
            'jaune_pale': 1666,
            'jaune_vif': 1455,
            'mauve': 1911,
            'noir': 1800,
            'orange': 1965,
            'rose_pale': 1818,
            'rose_vif': 1113,
            'rouge': 1747,
            'vert_fonce': 1832,
            'vert_pomme': 1647,
            'vert_vif': 1751,
            'violet': 1833
        };

        this.initLabels({
            'collar': 'Classique',
            'wrists': '1 bouton',
            'pockets': 'Aucune poche',
            'bottom': 'Arrondi',
            'back': 'Sans plis',
            'buttons': 'Ton sur ton',
            'epaulettes': 'Sans',
            'fabric': 'T2870'
        });

        this.initItems({
            'collar': 'CLA',
            'wrists': 'A11',
            'pockets': '0',
            'bottom': 'L',
            'back': '0',
            'buttons': 'ton_sur_ton',
            'embroidery': '',
            'lining': '',
            'epaulettes': 'sans',
            'throat': 'S',
            'clamp': 'P',
            'fabric': 'T2870',
            'fabricID': 'T2870',
            'buttonholes': 'ton_sur_ton'
        });

        // Display elements
        this.setBase();
        this.setPockets();
        this.setCollar();
        this.setWrists();
        this.setButtons();
        this.setButtonholes();
        this.setEpaulettes();

        this.initSummary();
    }

    regenerate() {
        this.setBase();
        this.setPockets();
        this.setCollar();
        this.setWrists();
        this.setButtons();
        this.setEpaulettes()
    }

    setBase() {
        this.parts.then(data => {
            document
                .querySelector(`#shirt-container .base img`)
                .src = data[this.base]['png'];
        });
    }

    initSummary() {
        this.setPartSummary('fabric', null, `http://www.ls-chemise.com/tissu/150/${this.fabricID}.jpg`);
        ['collar', 'wrists', 'pockets', 'bottom', 'back'].forEach(v => this.setPartSummary(v));
        this.setPartSummary('buttons', 'png');
    }

    setPartSummary(category, extension = 'svg', image) {
        console.log(category);
        document
            .querySelector(`.summary-${category} img`)
            .src = (!image) ? `/img/pictos/${this._translate[category]}_${this[category]}.${extension}` : image;

        document
            .querySelector(`.summary-${category} .name`)
            .innerHTML = this.getLabel(category);
    }

    setEpaulettes() {
        this.parts.then(data => {
            document
                .querySelector(`#shirt-container .epaulettes img`)
                .src = (this.epaulettes == 'avec') ? data['EPO']['png'] : '';

        });
    }

    setPockets() {
        this.parts.then(data => {
            document
                .querySelector(`#shirt-container .pockets img`)
                .src = (this.pockets != 0) ? data[this.pockets]['png'] : '';
        });
    }

    setWrists() {
        this.parts.then(data => {
            document
                .querySelector(`#shirt-container .wrists img`)
                .src = data[this.wrists]['png'];
        });
    }

    setCollar() {
        this.parts.then(data => {
            document
                .querySelector(`#shirt-container .collar img`)
                .src = data[this.collar]['png'];
        });
    }

    setButtonholes() {
        this.buttonholesAPI.then(data => {
            document
                .querySelector(`#shirt-container .buttonholes_bases img`)
                .src = data['bases'][this._translateButtonholes[this.buttonholes]]['png'];

            document
                .querySelector(`#shirt-container .buttonholes_wrists img`)
                .src = data['manche'][this._translateButtonholes[this.buttonholes]]['png'];

            document
                .querySelector(`#shirt-container .buttonholes_epaulettes img`)
                .src = (this.epaulettes == "avec") ? data['epaulettes'][this._translateButtonholes[this.buttonholes]]['png'] : '';
        });
    }

    setButtons() {
        const color = (this.buttons == 'ton_sur_ton') ? 'standard' : this.buttons;
        const whyTheFuckTheNameIsDifferentShittyCTO = (this.buttons == 'ton_sur_ton') ? 'manche_standard' : `manche_${this.buttons}`;

        this.buttonsAPI.then(data => {

            console.log(data, color);
            document
                .querySelector(`#shirt-container .buttons_throat img`)
                .src = data['gorge'][color]['png'];

            document
                .querySelector(`#shirt-container .buttons_wrists img`)
                .src = data['manche'][whyTheFuckTheNameIsDifferentShittyCTO]['png'];

            document
                .querySelector(`#shirt-container .buttons_epaulettes img`)
                .src = (this.epaulettes == 'avec') ? data['epaulettes'][color]['png'] : '';
        });
    }

    setElement(cat) {
        switch (cat) {
            case 'pockets':
                this.setPockets();
                break;
            case 'collar':
                this.setCollar();
                break;
            case 'wrists':
                this.setWrists();
                this.setBase();
                break;
            case 'epaulettes':
                this.setEpaulettes();
                this.setButtonholes();
                this.setButtons();
                break;
            case 'bottom':
                this.setBase();
                break;
            case 'throat':
                this.setBase();
                break;
            case 'fabric':
                this.regenerate();
                break;
            case 'buttons':
                this.setBase();
                this.setButtons();
            case 'buttonholes':
                this.setBase();
                this.setButtonholes();
                break;
        }
    }
}
