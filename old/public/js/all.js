"use strict";

function _classCallCheck(t, e) {
    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(t, e) {
    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
}

function _possibleConstructorReturn(t, e) {
    if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    return !e || "object" != typeof e && "function" != typeof e ? t : e
}

function _inherits(t, e) {
    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
    t.prototype = Object.create(e && e.prototype, {
        constructor: {
            value: t,
            enumerable: !1,
            writable: !0,
            configurable: !0
        }
    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
}

function isMobile(t) {
    return !(t.offsetWidth || t.offsetHeight || t.getClientRects().length)
}

function changeFabric(t) 
{
    fetch("/findAll", {
        method: "POST",
        body: t
    }).then(function(t) {
        return t.json()
    }).then(function(t) {
        var e = "";
        t.value && t.value.forEach(function(t) {
            e += '<div class="fabric" data-category="fabric" data-id="' + t.code + '" data-ref="' + t.reference + '">\n                            <img src="http://www.ls-chemise.com/tissu/150/' + t.code + '.jpg"/>\n                            <div class="text">\n                                <span class="name">' + t.reference + '</span>\n                                <span class="price">' + t.prix + '€</span>\n                                <span class="desc">' + t.construction + "</span></div>\n                        </div>"
        }), document.querySelector("#fabric-number span").innerHTML = t.value ? t.value.length : 0, document.querySelector("#fabrics-container").innerHTML = e, document.querySelectorAll(".fabric").forEach(function(t) {
            return t.addEventListener("click", function(e) {
                shirt.fabricID = t.getAttribute("data-id"), shirt.fabric = t.getAttribute("data-ref"), shirt.setElement("fabric"), document.querySelectorAll(".fabric").forEach(function(t) {
                    return t.classList.remove("active")
                }), t.classList.add("active")
            })
        })
    })
}

var _createClass = function() {
        function t(t, e) {
            for (var n = 0; n < e.length; n++) {
                var s = e[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(t, s.key, s)
            }
        }
        return function(e, n, s) {
            return n && t(e.prototype, n), s && t(e, s), e
        }
    }(),
    Shirt = function() {
        function t() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                s = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null,
                r = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : null,
                i = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : null,
                a = arguments.length > 6 && void 0 !== arguments[6] ? arguments[6] : null,
                c = arguments.length > 7 && void 0 !== arguments[7] ? arguments[7] : null,
                u = arguments.length > 8 && void 0 !== arguments[8] ? arguments[8] : null,
                l = arguments.length > 9 && void 0 !== arguments[9] ? arguments[9] : null,
                h = arguments.length > 10 && void 0 !== arguments[10] ? arguments[10] : null,
                f = arguments.length > 11 && void 0 !== arguments[11] ? arguments[11] : null,
                d = arguments.length > 12 && void 0 !== arguments[12] ? arguments[12] : null,
                m = arguments.length > 13 && void 0 !== arguments[13] ? arguments[13] : null;
            _classCallCheck(this, t), this._fabric = e, this._fabricID = n, this._collar = s, this._wrists = o, this._pockets = r, this._bottom = i, this._back = a, this._buttons = c, this._buttonholes = u, this._epaulettes = l, this._throat = h, this._clamp = m, this._embroidery = f, this._lining = d, this._parts = null, this._base = null, this._labels = {}, this.buttonsAPI = null, this.buttonholesAPI = null
        }
        return _createClass(t, [{
            key: "initLabels",
            value: function(t) {
                var e = this;
                Object.entries(t).forEach(function(t) {
                    sessionStorage.getItem(t[0] + "_label") ? e.setLabel(t[0], sessionStorage.getItem(t[0] + "_label")) : e.setLabel(t[0], t[1])
                })
            }
        }, {
            key: "initItems",
            value: function(t) {
                var e = this;
                Object.entries(t).forEach(function(t) {
                    sessionStorage.getItem(t[0]) ? e[t[0]] = sessionStorage.getItem(t[0]) : e[t[0]] = t[1]
                })
            }
        }, {
            key: "getLabel",
            value: function(t) {
                return this._labels[t]
            }
        }, {
            key: "setLabel",
            value: function(t, e) {
                this._labels[t] = e, sessionStorage.setItem(t + "_label", e)
            }
        }, {
            key: "lapels",
            get: function() {
                return this._lapels
            },
            set: function(t) {
                this._lapels = t
            }
        }, {
            key: "labels",
            get: function() {
                return this._labels
            },
            set: function(t) {
                this._labels = t
            }
        }, {
            key: "fabricID",
            get: function() {
                return this._fabricID
            },
            set: function(t) {
                this._fabricID = t
            }
        }, {
            key: "fabric",
            get: function() {
                return this._fabric
            },
            set: function(t) {
                this._fabric = t, sessionStorage.setItem("fabric", t), this.parts = t
            }
        }, {
            key: "collar",
            get: function() {
                return this._collar
            },
            set: function(t) {
                this._collar = t, sessionStorage.setItem("collar", t)
            }
        }, {
            key: "wrists",
            get: function() {
                return this._wrists
            },
            set: function(t) {
                this._wrists = t, sessionStorage.setItem("wrists", t)
            }
        }, {
            key: "pockets",
            get: function() {
                return this._pockets
            },
            set: function(t) {
                this._pockets = t, sessionStorage.setItem("pockets", t)
            }
        }, {
            key: "bottom",
            get: function() {
                return this._bottom
            },
            set: function(t) {
                this._bottom = t, sessionStorage.setItem("bottom", t)
            }
        }, {
            key: "back",
            get: function() {
                return this._back
            },
            set: function(t) {
                this._back = t, sessionStorage.setItem("back", t)
            }
        }, {
            key: "buttons",
            get: function() {
                return this._buttons
            },
            set: function(t) {
                this._buttons = t, sessionStorage.setItem("buttons", t)
            }
        }, {
            key: "epaulettes",
            get: function() {
                return this._epaulettes
            },
            set: function(t) {
                this._epaulettes = t, sessionStorage.setItem("epaulettes", t)
            }
        }, {
            key: "throat",
            get: function() {
                return this._throat
            },
            set: function(t) {
                this._throat = t, sessionStorage.setItem("throat", t)
            }
        }, {
            key: "clamp",
            get: function() {
                return this._clamp
            },
            set: function(t) {
                this._clamp = t, sessionStorage.setItem("clamp", t)
            }
        }, {
            key: "embroidery",
            get: function() {
                return this._embroidery
            },
            set: function(t) {
                this._embroidery = t, sessionStorage.setItem("embroidery", t)
            }
        }, {
            key: "lining",
            get: function() {
                return this._lining
            },
            set: function(t) {
                this._lining = t, sessionStorage.setItem("lining", t)
            }
        }, {
            key: "parts",
            get: function() {
                return this._parts
            },
            set: function(t) {
                var e = this;
                this._parts = new Promise(function(t, n) {
                    fetch("/getTemplates/" + e._fabric, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    }).then(function(t) {
                        return t.json()
                    }).then(function(e) {
                        return t(e[Object.keys(e)[0]])
                    })
                })
            }
        }, {
            key: "buttonsAPI",
            get: function() {
                return this._buttonsAPI
            },
            set: function(t) {
                this._buttonsAPI = new Promise(function(t, e) {
                    fetch("/getButtons", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    }).then(function(t) {
                        return t.json()
                    }).then(function(e) {
                        return t(e)
                    })
                })
            }
        }, {
            key: "buttonholesAPI",
            get: function() {
                return this._buttonholesAPI
            },
            set: function(t) {
                this._buttonholesAPI = new Promise(function(t, e) {
                    fetch("/getButtonholes", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    }).then(function(t) {
                        return t.json()
                    }).then(function(e) {
                        return t(e)
                    })
                })
            }
        }, {
            key: "buttonholes",
            get: function() {
                return this._buttonholes
            },
            set: function(t) {
                this._buttonholes = t, sessionStorage.setItem("buttonholes", t)
            }
        }, {
            key: "base",
            get: function() {
                var t = "F" == this.bottom ? "D" : this.bottom;
                return "MC" === this.wrists ? [this.throat, t, this.wrists].join("_") : [this.throat, t].join("_")
            },
            set: function(t) {
                this._base = t
            }
        }]), t
    }(),
    _createClass = function() {
        function t(t, e) {
            for (var n = 0; n < e.length; n++) {
                var s = e[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(t, s.key, s)
            }
        }
        return function(e, n, s) {
            return n && t(e.prototype, n), s && t(e, s), e
        }
    }(),
    ShirtImage = function(t) {
        function e() {
            _classCallCheck(this, e);
            var t = _possibleConstructorReturn(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this));
            return t._translate = {
                collar: "col",
                back: "dos",
                throat: "gorge",
                pockets: "poche",
                wrists: "poignet",
                bottom: "bas",
                buttons: "boutons",
                embroidery: "couleur"
            }, t._translateButtonholes = {
                ton_sur_ton: 1801,
                beige: 1938,
                blanc_mat: 1801,
                bleu_clair: 1830,
                bleu_marine: 1966,
                bleu_roi: 1676,
                bordeaux: 1835,
                gris: 1874,
                jaune_pale: 1666,
                jaune_vif: 1455,
                mauve: 1911,
                noir: 1800,
                orange: 1965,
                rose_pale: 1818,
                rose_vif: 1113,
                rouge: 1747,
                vert_fonce: 1832,
                vert_pomme: 1647,
                vert_vif: 1751,
                violet: 1833
            }, t.initLabels({
                collar: "Classique",
                wrists: "1 bouton",
                pockets: "Aucune poche",
                bottom: "Arrondi",
                back: "Sans plis",
                buttons: "Ton sur ton",
                epaulettes: "Sans",
                fabric: "T2870"
            }), t.initItems({
                collar: "CLA",
                wrists: "A11",
                pockets: "0",
                bottom: "L",
                back: "0",
                buttons: "ton_sur_ton",
                embroidery: "",
                lining: "",
                epaulettes: "sans",
                throat: "S",
                clamp: "P",
                fabric: "T2870",
                fabricID: "T2870",
                buttonholes: "ton_sur_ton"
            }), t.setBase(), t.setPockets(), t.setCollar(), t.setWrists(), t.setButtons(), t.setButtonholes(), t.setEpaulettes(), t.initSummary(), t
        }
        return _inherits(e, t), _createClass(e, [{
            key: "regenerate",
            value: function() {
                this.setBase(), this.setPockets(), this.setCollar(), this.setWrists(), this.setButtons(), this.setEpaulettes()
            }
        }, {
            key: "setBase",
            value: function() {
                var t = this;
                this.parts.then(function(e) {
                    document.querySelector("#shirt-container .base img").src = e[t.base].png
                })
            }
        }, {
            key: "initSummary",
            value: function() {
                var t = this;
                this.setPartSummary("fabric", null, "http://www.ls-chemise.com/tissu/150/" + this.fabricID + ".jpg"), ["collar", "wrists", "pockets", "bottom", "back"].forEach(function(e) {
                    return t.setPartSummary(e)
                }), this.setPartSummary("buttons", "png")
            }
        }, {
            key: "setPartSummary",
            value: function(t) {
                var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "svg",
                    n = arguments[2];
                console.log(t), document.querySelector(".summary-" + t + " img").src = n ? n : "/img/pictos/" + this._translate[t] + "_" + this[t] + "." + e, document.querySelector(".summary-" + t + " .name").innerHTML = this.getLabel(t)
            }
        }, {
            key: "setEpaulettes",
            value: function() {
                var t = this;
                this.parts.then(function(e) {
                    document.querySelector("#shirt-container .epaulettes img").src = "avec" == t.epaulettes ? e.EPO.png : ""
                })
            }
        }, {
            key: "setPockets",
            value: function() {
                var t = this;
                this.parts.then(function(e) {
                    document.querySelector("#shirt-container .pockets img").src = 0 != t.pockets ? e[t.pockets].png : ""
                })
            }
        }, {
            key: "setWrists",
            value: function() {
                var t = this;
                this.parts.then(function(e) {
                    document.querySelector("#shirt-container .wrists img").src = e[t.wrists].png
                })
            }
        }, {
            key: "setCollar",
            value: function() {
                var t = this;
                this.parts.then(function(e) {
                    document.querySelector("#shirt-container .collar img").src = e[t.collar].png
                })
            }
        }, {
            key: "setButtonholes",
            value: function() {
                var t = this;
                this.buttonholesAPI.then(function(e) {
                    document.querySelector("#shirt-container .buttonholes_bases img").src = e.bases[t._translateButtonholes[t.buttonholes]].png, document.querySelector("#shirt-container .buttonholes_wrists img").src = e.manche[t._translateButtonholes[t.buttonholes]].png, document.querySelector("#shirt-container .buttonholes_epaulettes img").src = "avec" == t.epaulettes ? e.epaulettes[t._translateButtonholes[t.buttonholes]].png : ""
                })
            }
        }, {
            key: "setButtons",
            value: function() {
                var t = this,
                    e = "ton_sur_ton" == this.buttons ? "standard" : this.buttons,
                    n = "ton_sur_ton" == this.buttons ? "manche_standard" : "manche_" + this.buttons;
                this.buttonsAPI.then(function(s) {
                    console.log(s, e), document.querySelector("#shirt-container .buttons_throat img").src = s.gorge[e].png, document.querySelector("#shirt-container .buttons_wrists img").src = s.manche[n].png, document.querySelector("#shirt-container .buttons_epaulettes img").src = "avec" == t.epaulettes ? s.epaulettes[e].png : ""
                })
            }
        }, {
            key: "setElement",
            value: function(t) {
                switch (t) {
                    case "pockets":
                        this.setPockets();
                        break;
                    case "collar":
                        this.setCollar();
                        break;
                    case "wrists":
                        this.setWrists(), this.setBase();
                        break;
                    case "epaulettes":
                        this.setEpaulettes(), this.setButtonholes(), this.setButtons();
                        break;
                    case "bottom":
                        this.setBase();
                        break;
                    case "throat":
                        this.setBase();
                        break;
                    case "fabric":
                        this.regenerate();
                        break;
                    case "buttons":
                        this.setBase(), this.setButtons();
                    case "buttonholes":
                        this.setBase(), this.setButtonholes()
                }
            }
        }]), e
    }(Shirt);
document.addEventListener("click", function(t) {
    for (var e = t.target || t.srcElement, n = document.querySelectorAll(".selected-item"), s = document.querySelectorAll(".select-custom ul"), o = 0; o < n.length; o++) n[o].contains(e) || (s[o].className = "")
}, !1);
for (var selectCustom = document.querySelectorAll(".select-custom"), i = 0; i < selectCustom.length; i++) ! function(t) {
    for (var e = selectCustom[t].querySelector(".value"), n = selectCustom[t].parentElement.querySelector("select"), s = selectCustom[t].querySelector("ul"), o = "", r = 0; r < n.options.length; r++) o += '<li data-id="' + r + '">' + n.options[r].text + "</li>";
    s.innerHTML = o;
    for (var i = selectCustom[t].querySelectorAll("li"), a = 0; a < i.length; a++) i[a].addEventListener("click", function(t) {
        t.preventDefault();
        for (var s = 0; s < n.options.length; s++) s == this.dataset.id ? n.options[s].selected = !0 : n.options[s].selected = !1;
        e.innerHTML = this.innerHTML, n.dispatchEvent(new Event("change"))
    });
    selectCustom[t].addEventListener("click", function(t) {
        t.preventDefault(), s.classList.toggle("active")
    })
}(i);
var shirtContainer = document.querySelector("#shirt-container"),
    zoom = ["fabric", "collar", "wrists", "pockets", "bottom", "back", "buttons", "embroidery", "lining"],
    dataId = null;
["bas-hover.png", "boutons-hover.png", "broderies-hover.png", "cols-hover.png", "dos-hover.png", "doublures-hover.png", "poches-hover.png", "poignets-hover.png", "tissus-hover.png"].forEach(function(t) {
    return (new Image).src = "/img/icons/" + t
}), document.querySelector("button.back").addEventListener("click", function(t) {
    document.querySelectorAll(".step").forEach(function(t) {
        return t.classList.add("hidden")
    }), document.querySelector("#step-0").classList.remove("hidden"), document.querySelector("nav").classList.add("hidden"), document.querySelector("button.back").classList.add("hidden")
}), document.querySelectorAll("#configurator nav li, #step-0 .part").forEach(function(t) {
    t.addEventListener("click", function(e) {
        dataId = parseInt(t.getAttribute("data-id")), document.querySelector("nav").classList.remove("hidden"), document.querySelector("button.back").classList.remove("hidden"), document.querySelector("#step-0").classList.add("hidden"), document.querySelector("#step-" + dataId).classList.remove("hidden"), document.querySelectorAll("#configurator nav li").forEach(function(t) {
            return t.classList.remove("active")
        }), document.querySelector(".item-" + dataId).classList.add("active"), document.querySelectorAll(".step").forEach(function(t) {
            return t.classList.add("hidden")
        }), document.querySelector("#step-" + dataId).classList.remove("hidden"), shirtContainer.className = "", shirtContainer.classList.add("img-" + zoom[dataId - 1])
    })
}), document.querySelectorAll("#configurator .content .close").forEach(function(t) {
    return t.addEventListener("click", function(t) {
        document.querySelectorAll("#configurator .step").forEach(function(t) {
            return t.classList.add("hidden")
        }), document.querySelector("#step-0").classList.remove("hidden")
    })
}), document.querySelectorAll("select").forEach(function(t) {
    return t.addEventListener("change", function(t) {
        return changeFabric(new FormData(document.querySelector("form")))
    })
});
var f = new FormData;
f.append("couleur", "tous"), f.append("motif", "tous"), f.append("tissage", "tous"), changeFabric(f), ["collar", "wrists", "pockets", "bottom", "back", "buttons", "embroidery", "lining", "epaulettes", "throat", "clamp", "fabric"].forEach(function(t) {
    if (sessionStorage.getItem(t)) {
        document.querySelectorAll('.part[data-category="' + t + '"]').forEach(function(t) {
            return t.classList.remove("active")
        });
        var e = document.querySelector('.part[data-category="' + t + '"][data-id="' + sessionStorage.getItem(t) + '"]');
        e && e.classList.add("active")
    }
});
var shirt = new ShirtImage;
document.querySelectorAll(".part").forEach(function(t) {
    return t.addEventListener("click", function(e) {
        var n = t.getAttribute("data-category"),
            s = t.getAttribute("data-id"),
            o = t.getAttribute("data-label");
        document.querySelectorAll('.part[data-category="' + n + '"]').forEach(function(t) {
            return t.classList.remove("active")
        }), "summary" != n && (t.classList.toggle("active"), shirt[n] = s, shirt.setLabel(n, o), shirt.setElement(n), "buttonholes" != n && ("buttons" == n ? shirt.setPartSummary(n, "png") : shirt.setPartSummary(n)))
    })
});
//# sourceMappingURL=all.js.map