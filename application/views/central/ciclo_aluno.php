<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>.:: Cursultoria ::.</title>

        <!-- Kit IU (Estilos e Fontes) -->
       
        <script type="text/javascript" src="<?= site_url() ?>assets/ivan/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/locastyle.css">
        <script type="text/javascript" src="<?= site_url() ?>assets/locastyle.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/bootstrap.js"></script>       
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    </head>

    <body class="colorLightBlue">
        <header id="header" role="banner">

            <div class="limit">


                <h1 class="serviceName"><a href="/"><img src="<?= site_url() ?>assets/img/logo_painel/cursultoria.png" /></a></h1>
                <div class="infoLogin">
                    Acessando com Identificador
                    <div class="btn-group">
                        <a href="#" class="identNumber dropdown-toggle" tabindex="2" data-toggle="dropdown">28424</a>
                        <div class="listIdent dropdown-menu">
                            <ul>
                                <li>
                                    <strong><a href="/accounts/1/change" tabindex="2">28424</a> </strong>
                                    <span>Gateway 01</span>
                                </li>
                                <li>
                                    <strong><a href="/accounts/2/change" tabindex="2">/accounts/2/change</a> </strong>
                                    <span>teste</span>
                                </li>
                            </ul>
                            <a href="/accounts" class="lnkArrow" tabindex="2">Ver todas</a>
                        </div>
                    </div>
                    <span class="accountName">Nome da conta: <strong>Gateway 01</strong></span>
                </div>
            </div>
            <menu id="menuPrincipal" role="navigation">
                <ul>
                    <li class="selected"><a href="inicio" class="ico-user" tabindex="2" role="menuitem">Área do Aluno</a></li>
                    <li><a href="<?php echo base_url()?>projetos" tabindex="2" role="menuitem">Meus Cursos</a></li>
                    <li><a href="#" tabindex="2" role="menuitem">Mapa Gerencial</a></li>
                    <li><a href="#" tabindex="2" role="menuitem">Material</a></li>

                    <li class="btMenu"><a href="#" tabindex="2" role="menuitem">Configurações</a></li>
                </ul>
            </menu>
        </header>
    <!-- Fim Header -->
    
    <div id="main">
  	<div class="limit">

        <div class="alert alert-notification" id="notificacaoId" role="alert">
          <strong>Informação!</strong> Uma informação qualquer do seu sistema. <a href="#">Um link qualquer</a> 1.
          <a href="#" class="lnkNoShow" data-target="#notificacaoId">Não exibir novamente</a>
        </div>
    	
        <ul class="breadcrumb">
          <li><a href="#">Página inicial</a></li>
          <li>Clientes</li>
        </ul>
		
        <div class="noPadding">
        	<h2><?=$info_projeto->NOME ?></h2>
            <p class="alert" style="margin-top:10px;">Na tabela abaixo você pode visualizar o ciclo de estudo atual e os ciclos já estudados anteriormente. Lembre-se de preencher o tempo efetivamente gasto com o estudo de cada tópico antes de salvar as alterações.</p>
			            

            <ul class="tabs" role="tablist">
                <?php 
                 $atual="Ciclo atual - ";
                 $active="active";
                  $n_ciclo="";
                  $div_ciclo=array();
                foreach ($ciclos as $ciclo) {
                    $n_ciclo="$ciclo->CICLO";
                    if ($ciclo->CICLO < 10){$n_ciclo="0".$ciclo->CICLO ;}
                    echo ' <li class="'.$active.'"><a href="#div_'.$ciclo->CICLO.'" data-toggle="tab" tabindex="3" role="tab" aria-selected="false"><b>'.$atual.$n_ciclo.'</b></a></li>';
                    $atual="";$active="";
                     $div_ciclo[]=$ciclo->CICLO;
                } ?>

                
                
            </ul>

            <!-- Código do conteúdo das tabs -->
            <div class="tab-content" style="overflow:hidden;">
                <?php 
                $active="active";
                    foreach ($div_ciclo as $value) {   
                        $subtotal=0;
                        ?>
                       <div class="tab-pane <?=$active?> " id="div_<?=$value ?>">
                	
                    <table class="tableList">
                        <thead>
                            <tr>
                                <th class="txtLeft dataDescending"><a href="#">Disciplina</a></th>
                                <th class="dataAscending"><a href="#">Tópico</a></th>
                                <th style="width:95px;"><a href="#">Pagina</a></th>
                                <th style="width:110px;"><a href="#">Tempo previsto</a></th>
                                <th style="width:140px;"><a href="#">Tempo real</a></th>
                                <th>Dificuldade</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <?php foreach ($topicos as $topico) { 
                                if ($topico->CICLO== $value){
                                    //print_r($topico)
                                    $subtotal=$subtotal+$topico->TEMPO_PREVISTO;
                                    
                                ?>
                            
                           <tr class="success">
                                <td class="txtLeft"> <?=$topico->Disciplina ?> </td>           
                                <td class="txtLeft"><?=$topico->topico_descricao ?></td>
                                <td><?php echo ($topico->TIPO == "Leitura" )? "pgs. ".$topico->PAGINAS :"Video";  ?></td>
                                <td><?= gmdate("H:i:s", $topico->TEMPO_PREVISTO)  ?> </td>
                                <td class="txtLeft">
                                
                                    <div class="input-append" style="float:left; margin-right:5px;">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">h</span>
                                    </div>
                                    
                                    <div class="input-append" style="float:left">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">min</span>
                                    </div>
                                
                                </td>
                                <td>
                                	
                                    <select class="customSelect span2" data-placeholder="Não avaliado" style="font-size:12px; height:16px;">
                                          <option value=""></option>
                                          <option value="facil">Fácil</option>
                                          <option value="medio">Médio</option>
                                          <option value="dificil">Dificil</option>
                                  </select>
                                
                                </td>
                            </tr>
                                <?php }} ?>
                            
                            </tbody>
                    </table>
                    
                    <h4>Total estimado para este ciclo: <b><?=  gmdate("H:i:s", $subtotal); ?></b></h4>
                    
                </div>
                 <?php  $active=""; }
                
                   ?>
                
                <!--<div class="tab-pane active" id="tabs1">
                	
                    <table class="tableList">
                        <thead>
                            <tr>
                                <th class="txtLeft dataDescending"><a href="#">Disciplina</a></th>
                                <th class="dataAscending"><a href="#">Tópico</a></th>
                                <th style="width:95px;"><a href="#">Pagina</a></th>
                                <th style="width:110px;"><a href="#">Tempo previsto</a></th>
                                <th style="width:140px;"><a href="#">Tempo real</a></th>
                                <th>Dificuldade</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                                                        <tr class="success">
                                <td class="txtLeft">Administração Pública</td>           
                                <td class="txtLeft">Exercícios sobre Orçamento Público</td>
                                <td>Pgs. 039 a 046</td>
                                <td>1h e 35min</td>
                                <td class="txtLeft">
                                
                                    <div class="input-append" style="float:left; margin-right:5px;">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">h</span>
                                    </div>
                                    
                                    <div class="input-append" style="float:left">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">min</span>
                                    </div>
                                
                                </td>
                                <td>
                                	
                                    <select class="customSelect span2" data-placeholder="Não avaliado" style="font-size:12px; height:16px;">
                                          <option value=""></option>
                                          <option value="facil">Fácil</option>
                                          <option value="medio">Médio</option>
                                          <option value="dificil">Dificil</option>
                                  </select>
                                
                                </td>
                            </tr>
                            <tr class="success">
                                <td class="txtLeft">Administração Pública</td>           
                                <td class="txtLeft">Exercícios sobre Orçamento Público</td>
                                <td>Pgs. 039 a 046</td>
                                <td>01 h e 35 min</td>
                                <td class="txtLeft">
                                
                                    <div class="input-append" style="float:left; margin-right:5px;">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">h</span>
                                    </div>
                                    
                                    <div class="input-append" style="float:left">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">min</span>
                                    </div>
                                
                                </td>
                                <td>
                                	
                                    <select class="customSelect span2" data-placeholder="Não avaliado" style="font-size:12px; height:16px;">
                                          <option value=""></option>
                                          <option value="facil">Fácil</option>
                                          <option value="medio">Médio</option>
                                          <option value="dificil">Dificil</option>
                                  </select>
                                
                                </td>
                            </tr>
                            <tr class="success">
                                <td class="txtLeft">Administração Pública</td>           
                                <td class="txtLeft">Exercícios sobre Orçamento Público</td>
                                <td>Pgs. 039 a 046</td>
                                <td>01 h e 35 min</td>
                                <td class="txtLeft">
                                
                                    <div class="input-append" style="float:left; margin-right:5px;">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">h</span>
                                    </div>
                                    
                                    <div class="input-append" style="float:left">
                                        <input class="span1" id="appendedInput" type="text" style="width: 15px; font-size:12px;height: 15px;" data-value="">
                                        <span class="add-on" style="height: 15px;font-size: 12px;line-height: 15px;">min</span>
                                    </div>
                                
                                </td>
                                <td>
                                	
                                    <select class="customSelect span2" data-placeholder="Não avaliado" style="font-size:12px; height:16px;">
                                          <option value=""></option>
                                          <option value="facil">Fácil</option>
                                          <option value="medio">Médio</option>
                                          <option value="dificil">Dificil</option>
                                  </select>
                                
                                </td>
                            </tr>
                                                    </tbody>
                    </table>
                    
                    <h4>Total estimado para este ciclo: <b>2h 30min</b></h4>
                    
                </div>
                
                <div class="tab-pane" id="tabs2">Conteúdo Tab 2</div>
                <div class="tab-pane" id="tabs3">Conteúdo Tab 3</div>-->
            </div>
            

            
            <div class="boxFiltro">
            	<a class="btn ico-calendar-check" href="#" tabindex="3">Histórico dos tópicos estudados</a>
                <a class="btn ico-print" href="#" tabindex="3">Imprimir</a>
                <a class="btn ico-book-2" href="#" tabindex="3">Redefinir Bibliografia</a>
                <a class="btn btn-success ico-ok-circle2 fRight" href="#" tabindex="3">Salvar alterações</a>
            </div>
            
            
        </div>
        
	
	</div><!-- FIM LIMITE -->

    
    <!-- Rodapé -->
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
                <span class="lastAccess"><strong>Último acesso:</strong> 7/8/2011 22:35:49   <strong>IP:</strong> 201.87.65.217 <a href="#" class="icoInterroga">?</a></span>
     
                <p class="copyRight fright">Copyright © 2013 Mundvs Software e Serviços Ltda.</p>
            </div>
        </div>

    </footer>

</body>
</html>



