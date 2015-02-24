<?php

class CJForm{

	public $lang=array();
	public $langCode="en";
	
	public function setLanguage($lang){
//		$this->lang=$GLOBALS['lang'][$lang];
		$this->lang=$GLOBALS['lang'];
		$this->langCode=strtolower($lang);
	}

	public function inputText($id,$required=false){
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;
		
		echo "<tr><td><label for='$id'>$strong1{$this->lang[$id]}$star$strong2</label></td>\n";
		echo "<td><input type='text' name='$id' id='$id' class='$classRequired' /></td></tr>\n";
	}
	
	public function inputDates($id,$required=false,$hours=false,$multiple=false){
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;
		
		echo "<tr><td><label for='{$id}_date_0'>$strong1{$this->lang[$id]}$star$strong2</label></td>\n";
		echo "<td><input type='text' name='{$id}_date[]' id='{$id}_date_0' class='CJDatePicker $classRequired'/>\n";
		
		if($hours){
			echo "&nbsp;{$this->lang['heure1']}&nbsp;\n";
			echo "<select name='{$id}_hour1[]' id='{$id}_hour1_0' class='$classRequired' >\n";
			echo "<option value=''>&nbsp;</option>";
			if($this->langCode=="en"){
				for($i=8;$i<13;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
				}
				for($i=13;$i<22;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
				}
			}else{
				for($i=8;$i<22;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
				}
			}
			echo "</select>\n";
			echo "&nbsp;{$this->lang['heure2']}&nbsp;\n";
			echo "<select name='{$id}_fin[]' id='{$id}_fin_0' class='$classRequired' >\n";
			echo "<option value=''>&nbsp;</option>\n";
			if($this->langCode=="en"){
				for($i=8;$i<13;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
				}
				for($i=13;$i<22;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
				}
			}else{
				for($i=8;$i<22;$i++){
					echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
				}
			}
			echo "</select>\n";
		}
		
		if($multiple){
			echo "<img src='../img/add.gif' class='CJFormAddDate' style='cursor:pointer;' alt='{$this->lang['ajouter']}' />\n";
		}
		echo "</td></tr>\n";
	}

	public function selectHours($id,$required=false,$multiple=false){
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;
		
		echo "<tr><td><label for='{$id}_hours_0'>$strong1{$this->lang[$id]}$star$strong2</label></td>\n";
		echo "<td>";
		
		echo "{$this->lang['heure1']}&nbsp;\n";
		echo "<select name='{$id}_hour1[]' id='{$id}_hour1_0' class='$classRequired' style='width:150px;'>\n";
		echo "<option value=''>&nbsp;</option>";
		if($this->langCode=="en"){
			for($i=8;$i<13;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
			}
			for($i=13;$i<22;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
			}
		}else{
			for($i=8;$i<22;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
			}
		}
		echo "</select>\n";
		echo "&nbsp;{$this->lang['heure2']}&nbsp;\n";
		echo "<select name='{$id}_fin[]' id='{$id}_fin_0' class='$classRequired' style='width:150px;' >\n";
		echo "<option value=''>&nbsp;</option>\n";
		if($this->langCode=="en"){
			for($i=8;$i<13;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00 AM</option>\n";
			}
			for($i=13;$i<22;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i-12).":00 PM</option>\n";
			}
		}else{
			for($i=8;$i<22;$i++){
				echo "<option value='".sprintf("%02d",$i).":00:00'>".sprintf("%02d",$i).":00</option>\n";
			}
		}
		echo "</select>\n";
		
		if($multiple){
			echo "<img src='../img/add.gif' class='CJFormAddHours' style='cursor:pointer;' alt='{$this->lang['ajouter']}' />\n";
		}
		echo "</td></tr>\n";
	}
	
	public function separator(){
		echo "<tr><td colspan='3'><hr/></td></tr>\n";
	}
	
	public function h($id,$level=2){
		echo "<tr><td colspan='3'><h$level>{$this->lang[$id]}</h$level></td></tr>\n";
	}
	
	public function p($id){
		echo "<tr><td colspan='3'><p>{$this->lang[$id]}</p></td></tr>\n";
	}
	
	public function select($id,$options,$required=false){
		$lang=$this->lang;
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;

		if(!is_array($options)){
			$options=explode(",",$options);
		}
		
		echo "<tr><td><label for='$id'>$strong1{$lang[$id]}$star$strong2</label></td>\n";
		echo "<td><select name='$id' id='$id'>\n";
		echo "<option value=''>&nbsp;</option>\n";
		foreach($options as $option){
			echo "<option value='$option'>{$lang[$option]}</option>\n";
		}
		echo "</select></td></tr>\n";
		
		echo "<tr id='tr_other_{$id}' style='display:none;'><td><label for='other_{$id}'>$strong1{$this->lang['autre']}$star$strong2</label></td>\n";
		echo "<td><input type='text' name='other_{$id}' id='other_{$id}' class='$classRequired' /></td></tr>\n";
	}
	
	public function radio($id,$options,$required=false,$colpsan=1){
		$lang=$this->lang;
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;

		if(!is_array($options)){
			$options=explode(",",$options);
		}
		
		echo "<tr><td colspan='$colpsan'>$strong1{$lang[$id]}$star$strong2</td>\n";
		if($colpsan>1){
			echo "</tr><tr><td>&nbsp;</td>\n";
		}
		echo "<td>\n";
		
		$i=0;
		foreach($options as $option){
			echo "<input type='radio' id='{$id}_$i' name='{$id}' value='$option' class='$classRequired' />\n";
			echo "<label for='{$id}_$i'>{$lang[$option]}</label>\n";
			$i++;
		}
		
		echo "</td></tr>\n";
	}
	
	public function checkbox($id,$options,$required=false,$colpsan=1){
		$lang=$this->lang;
		$strong1=$required?"<strong>":null;
		$strong2=$required?"</strong>":null;
		$star=$required?"&nbsp;<sup>*</sup>":null;
		$classRequired=$required?"required":null;

		if(!is_array($options)){
			$options=explode(",",$options);
		}
		
		if(is_array($options[0])){
			echo "<tr><td colspan='$colpsan'>$strong1{$lang[$id]}$star$strong2</td>\n";
			if($colpsan>1){
				echo "</tr><tr><td>&nbsp;</td>\n";
			}
			echo "<td>\n";
		
			$i=0;
			foreach($options as $options2){
				foreach($options2 as $option){
					echo "<br/><input type='checkbox' id='{$id}_$i' name='{$id}[]' value='$option' class='$classRequired' />\n";
					echo "<label for='{$id}_$i'>{$lang[$option]}</label>\n";
					$i++;
				}
				echo "</td><td>\n";		// Remplacer par des div inline-block
			}
		}
		
		echo "</td></tr>\n";
	}

}


?>