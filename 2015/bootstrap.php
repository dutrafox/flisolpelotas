<?php
	session_start();

	require('scripts/banco.php');

	$config = array( 
		'host'  => '', 
		'banco' => '', 
		'usuario'  => '', 
		'senha' => ''
	);

	conectar();