<?php

$variables = array(		'REMOTE_ADDR',
						'HTTP_X_FORWARDED_FOR',
						'HTTP_X_FORWARDED',
						'HTTP_FORWARDED_FOR',
						'HTTP_FORWARDED',
						'HTTP_X_COMING_FROM',
						'HTTP_COMING_FROM',
						'HTTP_CLIENT_IP',
						'REQUEST_URI',
						'QUERY_STRING',
						'REMOTE_PORT',
						'REQUEST_METHOD',
						'HTTP_USER_AGENT');

    $ip = $_SERVER['REMOTE_ADDR'];
	
	$body = '<style>table{border:1px solid #999; margin:10px auto;} td, th{border:none; border-bottom:1px solid #CCC; padding:5px}</style>
	<table border="1" cellpadding="5" cellspacing="0">
				<tr><th>ITEM</th><th>VALOR</th></tr>';
    foreach ($variables as $variable){
        if (isset($_SERVER[$variable])) $body .= '<tr><td>' . $variable . ': </td><td>&nbsp;' . $_SERVER[$variable] . '</td></tr>';
	}
	
	$body .= '</table>';
  //pego o numero os dois primeiro numero do ip
  //$rest = substr($ip,0, 3); 
  
  
	    require('../plugins/class.phpmailer.php');
		
		$mail				= new phpmailer();
		
		$headers			= 'MIME-Version: 1.0\r\n';
		$headers		   .= 'Content-type: text/html; charset=iso-8859-1\r\n'; // para mandar html vc deve ter esse trecho...
		$headers		   .= 'From: Cadmail \r\n';

		$mail->Subject		= 'Acessado externo | CORE/css';
		$mail->From			= 'aplicativos@getesb.com.br';
		$mail->FromName		= 'Acesso | ' . $ip;
		$mail->Host			= 'smtp2.aguasbr.com.br';
		$mail->Mailer		= 'smtp';
		$mail->ContentType	= 'text/html';
		$mail->Body 		= $body;
		$mail->AddAddress('aplicativos@getesb.com.br','Desenvolvimento');
		$mail->Send();
	   

   header('Location: http://portal.grupoaguasdobrasil.com.br/', TRUE, 302);
?>
