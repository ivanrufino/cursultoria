<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public $sql;
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('usuarios_model', 'users');

        $this->lang->load('portugues', 'portugues');
        $this->session->set_userdata('userKey', $this->users->getChave(userKey()));

    }
    
    public function index(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'usuario', 'trim|required|callback__check_login');
        $this->form_validation->set_rules('senha', 'senha', 'trim|required');
        $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                      <div id="sticky">
                                                      <a class="ui-notify-close ui-notify-cross" href="#"><img src="'.site_url().'/assets/img/menu/closelabel.png" border="0" /></a>
                                                      <div style="float:left;margin:0 10px 0 0"><img src="'.site_url().'/assets/img/icons/ico_error.png" alt="warning" /></div>
                                                      <p>',
                                                    '</p></div></div>');
        
        
        
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{             
            redirect('painel/dashboard');
        }
    }
    
    public function logout(){
        $data = array(
                    'usuario' => '',
                    'logged' => FALSE
                );
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        echo site_url()."painel/login";
    }
    
    public function _check_login(){
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $chave = $this->users->getChave(userKey());

        if($sql = $this->users->get_usuario($usuario, $senha, $chave)){
            $data = array(
                        'usuario' => $sql->CODIGO,
                        'chave' => $sql->COD_CHAVE,
                        'logged' => TRUE
                    );
            $this->session->set_userdata($data);
            $this->users->check_login($sql->CODIGO, $chave);
            return TRUE;
        }else{
            $this->form_validation->set_message('_check_login', $this->lang->line('html_login_msg_login'));
            return FALSE;
        }
    }
}
