<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function uploadFile($arquivo, $pasta, $tipos, $nome = null){
        if(isset($arquivo)){
            $infos = explode(".", $arquivo["name"]);
     
            if(!$nome){
                for($i = 0; $i < count($infos) - 1; $i++){
                    @$nomeOriginal = $nomeOriginal . $infos[$i] . ".";
                }
            }
            else{
                $nomeOriginal = $nome . ".";
            }
     
            $tipoArquivo = $infos[count($infos) - 1];
     
            $tipoPermitido = false;
            foreach($tipos as $tipo){
                if(strtolower($tipoArquivo) == strtolower($tipo)){
                    $tipoPermitido = true;
                }
            }
            if(!$tipoPermitido){
                $retorno["erro"] = "Tipo não permitido";
            }
            else{
              /*   $caminho_imagem = $pasta . $nomeOriginal . $tipoArquivo;
                if(file_exists($caminho_imagem)) {
                    chmod($caminho_imagem,0755); //Change the file permissions if allowed
                    unlink($caminho_imagem); //remove the file
                    }*/
                if(move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeOriginal . $tipoArquivo)){
                    //$retorno["caminho"] = $pasta . $nomeOriginal . $tipoArquivo;
                    $retorno["caminho"]=$pasta;
                     $retorno["nome"]=$nomeOriginal;
                    $retorno["ext"] = $tipoArquivo;
                }else{
                    $retorno["erro"] = "Erro ao fazer upload";
                }
            }
        }
        else{
            $retorno["erro"] = "Arquivo nao setado";
        }
        return $retorno;
    }

    function mascara_string($mascara, $string){
       $string = str_replace(" ","",$string);
       for($i = 0; $i < strlen($string); $i++){
          $mascara[strpos($mascara,"#")] = $string[$i];
       }
       
       return $mascara;
    }

    function passRandom($largura = 6) {
        $caracteres = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789,.@#$%&*()-_+";
        $tamanho = strlen($caracteres);
     
        $result = "";
     
        for ($i = 0; $i < $largura; $i++) {
            $index = mt_rand(0, $tamanho - 1);
            $result .= $caracteres[$index];
        }
     
        return $result;
    }

    function anti_injection($string) {
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = mysql_real_escape_string($string);
        return $string;
    }

    function cleanuserinput($dirty){
        if (get_magic_quotes_gpc()) {
            $clean = mysql_real_escape_string(stripslashes($dirty));
        }else{
            $clean = mysql_real_escape_string($dirty);
        }
        return $clean;
    }

    function userKey(){

        $array = explode('.', $_SERVER['HTTP_HOST']);
        return md5(md5($array[0]));
    }

    function serverKey(){
        $array = explode('.', $_SERVER['HTTP_HOST']);
        return $array[0];
    }

    function getVars(){
        if(isset($_GET)){
            foreach ($_GET as $key => $value){
                return $key;
            }
        }
    }

    function numFormat($number){
        //$number = str_replace("-", "", $number);
        return number_format($number, 2, ',', '.');
    }

    function numFormat_US($number){
        return number_format($number, 2, '.', ',');
    }

    function dateFormat($date, $formato = "d/m/Y H:i") {
        $ano = @strval(substr($date,0,4));
        $mes = @strval(substr($date,5,2));
        $dia = @strval(substr($date,8,2));
        $hora = @strval(substr($date,11,2));
        $minuto = @strval(substr($date,14,2));
        
        return date($formato, mktime($hora,$minuto,0,$mes,$dia,$ano));
    }

    function dateTimestamp($data){
        $d = str_replace('/', '-', $data);
        return date('Y-m-d', strtotime($d));
    }

    function convertSize($tipo, $numero){
        switch ($tipo) {
            case 'MB': return $numero."MB"; break;
            case 'GB': return substr($numero,0 , -3)."GB"; break;
        }
    }

    function somaData($data, $dias, $meses, $ano){

        $data = explode("/", $data);
        $resultadoData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
        return $resultadoData;
    }

    function somaData_timestamp($givendate,$day=0,$mth=0,$yr=0) {
        $cd = strtotime($givendate);
        $newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
        date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
        date('d',$cd)+$day, date('Y',$cd)+$yr));
        return $newdate;
    }

    function lista_bancos(){
        $ci = & get_instance();
        $sql = $ci->db->get('bancos');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }

    function lista_estados(){
        $ci = & get_instance();
        $sql = $ci->db->get('estados');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }

    function tipos_conta(){
        $ci = & get_instance();
        $sql = $ci->db->get('contas_tipo');
        
        if($sql->num_rows > 0){
            return $sql->result();
        }else{
            return NULL;
        }
    }


    function subtraiData_timestamp($givendate,$day=0,$mth=0,$yr=0) {
        $cd = strtotime($givendate);
        $newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
        date('i',$cd), date('s',$cd), date('m',$cd)-$mth,
        date('d',$cd)-$day, date('Y',$cd)-$yr));
        return $newdate;
    }

    /* Somar 45 dias ao dia 07/05/2012 */
    #echo somar_data('07/05/2012', 45, 0, 0);     Imprime 21/06/2012 
 
    /* Somar 6 meses ao dia 28/02/2012  */
    #echo somar_data('28/02/2012', 0, 6, 0);      Imprime 28/08/2012
 
    /* Somar 2 anos, 3 meses e 10 dias ao dia 01/01/2012 */
    #echo somar_data('01/01/2012', 10, 3, 2);     Imprime 11/04/2014

    function diferencaData($data){

        $inicio = date("Y-m-d", strtotime($data));
        $fim = date('Y-m-d');

        list($anoInicio, $mesInicio, $diaInicio) = explode('-', $inicio);
        list($anoFim, $mesFim, $diaFim) = explode('-', $fim);
        
        $dataInicio = mktime(0,0,0, $mesInicio, $diaInicio, $anoInicio);
        $dataFim    = mktime(0,0,0, $mesFim, $diaFim, $anoFim);
        
        $diferenca = ($dataInicio > $dataFim) ? $dataInicio - $dataFim : $dataFim - $dataInicio;

        return intval($diferenca / 86400);
    } 
    //Agora chamamos a função, e passamos os valores para calcular
    #echo intervaloData('2010-12-05', '2010-12-30').' dias';

    function limpaChars($string){
        $string = str_replace(" ", "_", $string);
        $string = str_replace(".", "_", $string);
        $string = str_replace("/", "-", $string);
        $string = str_replace("Á", "A", $string);
        $string = str_replace("á", "a", $string);
        $string = str_replace("ã", "a", $string);
        $string = str_replace("É", "E", $string);
        $string = str_replace("é", "e", $string);
        $string = str_replace("Í", "I", $string);
        $string = str_replace("í", "i", $string);
        $string = str_replace("Ó", "O", $string);
        $string = str_replace("ó", "o", $string);
        $string = str_replace("õ", "o", $string);
        $string = str_replace("Ú", "U", $string);
        $string = str_replace("ú", "u", $string);
        $string = str_replace("ç", "c", $string);
        $string = str_replace("Ç", "c", $string);

        return $string;
    }

    function limpaUser($string){
        $string = str_replace(" ", "_", $string);
        $string = str_replace(".", "", $string);
        $string = str_replace("/", "", $string);
        $string = str_replace("(", "", $string);
        $string = str_replace(")", "", $string);
        $string = str_replace("'", "", $string);
        $string = str_replace('"', "", $string);
        $string = str_replace(";", "", $string);
        $string = str_replace(";", "", $string);
        $string = str_replace(':', "", $string);
        $string = str_replace("Á", "A", $string);
        $string = str_replace("á", "a", $string);
        $string = str_replace("ã", "a", $string);
        $string = str_replace("É", "E", $string);
        $string = str_replace("é", "e", $string);
        $string = str_replace("Í", "I", $string);
        $string = str_replace("í", "i", $string);
        $string = str_replace("Ó", "O", $string);
        $string = str_replace("ó", "o", $string);
        $string = str_replace("õ", "o", $string);
        $string = str_replace("Ú", "U", $string);
        $string = str_replace("ú", "u", $string);
        $string = str_replace("ç", "c", $string);
        $string = str_replace("Ç", "c", $string);

        return $string;
    }

    
?>