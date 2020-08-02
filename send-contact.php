 <?php
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
	ob_start();
	
	$uName =  $_POST['name']/* ." ".$_POST['last-name'] */;
	$comment = $_POST['message'];
	$company = $_POST['company'];
	$email = $_POST['email'];
	//$country_code = $_POST['ContryCode'];
	$phone = $_POST['phone'];
	$source = $_POST['source'];
	
    /*$mail['from'] =  "TALENTICA<info@talentica.com>";
    $mail['to'] = "info@talentica.com";
	

	$mail['subject'] = "Talentica Startup Lead";
	$message = '<img src="https://www.talentica.com/img/Talentica-Logo.svg" alt="TALENTICA" />';
	$message .= '<br><br><table rules="all" style= "bgcolor=#005279" "color=#fff" "width=800" cellpadding="5" cellspacing="5"; >';
	$message .= "<tr>
			  <td><strong>Name:</strong> </td>
			  <td>" . $uName ."</td>
			  </tr>";
	$message .= "<tr>
			  <td><strong>Company Name:</strong> </td>
			  <td>" . $company ."</td>
			  </tr>";
	$message .= "<tr>
			  <td><strong>Message:</strong> </td>
			  <td>" . $comment ."</td>
			  </tr>";
	$message .= "<tr>
			  <td><strong>Email:</strong> </td>
			  <td>" . $email ."</td>
			  </tr>";
	$message .= "<tr>
			   <td><strong>Country Code:</strong> </td>
			   <td>" . $country_code."</td>
			 </tr>";
	$message .= "<tr>
			   <td><strong>Phone:</strong> </td>
			   <td>" . $phone."</td>
			 </tr>";
	$message .= "<tr>
			   <td><strong>Source:</strong> </td>
			   <td>" . $source."</td>
			 </tr>";


	$message .= "</table>";
	$mail['body'] = $message;
	_send_via_ses($mail);  // @ = No Show Error //*/
	
	// Thank you mail to the user
	$tymail['subject'] = "".$uName.", Talentica appreciates your interest.";
	$tymessage = "Hello <span style='text-transform: capitalize'>".$uName."</span>,<br><br>Thank you for reaching out to Talentica Software. We have received your enquiry and our team will be responding to you soon.";
	$tymessage .= '<br><br><table rules="all" style= "bgcolor=#005279" "color=#fff" "width=800" cellpadding="5" cellspacing="5"; >';
	$tymessage .= "<tr>
			  <td><strong>Name:</strong> </td>
			  <td>" . $uName ."</td>
			  </tr>";
	$tymessage .= "<tr>
			  <td><strong>Company Name:</strong> </td>
			  <td>" . $company ."</td>
			  </tr>";
	$tymessage .= "<tr>
			  <td><strong>Message:</strong> </td>
			  <td>" . $comment ."</td>
			  </tr>";
	$tymessage .= "<tr>
			  <td><strong>Email:</strong> </td>
			  <td>" . $email ."</td>
			  </tr>";
	/*$tymessage .= "<tr>
			   <td><strong>Country Code:</strong> </td>
			   <td>" . $country_code."</td>
			 </tr>";*/
	$tymessage .= "<tr>
			   <td><strong>Phone:</strong> </td>
			   <td>" . $phone."</td>
			 </tr>";
	$tymessage .= "<tr>
			   <td><strong>Source:</strong> </td>
			   <td>" . $source."</td>
			 </tr>";

	$tymessage .= "</table>";
	$tymessage .= "<br>You may also refer to some of our existing work at <a href='https://www.talentica.com/case-studies.html'>https://www.talentica.com/case-studies.html</a> ";
	$tymessage .= "<br><br>Best regards, <br>Talentica Software <br> <a href='http://www.talentica.com'>www.talentica.com</a>";

    $tymail['body'] = $tymessage;

    
    $tymail['from'] =  "TALENTICA<info@talentica.com>";
	$tymail['to'] = $email;
    $tymail['bcc'] = "info@talentica.com";

	$flgSend = _send_via_ses($tymail);
		
	if($flgSend){
		echo "<div style=\"background:#fff;display:block;padding:25px; text-align:center;padding-bottom:25px;font-family:Arial\">
				<img src='images/succes-icon.png'/><h2 style=\"font-size:22px; color:#333;margin-top:15px\">Thanks for getting in touch</h2>
				<p style=\"font-size:17px;color:#333\"> You will hear from us real soon</p></div>";
	

	} else {
		echo "Cannot send mail."+$tymessage;
	}
	

    // $mail['to'] = 'subhrojit86@gmail.com';
    // $mail['from'] = 'info@talentica.com';
    // $mail['subject'] = 'Test Email Via SES';
    // $mail['body'] = "<b>Hello This is from SES</b>";
    // _send_via_ses($mail);
    function _send_via_ses($mail)
    {
        require_once 'Mail.php';
        require_once 'Mail/mime.php';
        $from = $mail['from'];
        $to = $mail['to'];
        $cc = $mail['cc'];
        $bcc = $mail['bcc'];
        $recipients = $to;
        if ($cc) {
            $recipients .= ','.$cc;
        }
        if ($bcc) {
            $recipients .= ','.$bcc;
        }
        $subject = $mail['subject'];
        $body = $mail['body'];
        $host = 'email-smtp.us-east-1.amazonaws.com';
        $port = '465';
        $username = 'AKIAINL4LVU7DKWSZRDQ';
        $password = 'Av92Gs/dpV2d+N8eEVXD9/mHagQzjomf08y2sw+rnA6X';

        $headers = array(
                'Content-Type' => 'text/html; charset="UTF-8"',
                'From' => $from,
                'To' => $to,
                'Subject' => $subject,
                'Return-Path' => 'info@talentica.com',
                'Cc' => $cc,
                'Bcc' => $bcc, );
        $mime_params = array(
          'html_charset'  => 'UTF-8',
          'head_charset'  => 'UTF-8'
        );
        // Creating the Mime message
        $mime = new Mail_mime("\n");

        // Setting the body of the email
        //$mime->setTXTBody($text);
        $mime->setHTMLBody($body);

        $body = $mime->get($mime_params);
        $headers = $mime->headers($headers);

        // Sending the email
        $smtp = @Mail::factory('smtp',
                array('host' => $host,
                        'auth' => true,
                        'username' => $username,
                        'password' => $password,
                )
        );

        return $smtp->send($recipients, $headers, $body);
    }

ob_flush();
?>
