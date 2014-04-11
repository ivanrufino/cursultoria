<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{

	public $userKey;
	
	public function __construct(){
		parent::__construct();
        $this->load->model('usuarios_model', 'users');
        $this->lang->load('portugues', 'portugues');
        
        $this->users->logged();

        $this->userKey = $this->session->userdata('userKey');

	}
	
	public function index(){
        $data['buttons'] = "buttons/dashboard";
    	$data['pagina'] = "contatos";
        $data['nome_pagina'] = "<b>Dashboard</b>";

		$this->load->view('dashboard', $data);
	}

	public function home(){
		$data['pagina'] = "home";
        $data['nome_pagina'] = "Bem-vindo!";
		$this->load->view('inicio', $data);
	}
}
