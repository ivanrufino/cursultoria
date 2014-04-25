<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>.:: Cursultoria ::.</title>

        <!-- Kit IU (Estilos e Fontes) -->
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
                    <li class="selected"><a href="home" class="ico-user" tabindex="2" role="menuitem">Área do Aluno</a></li>
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
                    <li>Mensagens</li>
                </ul>




                <div class="row">

                    <div class="span12">

                        teste

                        <div class="boxGray" role="region">
                            <h2 class="titleContent" role="presentation">Meus cursos</h2> 
                            <?php
                            
                            if ($info_tempo) {
                                if ($info_projeto) {
                                    //print_r($info_projeto);
                                    ?>
                                    <p>Você esta no inscrito no projeto abaixo, clique em "Acessar"</p>

                                    <div class="messageInfo" style="margin:10px; width:0px; border: 2px solid #5C90C4; ">
                                        <div class="span2 countViews gradient">
<!--                                            <h5>Tempo estimado</h5>
                                            <h6>43h e 14 min</h6>-->
                                             <h5>Iniciado em:</h5>
                                            <h6><?php echo substr($info_projeto->DATA, 0, 10); ?> </h6>
                                        </div>
                                        <div class="span6" style="width:430px;">
                                            <b><?=$info_projeto->NOME ?> <br> <?php echo substr($info_projeto->DESCRICAO, 0, 40); ?></b>
                                        </div>
                                        <div class="span1 status enabled" style=" width:90px;">
                                            <a href="<?php echo site_url()?>aluno/ciclo" class="btn btn-default">Acessar</a>
                                        </div>
                                    </div>
                                    <a href="<?= site_url('projetos')?>" class="ico-help-circle fRight" style="margin-right:10px;">Gostaria de contratar outro curso?</a>
                                
                                <? } else { ?>
                                    <div class="messageInfo" style="margin:10px; width:0px; border: 2px solid #5C90C4; ">
                                        <div class="span6" style="width:560px;">
                                            <b>Você ainda não se increveu em nenhum projeto,<br> </b>
                                            Clique no botão ao lado para se increver.
                                        </div>
                                        <div class="span1 status enabled" style=" width:110px;">
                                            <a href="<?= site_url('projetos')?>" class="btn btn-default">Inscreva-se</a>
                                        </div>
                                    </div>
                            
                                <? } ?>
                            <?php } else { ?>
                        <p>Para entrar em um projeto, e necessário preencher seu tempo semanal e velocidade de leitura.</p>

                        <div class="messageInfo" style="margin:10px; width:0px; border: 2px solid #5C90C4; ">
                            <!--                    <div class="span2 countViews gradient">
                                                    <h5>Tempo estimado</h5>
                                                    <h6>43h e 14 min</h6>
                                                </div>-->
                            <div class="span6" style="width:580px;">
                                <b>Clique no botão ao lado para determinar qual seu tempo disponível na semana,<br> também será possivel fazer um teste de leitura para que o sistema possa 
                                    verificar quanto tempo você leva para ler uma página    </b>
                            </div>
                            <div class="span1 status enabled" style=" width:90px;">
                                <a href="hora_estudo" class="btn btn-default">Acessar</a>
                            </div>
                        </div>
                        
                   
<?php } ?>


 </div>  

                <div>
                    <h3 class="titDots">Notícias</h3>

                    <ul class="listInfos noListStyle noMargin">

                        <li>
                            <p><b><a href="#">Titulo de uma noticia qualquer</a></b></p>
                            <p>Certifique-se que o domínio que quer cadastrar está com a entrada do seu DNS pronta para ser acessada pelo servidor da Locaweb. <a href="#" tabindex="3">Leia mais</a> </p>
                        </li>
                        <li>
                            <p><b><a href="#">Titulo de uma noticia qualquer</a></b></p>
                            <p>Você atingiu o limite de caixas postais disponíveis nesse domínio e não será mais possível criar novas caixas postais. <a href="#" tabindex="3">Leia mais</a>
                            </p>
                        </li>
                        <li>
                            <p><b><a href="#">Titulo de uma noticia qualquer</a></b></p>
                            <p>Você pode cadastrar caixas postais e configurar sua conta mas os e-mails não funcionarão até que o domínio esteja
                                configurado corretamente. Providencie o registro ou <a href="#" tabindex="3">Leia mais</a>.
                            </p>
                        </li>
                    </ul>

                </div>



            </div>
            <div class="span4">
                <aside class="sidebar" role="complementary">
                    <section class="sideBox">
                        <h1 class="titSide">Dados do Aluno</h1>
                        <div class="boxSidebarTitle"><i class="ico-user-star"></i></div>
                        <div class="innerSideBox boxWhite">
                            <h6>Nome</h6>
                            <p><strong><?= $cadastro->NOME_COMPLETO ?></strong></p>

                            <hr>

                            <h6>E-mail</h6>
                            <p><strong><?= $cadastro->EMAIL ?></strong></p>
                            <a class="edit-account-name lnkArrow" data-toggle="modal" data-target="#modalEditarNome" href="/accounts/1/edit_name">Alterar dados de cadastro</a>

                        </div>
                    </section>

                    <section class="sideBox">
                        <h1 class="titSide">Saldo financeiro</h1>
                        <div class="boxSidebarTitle"><i class="ico-money"></i></div>

                        <div class="innerSideBox active-settings">

                            <div style="text-align:center; font-size:22px;">

                                <b>R$ <font color="#CC0000">-999,00</font></b>

                            </div>


                            <a href="/settings" class="lnkArrow">Ir para extrato financeiro</a>
                        </div>
                    </section>

                    <section class="sideBox">
                        <div class="boxSidebarTitle"><i class="cmicon-help">?</i></div>
                        <h1 class="titSide">Ajuda e Suporte </h1>
                        <div class="innerSideBox">
                            <ul class="listWhite">
                                <li><a href="#" class="ico-right-open">Documentação de implementação<span class="ico-link-out"></span></a></li>
                                <li><a href="#" class="ico-right-open">Wiki do Gateway de pagamentos<span class="ico-link-out"></span></a></li>
                                <li><a href="#" class="ico-right-open">Suporte 24h<span class="ico-link-out"></span></a></li>
                            </ul>
                        </div>
                    </section>
                </aside>
            </div>



        </div><!-- FIM ROW -->

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
