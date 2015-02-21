<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php $this->title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= Controller::url('css', 'style.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?= Controller::url('css', 'normalize.css') ?>"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.css" rel="stylesheet">
</head>
<body>
<form class="form-horizontal col-md-12" method="post">
	<fieldset>
		<legend>Вход в систему</legend>
		<div class="form-group">
			<label class="col-md-4 control-label" for="login">Логин</label>

			<div class="col-md-4">
				<input id="login" name="login" type="text" class="form-control input-md" required="true">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for="password">Пароль</label>

			<div class="col-md-4">
				<input id="password" name="password" type="password" class="form-control input-md" required="true">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>

			<div class="col-md-4">
				<button id="" name="" class="btn btn-default">Войти</button>
			</div>
		</div>

		<?php if ($this->msg) { ?>
			<div class="form-group">
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<?= $this->msg ?>
				</div>
			</div>
		<?php } ?>

	</fieldset>
</form>
</body>
</html>
