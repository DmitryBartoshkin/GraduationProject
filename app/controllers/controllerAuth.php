<?php
class ControllerAuth extends Controller {

	function actionIndex(){
		$this->view->generate('authView.php', 'templateView.php');
	}
}