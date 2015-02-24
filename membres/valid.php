<?php
include "../include/db.php";
include "../include/fonctions.php";

$table='reservations';
$fields=Array();
$values=Array();

$saisie=date("Y-m-d H:i:s");
$ip=getenv("REMOTE_ADDR");	
	
if($_POST['organisateur_etablissement']=="Autre")
	$_POST['organisateur_etablissement']=$_POST['organisateur_etablissement_autre'];
	
if(is_array($_POST))
	{
	$keys=array_keys($_POST);
	foreach($keys as $elem)	
		{
		if($_POST[$elem])
			{
			if(!in_array($elem,array("page","valider","organisateur_etablissement_autre")))
				{
				//echo $elem."<br/>";
				$fields[]=$elem;
				if(in_array($elem,array("date1","date2","date3","date4","date5","date6")))
					$_POST[$elem]=dateSQL($_POST[$elem]);
				if(is_array($_POST[$elem]))
					$_POST[$elem]=serialize($_POST[$elem]);
				$values[]=trim(addslashes($_POST[$elem]));
				}
			}
		}
	$fields[]="date_saisie";
	$fields[]="IP_Client";
	$fields[]="membre";
	$values[]=$saisie;
	$values[]=$ip;
	$values[]="1";
	$fields="(`".join($fields,"`,`")."`)";
	$values="('".join($values,"','")."')";
	$sql="INSERT INTO `$table` $fields VALUES $values ;";
	
	$mail=$_POST['organisateur_courriel'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Fiche d'informations</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>
<body>
<?php
$db=new db();
$db->query($sql);

$db=new db();
$db->query("SELECT max( id ) AS max FROM reservations"); $id=$db->result[0]['max'];

$message="Une nouvelle information a été enregistrée.<br/>Vous pouvez la consulter dans l'application \"Informations\" de l'intranet."; $message.="<br/><br/><a href='http://intranet.reidhall.com/Informations/index.php?page=fiche.php&id=$id' target='_blank'> http://intranet.reidhall.com/Informations/index.php?page=fiche.php&id=$id</a>";

$msg=mail_confirm($saisie,$mail);

// if(in_array($ip,array("88.184.20.15","62.193.34.10")))				// test à la maison, Jérôme
if(in_array($ip,array("88.184.20.15")))				// test à la maison, Jérôme
	sendmail("Reid Hall informations",$message,"jc4069@columbia.edu");
else
	sendmail("Reid Hall informations",$message,"jc4069@columbia.edu;mb2012@columbia.edu;eis2106@columbia.edu;sm2853@columbia.edu");

sendmail("Reid Hall Informations",$msg,$mail);

// sendmail("Confirmation de votre réservation",$msg,$mail);

?>
<script type='text/Javascript'>
<!--
window.document.location.href='fin.php';
-->
</script>
</body>
</html>
