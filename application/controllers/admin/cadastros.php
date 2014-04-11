<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastros extends CI_Controller{
    
    public $sql;
    public $msg;
    public $userKey;
    
    public function __construct(){
         parent::__construct();
         $this->load->model('cadastros_model', 'cadastros');
         
         $this->load->model('usuarios_model', 'users');
         
         
         

         $this->users->logged();

         $this->userKey = $this->session->userdata('userKey'); 
    }
    
    public function index(){ 
        redirect('cadastros/clientes');
    }
	
    public function clientes(){
        $data['nome_pagina'] = "Clientes";
        $data['lista_cadastros'] = $this->cadastros->get_grupo(1);
	
        $this->load->view('clientes_cadastros', $data);
    }
	
    public function fornecedores(){
        $data['nome_pagina'] = "Fornecedores";
        $data['lista_cadastros'] = $this->cadastros->get_grupo(2);
        
        $this->load->view('clientes_cadastros', $data);
    }

    public function servicos(){
        $data['nome_pagina'] = "Serviços";
        $data['lista_cadastros'] = $this->cadastros->get_grupo(1);
        $data['lista_categorias'] = "";
        $data['lista_total'] = $this->cadastros->get_num(1, userKey());
        
        $this->load->view('clientes_servicos', $data);
    }
    
    public function bibliografias(){
        $data['nome_pagina'] = "Domínios";
        
        $data['lista_total'] = $this->cadastros->get_num(2);
        
        $this->load->view('clientes_bibliografias', $data);
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

    /* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    */

    public function submit_addCadastro(){

        $this->load->library('form_validation');
        //$this->form_validation->set_rules('RAZAO_SOCIAL', 'RAZAO_SOCIAL', 'required'|'callback__check_sql');
        $this->form_validation->set_rules('EMAIL', 'EMAIL', 'trim|required');
        //$this->form_validation->set_rules('NOME_COMPLETO', 'NOME_COMPLETO', 'trim|required');
        $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                      <div id="sticky">
                                                      <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                      <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                      <p>',
                                                    '</p></div></div>');
        
        if($this->form_validation->run() == TRUE){
            $senha = passRandom(8);

            $dados = array(

                'COD_CHAVE'             => $this->userKey, 
                'TIPO_PESSOA'           => $this->input->post('TIPO_PESSOA'), 
                'GRUPO'                 => $this->input->post('GRUPO'), 
                'RAZAO_NOME'            => $this->input->post('RAZAO_NOME'), 
                'CNPJ'                  => $this->input->post('CNPJ'), 
                'CPF'                   => $this->input->post('CPF'), 
                'RESPONSAVEL'           => $this->input->post('RESPONSAVEL'), 
                'EMAIL'                 => $this->input->post('EMAIL'), 
                'EMAIL_COBRANCA'        => $this->input->post('EMAIL_COBRANCA'), 
                'SENHA'                 => md5(md5($senha)), 
                'TELEFONE'              => $this->input->post('TELEFONE'), 
                'FAX'                   => $this->input->post('FAX'), 
                'CELULAR'               => $this->input->post('CELULAR'), 
                'CEP'                   => $this->input->post('CEP'), 
                'LOGRADOURO'            => $this->input->post('LOGRADOURO'), 
                'NUMERO'                => $this->input->post('NUMERO'),
                'UF'                    => $this->input->post('UF'),
                'CIDADE'                => $this->input->post('CIDADE'), 
                'BAIRRO'                => $this->input->post('BAIRRO')
            );

            if($this->cadastros->novo($dados)){
                
                $userKey = $this->users->get_chave($this->userKey);

                // Agora deve enviar o email de pedido...
                $this->email->from("no-reply@gerentepro.com.br", $this->users->nome_chave());
                $this->email->to($userKey->RESPONSAVEL);
                if($this->input->post('ENVIA_DADOS') == 1){
                    $this->email->Bcc($dados['EMAIL']);
                }
                $this->email->subject(utf8_decode("Bem-vindo a ".$this->users->nome_chave()."!"));

                $dataMail['RAZAO_NOME']    = $dados['RAZAO_NOME'];
                $dataMail['EMAIL_USUARIO'] = $dados['EMAIL'];
                $dataMail['SENHA_USUARIO'] = $senha;
                $dataMail['USUARIO']       = $userKey->USUARIO;
                $dataMail['logotipo']      = $this->temas->getLogo();

                $htmlMail = $this->parser->parse('email/bemvindo_cliente', $dataMail, true);
                $this->email->message($htmlMail);
                $this->email->send(); //aqui disparamos o email com o modelo Parse

                echo "ok";
                

            // if($this->input->post('GRUPO') == 2)
            //     echo "fornecedores";

            // if($this->input->post('GRUPO') == 3)
            //     echo "administrativo";

            // if($this->input->post('GRUPO') == 4)
            //     echo "funcionarios";

            // if($this->input->post('GRUPO') == 5)
            //     echo "infraestrutura";
            
        } else {
            echo 'nao foi';
        }

        }
    }

    public function submit_editCadastro($id){
        $dados = array(
            'COD_CHAVE'             => $this->userKey, 
            'TIPO_PESSOA'           => $this->input->post('TIPO_PESSOA'), 
            'GRUPO'                 => $this->input->post('GRUPO'), 
            'RAZAO_NOME'            => $this->input->post('RAZAO_NOME'), 
            'CNPJ'                  => $this->input->post('CNPJ'), 
            'CPF'                   => $this->input->post('CPF'), 
            'RESPONSAVEL'           => $this->input->post('RESPONSAVEL'), 
            'EMAIL'                 => $this->input->post('EMAIL'), 
            'EMAIL_COBRANCA'        => $this->input->post('EMAIL_COBRANCA'), 
            'SENHA'                 => md5(md5($this->input->post('NOVA_SENHA'))),
            'TELEFONE'              => $this->input->post('TELEFONE'), 
            'FAX'                   => $this->input->post('FAX'), 
            'CELULAR'               => $this->input->post('CELULAR'), 
            'CEP'                   => $this->input->post('CEP'), 
            'LOGRADOURO'            => $this->input->post('LOGRADOURO'), 
            'NUMERO'                => $this->input->post('NUMERO'),
            'UF'                    => $this->input->post('UF'),
            'CIDADE'                => $this->input->post('CIDADE'), 
            'BAIRRO'                => $this->input->post('BAIRRO')
        );


        $this->cadastros->update($id, $dados);
            echo 'ok';
       
    }

    public function submit_delCadastro(){

        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->db->where('CODIGO', $key);
            $sql = $this->db->delete('cadastros');
        }

        if($sql){
            echo 'ok';
        }else{
            echo 'falhou';
        }
    }
    
    /* 
    * Diálogos em Modal
    */

    public function pop_verCliente($id){
        $data['dados']              = $this->cadastros->get_id($id);
        //$data['lista_bancos']       = lista_bancos();
        $data['lista_estados']      = lista_estados();
        //$data['tipos_conta']        = tipos_conta();
        $data['saldo']              = $this->financeiro->getSaldo($id);

        $this->load->view('pop-ups/ver_cliente', $data);
    }

    public function pop_enviaMensagem(){
        $data['das'] = "";

        $this->load->view('pop-ups/ver_enviaMensagem', $data);
    }

    public function pop_addCliente($dataId){

        $data['tipo']           =  $dataId;

        $data['lista_bancos']   = lista_bancos();
        $data['lista_estados']  = lista_estados();
        $data['tipos_conta']    = tipos_conta();

        $this->load->view('pop-ups/add_contato', $data);
    }

    public function pop_addServico(){
        $data['clientes'] = $this->cadastros->get_grupo(1);

        $this->load->view('pop-ups/add_servico', $data);
    }
    
}
