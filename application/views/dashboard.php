<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>GerentePRO :: Gerenciador Financeiro para Host e Internet</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8; IE=EmulateIE9; IE=EmulateIE10">

        <link rel="shortcut icon" href="<?= site_url() ?>assets/favicon.ico" />
        <link rel="icon" type="image/gif" href="<?= site_url() ?>assets/favicon.ico" />

        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/aguas.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/icons.css">

        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/jquery/easyui/themes/gerentepro/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/jquery/jquery-ui/css/custom-theme/jquery-ui-1.8.22.custom.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/tiptip.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/inicio.css" />

        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/jquery/chosen/chosen.css">

        <!-- inclusão do css do BOOTSTRAP, POR CAUSA DO PROGRESS BAR -->

        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/jquery/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/relatorios.css" />
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/configuracoes.css" />
        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/gatewaysPagamento.css" />

        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/multi-select.css" />


        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/jquery/locaweb_style/locastyle.css" />


        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/jquery-ui/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/js/jquery.tiptip.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/jquery.mask.min.js"></script>


        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/jquery.mask.money.js"></script>

        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/jquery-ui/js/jquery-ui-1.8.22.custom.min.js"></script>

        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/easyui/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/easyui/locale/easyui-lang-pt-br.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/easyui/plugins/jquery.edatagrid.js"></script>

        <script type="text/javascript" src="<?= site_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jscolor.js"></script>
        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.form.js"></script>
        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.knob.js"></script>
        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.dataTables.js"></script>

        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.validate.js"></script>

        <script type="text/javascript" src="<?= site_url(); ?>assets/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= site_url() ?>assets/jquery/chosen/chosen.jquery.js" ></script>

<!--<script src="<?= site_url(); ?>/assets/js/google-code-prettify/prettify.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-transition.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-alert.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-modal.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-dropdown.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-scrollspy.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-tab.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-tooltip.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-popover.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-button.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-collapse.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-carousel.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-typeahead.js"></script>
<script src="<?= site_url(); ?>/assets/js/bootstrap-affix.js"></script>
<script src="<?= site_url(); ?>/assets/js/application.js"></script>-->

        <script type="text/javascript" src="<?= site_url() ?>assets/grid/js/flexigrid.pack.js"></script>


        <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/demo_table.css" />

        <?php
        $this->load->view('json/default');
        $chave = $this->users->get_chave($this->session->userdata('userKey'));
        ?>

    </head>

    <body class="easyui-layout">

        <!-- Cabeçalho do Sistema -->
        <div region="north" title="" split="false" id="header" border="false">
            <div id="top-logo"></div>


            <div id="top-dados" menu="#menu-dados">

                <div style="float:left;width:200px; margin-right:10px;">
                    <img src="<?= "http://www.gravatar.com/avatar/" . md5(strtolower(trim($dados_usuario->USUARIO))) . "?d=" . "&s=40"; ?>" width="40" />

                    <div>Olá, <b><?= $dados_usuario->NOME ?></b></div>
                    <div class="font-min">Último acesso <?= dateFormat($dados_usuario->ULTIMO_LOGIN, "d/m/Y H:i") ?></div>
                </div>


                <div class="btn-group dropdown">
                    <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= site_url() ?>assets/images2/cog.gif" style="width:16px; height:16px; border:0px;" border="0">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" style="top: 42px;  z-index:9999;position: fixed;">
                        <li><a class="ico-user" onclick="getURL('configuracoes/conta');">Meu GerentePRO</a></li> 
                        <li><a class="ico-wrench" rel="goConfig">Configurações</a></li>
                        <li class="divider"></li>  
                        <li><a class="ico-world" onClick="goCentral();">Ir para Central de Cliente</a></li>  
                        <li><a class="ico-logout" rel="goLogout">Sair</a></li>  
                    </ul>
                </div>
            </div>

        </div>

        <!-- Rodapé --> 
        <!--<div region="south" title="" split="false" id="footer">
                &copy; 2012 Grupo Águas do Brasil - Todos os direitos reservados
        </div>-->

        <!-- Ajuda do Sistema -->
        <!--<div region="east" iconCls="icon-ajuda" title="Ajuda do Sistema" split="true" id="helpcontainer">
                &nbsp;
        </div>-->

        <!-- Menu Principal -->
        <div region="west" split="true" title="&nbsp;" id="menu_left" style="width:240px; overflow:hidden;">
            <div id="aa" class="easyui-accordion"> 

                <div title="Cursos e Alunos">  
                    <ul>
                        <li><a onClick="getURL('cadastros/clientes');">Alunos</a></li>

                        <li><a onClick="getURL('cadastros/servicos');">Projetos contratados</a></li>

                    </ul> 
                </div>

                <!-- Visualização Temporaria-->
                <div title="Configuração" >  
                    <ul > 
                        <li><a onclick="getURL('configuracoes/bibliografias');">Bibliografias</a></li>
                        
                        <li><a onclick="getURL('configuracoes/autores');">Autores</a></li>
                        <li><a onclick="getURL('configuracoes/editoras');">Editoras</a></li>
                        <li><a onclick="getURL('configuracoes/categorias');">Categoria</a></li>
                        <li><a onclick="getURL('configuracoes/projetos');">Gerenciar Projetos</a></li>
                        <li><a onclick="getURL('configuracoes/disciplinas');">Gerenciar Disciplinas</a></li>
                        <li><a onclick="getURL('configuracoes/categoria_disciplina');">Gerenciar Categoria Disciplinas</a></li>
                        <li><a onclick="getURL('configuracoes/topicos');">Gerenciar Tópicos</a></li>
                    </ul>
                </div>
                <!--
                <div title="Comercial">  
                    <ul>
                        <li><a onClick="getURL('comercial/pedidos');">Pedidos</a></li>
                        <li><a onClick="getURL('comercial/pedidos');">Propostas</a></li>
                        <li><a onClick="getURL('comercial/contratos');">Contratos</a></li>
                        <li><a onClick="getURL('comercial/afiliados');">Afiliados</a></li>
                        <li><a onClick="getURL('comercial/descontos');">Vale Descontos</a></li>
                    </ul>
                </div>
                -->
                <div title="Financeiro">  
                    <ul>
                        <!--<li><a onClick="getURL('financeiro/caixa');">Fluxo de Caixa</a></li>-->
                        <!--<li><a onClick="getURL('financeiro/contas_pagar');">Contas á pagar</a></li>-->
                        <!--<li><a onClick="getURL('financeiro/contas_receber');">Contas á receber</a></li>-->
                        <li><a onClick="getURL('financeiro/faturas');">Cobranças</a></li>
                    </ul>
                </div>

                <div title="Artigos e Notícias">  
                    <ul>
                        <li><a onClick="getURL('suporte/tickets');">Artigos</a></li>
                        <!--<li><a onClick="getURL('suporte/base_de_conhecimento');">Base de Conhecimento</a></li>-->
                        <!--<li><a onClick="getURL('suporte/ordens_servico');">Ordens de Serviço</a></li>-->
                        <!--<li><a onClick="getURL('suporte/configuracoes');">Configurações</a></li>-->
                    </ul>
                </div>

                <!--
                <div title="Gráficos e Relatórios">  
                    <ul>
                        <li><a onClick="getURL('relatorios/competitividade');">Competitividade</a></li>
                        <li><a onClick="getURL('relatorios/consumo_disco');">Consumo de Disco</a></li>
                        <li><a onClick="getURL('relatorios/consumo_trafego');">Consumo de Tráfego</a></li>
                        <li><a onClick="getURL('relatorios/uptime');">SLA de Uptime</a></li>
                        <li><a onClick="getURL('relatorios/adicionais');">Serviços Adicionais</a></li>
                        <li><a onClick="getURL('relatorios/financeiro');">Financeiro</a></li>
                    </ul>
                </div>
                -->
                <!--div title="Ajuda">  
                    <ul>
                        <li><a id="mItem_cadastros">Sobre o Sistema</a></li>
                        <li><a id="mItem_suporte">Documentação</a></li>
                        <li><a id="mItem_suporte">API</a></li>
                    </ul>
                </div-->

            </div>  
        </div>
        <!-- /Menu Principal -->

        <!-- Centro (Frame Principal) -->
        <div region="center" id="mainframe">

    <!--<script>getURL('inicio/home');</script>-->
            <script>getURL('inicio/home');</script>
            <div id="view_loading" style="padding:5px;">
                <p style="margin-bottom:5px; font:12px Arial; color:#666;"><b>Por favor aguarde, carregando...</b></p>
                <div class="progress progress-striped active" style="height:15px;">
                    <div class="bar" style="width: 100%; height:15px;"></div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="http://assets.freshdesk.com/widget/freshwidget.js"></script>
        <style type="text/css" media="screen, projection">
            @import url(http://assets.freshdesk.com/widget/freshwidget.css); 
        </style> 
        <!--<script type="text/javascript">
                FreshWidget.init("", {"queryString": "", "buttonText": "Ajuda e Suporte", "buttonColor": "white", "buttonBg": "#333", "alignment": "2", "offset": "335px", "url": "http://gerentepro.freshdesk.com", "assetUrl": "http://assets.freshdesk.com/widget"} );
        </script>-->

        <div id="pop_alterarSenha"></div>
    </body>
</html>
