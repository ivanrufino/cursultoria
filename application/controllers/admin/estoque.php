<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estoque extends CI_Controller{
    
    public $sql;
    public $msg;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('produtos_model', 'produtos');
	    $this->load->model('cadastros_model', 'cadastros');
	    $this->load->model('usuarios_model', 'users');
        $this->users->logged();
    }
    
    public function index(){
        
        $data['nome_pagina'] = "Estoque";
        $data['lista_pedidos'] = $this->produtos->get_all();
        //$data['produto_estoque'] = $this->produtos->get_estoque();
        
        $this->load->view('estoque_produtos', $data);
    }
    
    // Lista de Produtos
    public function produtos(){
        $data['nome_pagina'] = "Produtos";
        $data['lista_pedidos'] = $this->produtos->get_all();
        
        $this->load->view('estoque_produtos', $data);
    }
	
    
}
