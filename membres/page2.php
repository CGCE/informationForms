<?php
echo <<<EOD
<div id='page2'>
<h2>{$lang['nature']}</h2>
<br/>
<table cellspacing='0' cellpadding='0'>

<tr>
<td><b>Type *</b></td>

<td colspan='2'>
<div id='div_type' style='width:125px'>
<input type='radio' name='type' value='colloque'/>{$lang['colloque']}<br/>
<input type='radio' name='type' value='conférence'/>{$lang['conference']}<br/>
<input type='radio' name='type' value='séminaire'/>{$lang['seminaire']}<br/>
<input type='radio' name='type' value='table-ronde'/>{$lang['table-ronde']}<br/>
<input type='radio' name='type' value='réception'/>{$lang['reception']}
</div></td>
</tr>

<tr>
<td>&nbsp;</td>
<td style='width:125px;' id='div_type2'>
<input type='radio' name='type' value='autre'/>{$lang['autre_precisez']}</td>
<td style='width:375px;'><input type='text' name='type_autre' style='width:375px;'/></td>
</tr>


<tr><td><br/><b>Public attendu *</b></td>
<td id='div_public' style='width:125px;'><br/>
<input type='checkbox' name='public[]' value='professeurs' />{$lang['professeurs']}<br/>
<input type='checkbox' name='public[]' value='étudiants' />{$lang['etudiants']}<br/>
<input type='checkbox' name='public[]' value='professionnels' />{$lang['professionnels']}<br/>
<input type='checkbox' name='public[]' value='grand public' />{$lang['grand_public']}
</td>
<td style='width:375px;'>
<br/>
<div id='div_public2' style='width:125px'>
<input type='checkbox' name='public[]' value='européen'/>{$lang['europeen']}<br/>
<input type='checkbox' name='public[]' value='français'/>{$lang['francais']}<br/>
<input type='checkbox' name='public[]' value='américain'/>{$lang['americain']}<br/>
<input type='checkbox' name='public[]' value='international'/>{$lang['international']}<br/>
</div>
</td>
</tr>

<tr>
<td><br/><b>{$lang['intervenants']} *</b></td>
<td colspan='2'><br/>
<select name='intervenants' style='width:80px;'>
<option value=''>&nbsp;</option>
EOD;

for($i=0;$i<21;$i++)
	echo "<option value='$i'>$i</option>\n";

echo <<<EOD
</select>
</td>
</tr>

<tr>
<td><b>{$lang['personnes']} *</b></td>
EOD;
?>
<td colspan='2'>
<select name='personnes' style='width:80px;'>
<option value=''>&nbsp;</option>
<?php
for($i=1;$i<13;$i++)
	echo "<option value='".($i*10-9)." - ".($i*10)."'>".($i*10-9)." - ".($i*10)."</option>\n";
?>
</select>
</td>
</tr>

<!--
<tr>
<td><br/><b>Souhaitez-vous offrir à vos frais</b></td>
<td colspan='2'><br/>
<input type='checkbox' name='pauses[]' value='petit déjeuner' />petit déjeuner<br/>
<input type='checkbox' name='pauses[]' value='déjeuner' />déjeuner<br/>
<input type='checkbox' name='pauses[]' value='pause café matin' />pause café le matin<br/>
<input type='checkbox' name='pauses[]' value='pause café après-midi' />pause café l'après-midi<br/>
<input type='checkbox' name='pauses[]' value='buffet' />buffet<br/>
<input type='checkbox' name='pauses[]' value='cocktail' />cocktail<br/>
<input type='checkbox' name='pauses[]' value='autre' />autre (soyez aussi précis que possible)</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan='3'><textarea cols='10' rows='3' name='pauses_autre'></textarea></td>
</tr>
-->
<!--
<tr>
<td><br/><b>Recours à un traiteur</b></td>
<td colspan='2'><br/>
<div id='div_traiteur' style='width:125px;'>
<input type='radio' name='traiteur' value='oui'/>Oui
&nbsp;&nbsp;&nbsp;
<input type='radio' name='traiteur' value='non'/>Non
</div>
</td>
</tr>

<tr>
<td><font class='marge1'>Si oui, nom du traiteur</font></td>
<td colspan='2'><input type='text' name='traiteur_nom' /></td>
</tr>

<tr>
<td><font class='marge1'>Téléphone</font></td>
<td colspan='2'><input type='text' name='traiteur_telephone' /></td>
</tr>

<tr>
<td><font class='marge1'>Adresse</font></td>
<td colspan='2'><textarea cols='10' rows='3' name='traiteur_adresse'></textarea></td>
</tr>
-->
</table>
</div>