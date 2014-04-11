<?
$variables = array('REMOTE_ADDR',
                       'HTTP_X_FORWARDED_FOR',
                       'HTTP_X_FORWARDED',
                       'HTTP_FORWARDED_FOR',
                       'HTTP_FORWARDED',
                       'HTTP_X_COMING_FROM',
                       'HTTP_COMING_FROM',
                       'HTTP_CLIENT_IP');

    $ip = 'Unknown';

    foreach ($variables as $variable)
    {
        if (isset($_SERVER[$variable]))
        {
         echo $ip = $_SERVER[$variable];
		  
            break;
        }
    }
	
  //pego o numero os dois primeiro numero do ip
  $rest = substr($ip,0, 3); 
  
  
	    require("../plugins/class.phpmailer.php");
		
		$mail= new phpmailer();
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; // para mandar html vc deve ter esse trecho...
		$headers .= "From: Cadmail \r\n";

		$mail->Subject = "Acessado externo | CORE/img";
		$mail->From ="aplicativos@getesb.com.br";
		$mail->FromName="Acesso | $ip";
		$mail->Host = "smtp2.aguasbr.com.br";
		$mail->Mailer = "smtp";
		$mail->ContentType="text/html";
		$mail->Body= "IP: ".$ip;
		$mail->AddAddress("aplicativos@getesb.com.br");
		$mail->Send();
	   
  header('Location: http://portal.grupoaguasdobrasil.com.br/', TRUE, 301);  

?>
