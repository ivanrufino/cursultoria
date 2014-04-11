<?php

// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
define('BASEPATH', true);
require_once('../application/config/database.php');
require_once('../application/helpers/ajaxform_helper.php');

$conn = mysql_connect($db['online']['hostname'], $db['online']['username'], $db['online']['password']);
$db   = mysql_select_db($db['online']['database'], $conn);

foreach($_GET as $dados => $values){
	
	// Pega as informações da Fatura
	$sql_fatura = mysql_query("SELECT * FROM faturas WHERE HASH = '".$dados."'");
	$fatura  = mysql_fetch_object($sql_fatura);
	
	// Pega as informações do Cliente
	$sql_cliente = mysql_query("SELECT * FROM cadastros WHERE CODIGO = '".$fatura->CLIENTE."'");
	$cliente  = mysql_fetch_object($sql_cliente);
	
	// Pega as configurações do Boleto de acordo com o Banco
	$sql_boleto	= mysql_query("SELECT * FROM gateways_boleto WHERE COD_CHAVE = '".$fatura->COD_CHAVE."'");
	$boleto  = mysql_fetch_object($sql_boleto);
	
	// Pega as informações da conta GerentePRO
	$sql_user = mysql_query("SELECT * FROM chaves WHERE CODIGO = '".$fatura->COD_CHAVE."'");
	$user  = mysql_fetch_object($sql_user);
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$taxa_boleto = $boleto->TAXA;
	$dadosboleto["nosso_numero"] 	 	= $fatura->CODIGO;
	$dadosboleto["numero_documento"] 	= $fatura->CODIGO;	// Num do pedido ou nosso numero
	$dadosboleto["data_vencimento"]  	= dateFormat($fatura->VENCIMENTO, "d/m/Y"); // Data de Vencimento do Boleto - Formato DD/MM/AAAA
	$dadosboleto["data_documento"] 	 	= dateFormat($fatura->DATA, "d/m/Y"); // Data de emissão do Boleto
	$dadosboleto["data_processamento"] 	= date("d/m/Y"); // Data de processamento do boleto (Opcional)
	$dadosboleto["valor_boleto"] 		= number_format($fatura->VALOR + $taxa_boleto, 2,',', '.'); 	
	
	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] 		= $cliente->RAZAO_NOME;
	$dadosboleto["endereco1"] 	= $cliente->LOGRADOURO.', '.$cliente->NUMERO. ' - '.$cliente->COMPLEMENTO.', '.$cliente->BAIRRO;
	$dadosboleto["endereco2"] 	= $cliente->CIDADE.' - '.$cliente->UF.' - '.$cliente->CEP;
	
	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] 	= "Boleto da Fatura #".$fatura->CODIGO;
	$dadosboleto["demonstrativo2"] 	= "Tarifa Bancária - R$ ".number_format($taxa_boleto, 2,',', '.');
	$dadosboleto["demonstrativo3"] 	= "";
	$dadosboleto["instrucoes1"] 	= "- ".$boleto->INSTRUCAO1;
	$dadosboleto["instrucoes2"] 	= "- ".$boleto->INSTRUCAO2;
	$dadosboleto["instrucoes3"] 	= "- ".$boleto->INSTRUCAO3;
	$dadosboleto["instrucoes4"] 	= "";
	
	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] 		= "";
	$dadosboleto["valor_unitario"] 	= "";
	$dadosboleto["aceite"] 			= $boleto->ACEITE;		
	$dadosboleto["especie"] 		= "R$";
	$dadosboleto["especie_doc"] 	= "RC";
		
	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

	// DADOS DA SUA CONTA
	$dadosboleto["agencia"] 	= $boleto->AGENCIA; // Num da agencia, sem digito
	$dadosboleto["agencia_dv"]  = "0"; // Digito do Num da agencia
	$dadosboleto["conta"] 		= substr($boleto->CONTA, 0, -1);	// Num da conta, sem digito
	$dadosboleto["conta_dv"] 	= substr($boleto->CONTA, -1); 	// Digito do Num da conta
	
	// Particularidade BRADESCO
	$dadosboleto["conta_cedente"] = substr($boleto->CONTA, 0, -1); // ContaCedente do Cliente, sem digito (Somente Números)
	$dadosboleto["conta_cedente_dv"] = substr($boleto->CONTA, -1); // Digito da ContaCedente do Cliente
	
	// Particularidade HSBC
	$dadosboleto["codigo_cedente"] = $boleto->CEDENTE; // Código do Cedente (Somente 7 digitos)
	
	// DADOS PERSONALIZADOS - ITAÚ
	$dadosboleto["carteira"] = $boleto->CARTEIRA;  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157
	
	// SEUS DADOS
	$dadosboleto["identificacao"] = "GerentePRO";
	$dadosboleto["cpf_cnpj"] = "";
	$dadosboleto["cedente"] = $user->EMPRESA." - via GerentePRO";
	
	// NÃO ALTERAR!
	switch($boleto->BANCO){
		case 341: 
				include("include/funcoes_itau.php");
				include("include/layout_itau.php");
			break;
			
		case 237: 
				include("include/funcoes_bradesco.php");
				include("include/layout_bradesco.php");
			break;
			
		case 104: 
				include("include/funcoes_cef.php");
				include("include/layout_cef.php");
			break;
			
		case 356: 
				include("include/funcoes_real.php");
				include("include/layout_real.php");
			break;
			
		case 399: 
				include("include/funcoes_hsbc.php");
				include("include/layout_hsbc.php");
			break;
			
		default: echo "<h2 style='font-family: Arial; letter-spacing:-1px;'>Boleto Inválido</h2>";
			
	}
	//include("include/funcoes_itau.php"); 
	//include("include/layout_itau.php");
	
}
?>
