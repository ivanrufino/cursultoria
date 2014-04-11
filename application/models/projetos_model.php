<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos_model extends CI_Model{
    
    public $userKey;

    public function __construct(){
        parent::__construct();
        $this->userKey = $this->session->userdata('userKey');
    }

    // Retorna todos os registros
    public function getProjetosByCatg($catg){
        $this->db->where('COD_CATEGORIA', $catg);
        $sql = $this->db->get('projetos');
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }
    public function getProjetosById($codigo){
        $this->db->where('CODIGO', $codigo);
        $sql = $this->db->get('projetos');
        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }
     

    public function getCategorias($status=null){
        $this->db->order_by('STATUS DESC, CODIGO ASC' );
        if (!is_null($status)){
            $this->db->where('STATUS',$status);
        }
    	$sql = $this->db->get('projetos_categorias');
      //  DIE($this->db->last_query());
    	if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }

    public function getCategoriasById($id){
        $this->db->where('CODIGO', $id);
        $sql = $this->db->get('projetos_categorias');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }
    public function getCategoriasDisciplinaById($id){
        $this->db->where('CODIGO', $id);
        $sql = $this->db->get('categoria_disciplina');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }
    public function novoProjeto($dados){
        if(!empty($dados)){
            $this->db->insert('projetos', $dados);        
            return $this->db->insert_id();
        }
        return false;
    }
    public function  getProjetoDisciplina($cod_projeto,$cod_disciplina){
         $this->db->where('COD_PROJETO  ', $cod_projeto);
         $this->db->where('COD_DISCIPLINA  ', $cod_disciplina);
        $sql = $this->db->get('projeto_disciplina');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }

    public function novoProjetoDisciplina($dados) {
         if(!empty($dados)){
             if (is_null($this->getProjetoDisciplina($dados['COD_PROJETO'],$dados['COD_DISCIPLINA']))){
                $this->db->insert('projeto_disciplina', $dados);        
                return $this->db->insert_id();
             }
             RETURN true;
         }
         return false;
    
    }
     public function  getProjetoTopico($cod_projeto,$cod_topico){
         $this->db->where('COD_PROJETO  ', $cod_projeto);
         $this->db->where('COD_TOPICO  ', $cod_topico);
        $sql = $this->db->get('projeto_topico');

        if($sql->num_rows > 0){
            return $sql->row();
        }else{
            return NULL;
        }
    }
    public function novoProjetoTopicos($dados) {
         if(!empty($dados)){
        if (is_null($this->getProjetoTopico($dados['COD_PROJETO'],$dados['COD_TOPICO']))){
            $this->db->insert('projeto_topico', $dados);        
            return $this->db->insert_id();
        }
         }
         return false;
    
    }
    public function novaCategoria($dados){
        if(!empty($dados))
        $this->db->insert('projetos_categorias', $dados);
        
        return $this->db->insert_id();
    }
    
     public function editaCategoria($id,$dados){
         $this->db->where('CODIGO', $id);

        if($this->db->update('projetos_categorias', $dados)){
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function editaCategoriaDisciplina($id,$dados){
         $this->db->where('CODIGO', $id);

        if($this->db->update('categoria_disciplina', $dados)){
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
