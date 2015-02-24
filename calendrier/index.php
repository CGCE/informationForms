<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Calendrier</title>
<link rel='StyleSheet' href='calendrier.css' type='text/css' />
<script type="text/JavaScript">
<!--
function returnDate(champ,date)
	{
	tab=date.split("-");
	date=tab[2]+"/"+tab[1]+"/"+tab[0];
	parent.document.form.elements[champ].value=date;
	parent.document.form.elements[champ].style.color="black";
	parent.document.getElementById("calendrier").style.display="none";
	}
-->
</script>
</head>
<body>
<?php
require_once("calendrier.php");

$champ=$_GET['champ'];

Calendrier("calendrier_","calendrier_","valid.php",$champ,false,true,false,"");
?>
<a href='javascript:parent.document.getElementById("calendrier").style.display="none";'>Fermer</a>
</body>
</html>