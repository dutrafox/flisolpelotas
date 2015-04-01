<?php
	header('Content-Type: text/html; charset=utf-8');

	$mensagemHTML = "Nome: ".$_POST['nome_chamada_trabalhos']."<br>";
	$mensagemHTML .= "E-mail: ".$_POST['email_chamada_trabalhos']."<br>";
	$mensagemHTML .= "Tel.: ".$_POST['tel_chamada_trabalhos']."<br>";
	$mensagemHTML .= "T&iacute;tulo: ".$_POST['titulo_chamada_trabalhos']."<br>";
	$mensagemHTML .= "Resumo da Palestra: ".$_POST['resumo_chamada_trabalhos']."<br>";
	$mensagemHTML .= "Minicurr&iacute;culo: ".$_POST['minicurriculo_chamada_trabalhos'];
	$headers = "MIME-Version: 1.1\n";
	$headers .= "From: Proposta de Palestra FLISoL Pelotas <contato@flisolpelotas.com.br>\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "Reply-To: contato@flisolpelotas.com.br\n";
	if(!mail("contato@flisolpelotas.com.br", "Chamada de Trabalhos - FLISoL Pelotas - ".$_POST['titulo_chamada_trabalhos'], $mensagemHTML, $headers ,"-r"."contato@flisolpelotas.com.br")){ // Se for Postfix
	    $headers .= "Return-Path: " . "contato@flisolpelotas.com.br" . "\n"; // Se "não for Postfix"
	    mail("contato@flisolpelotas.com.br", "Chamada de Trabalhos - FLISoL Pelotas - ".$_POST['titulo_chamada_trabalhos'], $mensagemHTML, $headers );
	}

	$mensagemHTML = "Ol&aacute;, recebemos sua proposta de palestra pela chamada de trabalhos, assim que tivermos o resultado entraremos em contato.<br>Obrigado!<br><br> Contato Recebido:<br><br>".$mensagemHTML."<br><br> --<br>Att,<br>FLISoL Pelotas<br> E-mail: contato@flisolpelotas.com.br<br><br>Venha para o FLISoL Pelotas - http://www.flisolpelotas.com.br";

	if(!mail($_POST['email_chamada_trabalhos'], "Chamada de Trabalho - FLISoL Pelotas - ".$_POST['titulo_chamada_trabalhos'], $mensagemHTML, $headers ,"-r"."contato@flisolpelotas.com.br")){ // Se for Postfix
	    $headers .= "Return-Path: " . $_POST['email_chamada_trabalhos'] . "\n"; // Se "não for Postfix"
	    mail($_POST['email_chamada_trabalhos'], "Chamada de Trabalhos - FLISoL Pelotas - ".$_POST['titulo_chamada_trabalhos'], $mensagemHTML, $headers );
	}


	header("Location: ../");