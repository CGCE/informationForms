<?php
echo <<<EOD
<div id='page3'>
<h2>{$lang['salle_equipements']}</h2>
<br/>
<table>

<!--
<tr>
<td><b><br/>Salle souhaitée</td>
<td colspan='2'><br/>
<input type='radio' name='salle' value='Grande salle'/>Grande salle<br/>
<input type='radio' name='salle' value='Salle de conférence' />Salle de conférence<br/>
<input type='radio' name='salle' value='Salle de réunion' />Salle de réunion<br/>
<input type='radio' name='salle' value='Salon des étudiants' />Salon des étudiants<br/>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td style='width:125px;'><input type='radio' name='salle' value='Autre' />Autre, précisez</td>
<td style='width:375px;'><input type='text' name='salle_autre' style='width:375px;'/></td>
</tr>
-->
<tr>
<td><b><br/>{$lang['disposition']} *</b></td>
<td colspan='2'><br/>
<div id='div_disposition' style='width:300px'>
<input type='radio' name='disposition' value='Conférence' />{$lang['chaises']}<br/>
<input type='radio' name='disposition' value='Séminaire' />{$lang['tables']}<br/>
<input type='radio' name='disposition' value='Réception' />{$lang['cocktail']}
<!-- <input type='radio' name='disposition' value='Salle de classe' />Salle de classe (petites tables et chaises) -->
</div>
</td>
</tr>

<tr>
<td><br/><b>{$lang['equipement']}</b></td>
<td colspan='2'><br/>
<input type='checkbox' name='equipement[]' value='Micros sans fils' />{$lang['micros_sans_fils']}<br/>
<input type='checkbox' name='equipement[]' value='Micros avec fils' />{$lang['micros_avec_fils']}<br/>
<input type='checkbox' name='equipement[]' value='Vidéoprojecteur' />{$lang['video']} 
<font style='padding-left:30px;font-size:11pt;color:grey;'>{$lang['ordi']}</font><br/>
<!-- <input type='checkbox' name='equipement[]' value='Ordinateur' />Ordinateur portable<br/> -->
<input type='checkbox' name='equipement[]' value='lecteur DVD' />{$lang['dvd']}<br/>
<input type='checkbox' name='equipement[]' value='Tableau blanc' />{$lang['tableau_blanc']}<br/>
<input type='checkbox' name='equipement[]' value='Paper board' />{$lang['paper_board']}<br/>
<!-- <input type='checkbox' name='equipement[]' value='Moniteur TV' />Moniteur TV<br/> -->
</td>
</tr>

<tr>
<td><br/><b>{$lang['autres_equipements']}</b></td>
<td colspan='2'><br/><textarea name='equipement_autre' rows='3' cols='10'></textarea></td>
</tr>

<!--
<tr>
<td><br/><b>{$lang['commentaires']}</b></td>
<td colspan='2'><br/><textarea name='commentaires' rows='3' cols='10'></textarea></td>
</tr>
-->

<tr><td colspan='3' style='color:red;font-weight:bold;'>
<br/>
{$lang['perte_vol']}
</td></tr>
</table>
</div
EOD;
?>
