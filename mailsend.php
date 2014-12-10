
<?php


	require_once "Mail.php";
	//refers to a preinstalled php file on ARVIXE server, no need for pathname here.

	//function to send email
	//hosting is set to quinyung.com email account

	//takes 'from', 'to', 'subject', 'body' parameters
	//able to receive html body
	
	function mail_send($f,$t,$s,$b)
	{
		$from = $f; 

		$to = $t;
			
		$subject = $s;
			

		
		$host = "ssl://mail.speedwell.arvixe.com";
		$port = "465";
		// $username and $password are the uid & pwd of your account
		$username = "info@caroshaw.com";
		$password = "ca5150";

		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject,
		'MIME-Version'=>'1.0',
		'Content-type' => "text/html; charset=utf-8\r\n\r\n"
		);

		$smtp = Mail::factory('smtp',
		array ('host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password));

		$body = $b; 

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
		echo("<p> Sorry...an error occured. Contact me at info@caroshaw.com</p>");
		} else {

		include('confirmation.php');

		}
	}

?>
