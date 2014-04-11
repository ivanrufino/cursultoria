<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends CI_Controller{
    
    public $sql;
    public $msg;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('cadastros_model', 'cadastros');
		$this->load->model('faturas_model', 'faturas');
        $this->load->model('usuarios_model', 'users');
        $this->users->logged();
    }
    
    public function index(){
        
    }
	
    public function competitividade(){
        $data['nome_pagina'] = "Relatorio de Competitividade";
        
        $this->load->view('relatorios_competitividade', $data);
    }
	
	public function consumo_disco(){
        $data['nome_pagina'] = "Relatorio de Consumo de Disco";
        
        $this->load->view('relatorios_disco', $data);
    }

    public function consumo_trafego(){
        $data['nome_pagina'] = "Relatorio de Consumo de Tráfego";
        
        $this->load->view('relatorios_trafego', $data);
    }

    public function uptime(){
        $data['nome_pagina'] = "Relatorio de Uptime";
        
        $this->load->view('relatorios_uptime', $data);
    }

    public function adicionais(){
        $data['nome_pagina'] = "Relatorio de Serviços Extras por Cliente";
        
        $this->load->view('relatorios_adicionais', $data);
    }

    public function financeiro(){
        $data['nome_pagina'] = "Relatorio Financeiro";
        
        $this->load->view('relatorios_financeiro', $data);
    }
}
