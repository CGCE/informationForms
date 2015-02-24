function init_form()
	{
	if(!document.form.elements["date1"])
		return false;
	for(i=1;i<7;i++)
		{
		if(document.form.elements["date"+i].value==date_format)
			document.form.elements["date"+i].style.color="grey";
		}
	}

function add_date()
	{
	if(document.getElementById("tr_date5").style.display=="")
		document.getElementById("tr_add_date").style.display="none";
	for(i=2;i<7;i++)
		{
		elem=document.getElementById("tr_date"+i);
		if(elem.style.display=="none")
			{
			elem.style.display="";
			return;
			}
		}
	}

function envoi(sens)
	{
	if(!document.form.page)
		return false;
	if(document.form.page.value)
		{
		page=document.form.page.value;
		if(!control_form(parseInt(page)))
			return false;
		}
	else
		page=1;
	
	if(sens=="-1")
		page--;
	else if(sens=="+1")
		page++;
	
	document.form.page.value=page;
	
	switch(parseInt(page)) {
		case 1 :  
			document.form.precedent.style.display="none";
			document.form.suivant.style.display="";
			document.form.valider.style.display="none";
			document.form.valider.disabled="disabled";
			document.getElementById('page1').style.display="block";
			document.getElementById('page2').style.display="none";
			document.getElementById('page3').style.display="none";
			document.getElementById('p1').style.display="block";
			document.getElementById('p2').style.display="none";
			document.getElementById('p3').style.display="none";
			break;
		case 2 :  
			document.form.precedent.style.display="";
			document.form.suivant.style.display="";
			document.form.valider.style.display="none";
			document.form.valider.disabled="disabled";
			document.getElementById('page1').style.display="none";
			document.getElementById('page2').style.display="block";
			document.getElementById('page3').style.display="none";
			document.getElementById('p1').style.display="none";
			document.getElementById('p2').style.display="block";
			document.getElementById('p3').style.display="none";
			break;
		case 3 :  
			document.form.precedent.style.display="";
			document.form.suivant.style.display="none";
			document.form.valider.style.display="";
			document.form.valider.disabled="";
			document.getElementById('page1').style.display="none";
			document.getElementById('page2').style.display="none";
			document.getElementById('page3').style.display="block";
			document.getElementById('p1').style.display="none";
			document.getElementById('p2').style.display="none";
			document.getElementById('p3').style.display="block";
			break;
		}
	scroll(0,0);
	}

function date_focus(elem)
	{
	elem.style.color="black";
	if(elem.value==date_format)
		elem.value=null;
	}
	
function date_blur(elem)
	{
	if(!elem.value)
		{
		elem.value=date_format;
		elem.style.color="grey";
		}
	else
		{
		if(!ctrl_date(elem))
			alert("Date invalide");
		else
			elem.value=ctrl_date(elem).value;
		}
	}
	
function ctrl_date(date)
	{
	var regexp = /\b(?:(?:[0-9]{1,2}?)\/){2}(?:20[0-9]{2}|[0-9]{2}?)\b/ ;
	if (!date.value.match(regexp))
		return false;
	tmp=date.value.split("/");
	if(tmp[0]>31)
		return false;
	if(tmp[1]>12)
		return false;
	if(tmp[0].length==1)
			tmp[0]="0"+tmp[0];
	if(tmp[1].length==1)
			tmp[1]="0"+tmp[1];
	if(tmp[2].length==2)
			tmp[2]="20"+tmp[2];
	date.value=tmp.join("/");
	return date;
	}

function isValidDate(d)
	{
	var dateRegEx = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
	return d.match(dateRegEx);
	} 

	
function ctrl_mail(mail)
	{
	var regexp = /\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b/ ;
	if (!mail.match(regexp))
		return false;
	else
		return true;
	}
	
function calendrier(elem)
	{
	tab=getPosition(elem+"_img");
	document.getElementById("calendrier").src="calendrier/index.php?champ="+elem;
	document.getElementById("calendrier").style.left=tab[0]+"px";
	document.getElementById("calendrier").style.top=tab[1]+"px";
	document.getElementById("calendrier").style.display="block";
	}
	
function getPosition(element)
	{
	var left = 0;
	var top = 0;
	/*On récupère l'élément*/
	var e = document.getElementById(element);
	/*Tant que l'on a un élément parent*/
	while (e.offsetParent != undefined && e.offsetParent != null)
		{
		/*On ajoute la position de l'élément parent*/
		left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
		top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
		e = e.offsetParent;
		}
	return new Array(left,top);
	}
	
function control_form(page)
	{
	erreur=false;
	message="Les champs suivants sont obligatoires :\n";
	
	for(i=0;i<document.form.elements.length;i++)
		document.form.elements[i].style.background="";
	document.getElementById("div_type").style.background="";
	document.getElementById("div_type2").style.background="";
	document.getElementById("div_public").style.background="";
	document.getElementById("div_public2").style.background="";
//	document.getElementById("div_traiteur").style.background="";
	document.getElementById("div_disposition").style.background="";

	switch(parseInt(page)) {
		case 1 :  
			if(document.form.titre.value=="")
				{
				erreur=true;
				message=message.concat("- Titre de l'événement\n");
				document.form.titre.style.background='yellow';
				}
			if(document.form.date1.value=="" | document.form.date1.value==date_format | document.form.debut1.value=="" | document.form.fin1.value=="")
				{
				erreur=true;
				message=message.concat("- Date et horaires souhaités\n");
				if(document.form.date1.value=="" | document.form.date1.value==date_format)
					document.form.date1.style.background='yellow';
				if(document.form.debut1.value=="")
					document.form.debut1.style.background='yellow';
				if(document.form.fin1.value=="")
					document.form.fin1.style.background='yellow';
				}
			else if(!isValidDate(document.form.date1.value))
				{
				erreur=true;
				message=message.concat("- La date saisie n'est pas valide\n");
				}

			if(document.form.organisateur_nom.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de l'organisateur\n");
				document.form.organisateur_nom.style.background='yellow';
				}
			if(document.form.organisateur_etablissement.value=="")
				{
				erreur=true;
				message=message.concat("- Etablissement de l'oganisateur\n");
				document.form.organisateur_etablissement.style.background='yellow';
				}
			if(document.form.organisateur_courriel.value=="")
				{
				erreur=true;
				message=message.concat("- Courriel de l'organisateur\n");
				document.form.organisateur_courriel.style.background='yellow';
				}
			else if(!ctrl_mail(document.form.organisateur_courriel.value))
				{
				erreur=true;
				message=message.concat("- Courriel de l'organisateur invalide\n");
				document.form.organisateur_courriel.style.background='yellow';
				}
				
				
			if(document.form.note_nom.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de la personne sur place\n");
				document.form.note_nom.style.background='yellow';
				}
			
			if(document.form.note_etablissement.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de la personne sur place\n");
				document.form.note_etablissement.style.background='yellow';
				}
			
			if(document.form.note_adresse.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de la personne sur place\n");
				document.form.note_adresse.style.background='yellow';
				}
			
			if(document.form.note_courriel.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de la personne sur place\n");
				document.form.note_courriel.style.background='yellow';
				}
				
			if(document.form.surplace_nom.value=="")
				{
				erreur=true;
				message=message.concat("- Nom de la personne sur place\n");
				document.form.surplace_nom.style.background='yellow';
				}
			if(document.form.surplace_telephone_mobile.value=="")
				{
				erreur=true;
				message=message.concat("- Téléphone mobile de la personne sur place\n");
				document.form.surplace_telephone_mobile.style.background='yellow';
				}
			break;
			
		case 2 :
			checked=false;						//	Type d'événement
			elem=document.form.elements['type'];
			for(i=0;i<elem.length;i++)
				if(elem[i].checked)
					checked=true;
			if(!checked)
				{
				erreur=true;
				message=message.concat("- Type d'événement\n");
				document.getElementById("div_type").style.background='yellow';
				document.getElementById("div_type2").style.background='yellow';
				}
			
			public_err=false;					// Public attendu
			checked=false;
			elem=document.form.elements['public[]'];
			for(i=0;i<4;i++)
				if(elem[i].checked)
					checked=true;
			if(!checked)
				{
				document.getElementById("div_public").style.background='yellow';
				public_err=true;
				}
			checked=false;
			for(i=4;i<8;i++)
				if(elem[i].checked)
					checked=true;
			if(!checked)
				{
				document.getElementById("div_public2").style.background='yellow';
				public_err=true;
				}
			if(public_err)
				{
				erreur=true;
				message=message.concat("- Public attendu\n");
				}
				
			if(document.form.intervenants.value=="")			// Intervenants
				{
				erreur=true;
				message=message.concat("- Nombre d'intervenants\n");
				document.form.intervenants.style.background='yellow';
				}
			if(document.form.personnes.value=="")			// Personnes
				{
				erreur=true;
				message=message.concat("- Nombre de personnes\n");
				document.form.personnes.style.background='yellow';
				}
			
/*			checked=false;						//	Traiteur
			elem=document.form.elements['traiteur'];
			for(i=0;i<elem.length;i++)
				if(elem[i].checked)
					checked=true;
			if(!checked)
				{
				erreur=true;
				message=message.concat("- Traiteur\n");
				document.getElementById("div_traiteur").style.background='yellow';
				}
*/
			break;
					
		case 3 :
			checked=false;						//	Disposition
			elem=document.form.elements['disposition'];
			for(i=0;i<elem.length;i++)
				if(elem[i].checked)
					checked=true;
			if(!checked)
				{
				erreur=true;
				message=message.concat("- Disposition de la salle\n");
				document.getElementById("div_disposition").style.background='yellow';
				}
			break;

		}
		
	if(erreur)
		{
		// alert(message);
		alert(msg_obligatoire);
		return false;
		}
	return true;
	}
	
function suppression(id)
	{
	res=confirm("Etes-vous sûr(e) des vouloir supprimer cette fiche ?");
	if(res)
		{
		db=file("suppression.php?id="+id);
		document.location.reload(false);
		}
	}
	
//		---------------------		AJAX		------------------------------------------//
function file(fichier)
	{
	if(fichier.indexOf("php?")>0)		// l'ajout du parametre unique ms (nombre de millisecondes depuis le 1er Janvier 1970)
		fichier=fichier+"&ms="+new Date().getTime();	// permet d'eviter les problème de cache (le navigateur pense ouvrir une nouvelle page)	
	else if(fichier.indexOf("php")>0)
		fichier=fichier+"?ms="+new Date().getTime();
	
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);	
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }
