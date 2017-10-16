<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
	$sql = 'select * from tailorgeorge_modele where home="1" order by id_auto desc limit 0,9';
	$query = $bdd->query($sql);
	
	echo '<div class="row">';
	while($d = $query->fetch())
	{		
		echo '<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-4">
					<a href="chemises/'.$d['url'].'">
						<div class="chemise-catalogue">
							<div class="chemise-catalogue-photo">
								<img src="../../'.$d['jpg_face'].'" alt="'.$d['jpg_face_alt'].'" >
							</div>
							<div class="catalogue-details">
								<p class="modele-catalogue">'.$d['h1'].'</p>
								<p class="prix-catalogue oswald-bold">'.$d['prix'].'€</p>
							</div>
						</div>
					</a>
				</div>';
		
	}
	echo '<div class="col-xs-12">
               <div class="fin-apercu-catalogue">
                    <a href="catalogue-chemise.html" class="btn-rose">Voir tous les mod&egrave;les</a>
                </div>
            </div>';
	echo '</div>';
?>



            
		
			
			