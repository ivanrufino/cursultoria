<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpanel extends CI_Controller{
    
    private $usuario;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('cpanel_model', 'cPanel');
        $this->load->model('usuarios_model', 'users');
        //$this->load->model('whois_model', 'whois');
        //$this->load->model('api_model', 'api_xml');


        
    }

    public function index(){
    	echo "ta funfando (:";
    }

    public function getAll(){

        $whm = $this->cPanel->delConta();
        echo '<pre>';
        var_dump($whm);
        /*
    	$whm = $this->cPanel->listarContas();
        
        foreach ($whm->acct as $conta) {
            echo $conta->domain.' - '.$conta->plan; 
            echo '<hr />';
        }
        */
    }

}