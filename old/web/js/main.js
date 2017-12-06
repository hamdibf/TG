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

function openLiensguide() {
    liensguide.classList.toggle("open-guide");
}

function openMenulateral() 
{
	//$(".menu-lateral-container").show( "slow", function() {});
    mlc.classList.add("mlc-open");
    ml.classList.add("ml-open");
}

function activLabel(el) {
    el.previousElementSibling.classList.toggle("label-activ");
}
