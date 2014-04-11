<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
//$db['default']['password'] = '$=0-^X*+|.=H|_~%HkS6--ZV8f<RqhXCY52h }I@ElX|{?S>4f;ck&w^GbQaU!cM';
$db['default']['password'] = 'himura08';
$db['default']['database'] = 'adm_cursultoria';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

// Configuração do Banco de Dados no Amazon AWS
$db['online']['hostname'] = 'localhost';
$db['online']['username'] = 'root';
$db['online']['password'] = '$=0-^X*+|.=H|_~%HkS6--ZV8f<RqhXCY52h }I@ElX|{?S>4f;ck&w^GbQaU!cM';
$db['online']['database'] = 'gerentepro';
$db['online']['dbdriver'] = 'mysql';
$db['online']['dbprefix'] = '';
$db['online']['pconnect'] = TRUE;
$db['online']['db_debug'] = TRUE;
$db['online']['cache_on'] = FALSE;
$db['online']['cachedir'] = '';
$db['online']['char_set'] = 'utf8';
$db['online']['dbcollat'] = 'utf8_general_ci';
$db['online']['swap_pre'] = '';
$db['online']['autoinit'] = TRUE;
$db['online']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */