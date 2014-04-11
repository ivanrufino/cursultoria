<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracoes extends CI_Controller{

	public $userKey;
	
	public function __construct(){
		parent::__construct();
        $this->load->model('usuarios_model', 'users');
        $this->load->model('cadastros_model', 'cadastros');
        $this->load->model('projetos_model', 'projetos');
        
        

        $this->lang->load('portugues', 'portugues');
        $this->users->logged();

        $this->userKey = $this->session->userdata('userKey');
	}
	
	public function index(){
        
    	$data['pagina'] =  "config_geral";
        $data['nome_pagina'] =  "Configurações Gerais";
		$this->load->view('inicio', $data);
	}

	public function geral(){
		
        $data['nome_pagina'] =  "Configurações";
        $data['chave'] =  $this->users->get_chave($this->userKey);

		$this->load->view('config_geral', $data);
	}

	public function conta(){
		
        $data['nome_pagina'] =  "Configurações";
        $data['dadosConta'] =  $this->users->getCadastro();
        $data['logotipo'] =  $this->temas->getLogo();
        $data['chave'] =  $this->users->get_chave($this->userKey);

		$this->load->view('config_conta', $data);
	}

	public function usuarios(){
		$data['nome_pagina'] =  "Gerenciar Usuários";
		$data['usuarios'] =  $this->users->getAll();
		$this->load->view('config_usuarios', $data);
	}

	public function editoras(){
		$data['nome_pagina'] =  "Gerenciar Editoras";
		$data['editoras'] =  $this->cadastros->getEditoras();
		$this->load->view('config_editoras', $data);
	}
        /*Categorias*/
        public function categorias(){
		$data['nome_pagina'] =  "Gerenciar Categorias";
		$data['categorias'] =  $this->projetos->getCategorias();
		$this->load->view('config_categoria', $data);
	}
         
	/*Autores*/
	public function autores(){
		$data['nome_pagina'] =  "Gerenciar Autores";
		$data['autores'] =  $this->cadastros->getAutores();
		$this->load->view('config_autores', $data);
	}
	public function  pop_verAutor($id){
    	$data['autor'] =  $this->cadastros->getAutorById($id);

    	$this->load->view('pop-ups/ver_autor', $data);

	}
	public function  pop_verLivro($id){
		$data['bibliografia'] =  $this->cadastros->getBibliografia($id);	
		$data['editoras'] =  $this->cadastros->getEditoras();
     	$data['autores'] =  $this->cadastros->getAutores();
     	$data['autores_selecionados'] =  $this->cadastros->getAutoresByBibliografia($id);
		   //die(print_r($data['autores_selecionados']));
        $this->load->view('pop-ups/ver_livro', $data);

	}
	public function  pop_verEditora($id){
    	$data['editora'] =  $this->cadastros->getEditoraById($id);
    	$this->load->view('pop-ups/ver_editora', $data);
	}

	public function  pop_verDisciplina($id){
    	$data['disciplina'] =  $this->cadastros->getDisciplinas($id);
    	$data['bibliografias'] =  $this->cadastros->getBibliografia();
    	$data['topicos'] =  $this->cadastros->getTopicosByDisciplina($id);
    	$data['bibliografias_selecionadas'] =  $this->cadastros->getBibliografiasByDisciplina($id);
    	$data['pagina'] =  $this->getPagina($data['topicos'],$data['bibliografias_selecionadas']);
    	//echo "<pre>";
    	//print_r($data['pagina'] );
    	//echo "</pre>";
    	//die();
    	$this->load->view('pop-ups/ver_Disciplina', $data);
	}
        public function getDisciplinabyCat($cod_categoria){
           $data['disciplinas'] = $this->cadastros->getDisciplinaByCat($cod_categoria);
//           print_r($data);
//           die();
            echo $this->load->view('json/disciplinasbycategoria',$data);
        }
        public function  pop_verTopico($id){
//    	$data['disciplina'] =  $this->cadastros->getDisciplinas($id);
//    	$data['bibliografias'] =  $this->cadastros->getBibliografia();
    	$data['topicos'] =  $this->cadastros->getTopicos($id);
    	$data['detalheTopico'] =  $this->cadastros->getDetalheTopico($id);
    	//$data['pagina'] =  $this->getPagina($data['topicos'],$data['bibliografias_selecionadas']);
//    	echo "<pre>";
//    	print_r($data['detalheTopico']);
//    	echo "</pre>";
//    	  die();
    	$this->load->view('pop-ups/ver_topico', $data);
	}
        
	public function getpagina($topicos,$Bibliografias){  
            if(isset ($topicos)){
		foreach ($topicos as $keyTopico => $topico) {
			foreach ($Bibliografias as $keyBiblio => $bibliografia) {
				$dados[$topico['CODIGO']][$bibliografia['CODIGO']] =  $this->cadastros->getPagina($topico['CODIGO'],$bibliografia['CODIGO']);// "$topico[DESCRICAO] - $bibliografia[DESCRICAO]";

				//echo "$topico[DESCRICAO] - $bibliografia[DESCRICAO] <br>" ;
			}
		}
		return $dados;
            }
	}
	public function usuarios_grupos(){
		$data['nome_pagina'] 	=	"Grupo de Usuários";
		$data['grupos_users']	=	$this->users->get_grupos();

		$this->load->view('config_grupo_usuario', $data);
	}

	public function bibliografias(){
		
        $data['nome_pagina'] =  "Bibligrafias";
        $data['bibliografias'] =  $this->cadastros->getBibliografia();
        if($data['bibliografias']!=NULL){
        foreach ($data['bibliografias'] as $chave => $COD_BIBLIOGRAFIA) {

        	$autores= $this->cadastros->getAutoresByBibliografia($COD_BIBLIOGRAFIA->CODIGO); 
        	$NomeAutor="";
                
        	foreach ($autores as $key => $autor) {
        		$NomeAutor.=$autor['DESCRICAO'].", ";
        	}
        	$data['bibliografias'][$chave]->AUTOR=substr($NomeAutor, 0,-2) ;
        	
        	
        }
        }
        $this->load->view('config_bibliografias', $data);
	}
	public function disciplinas(){
		$data['nome_pagina'] =  "Gerenciar Disciplinas";
		$data['disciplinas'] =  $this->cadastros->getDisciplinas();
		$this->load->view('config_disciplinas', $data);
	}
        public function categoria_disciplina(){
		$data['nome_pagina'] =  "Gerenciar Categoria Disciplinas";
		$data['categorias'] =  $this->cadastros->getCategoriaDisciplina();
		$this->load->view('config_categoria_disciplina', $data);
	}
	public function suporte_departamentos(){
		$data['nome_pagina']    = "Departamentos de Suporte";
		$data['departamentos']  = $this->tickets->getDepartamentos();

		$this->load->view('config_suporte_departamentos', $data);
	}

	public function suporte_categorias(){
		$data['nome_pagina'] =  "Categorias de Suporte";
		$data['categorias'] =   $this->tickets->getCategorias();

		$this->load->view('config_suporte_categorias', $data);
	}
	
	public function precos_dominios(){
			
			$data['nome_pagina'] =  "Preços dos Domínios";
			$data['dominios'] =  $this->dominios->getAll();
			$this->load->view('config_precos_dominios', $data);
	}

	public function registrantes_dominios(){
			
			$data['nome_pagina'] =  "Registrantes de Domínio";
			$data['manual'] =  $this->dominios->config($this->userKey);
			$data['userKey'] =  $this->userKey;
			$this->load->view('config_registrantes_dominios', $data);
	}
	
	public function gateways_pagamento(){
		
        $data['nome_pagina'] =  "Gateways de pagamento";
        $data['pagseguro'] =  $this->pagseguro->config($this->userKey);
        $data['moip'] =  $this->moip->config($this->userKey);
        $data['boleto'] =  $this->boleto->config($this->userKey);
        $data['userKey'] =  $this->userKey;
		$this->load->view('config_gateways_pagamento', $data);
	}

	public function projetos(){		
            $data['nome_pagina'] =  "Gerenciar Projetos";
            $data['lista_categorias'] =  $this->projetos->getCategorias();
            $this->load->view('config_projetos', $data);
	}
        public function topicos(){		
            $data['nome_pagina'] =  "Gerenciar Tópicos";
            $data['lista_disciplinas'] =  $this->cadastros->getDisciplinas();
            $this->load->view('config_topicos', $data);
	}

	/* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    */
	public function submit_editAutor(){
		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));

		if($this->cadastros->updateAutor($this->input->post('CODIGO'), $put)){
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
	public function submit_addAutor(){

		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
		
		if($this->cadastros->novoAutor($put)){ 
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}

	public function submit_addDisciplina(){
		$DADOS_DISCIPLINA['DESCRICAO'] = $this->input->post('DESCRICAO');
		$COD_DISCIPLINA=$this->cadastros->novaDisciplina($DADOS_DISCIPLINA); //salvando a nova disciplina e recuperando o codigo
		
		if ($COD_DISCIPLINA!=false){		
			$this->gravarBibliografia($this->input->post('BIBLIOGRAFIAS'),$COD_DISCIPLINA);
			$this->gravarTopico($this->input->post(),$COD_DISCIPLINA);				
			echo "ok";
		}else{
		echo  "algo esta errado: ".trigger_error();
		}
		
}
public function submit_editTopico(){

		$put = array(
                    'DESCRICAO'=> $this->input->post('DESCRICAO'),
                    'CODIGO'=> $this->input->post('CODIGO')
                    );
                
                   
		
                    $codigos=$this->input->post('cod_detalhe');
                    $paginas=$this->input->post('pagina');
                    
                   
		if($this->cadastros->editaTopico($put)){ 
                   
                    foreach ($codigos as $key => $codigo) {
                        
                        $pagina=$paginas[$key];
                        $dados=array(
                            'CODIGO'=>$codigo,
                            'PAGINAS'=>$pagina,
                            'QUANT_PAGINAS'=> $this->CalcularQuantidadePagina($pagina),
                            );
                            $this->cadastros->editaDetalhe($dados);
                    }
                    
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
	public function submit_editDisciplina(){
		$dados_disciplina['CODIGO'] = $this->input->post('CODIGO');
		$dados_disciplina['DESCRICAO'] = $this->input->post('DESCRICAO');
		$this->cadastros->editDisciplina($dados_disciplina);


		$retirar=array_diff($this->input->post('selecionado'), $this->input->post('BIBLIOGRAFIAS'));
		$inserir=array_diff( $this->input->post('BIBLIOGRAFIAS'),$this->input->post('selecionado'));
		$DADOS_BIBLIOGRAFIA['COD_DISCIPLINA'] =  $this->input->post('CODIGO');
		if (count($inserir)>0){ /*Inserindo novas bibliografias da tabela de relacionamento*/

			$this->gravarBibliografia($inserir,$this->input->post('CODIGO'));
		}

		if (count($retirar)>0){ /*Retirando bibliografias da tabela de relacionamento*/
			foreach ($retirar as $key => $BIBLIOGRAFIA) {
				 $this->cadastros->retirarDisciplinaBibliografia($BIBLIOGRAFIA,$DADOS_BIBLIOGRAFIA['COD_DISCIPLINA']);
			}
		}
		if ($this->input->post('atualizar')){
			echo "Dados Atualizados";
		}else{
			$cod_topicos=$this->input->post('COD_TOPICOS');
			$retirar_topico=array_diff($this->input->post('COD_TOPICOS_GRAVADOS'), $cod_topicos);
			

			foreach ($retirar_topico as $key => $topico) {
				if ($this->cadastros->apagarTopico($topico)){
					$this->cadastros->apagarDetalheTopico($topico);
				}
			}

			$topicos=$this->input->post("TOPICOS");
			//foreach ($topicos as $key => $topico) {
				
			$this->gravarTopico($this->input->post(),$dados_disciplina['CODIGO']);	
				
			//}
			//print_r($topicos);
		}
                echo "ok";

}
public function gravarBibliografia($BIBLIOGRAFIAS,$COD_DISCIPLINA){
	$DADOS_BIBLIOGRAFIA['COD_DISCIPLINA'] =  $COD_DISCIPLINA;
	foreach ($BIBLIOGRAFIAS as $key => $BIBLIOGRAFIA) { //varrendo o array e gravando junto com o codigo da disciplina
				$DADOS_BIBLIOGRAFIA['COD_BIBLIOGRAFIA'] =  $BIBLIOGRAFIA;
				$COD_VINCULO = $this->cadastros->novaDisciplinaBibliografia($DADOS_BIBLIOGRAFIA);
			}
}
public function gravarTopico($dados,$COD_DISCIPLINA){
	$cod_topicos="";	
	if (isset($dados['COD_TOPICOS'])){$cod_topicos=$dados['COD_TOPICOS'];}
	
	$DADOS['PAGINAS'] = $dados['PAGINAS'];
	foreach ($dados['TOPICOS'] as $key => $TOPICO) { //array de topicos passados por post
		if (!isset( $cod_topicos[$key]) || $cod_topicos[$key] ==""){
			if (trim($TOPICO)!=""){				
				$DADOS_TOPICO['DESCRICAO'] =  $TOPICO;
				$DADOS_TOPICO['COD_DISCIPLINA'] =  $COD_DISCIPLINA;

				$COD_TOPICO = $this->cadastros->novoTopico($DADOS_TOPICO);
			}
		}else{
			$COD_TOPICO=$cod_topicos[$key];
				//$this->cadastros->editTopico($COD_TOPICO);
		}			
		foreach ($dados['BIBLIOGRAFIAS']  as $keyBiblio => $value) {
			if (trim($DADOS['PAGINAS'][$value][$key])!=""){
				$DADOS_DETALHE['COD_TOPICO'] =  $COD_TOPICO;
				$DADOS_DETALHE['COD_BIBLIOGRAFIA'] =  $value;
				$DADOS_DETALHE['PAGINAS'] =  trim($DADOS['PAGINAS'][$value][$key]);
				$DADOS_DETALHE['QUANT_PAGINAS'] =  $this->CalcularQuantidadePagina($DADOS_DETALHE['PAGINAS']);
				  $this->cadastros->novoDetalheTopico($DADOS_DETALHE);

			}
		}
	}
}

	public function CalcularQuantidadePagina($paginas){
		$intervalos=explode(",",$paginas);
		$qtdPaginas=0;
		foreach ($intervalos as $key => $intervalo) {
			$pos      = strripos($intervalo, "-");
			if ($pos === false) {
				   $qtdPaginas+=1;
			} else {
				    $Num_Pag=explode("-",$intervalo);
				    $qtdPaginas+=($Num_Pag[1]-$Num_Pag[0])+1;
			}
		}
		return $qtdPaginas;
	}
		
				

				

				
	public function submit_editEditora(){
		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));

		if($this->cadastros->updateEditora($this->input->post('CODIGO'), $put)){
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
	public function submit_addEditora(){

		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
		
		if($this->cadastros->novaEditora($put)){ 
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
public function submit_addLivro(){		
        $put = array(
			'DESCRICAO'=> $this->input->post('DESCRICAO'),
			'EDICAO'=> $this->input->post('EDICAO'),
			'ANO'=> $this->input->post('ANO'),
			'COD_EDITORA'=> $this->input->post('COD_EDITORA'),
			'TIPO'=> $this->input->post('TIPO')
			
		 );
		$AUTORES= $this->input->post('AUTOR');
		$COD_BIBLIOGRAFIA=$this->cadastros->novaBibliografia($put);

		$NomeImagem="capa_".$COD_BIBLIOGRAFIA; //Gerando nome da imagem com o ultimo id inserido
		$foto=$this->uploadCapa($NomeImagem); //Fazendo o upload da imagem, renomeando com o nome gerado
		$DADOS['FOTO'] = $foto['nome'].$foto['ext'];
		$this->cadastros->updateBibliografia($COD_BIBLIOGRAFIA,$DADOS);//alterando o nome da imagem do arquivo inserido
		if($COD_BIBLIOGRAFIA){ 
			$put2['COD_BIBLIOGRAFIA'] = $COD_BIBLIOGRAFIA ;
			foreach ($AUTORES as $key => $COD_AUTOR) {
				$put2['COD_AUTOR'] = $COD_AUTOR ;
				$this->cadastros->novaBibliografiaAutor($put2);
			}
			
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
	public function submit_editLivro(){
		$retirar=array_diff($this->input->post('selecionado'), $this->input->post('AUTOR'));
		$inserir=array_diff( $this->input->post('AUTOR'),$this->input->post('selecionado'));
		$put['DESCRICAO'] = $this->input->post('DESCRICAO');
		$put['EDICAO'] = $this->input->post('EDICAO');
		$put['ANO'] = $this->input->post('ANO');
		$put['COD_EDITORA'] = $this->input->post('COD_EDITORA');
		$put['TIPO'] = $this->input->post('TIPO');
		
		if (isset($_FILES['FOTO'])){
			$nomefoto=explode(".",$this->input->post('nomeFoto'));
				$this->ExcluirCapa($this->input->post('nomeFoto'));	
				$foto=$this->uploadCapa($nomefoto['0']);
				$put['FOTO'] = $foto['nome'].$foto['ext'];
				
		}

		$put2['COD_BIBLIOGRAFIA'] = $this->input->post('CODIGO');
		if($this->cadastros->updateBibliografia($put2['COD_BIBLIOGRAFIA'],$put)){
		
		if (count($inserir)>0){ /*Inserindo novos autores da tabela de relacionamento*/
			foreach ($inserir as $key => $COD_AUTOR) {
				$put2['COD_AUTOR'] = $COD_AUTOR ;
				$this->cadastros->novaBibliografiaAutor($put2);
			}
		}
		if (count($retirar)>0){ /*Retirando autores da tabela de relacionamento*/
			foreach ($retirar as $key => $COD_AUTOR) {
				$put2['COD_AUTOR'] = $COD_AUTOR ;
				$this->cadastros->retirarBibliografiaAutor($put2['COD_BIBLIOGRAFIA'],$COD_AUTOR);
			}
		}
		
		
		echo "ok";
		}else{
			echo "Não foi possivel atualizar";
		}
	}
	public function uploadCapa($nome){
		$tipos = array('jpg','jpeg','png','gif');
		$pasta="uploads/livros/";
        $FOTO = uploadFile($_FILES['FOTO'], $pasta, $tipos,$nome);
        return $FOTO;
	}
	public function submit_editUsuarios(){
		$put = array(
			'STATUS' 	=> $this->input->post('STATUS'),
			'NOME' 		=> $this->input->post('NOME'),
			'USUARIO' 	=> $this->input->post('USUARIO'),
			'SENHA' 	=> (md5(md5($this->input->post('SENHA'))) != "74be16979710d4c4e7c6647856088456") ? md5(md5($this->input->post('SENHA'))) : $this->input->post('SENHA_ANTIGA'),
			'PERMISSAO' => (@$this->input->post('PERMISSAO')) ? 'admin' : 'usuario'
			);

		if($this->users->update($this->input->post('CODIGO'), $put)){
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}

	public function submit_addUsuarios(){

		$put = array(
			'STATUS' 	=> $this->input->post('STATUS'),
			'NOME' 		=> $this->input->post('NOME'),
			'USUARIO' 	=> $this->input->post('USUARIO'),
			'SENHA' 	=> md5(md5($this->input->post('SENHA'))),
			'PERMISSAO' => (@$this->input->post('PERMISSAO')) ? 'admin' : 'usuario',
			'COD_CHAVE' => $this->userKey
			);

		if($this->users->novoUsuario($put)){
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
	public function submit_delLivros(){
		$lista = $this->input->post('item');
		foreach ($lista as $key) {
			$this->cadastros->retirarBibliografiaAutor($key);//Apagar relacionamento AutorBibliografia
			$dados=$this->cadastros->getBibliografia($key);// "capa_".$key;
			
			$this->ExcluirCapa($dados->FOTO); //Apagar foto
			$this->cadastros->deleteBibliografia($key);//apgar Bibliografia
           
        }
        echo "ok";
	}
	public function ExcluirCapa($nome){
		$arquivo="uploads/livros/".$nome;
		if(file_exists($arquivo)) {
                    chmod($arquivo,0755); //Change the file permissions if allowed
                    unlink($arquivo); //remove the file
                    }
	}
	public function submit_delAutores(){
		$lista = $this->input->post('item');
         
                
        foreach ($lista as $key) {
            $ret=$this->cadastros->deleteAutor($key);
           
        }
        echo 'ok';
	}

	public function submit_delEditoras(){
		$lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->cadastros->deleteEditoras($key);
        }
        echo "ok";
	}

	public function submit_delUsuarios(){
		$lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->users->delete($key);
        }
        echo "ok";
	}

    /* 
    * Diálogos em Modal
    */

    public function pop_verUsuario($id){
    	$data['usuario'] =  $this->users->getUsuarioById($id, $this->userKey);

    	$this->load->view('pop-ups/ver_usuario', $data);
    }

    public function pop_addUsuario(){
    	$this->load->view('pop-ups/add_usuario');
    }

    public function pop_addEditora(){
    	$this->load->view('pop-ups/add_editora');
    }
    public function pop_addAutor(){
    	//echo "aqui";
    	$this->load->view('pop-ups/add_autor');
    }
    public function pop_addDisciplina(){
    	//echo "aqui";
    	$data['bibliografias'] =  $this->cadastros->getBibliografia();
    	$this->load->view('pop-ups/add_Disciplina',$data);
    }
     public function pop_addLivro(){   
     	$data['editoras'] =  $this->cadastros->getEditoras();
     	$data['autores'] =  $this->cadastros->getAutores();
    	$this->load->view('pop-ups/add_livro',$data);
    }


}
