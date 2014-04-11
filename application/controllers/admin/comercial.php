<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comercial extends CI_Controller{
    
    public $sql;
    public $msg;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('produtos_model', 'produtos');
	    $this->load->model('cadastros_model', 'cadastros');
	    $this->load->model('usuarios_model', 'users');
        $this->load->model('pedidos_model', 'pedidos');
        $this->users->logged();
    }
    
    public function index(){
        
        $data['nome_pagina'] = "Pedidos de Venda";
        $data['lista_pedidos'] = $this->produtos->get_all();
        //$data['produto_estoque'] = $this->produtos->get_estoque();
        
        $this->load->view('comercial_pedidos', $data);
    }
    
    // Lista de Produtos
    public function pedidos(){
        $data['nome_pagina'] = "Pedidos";
        $data['lista_pedidos'] = $this->pedidos->getAll();
        //$data['status_pedidos'] = $this->pedidos->getStatus();
        
        $this->load->view('comercial_pedidos', $data);
    }
	
    public function propostas(){
        $data['nome_pagina'] = "Propostas";
        $data['lista_pedidos'] = $this->produtos->get_all();
        
        $this->load->view('comercial_propostas', $data);
    }
    
    // Formulário para adicionar produtos no Estoque
    public function novo_estoque(){
        $data['buttons'] = "buttons/_blank";
        $data['pagina'] = "addEstoque_view";
        $data['nome_pagina'] = "<b>Ajustar Estoque</b>";
		$data['lista_produtos'] = $this->produtos->get_all();
        
		if($this->input->post('usuario') != ""){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('quantidade', 'quantidade', 'trim|required');
            $this->form_validation->set_rules('produto', 'produto', 'trim|required');
            $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                          <div id="sticky">
                                                          <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                          <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                          <p>',
                                                        '</p></div></div>');
                    
            $this->sql = $this->produtos->add_estoque($this->input->post());
            
            if($this->form_validation->run() == FALSE){
                redirect('produto');
            }else{
                
                if($this->sql){
                    echo '<script>alert("Atualizado com sucesso!"); window.location="'.site_url().'produtos";</script>';
                }else{
                    $this->load->view('Dashboard_view', $data);
                }
            }
        }
		
        $this->load->view('Dashboard_view', $data);
    }
    
    // Edição de Produtos Detalhes
    public function view($id, $update = NULL){
        $data['buttons'] = "buttons/_blank";
        $data['pagina'] = "verProdutos_view";
        $data['nome_pagina'] = "Produtos &raquo; <b>Visualização / Edição</b>";
        $data['lista_fornecedores'] = $this->cadastros->get_grupo('Fornecedor');
	
        $data['view_produto'] = $this->produtos->get_id($id);
        
        if(!empty($update)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('custo', 'custo', 'trim|required');
            $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
            $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                          <div id="sticky">
                                                          <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                          <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                          <p>',
                                                        '</p></div></div>');
                    
            $this->sql = $this->produtos->update($id);
            
            if($this->form_validation->run() == FALSE){
                redirect('produtos');
            }else{
                
                if($this->sql){
                    echo '<script>alert("Atualizado com sucesso!"); window.location="'.site_url().'produtos";</script>';
                }else{
                    $this->load->view('Dashboard_view', $data);
                }
            }
        }
        
        $this->load->view('Dashboard_view', $data);
    }
    
    // Formulário para adicionar novos Produtos
    public function novo($run = ''){
        $data['buttons'] = "buttons/_blank";
        $data['pagina'] = "addProdutos_view";
        $data['nome_pagina'] = "<b>Novo Produto</b>";
	$data['lista_fornecedores'] = $this->cadastros->get_grupo('Fornecedor');
        
        if(!empty($run)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('custo', 'custo', 'trim|required');
            $this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
            $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                          <div id="sticky">
                                                          <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                          <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                          <p>',
                                                        '</p></div></div>');
                    
            $this->sql = $this->produtos->novo($this->input->post());
            
            if($this->form_validation->run() == FALSE){
                redirect('produtos');
            }else{
                
                if($this->sql){
                    echo '<script>alert("Cadastrado com sucesso!"); window.location="produtos";</script>';
                }else{
                    $this->load->view('Dashboard_view', $data);
                }
            }
        }
		
        $this->load->view('Dashboard_view', $data);
    }
    
    // Deletar um produto
    public function del(){
        $lista = $this->input->post('item');
	
	for($i = 0; $i <= count($lista) -1; $i++){
            $data['id'] = $lista[$i];
            $data['usuario'] = $this->session->userdata('usuario');
               
	    $sql = $this->db->delete('tb_produto', $data);
	    
	    for($i = 0; $i <= count($lista) -1; $i++){
		$data2['produto'] = $lista[$i];
		$data2['usuario'] = $this->session->userdata('usuario');
		   
		$sql = $this->db->delete('tb_produto_estoque', $data2); 
	    }
	}
	
	if($sql){
	    redirect('produtos');
	}
    }
    
    public function _check_sql(){
        if($this->sql){
            return TRUE;
        }else{
            $this->form_validation->set_message('_check_sql', $this->lang->line('html_login_msg_login'));
            return FALSE;
        }
    }
}
