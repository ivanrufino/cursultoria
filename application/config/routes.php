<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "aluno";
$route['404_override'] = '';

$route['aluno/suporte/tickets'] = "aluno/lista_chamados";
$route['aluno/suporte/tickets/(:any)'] = "aluno/lista_chamados/$1";

$route['painel'] = "admin/painel";
$route['painel/login'] = "admin/login";
$route['painel/(:any)'] = "admin/$1";
//$route['ServiceStore/produtos/banners/novo'] = "admin/produtos/novo_banner";
//$route['ServiceStore/produtos/categorias/novo'] = "admin/produtos/novo_categoria";
//$route['ServiceStore/produtos/categorias/del'] = "admin/produtos/del_categoria";


/* End of file routes.php */
/* Location: ./application/config/routes.php */