<?php

class AuthController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function logoutAction(){
		$this->session->logout();
		$this->redirect(APP_BASE_URL);
	}

	public function indexAction(){
		if (!empty($_GET['route']) == 'logout'){
			$this->logoutAction();
		}

		if ($this->session->isLoggedIn()) {
			$this->view->generate('proFileStaffView');
			die;
		}

		$this->view->msg = "";
		$this->view->login = isset($_POST['login']) ? trim($_POST['login']) : '';
		$this->view->password = isset($_POST['password']) ? trim(sha1(md5($_POST['password']))) : '';

		if (!empty($_POST)) {
			if ($this->session->login($this->view->login, $this->view->password)) {
				$this->view->generate('proFileStaffView');
				die;
			} else {
				$this->view->msg = 'Ошибка входа в систему. Неверный логин или пароль!';
			}
		}

		$this->view->generatePartial('authView');
	}
}