<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller{

    public $userKey;
	
    public function __construct(){
        parent::__construct();
        $this->load->model('tickets_model','tickets');
        $this->load->model('usuarios_model','users');
        $this->load->model('cadastros_model','cadastros');
        $this->load->model('temas_model','temas');

        $this->userKey = $this->users->getChave(userKey());
    }
    
    public function index(){
		$data['buttons'] = "buttons/cadastros";
        $data['pagina'] = "Tickets_view";
        $data['nome_pagina'] = "<b>Tickets de Suporte</b>";
        $this->load->view('Dashboard_view', $data);
        
    }
    
    public function view($id){
		$data['buttons'] = "buttons/_blank";
        $data['pagina'] = "verTicket_view";
        $data['nome_pagina'] = "Tickets de Suporte &raquo; <b>#$id</b>";
        $this->load->view('Dashboard_view', $data);
        
    }
	
	public function insert(){
		$data['buttons'] = "buttons/_blank";
        $data['pagina'] = "addTickets_view";
        $data['nome_pagina'] = "<b>Novo Ticket de Suporte</b>";
        $this->load->view('Dashboard_view', $data);
        
    }

    /* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    */

    public function respostaTicket(){
        $dados = array(
            'MENSAGEM'      => $this->input->post('MENSAGEM'),
            'TIPO'          => "operador",
            'RESPONSAVEL'   => $this->input->post('RESPONSAVEL'),
            'ANEXO'         => $this->input->post('ANEXO'),
            'TICKET'        => $n_ticket,
            'COD_CHAVE'     => $this->userKey
        );

        $this->email->from("no-reply@gerentepro.com.br", $this->users->nome_chave());
        $this->email->to($cliente->EMAIL);
        $this->email->Cc($usuario->USUARIO);
        $this->email->subject("[TICKET #".$n_ticket."] ".utf8_decode($dados['TITULO']));

        $dataMail['N_TICKET']      = $n_ticket;
        $dataMail['TITULO_EMAIL']  = "O Ticket <b>#".$n_ticket."</b> foi criado com sucesso!";
        $dataMail['NOME_CLIENTE']  = $cliente->RAZAO_NOME;
        $dataMail['DEPARTAMENTO']  = $depto->DESCRICAO;
        $dataMail['DOMINIO']       = $dados['DOMINIO'];
        $dataMail['ASSUNTO']       = $dados['TITULO'];
        $dataMail['MENSAGEM']      = nl2br($mensagem['MENSAGEM']);
        $dataMail['logotipo']      = $this->temas->getLogo();

        $htmlMail = $this->parser->parse('email/ticket', $dataMail, true);
        $this->email->message($htmlMail);
        $this->email->send();

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
    
    public function ticketStatus($status){
        $data['nome_pagina'] = "Tickets de Suporte";

        $data['lista_tickets']  =  $this->tickets->getByStatus($status);

        $this->load->view('suporte_tickets', $data);
    }

    

    public function fechaTicket(){

        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->tickets->updateStatus($key, 4);
        }
        echo "ok";
    }

    public function resolvidoTicket(){

        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->tickets->updateStatus($key, 5);
        }
        echo "ok";
    }

    public function submit_addTicket(){

        $dados = array(
            'TITULO'        => $this->input->post('TITULO'),
            'CLIENTE'       => $this->input->post('CLIENTE'),
            'DOMINIO'       => $this->input->post('DOMINIO'),
            'CATEGORIA'     => $this->input->post('CATEGORIA'),
            'ATRIBUIDO'     => $this->input->post('ATRIBUIDO'),
            'DEPARTAMENTO'  => $this->input->post('DEPARTAMENTO'),
            'STATUS'        => '1', //-- Status "aberto"
            'COD_CHAVE'     => $this->userKey
        );

        $n_ticket  = $this->tickets->novo($dados); // -- Código do ticket criado
        $cliente   = $this->cadastros->get_id($dados['CLIENTE']);
        $depto     = $this->tickets->getDepartamentoById($dados['DEPARTAMENTO']);
        $usuario   = $this->users->getUsuarioById($dados['ATRIBUIDO']);
        
        $mensagem = array(
            'MENSAGEM'      => $this->input->post('MENSAGEM'),
            'RESPONSAVEL'   => $this->session->userdata('usuario'),
            'TIPO'          => "operador",
            'ANEXO'         => $this->input->post('ANEXO'),
            'TICKET'        => $n_ticket,
            'COD_CHAVE'     => $this->userKey
        );

        if ($mensagem) $this->tickets->addResposta($mensagem);
        
        if ($cliente){

            $this->email->from("no-reply@gerentepro.com.br", $this->users->nome_chave());
            $this->email->to($cliente->EMAIL);
            $this->email->Cc($usuario->USUARIO);
            $this->email->subject("[TICKET #".$n_ticket."] ".utf8_decode($dados['TITULO']));

            $dataMail['N_TICKET']      = $n_ticket;
            $dataMail['TITULO_EMAIL']  = "O Ticket <b>#".$n_ticket."</b> foi criado com sucesso!";
            $dataMail['NOME_CLIENTE']  = $cliente->RAZAO_NOME;
            $dataMail['DEPARTAMENTO']  = $depto->DESCRICAO;
            $dataMail['DOMINIO']       = $dados['DOMINIO'];
            $dataMail['ASSUNTO']       = $dados['TITULO'];
            $dataMail['MENSAGEM']      = nl2br($mensagem['MENSAGEM']);
            $dataMail['logotipo']      = $this->temas->getLogo();

            $htmlMail = $this->parser->parse('email/ticket', $dataMail, true);
            $this->email->message($htmlMail);
            $this->email->send();
            echo "ok";
        } 
    }

    public function del(){
       
        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->tickets->delete($key);
        }

        echo "ok";

    }

    /* 
    * Diálogos em Modal
    */


}