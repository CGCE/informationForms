<?php
$prg_list=Array();
$prg_list[]="Academic Year Abroad";
$prg_list[]="AARO";
$prg_list[]="Association Française des Femmes Diplomées des Universités";
$prg_list[]="COFRA";
$prg_list[]="Columbia Architecture Program";
$prg_list[]="Columbia-Penn Undergraduate Programs";
$prg_list[]="Columbia Global Centers | Europe";
$prg_list[]="Columbia Masters in French Cultural Studies in a Global Setting";
$prg_list[]="Dartmouth College";
$prg_list[]="EHESP / MPH";
$prg_list[]="EUSA, Intership program";
$prg_list[]="Hamilton College";
$prg_list[]="Hollins College";
$prg_list[]="La Dive Note";
$prg_list[]="Sarah Lawrence College";
$prg_list[]="Smith College";
$prg_list[]="Southern Methodist University";
$prg_list[]="Textes et Voix";
$prg_list[]="The American Club of Paris";
$prg_list[]="University of Delaware";
$prg_list[]="University of Kent";
$prg_list[]="UNSDSN";
$prg_list[]="Vassar-Wesleyan";
sort($prg_list);

echo <<<EOD
<div id='page1'>
<h2>{$lang['dates_contacts']}</h2>
<br/>

<table>
<tr>
<td><b>{$lang['evenement']} *</b></td>
<td colspan='2'><input type='text' name='titre' id='titre' maxlength='100' /></td>
</tr>
 
 
<tr>
<td><b>{$lang['dates']} *</b></td>
EOD;

for($j=1;$j<7;$j++)
	{
	if($j!=1)
		echo "<tr id='tr_date$j' style='display:none;' ><td>&nbsp;</td>\n";
	echo <<<EOD
	<td>
	<input type='text' style='width:150px;' name='date$j' value='{$lang['date_format']}' onfocus='date_focus(this);' onblur='date_blur(this);' />
	<a href='javascript:calendrier("date$j");'><img src='../img/calendrier.gif' border='0' alt='date$j' id='date{$j}_img' /></a>
	</td>
	<td>
	{$lang['heure1']}
	<select name='debut$j'>
	<option value=''>&nbsp;</option>
EOD;
	if(isset($_GET['en']))
		{
		for($i=8;$i<13;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
		for($i=13;$i<22;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
		}
	else
		for($i=8;$i<22;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";

	echo <<<EOD
	</select>
	&nbsp;{$lang['heure2']}&nbsp;
	<select name='fin$j'>
	<option value=''>&nbsp;</option>
EOD;
	if(isset($_GET['en']))
		{
		for($i=9;$i<13;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
		for($i=13;$i<23;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
		}
	else
		for($i=9;$i<23;$i++)
			echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
	echo <<<EOD
	</select>
	</td>
	</tr>
EOD;
	}

echo <<<EOD
<tr id='tr_add_date'><td>&nbsp;</td>
<td>
<img src='../img/add.gif' onclick='add_date();' style='cursor:pointer;' alt='{$lang['ajouter']}' /></td>
</tr>

<!--
<tr>
<td><br/><b>{$lang['dates']} *</b></td>
<td><br/><div  id='div_ponctuel'><input type='radio' name='dates' value='ponctuel' onclick='dates_js("ponctuel");'/>Evenement  ponctuel</div></td>
<td><br/><div  id='div_recurrent'><input type='radio' name='dates' value='récurrent' onclick='dates_js("récurent");'/>Evenement  récurrent</div></td>
</tr>
EOD;

for($j=1;$j<4;$j++)
	{
	echo <<<EOD
	<tr id='tr_date$j' style='display:none;' ><td>&nbsp;</td>
	<td>
	<input type='text' style='width:150px;' name='date$j' value='{$lang['date_format']}' onfocus='date_focus(this);' onblur='date_blur(this);' />
	<a href='javascript:calendrier("date$j");'><img src='../img/calendrier.gif' border='0' alt='date$j' id='date{$j}_img' /></a>
	</td>
	<td>
	De
	<select name='debut$j'>
	<option value=''>&nbsp;</option>
EOD;
	for($i=8;$i<22;$i++)
		echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
	echo <<<EOD
	</select>
	&nbsp;à&nbsp;
	<select name='fin$j'>
	<option value=''>&nbsp;</option>
EOD;
	for($i=9;$i<23;$i++)
		echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
	echo <<<EOD
	</select>
	</td>
	</tr>
EOD;
	}
	
echo <<<EOD
<tr id='tr_recurent' style='display:none;'><td>&nbsp;</td>
<td>
Début &nbsp;&nbsp;&nbsp;
<input type='text' style='width:150px;' name='date_debut' value='{$lang['date_format']}' onfocus='date_focus(this);' onblur='date_blur(this);' />
<a href='javascript:calendrier("date_debut");'><img src='../img/calendrier.gif' border='0' alt='{$lang['debut']}' id='date_debut_img' /></a>
</td>
<td>
Fin <input type='text' style='width:150px;' name='date_fin' value='{$lang['date_format']}' onfocus='date_focus(this);' onblur='date_blur(this);' />
<a href='javascript:calendrier("date_fin");'><img src='../img/calendrier.gif' border='0' alt='{$lang['fin']}' id='date_fin_img' /></a>
</td>
</tr>
<tr id='tr_horaires' style='display:none'><td>&nbsp;</td>
<td>
Horaires
</td><td>
De 
<select name='debut'>
<option value=''>&nbsp;</option>
EOD;

for($i=9;$i<23;$i++)
	echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
A 
<select name='fin'>
<option value=''>&nbsp;</option>
<?php
for($i=9;$i<23;$i++)
	echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
</td>
</tr>


<tr id='tr_periodicite' style='display:none;'><td>&nbsp;</td>
<td>Périodicité</td>
<td>
<select name='periodicite'>
<option value=''>&nbsp;</option>
<option value='Quotidienne'>Quotidienne</option>
<option value='Hebdomadaire'>Hebdomadaire</option>
<option value='Mensuelle'>Mensuelle</option>
</select>
</td></tr>

<tr id='tr_jours' style='display:none;'><td>&nbsp;</td>
<td id='td_jours' colspan='2'>Jours
&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Lundi'/>Lundi&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Mardi'/>Mardi&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Mercredi'/>Mercredi&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Jeudi'/>Jeudi&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Vendredi'/>Vendredi&nbsp;&nbsp;
<input type='checkbox' name='jours[]' value='Samedi'/>Samedi
</td></tr>
-->

<?php
echo <<<EOD
<tr>
<td colspan='3'><br/><b>{$lang['organisateur']}</b></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['programme']} *</font></td>
<td colspan='2'>
<select name='organisateur_etablissement' style='width:504px;' onchange='verif_etablissement();'>
<option value=''>&nbsp;</option>
EOD;

foreach($prg_list as $elem)
	echo "<option value='$elem'>$elem</option>\n";

echo <<<EOD
<option style='color:red;' value='Autre'>{$lang['autre']}</option>
</select>

<div style='display:none' id='etablissement_autre'>
<input type='text' style='width:460px;' name='organisateur_etablissement_autre'/> <a href='javascript:liste_etablissement();'>{$lang['liste']}</a>
</div>
</td>
</tr>

<tr>
<td><font class='marge1'>{$lang['responsable']} *</font></td>
<td colspan='2'><input type='text' name='organisateur_nom' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['courriel']} *</font></td>
<td colspan='2'><input type='text' name='organisateur_courriel' maxlength='100' /></td>
</tr>

</table>
</div>
EOD;
?>