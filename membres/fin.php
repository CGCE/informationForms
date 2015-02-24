<?php
session_start();
include "../include/lang_FR.php";
if($_SESSION['lang']=="en")
	include "../include/lang_EN.php";

echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Reid Hall, {$lang['titre']}</title>
<link rel='shortcut icon' type='image/x-icon' href='http://www.reidhall.com/informations/img/favicon.ico' /> 
<link rel='stylesheet' type='text/css' href= 'style.css' media='all' />
</head>
<body>

<table style='width:90%;'>
<tr style='vertical-align:middle;'><td style='width:680px;'>
<div id='entete'>
<img src='../img/logo.gif' alt='REID HALL Columbia Global Centers | Europe'/>
</div>
</td>

<td>
<div id='entete2'>
<h2>{$lang['titre']}</h2>
</div>
</td></tr></table>
<hr style='width:90%;'/>

<p>
<br/>
{$lang['merci']}
</p>
</body>
</html>
EOD;
?>
