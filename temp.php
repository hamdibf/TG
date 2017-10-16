<?php 
require_once('config.php');
//inserer une ligne vide pour recuperer un id_auto
$sql = 'select * from `tailorgeorge_modele` where code="'.$_REQUEST['reference'].'"';
$query = $bdd->query($sql);
$data = $query->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $data['title']; ?></title>
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
		
		<div><a href="../stock.html">Liste complete (stock)</a></div>
		
		<h1>APERÇU DU MODELE</h1>
		<input type="hidden" name="id_modele" id="id_modele" value="<?php echo $data['id_auto']; ?>">
		<div class="row">
			<div class="col-md-8" style="background-color:#ffffff;height:85vh;">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-2" onclick="view_chemise('face');" style="cursor:pointer;"><u>Vue Face</u></div>
					<div class="col-md-2" onclick="view_chemise('dos');" style="cursor:pointer;"><u>Vue Dos</u></div>
					<div class="col-md-2" onclick="view_chemise('zoom');" style="cursor:pointer;"><u>Vue Zoom</u></div>
					<div class="col-md-3"></div>
					<div class="col-md-12"  id="view_area">
					<div id="shirt-container" style="position: relative;width: 100%;height: 85vh;overflow: hidden;">
						<div class="base"><img id="view_face" alt="<?php echo $data['jpg_face_alt']; ?>" src="./../<?php echo $data['jpg_face'].'?t=456'; ?>" style="width:100%;position:absolute;top:0;left:0;display:block;" /></div>
						<div class="base"><img id="view_dos" alt="<?php echo $data['jpg_dos_alt']; ?>" src="./../<?php echo $data['jpg_dos'].'?t=456'; ?>" style="width:100%;position:absolute;top:0;left:0;display:none;" /></div>
						<div class="base"><img id="view_zoom" alt="<?php echo $data['jpg_zoom_alt']; ?>" src="./../<?php echo $data['jpg_zoom'].'?t=456'; ?>" style="width:100%;position:absolute;top:0;left:0;display:none;" /></div>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="background-color:#f5f0f0;height:85vh;overflow-y: auto;    overflow-x: hidden;">				
				<h4 id="titre_etape">META-DONNEES</h4>
				<div class="row" id="etape_content">
					<div class="row">
						<div id="etape_content_loading"></div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<label for="url">URL</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<input type="text" name="url" id="url" value="<?php echo $data['url']; ?>" style="width:100%;" />
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<label for="title">Titre</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<input type="text" name="title" id="title" value="<?php echo $data['title']; ?>" style="width:100%;" />
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<label for="h1">H1</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<input type="text" name="h1" id="h1" value="<?php echo $data['h1']; ?>" style="width:100%;" />
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<label for="description">Description</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<textarea name="description" id="description" style="width:100%;height:80px;"><?php echo $data['description']; ?></textarea>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<label for="libelle">Libelle</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<input type="text" name="libelle" id="libelle" value="<?php echo $data['libelle']; ?>" style="width:100%;" />
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<label for="texte">Texte</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<textarea name="texte" id="texte" style="height:80px;width:100%;"></textarea>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<label for="chapo">Chapo</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:85px;height:85px;border-bottom:1px dotted #c4c4c4;">
							<textarea name="chapo" id="chapo" style="height:80px;width:100%;"></textarea>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<label for="maj_final">Version Finale ?</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding-left: 25px;max-height:33px;height:33px;border-bottom:1px dotted #c4c4c4;">
							<select name="maj_final" id="maj_final"  style="width:100%;">
								<option value="0" data-code="0" <?php if($data['maj_final']=="0") { echo "selected"; } ?>>Non</option>
								<option value="1" data-code="1" <?php if($data['maj_final']=="1") { echo "selected"; } ?>>Oui</option>
							</select>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<button class="btn" onclick="modele_update();">Mettre à jour le modèle</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	
	<!-- scripts area -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	

	<script>
	$(document).ready(function() {
		
	});
	
	
	
	function view_chemise(view)
	{
		$('#view_face').css('display','none');
		$('#view_dos').css('display','none');
		$('#view_zoom').css('display','none');
		$('#view_'+view).css('display','block');
		//reload_chemise_png(view);
	}
	
	
	
	
	function modele_update()
	{
		console.log('009/creamod/modele_update');
		$('#etape_content_loading').html('<img src="../curved-bars.svg" />');
		id_modele = $("#id_modele").val();
		url = $("#url").val();
		title = $("#title").val();
		h1 = $("#h1").val();
		texte = $("#texte").val();
		description = $("#description").val();
		libelle = $("#libelle").val();
		maj_final = $("#maj_final").val();
		chapo = $("#chapo").val();
		//categorie = $("#categorie").val();
		
		$.ajax({			
			url: './../modele_sauvegarde_update.php',
			type : 'POST',	
			data: 'id_modele='+id_modele+'&'+'url='+url+'&'+'title='+title+'&'+'h1='+h1+'&'+'texte='+texte+'&'+'description='+description+'&'+'libelle='+libelle+'&'+'maj_final='+maj_final+'&'+'chapo='+chapo, //+'&'+'categorie='+categorie,
			error : function (data, errorThrown) {console.log(errorThrown); console.log(data);},			
			success: function(result)
			{
				console.log('success');
				//$('#etape_content_loading').html(result);				
				$('#etape_content_loading').html(result);
			}
		});	
	}
	</script>
</body>
</html>