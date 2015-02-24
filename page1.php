<?php
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
	<a href='javascript:calendrier("date$j");'><img src='img/calendrier.gif' border='0' alt='date$j' id='date{$j}_img' /></a>
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
?>
<tr id='tr_add_date'><td>&nbsp;</td>
<td>
<img src='img/add.gif' onclick='add_date();' style='cursor:pointer;' alt='Ajouter' /></td>
</tr>
<!--
<td>
<input type='text' style='width:150px;' name='date1' value='JJ/MM/AAAA' onfocus='date_focus(this);' onblur='date_blur(this);' />
<a href='javascript:calendrier("date1");' name='test'><img src='img/calendrier.gif' border='0' alt='date1' id="date1_img" /></a>
</td>
<td>
De
<select name='debut1'>
<option value=''>&nbsp;</option>
<?php
for($i=8;$i<22;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
&nbsp;à&nbsp;
<select name='fin1'>
<option value=''>&nbsp;</option>
<?php
for($i=9;$i<23;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
</td>
</tr>

<tr><td>&nbsp;</td>
<td>
<input type='text' style='width:150px;' name='date2' value='JJ/MM/AAAA' onfocus='date_focus(this);' onblur='date_blur(this);' />
<a href='javascript:calendrier("date2");'><img src='img/calendrier.gif' border='0' alt='date2' id='date2_img' /></a>
</td>
<td>
De
<select name='debut2'>
<option value=''>&nbsp;</option>
<?php
for($i=8;$i<22;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
&nbsp;à&nbsp;
<select name='fin2'>
<option value=''>&nbsp;</option>
<?php
for($i=9;$i<23;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
</td>
</tr>

<tr><td>&nbsp;</td>
<td>
<input type='text' style='width:150px;' name='date3' value='JJ/MM/AAAA' onfocus='date_focus(this);' onblur='date_blur(this);' />
<a href='javascript:calendrier("date3");'><img src='img/calendrier.gif' border='0' alt='date3' id='date3_img' /></a>
</td>
<td>
De
<select name='debut3'>
<option value=''>&nbsp;</option>
<?php
for($i=8;$i<22;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
&nbsp;à&nbsp;
<select name='fin3'>
<option value=''>&nbsp;</option>
<?php
for($i=9;$i<23;$i++)
    echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
?>
</select>
</td>
</tr>
-->
<?php
echo <<<EOD
<tr>
<td colspan='3'><br/><b>{$lang['organisateur']}</b></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['nom']} *</font></td>
<td colspan='2'><input type='text' name='organisateur_nom' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['etablissement']} *</font></td>
<td colspan='2'><input type='text' name='organisateur_etablissement' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['adresse']}</font></td>
<td colspan='2'><textarea name='organisateur_adresse' rows='3' cols='20' ></textarea></td>
</tr>

<!--
<tr>
<td><font class='marge1'>Affiliation</font></td>
<td colspan='2'><input type='text' name='organisateur_affiliation' maxlength='100' /></td>
</tr>
-->

<tr>
<td><font class='marge1'>{$lang['tel']}</font></td>
<td colspan='2'><input type='text' name='organisateur_telephone' maxlength='50' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['mobile']}</font></td>
<td colspan='2'><input type='text' name='organisateur_telephone_mobile' maxlength='50' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['courriel']} *</font></td>
<td colspan='2'><input type='text' name='organisateur_courriel' maxlength='100' /></td>
</tr>

<tr>
<td colspan='3'><br/><b>{$lang['note']}</b></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['nom']} *</font></td>
<td colspan='2'><input type='text' name='note_nom' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['etablissement']} *</font></td>
<td colspan='2'><input type='text' name='note_etablissement' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['adresse']} *</font></td>
<td colspan='2'><textarea name='note_adresse' rows='3' cols='20'></textarea></td>
</tr>
		
<tr>
<td><font class='marge1'>{$lang['tel']}</font></td>
<td colspan='2'><input type='text' name='note_telephone' maxlength='50' /></td>
</tr>

<!--
<tr>
<td><font class='marge1'>{$lang['mobile']}</font></td>
<td colspan='2'><input type='text' name='note_telephone_mobile' maxlength='50' /></td>
</tr>
-->

<tr>
<td><font class='marge1'>{$lang['courriel']} *</font></td>
<td colspan='2'><input type='text' name='note_courriel' maxlength='100' /></td>
</tr>
	

<tr>
<td colspan='3'><br/><b>{$lang['charge']}</b></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['nom']} *</font></td>
<td colspan='2'><input type='text' name='surplace_nom' maxlength='100' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['tel']}</font></td>
<td colspan='2'><input type='text' name='surplace_telephone' maxlength='50' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['mobile']} *</font></td>
<td colspan='2'><input type='text' name='surplace_telephone_mobile' maxlength='50' /></td>
</tr>

<tr>
<td><font class='marge1'>{$lang['courriel']}</font></td>
<td colspan='2'><input type='text' name='surplace_courriel' maxlength='100' /></td>
</tr>

<tr>
<td><br/><b>{$lang['sponsor']}</b></td>
<td colspan='2'><br/><input type='text' name='sponsor' maxlength='100' /></td>
</tr>

</table>
</div>
EOD;
