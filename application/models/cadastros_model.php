<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastros_model extends CI_Model {
    /*
      @name Model de Clientes / Cadastros
      @throws Sempre verificar autenticação de usuário sobre as funções do sistema.
      @todo Todo o sistema deve retornar um resultado via XML "WebService" (preferencialmente).
     */

    public $userKey;

    public function __construct() {
        parent::__construct();
        $this->userKey = $this->session->userdata('userKey');
    }

    // Retorna todos os registros
    public function get_all($chave = '') {

        //   $this->db->where('COD_CHAVE', $chave);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function alterarAluno($id, $dados) {
        $this->db->where('CODIGO', $id);

        $sql = $this->db->update('cadastros', $dados);

        if ($sql)
            return TRUE;
    }

    public function delete($id, $chave = '') {
        //   $this->db->where('COD_CHAVE', $chave);
        $this->db->where('CODIGO', $id);

        if ($this->db->delete('cadastros')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function novoAluno($dados) {

        if (!empty($dados)) {

            if ($this->db->insert('cadastros', $dados)) {
                return $this->db->insert_id();
            } else {
                return null;
            }
        }
    }

    public function get_id($id) {
        //$this->db->where('COD_CHAVE', ($chave != '') ? $chave : $this->userKey);
        $this->db->where('CODIGO', $id);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return NULL;
        }
    }

    public function get_num($grupo = '', $chave = '') {

        // $this->db->where('COD_CHAVE', $chave);
        $this->db->where('GRUPO', $grupo);

        $sql = $this->db->get('cadastros');
        return $sql->num_rows;
    }

    public function get_byLogin($email = '', $senha = '') {


        $this->db->where('EMAIL', $email);
        $this->db->where('SENHA', md5(md5($senha)));

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return FALSE;
        }
    }

    public function getTempo($COD_ALUNO) {
        $this->db->where('COD_ALUNO', $COD_ALUNO);
        $sql = $this->db->get('tempo_velocidade');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return FALSE;
        }
    }

    public function getProjeto($COD_ALUNO) {
        $this->db->where('PA.COD_ALUNO', $COD_ALUNO);
        $this->db->from('projeto_aluno AS PA');
        $this->db->join('projetos AS P', 'P.CODIGO = PA.COD_PROJETO');
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return FALSE;
        }
    }
    public function getTopicoUsuarios($cod_aluno,$ciclo=null){
        $this->db->select('TU.*,DT.PAGINAS,DT.QUANT_PAGINAS,BI.TIPO');
         $this->db->where('COD_ALUNO', $cod_aluno);
         $this->db->from('topicos_usuario AS TU');
         $this->db->join('detalhetopico AS DT', 'DT.COD_TOPICO = TU.COD_TOPICO AND DT.COD_BIBLIOGRAFIA = TU.COD_BIBLIOGRAFIA');
         $this->db->join('bibliografia AS BI', 'BI.CODIGO = TU.COD_BIBLIOGRAFIA');
         $this->db->order_by("CICLO", "asc");
         if (!is_null($ciclo)){
              $this->db->where('CICLO', $ciclo);
         }else{
              $this->db->where('CICLO > ', '0');
         }
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }
        public function getTopicoCiclos($cod_aluno,$ciclo=null){
        $this->db->select('TU.*,D.DESCRICAO AS Disciplina,T.DESCRICAO AS topico_descricao,DT.PAGINAS,BI.TIPO');
         $this->db->where('COD_ALUNO', $cod_aluno);
         $this->db->from('topicos_usuario AS TU');
         $this->db->join('detalhetopico AS DT', 'DT.COD_TOPICO = TU.COD_TOPICO AND DT.COD_BIBLIOGRAFIA = TU.COD_BIBLIOGRAFIA');
         $this->db->join('bibliografia AS BI', 'BI.CODIGO = TU.COD_BIBLIOGRAFIA');
         $this->db->join('topico AS T', 'T.CODIGO = TU.COD_TOPICO');
         $this->db->join('disciplinas AS D', 'D.CODIGO = T.COD_DISCIPLINA');
         $this->db->order_by("CICLO", "asc");
         if (!is_null($ciclo)){
              $this->db->where('CICLO', $ciclo);
         }else{
              $this->db->where('CICLO > ', '0');
         }
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }
    
     public function getCiclosUsuarios($cod_aluno){
        $this->db->select('TU.CICLO');
        $this->db->distinct();
         $this->db->where('COD_ALUNO', $cod_aluno);
         $this->db->where('CICLO >', '0');
         $this->db->from('topicos_usuario AS TU');
         $this->db->order_by("CICLO", "desc"); 
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            
            return $sql->result();
        } else {
            return NULL;
        }
    }
    public function  updateTopicoUsuario($dados){
         $this->db->where('CODIGO', $dados['CODIGO']);
        if ($this->db->update('topicos_usuario', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function maiorCiclo(){
        $this->db->select_max('CICLO');
        $sql = $this->db->get('topicos_usuario');
        return $sql->row();
    }
    public function criarCiclos(){
        //calculo de pagina por semana (tempo_disponivel *3600 / velocidade)
        //calculo tranformar pagina em tempo (quantidade_pagina * velocidade /3600)
         
    }
    public function getCidades($sigla) {
        $this->db->where('SIGLA', $sigla);
        $sql_estado = $this->db->get('estados');

        $this->db->where('COD_ESTADO', $sql_estado->row('CODIGO'));
        $sql = $this->db->get('cidades');

        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            echo 'selecione um estado';
        }
    }

    public function getEstados() {
        $sql = $this->db->get('estados');

        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getEditoras() {
        $this->db->order_by('DESCRICAO');
        $sql = $this->db->get('editoras');

        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getCategoriaDisciplina($CODIGO = NULL) {
        $this->db->order_by('DESCRICAO');
        if ($CODIGO != NULL) {
            $this->db->where("CODIGO", $CODIGO);
        }
        $sql = $this->db->get('categoria_disciplina');

        if ($sql->num_rows > 0) {
            if ($CODIGO != NULL) {
                return $sql->row();
            }
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function novaCategoriaDisciplina($dados) {
        if (!empty($dados))
            $this->db->insert('categoria_disciplina', $dados);
        return $this->db->insert_id();
    }

    public function getDisciplinaByCat($COD_CATEGORIA) {
        $this->db->select('*');
        $this->db->from('disciplinas AS D');
        $this->db->order_by('D.DESCRICAO');
        $this->db->where("STATUS", '1');

        $this->db->where("COD_CATEGORIA", $COD_CATEGORIA);

        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getDisciplinas($CODIGO = NULL) {
        $this->db->select('D.*,CD.DESCRICAO AS CATEGORIA');
        $this->db->from('disciplinas AS D');
        $this->db->join('categoria_disciplina AS CD', 'CD.CODIGO = D.COD_CATEGORIA', 'left');
        $this->db->order_by('D.DESCRICAO');
        $this->db->where("STATUS", '1');
        if ($CODIGO != NULL) {
            $this->db->where("D.CODIGO", $CODIGO);
        }
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            if ($CODIGO != NULL) {
                return $sql->row();
            }
            return $sql->result();
        } else {
            return NULL;
        }
    }
    public function getDisciplinasVinculadas($projeto) {
        $this->db->select('PD.COD_DISCIPLINA,D.*');
        $this->db->from('projeto_disciplina AS PD');
         $this->db->join('disciplinaS AS D', 'D.CODIGO = PD.COD_DISCIPLINA', 'left');
        $this->db->where("PD.COD_PROJETO", $projeto);
        
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
           return $sql->result_array();
        } else {
            return NULL;
        }
    }
        public function getTopicosVinculados($projeto) {
        $this->db->select('PT.COD_TOPICO');
        $this->db->from('projeto_topico AS PT');
        $this->db->where("PT.COD_PROJETO", $projeto);
        
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
           return $sql->result_array();
        } else {
            return NULL;
        }
    }

    public function getCategoriaDisciplinas($CODIGO = NULL) {
        $this->db->select('*');
        $this->db->from('categoria_disciplina AS CD');
        $this->db->order_by('DESCRICAO');

        if ($CODIGO != NULL) {
            $this->db->where("CODIGO", $CODIGO);
        }
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            if ($CODIGO != NULL) {
                return $sql->row();
            }
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getBibliografia($CODIGO = NULL) {
        $this->db->select("B.*,E.DESCRICAO AS NOME_EDITORA ");
        $this->db->from('bibliografia B');
        $this->db->join('editoras E', 'E.CODIGO = B.COD_EDITORA');
        $this->db->where("B.STATUS", '1');
        if ($CODIGO != NULL) {
            $this->db->where("B.CODIGO", $CODIGO);
        }

        $sql = $this->db->get();

        if ($sql->num_rows > 0) {
            if ($CODIGO != NULL) {
                return $sql->row();
            }
            return $sql->result();
        } else {
            return NULL;
        }
    }
    public function getBibliografiaByDisciplina($COD_DISCIPLINA) {
        $this->db->select("B.*,E.DESCRICAO AS NOME_EDITORA ");
        $this->db->from('disciplinabibliografia DB');
        $this->db->join('bibliografia B', 'B.CODIGO = DB.COD_BIBLIOGRAFIA');
        $this->db->join('editoras E', 'E.CODIGO = B.COD_EDITORA');
        $this->db->where("B.STATUS", '1');
     
            $this->db->where("DB.COD_DISCIPLINA", $COD_DISCIPLINA);
        
        

        $sql = $this->db->get();

        if ($sql->num_rows > 0) {
          // return $this->db->last_query();
           return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getTopicosByDisciplina($COD_DISCIPLINA) {
        $this->db->select("T.DESCRICAO,T.CODIGO");
        $this->db->from('topico T');
        $this->db->where('T.COD_DISCIPLINA', $COD_DISCIPLINA);
        $this->db->order_by('T.DESCRICAO');

        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->result_array();
        } else {
            return NULL;
        }
    }
    public function novoProjetoAluno($dados){    
        $this->db->where('COD_PROJETO', $dados['COD_PROJETO']);
        $this->db->where('COD_ALUNO', $dados['COD_ALUNO']);
        $sql = $this->db->get('projeto_aluno');
         $this->desativarProjetoAluno($dados);
        if ($sql->num_rows > 0) {           
            return $this->ativarProjetoAluno($dados);
        }else{
            $this->db->insert('projeto_aluno', $dados);
            return $this->db->insert_id();
        }
    }
    public function ativarProjetoAluno($dados){
        $this->db->where('COD_PROJETO', $dados['COD_PROJETO']);
        $this->db->where('COD_ALUNO', $dados['COD_ALUNO']);       
        $dados['status']='1';
        if ($this->db->update('projeto_aluno', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     public function desativarProjetoAluno($dados){
        $this->db->where('COD_ALUNO', $dados['COD_ALUNO']);       
        $info['status']='0';
        if ($this->db->update('projeto_aluno', $info)) {
            return TRUE;
        } else {
             die($this->db->last_query());
            return FALSE;
        }
    }
    public function gravarTopico( $dados){
        $this->db->where('COD_ALUNO', $dados['COD_ALUNO']);
        $this->db->where('COD_TOPICO', $dados['COD_TOPICO']);
        $sql = $this->db->get('topicos_usuario');
        
        if ($sql->num_rows == 0) {
           $this->db->insert('topicos_usuario', $dados);
            return $this->db->insert_id();
        }
    }
    public function getTopicos($CODIGO = NULL) {
        $retorno = "result_array";
        $this->db->select("T.*");
        $this->db->from('topico T');
        if (!is_null($CODIGO)) {
            $this->db->where('T.CODIGO', $CODIGO);
            $retorno = "row_array";
        }
        $this->db->order_by('T.DESCRICAO');
        $sql = $this->db->get();
        if ($sql->num_rows > 0) {
            return $sql->$retorno();
        } else {
            return NULL;
        }
    }

    public function getPagina($COD_TOPICO, $COD_BIBLIOGRAFIA) {
        $this->db->where('COD_TOPICO', $COD_TOPICO);
        $this->db->where('COD_BIBLIOGRAFIA', $COD_BIBLIOGRAFIA);
        $sql = $this->db->get('detalhetopico');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

    public function getDetalheTopico($COD_TOPICO, $COD_BIBLIOGRAFIA=NULL) {
        $this->db->select("DT.*,B.DESCRICAO");
        $this->db->from('detalhetopico DT');
        $this->db->join('bibliografia B', 'B.CODIGO = DT.COD_BIBLIOGRAFIA');
        $this->db->where('COD_TOPICO', $COD_TOPICO);
        $sql = $this->db->get('');
        if ($sql->num_rows > 0) {
            return $sql->result_array();
        } else {
            return NULL;
        }
    }

    public function getBibliografiasByDisciplina($COD_DISCIPLINA) {
        $this->db->select("B.DESCRICAO,B.CODIGO");
        $this->db->from('bibliografia B');
        $this->db->join('disciplinabibliografia DB', 'DB.COD_BIBLIOGRAFIA = B.CODIGO');
        $this->db->where('DB.COD_DISCIPLINA', $COD_DISCIPLINA);
        $this->db->order_by('DESCRICAO');

        $sql = $this->db->get();

        if ($sql->num_rows > 0) {
            return $sql->result_array();
        } else {
            return NULL;
        }
    }

    public function getAutoresByBibliografia($COD_BIBLIOGRAFIA) {
        $this->db->select("A.DESCRICAO,A.CODIGO");
        $this->db->from('autores A');
        $this->db->join('autor_bibliografia AB', 'AB.COD_AUTOR = A.CODIGO');
        $this->db->where('AB.COD_BIBLIOGRAFIA', $COD_BIBLIOGRAFIA);
        $this->db->order_by('DESCRICAO');

        $sql = $this->db->get();

        if ($sql->num_rows > 0) {
            return $sql->result_array();
        } else {
            return NULL;
        }
    }

    public function getAutores() {
        $this->db->order_by('DESCRICAO');
        $sql = $this->db->get('autores');

        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function getAutorById($id) {
        $this->db->where('CODIGO', $id);
        $sql = $this->db->get('autores');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

    public function getEditoraById($id) {
        $this->db->where('CODIGO', $id);
        $sql = $this->db->get('editoras');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

    public function updateAutor($id, $dados) {
        $this->db->where('CODIGO', $id);

        if ($this->db->update('autores', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function novoAutor($dados) {
        if (!empty($dados))
            $this->db->insert('autores', $dados);

        return $this->db->insert_id();
    }

    public function novoHoraEstudo($dados) {
        if (!empty($dados))
            $this->db->insert('tempo_velocidade', $dados);

        return $this->db->insert_id();
    }

    public function updateBibliografia($id, $dados) {
        $this->db->where('CODIGO', $id);

        if ($this->db->update('bibliografia', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function novaBibliografia($dados) {
        if (!empty($dados)) {
            if ($this->db->insert('bibliografia', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function editDisciplina($dados) {
        $this->db->where('CODIGO', $dados['CODIGO']);
        if ($this->db->update('disciplinas', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function novaDisciplina($dados) {
        if (!empty($dados)) {
            if ($this->db->insert('disciplinas', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function novaDisciplinaBibliografia($dados) {
        if (!empty($dados)) {
            if ($this->db->insert('disciplinabibliografia', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function novoTopico($dados) {
        if (!empty($dados)) {
            if ($this->db->insert('topico', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function editaTopico($dados) {
        $this->db->where('CODIGO', $dados['CODIGO']);
        if (!empty($dados)) {
            if ($this->db->update('topico', $dados)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function editaDetalhe($dados) {
        $this->db->where('CODIGO', $dados['CODIGO']);
        if (!empty($dados)) {
            if ($this->db->update('detalhetopico', $dados)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function novoDetalheTopico($dados) {
        if (is_null($this->getDetalheTopico($dados['COD_TOPICO'], $dados['COD_BIBLIOGRAFIA']))) {

            if (!empty($dados)) {
                if ($this->db->insert('detalhetopico', $dados)) {
                    return $this->db->insert_id();
                } else {
                    return false;
                }
            }
        }
    }

    public function deleteBibliografia($id) {
        $this->db->where('CODIGO', $id);

        if ($this->db->delete('bibliografia')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function novaBibliografiaAutor($dados) {
        if (!empty($dados)) {
            if ($this->db->insert('autor_bibliografia', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function retirarDisciplinaBibliografia($COD_BIBLIOGRAFIA, $COD_DISCIPLINA = NULL) {
        if ($COD_DISCIPLINA != NULL) {
            $this->db->where('COD_DISCIPLINA', $COD_DISCIPLINA);
        }
        $this->db->where('COD_BIBLIOGRAFIA', $COD_BIBLIOGRAFIA);
        if ($this->db->delete('disciplinabibliografia')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function retirarBibliografiaAutor($COD_BIBLIOGRAFIA, $COD_AUTOR = NULL) {
        if ($COD_AUTOR != NULL) {
            $this->db->where('COD_AUTOR', $COD_AUTOR);
        }
        $this->db->where('COD_BIBLIOGRAFIA', $COD_BIBLIOGRAFIA);
        if ($this->db->delete('autor_bibliografia')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function apagarTopico($COD_TOPICO) {
        $this->db->where('CODIGO', $COD_TOPICO);
        if ($this->db->delete('topico')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function apagarDetalheTopico($COD_TOPICO) {
        $this->db->where('COD_TOPICO', $COD_TOPICO);
        if ($this->db->delete('detalhetopico')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function deleteAutor($id) {
        $this->db->where('CODIGO', $id);

        if ($this->db->delete('autores')) {
            return TRUE;
        } else {
           
            return null; 
        }
    }

    public function deleteEditoras($id) {
        $this->db->where('CODIGO', $id);

        if ($this->db->delete('editoras')) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function updateEditora($id, $dados) {
        $this->db->where('CODIGO', $id);

        if ($this->db->update('editoras', $dados)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function novaEditora($dados) {
        if (!empty($dados))
            $this->db->insert('editoras', $dados);

        return $this->db->insert_id();
    }

    public function isCheck($chave = '') {

        //  $this->db->where('COD_CHAVE', $chave);
        $this->db->where('EMAIL', $this->input->post('EMAIL'));
        //$this->db->or_where('CPF', $this->input->post('CPF'));
        //$this->db->or_where('CNPJ', $this->input->post('CNPJ'));

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function isThis($email) {
        $this->db->where('EMAIL', $email);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return ($sql->row('TIPO_PESSOA') == "juridica") ? $sql->row('RAZAO_SOCIAL') : $sql->row('NOME_COMPLETO');
        } else {
            return NULL;
        }
    }

    public function isCPF_CNPJ($email) {
        $this->db->where('EMAIL', $email);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return ($sql->row('TIPO_PESSOA') == "juridica") ? $sql->row('CNPJ') : $sql->row('CPF');
        } else {
            return NULL;
        }
    }

    public function getDados($codigo) {
        $this->db->where('CODIGO', $codigo);
        //  $this->db->where('COD_CHAVE', $this->userKey);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return $sql->row();
        } else {
            return NULL;
        }
    }

    public function get_grupo($grupo) {

        // $this->db->where('COD_CHAVE', $this->userKey);
        $this->db->where('GRUPO', $grupo);

        $sql = $this->db->get('cadastros');
        if ($sql->num_rows > 0) {
            return $sql->result();
        } else {
            return NULL;
        }
    }

    public function updateSenhaCliente($dados) {
        $this->db->where('CODIGO', $dados['CODIGO']);

        $set['SENHA'] = md5(md5($dados['NOVA_SENHA']));
        $sql = $this->db->update('cadastros', $set);

        if ($sql)
            return TRUE;
    }

    public function getUsers() {
        //  $this->db->where('COD_CHAVE', $this->userKey);
        $sql = $this->db->get('usuarios');

        if ($sql)
            return $sql->result();
    }

}
