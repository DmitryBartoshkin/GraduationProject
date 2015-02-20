<?php
class View {

	public function __construct(){
		ob_start();
	}

	static function generate($contentView, $templateView, $data = null){
		if(is_array($data)){
			extract($data);
		}
		include 'app/views/'.$templateView;
	}
}