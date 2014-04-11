<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller{
    
	
    private $chave;
    public $userKey;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('cadastros_model', 'cadastros');
        $this->load->model('usuarios_model', 'users');
        $this->load->library('form_validation');
        $this->load->model('projetos_model', 'projetos');

        $this->userKey = $this->users->getChave(userKey());  
    }
     /*Categoria*/
    public function pop_addCategoria(){
    	 $this->load->view('pop-ups/add_categoria');
    }
    public function pop_addCategoriaDisciplina(){
    	 $this->load->view('pop-ups/add_categoriaDisciplina');
    }
    
    public function submitAdd_projeto(){
         $put = array(
             'NOME'=> $this->input->post('NOME'),
             'DESCRICAO'=> $this->input->post('DESCRICAO'),
             'COD_CATEGORIA'=> $this->input->post('CATEGORIA'),
             );

         $id=$this->projetos->novoProjeto($put);
        if($id){       
            $cod_disciplinas=  $this->input->post("disciplinas");
            foreach ($cod_disciplinas as $key => $codigo) {
                $dados=array(
                    'COD_DISCIPLINA'=>$codigo,
                    'COD_PROJETO'=>$id
                );
                $this->projetos->novoProjetoDisciplina($dados);
            }
            
            
           echo "ok";
        }else{
            echo "Ocorreu um erro: ".trigger_error();
        }   
    }
    public function submitAdd_categoria(){
        $put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
        if($this->projetos->novaCategoria($put)){ 
            echo "ok";
        }else{
            echo "Ocorreu um erro: ".trigger_error();
        }
    }
        public function submitAdd_categoriaDisciplina(){
            
        $put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
        if($this->cadastros->novaCategoriaDisciplina($put)){ 
            echo "ok";
        }else{
            echo "Ocorreu um erro: ".trigger_error();
        }
    }
        public function submitEdit_categoria(){

		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
		if($this->projetos->editaCategoria($this->input->post('CODIGO'), $put)){		
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
        public function submitEdit_CategoriaDisciplina(){

		$put = array('DESCRICAO'=> $this->input->post('DESCRICAO'));
		if($this->projetos->editaCategoriaDisciplina($this->input->post('CODIGO'), $put)){		
			echo "ok";
		}else{
			echo "Ocorreu um erro: ".trigger_error();
		}
	}
        public function  pop_verCategoria($id){
         
    	$data['categoria'] = $this->projetos->getCategoriasById($id);

    	$this->load->view('pop-ups/ver_categoria', $data);

	}
        public function  pop_verCategoriaDisciplina($id){
         
    	$data['categoria'] = $this->projetos->getCategoriasDisciplinaById($id);

    	$this->load->view('pop-ups/ver_categoria', $data);

	}
        public function submit_delCategorias(){
            
            $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $put = array('STATUS'=> '0');            
            $this->projetos->editaCategoria($key, $put);
        }
        
        echo "ok";
	}
        public function submit_ativarCategorias(){
            
            $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $put = array('STATUS'=> '1');            
            $this->projetos->editaCategoria($key, $put);
        }
        
        echo "ok";
	}
        /*Projeto*/
        public function verProjeto($id){
            
        $data['projeto'] = $this->projetos->getProjetosById($id);
        $data['categorias'] = $this->projetos->getCategorias();
//        $data['disciplinas'] = $this->cadastros->getDisciplinas();
        $data['titulo'] = "Novo Projeto";


        $this->load->view('pop-ups/ver_projeto', $data);
    }

    public function addProjeto(){
        $data['categorias'] = $this->projetos->getCategorias();
        $data['titulo'] = "Novo Projeto";
        $this->load->view('pop-ups/add_projeto', $data);
    }
    public function pop_vincularDisciplina($codProjeto) {
        $data['projeto'] = $this->projetos->getProjetosById($codProjeto);
        $data['disciplinasVinculadas'] = $this->cadastros->getDisciplinasVinculadas($codProjeto);
        $data['disciplinas'] = $this->cadastros->getDisciplinas();
    	$this->load->view('pop-ups/add_vinculoDisciplina',$data);
    }
    
    public function buscarTopico($codDisciplinas,$codProj ){
        
        $codigos=  explode("-", substr($codDisciplinas, 0, -1) );
        
        
        foreach ($codigos as $key => $codigo) {
            if ($codigo!='multiselect' && $codigo!='all'){
            $disciplina = $this->cadastros->getDisciplinas($codigo);
            $data['topicosVinculados']=$this->cadastros->getTopicosVinculados($codProj);
            $data['topicos'][$disciplina->DESCRICAO] = $this->cadastros->getTopicosByDisciplina($codigo);
        }
        }
        $this->load->view('json/tableTopicos',$data);
//        echo "<pre>";
//        print_r($codigos);
//        echo "<pre>";
//        echo "chegou";
    }
    
    public function submitAdd_VincularDisciplina(){
        $COD_PROJETO=  $this->input->post('cod_projeto');
        $DISCIPLINAS=$this->input->post('DISCIPLINAS');
        
        foreach ($DISCIPLINAS as $key => $codigo) {
                $dados=array(
                    'COD_DISCIPLINA'=>$codigo,
                    'COD_PROJETO'=>$COD_PROJETO
                );
                $this->projetos->novoProjetoDisciplina($dados);
            
        }
         $TOPICOS=$this->input->post('TOPICOS');
        
       if ($TOPICOS!=""){
        foreach ($TOPICOS as $key => $codigo) {
                $dados=array(
                    'COD_TOPICO'=>$codigo,
                    'COD_PROJETO'=>$COD_PROJETO
                );
                $this->projetos->novoProjetoTopicos($dados);
            
        }
       }
       echo "ok";
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  /*  private function isLogged(){ 
        $this->chave = $this->session->userdata('chave'); // Verificando se o usuário está autenticado   
    }

    public function loadConfig($handler = ''){
        $this->load->view('config_forms/'.$handler);
    }

    public function enviaTema(){
        $tipos = array('jpg','png','gif');
        $enviar = uploadFile($_FILES['LOGOTIPO'], 'uploads/logos/', $tipos, $this->userKey);
        $nome_gerentepro = $this->input->post('NOME_GERENTEPRO');
        $mapeamento = $this->input->post('MAPEAMENTO');
        $usuario = $this->input->post('USUARIO');

        $this->temas->novoTemplate($this->userKey.".".$enviar['ext'], $this->input->post('COR_PADRAO')); // Atualiza o Logo e a Cor
        $this->users->updateChave($nome_gerentepro, $mapeamento, $usuario); // Atualiza o Nome de Exibição
    }

    /*public function editaEndereco(){

        $dados  =   array(
            'NOME_EMPRESA'  => $this->input->post('NOME_EMPRESA'),
            'CNPJ'      => $this->input->post('CNPJ'),
            'CEP'       => $this->input->post('CEP'),
            'ENDERECO'  => $this->input->post('ENDERECO'),
            'BAIRRO'    => $this->input->post('BAIRRO'),
            'CIDADE'    => $this->input->post('CIDADE'),
            'ESTADO'    => $this->input->post('ESTADO'),
            'TELEFONE'  => $this->input->post('TELEFONE'),
            'TEL_0800'  => $this->input->post('TEL_0800'),
            'SITE'      => $this->input->post('SITE'),
            'COD_CHAVE' => $this->userKey
        );

        if($this->users->getCadastro() == NULL){
            $this->users->novoCadastro($dados);
        } else {
            $this->users->updateCadastro($this->input->post());
        }

    }

    public function novaConta(){

        header('Access-Control-Allow-Origin: *');

        $chaveNova['CHAVE'] = md5(md5(($this->input->post('DOMINIO'))));
        $chaveNova['USUARIO'] = anti_injection($this->input->post('DOMINIO'));
        $chaveNova['EMPRESA'] = anti_injection($this->input->post('EMPRESA'));
        $chaveNova['RESPONSAVEL'] = anti_injection($this->input->post('EMAIL'));
        $chaveNova['VALIDADE'] = somaData_timestamp(date('Y-m-d'),$day=0,$mth=1,$yr=0);

        //$novoUsuario['SENHA'] = md5(md5(($this->input->post('SENHA'))));
        //$novoUsuario['NOME'] = anti_injection($this->input->post('NOME'));
        //$novoUsuario['USUARIO'] = anti_injection($this->input->post('EMAIL'));
        //$novoUsuario['TELEFONE'] = $this->input->post('TELEFONE');
        //$novoUsuario['COD_CHAVE'] = md5(md5(($this->input->post('DOMINIO'))));

        if($this->users->verificaChave($chaveNova['CHAVE'])){
            echo "ja tem";
        }else{
            $nova_chave = $this->users->novaChave($chaveNova);

            $novoUsuario['SENHA'] = md5(md5(($this->input->post('SENHA'))));
            $novoUsuario['NOME'] = anti_injection($this->input->post('NOME'));
            $novoUsuario['USUARIO'] = anti_injection($this->input->post('EMAIL'));
            $novoUsuario['TELEFONE'] = $this->input->post('TELEFONE');
            $novoUsuario['COD_CHAVE'] = $nova_chave;

            $this->users->novoUsuario($novoUsuario);

            $this->email->from("no-reply@gerentepro.com.br", "GerentePRO");
            $this->email->to($this->input->post('EMAIL'));
            //$this->email->Cc("lucas.codemax@gmail.com");
            $this->email->subject(utf8_decode("Bem-vindo ao GerentePRO!"));

            
            $dataMail['USUARIO']       = $chaveNova['USUARIO'];
            $dataMail['EMAIL_USUARIO'] = $novoUsuario['USUARIO'];
            $dataMail['SENHA_USUARIO'] = $this->input->post('SENHA');
            $dataMail['logotipo']      = $this->temas->getLogo();

            $htmlMail = $this->parser->parse('email/bemvindo', $dataMail, true);
            $this->email->message($htmlMail);
            $this->email->send(); 

            //////////////////////// NÃO MEXER AQUI PELO AMOR DE DEUS!! /////////////////////////

            header('Access-Control-Allow-Origin: *');

            echo '<div style="font:14px Lucida Sans, Tahoma, Arial; color:#000; padding:5px;">
                    <h4>Bem-vindo ao GerentePRO!</h4>
                    <p>Aguarde um email em <b>'.$chaveNova['RESPONSAVEL'].'</b> com as
        informaçoes de login. Se este endereço de email estiver
        incorreto, entre em contato com o suporte.</p>

                    <p>Acompanhe todas as novidades, dicas e tutoriais do 
        GerentePRO em nosso blog.</p>

                    <p>Esta é a sua Central de Cliente:<br />
                        <a href="http://'.$chaveNova['USUARIO'].'.gerentepro.com.br"><h5 style="margin-top:0px;">http://'.$chaveNova['USUARIO'].'.gerentepro.com.br</h5></a>
                    </p>
                </div>';
        }
    }

    public function getNomeChave(){
        echo $this->users->nome_chave();
    }

    public function extratoCliente(){
        $extrato = $this->input->post('MES_EXTRATO');
        $data['financeiro'] = $this->financeiro->getExtrato($this->input->post('CLIENTE'), $extrato);
        $data['por_data'] = $this->financeiro->getExtratoGroup($this->session->userdata('clienteLogado'));

        $this->load->view('central/pages/extrato_detalhe', $data);
    }

    public function getProdutoByCatg($catg){
        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('COD_CATEGORIA', $catg);

        $sql = $this->db->get('produtos');

        if($sql->num_rows > 0){
            echo json_encode($sql->result());
        }else{
            return NULL;
        }
    }
    public function getDominios(){
        echo '<select id="ext">'."\n";
        foreach ($this->dominios->getAll() as $domain) {
            echo "\t".'<option value="'.$domain->EXTENSAO.' ">'.$domain->EXTENSAO.'</option>'."\n";
        }
        echo "</select>\n";
    }

    public function resultWhois($dom){

        $domain = trim($dom);
        $dot = strpos($domain, '.');
        $dominio = substr($domain, 0, $dot);
        $extensao = substr($domain, $dot+1);

        $lista = array(); //Lista de preferências
        array_push($lista, $domain);  // Se o dominio não estiver na lista, adiciona..
        
        //$this->whois->getWhois($dominio, $extensao);
        $data['lista'] = $domain;
        
        $this->load->view('forms/result_whois', $data);
    }

    public function update_gridCliente($id){
        $data['lista_cadastros'] = $this->cadastros->get_grupo(1, $this->userKey);
        $data['lista_total'] = $this->cadastros->get_num(1, $this->userKey);

        $this->load->view($data);
    }

    public function pagarFatura(){
        switch ($_GET['PAGAMENTO']) {
            case 'pagseguro': 
                $this->pagseguro->enviarPagto($_GET, $this->pagseguro->config($this->userKey));
                break;
            case 'moip': 
                $this->moip->enviarPagto($_GET, $this->moip->config($this->userKey));
                break;
        }
        
    }
	
    public function statusPagseguro(){
        print_r($this->gateway->status_pagseguro($_GET));
    }

    public function statusMoip($get){
        $retorno = $this->moip->status($get, $this->moip->config($this->userKey));
        $xml = simplexml_load_string($retorno); 

        print_r($xml);

        if($xml->RespostaConsultar->Autorizacao->Pagamento->Status == "Concluido"){
            echo "foi pago";
        }else{
            echo "não foi pago";
        }
    }

    public function listAccounts(){
		
    	$whmusername = "maptecco";
    	$whmpassword = "2011_maptec88";
    	
    	$query = "https://whm.maptec.com.br:2087/xml-api/listaccts";
    	
    	$curl = curl_init();		
    	# Create Curl Object
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);	
    	# Allow self-signed certs
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 	
    	# Allow certs that do not match the hostname
    	curl_setopt($curl, CURLOPT_HEADER,0);			
    	# Do not include header in output
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);	
    	# Return contents of transfer on curl_exec
    	$header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpassword) . "\n\r";
    	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);  
    	# set the username and password
    	curl_setopt($curl, CURLOPT_URL, $query);			
    	# execute the query
    	$result = curl_exec($curl);
    	if ($result == false) {
		  error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");	
    	   # log error if curl exec fails
    	}
    	curl_close($curl);
    	
    	return $result;

    }

    public function del_DominiosClientes(){

        $lista = $this->input->post('item');

        foreach ($lista as $key) {
            $this->db->where('CODIGO', $key);
            $sql = $this->db->delete('cadastros_dominios');
        }

        if($sql){
            echo 'ok';
        }else{
            echo 'falhou';
        }

        
    }

    public function lista_bancos(){
        $sql = $this->db->get('bancos');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }

    public function lista_estados(){
        $sql = $this->db->get('estados');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }

    public function lista_cidades($sigla){
        $this->db->where('SIGLA', $sigla);
        $sql_estado = $this->db->get('estados');

        $this->db->where('COD_ESTADO', $sql_estado->row('CODIGO'));
        $sql = $this->db->get('cidades');
        
        if($sql->num_rows > 0){
            echo json_encode($sql->result());
        }else{
            echo 'selecione um estado';
        }
    }

    public function getClientes(){
        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('GRUPO', 1);
        
        $sql = $this->db->get('cadastros');
        
        if($sql->num_rows > 0){
            echo json_encode($sql->result());
            //echo json_encode(($sql->result('TIPO_PESSOA') == "juridica") ? $sql->result('RAZAO_SOCIAL') : $sql->result('NOME_COMPLETO'));
        }else{
            echo 'selecione um cliente';
        }
    }

    public function getClientes_html(){
        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('GRUPO', 1);
        
        $sql = $this->db->get('cadastros');
        
        if($sql->num_rows > 0){
            return $sql->result();
            //echo json_encode(($sql->result('TIPO_PESSOA') == "juridica") ? $sql->result('RAZAO_SOCIAL') : $sql->result('NOME_COMPLETO'));
        }else{
            return NULL;
        }
    }

    public function getUsuarios(){
        $this->db->where('COD_CHAVE', $this->userKey);
        
        $sql = $this->db->get('usuarios');
        
        if($sql->num_rows > 0){
            echo json_encode($sql->result());
            //echo json_encode(($sql->result('TIPO_PESSOA') == "juridica") ? $sql->result('RAZAO_SOCIAL') : $sql->result('NOME_COMPLETO'));
        }else{
            echo 'selecione um cliente';
        }
    }

    public function tipos_conta(){
        $sql = $this->db->get('contas_tipo');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }


    public function whois($dom){
	//$xml = simplexml_load_string($this->exibeCliente($id));
	//$xml = simplexml_load_string($this->listAccounts());
	//$data['xml'] = $xml->acct;
	//$data['xml'] = $xml->cliente;
	
	//$this->load->view('pop-ups/exibeTicket_view', $data);
	
		$domain = trim($dom);

		$dot = strpos($domain, '.');
		$dominio = substr($domain, 0, $dot);
		$extensao = substr($domain, $dot+1);
		
		if(substr($extensao, -2) == "br"){
			// Agora sim eu posso trabalhar com o whois do Registro.br
			if($this->whois->isAvailable($dominio, $extensao)){
				$array['domainName'] = $domain;
				$array['domainStatus'] = 'Disponivel';
			}else{
				$array['domainName'] = $domain;
				$array['domainStatus'] = 'Indisponivel';
				$array['domainInfo'] = $this->whois->isWhois($dominio, $extensao);
			}
		}else{

			if($whois = $this->get_whois($dominio, $extensao)){
				
				
				$role = explode("\n", $whois);
			
				//--------------------------------------------  Até aqui ta maneiro... agora que o bicho pega! ------------------------
				
				$regra = '';
				switch($extensao){
					case 'edu':
					case 'net':
					case 'com': $regra = substr($role[6], 0, 12) == "No match for"; break;
					case 'net.br':
					case 'com.br': $regra = substr($role[11], 0, 21) == "% No match for domain" || substr($role[8], 0, 21) == "% No match for domain"; break;
				}
				
				if($regra){ // aqui verifica o tipo (.net|.com)
					$array['domainName'] = $domain;
					$array['domainStatus'] = 'Disponivel';
				}else{
					$array['domainName'] = $domain;
					$array['domainStatus'] = 'Indisponivel';
					$array['domainInfo'] = $whois;
				}
				
			}else{
				$array['erro'] = 'Desculpe, o domínio não é valido ou suportado.';
			}
		}
		
		print_r($array);
    }
	
	public function get_whois($domain, $tld){        
        if(!$this->whois->ValidDomain($domain.'.'.$tld) ){
            return false;
        }
        
        if( $this->whois->Lookup($domain.'.'.$tld)){
            return $this->whois->GetData(1);
        }else{
            // se ele não conseguiu com dominios internacionais, ele tentará com brasileiros;
            echo "essa e a hora do registro.br";
        }
    } // Fim da função "get_whois"

    public function cliente_fatura($id){
        $data['fatura'] = $this->faturas->getById($id);
        $data['fatura_itens'] = $this->faturas->getItens($id);
        $data['cliente'] = $this->cadastros->getDados($data['fatura']->CLIENTE);
        $data['fatura_status'] = $this->faturas->getStatus($id);
        
        $this->load->view('central/pages/faturas_detalhe', $data);
    }

    public function lista_categoris($CODIGO){
        $this->db->where('COD_DEPARTAMENTO', $CODIGO);
        $sql = $this->db->get('suporte_categorias');

        
        if($sql->num_rows > 0){
            echo json_encode($sql->result());
        }else{
            echo 'selecione um estado';
        }
    }
    /* 
    * Diálogos em Modal
    */
/*
    public function trocaLogo(){
        $this->form_validation->set_rules('dominio', 'dominio', 'trim|required');
        $this->form_validation->set_error_delimiters('','');
    
        if($this->form_validation->run() == FALSE){
            $this->load->view('pop-ups/ver_trocaLogo');

        }else{
            echo 'essa é a hora do submit';
        }

        $this->load->view('pop-ups/ver_trocaLogo');
    }

    public function exibeServico($id){
        $data['xml'] = $this->servicos->getById($id);
        $data['servidor'] = $this->produtos->getServidoresById($data['xml']->COD_SERVIDOR);
        $data['produtos'] = $this->produtos->getProdutosByCatg($data['xml']->CATG_PRODUTO);
        $data['cliente'] = $this->cadastros->getDados($data['xml']->CLIENTE);

        $this->load->view('pop-ups/ver_servico', $data);
    }

    public function addServico(){
        $data['clientes'] = $this->cadastros->get_grupo(1, $this->userKey);

        $this->load->view('pop-ups/add_servico', $data);
    }

    public function extratoCliente_admin(){

        $extrato = $this->input->post('MES_EXTRATO');
        $data['financeiro'] = $this->financeiro->getExtrato($this->input->post('CLIENTE'), $extrato);
        $data['por_data'] = $this->financeiro->getExtratoGroup($this->input->post('CLIENTE'));
        $data['dados'] = $this->cadastros->getDados($this->input->post('CLIENTE'));

        $this->load->view('pop-ups/extrato_cliente_detalhe', $data);
    }

    public function verServidor($id){
        $data['servidor'] = $this->produtos->getServidoresById($id);
        $data['fornecedores'] = $this->cadastros->get_grupo(2);

        $this->load->view('pop-ups/ver_servidor', $data);
    }

    public function addServidor(){
        $data['titulo'] = "Novo Servidor";
        $data['fornecedores'] = $this->cadastros->get_grupo(2);
        $this->load->view('pop-ups/add_servidor', $data);
    }
    
    public function verAlterarCadastro($id){
        $data['titulo'] = "Cadastro ".$id;

        $this->load->view('pop-ups/ver_alterar_cadastro', $data);
    }

    
    public function detalheDominio($id){
        $data['titulo'] = "Cadastro ".$id;
        $data['dominio'] = $this->dominios->getById($id);

        $this->load->view('pop-ups/ver_dominio', $data);
    }

    public function dominioCliente($id){
        $data['titulo'] = "Cadastro ".$id;
        //$data['xml'] = $this->servicos->getDominioCliente($id);
        //$data['cliente'] = $this->cadastros->get_id($data['xml']->CLIENTE);
        //$data['lista_registrantes'] = $this->produtos->getProdutosByCatg($data['xml']->REGISTRANTE);

        $this->load->view('pop-ups/ver_livro', $data);
    }

    
    public function alterarSenha($id){
        $data['titulo'] = "Alterar Senha ".$id;

        $this->load->view('pop-ups/ver_alterar_senha', $data);
    }
    
    public function verGateway($dados){ 

        $array = explode("_", $dados);
        switch ($array[0]) {
            case 'pagseguro': $data['dados'] = $this->pagseguro->config($array[1]); break;
            case 'boleto': $data['dados'] = $this->boleto->config($array[1]); break;
            case 'moip': $data['dados'] = $this->moip->config($array[1]); break;
        }

        $data['userKey'] = $this->userKey;
        
        $this->load->view('pop-ups/ver_gateway_'.$array[0], $data);
        
    }

    public function verRegistrante($dados){ 

        $array = explode("_", $dados);
        switch ($array[0]) {
            case 'manual': $data['dados'] = $this->dominios->config($array[1]); break;
        }
        
        $this->load->view('pop-ups/ver_registrante_'.$array[0], $data);
        
    }
    
    

    public function addDominio(){
        $data['titulo'] = "Novo Dominio";
        $this->load->view('pop-ups/add_dominio', $data);
    }

    
    
    public function addDominioCliente(){
        $data['titulo'] = "Novo Dominio";
        $this->load->view('pop-ups/add_cliente_dominio', $data);
    }
    public function get_pedido($id){
        //$xml = simplexml_load_string($this->exibeCliente($id));
        //$xml = simplexml_load_string($this->listAccounts());
        //$data['xml'] = $xml->acct;

        $data['pedido']        = $this->pedidos->getById($id);
        $data['pedido_itens']  = $this->pedidos->getItens($id);
        $data['cliente']       = $this->cadastros->getDados($data['pedido']->CLIENTE);
        $data['pedido_status'] = $this->pedidos->getStatus($id);
        
        $this->load->view('pop-ups/ver_pedido', $data);
    }
    
    public function get_produto($id){
        $xml = simplexml_load_string($this->exibeCliente($id));
        //$xml = simplexml_load_string($this->listAccounts());
        //$data['xml'] = $xml->acct;
        $data['xml'] = $xml->cliente;
        
        $this->load->view('pop-ups/ver_produto', $data);
    }

    public function get_fatura($id){
        $data['fatura'] = $this->faturas->getById($id);
        $data['fatura_itens'] = $this->faturas->getItens($id);
        $data['cliente'] = $this->cadastros->get_id($data['fatura']->CLIENTE);
        $data['transacao'] = $this->financeiro->getTransacoesByPago($id);
        
        $this->load->view('pop-ups/ver_fatura', $data);
    }

    public function get_confirmaPagto($id){
        $data['fatura'] = $this->faturas->getById($id);        
        $this->load->view('pop-ups/ver_confirmaPagamento', $data);
    }

    /* 
    * Operações em JSON 
    * Submits [cadastrar] [excluir] [editar]
    *//*
    public function submitAdd_produto(){
        $produto_id = $this->produtos->novo($this->input->post());
        
        // se for escolhido um servidor..
        if($this->input->post('SERVIDOR') != ""){
            if($this->produtos->novoModulo($produto_id, $this->input->post(), $this->input->post('MODULO'))){
                echo "ok";
            }
        }
    }

    public function submitAdd_grupoUsuarios(){

        $dados = array(
            'DESCRICAO'       => $this->input->post('DESCRICAO'),
            'EMAIL'           => $this->input->post('EMAIL'),
            'COD_CHAVE'       => $this->userKey
        );        

        if ($grupo_id = $this->users->novo_grupoUsuarios($dados)) {    
            foreach ($this->input->post('COD_USUARIO') as $key) {
                $lista = array(
                    'COD_GRUPO'       => $grupo_id,
                    'COD_USUARIO'     => $key,
                    'COD_CHAVE'       => $this->userKey
                );

                $this->db->insert('usuarios_grupos_lista', $lista);
            }
            echo "foi";
        }
    }

    public function submitEdit_suporteDepartamentos(){
        if($this->tickets->updateDepartamentos($this->input->post('CODIGO'), $this->input->post())){
            echo "ok";
        }
    }
    public function submitEdit_grupoUsuario(){
        /*
            1. atualiza o grupo
            2. deleta os registro da tabela "listas" e cadastra novamente
        */

/*        $id = $this->input->post('CODIGO');

        $dados = array(
            'DESCRICAO'       => $this->input->post('DESCRICAO'),
            'EMAIL'           => $this->input->post('EMAIL')
        );

        $this->users->updateGrupoUsuario($dados, $this->input->post('COD_USUARIO'), $id);
        echo "ok";
        
    }

    public function submitEdit_suporteCategoria(){
        $dados = $this->input->post();

        if($this->tickets->updateCategorias($dados['CODIGO'], $dados)){
            print "ok";
        }
    }

    public function submitAdd_suporteDepartamentos(){
        if($this->tickets->novoDepartamento($this->input->post())){
            echo "ok";
        }else{
            echo "Ocorreu um erro, Contate o Administrador do Sistema";
        }
    }

    public function submitAdd_dominio(){
        $this->dominios->novoDominio($this->input->post());
    }

    public function submitAdd_DominioCliente(){

        $this->load->library('form_validation');
        //$this->form_validation->set_rules('RAZAO_SOCIAL', 'RAZAO_SOCIAL', 'required'|'callback__check_sql');
        $this->form_validation->set_rules('CLIENTE', 'CLIENTE', 'trim|required');
        //$this->form_validation->set_rules('NOME_COMPLETO', 'NOME_COMPLETO', 'trim|required');
        $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                      <div id="sticky">
                                                      <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                      <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                      <p>',
                                                    '</p></div></div>');
        
        if($this->form_validation->run() == TRUE){
            $dados  =   array(
                'CLIENTE'       => $this->input->post('CLIENTE'),
                'DOMINIO'       => $this->input->post('DOMINIO'),
                'REGISTRANTE'   => $this->input->post('REGISTRANTE'),

                'NS1'           => $this->input->post('NS1'),
                'NS2'           => $this->input->post('NS2'),
                'NS3'           => $this->input->post('NS3'),
                'NS4'           => $this->input->post('NS4'),

                'IP1'           => $this->input->post('IP1'),
                'IP2'           => $this->input->post('IP2'),
                'IP3'           => $this->input->post('IP3'),
                'IP4'           => $this->input->post('IP4'),

                'VENCIMENTO'    => $this->input->post('VENCIMENTO'),
                'COD_CHAVE'     => $this->userKey
            );

            $SQL    =   $this->servicos->addDominioCliente($dados);
            
            if($SQL)
                echo "ok";
            
        } else {
            echo 'nao foi';
        }
    } 

    public function submitEdit_dominioCliente(){

        $this->load->library('form_validation');
        //$this->form_validation->set_rules('RAZAO_SOCIAL', 'RAZAO_SOCIAL', 'required'|'callback__check_sql');
        $this->form_validation->set_rules('DOMINIO', 'DOMINIO', 'trim|required');
        //$this->form_validation->set_rules('NOME_COMPLETO', 'NOME_COMPLETO', 'trim|required');
        $this->form_validation->set_error_delimiters('<div id="error" style="display:none">
                                                      <div id="sticky">
                                                      <a class="ui-notify-close ui-notify-cross" href="#"><img src="images/closelabel.png" border="0" /></a>
                                                      <div style="float:left;margin:0 10px 0 0"><img src="images/ico_error.png" alt="warning" /></div>
                                                      <p>',
                                                    '</p></div></div>');
        
        if($this->form_validation->run() == TRUE){
            $dados  =   $this->input->post();
            $sql    =   $this->servicos->updateDominioCliente($dados);
            
            if($sql)
                echo "ok";
            
        } else {
            echo 'Por favor, preencha o campo Domínio';
        }       
    } 

    public function submitEdit_produto(){
        $this->produtos->updateProduto($this->input->post(), $this->input->post('CODIGO'));
        
        // se for escolhido um servidor..
        if($this->input->post('SERVIDOR') != ""){
            $servidor = $this->input->post('SERVIDOR');
            $modulo   = $this->input->post('MODULO');
            $id       = $this->input->post('CODIGO');
            if($this->produtos->updateModulo($this->input->post(), $id, $modulo, $servidor)){
                echo "ok";
            }else{
                echo "falhou";
            }
        }
    }

    public function submitEdit_servico(){
            
        $produto    = $this->produtos->getProdutosById($this->input->post('COD_PRODUTO'));
        $servidor   = $this->produtos->getServidoresById($produto->COD_SERVIDOR);
        $servico    = $this->servicos->getById($this->input->post('CODIGO'));

        // Troca o plano da conta
        if($this->input->post('COD_PRODUTO') != $servico->COD_PRODUTO){

            switch ($servidor->MODULO) {
                case 'cpanel':
                    $set['USUARIO']         = $servico->MOD_USUARIO;
                    $set['NOVO_PLANO']      = $servidor->SERV_USER."_".limpaChars($produto->DESCRICAO);

                    $server['whm_server']   = $servidor->IP;
                    $server['whm_user']     = $servidor->SERV_USER;
                    $server['whm_password'] = $servidor->SERV_PASS;

                    $this->cpanel->trocaPlano($server, $set);

                    break;
            }
        }

        // Altera o usuário da conta
        if($this->input->post('MOD_USUARIO') != $servico->MOD_USUARIO){
            switch ($servidor->MODULO) {
                case 'cpanel':
                    $set['USUARIO']         = $servico->MOD_USUARIO;
                    $set['NOVO_USUARIO']    = $this->input->post('MOD_USUARIO');
                    $set['DOMINIO']         = $this->input->post('DOMINIO');

                    $server['whm_server']   = $servidor->IP;
                    $server['whm_user']     = $servidor->SERV_USER;
                    $server['whm_password'] = $servidor->SERV_PASS;

                    $this->cpanel->renomeiaConta($server, $set);
                    break;
            }
        }

        // Troca a senha da conta
        if($this->input->post('MOD_SENHA') != $servico->MOD_SENHA){
            switch ($servidor->MODULO) {
                case 'cpanel':
                    $set['USUARIO']         = $servico->MOD_USUARIO;
                    $set['SENHA']           = $this->input->post('MOD_SENHA');

                    $server['whm_server']   = $servidor->IP;
                    $server['whm_user']     = $servidor->SERV_USER;
                    $server['whm_password'] = $servidor->SERV_PASS;

                    $this->cpanel->trocaSenha($server, $set);
                    break;
            }
        }

        //$cad['CLIENTE']         = $this->input->post('CLIENTE');
        $cad['PROX_VENCIMENTO'] = dateTimestamp($this->input->post('PROX_VENCIMENTO'));
        $cad['COD_PRODUTO']     = $this->input->post('COD_PRODUTO');
        $cad['DOMINIO']         = $this->input->post('DOMINIO');
        $cad['MOD_USUARIO']     = substr(limpaChars($this->input->post('MOD_USUARIO')), 0, 8);
        $cad['MOD_SENHA']       = $this->input->post('MOD_SENHA');
        $cad['CICLO']           = $this->input->post('CICLO');

        if($this->servicos->updateServico($cad, $this->input->post('CODIGO'))){
            echo "ok";
        }        
    }

    public function submitAdd_servico(){
        $cad['CLIENTE']         = $this->input->post('CLIENTE');
        $cad['PROX_VENCIMENTO'] = dateTimestamp($this->input->post('PROX_VENCIMENTO'));
        $cad['CATG_PRODUTO']    = $this->input->post('CATG_PRODUTO');
        $cad['COD_PRODUTO']     = $this->input->post('COD_PRODUTO');
        $cad['COD_SERVIDOR']    = $this->produtos->getServidoresByProd($this->input->post('COD_PRODUTO'));
        $cad['DOMINIO']         = $this->input->post('DOMINIO');
        $cad['MOD_USUARIO']     = substr(limpaChars($this->input->post('MOD_USUARIO')), 0, 8);
        $cad['MOD_SENHA']       = $this->input->post('MOD_SENHA');
        $cad['STATUS']          = 1;
        $cad['CICLO']           = $this->input->post('CICLO');
        $cad['COD_CHAVE']       = $this->userKey;

        if($this->servicos->novo($cad)){
            $servidor = $this->produtos->getServidoresById($cad['COD_SERVIDOR']);
            $produto = $this->produtos->getProdutosById($cad['COD_PRODUTO']);
            
            //Agora cria a conta do serviço nos servidores...
            switch ($servidor->MODULO) {
                case 'cpanel':
                    $set['USUARIO'] = $cad['MOD_USUARIO'];
                    $set['SENHA']   = $cad['MOD_SENHA'];
                    $set['DOMINIO'] = $cad['DOMINIO'];
                    $set['PLANO']   = $servidor->SERV_USER."_".limpaChars($produto->DESCRICAO);
                    $set['EMAIL']   = "";

                    $server['whm_server']   = $servidor->IP;
                    $server['whm_user']     = $servidor->SERV_USER;
                    $server['whm_password'] = $servidor->SERV_PASS;

                    $this->cpanel->addConta($server, $set);
                    break;
            }

            echo "ok";

        }else{
            echo "Ocorreu um erro. ".trigger_error();
        }
    }

    public function submitSuspende_servico($id){
        $servico  = $this->servicos->getById($id);
        $servidor = $this->produtos->getServidoresById($servico->COD_SERVIDOR);
        
        $this->servicos->suspenderServico($id);

        switch ($servidor->MODULO) {
            case 'cpanel':

                $server['whm_server']   = $servidor->IP;
                $server['whm_user']     = $servidor->SERV_USER;
                $server['whm_password'] = $servidor->SERV_PASS;

                $this->cpanel->bloqueioConta($server, $servico->MOD_USUARIO);
                break;
        }

        echo "ok";

    }
    public function submitEncerrar_servico($id){

        $servico  = $this->servicos->getById($id);
        $servidor = $this->produtos->getServidoresById($servico->COD_SERVIDOR);
        
        switch ($servidor->MODULO) {
            case 'cpanel':

                $server['whm_server']   = $servidor->IP;
                $server['whm_user']     = $servidor->SERV_USER;
                $server['whm_password'] = $servidor->SERV_PASS;

                $this->cpanel->delConta($server, $servico->MOD_USUARIO);
                break;
        }

        $this->servicos->delete($id);

        echo "ok";

    }
    public function submitReativar_servico($id){
        $servico  = $this->servicos->getById($id);
        $servidor = $this->produtos->getServidoresById($servico->COD_SERVIDOR);
        
        $this->servicos->reativarServico($id);

        switch ($servidor->MODULO) {
            case 'cpanel':
            
                $server['whm_server']   = $servidor->IP;
                $server['whm_user']     = $servidor->SERV_USER;
                $server['whm_password'] = $servidor->SERV_PASS;

                $this->cpanel->desbloqueioConta($server, $servico->MOD_USUARIO);
                break;
        }

        echo "ok";

    }

    public function submitEdit_servidor(){
        $this->produtos->updateServidor($this->input->post(), $this->input->post('CODIGO'));
    }

    public function submitEdit_dominio(){
        $this->dominios->updateDominio($this->input->post(), $this->input->post('CODIGO'));
    }
    
    public function submitEdit_pagseguro(){
        $dados['TOKEN'] = $this->input->post('TOKEN');
        $dados['EMAIL'] = $this->input->post('EMAIL');
        $dados['COD_CHAVE'] = $this->userKey;

        if($this->pagseguro->config($this->userKey) == NULL){
            echo ($this->pagseguro->novoConfig($dados)) ? "foi": "falhou";
        }else{
            echo ($this->pagseguro->editaConfig($dados, $this->userKey)) ? "foi": "falhou";
        }
    }

    public function submitEdit_moip(){
        $dados['TOKEN']        = $this->input->post('TOKEN');
        $dados['KEY']          = $this->input->post('KEY');
        $dados['PAGTO_DIRETO'] = (@$this->input->post('PAGTO_DIRETO')) ? '1' : '0';
        $dados['COD_CHAVE']    = $this->userKey;

        if($this->moip->config($this->userKey) == NULL){
            echo ($this->moip->novoConfig($dados)) ? "foi": "falhou";
        }else{
            echo ($this->moip->editaConfig($dados, $this->userKey)) ? "foi": "falhou";
        }
    }

    public function submitEdit_boleto(){
        if($this->boleto->config($this->userKey) == NULL){
            echo ($this->boleto->novoConfig($this->input->post())) ? "foi": "falhou";
        }else{
            echo ($this->boleto->editaConfig($this->input->post(), $this->userKey)) ? "foi": "falhou";
        }
    }

    public function submitRegistrante_manual(){
        $dados['EMAIL'] = $this->input->post('EMAIL');
        $dados['COD_CHAVE'] = $this->userKey;

        if($this->dominios->config($this->userKey) == NULL){
            echo ($this->dominios->novoConfig($dados)) ? "foi": "falhou";
        }else{
            echo ($this->dominios->editaConfig($dados, $this->userKey)) ? "foi": "falhou";
        }
    }

    public function submitDel_gateway(){
        $array = explode('_', $_GET['dados']);
        $sql = FALSE;
        switch ($array[0]) {
            case 'pagseguro': $sql = $this->pagseguro->deleteConfig($array[1]); break;
            case 'boleto': $sql = $this->boleto->deleteConfig($array[1]); break;
            case 'moip': $sql = $this->moip->deleteConfig($array[1]); break;
        }
        echo ($sql) ? "foi": "falhou";
    }

    public function submitDel_registrante(){
        $array = explode('_', $_GET['dados']);
        $sql = FALSE;
        switch ($array[0]) {
            case 'manual': $sql = $this->dominios->deleteConfig($array[1]); break;
        }
        echo ($sql) ? "foi": "falhou";
    }

    public function submitDel_servidor(){
        $this->produtos->deleteServidor($this->input->post('CODIGO'));
    }

    public function submitDel_produto(){
        foreach ($this->input->post('item') as $item) {
            $this->produtos->deleteProduto($item);
        }   
    }

    public function submitDel_dominio(){
        foreach ($this->input->post('item') as $item) {
            $this->dominios->deleteDominio($item);
        } 
    }

    public function submitDel_suporteDepartamentos(){
        foreach ($this->input->post('item') as $item) {
            $this->tickets->deleteDepartamentos($item);
        } 
    }

    public function submitAdd_servidor(){

        if($this->produtos->novoServidor($this->input->post())){
            echo 'ok';
        }else{
            echo 'Ocorreu um erro ao tentar inserir um servidor, por favor tente novamente.';
        }
    }

    public function submitModulo_servidor($dados){
        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('MODULO', $dados);

        $sql = $this->db->get('produtos_servidores');
        
        if($sql->num_rows > 0){

            foreach ($sql->result() as $value) {
                
                    $json[] = array('CODIGO' => $value->CODIGO,
                                    'DESCRICAO' => $value->DESCRICAO.' ['.$value->IP.']');
            }
            
            echo json_encode($json);
            
        }else{
            return NULL;
        }
    }
    public function submit_confirmaPagto(){
        $fatura = $this->faturas->getById($this->input->post('FATURA'));

        $novo['FATURA']         = $fatura->CODIGO;
        $novo['CLIENTE']        = $fatura->CLIENTE; //HASH
        $novo['VALOR']          = $fatura->VALOR;
        $novo['FORMA_PAGTO']    = $this->input->post('FORMA_PAGTO');
        $novo['STATUS']         = 'pago';
        $novo['COD_CHAVE']      = $this->userKey;

        if($this->financeiro->novaTransacao($novo)){
            $this->faturas->novoStatus('pago', $fatura->CODIGO);
            echo "ok";
        } 
    }*/

   
}