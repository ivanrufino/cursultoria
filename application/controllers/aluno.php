<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller{

	//public $cor_default = "#00959b"; //#006782"; 00959b 389240 b94a48
	public $aluno;
	

	public function __construct(){
		parent::__construct();
        $this->load->model('usuarios_model', 'users');
        $this->load->model('cadastros_model', 'cadastros');
        $this->load->library('form_validation');
        $this->aluno = $this->session->userdata('usuario'); 
        $this->load->library('xml');
        $this->load->helper('xml');
        

	}

        
       public function index(){
		redirect('aluno/inicio');
	}

	public function login(){
		
        $this->form_validation->set_rules('usuario', 'usuario', 'trim|required|callback__check_login');
        $this->form_validation->set_rules('senha', 'senha', 'trim|required');
        $this->form_validation->set_error_delimiters('<div id="alert_erro" class="mensagemErro">','</div>');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('central/login');
        }else{             
            redirect('aluno/inicio');
        }
	}

	public function _check_login(){
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');

        if($sql = $this->cadastros->get_byLogin($usuario, $senha)){
            
            
            $data = array(
                        'usuario' => $sql->CODIGO,
                        'clienteLogado' => TRUE
                    );
           
            $this->session->set_userdata($data);
            return TRUE;
        }else{
            $this->form_validation->set_message('_check_login', 'Falha na autenticação, dados incorretos.');
            return FALSE;
        }

    }

	public function inicio(){
		$this->users->clienteLogado();
		$data['pagina'] = "home";
		$data['cadastro'] = $this->cadastros->get_id($this->aluno);
                $data['info_tempo']=$this->cadastros->getTempo($this->aluno);
                
                $tempo_total=$this->cadastros->tempoTotal($this->aluno);
                $data['ciclos_previstos']= $tempo_total / $data['info_tempo']->TEMPO_DISPONIVEL/3600;
//                $ciclos_previstos." ciclos - Falta arredondar";
                $data['info_projeto']=$this->cadastros->getProjeto($this->aluno);
                
                $this->load->view('central/painel', $data); 
	}

	public function get_logout(){
		/*$this->session->unset_userdata('clienteLogado');*/
                $this->session->sess_destroy();
		redirect($this->index());
	}
        public function ciclo(){
            $this->users->clienteLogado();
            $data['pagina'] = "Ciclo";
            $data['ciclos'] = $this->cadastros->getCiclosUsuarios($this->aluno);
            $data['topicos'] = $this->cadastros->getTopicoCiclos($this->aluno);
           // print_r( $data['topicos']);
            $data['info_projeto']=$this->cadastros->getProjeto($this->aluno);
            $this->load->view('central/ciclo_aluno', $data);
        }
        public function cadastro(){
            $this->load->view('central/cadastro');
        }
        public function hora_estudo(){
            if ($this->session->userdata('clienteLogado')) {
                $this->load->view('central/horaEstudo');
            }else{
                redirect('aluno/inicio');
            }
        }
        public function gravarHoraEstudo(){
            $dados=array(
                'COD_ALUNO'=>$this->aluno,
                'TEMPO_DISPONIVEL'=>$this->input->post('horatext'),
                'VELOCIDADE'=>$this->input->post('veltext'),
            );
            $ret=$this->cadastros->novoHoraEstudo($dados);
            redirect('aluno/inicio');
        }
        public function novoAluno(){ 
              $this->form_validation->set_rules('nome', 'nome', 'trim|required');
               $this->form_validation->set_rules('senha', 'senha', 'trim|required');
               if($this->form_validation->run() == FALSE){
                    $this->load->view('central/cadastro');
                }else{             
                    
                
               
                $dados=array(
                    
                    'NOME_COMPLETO'=>$this->input->post('nome'),
                    'CPF'=>$this->input->post('CPF'),
                    'DATA_NASCIMENTO'=>$this->input->post('nascimento'),
                    'EMAIL'=>$this->input->post('email'),
                    'SENHA'=>md5(md5($this->input->post('senha'))) ,
                    'CELULAR'=>$this->input->post('Celular'),
                    'TELEFONE'=>$this->input->post('residencial'),
                    'CEP'=>$this->input->post('Cep'),
                    'ENDERECO'=>$this->input->post('endereco'),
                    'NUMERO'=>$this->input->post('numero'),
                    'COMPLEMENTO'=>$this->input->post('complemento'),
                    'CIDADE'=>$this->input->post('Cidade'),
                    'UF'=>$this->input->post('estado'),
                    'GRUPO'=>'1',
                    'STATUS'=>'0',
                    
                );
              $ret=$this->cadastros->novoAluno($dados);
              
              if (!is_null( $ret)){
                  $dados['codigo']=$ret;
                  $this->enviarEmailCadastro($dados);
                  redirect('aluno/cadastroEfetuado');
              }
                }
              
        }
        public function cadastroEfetuado(){
            $this->load->view('central/cadastroEfetuado' );
        }
        public function enviarEmailCadastro($dados){
        
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            $this->email->from( 'noreply@cursultoria.com.br','Cursultoria');
            $this->email->to($dados['EMAIL']);
            //$this->email->to("lucas.codemax@gmail.com");
            //$this->email->Bcc($userKey->RESPONSAVEL);
            $this->email->subject("CURSULTORIA - ATIVAÇÃO DE CONTA");

//            $mensagem = "<b>Nome:</b>" . $this->input->post('nome') . "<br />";
//            $mensagem .= "<b>Email:</b>" . $this->input->post('email') . "<br />";
//            $mensagem .= "<b>Telefone:</b>" . $this->input->post('telefone') . "<br />";
//            $mensagem .= "<b>Assunto:</b>" . $this->input->post('assunto') . "<br />";
//            $mensagem .= "<b>Mensagem:</b>" . $this->input->post('mensagem') . "<br />";
        
            $mensagem=$this->load->view('email/ativacaoCadastro',$dados);

            $this->email->message($mensagem);
             $this->email->send();
                
             
                
            
        }
        public function ativarConta($codigo){
            
            $dados['STATUS']='1';
            $ret=$this->cadastros->alterarAluno($codigo,$dados);
            
            redirect('aluno/get_logout');
        }
      public function teste($dados){
          $this->load->view('email/ativacaoCadastro',$dados);
      }
        public function resetSenha(){
            echo "chegou aqui";
        }
	
	
	
}
