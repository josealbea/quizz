<?php
class Quizz
{	
	public function getImageUrl($fileName = null){
		if($fileName){
			return PUBLIC_ROOT.'images/'.$fileName;	
		}else{
			return PUBLIC_ROOT.'images/';
		}		
	}

	public function getJsUrl($fileName = null){
		if($fileName){
			return PUBLIC_ROOT.'js/'.$fileName;	
		}else{
			return PUBLIC_ROOT.'js/';
		}		
	}
}