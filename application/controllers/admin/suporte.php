<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suporte extends CI_Controller{
    
    public $sql;
    public $msg;
    public $userKey;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('produtos_model', 'produtos');
        $this->load->model('cadastros_model', 'cadastros');
        $this->load->model('usuarios_model', 'users');
        $this->load->model('tickets_model', 'tickets');
        $this->load->model('temas_model', 'temas');
        $this->users->logged();

        $this->userKey = $this->session->userdata('userKey');
    }
    
    public function index(){
        redirect('suporte/tickets');
    }
    
    // Lista de Produtos
    public function geral(){
        $data['nome_pagina'] = "Tickets de Suporte";
        $data['lista_tickets'] = $this->tickets->getAll();
        //$data['produto_estoque'] = $this->produtos->get_estoque();
        
        $this->load->view('suporte_geral', $data);
    }

    public function tickets($id = ''){
        $data['nome_pagina'] = "Tickets de Suporte";
        $data['lista_tickets'] = $this->tickets->getAll();

        //$data['produto_estoque'] = $this->produtos->get_estoque();
        
        $this->load->view('suporte_tickets', $data);
    }

    public function base_de_conhecimento(){
            
            $data['nome_pagina'] = "Base de Conhecimento";

            
            $this->load->view('base_de_conhecimento', $data);
    }

    /* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    */

    public function respostaTicket(){
        $dados = array(
            'TICKET'      => $this->input->post('TICKET'),
            'MENSAGEM'    => $this->input->post('MENSAGEM'),
            'TIPO'        => $this->input->post('TIPO'),
            'RESPONSAVEL' => $this->input->post('RESPONSAVEL'),
            'COD_CHAVE'   => $this->userKey
        );
        //$this->tickets->updateStatus($this->input->post('TICKET'), 3);

        /*$this->email->from("no-reply@gerentepro.com.br", $this->users->nome_chave());
        $this->email->to($cliente->EMAIL);
        $this->email->Cc($usuario->USUARIO);
        $this->email->subject("[TICKET #".$dados['TICKET']."] ".utf8_decode($dados['TITULO']));

        $dataMail['N_TICKET']      = $dados['TICKET'];
        $dataMail['TITULO_EMAIL']  = "O Ticket <b>#".$dados['TICKET']."</b> foi respondido!";
        $dataMail['NOME_CLIENTE']  = $cliente->RAZAO_NOME;
        $dataMail['DEPARTAMENTO']  = $depto->DESCRICAO;
        $dataMail['DOMINIO']       = $dados['DOMINIO'];
        $dataMail['ASSUNTO']       = $dados['TITULO'];
        $dataMail['MENSAGEM']      = nl2br($mensagem['MENSAGEM']);
        $dataMail['logotipo']      = $this->temas->getLogo();

        $htmlMail = $this->parser->parse('email/ticket', $dataMail, true);
        $this->email->message($htmlMail);
        $this->email->send();*/

        if($this->tickets->addResposta($dados)){

            if(@$this->input->post('RESOLVIDO') != ""){
                $this->tickets->updateStatus($this->input->post('TICKET'), 5);
            }else{
                $this->tickets->updateStatus($this->input->post('TICKET'), 3);
            }
        //$this->tickets->updateStatus($this->input->post('TICKET'), 3);
        echo "ok";
        }
    }

    public function getDepartamento(){

        $this->db->where('COD_CHAVE', $this->userKey);
       
        $sql = $this->db->get('suporte_departamentos');
        
        if($sql->num_rows > 0){
            echo json_encode($sql->result());
            //echo json_encode(($sql->result('TIPO_PESSOA') == "juridica") ? $sql->result('RAZAO_SOCIAL') : $sql->result('NOME_COMPLETO'));
        }else{
            echo 'selecione um departamento';
        }
    }

     public function submitAdd_suporteCategoria(){
        $dados = array(
            'DESCRICAO'         => $this->input->post('DESCRICAO'),
            'COD_DEPARTAMENTO'  => $this->input->post('COD_DEPARTAMENTO'),
            'COD_CHAVE'         => $this->userKey
        );
        
        if($this->tickets->nova_CategoriaSuporte($dados)){
            echo "ok";
        }else{
            echo "Ocorreu um erro, Contate o Administrador do Sistema";
        }
    }

    public function submitDel_CategoriaSuporte(){
       
        $lista = $this->input->post('item');

        if ($lista) {
            foreach ($lista as $key) {
                $this->tickets->delete_categoriasSuporte($key);
            }
            echo "ok";

        }
    }
    public function submitDel_GrupoUsuario(){
           
        $lista = $this->input->post('item');

        if ($lista) {
            foreach ($lista as $key) {
                $this->tickets->delete_grupoUsuario($key);
            }
            echo "ok";

        }
    }
     public function submitDel_departamentoSuporte(){
       
        $lista = $this->input->post('item');

        if ($lista) {
            foreach ($lista as $key) {
                $this->tickets->delete_departamentoSuporte($key);
            }
            echo "ok";

        }
    }

    /* 
    * Diálogos em Modal
    */
    /*  Área Grupo de Usuários */
    public function pop_novoGrupoUsuario() {

        $data['usuarios'] = $this->users->getAll();
        $this->load->view('pop-ups/add_grupo_usuario', $data);
    }

    public function ver_grupoUsuario($id){
        $data['grupo'] = $this->users->getGrupoById($id);
        $data['lista'] = $this->users->getListaByGrupo($id);
        $data['usuarios'] = $this->users->getAll();
        $this->load->view('pop-ups/ver_grupo_usuario', $data);
    }
    
    /*  Área departamento */

    public function ver_suporteDepartamento($id){
        $data['depto'] = $this->tickets->getDepartamentoById($id);

        $this->load->view('pop-ups/ver_suporte_departamentos', $data);
    }

    public function pop_suporteDepartamento(){
        $data['list_grupos'] = $this->users->get_grupos();

        $this->load->view('pop-ups/add_suporte_departamentos', $data);
    }
    /*  Área categoria */
    public function ver_suporteCategoria($id){
        $data['catg'] = $this->tickets->getCategoriaById($id);
        $data['dpto']   =   $this->tickets->getDepartamentos();

        $this->load->view('pop-ups/ver_suporte_categoria', $data);
    }
    public function pop_suporteCategoria(){
        $data['dpto']   =   $this->tickets->getDepartamentos();

        $this->load->view('pop-ups/add_suporte_categoria', $data);
        
    }
    /*  Área ticket */
    public function pop_viewTicket($id){
        $data['dados']      = $this->tickets->getById($id);
        $data['mensagens']  = $this->tickets->getMensagens($id);
        $data['dpto']       = $this->tickets->getDepartamentoById($data['dados']->DEPARTAMENTO);
        $data['atribuido']  = $this->users->getUsuarioById($data['dados']->ATRIBUIDO);
        
        $data['cliente']    = $this->cadastros->get_id($data['dados']->CLIENTE);

        $this->load->view('pop-ups/ver_ticket', $data);
    }
    public function pop_addTicket(){
        $data['lista_dpto']     =   $this->tickets->getDepartamentos();
        $data['lista_users']    =   $this->cadastros->getUsers();

        $this->load->view('pop-ups/add_ticket', $data);
    }
    
}
