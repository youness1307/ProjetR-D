﻿
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>SVEDI</title>
	<link rel=stylesheet type="text/css" href="../../assets/css/home.css"/>
	<script type="text/javascript" src="../../assets/javascript/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../../assets/javascript/search.js"></script>
	<script type="text/javascript" src="../../assets/javascript/VerifFormulaire.js"></script>
	<script type="text/javascript" src="../../assets/javascript/Desinscription.js"></script>
	<script type="text/javascript" src="../../assets/javascript/Notification.js"></script>


<?php 
	if(@$resp == "Y"){
		echo '<script type="text/javascript" src="../../assets/javascript/isResp.js"></script>';
		echo '<script type="text/javascript" src="../../assets/javascript/Resp.js"></script>';
	}else{
		echo '<script type="text/javascript" src="../../assets/javascript/popUp.js"></script>';
	}

?>

	<style>
	<?php 
	$role = $this->session->userdata('Role');

if($role > 1){
	?>
		#listNotifs{
			z-index:30;
			overflow:auto;
			height: calc(100% - 204px);
		}
	<?php
}else{
	?>
		#listNotifs{
			z-index:30;
			overflow:auto;
			height: calc(100% - 163px);
		}

<?php
}
?></style>
	
</head>
<body>
<header>
	
	<div id="logo">
		<a href="../controleurHome/"><img alt="svedi" src="../../assets/images/SVEDI-small.png"/></a>
	</div>
	
	<div id="searchBar">
		<form id="newsearch" method="get" action="../controleurRecherche/">
		        <input type="text" value="<?php if(@$Key != ''){ echo $Key;}?>" class="textinput" name="search" size="35" maxlength="120"><input id="btnLoupe" type="submit" value="" class="buttonSearch">
		        <img id="loupeSearchBar" alt="loupe" src="../../assets/images/loupe.png"/>
		</form>

	</div>

	<div id="Date">
		 <a id="gaucheDate"  href="../ControleurRespDescrEns/AnneeMoins"><img alt="" src="../../assets/images/DateGaucheHeader.png"></a>
		
		 <label id="centreDate" value="<?php echo $Date;?>"><?php echo $Date;?></label>
		 
		 <a id="droiteDate"  href="../ControleurRespDescrEns/AnneePlus"><img alt="" src="../../assets/images/DateDroiteHeader.png"></a>
	</div>
	
	<p id="deconnexion">
		<a href="../ControleurConnexion/deconnect">D&eacute;connexion</a>
	</p>
	
	
</header>

<div id="content">
	<h4>Désinscrire un enseignant à une matière de la filière "<?php echo stripslashes($FiliereNom); ?>"</h4>
<div>

	<p>Selectionner l'enseignant que vous souhaitez désinscrire :</p>
	<p><?php echo $listE;?></p>

	<div id="<?php echo $Visible;?>">
		<div>
		<h5>Inscriptions valid&eacute;es</h5>
			<?php
				if (count($Inscription) > 0 ) {
			?>  

					<table>
						
						<tr>
							<th width="260px">Nom de la mati&egrave;re</th>
							<th width="260px">Fili&egrave;re rattach&eacute;e</th>
							<th width="60px">TP</th>
							<th width="60px">TD</th>
							<th width="60px">Cours</th>
							<th width="60px">Total</th>
							<th>Suppr.</th>
									
						</tr>	
						<?php
						
							$NbrCol=5; //: //le nombre de colonnes
							$NbrLigne= count($Inscription) - 1;// : le nombre de lignes
							 
						
							for ($i=0; $i<=$NbrLigne; $i++){ 
						?>
						<tr>
							<?php for ($j=0; $j<=$NbrCol; $j++){ 	?>	
								<td> <?php echo $Inscription[$i][$j]; ?>	</td>
							<?php }  ?>
							<td class="supprTD"><img id="IS<?php echo $Inscription[$i][6]; ?>" src="../../assets/images/iconeSupprimer.png"/></td>
						<?php } ?>
						</tr>
					</table>
					<p  class="log" id="ILog"><?php echo @$Log;?></p>
			<?php } else { ?>
			
				<h6 class="h6Decal">Aucune inscriptions valid&eacute;es</h6>
			
			
			<?php } ?>
		</div>
		<div>
			<h5>Inscription en cours d'arbitrage</h5>
			<?php
				if (count($Conflit) > 0 ) {
			?>  
				<table>
					<tr>
						<th width="260px">Nom de la mati&egrave;re</th>
						<th width="260px">Fili&egrave;re rattach&eacute;e</th>
						<th width="60px">TP</th>
						<th width="60px">TD</th>
						<th width="60px">Cours</th>
						<th width="60px">Total</th>
						<th>Suppr.</th>
					</tr>
					<?php
					
						$NbrCol=5; //: //le nombre de colonnes
						$NbrLigne= count($Conflit) - 1;// : le nombre de lignes
						 
					
						for ($i=0; $i<=$NbrLigne; $i++){ 
					?>
					<tr>
						<?php for ($j=0; $j<=$NbrCol; $j++){ 	?>	
							<td> <?php echo $Conflit[$i][$j]; ?>	</td>
						<?php }  ?>
						<td class="supprTD"><img id="CS<?php echo $Conflit[$i][6]; ?>"  src="../../assets/images/iconeSupprimer.png"/></td>
					<?php } ?>
					
						
					</tr>
				</table>
				<p  class="log" id="CLog"><?php echo @$Log;?></p>
			<?php } else { ?>
			
				<h6 class="h6Decal">Aucune inscription en cours d'arbitrage</h6>
			
			
			<?php } ?>
		</div>
	</div>
</div>
</div>
