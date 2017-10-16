'use strict';

class Shirt {

    constructor(fabric = null, fabricID = null, collar = null, wrists = null, pockets = null, bottom = null,
                back = null, buttons = null, buttonholes = null, epaulettes = null, throat = null, embroidery = null, lining = null, clamp = null) {
        this._fabric = fabric;
        this._fabricID = fabricID;
        this._collar = collar;
        this._wrists = wrists;
        this._pockets = pockets;
        this._bottom = bottom;
        this._back = back;
        this._buttons = buttons;
        this._buttonholes= buttonholes;
        this._epaulettes = epaulettes;
        this._throat = throat;
        this._clamp = clamp;
        this._embroidery = embroidery;
        this._lining = lining;
        this._parts = null;
        this._base = null;
        this._labels = {}; // Save each label for elements
        this.buttonsAPI = null;
        this.buttonholesAPI = null;
    }

    initLabels(obj) {
        Object
            .entries(obj)
            .forEach(v => {
                if (sessionStorage.getItem(`${v[0]}_label`)) {
                    this.setLabel(v[0], sessionStorage.getItem(`${v[0]}_label`));
                } else {
                    this.setLabel(v[0], v[1])
                }
            });
    }

    initItems(obj) {
        Object
            .entries(obj)
            .forEach(v => {
                if (sessionStorage.getItem(v[0])) {
                    this[v[0]] = sessionStorage.getItem(v[0]);
                } else {
                    this[v[0]] = v[1]
                }
            });
    }

    getLabel(cat) {
        return this._labels[cat];
    }

    setLabel(cat, value) {
        this._labels[cat] = value;
        sessionStorage.setItem(`${cat}_label`, value);
    }


    get lapels() {
        return this._lapels;
    }

    set lapels(value) {
        this._lapels = value;
    }

    get labels() {
        return this._labels;
    }

    set labels(value) {
        this._labels = value;
    }

    get fabricID() {
        return this._fabricID;
    }

    set fabricID(value) {
        this._fabricID = value;
    }

    get fabric() {
        return this._fabric;
    }

    set fabric(value) {
        this._fabric = value;
        sessionStorage.setItem('fabric', value);

        this.parts = value;
    }

    get collar() {
        return this._collar;
    }

    set collar(value) {
        this._collar = value;
        sessionStorage.setItem('collar', value);
    }

    get wrists() {
        return this._wrists;
    }

    set wrists(value) {
        this._wrists = value;
        sessionStorage.setItem('wrists', value);
    }

    get pockets() {
        return this._pockets;
    }

    set pockets(value) {
        this._pockets = value;
        sessionStorage.setItem('pockets', value);
    }

    get bottom() {
        return this._bottom;
    }

    set bottom(value) {
        this._bottom = value;
        sessionStorage.setItem('bottom', value);
    }

    get back() {
        return this._back;
    }

    set back(value) {
        this._back = value;
        sessionStorage.setItem('back', value);
    }

    get buttons() {
        return this._buttons;
    }

    set buttons(value) {
        this._buttons = value;
        sessionStorage.setItem('buttons', value);
    }

    get epaulettes() {
        return this._epaulettes;
    }

    set epaulettes(value) {
        this._epaulettes = value;
        sessionStorage.setItem('epaulettes', value);
    }

    get throat() {
        return this._throat;
    }

    set throat(value) {
        this._throat = value;
        sessionStorage.setItem('throat', value);
    }

    get clamp() {
        return this._clamp;
    }

    set clamp(value) {
        this._clamp = value;
        sessionStorage.setItem('clamp', value);
    }

    get embroidery() {
        return this._embroidery;
    }

    set embroidery(value) {
        this._embroidery = value;
        sessionStorage.setItem('embroidery', value);
    }

    get lining() {
        return this._lining;
    }

    set lining(value) {
        this._lining = value;
        sessionStorage.setItem('lining', value);
    }

    get parts() {
        return this._parts;
    }

    set parts(value) {
        this._parts = new Promise((reso, reje) => {
            fetch(`/getTemplates/${this._fabric}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(res => reso(res[Object.keys(res)[0]]));
        });
    }


    get buttonsAPI() {
        return this._buttonsAPI;
    }

    set buttonsAPI(value) {
        this._buttonsAPI = new Promise((reso, reje) => {
            fetch('/getButtons', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(res => reso(res));
        });
    }

    get buttonholesAPI() {
        return this._buttonholesAPI;
    }

    set buttonholesAPI(value) {
        this._buttonholesAPI = new Promise((reso, reje) => {
            fetch('/getButtonholes', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(res => reso(res));
        });
    }


    get buttonholes() {
        return this._buttonholes;
    }

    set buttonholes(value) {
        this._buttonholes = value;
        sessionStorage.setItem('buttonholes', value);
    }

    get base() {

        let bottom = (this.bottom == 'F') ? 'D' : this.bottom;

        if (this.wrists === 'MC') {
            return [this.throat, bottom, this.wrists].join('_');
        } else {
            return [this.throat, bottom].join('_');
        }
    }

    set base(value) {
        this._base = value;
    }
}
