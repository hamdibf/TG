$( document ).ready(function() 
{
    $.ajax({url: "js/ajax/load_home_models.php?t="+t,success: function( result ) { $("#container_catalogue").html(result); }}); 
	
	$(".panier-btn" ).hover(
	  function() {
		$(".panier-content-hover").fadeIn(500);
	  }, function() {
		$(".panier-content-hover").fadeOut(100);
	  }
	);
	
	$("#email_nouveau_compte").focusout(function() 
	{
		console.log($("#email_nouveau_compte").val());
		var email = $("#email_nouveau_compte").val();
		
		$.ajax({
			url: "js/ajax/verifEmail.php",
			data: "t="+t+"&email="+email,
			success: function( result ) 
		{ 
			console.log(result);
			if(result==0)
			{
				$("#submit_area").show(); 
				$("#email_msg").html('');
			}
			else
			{
				$("#email_msg").html('Email incorrect ou existe d&eacute;j&agrave; !');
				$("#submit_area").hide(); 
			}		
		}}); 
		// id="submit_area"
		//<input class="btn-rose"  type="submit" value="Cr&eacute;er mon compte ...">
	});
	
	$(".ajustement-btn").click(function() 
	{
		var res = this.id.split("-");
		if(res[1]=="add")$("#"+res[0]).val(parseInt($("#"+res[0]).val())+1);
		if(res[1]=="sub")$("#"+res[0]).val(parseInt($("#"+res[0]).val())-1);
		update_mesures();
	});
	
	$(".ajustement-input").focusout(function() 
	{
		update_mesures();
	});
		
})

function update_mesures()
{
	cou_chem = $("#cou_chem").val();
		poitrine_chem =  $("#poitrine_chem").val();
		ceinture_chem =  $("#ceinture_chem").val();
		epaule_chem =  $("#epaule_chem").val();
		bras_chem =  $("#bras_chem").val();
		dos_chem =  $("#dos_chem").val();
		$.ajax({url: "js/ajax/update_mesures.php?cou_chem="+cou_chem+"&poitrine_chem="+poitrine_chem+"&ceinture_chem="+ceinture_chem+"&epaule_chem="+epaule_chem+"&bras_chem="+bras_chem+"&dos_chem="+dos_chem+"&t="+t,success: function( result ) {}});
}

function fermerInfoLivraison() { $.ajax({url: "js/ajax/cookie_livraison_info.php?t="+t,success: function( result ) {}}); $("#info").hide(); }

function openFiltres() { filtres.classList.toggle("open-filtres"); spanafficher.classList.toggle("masquer-span"); spanmasquer.classList.toggle("masquer-span"); }

$("#filtre_couleur_select").on("click",function(e){ $("#filtre_couleur_selected").html(e.target.textContent); load_home_models(); });
$("#filtre_cols_select").on("click",function(e){ $("#filtre_cols_selected").html(e.target.textContent); load_home_models(); });
$("#filtre_styles_select").on("click",function(e){ $("#filtre_styles_selected").html(e.target.textContent); load_home_models(); });
$("#filtre_tissages_select").on("click",function(e){ $("#filtre_tissages_selected").html(e.target.textContent); load_home_models(); });
$("#filtre_motifs_select").on("click",function(e){ $("#filtre_motifs_selected").html(e.target.textContent); load_home_models(); });
$("#filtre_prix_select").on("click",function(e){ $("#filtre_prix_selected").html(e.target.textContent); load_home_models(); });

//TODO ...
function load_home_models() 
{
	$("#container_catalogue").html('<div style="width:100%;text-align:center;"><img src="img/bars.svg" width="50%" /></div>');
	$.ajax({url: "js/ajax/load_home_models.php?t="+t,success: function( result ) { $("#container_catalogue").html(result); }}); 
}

