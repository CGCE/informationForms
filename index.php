<?php
ini_set('error_reporting','E_ERROR | E_WARNING | E_PARSE');
session_start();
include "include/lang_FR.php";
$_SESSION['lang']="fr";
if(isset($_GET['en']))
	{
	include "include/lang_EN.php";
	$_SESSION['lang']="en";
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
echo "<title>Reid Hall, {$lang['titre']}</title>\n";
echo "<script type='text/JavaScript'>var date_format=\"{$lang['date_format']}\"; var msg_obligatoire=\"{$lang['obligatoire']}\";</script>\n";
?>
<link rel='shortcut icon' type='image/x-icon' href='http://www.reidhall.com/informations/img/favicon.ico' /> 
<link rel='stylesheet' type='text/css' href= 'style.css' media='all' />
<script type='text/JavaScript' src='script.js'></script>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>

<body onload='envoi("0");init_form();'>
<center>
<table style='width:90%;'>
<tr style='vertical-align:middle;'><td style='width:50%;'>
<div id='entete'>
<img src='img/logo.gif' alt='REID HALL Columbia Global Centers | Europe'/>
<!--
<h1>REID HALL Columbia Global Centers | Europe</h1>
4 rue de Chevreuse 75006 Paris | France
-->
</div>
</td>

<td>
<div id='entete2'>
<?php
echo "<h2>{$lang['titre']}</h2>\n";
echo "<div style='text-align:right;'>\n";
if(isset($_GET['en']))
	echo "<a href='index.php'><img src='img/drapeau_francais.jpg' alt='Français' border='0'/></a>\n";
else
	echo "<a href='index.php?en'><img src='img/drapeau_anglais.jpg' alt='English' border='0'/></a>\n";
?>
</div>
</div>
</td></tr></table>
<hr style='width:90%;'/>

<form name='form' method='post' action='valid.php' onsubmit='return control_form(3);'>
<input type='hidden' name='page' />

<?php
include "page1.php";
include "page2.php";
include "page3.php";

echo <<<EOD
<br/>
<table>
<tr><td colspan='2'>* {$lang['obligatoire']}</td></tr>
<tr>
<td style='width:500px;'>

<input type='button' value='{$lang['precedent']}' name='precedent' onclick='envoi("-1");' style='display:none'/>
<input type='button' value='{$lang['suivant']}' name='suivant' onclick='envoi("+1");'/>
<input type='submit' value='{$lang['valider']}' name='valider' style='display:none'/>
EOD;
?>
</td>
<td style='text-align:right;'><font id='p1'>Page 1/3</font><font id='p2'>Page 2/3</font><font id='p3'>Page 3/3</font></td>
</tr></table>

</form>
<iframe id='calendrier' src="#" />

</center>
</body>
</html>	
