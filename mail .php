<?php
 // Port number (gmail: 587) 
 ini_set("smtp_port", "PortNumber"); 
 ini_set("SMTP", "relay.rbcint.com");
 ini_set("sendmail_from", "RepublicBankMortgageCenter@republicbank.com");
      
 if ( $_POST ) {
  if (!$_POST['emailAddress'] == "") {
 
    $to=$_POST['emailAddress'];
    $user1="consumerdirect@republicbank.com";
    $user2="manderson@republicbank.com";

    $message = '<strong>Inquiry from Business Banking Landing Page:</strong><br /><br />';
    $message .= '<strong>Full name:</strong> '.$_POST['fullName'].'<br />';
    $message .= '<strong>Email Address:</strong> '.$_POST['emailAddress'].'<br />';
    $message .= '<strong>Phone Number:</strong> '.$_POST['phoneNumber'].'<br />';
    $message .= '<strong>City:</strong> '.$_POST['city'].'<br />';
    $message .= '<strong>State:</strong> '.$_POST['state'].'<br />';
    
    $subject = 'Business Banking Needs Inquiry';

    // To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers

			$headers .= 'To: Republic Bank <'.$to.'>' . "\r\n";
			$headers .= 'Reply-To: '.$_POST['fullName'].' <'.$_POST['emailAddress'].'>' . "\r\n";
			$headers .= 'From: Republic Bank <no-reply@republicbank.com>' . "\r\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();

   if (mail("$to,$user1,$user2", $subject, $message, "$headers")) {
      header("Location: thanks.php");
    } 
   else {
      echo "Error: We couldn't find the PHP mail function.";
    }
  }
  else {
    echo "Error: The email field was empty, so there was no place to send this.";
  }
}
?>