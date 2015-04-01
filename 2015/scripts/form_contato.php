<?php
	header('Content-Type: text/html; charset=utf-8');

	$mensagemHTML = "Nome: ".$_POST['nome_contato']."<br>";
	$mensagemHTML .= "E-mail: ".$_POST['email_contato']."<br>";
	$mensagemHTML .= "Tel.: ".$_POST['tel_contato']."<br>";
	$mensagemHTML .= "Assunto: ".$_POST['assunto_contato']."<br>";
	$mensagemHTML .= "Mensagem: ".$_POST['mensagem_contato'];
	$headers = "MIME-Version: 1.1\n";
	$headers .= "From: Contato FLISoL Pelotas <contato@flisolpelotas.com.br>\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "Reply-To: contato@flisolpelotas.com.br\n";
	if(!mail("contato@flisolpelotas.com.br", "Contato - FLISoL Pelotas - ".$_POST['assunto_contato'], $mensagemHTML, $headers ,"-r"."contato@flisolpelotas.com.br")){ // Se for Postfix
	    $headers .= "Return-Path: " . "contato@flisolpelotas.com.br" . "\n"; // Se "não for Postfix"
	    mail("contato@flisolpelotas.com.br", "Contato - FLISoL Pelotas - ".$_POST['assunto_contato'], $mensagemHTML, $headers );
	}

	$mensagemHTML = "Ol&aacute;, recebemos seu contato efetuado pelo nosso site, analisaremos seu contato e retornaremos o mais breve poss&iacute;vel.<br><br> Contato Recebido:<br><br>".$mensagemHTML."<br><br> --<br>Att,<br>FLISoL Pelotas<br> E-mail: contato@flisolpelotas.com.br<br><br>Venha para o FLISoL Pelotas - http://www.flisolpelotas.com.br";

	if(!mail($_POST['email_contato'], "Contato - FLISoL Pelotas - ".$_POST['assunto_contato'], $mensagemHTML, $headers ,"-r"."contato@flisolpelotas.com.br")){ // Se for Postfix
	    $headers .= "Return-Path: " . $_POST['email_contato'] . "\n"; // Se "não for Postfix"
	    mail($_POST['email_contato'], "Contato - FLISoL Pelotas - ".$_POST['assunto_contato'], $mensagemHTML, $headers );
	}


	header("Location: ../");