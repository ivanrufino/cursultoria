<?php
/*
$config['protocol'] é o protocolo de envio do email, podendo ter os valores: mail, sendmail, or smtp.
$config['charset'] é a codificação de caracteres do seu email, no meu caso utilizo sempre UTF-8 para meus aplicativos.
$config['wordwrap'] recebe TRUE/FALSE e indica se deve haver a quebra de palavras ou não (eu indico ficar com TRUE).
$config['smtp_host'] é o servidor smtp, caso você escolheu esta opção.
$config['smtp_user'] usuário do smtp.
$config['smtp_pass'] senha do smtp.
$config['smtp_timeout'] é o tempo de espera pela resposta do smtp.
$config['mailtype'] é o tipo do email, se será texto (text) ou html.

 * @version 1.0
 */
 
$config['protocol']  = 'smtp';
$config['charset']   = 'iso-8859-1';
$config['wordwrap']  = FALSE;
$config['smtp_host'] = 'smtp.gerentepro.com.br';
$config['smtp_user'] = 'no-reply@gerentepro.com.br';
$config['smtp_pass'] = 'himura08,123';
$config['smtp_port'] = '587'; //ou 465
$config['smtp_timeout'] = 20;
$config['mailtype']  = 'html';
