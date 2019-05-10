<?php
//
require 'PHPMailerAutoload.php';

		$mysql_hostname = 'Database Host';
		$mysql_username = 'Database Username';
		$mysql_password = 'Database Password';
		$mysql_dbname = 'Database Name';
		
		$dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
         $stmt = $dbh->prepare("SELECT id, name, email, promocode FROM email");

        /*** execute the prepared statement ***/
        $stmt->execute();

        while($row = $stmt->fetch()) {
            //$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$promoCode = $row['promocode'];
			
			sendEmail($email, $name, $promoCode);
		
        }
		 
	function sendEmail($email, $name, $promoCode){

		$mail = new PHPMailer;

		$htmlversion="<p style='color:red;'>Hi ".$name.", <br><br> This is your promo code HTML : ".$promoCode.". </p>";
		$textVersion="Hi ".$name.",.\r\n This is your promo code:  ".$promoCode."text Version";
		$mail->isSMTP();                                     		 // Set mailer to use SMTP
		$mail->Host = 'host Name';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authentication
		$mail->Username = 'SMTP username';         			  // SMTP username
		$mail->Password = 'SMTP password';                      // SMTP password
		$mail->Port = 25;                                   // TCP port to connect to
		$mail->setFrom('test@test.com', 'Test Email');
		$mail->addAddress($email);               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Test Email Subject';
		$mail->Body    = $htmlversion;
		$mail->AltBody = $textVersion;

	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
	}
}
?>