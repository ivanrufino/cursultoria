<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>.:: Cursultoria ::.</title>

        <!-- Kit IU (Estilos e Fontes) -->
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/locastyle.css">
        <link rel="stylesheet" type="text/css" href="assets/sistema.css">
        <script type="text/javascript" src="assets/locastyle.js"></script>
        <script type="text/javascript" src="assets/bootstrap.js"></script>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sistema.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/locastyle.css">
        <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/locastyle1.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            $(document).ready(function(){
                 $(".loadProjetos").click(function(){
                var codigo = $(this).attr('href');
                var local= "<?php echo base_url().'projetos/detalheProjeto/' ?>"+codigo;
                $(".detalheProjetos").load(local)
               
                return false;
            });
            });

  
            $('.btn').button()
 
            
        </script>
        <style type="text/css">
            h4{text-align: center}
            .escolher{display: none}
            .ativo{
                border-color: #5c90c4 !important;
                background-color: #bed3e7;
                background: -moz-linear-gradient(top, #fff 0%, #bed3e7 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #bed3e7));
                background: -webkit-linear-gradient(top, #fff 0%, #bed3e7 100%);
                background: -o-linear-gradient(top, #fff 0%, #bed3e7 100%);
                background: -ms-linear-gradient(top, #fff 0%, #bed3e7 100%);
                background: linear-gradient(to bottom, #fff 0%, #bed3e7 100%)
            }

            /*.boxGray{height: 360px}*/

        </style>
    </head>

    <body class="colorLightBlue">

        <header id="header" role="banner">

            <div class="limit">


                <h1 class="serviceName"><a href="/"><img src="assets/img/logo_painel/cursultoria.png" /></a></h1>
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
                    <li ><a href="<?php echo base_url() ?>aluno" class="ico-user" tabindex="2" role="menuitem">&Aacuterea do Aluno</a></li>
                    <li class="selected"><a href="#" tabindex="2" role="menuitem">Meus Cursos</a></li>
                    <li><a href="ver_mapa-gerencial.php" tabindex="2" role="menuitem">Mapa Gerencial</a></li>
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
                    <li>Projetos Disponíveis</li>
                </ul>




                <div class="row">
                    <div class="span4">
                        <aside class="sidebar" role="complementary">
                            <section class="sideBox">
                                <h1 class="titSide">Projetos</h1>
                                <div class="boxSidebarTitle"><i class="ico-user-star"></i></div>

                                <!--Menu vertical-->
                                <div class="collapseGroup" style="padding:5px;margin:0">
                                    <?php foreach ($categorias as $key => $categoria) { ?>
                                        <div class="boxCollapse" >
                                            <header data-target="#area<?= $categoria->CODIGO ?>" data-toggle="collapse" class="collapsed">

                                                <a href="#" role="button" aria-haspopup="true" aria-controls="#area<?= $categoria->CODIGO ?>" aria-label="<?= $categoria->DESCRICAO ?>" title="<?= $categoria->DESCRICAO ?>" class="lnkCollapse" tabindex="3"></a>
                                                <h3><?= $categoria->DESCRICAO ?> </h3>
                                            </header>
                                            <div id="area<?= $categoria->CODIGO ?>" class="collapse" aria-hidden="false" aria-expanded="true" style="height: 0px;padding:0;">
                                                <?php
                                                if (!is_null($projetos[$categoria->CODIGO])) {
                                                    foreach ($projetos[$categoria->CODIGO] as $key => $projeto) {
                                                        ?>
                                                        <h5><a class="loadProjetos" href="<?= $projeto->CODIGO ?>"><?= $projeto->NOME ?></a></h5>
                                                        <p><?= $projeto->DESCRICAO ?></p>
                                                        <hr>
                                                    <?php
                                                    }
                                                } else {
                                                    echo "<p>Esta area não possui projetos</p>";
                                                }
                                                ?>
                                            </div>
                                        </div>                            
                                        <?php
                                    }
                                    ?>
                                   

                                </div>


                                <!--Fim  menu Vertical-->

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
                    
                    <!--INICIO DE BLOCO SELECAÇÃO DE DISCIPLINAS E PERSONALIZAÇÃO  -->
                    <div class="span12 detalheProjetos" style="padding-top: 25px;">                        
                        <!-- Aqui entra por ajax os detalhes do projeto, escolha e personalização de projeto -->

                    </div><!-- FIM LIMITE --><!--INICIO DE BLOCO SELECAÇÃO DE DISCIPLINAS E PERSONALIZAÇÃO  -->


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
                                <span class="lastAccess"><strong>Ãšltimo acesso:</strong> 7/8/2011 22:35:49   <strong>IP:</strong> <?= $_SERVER["REMOTE_ADDR"]; ?> <a href="#" class="icoInterroga">?</a></span>

                                <p class="copyRight fright">Copyright Â© 2013 Mundvs Software e ServiÃ§os Ltda.</p>
                            </div>
                        </div>

                    </footer>

                    </body>
                    </html>
