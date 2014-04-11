<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentos extends CI_Controller{
    
    public $sql;
    public $msg;
    
    public function __construct(){
         parent::__construct();
         $this->load->model('documentos_model', 'documentos');
         $this->load->model('servicos_model', 'servicos');
         $this->load->model('usuarios_model', 'users');
         $this->load->model('produtos_model', 'produtos');
         $this->users->logged();
    }
    
    public function index(){
        redirect('cadastros/clientes');
    }
	
    public function procedimentos(){
        $data['nome_pagina'] = "Procedimentos";
        $this->session->set_userdata('tipo_documento', 'procedimentos');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('procedimentos', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }
	
    public function formularios(){
        $data['nome_pagina'] = "Formulários";
        $this->session->set_userdata('tipo_documento', 'formularios');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('formularios', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }

    public function registros(){
        $data['nome_pagina'] = "Registros";
        $this->session->set_userdata('tipo_documento', 'registros');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('registros', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }

    public function obsoletos(){
        $data['nome_pagina'] = "Obsoletos";
        $this->session->set_userdata('tipo_documento', 'absoletos');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('absoletos', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }

    public function em_laboracao(){
        $data['nome_pagina'] = "Em elaboração";
        $this->session->set_userdata('tipo_documento', 'em_elaboracao');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('em_elaboracao', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }

    public function manual(){
        $data['nome_pagina'] = "Manual de Gestão";
        $this->session->set_userdata('tipo_documento', 'manual');
        
        $data['lista_documentos'] = $this->documentos->get_grupo('manual', userKey());
        $this->load->view('lista_documentos', $data);
        //$this->load->view('suporte_tickets', $data);
    }
	
    public function view($id, $update = NULL){
        $data['buttons'] = "buttons/_blank";
        $data['pagina'] = "verCadastros_view";
        $data['nome_pagina'] = "Cadastros &raquo; <b>Visualização / Edição</b>";
        
        $data['view_cadastro'] = $this->cadastros->get_id($id);
        
        if(!empty($update)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pessoa', 'pessoa', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('responsavel', 'responsavel', 'trim|required');
            $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                          <div id="sticky">
                                                          <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                          <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                          <p>',
                                                        '</p></div></div>');
                    
            $this->sql = $this->cadastros->update($id);
            
            if($this->form_validation->run() == FALSE){
                redirect('cadastros');
            }else{
                
                if($this->sql){
                    echo '<script>alert("Atualizado com sucesso!"); window.location="'.site_url().'cadastros";</script>';
                }else{
                    $this->load->view('dashboard', $data);
                }
            }
        }
        
        $this->load->view('dashboard', $data);
    }
    
    public function novo($run = ''){
        $data['buttons'] = "buttons/_blank";
        $data['pagina'] = "addCadastros_view";
        $data['nome_pagina'] = "<b>Novo Cadastro</b>";
        
        if(!empty($run)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pessoa', 'pessoa', 'required'|'callback__check_sql');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('responsavel', 'responsavel', 'trim|required');
            $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                          <div id="sticky">
                                                          <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                          <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                          <p>',
                                                        '</p></div></div>');
                    
            $this->sql = $this->cadastros->novo($this->input->post());
            
            if($this->form_validation->run() == FALSE){
                redirect('cadastros');
            }else{
                
                if($this->sql){
                    echo '<script>alert("Cadastrado com sucesso!"); window.location="cadastros";</script>';
                }else{
                    $this->load->view('dashboard', $data);
                }
            }
        }
		
        $this->load->view('dashboard', $data);
    }

    public function _check_sql(){
        if($this->sql){
            return TRUE;
        }else{
            $this->form_validation->set_message('_check_sql', $this->lang->line('html_login_msg_login'));
            return FALSE;
        }
    }
    
    public function del(){
        $lista = $this->input->post('item');
	
	for($i = 0; $i <= count($lista) -1; $i++){
            $data['id'] = $lista[$i];
            $data['usuario'] = $this->session->userdata('chave');
               
	    $sql = $this->db->delete('tb_cadastro', $data); 
	}
	if($sql){
	    redirect('cadastros');
	}
    }
    
    
}
