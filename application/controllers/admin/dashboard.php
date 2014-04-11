<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
        $this->load->model('usuarios_model', 'users');
        $this->lang->load('portugues', 'portugues');
        $this->users->logged();

        $this->session->set_userdata('userKey', $this->users->getChave(userKey()));
        $this->userKey = $this->session->userdata('userKey');
	}
	
	public function index(){
        $data['buttons'] = "buttons/dashboard";
    	$data['pagina'] = "contatos";

    	$id_usuario = $this->session->userdata('usuario');
    	$chave = $this->users->getChave(userKey());
    	$data['dados_usuario'] = $this->users->getUsuarioById($id_usuario, $chave);

		$this->load->view('dashboard', $data);
	}
}
