
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>.:: Cursultoria ::.</title>
    
    <!-- Kit IU (Estilos e Fontes) -->
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/sistema.css">
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/locastyle.css">
    <script type="text/javascript" src="<?=site_url()?>assets/locastyle.js"></script>
    <script type="text/javascript" src="<?=site_url()?>assets/bootstrap.js"></script>
    
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
</head>

<body class="colorLightBlue">
  <?php /*estados pode vir da controle*/ 
$estados= array("Selecione o estado"=>"0", "Acre"=>"AC","Alagoas"=>"AL","Amapá "=>"AP","Amazonas"=>"AM","Bahia "=>"BA","Cear&aacute; "=>"CE","Distrito Federal"=>"DF","Esp&iacute;rito Santo"=>"ES","Goi&aacute;s"=>"GO",
                "Maranh&atilde;o"=>"MA","Mato Grosso"=>"MT","Mato Grosso do Sul"=>"MS","Minas Gerais"=>"MG","Paran&aacute;"=>"PR","Para&iacute;ba"=>"PB","Par&aacute;"=>"PA","Pernambuco"=>"PE","Piau&iacute;"=>"PI",
                "Rio de Janeiro"=>"RJ","Rio Grande do Norte "=>"RN","Rio Grande do Sul "=>"RS","Rond&ocirc;nia  "=>"RO","Roraima "=>"RR","Santa Catarina"=>"SC","Sergipe"=>"SE","S&atilde;o Paulo"=>"SP","Tocantins"=>"TO") ;
 ?>
    <header id="header" role="banner">
      
      <div class="limit">
        
        
        <h1 class="serviceName"><a href="<?=base_url()?>"><img src="<?=site_url()?>assets/img/logo_painel/cursultoria.png" /></a></h1>
        
      </div>
      
    </header>
    <!-- Fim Header -->
    
    <div id="main">
    <div class="limit">

        <div class="alert alert-notification" id="notificacaoId" role="alert">
          <strong>Informa&ccedil&atilde;o!</strong> Preencha todos seus dados corretamento.
          
        </div>
        
        <ul class="breadcrumb">
          <li><a href="<?=site_url()?>">P&aacute;gina inicial</a></li>
          <li>Cadastro</li>
        </ul>
        
        <div class="noPadding">
        <!--    <p class="alert" style="margin-top:10px;">Esta &aacute;rea serve para uma ampla visualiza&ccedil;&atilde;o das disciplinas e ciclos estudados atÃ© o momento.</p>
                        
            <ul class="tabs" role="tablist">
                <li class="active"><a href="#tabs1" data-toggle="tab" tabindex="3" role="tab" aria-selected="true"><b>Ã�rea Fiscal (Auditor) - Op&ccedil;&atilde;o L&iacute;ngua Inglesa</b></a></li>
            </ul>-->

            <!-- CÃ³digo do conte&uacute;do das tabs -->
            <div class="tab-content" style="overflow:hidden;">
                <div class="tab-pane active" id="tabs1" >
                  <form role="form" action="novoAluno" method="POST">
                    <fieldset >
                      <legend>Dados Pessoais</legend>
                    <!--<div id="perfil_lateral" style="">
                      
                        <img src="rosto_normal.png" id="foto_perfil"><br>
                        <input type="button" class="btn" value="Escolher Arquivo"><br>
                        
                      
                    </div>-->
                    <input type="hidden" name="cadastro_fase1" value="true" readonly="">
                    <div id="form_perfil">
                            <label id="label_inline" class="first obg" for="nome">Nome: </label>
                            <input type="text" id="nome" class="span5"   name="nome" placeholder="Digite seu nome">
                            <br class="clear">

                            <label id="label_inline" class="obg" for="email">E-mail: </label>
                            <input type="email" id="email" class="span5" name=" email" placeholder="Digite seu Email">
                            <br class="clear">

                            <label id="label_inline" class="obg" for="senha">Senha: </label>
                            <input type="password" id="senha" class="span3" name="senha" placeholder="Digite a senha">
                            <br class="clear">

                            <label id="label_inline" for="nascimento">Data de nascimento: </label>
                            <input type="date" id="nascimento" class="span3" name="nascimento" value="17021983">
                            <br class="clear">

                            <label id="label_inline" class="obg" for="CPF">CPF: </label>
                            <input type="text" id="CPF"class="span3"  name="CPF"  placeholder="CPF">
                            <br class="clear">
                     </div>
                    </fieldset>
                    <fieldset>
                      <legend>Endere&ccedil;o</legend>
                      <label id="label_inline" class="obg" class="first" for="endereco">Endere&ccedil;o: </label>
                      <input type="text" id="endereco" class="span7"   name="endereco" placeholder="Digite seu endere&ccedil;o">
                      <br class="clear">

                      <label id="label_inline" for="numero">N&uacute;mero: </label>
                      <input type="text" id="numero" class="span3"   name="numero" placeholder="Digite seu N&uacute;mero">
                      <br class="clear">

                      <label id="label_inline" for="complemento">Complemento: </label>
                      <input type="text" id="complemento" class="span3"   name="complemento" placeholder="Digite seu Complemento">
                      <br class="clear">

                      <label id="label_inline" class="obg" for="Cep">Cep: </label>
                      <input type="text" id="Cep" class="span3"   name="Cep" placeholder="Digite seu Cep">
                      <br class="clear">

                      <label id="label_inline" for="Cidade">Cidade: </label>
                      <input type="text" id="Cidade" class="span4"   name="Cidade" placeholder="Digite seu Cidade">
                      <br class="clear">

                      <label id="label_inline" for="Estado">Estado: </label>
                      <select name="estado" class="span4">
                        <?php foreach ($estados as $key => $value) {
                          echo "<option value='$value'> $key </option>";
                        } ?>
                      </select>
                      <br class="clear">
                      <!--<input type="text" id="Estado" class="span4"   name="Estado" placeholder="Digite seu Estado">-->

                      <label id="label_inline" for="residencial">Tel. Residencial: </label>
                      <input type="text" id="residencial" class="span4"   name="residencial" placeholder="Digite seu Tel. Residencial">
                      <br class="clear">

                      <label id="label_inline" class="obg" for="Celular">Celular: </label>
                      <input type="text" id="Celular" class="span4"   name="Celular" placeholder="Digite seu Celular">                                                                                                              
                      <br class="clear">

                    </fieldset>
                    <input type="checkbox" name="termo" id="termo"><label id="" class="fl_right" for="termo">Li e estou de acordo com os <a href="termos">termos do Contrato do Cursultoria</a></label>
                    <br class="clear">
                    <input type="submit" class="btn">
                    </form>
                    
                    
                </div>
                
                <div class="tab-pane" id="tabs2">Conte&uacute;do Tab 2</div>
                <div class="tab-pane" id="tabs3">Conte&uacute;do Tab 3</div>
            </div>

            
            <div class="boxFiltro">
                
                <a class="btn ico-print" href="#" tabindex="3">Imprimir</a>
                <a class="btn ico-left-open-1" href="#" tabindex="3" onclick="javascript:history.back()">Voltar</a>
                
            </div>
            
            
        </div>
        
    
    </div><!-- FIM LIMITE -->

    
    <!-- RodapÃ© -->
    <footer id="rodape">
        
        <div class="footerTop">
            <div class="limit">
                <nav>
                    <h6>Atendimento</h6>
                    <ul>
                        <li class="ico-helpDesk"><a href="#">HelpDesk</a></li>
                        <li class="ico-Chat"><a href="#">Chat</a></li>
                        <li class="ico-Telefone"><a href="#">Telefone</a></li>
                    </ul>
                    <a href="#" class="lnkSeta lnkSetaWhite fright">Ver todas as formas de atendimento</a>
                </nav>
            </div>
        </div>
        
        <div class="subfooter">
            <div class="limit">
                <span class="lastAccess"><strong>Ãšltimo acesso:</strong> 7/8/2011 22:35:49   <strong>IP:</strong> 201.87.65.217 <a href="#" class="icoInterroga">?</a></span>
     
                <p class="copyRight fright">Copyright Â© 2013 Mundvs Software e Servi&ccedil;os Ltda.</p>
            </div>
        </div>

    </footer>

</body>
</html>



