<?php
	include("../bootstrap.php");
	header('Content-Type: text/html; charset=utf-8');

	$dados['nome'] = $_POST['nome_inscricao'];
	$dados['email'] = $_POST['email_inscricao'];
	$dados['tel'] = $_POST['tel_inscricao'];
	$dados['instituicao'] = $_POST['instituicao_inscricao'];

	inserir("inscritos", $dados);

	$headers = "MIME-Version: 1.1\n";
	$headers .= "From: Iscrição FLISoL Pelotas <contato@flisolpelotas.com.br>\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "Reply-To: contato@flisolpelotas.com.br\n";

	$mensagemHTML = "Ol&aacute; ".$_POST['nome_inscricao'].", sua inscrição para o FLISoL Pelotas 2015 foi efetuada com sucesso!<br>Data: Dia 25 de Abril<br>Hor&aacute;rio: 09h às 17h<br>Local: Local: Campus Anglo/Porto, Universidade Federal de Pelotas (UFPel) - Rua Gomes Carneiro, 1, 4º Andar - Porto - CEP 96010-610<br><br>Contamos com sua contribuição de 2Kg de Alimentos não perecíveis a serem entregues no dia e local do evento.<br><Obrigado!<br><br> --<br>Att,<br>FLISoL Pelotas<br>Site: http://flisolpelotas.com.br E-mail: contato@flisolpelotas.com.br";

	if(!mail($_POST['email_inscricao'], "Inscrição - FLISoL Pelotas", $mensagemHTML, $headers ,"-r"."contato@flisolpelotas.com.br")){ // Se for Postfix
	    $headers .= "Return-Path: " . $_POST['email_chamada_trabalhos'] . "\n"; // Se "não for Postfix"
	    mail($_POST['email_inscricao'], "Inscrição - FLISoL Pelotas", $mensagemHTML, $headers );
	}

	header("Location: ../");