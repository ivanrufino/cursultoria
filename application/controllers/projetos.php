<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projetos extends CI_Controller {

    //public $cor_default = "#00959b"; //#006782"; 00959b 389240 b94a48


    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'users');
        $this->load->model('cadastros_model', 'cadastros');
        $this->load->model('projetos_model', 'projetos');
        $this->load->library('form_validation');
        $this->aluno = $this->session->userdata('usuario');
    }

    public function index() {
        $data['categorias'] = $this->projetos->getCategorias('1');
        foreach ($data['categorias'] as $key => $categoria) {
            $data['projetos'][$categoria->CODIGO] = $this->projetos->getProjetosByCatg($categoria->CODIGO);
        }

        $this->load->view('central/projetos_disponiveis', $data);
    }

    public function detalheProjeto($COD_PROJETO) {
        $data['projeto'] = $this->projetos->getProjetosById($COD_PROJETO);
        $data['disciplinas'] = $this->cadastros->getDisciplinasVinculadas($COD_PROJETO);

        foreach ($data['disciplinas'] as $key => $disciplina) {
            $data['detalhebibliografia'][$disciplina['CODIGO']] = $this->cadastros->getBibliografiaByDisciplina($disciplina['CODIGO']);
        }


        //$data['disciplinas'] = $this->cadastros->getDisciplinas();
        echo $this->load->view('central/detalheProjeto', $data);
    }

    public function teste() {
        $this->load->view('central/per_proj');
    }

    public function cadastroEfetuado() {
        $this->load->view('central/cadastroEfetuado');
    }

    public function enviarEmailCadastro($dados) {

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from('noreply@cursultoria.com.br', 'Cursultoria');
        $this->email->to($dados['EMAIL']);
        //$this->email->to("lucas.codemax@gmail.com");
        //$this->email->Bcc($userKey->RESPONSAVEL);
        $this->email->subject("CURSULTORIA - ATIVAÇÃO DE CONTA");

//            $mensagem = "<b>Nome:</b>" . $this->input->post('nome') . "<br />";
//            $mensagem .= "<b>Email:</b>" . $this->input->post('email') . "<br />";
//            $mensagem .= "<b>Telefone:</b>" . $this->input->post('telefone') . "<br />";
//            $mensagem .= "<b>Assunto:</b>" . $this->input->post('assunto') . "<br />";
//            $mensagem .= "<b>Mensagem:</b>" . $this->input->post('mensagem') . "<br />";

        $mensagem = $this->load->view('email/ativacaoCadastro', $dados);

        $this->email->message($mensagem);
        $this->email->send();
    }

    public function gravarTopicosUsuario() {
        $cod_disciplina = $this->input->post();
        $projeto = $this->input->post('cod_projeto');
        $dados = array('COD_PROJETO' => $projeto,
            'COD_ALUNO' => $this->aluno);

        $this->cadastros->novoProjetoAluno($dados);
        foreach ($cod_disciplina as $key => $value) {
            $info = explode("_", $value);
            if (isset($info['1'])) {
                $b = $info['1'];
            }
            if (isset($info['3'])) {
                $d = $info['3'];
                $topicos = $this->cadastros->getTopicosByDisciplina($d);
                $this->inserirTopicos($topicos, $b);
            }
        }
        
        $this->criarCiclos($this->aluno);
        redirect(base_url()."aluno/ciclo");
    }

    public function inserirTopicos($topicos, $bibliografia) {
        foreach ($topicos as $topico) {
            $dados = array('COD_ALUNO' => $this->aluno,
                'COD_TOPICO' => $topico['CODIGO'],
                'COD_BIBLIOGRAFIA' => $bibliografia
            );
            $this->cadastros->gravarTopico($dados);
            // echo $topico['CODIGO']."<br>";
        }
    }

    public function criarCiclos($cod_usuario) {
        $data['info_tempo'] = $this->cadastros->getTempo($this->aluno);

        $data['topicos'] = $this->cadastros->getTopicoUsuarios($this->aluno, 0);
        //calculo de pagina por semana (tempo_disponivel *3600 / velocidade)
        //calculo tranformar pagina em tempo (quantidade_pagina * velocidade /3600)
        $velocidade = ($data['info_tempo']->VELOCIDADE); //pegando tempo tiponivel e convertendo para segundos
        $tempo_disponivel = ($data['info_tempo']->TEMPO_DISPONIVEL) * 3600; //pegando tempo tiponivel e convertendo para segundos
        $tempo_restante = ($data['info_tempo']->TEMPO_DISPONIVEL) * 3600; //De inicio o tempo restante é igual ao tempo disponivel
        $ciclo = $this->cadastros->maiorCiclo();
        $novo_ciclo = $ciclo->CICLO + 1;
        if (!is_null($data['topicos'])) {
            foreach ($data['topicos'] as $topicos) {
                if ($topicos->TIPO == "Leitura") {
                    $tempo = $topicos->QUANT_PAGINAS * $velocidade;
                    $tempo_restante = $tempo_restante - $tempo;
                } else {
                    $tempo = $topicos->PAGINAS;
                    $tempo_restante = $tempo_restante - $tempo;
                }
                $dados = array('CODIGO' => $topicos->CODIGO,
                    'TEMPO_PREVISTO' => $tempo,
                    'CICLO' => $novo_ciclo
                );
                $this->cadastros->updateTopicoUsuario($dados);
                if ($tempo_restante <= 0) {
                    break;
                }

                //echo "<br>";
            }
        } else {
            return null;
        }
    }

    public function printArray($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

}
