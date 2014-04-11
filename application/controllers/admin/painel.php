<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		$this->load->model('usuarios_model', 'users');
		$this->session->set_userdata('userKey', $this->users->getChave(userKey()));
	}
	
	public function index(){
		
		if($this->session->userdata('logged') != FALSE){
			redirect('painel/inicio');
		}else{
			redirect('painel/login');
		}
		
	}
}
