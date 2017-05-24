<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("assets/inc/phpmailer/class.phpmailer.php");

$action = $_GET['a'];

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
//$mail->Host = "smtp.droid.com.br"; // Endereço do servidor SMTP
//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'contato@cltr.com.br'; // Usuário do servidor SMTP
$mail->Password = 'cltrunico2013'; // Senha do servidor SMTP

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "contato@cltr.com.br"; // Seu e-mail
$mail->Sender = "contato@cltr.com.br"; // Seu e-mail
$mail->FromName = "Website CLTR"; // Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('cltr@cltr.com.br', 'CLTR');

/*$mail->AddAddress('ciclano@site.net');*/
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$nome 	  = $_POST['nome'];	
$email    = $_POST['email'];
$mensagem = $_POST['mensagem'];
	
$mail->Subject  = "Contato Site"; // Assunto da mensagem
$mail->Body = "Dados enviados:<br/><br/>
				<b>Nome:</b> ".$nome."<br/>
				<b>Email:</b> ".$email."<br/>
				<b>Mensagem:</b> ".$mensagem."<br/>";

// Envia o e-mail
$enviado = $mail->Send();
	
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
	
// Exibe uma mensagem de resultado
if ($enviado) {
	echo "<script type='text/javascript'>alert('Email enviado com sucesso!');</script>"; 
	echo "<script type='text/javascript'>location.href='index.php';</script>";
} else {
		
	echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}

//



?>