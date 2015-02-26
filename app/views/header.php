<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php $this->title ?></title>
	<link rel="stylesheet" type="text/css" href="/css/style.css"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Сайт компании</a>
			<ul class="nav navbar-nav navbar-right">
				<?php
				if ( !empty($this->session->getName()) ) {
					echo '<li class="active"><a href="#">' . $this->session->getName() . '</a></li>';
					echo '<li><a href="' . Controller::url( 'logout' ) . '">Выйти</a></li>';
				}?>
			</ul>
		</div>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li>
				<a href="<?php Controller::url( 'user' ) ?>">Персонал</a>
			</li>
			<li>
				<a href="<?php Controller::url( 'client' ) ?>">Клиенты</a>
			</li>
			<li>
				<a href="<?php Controller::url( 'material' ) ?>">Материалы</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
