<?php
class View {

	public function __construct(){
		ob_start();
	}

	/**
	 * @param $name имя шаблона, который нужно отобразить ( отображается вместе с заголовком и подвалом)
	 */
	public function generate($name, array $data = array()){
		include APP_BASE_PATH.'/app/views/header.php';
		$this->generatePartial($name, $data);
		include APP_BASE_PATH.'/app/views/footer.php';
	}

	/**
	 * @param $name имя шаблона, который нужно отобразить. Отображается только шаблон
	 */
	public function generatePartial($name, array $data = array()){
		if (!empty($data)){
			extract($data);
		}
		require(APP_BASE_PATH.'/app/views/' . $name . '.php');
	}

	public function __get($name){
		return "";
	}
}