<?php
class Quizz extends Model
{	
	public function getImageUrl($fileName = null){
		if($fileName){
			return WEBROOT.'skin/images/'.$fileName;	
		}else{
			return WEBROOT.'skin/images/';
		}		
	}

	public function getJsUrl($fileName = null){
		if($fileName){
			return WEBROOT.'skin/js/'.$fileName;	
		}else{
			return WEBROOT.'skin/js/';
		}		
	}
}