<?php 
$nameError = '';
$emailError = '';
$commentError = '';

if(isset($_POST['submitted'])) {
  $telefone = $_POST['nome'];
  $cliente = $_POST['cliente'];
  if(trim($_POST['nome']) === '') {
    $nameError = 'Por favor coloque seu nome.';
    $hasError = true;
  } else {
    $name = trim($_POST['nome']);
  }

  if(trim($_POST['email']) === '')  {
    $emailError = 'Por favor coloque seu e-mail.';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
    $emailError = 'Você entrou com um e-mail inválido.';
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }

  if(trim($_POST['mensagem']) === '') {
    $commentError = 'Por favor entre com uma mensagem.';
    $hasError = true;
  } else {
    if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['mensagem']));
    } else {
      $comments = trim($_POST['mensagem']);
    }
  }

  if(!isset($hasError)) {
    $emailTo = get_option('tz_email');
    if (!isset($emailTo) || ($emailTo == '') ){
      $emailTo = get_option('admin_email');
    }
    $subject = '[Ampla Construcao] Fale conosco - Cliente: '.$name;
    $body = "Nome: $name\n\nEmail: $email\n\nTelefone:$telefone\n\nCliente: $cliente\n\n Mensagem: $comments";
    $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

    $emailSent = wp_mail($emailTo, $subject, $body, $headers);
  }

}
?>