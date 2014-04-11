<?php

define('DESENVOLVIMENTO', 'desenvolvimento');

if (defined('DESENVOLVIMENTO'))
{
	switch (DESENVOLVIMENTO)
	{
		case 'desenvolvimento':
			error_reporting(E_ALL);
		break;
	
		case 'teste':
		case 'producao':
			error_reporting(0);
		break;

		default:
			exit('O ambiente n�o est� configurado corretamente.');
	}
}

	$system_path        = 'system';
	$application_folder = 'application';
	

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("<p style='font:14px Tahoma, Arial;'>Por favor, verifique se o destino da pasta do sistema <b>GerentePRO</b> est� configurada corretamente.<br /> No arquivo de configura��o: <b>config.php</b></p>");
	}
	
/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter'.EXT;
//comentario
?>