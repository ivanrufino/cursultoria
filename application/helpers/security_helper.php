<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function encrypt($bits = '', $string){
		switch($bits) {

			case 64:
				return md5(md5($string));
				break;

			case 128:
				return md5(md5(md5($string)));
				break;

			case 256:
				return md5(md5(md5(md5($string))));
				break;
			
			default:
				return md5($string);
				break;
		}
	}

?>