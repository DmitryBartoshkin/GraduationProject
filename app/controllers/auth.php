<?php

class AuthController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function loginAction(){
		if ($this->session->isLoggedIn()) {
			Controller::url('proFileStaff');
		}

		$this->view->msg = "";
		$this->view->login = isset($_POST['login']) ? trim($_POST['login']) : '';
		$this->view->password = isset($_POST['password']) ? trim($_POST['password']) : '';

		if (!empty($_POST)) {
			if ($this->session->login($this->view->login, $this->view->password)) {
				Controller::url('proFileStaff');
			} else {
				$this->view->msg = 'Ошибка входа в систему';
			}
		}
	}

	public function indexAction() {
		$this->view->generatePartial('authView');
	}

	public function logoutAction(){
		$this->session->logout();
		$this->redirect(APP_BASE_URL);
	}
}