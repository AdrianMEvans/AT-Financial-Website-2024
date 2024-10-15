<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@atfinancial.com.au';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->mailer = "info@atfinancial.com.au";
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];


  

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //   'host' => 'hostservergoeshere',
  //   'username' => 'usernamegoeshere',
  //   'password' => 'passwordgoeshere',
  //   'port' => '587'
  // );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message Subject', 10);

  $contact->bcc = array('adrian@polywhiz.com', 'adrian@thefullstackers.com');

  $contact->recaptcha_secret_key = '6LctR4seAAAAAGOZTqkeeScyZC8wAGwBAZtHLkWy';

  echo $contact->send();
?>
