<?php

function sendmail($Sujet,$Message,$destinataires)
        {
        $destinataires=explode(";",$destinataires);
        if($destinataires[0])
                {
                $Entete="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
                $Entete.="<html><head><title>Columbia Global Centers | Europe, Informations</title></head><body>";
                $Message=$Entete.$Message;
                $Message.="</body></html>";

                $Sujet = stripslashes($Sujet);
                $Message = stripslashes($Message);
                $Message= eregi_replace("\n|\r\n\n|\r\n", "<br/>", $Message) ;

                foreach($destinataires as $destinataire)
                        {
                        mail2($destinataire,$Sujet,$Message);
                        }
                }
        }

function mail2($To,$Sujet,$Message)
        {
        require_once("phpmailer/class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->IsHTML();
        $mail->AddAddress($To);
        $mail->Subject = $Sujet;
        $mail->Body = "$Message";
        $mail->WordWrap = 50;
        $mail->CharSet="utf-8";
        $mail->Send();
        }
		
		
function dateSQL($date)
	{
	$tab=explode("/",$date);
	return $tab[2]."-".$tab[1]."-".$tab[0];
	}

function dateFR($date)
	{
	$tab=explode("-",$date);
	return $tab[2]."/".$tab[1]."/".$tab[0];
	}

function mail_confirm($date,$mail)
	{
	require_once("db.php");
	require_once("fiche.php");
	$db=new db();
	$db->query("SELECT * FROM `reservations` WHERE `date_saisie`='$date' AND `organisateur_courriel`='$mail';");
	$style="<style type='text/css'>
		body {
			font-family: times;
			font-size:10pt;
			width:750px;
			}
		h1 {
			font-size:16pt;
			}
		h2 {
			text-align:center;
			font-size:12pt;
			}
		table
			{
			width:750px;
			}
		tr {
			vertical-align:top;
			}
		td {
			width:250px;
			text-align:left;
			}
		#entete{
			text-align:center;
			color:grey;
			}
		#entete2 {
			color:grey;
			}
		.marge1 {
			margin-left:30px;
			}
		.result {
			font-weight:bold;
			color:#000;
			}
		</style>";
	$style=eregi_replace("\n|\r\n\n|\r\n", "", $style) ;
	if($db->result[0]['membre'])
		$fiche=eregi_replace("\n|\r\n\n|\r\n", "", fiche_membre($db->result)) ;
	else
		$fiche=eregi_replace("\n|\r\n\n|\r\n", "", fiche($db->result)) ;
	
	$entete="<div id='entete'><img src='http://www.reidhall.com/informations/img/logo.gif' alt='Columbia Global Centers | Europe' />";
//	<h1>REID HALL</h1>4 rue de Chevreuse 75006 Paris | France";
	$entete.="<br/><br/><h1>Les informations saisies ont bien été enregistrées.</h1></div><hr/>";
	return $style.$entete.$fiche;
	}

function auth_cas()
	{
	// phpinfo();
	// include "../include/CAS-1.2.1/CAS.php";
	// print_r($_SESSION);
	// include "../include/CAS-1.0.1-patch/CAS.php";
	include "../include/CAS-1.0.1/CAS.php";
	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_2_0, "intranet.reidhall.com", 8443, "/cas",false);
	phpCAS::setExtraCurlOption(CURLOPT_SSLVERSION,3);
	phpCAS::setCasServerCACert("../include/cacert.pem");
	// phpCAS::setNoCasServerValidation();
	phpCAS::forceAuthentication();
	$_SESSION['uid']=phpCAS::getUser();
	}

?>
