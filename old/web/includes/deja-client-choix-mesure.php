<!-- CHOIX TYPE DE MESURE -->
<div class="container">
   <div class="row">
       <div class="col-xs-12">
            <h2 class="methode-titre oswald-regular">Bonjour <?php echo $client['salutation'].' '.strtoupper($client['prenom']).' '.strtoupper($client['nom']); ?> !</h2>
            <p class="choix-methode-mesure">Pour cette commande vous désirez utilisez quelle mesures ?</p>
       </div>
   </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="methode-mesure">
                <h2 class="methode-titre oswald-regular">Les mesures de la <br>précédente commande</h2>
                <p class="duree-methode oswald-regular" style="text-decoration: underline; cursor: pointer;" data-toggle="modal" data-target="#myModal">voir les mesures</p>
                <div class="methode-mesure-img mesure-rapide"></div>
                <p class="methode-content">Les mesures de la dernière commande étaient bonnes, vous voulez réutilisez les mêmes.</p>
                <a href="panier-3.html" class="btn-rose">suivant</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="methode-mesure">
                <h2 class="methode-titre oswald-regular">Modifier quelques <br>mesures</h2>
                <p class="duree-methode oswald-regular">3 min</p>
                <div class="methode-mesure-img mesure-vous"></div>
                <p class="methode-content">Vous voulez modifiez quelques mesures par rapport à la dernière commande pour un résultat parfait.</p>
                <a href="panier-2-modif-mesure.html" class="btn-rose">suivant</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="methode-mesure">
                <h2 class="methode-titre oswald-regular">Rentrer de nouvelles <br>mesures</h2>
                <p class="duree-methode oswald-regular">3 min</p>
                <div class="methode-mesure-img mesure-chemise"></div>
                <p class="methode-content">Vous avez grossi :( ou maigri :) ? Pas de soucis, entrez de nouvelles mesures pour cette commande.</p>
                <a href="panier-2-new-mesure.html" class="btn-rose">suivant</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 class="modal-title" id="myModalLabel" style="font-size:20px;">Vos mesures</h1>
      </div>
      <div class="modal-body" style="font-size:16px;">
        <?php 
			$ss = 'select * from tg_mesure where id_client="'.$client['id'].'"';
			$qq = $bdd->query($ss);
			$mesures = $qq->fetch();
			
			
			
			if($mesures['type']='mesure-rapide')
			{
				echo '<p><strong>Mode de mesures: Rapide</strong></p>';
				echo '<ul style="margin-top: 12px;margin-left: 30px;line-height: 35px;list-style: circle;font-size:16px;">';
				echo '<li>VOTRE TAILLE DE CHEMISE: '.$mesures['mesure_rapide_taille'].'</li>';
				echo '<li>VOTRE ENCOLURE: '.$mesures['mesure_rapide_col'].'</li>';
				echo '<li>LA LONGUEUR DE VOS MANCHES: '.$mesures['mesure_rapide_bras'].'</li>';
				echo '<li>LA COUPE DE VOTRE CHEMISE: '.$mesures['coupe_vous'].'</li>';				
				echo '</ul>';
			}
			
			if($mesures['type']='mesurez-vous')
			{
				
			}
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>        
      </div>
    </div>
  </div>
</div>