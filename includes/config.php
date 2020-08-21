<?php
	session_start();
	// Configuration
	$config = array(
		'title' => 'Andrew Vozniak',
		'description' => 'Your future depends only on you',
		'db' => array(
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'db_name' => 'myblog'),
		'about' => 'Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.',
		'twitter' => 'nothing',
		'facebook' => 'nothing',
		'instagram' => 'nothing',
		'linkedin' => 'nothing',
		'reddit' => 'nothing',
		'email' => 'mothing',
		'login_error_msg' => 'Пользователь не существеут или пароль неверно введен!',
		'signup_error_msg' => 'Логин/Email - уже занят или email не верно вказан',
		'signup_suc_msg' => 'Регистрация прошла успешно!',
	);
	
	//DataBase
	$connection = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['db_name']);



	if ($connection == false) {
		echo "<h1>DataBase connection error</h1>";
		echo mysqli_connect_error();
		exit();
	}

	mysqli_set_charset($connection, "utf8");
?>
