<?php
function fiche($db)
	{
	for($i=1;$i<7;$i++)
		{
		$db[0]["date$i"]=$db[0]["date$i"]=="0000-00-00"?"____":dateFR($db[0]["date$i"]);
		$db[0]["debut$i"]=$db[0]["debut$i"]=="00:00:00"?"____":substr($db[0]["debut$i"],0,-3);
		$db[0]["fin$i"]=$db[0]["fin$i"]=="00:00:00"?"____":substr($db[0]["fin$i"],0,-3);
		}
	if($db[0]['public'])
		$db[0]['public']=join(", ",unserialize($db[0]['public']));
	if($db[0]['pauses'])
		$db[0]['pauses']=join(", ",unserialize($db[0]['pauses']));
	if($db[0]['equipement'])
		$db[0]['equipement']=join(", ",unserialize($db[0]['equipement']));

	$keys=array_keys($db[0]);
		{
		foreach($keys as $elem)
			{
			$db[0][$elem]=stripslashes($db[0][$elem]);
			if(substr($elem,-6)!="_autre")
				$db[0][$elem]=$db[0][$elem]==""?"____":$db[0][$elem];
			}
		}
	$db[0]['type']=$db[0]['type']=="autre"?"":$db[0]['type'];
	$fiche= "<table>
	<tr><td colspan='4'>
	<h2>Dates et contacts</h2>
	<br/>
	</td></tr>
	<tr>
	<td><b>Titre de l'événement</b></td>
	<td colspan='2'><font class='result' id='titre'>{$db[0]['titre']}</font></td>
	</tr>

	<tr>
	<td><b>Date(s)</b></td>";
	
	for($i=1;$i<7;$i++)
		{
		if($db[0]["date$i"]!="____")
			{
			if($i!=1)
				$fiche.="<tr><td>&nbsp;</td>";
			$fiche.="<td>
				<font class='result' id='date$i'>{$db[0]["date$i"]}</font>
				</td>
				<td>
				De
				<font class='result' id='debut$i'>{$db[0]["debut$i"]}</font>
				&nbsp;à&nbsp;
				<font class='result' id='fin$i'>{$db[0]["fin$i"]}</font>
				</td>
				</tr>";
			}
		}

	$fiche.="
	<tr>
	<td colspan='3'><br/><b>Coordonnées de l'organisateur</b></td>
	</tr>

	<tr>
	<td><font class='marge1'>Nom, prénom</font></td>
	<td colspan='2'><font class='result' id='organisateur_nom'>{$db[0]['organisateur_nom']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Etablissement</font></td>
	<td colspan='2'><font class='result' id='organisateur_etablissement'>{$db[0]['organisateur_etablissement']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Adresse</font></td>
	<td colspan='2'><font class='result' id='organisateur_adresse'>{$db[0]['organisateur_adresse']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone</font></td>
	<td colspan='2'><font class='result' id='organisateur_telephone'>{$db[0]['organisateur_telephone']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone mobile</font></td>
	<td colspan='2'><font class='result' id='organisateur_telephone_mobile'>{$db[0]['organisateur_telephone_mobile']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Courriel</font></td>
	<td colspan='2'><font class='result' id='organisateur_courriel'>{$db[0]['organisateur_courriel']}</font></td>
	</tr>

	<tr>
	<td colspan='3'><br/><b>La note de participation aux frais doit être envoyée à</b></td>
	</tr>

	<tr>
	<td><font class='marge1'>Nom, prénom</font></td>
	<td colspan='2'><font class='result' id='note_nom'>{$db[0]['note_nom']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Adresse</font></td>
	<td colspan='2'><font class='result' id='note_adresse'>{$db[0]['note_adresse']}</font></td>
	</tr>
			
	<tr>
	<td><font class='marge1'>Téléphone</font></td>
	<td colspan='2'><font class='result' id='note_telephone'>{$db[0]['note_telephone']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone mobile</font></td>
	<td colspan='2'><font class='result' id='note_telephone_mobile'>{$db[0]['note_telephone_mobile']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Courriel</font></td>
	<td colspan='2'><font class='result' id='note_courriel'>{$db[0]['note_courriel']}</font></td>
	</tr>
		
	<tr>
	<td colspan='3'><br/><b>Personne en charge de l'événement sur place</b></td>
	</tr>

	<tr>
	<td><font class='marge1'>Nom, Prénom</font></td>
	<td colspan='2'><font class='result' id='surplace_nom'>{$db[0]['surplace_nom']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone</font></td>
	<td colspan='2'><font class='result' id='surplace_telephone'>{$db[0]['surplace_telephone']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone mobile</font></td>
	<td colspan='2'><font class='result' id='surplace_telephone_mobile'>{$db[0]['surplace_telephone_mobile']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Courriel</font></td>
	<td colspan='2'><font class='result' id='surplace_courriel'>{$db[0]['surplace_courriel']}</font></td>
	</tr>

	<tr>
	<td><br/><b>Nom du/des sponsor(s)</b></td>
	<td colspan='2'><br/><font class='result' id='sponsor'>{$db[0]['sponsor']}</font></td>
	</tr>

	<tr><td colspan='4'>
	<br/><br/><hr/>
	<h2>Nature de l'événement</h2>
	<br/>
	</td></tr>

	<tr>
	<td><b>Type</b></td>

	<td colspan='2'>
	<font class='result' id='type'>{$db[0]['type']}</font>
	<font class='result' id='type_autre'>{$db[0]['type_autre']}</font>
	</td>
	</tr>

	<tr><td><br/><b>Public attendu</b></td>
	<td><br/>
	<font class='result' id='public'>{$db[0]['public']}</font>
	</td>
	</tr>

	<tr>
	<td><br/><b>Nombre d'intervenants</b></td>
	<td colspan='2'><br/>
	<font class='result' id='intervenants'>{$db[0]['intervenants']}</font>
	</td>
	</tr>

	<tr>
	<td><b>Nombre de personnes attendues</b></td>
	<td colspan='2'>
	<font class='result' id='personnes'>{$db[0]['personnes']}</font>
	</td>
	</tr>

<!--
	<tr>
	<td><br/><b>Souhaitez-vous offrir à vos frais</b></td>
	<td colspan='2'><br/>
	<font class='result' id='pauses'>{$db[0]['pauses']}</font>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td colspan='3'>
	<font class='result' id='pauses_autre'>{$db[0]['pauses_autre']}</font>
	</td>
	</tr>

	<tr>
	<td><br/><b>Recours à un traiteur</b></td>
	<td colspan='2'><br/>
	<font class='result' id='traiteur'>{$db[0]['traiteur']}</font>
	</td>
	</tr>

	<tr>
	<td><font class='marge1'>Si oui, nom du traiteur</font></td>
	<td colspan='2'><font class='result' id='traiteur_nom'>{$db[0]['traiteur_nom']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Téléphone</font></td>
	<td colspan='2'><font class='result' id='traiteur_telephone'>{$db[0]['traiteur_telephone']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Adresse</font></td>
	<td colspan='2'><font class='result' id='traiteur_adresse'>{$db[0]['traiteur_adresse']}</font></td>
	</tr>
-->
	<tr><td colspan='4'>
	<br/><br/><hr/>
	<h2>Salle et équipements</h2>
	<br/>
	</td></tr>
<!--
	<tr>
	<td><b><br/>Salle souhaitée</b></td>
	<td colspan='2'><br/>
	<font class='result' id='salle'>{$db[0]['salle']}</font>
	<font class='result' id='salle_autre'>{$db[0]['salle_autre']}</font>
	</td>
	</tr>
-->
	<tr>
	<td><b><br/>Disposition de la salle</b></td>
	<td colspan='2'><br/>
	<font class='result' id='disposition'>{$db[0]['disposition']}</font>
	</td>
	</tr>

	<tr>
	<td><br/><b>Equipement special souhaité</b></td>
	<td colspan='2'><br/>
	<font class='result' id='equipement'>{$db[0]['equipement']}</font>
	&nbsp;&nbsp;
	<font class='result' id='equipement_autre'>{$db[0]['equipement_autre']}</font>
	</td>
	</tr>
	<tr>

	<td><br/><b>Commentaires</b></td>
	<td colspan='2'><br/><font class='result' id='commentaires'>{$db[0]['commentaires']}</font></td>
	</tr></table>";
	
	return $fiche;
	}

function fiche_membre($db)
	{
	for($i=1;$i<7;$i++)
		{
		$db[0]["date$i"]=$db[0]["date$i"]=="0000-00-00"?"____":dateFR($db[0]["date$i"]);
		$db[0]["debut$i"]=$db[0]["debut$i"]=="00:00:00"?"____":substr($db[0]["debut$i"],0,-3);
		$db[0]["fin$i"]=$db[0]["fin$i"]=="00:00:00"?"____":substr($db[0]["fin$i"],0,-3);
		}
	if($db[0]['public'])
		$db[0]['public']=join(", ",unserialize($db[0]['public']));
	if($db[0]['pauses'])
		$db[0]['pauses']=join(", ",unserialize($db[0]['pauses']));
	if($db[0]['equipement'])
		$db[0]['equipement']=join(", ",unserialize($db[0]['equipement']));

	$keys=array_keys($db[0]);
		{
		foreach($keys as $elem)
			{
			$db[0][$elem]=stripslashes($db[0][$elem]);
			if(substr($elem,-6)!="_autre")
				$db[0][$elem]=$db[0][$elem]==""?"____":$db[0][$elem];
			}
		}
	$db[0]['type']=$db[0]['type']=="autre"?"":$db[0]['type'];
	$fiche= "<table>
	<tr><td colspan='4'>
	<h2>Dates et contacts</h2>
	<br/>
	</td></tr>
	<tr>
	<td><b>Intitulé précis de l'événement</b></td>
	<td colspan='2'><font class='result' id='titre'>{$db[0]['titre']}</font></td>
	</tr>

	<tr>
	<td><b>Date(s)</b></td>";
	for($i=1;$i<7;$i++)
		{
		if($db[0]["date$i"]!="____")
			{
			if($i!=1)
				$fiche.="<tr><td>&nbsp;</td>";
			$fiche.="<td>
				<font class='result' id='date$i'>{$db[0]["date$i"]}</font>
				</td>
				<td>
				De
				<font class='result' id='debut$i'>{$db[0]["debut$i"]}</font>
				&nbsp;à&nbsp;
				<font class='result' id='fin$i'>{$db[0]["fin$i"]}</font>
				</td>
				</tr>";
			}
		}

	$fiche.="
	<tr>
	<td colspan='3'><br/><b>Coordonnées de l'organisateur</b></td>
	</tr>

	<tr>
	<td><font class='marge1'>Nom du programme</font></td>
	<td colspan='2'><font class='result' id='organisateur_etablissement'>{$db[0]['organisateur_etablissement']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Personne en charge</font></td>
	<td colspan='2'><font class='result' id='organisateur_nom'>{$db[0]['organisateur_nom']}</font></td>
	</tr>

	<tr>
	<td><font class='marge1'>Courriel</font></td>
	<td colspan='2'><font class='result' id='organisateur_courriel'>{$db[0]['organisateur_courriel']}</font></td>
	</tr>


	<tr><td colspan='4'>
	<br/><br/><hr/>
	<h2>Nature de l'événement</h2>
	<br/>
	</td></tr>

	<tr>
	<td><b>Type</b></td>

	<td colspan='2'>
	<font class='result' id='type'>{$db[0]['type']}</font>
	<font class='result' id='type_autre'>{$db[0]['type_autre']}</font>
	</td>
	</tr>

	<tr><td><br/><b>Public attendu</b></td>
	<td><br/>
	<font class='result' id='public'>{$db[0]['public']}</font>
	</td>
	</tr>

	<tr>
	<td><br/><b>Nombre d'intervenants</b></td>
	<td colspan='2'><br/>
	<font class='result' id='intervenants'>{$db[0]['intervenants']}</font>
	</td>
	</tr>

	<tr>
	<td><b>Nombre de personnes attendues</b></td>
	<td colspan='2'>
	<font class='result' id='personnes'>{$db[0]['personnes']}</font>
	</td>
	</tr>


	<tr><td colspan='4'>
	<br/><br/><hr/>
	<h2>Salle et équipements</h2>
	<br/>
	</td></tr>

	<tr>
	<td><b><br/>Disposition de la salle</b></td>
	<td colspan='2'><br/>
	<font class='result' id='disposition'>{$db[0]['disposition']}</font>
	</td>
	</tr>

	<tr>
	<td><br/><b>Equipement special souhaité</b></td>
	<td colspan='2'><br/>
	<font class='result' id='equipement'>{$db[0]['equipement']}</font>
	&nbsp;&nbsp;
	<font class='result' id='equipement_autre'>{$db[0]['equipement_autre']}</font>
	</td>
	</tr>
	<tr>

	<td><br/><b>Commentaires</b></td>
	<td colspan='2'><br/><font class='result' id='commentaires'>{$db[0]['commentaires']}</font></td>
	</tr></table>";
	
	return $fiche;
	}
?>
