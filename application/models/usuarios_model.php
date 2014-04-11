<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    /*
      public function __construct(){
      parent::__construct();
      } */
      
      public $erro_existe;
      public $userKey;

    public function __construct(){
        parent::__construct();
        $this->userKey = $this->getChave(userKey());
    }

    public function get_usuario($usuario, $senha) {

        $this->db->where('USUARIO', $usuario);
        $this->db->where('SENHA', md5(md5($senha)));

        $sql = $this->db->get('usuarios');
        
        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return false;
        }

    }

    public function getAll(){
        $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios');
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return false;
        }

        $sql->free_result();
    }

    public function get_grupos(){
       // $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios_grupos');
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return false;
        }

        $sql->free_result();
    }

    public function get_grupo($codigo){
        $this->db->where('CODIGO',$codigo);
        $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios_grupos');
        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return false;
        }

        $sql->free_result();
    }
    public function getGrupoById($codigo){
        $this->db->where('CODIGO',$codigo);
        $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios_grupos');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return false;
        }

        $sql->free_result();
    }

    public function getListaByGrupo($grupo){
        $this->db->where('COD_GRUPO',$grupo);
        $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios_grupos_lista');
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return false;
        }

        $sql->free_result();
    }

    public function inGrupo($grupo, $usuario){
        $this->db->where('COD_GRUPO', $grupo);
        $this->db->where('COD_USUARIO', $usuario);
        $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('usuarios_grupos_lista');
        if($sql->num_rows > 0){
            return true;
        }else{
            return NULL;
        }
    }

    public function getUsuarioById($id, $chave = '') {
        $this->db->where('CODIGO', $id);
        $this->db->where('COD_CHAVE', ($chave != "") ? $chave : $this->userKey);

        $sql = $this->db->get('usuarios');
        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return false;
        }
    }

    public function novoUsuario($dados){
        if(!empty($dados))
        $this->db->insert('usuarios', $dados);
        
        return $this->db->insert_id();
    }

    public function uploadTema(){
        //$this->db->insert('tb_produtos', $dados);
        //return TRUE;
        

    
    
        
        //return $this->upload->do_upload();
        
        /*
        $this->db->insert('tb_produtos_banners', $data);
        $produto_id = $this->db->insert_id();
        
        mkdir('./uploads/banners/'.$produto_id, 0744);
        //************************************************************************************************************
        $pathToSave = './uploads/banners/'.$produto_id.'/';
        
        
        
        // Fazemos o upload normalmente, igual no exemplo anterior
        $arquivoTmp = $_FILES['arquivo']['tmp_name'];
        $arquivo = $pathToSave.$_FILES['arquivo']['name'];
            
        if(move_uploaded_file( $arquivoTmp, $arquivo))      
        
        echo '<script>alert("Banner cadastrado com sucesso!"); window.location="'.base_url().'ServiceStore/produtos/banners";</script>';
        */
    }

    public function nome_chave(){
        $this->db->where('CODIGO', $this->userKey);
        $sql = $this->db->get('chaves');

        if($sql->num_rows > 0){
            return $sql->row("EMPRESA");
        }else{
            return false;
        }
        
        $sql->free_result();
    }

    public function updateChave($nome = '', $mapeamento = '', $user = ''){
        $this->db->where('CODIGO', $this->userKey);
        $set['EMPRESA'] = $nome;
        $set['USUARIO'] = $user;
        $set['MAPEAMENTO'] = $mapeamento;

        if($this->db->update('chaves', $set)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getCadastro(){
        $this->db->where('COD_CHAVE', $this->userKey);
        $sql = $this->db->get('chaves_cadastro');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }

     public function novoCadastro($dados){
        $sql    =   $this->db->insert('chaves_cadastro', $dados);
        
        if($sql){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function updateCadastro($dados){
        $this->db->where('COD_CHAVE', $this->userKey);

        if($this->db->update('chaves_cadastro', $dados)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function update($id, $dados){
        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('CODIGO', $id);

        if($this->db->update('usuarios', $dados)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id){

        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('CODIGO', $id);

        if($this->db->delete('usuarios')){
            return TRUE;
        } else{
            return NULL;
        }
    }


    public function getAll_chaves(){
        $sql = $this->db->get('chaves');

        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return false;
        }
        
        $sql->free_result();
    }

    public function get_chave($id_chave){
        $this->db->where('CODIGO', $id_chave);
        $sql = $this->db->get('chaves');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return false;
        }
        
        $sql->free_result();
    }

    public function getChave($hash){
        $this->db->where('CHAVE', $hash);
        $sql = $this->db->get('chaves');

        if($sql->num_rows > 0){
            return $sql->row('CODIGO');
        }else{
            return false;
        }
        
        $sql->free_result();
    }


    public function verificaChave($hash){
        $this->db->where('CHAVE', $hash);
        $sql = $this->db->get('chaves');

        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return false;
        }
    }

    public function novaChave($dados){
        if(!empty($dados))
        $this->db->insert('chaves', $dados);
        
        return $this->db->insert_id();
    }

    public function logged() {
        $logged = $this->session->userdata('logged');
        if (!isset($logged) || $logged != TRUE) {
            redirect('painel/login');
        }
    }

    public function clienteLogado() {
        return $this->session->userdata('clienteLogado') ? TRUE : redirect('aluno/login');
    }

    

    public function check_cliente(){
        if($this->erro_existe != ""){
            echo '<span class="error_cad">'.$this->erro_existe.'</span>';
        }
    }

    public function check_login($id, $chave){
        $this->db->where('CODIGO', $id);
        $this->db->where('COD_CHAVE', $chave);

        if($this->db->update('usuarios', array('ULTIMO_LOGIN' => date("Y-m-d H:i:s")))){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function novo_grupoUsuarios($dados){
        $sql  =  $this->db->insert('usuarios_grupos', $dados);

        if($sql) return $this->db->insert_id();

    }

    public function updateGrupoUsuario($dados, $lista, $id){

        $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('CODIGO', $id);

        if($this->db->update('usuarios_grupos', $dados)){

            $this->db->where('COD_GRUPO', $id);
            $this->db->delete('usuarios_grupos_lista');

            foreach ($lista as $key){
                $list = array(
                    'COD_GRUPO'       => $id,
                    'COD_USUARIO'     => $key,
                    'COD_CHAVE'       => $this->userKey
                );

                $this->db->insert('usuarios_grupos_lista', $list);
            }

            return TRUE;
        }else{
            return FALSE;
        }
    }


}   
