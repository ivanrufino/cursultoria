<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Financeiro extends CI_Controller{
    
    public $sql;
    public $msg;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('cadastros_model', 'cadastros');
		$this->load->model('faturas_model', 'faturas');
        $this->load->model('usuarios_model', 'users');
        $this->load->model('financeiro_model', 'financeiro');
        $this->users->logged();
    }
    
    public function index(){
        $data['nome_pagina'] = "Fluxo de Caixa";
        $data['lista_cadastros'] = $this->cadastros->get_all();
        $data['lista_total'] = $this->cadastros->get_num();
        
        $this->load->view('financeiro_caixa', $data);
    }
	
    public function caixa(){
        $data['nome_pagina'] = "Fluxo de Caixa";
        $data['lista_transacoes'] = $this->financeiro->getTransacoesPago();
        
        $this->load->view('financeiro_caixa', $data);
    }
	
    public function faturas(){
        $data['nome_pagina'] = "Faturas";
        $data['lista_faturas'] = $this->faturas->getAll();
        
        $this->load->view('financeiro_faturas', $data);
    }

    /* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    */

    public function submit_delFaturas(){
        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->faturas->delete($key);
        }
        echo "ok";
    }

    public function submit_addFaturas(){
        $cliente = $this->input->post('CLIENTE');
        $vencimento = dateTimestamp($this->input->post('PROX_VENCIMENTO'));
        $valor = array_sum($this->input->post('VALOR')); // <-- Soma dos valores dos itens

        $fatura = $this->faturas->setFatura($valor, $vencimento, $cliente);

        for ($i = 0; $i < count($_POST['VALOR']); $i++){ 
            $itens = array(
                'FATURA'    => $fatura['n_fatura'],
                'PROD_NOME' => $_POST['DESCRICAO'][$i],
                'PROD_VALOR'=> $_POST['VALOR'][$i]
            );
            $this->db->insert('faturas_item', $itens);
        }

        echo "ok";
        //$this->faturas->setFatura($valor, $vencimento, $cliente, $chave = '');
    }

    /* 
    * Diálogos em Modal
    */

    public function modal_addFatura(){
        $data['clientes'] = $this->cadastros->get_grupo(1);

        $this->load->view('pop-ups/add_fatura', $data);
    }
	
}
