<?php
ini_set('error_reporting','E_ERROR | E_WARNING | E_PARSE');
session_start();
include "../include/lang_FR.php";
$_SESSION['lang']="fr";
if(isset($_GET['en']))
	{
	include "../include/lang_EN.php";
	$_SESSION['lang']="en";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php 
echo "<title>Reid Hall, {$lang['titre']} {$lang['membres']}</title>\n";
echo "<script type='text/JavaScript'>var date_format=\"{$lang['date_format']}\";</script>\n";
?>
<link rel='shortcut icon' type='image/x-icon' href='http://www.reidhall.com/informations/img/favicon.ico' /> 
<link rel='stylesheet' type='text/css' href= 'style.css' media='all' />
<script type='text/JavaScript' src='script.js'></script>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>

<body onload='init_form();'>
<form name='form' method='post' action='valid.php' onsubmit='return control_form();'>
<input type='hidden' name='page' />
<center>
<table style='width:90%;'>
<tr style='vertical-align:middle;'><td style='width:50%;'>
<div id='entete'>
<img src='../img/logo.gif' alt='REID HALL Columbia Global Centers | Europe'/>
</div>
</td>

<td>
<div id='entete2'>
<?php 
echo "<h2>{$lang['titre']}<br/>{$lang['membres']}</h2>\n";
echo "<div style='text-align:right;'>\n";
if(isset($_GET['en']))
	echo "<a href='index.php'><img src='../img/drapeau_francais.jpg' alt='Français' border='0'/></a>\n";
else
	echo "<a href='index.php?en'><img src='../img/drapeau_anglais.jpg' alt='English' border='0'/></a>\n";
?>
</div>
</div>
</td></tr></table>

<hr/>

<?php
include "page1.php";
echo "<br/><hr/>\n";
include "page2.php";
echo "<br/><hr/>\n";
include "page3.php";
?>

</center>
<br/>
<?php echo "* {$lang['obligatoire']}\n"; ?>
<br/>
<br/>
<?php echo "<input type='submit' value='{$lang['valider']}' name='valider' />\n"; ?>

</form>
<iframe id='calendrier' src="#" />

</body>
</html>	
