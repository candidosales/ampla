<?php

if(isset($_POST['submitted-professional'])) {

	$name = $_POST['nome'];
	$email = $_POST['email'];
	$tel = $_POST['telefone'];
	$data_nasc = $_POST['data_nasc'];
	$sex = $_POST['sexo'];
	$profession = $_POST['profissao'];
	$client = $_POST['cliente'];
	$email_marketing = $_POST['email_marketing'];

	$table_name = $wpdb->prefix . "professional";
	$registerSent = $wpdb->insert( $table_name, array(
	    'name' => $name,
	    'email' => $email,
	    'tel' => $tel,
	    'birthday' => $data_nasc,
	    'sex' => $sex,
	    'profession' => $profession,
	    'client' => $client,
	    'email_marketing' => $email_marketing

	));
}

?>