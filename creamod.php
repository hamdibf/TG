<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MODULE | Tailor Gorge</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container-fluid">
		<h1>Création du modèle</h1>
		<div class="row">
			<div class="col-md-8" style="background-color:#ffffff;height:85vh;">
				<h4>APERÇU DU MODELE</h4>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-2" onclick="view_chemise('face');" style="cursor:pointer;"><u>Vue Face</u></div>
					<div class="col-md-2" onclick="view_chemise('dos');" style="cursor:pointer;"><u>Vue Dos</u></div>
					<div class="col-md-2" onclick="view_chemise('zoom');" style="cursor:pointer;"><u>Vue Zoom</u></div>
					<div class="col-md-3"></div>
					<div class="col-md-12"  id="view_area"></div>
					<input type="hidden" name="api_url" id="api_url" value="" />
					<input type="hidden" name="api_titre" id="api_titre" value="" />
					<input type="hidden" name="api_prix" id="api_prix" value="" />
					<input type="hidden" name="api_description" id="api_description" value="" />
					<input type="hidden" name="api_h1" id="api_h1" value="" />
					<input type="hidden" name="api_couleur" id="api_couleur" value="" />
					<input type="hidden" name="api_tissage" id="api_tissage" value="" />
					<input type="hidden" name="api_dessin" id="api_dessin" value="" />
				</div>
			</div>
			<div class="col-md-4" style="background-color:#f5f0f0;height:85vh;overflow-y: auto;overflow-x: hidden;">				
				<h4 id="titre_etape">ETAPE 1: CHOIX TISSU</h4>
				<div class="row">
					<div class="col-md-3">Tissu choisi:</div>
					<div class="col-md-2" id="tissu_select_img"><img src="http://www.ls-chemise.com/tissu/150/3091.W032.2021.jpg" style="width:100%;"></div>
					<div class="col-md-1" id="tissu_select_referece">T1512</div>					
					<div class="col-md-6" style="text-align:right;" id="boutton_etape"><button class="btn" onclick="etape2();">valider le tissu</button></div>
				</div>
				<div class="row" id="etape_content">
					<div id="tissus_liste"></div>
				</div>
			</div>
			
		</div>
	</div>

	
	<!-- scripts area -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	

	<script>
	$(document).ready(function() {charger_tissu();reload_chemise_png('face');});
	
	function charger_tissu()
	{
		couleur = 'all';
		tissage = 'all';
		motif = 'all';
		$.ajax({
			url: "http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus",
			type : 'POST',
			data: 'couleur=' + couleur + '&tissage=' + tissage + '&motif=' + motif,			
			success: function(result)
			{
				$.each(result.value, function(i, item) {					
					if(item.reference!='')
					{
						//console.log(item);
						$('#tissus_liste').append('<div class="col-md-3 tissu" id="tissu_code_'+item.reference+'" data-toggle="tooltip" data-placement="bottom" title="'+item.titre+'" onclick="tissu_select(\'tissu_code_'+item.reference+'\',\''+item.reference+'\',\''+item.code+'\',\''+item.url+'\',\''+item.titre+'\',\''+item.prix+'\',\''+item.description+'\',\''+item.H1+'\',\''+item.couleur+'\',\''+item.tissage+'\',\''+item.dessin+'\')"><div>'+item.reference+'</div><div><img src="http://www.ls-chemise.com/tissu/150/'+item.code+'.jpg" style="width:100%;" /></div></div>');
					}
				});	
			}
		});
	}
	
	function tissu_select(id,reference,code,url,titre,prix,description,h1,couleur,tissage,dessin)
	{
		$("[id*='tissu_code_']").css('border','0px solid #fff');
		$('#'+id).css('border','1px solid #c4c4c4');
		$('#tissu_select_img').html('<img src="http://www.ls-chemise.com/tissu/150/'+code+'.jpg" style="width:100%;" />');
		$('#tissu_select_referece').html(reference);
		$('#api_url').val(url);
		$('#api_titre').val(titre);
		$('#api_prix').val(prix);
		$('#api_description').val(description);
		$('#api_h1').val(h1);
		$('#api_couleur').val(couleur);
		$('#api_tissage').val(tissage);
		$('#api_dessin').val(dessin);		
		reload_chemise_png('face');
	}
	
	
	function reload_chemise_png(view)
	{
		
		
		$('#view_area').html('<div id="shirt-container" style="position: relative;width: 100%;height: 85vh;overflow: hidden;text-align:center;margin-top:80px;"><img src="curved-bars.svg" /></div>');
		//collecte des valeurs
		reference = $("#tissu_select_referece").html();
		col = $("#col").val();
		hp = $("#col").find(':selected').data("hp");
		baleine = $("#baleine").val();
		tenue_col = $("#tenue_col").val();
		poignets = $("#poignets").val();
		poches = $("#poches").val();
		epaulettes = $("#epaulettes").val();
		bas = $("#bas_chemise").val();
		gorge = $("#gorge").val();		
		dos = $("#dos").val();
		pinces = $("#pinces").val();
		boutons = $("#boutons").val();
		couture = $("#couture").val();
		tissu_doublure_reference = $("#tissu_doublure_reference").val();
		tissu_doublure_code = $("#tissu_doublure_code").val();
		tissu_doublure_id = $("#tissu_doublure_id").val();
		doublure_col = $("#doublure_col").val();
		doublure_poignets = $("#doublure_poignets").val();
		//check if undefined
		if (typeof reference == 'undefined') { reference = "T1630"; }
		if (typeof col == 'undefined') { col = "CLA"; }
		if (typeof baleine == 'undefined') { baleine = "A"; }
		if (typeof tenue_col == 'undefined') { tenue_col = "R"; }
		if (typeof poignets == 'undefined') { poignets = "A11"; }
		if (typeof poches == 'undefined') { poches = "0"; }
		if (typeof epaulettes == 'undefined') { epaulettes = ""; }
		if (typeof bas == 'undefined') { bas = "L"; }
		if (typeof gorge == 'undefined') { gorge = "S"; }
		if (typeof dos == 'undefined') { dos = ""; }
		if (typeof pinces == 'undefined') { pinces = ""; }
		if (typeof boutons == 'undefined') { boutons = "standard"; }
		if (typeof couture == 'undefined') { couture = "1801"; }
		if (typeof tissu_doublure_reference == 'undefined') { tissu_doublure_reference = ""; }
		if (typeof tissu_doublure_code == 'undefined') { tissu_doublure_code = ""; }
		if (typeof tissu_doublure_id == 'undefined') { tissu_doublure_id = ""; }
		if (typeof doublure_col == 'undefined') { doublure_col = ""; }
		if (typeof doublure_poignets == 'undefined') { doublure_poignets = ""; }
		//ajax call
		$.ajax({			
			url: 'load_image.php',
			type : 'POST',	
			data: 'view='+view+'&reference='+reference+'&col='+col+'&hp='+hp+'&baleine='+baleine+'&tenue_col='+tenue_col+'&poignets='+poignets+'&poches='+poches+'&epaulettes='+epaulettes+'&bas='+bas+'&gorge='+gorge+'&dos='+dos+'&pinces='+pinces+'&boutons='+boutons+'&couture='+couture+'&tissu_doublure_reference='+tissu_doublure_reference+'&tissu_doublure_code='+tissu_doublure_code+'&tissu_doublure_id='+tissu_doublure_id+'&doublure_col='+doublure_col+'&doublure_poignets='+doublure_poignets+'&timecall=<?php echo time(); ?>',			
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},			
			success: function(result)
			{
				$('#view_area').html(result);				
			}
		});
	}
	
	function view_chemise(view)
	{
		$('#view_face').css('display','none');
		$('#view_dos').css('display','none');
		$('#view_zoom').css('display','none');
		$('#view_'+view).css('display','block');
		//reload_chemise_png(view);
	}
	
	function etape2()
	{
		$('#titre_etape').html('<span style="cursor:pointer;font-size: 13px;color: #00f;" onclick="retour();">retour</span> - ETAPE 2 : CHOIX OPTIONS');
		$('#boutton_etape').html('<button class="btn" onclick="valider();">valider le modèle</button>');
		$.ajax({			
			url: 'etape2.php',
			type : 'POST',	
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},			
			success: function(result)
			{
				$('#etape_content').html(result);
				if($('#api_prix').val()==''){$('#prix').val('89');}else{$('#prix').val($('#api_prix').val());}
			}
		});		
	}
	function retour()
	{
		$('#titre_etape').html('ETAPE 1: CHOIX TISSU');
		$('#boutton_etape').html('<button class="btn" onclick="etape2();">valider le tissu</button>');
		$('#etape_content').html('<div id="tissus_liste"></div>');
		charger_tissu();
	}
	
	
	function valider()
	{
		$('#titre_etape').html('ETAPE 3: SAUVEGARDE');
		$('#boutton_etape').html('');//'<button class="btn" onclick="modele_update();">Mettre à jour le modèle</button>');
		$('#etape_content_loading').html('<img src="curved-bars.svg" />');
		//sauvegarder
		tissu_select_referece = $("#tissu_select_referece").html();
		tissu_doublure_reference = $("#tissu_doublure_reference").val();	
		prix = $("#prix").val();
		categorie = $("#categorie").val();
		//categorie_id	 = $("#categorie_id").val();
		col = $("#col").val();
		tenue_col = $("#tenue_col").val();
		baleine = $("#baleine").val();
		doublure_col = $("#doublure_col").val();
		hp = $("#col").find(':selected').data("hp");
		poignets = $("#poignets").val();
		doublure_poignets = $("#doublure_poignets").val();
		dos = $("#dos").val();
		pinces = $("#pinces").val();
		bas_chemise	 = $("#bas_chemise").val();
		gorge = $("#gorge").val();
		poches = $("#poches").val();
		epaulettes = $("#epaulettes").val();
		boutons = $("#boutons").val();
		couture = $("#couture").val();
		img_file_face = $("#img_file_face").val();
		img_file_zoom = $("#img_file_zoom").val();
		img_file_dos = $("#img_file_dos").val();
		api_url = $("#api_url").val();
		api_titre = $("#api_titre").val();
		api_prix = $("#api_prix").val();
		api_description = $("#api_description").val();
		api_h1 = $("#api_h1").val();		
		api_couleur = $("#api_couleur").val();
		api_tissage = $("#api_tissage").val();
		api_dessin = $("#api_dessin").val();
			
		$.ajax({			
			url: 'modele_sauvegarde.php',
			type : 'POST',	
			data: 'tissu_ref='+tissu_select_referece+'&'+'tissu_doublure_ref='+tissu_doublure_reference+'&'+'prix='+prix+'&'+'categorie='+categorie+'&'+'col='+col+'&'+'tenue_col='+tenue_col+'&'+'baleine='+baleine+'&'+'doublure_col='+doublure_col+'&'+'hp='+hp+'&'+'poignets='+poignets+'&'+'doublure_poignets='+doublure_poignets+'&'+'dos='+dos+'&'+'pinces='+pinces+'&'+'bas_chemise='+bas_chemise+'&'+'gorge='+gorge+'&'+'poches='+poches+'&'+'epaulettes='+epaulettes+'&'+'boutons='+boutons+'&'+'couture='+couture+'&img_file_face='+img_file_face+'&img_file_zoom='+img_file_zoom+'&img_file_dos='+img_file_dos+'&api_url='+api_url+'&api_titre='+api_titre+'&api_prix='+api_prix+'&api_description='+api_description+'&api_h1='+api_h1+'&api_couleur='+api_couleur+'&api_tissage='+api_tissage+'&api_dessin='+api_dessin+'&'+'timecall=<?php echo time(); ?>',
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},
			success: function(result)
			{
				//console.log('002/creamod/charger_chemise_png');
				console.log(result);
				$('#etape_content').html(result);
				
				//etape3();
				//$('#view_area').html(result);
			}
		});
	}
	
	function etape3()
	{
		console.log('008/creamod/etape3');
		$.ajax({			
			url: 'etape3.php',
			type : 'POST',	
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},			
			success: function(result)
			{
				$('#etape_content_sub').append(result);
				$('#url').val($('#api_url').val());
				$('#title').val($('#api_titre').val());
				$('#description').val($('#api_description').val());
				$('#h1').val($('#api_h1').val());
			}
		});	
	}
	
	function modele_update()
	{
		console.log('009/creamod/modele_update');
		$('#etape_content_loading').html('<img src="curved-bars.svg" />');
		id_modele = $("#id_modele").val();
		url = $("#url").val();
		title = $("#title").val();
		h1 = $("#h1").val();
		texte = $("#texte").val();
		description = $("#description").val();
		libelle = $("#libelle").val();
		categorie = $("#categorie").val();
		
		$.ajax({			
			url: 'modele_sauvegarde_update.php',
			type : 'POST',	
			data: 'id_modele='+id_modele+'&'+'url='+url+'&'+'title='+title+'&'+'h1='+h1+'&'+'texte='+texte+'&'+'description='+description+'&'+'libelle='+libelle+'&'+'categorie='+categorie,
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},			
			success: function(result)
			{
				$('#etape_content_loading').html(result);				
			}
		});	
	}
	</script>
	<style>
	.tissu
	{
		cursor:pointer;
	}
	</style>
</body>
</html>