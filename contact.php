<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Substitua 'contact@example.com' pelo seu endereço de e-mail da Chocoarte
  $receiving_email_address = 'contato@chocoarte.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Opcional: Descomente e configure as credenciais SMTP se quiser usar um servidor SMTP para enviar e-mails
  /*
  $contact->smtp = array(
    'host' => 'exemplo.com.br',
    'username' => 'seu_usuario_smtp',
    'password' => 'sua_senha_smtp',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'De');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Mensagem', 10);

  echo $contact->send();
?>
