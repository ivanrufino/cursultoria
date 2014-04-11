
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>.:: Cursultoria ::.</title>

        <!-- Kit IU (Estilos e Fontes) -->
       <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sistema.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/locastyle.css">
         <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/locastyle1.js"></script>
      

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
        <!-- SCRIPT PARA TESTE, RETIRA-LO APOS E COLOCAR EM ARQUIVO SEPARADO -->
        <script type="text/javascript">
            
            $(document).ready(function(){
             
                var quant=0;
                $(".horario").click(function(){
                    $(this).each(function(){
                        if($(this).is(":checked")==true){
             
                            $(this).parents('label').addClass('badge')
                        }else{
                            $(this).parents('label').removeClass('badge')
                        }

            
                    })
                    quant = $('.horario:checked').length;
                    $("#horatext").val(quant);
                })
            })
               $(document).ready(function(){
               var seg=00;
                //var min=01;

                var intervalo 
                $("#modalTeste").on('hidden',function(){
                    clearInterval(intervalo);
                    seg=00;
                    //min=00;
                    $("#contTempo").html(seg);
                    $("#retornaTempo").addClass('disabled');

                });
                $("#modalTeste").on('show',function(){
                    
                    intervalo = window.setInterval(function() {
                        seg=seg+1;
                        if (seg>59){ 
                            $("#retornaTempo").removeClass('disabled');
                        }
            

                        var tempo=seg+" seg";
                        $("#contTempo").html(tempo)
                    }, 1000);
                })
                $("#retornaTempo").click(function(){
                    var retTempo=seg
                    if (seg<59){
                        return false;
                    }
                    $("#veltext").val( retTempo);
                    $("#modalTeste").modal('hide');
                })
           });

        </script>
    </head>

    <body class="colorLightBlue">
        <?php /* estados pode vir da controle */
        ?>
        <header id="header" role="banner">

            <div class="limit">
                

                <h1 class="serviceName"><a href="<?= base_url() ?>"><img src="<?= site_url() ?>assets/img/logo_painel/cursultoria.png" /></a></h1>
                <?php if ($this->session->userdata('clienteLogado')) { ?>
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
                        <li class="selected"><a href="home" class="ico-user" tabindex="2" role="menuitem">Área do Aluno</a></li>
                        <li><a href="#" tabindex="2" role="menuitem">Meus Cursos</a></li>
                        <li><a href="#" tabindex="2" role="menuitem">Mapa Gerencial</a></li>
                        <li><a href="#" tabindex="2" role="menuitem">Material</a></li>

                        <li class="btMenu"><a href="#" tabindex="2" role="menuitem">Configura&ccedil;&otilde;es</a></li>
                    </ul>
                </menu>
            <? } ?>
        </header>
        <!-- Fim Header -->

        <div id="main">
            <div class="limit">

                <div class="alert alert-notification" id="notificacaoId" role="alert">
                    <strong>Informa&ccedil;&atilde;o!</strong> Uma informa&ccedil;&atilde;o qualquer do seu sistema. <a href="#">Um link qualquer</a> 1.
                    <a href="#" class="lnkNoShow" data-target="#notificacaoId">NÃ£o exibir novamente</a>
                </div>

                <ul class="breadcrumb">
                    <li><a href="#">P&aacute;gina inicial</a></li>
                    <li>Hora de Estudo</li>
                </ul>

                <div class="noPadding">
                    <h2>Cadastro de Horas de Estudo</h2>
                <!--    <p class="alert" style="margin-top:10px;">Esta &aacute;rea serve para uma ampla visualiza&ccedil;&atilde;o das disciplinas e ciclos estudados atÃ© o momento.</p>
                                
                    <ul class="tabs" role="tablist">
                        <li class="active"><a href="#tabs1" data-toggle="tab" tabindex="3" role="tab" aria-selected="true"><b>Ã�rea Fiscal (Auditor) - Op&ccedil;&atilde;o L&iacute;ngua Inglesa</b></a></li>
                    </ul>-->

                    <style type="text/css">
                        table{border-collapse: collapse;
                              border: 1px solid gray;
                        }
                        .gradiente{
                            background-color: transparent;

                            height: 37px;
                            border: 1px solid rgb(190, 190, 190 ) !important;
                            background-image: -webkit-gradient(
                                linear,
                                left top,
                                left bottom,
                                color-stop(0, #D4D4D4),
                                color-stop(0.51, #F5F5F5) !important;);
                            background-image: -o-linear-gradient(bottom, #D4D4D4 0%, #F5F5F5 51%);
                            background-image: -moz-linear-gradient(bottom, #D4D4D4 0%, #F5F5F5 51%);
                            background-image: -webkit-linear-gradient(bottom, #D4D4D4 0%, #F5F5F5 51%) ;
                            background-image: -ms-linear-gradient(bottom, #D4D4D4 0%, #F5F5F5 51%);
                            background-image: linear-gradient(to bottom, #D4D4D4 0%, #F5F5F5 51%);

                        .gradiente th{
                            font-size: 17px !important;
                            color: #000 !important;
                            border: none !important

                        }
                        .badge{
                            padding: 6px 25px;
                        }
                    </style>
                    <div class="row">
                        <div class="span14">
                            <div class="span8">
                                <div class="alert alert-info" role="alert" tabindex="-1">
                                    <strong>Mensagem!</strong>
                                    Coloque ao lado o total de horas dispon&iacute;veis para estudar durante a semana:
                                    ou se preferir, marque abaixo seus dias e hor&aacute;rios dispon&iacute;veis para estudo.<br>
                                    Quando concluir clique no botão enviar
                                </div>
                            </div>
                            <div class="span4">
                                <form action="gravarHoraEstudo" method="POST">
                                    <div class="control-group">
                                    <div class="input-prepend input-append">

                                        <button type="button" class="btn btn-default " tabindex="-1" style="padding: 4px 12px" data-toggle="modal" data-target="#modalTeste">Realizar Teste</button>
                                        <input type="text" class="form-control span2" id="veltext" name="veltext">
                                        <span class="add-on">segundos/p&aacute;gina</span>
                                    </div>
                                </div>
                                    
                                <div class="control-group span5 " style="margin-left: 0px !important;" >
                                    <div class=" input-append pull-left">                                        
                                        <input type="text" class="form-control span2" name="horatext" id="horatext">
                                        <span class="add-on">Horas/semana</span>
                                        
                                    </div>
                                    <input  type="submit" class="btn btn-default pull-right" tabindex="-1" style="padding: 4px 12px" value="Enviar"> 
                                </div>
                                    
                                 
                                    
                                   
                                    </form>
                            </div>
                           
                            <!-- <div class="input-prepend">
                              <span class="add-on"></span>
                              <input class="span2" id="prependedInput" type="text" placeholder="Username" data-value="">
                            </div>-->
                        </div>
                        <table class="tableList" style="border:none">                           
                                <tr class="gradiente">
                                  <!--<th>Horario</th>--><th class="gradiente">Segunda-feira</th><th>Ter&ccedil;a-feira</th><th>Quarta-feira</th><th>Quinta-feira</th><th>Sexta-feira</th><th>Sabado</th><th>Domingo</th>
                                </tr>
                            
                            <div class="btn-group" data-toggle="buttons-checkbox">  
                            <!--<tr><td>00:00 - 01:00</td><td><button id="segunda1" type="button" data-toggle="button" name="segunda1"  value="fisica" class="btn unique btn-link ra">selecionar1</button></td><td><button id="terca1" type="button" data-toggle="button" name="terca1"  value="fisica" class="btn unique btn-link rb">selecionar</button></td><td>btn</td><td>btn</td><td>btn</td><td>btn</td><td>btn</td></tr>-->
                                

                                    <?php
                                    for ($inicio = 0; $inicio < 24; $inicio++) {
                                        $fim = $inicio + 1;
                                        $fim = $fim == 24 ? 0 : $fim;
                                        echo "<tr>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='segunda_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='terca_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='quarta_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='quinta_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='sexta_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='sabado_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>
                                              <td><label class='' ><input type='checkbox' class ='horario' id='domingo_$inicio' style='display:none'value=''>" . $inicio . ":00h</label></td>


                                              </tr>";
                                    }
                                    ?>
                            </div>  

                        </table>
                        <hr>

                    </div>
                </div>


                <div class="boxFiltro">

                    <a class="btn ico-print" href="#" tabindex="3">Imprimir</a>
                    <a class="btn ico-left-open-1" href="#" tabindex="3">Voltar</a>

                </div>


            </div>


        </div><!-- FIM LIMITE -->
        <!-- modal -->
        
        <div class="modal  fade" id="modalTeste" role="dialog" aria-live="polite"   aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-header">
                <a class="close" data-dismiss="modal" role="button">X</a>
                <h3 id="id_titulo">Texto de Leitura</h3>
                <p>Comece a leitura do texto e ao terminar clique no botÃ£o terminar</p>
            </div><!-- FIM MODAL HEADER -->
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac mattis risus. Integer scelerisque ante et accumsan cursus. Aenean tincidunt luctus lorem, ut posuere metus tristique sed. Vestibulum fermentum volutpat magna, et pulvinar augue rutrum nec. Fusce at ullamcorper magna, vitae posuere felis. Nunc cursus volutpat lacus, non commodo risus tincidunt at. Ut venenatis faucibus commodo. Mauris a dolor tristique, congue lectus et, mollis magna. Morbi vel blandit massa. Phasellus rutrum vitae massa eu fringilla. Fusce urna eros, laoreet id arcu non, dignissim laoreet erat. Suspendisse potenti. Nam condimentum scelerisque lacinia. Pellentesque eros dui, adipiscing ac lorem ac, condimentum sagittis lorem.

                <p>Fusce ornare erat lacus, eu malesuada justo ullamcorper et. Proin iaculis magna ut nibh dapibus eleifend. Sed et orci eget dui viverra tincidunt. Quisque adipiscing tortor eget justo pharetra venenatis. Nulla lorem mi, tempor placerat placerat at, pharetra et neque. Aenean bibendum, mauris a feugiat scelerisque, leo ante aliquet purus, a posuere sem ante id leo. In lacinia at ligula eu semper. Nam sed placerat nisl. Curabitur a eleifend quam. Sed gravida augue dignissim arcu aliquam, in pulvinar risus vestibulum. Donec leo lacus, malesuada eget egestas id, euismod id diam. Phasellus lacinia velit neque, eu ornare nunc dictum eget.

                <p>Aenean dignissim mattis lacus, nec pharetra sapien pretium mollis. In vestibulum cursus tortor, ut aliquet lorem pretium eget. Phasellus congue, orci posuere faucibus posuere, tellus sem fermentum nisi, sit amet vehicula diam orci at augue. Pellentesque in urna pulvinar, mollis orci in, varius eros. Praesent mollis, lacus vel mollis dapibus, est nunc suscipit dolor, eget vulputate ipsum mi quis eros. Suspendisse blandit justo eu tortor bibendum sodales. Duis ut dui eu ligula viverra imperdiet ac et elit. Sed commodo quam nibh, at interdum quam rutrum eget.

                <p>Aenean suscipit mi pulvinar justo semper vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque et accumsan diam. Donec placerat nulla id enim facilisis, at imperdiet arcu viverra. Quisque fringilla, sapien ac molestie dictum, nunc nibh adipiscing nunc, vel pulvinar massa mauris ac turpis. Nunc sit amet pretium erat. In fermentum nulla erat, a consequat turpis facilisis eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at dictum nisl, a viverra neque. Fusce sit amet auctor odio. Integer dolor nisl, convallis eget pharetra ac, commodo ut odio.

                <p>Integer varius gravida dui, ut faucibus dui accumsan at. Duis consequat mi vitae adipiscing dictum. Praesent suscipit eros massa, eu lobortis lorem bibendum nec. Praesent lacinia pellentesque velit et sollicitudin. Fusce id sollicitudin libero, et vestibulum tellus. Quisque a turpis bibendum, tincidunt ante sed, adipiscing dui. Proin ut vehicula urna. Nunc ipsum lorem, bibendum sed libero vel, elementum interdum nisl. Phasellus justo tortor, iaculis et suscipit vel, dapibus non sem. Donec aliquet rutrum urna, feugiat volutpat felis malesuada at. Nullam quis sem vulputate, accumsan elit et, pretium purus.
            </div><!-- FIM MODAL BODY -->

            <div class="modal-footer">
                <input class="btn btn-primary disabled" type="button" value="Ok" id="retornaTempo" tabindex="3">
                <a href="#" class="btn" data-dismiss="modal" tabindex="3" role="button">Cancelar</a>
                <span id="contTempo">0 seg</span>
            </div>
        </div>
        <!-- fim modal -->

        <!-- RodapÃ© -->
        <footer id="rodape" style="position:relative">

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



