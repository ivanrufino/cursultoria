<?php //$this->load->view('json/default');?>
<?php //$this->load->view('json/config');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
	<div id="tit_session" style="border-bottom:0px;"><?=$nome_pagina?></div>
    
    <!--<div id="tit_subsession"><?=$nome_pagina?></div>-->
	
    <div class="well" style="margin-top:10px; padding:10px;">
        <table width="100%" border="0">
          <tr>
            <td width="98%" valign="top" id="mainConfig" style="padding-right:10px;">
            
            <div style="float:left; width:48%;">
                <div style="display:block; overflow:auto;">
                	<div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/_icon_operator.png" />
                    	Controle de Acesso
                    </div>
                    <ul class="list_configuracao">
                    	<li><a onclick="getSUB('configuracoes/usuarios');">Gerenciar Usuários</a></li>
                        <li><a onclick="getSUB('configuracoes/usuarios_grupos');">Grupos de Usuários</a></li>
                        <!--<li><a href="#">Permissões de acesso</a></li>-->
                    </ul>
                </div>
                
                <div style="display:block; overflow:auto;">
                    <div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/_icon_help2.png" />
                    	Suporte Técnico
                    </div>
                    <ul class="list_configuracao">
                    	<li><a onclick="getSUB('configuracoes/suporte_departamentos');">Departamentos de Suporte</a></li>
                        <li><a onclick="getSUB('configuracoes/suporte_categorias');">Categorias de Suporte</a></li>
                        <!--<li><a href="#">Status dos Tickets</a></li>-->
                    </ul>
                </div>
                
                <!--<div style="display:block; overflow:auto;">
                	<div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/plugin_32.png" />
                    	Módulos e Plugins
                    </div>
                    <ul class="list_configuracao">
                    	<li><a href="#">cPanel / WHM</a></li>
                        <li><a href="#">Plesk</a></li>
                        <li><a href="#">CentovaCast</a></li>
                        <li><a href="#">WHMSonic</a></li>
                        <li><a href="#">Gamecp</a></li>
                        <li><a href="#">CloudLinux</a></li>
                        <li><a href="#">SolusVM</a></li>
                        <li><a href="#">OneApp</a></li>
                    </ul>
                </div>-->
            </div>
            <!-- ./LEFT -->
            
            <div style="float:right; width:48%;">
                
                <div style=" display:block; overflow:auto;">
                	<div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/_icon_package_utilities.png" />
                    	Ferramentas
                    </div>
                    <ul class="list_configuracao">
                    	
                        <li><a onclick="getSUB('configuracoes/bibliografias');">Gerenciar Bibliografias</a></li>
                        <li><a onclick="getSUB('configuracoes/autores');">Gerenciar Autores</a></li>
                        <li><a onclick="getSUB('configuracoes/editoras');">Gerenciar Editoras</a></li>
                        <li><a onclick="getSUB('configuracoes/categorias');">Gerenciar Categoria</a></li>
                        <!--<li><a href="#">Importar / Exportar</a></li>-->
                        <!--<li><a href="#">Configurar servidor SMTP</a></li>-->
                    </ul>
                </div>
                
                <div style="display:block; overflow:auto;">
                	<div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/_icon_money2.png" />
                    	Financeiro
                    </div>
                    <ul class="list_configuracao">
                    	<!--<li><a href="#">Moedas</a></li>-->
                    	<li><a onclick="getSUB('configuracoes/gateways_pagamento');">Formas de Pagamento</a></li>
                        <!--<li><a href="#">Gerenciar Contas Bancárias</a></li>-->
                        
                    </ul>
                </div>
                
                <div style="display:block; overflow:auto;">
                	<div class="tit_configuracao">
                    	<img src="<?=site_url()?>/assets/img/icons/32x32/_icon_services2.png" />
                    	Produtos e Serviços
                    </div>
                    <ul class="list_configuracao">
                    	<li><a onclick="getSUB('configuracoes/projetos');">Gerenciar Projetos</a></li>
                        <li><a onclick="getSUB('configuracoes/categoria_disciplina');">Gerenciar Categoria Disciplinas</a></li>
                        <li><a onclick="getSUB('configuracoes/disciplinas');">Gerenciar Disciplinas</a></li>
                        <li><a onclick="getSUB('configuracoes/topicos');">Gerenciar Tópicos</a></li>
                    </ul>
                </div>
            </div>
            <!-- ./RIGHT -->

            </td>
           
          </tr>
        </table>
    </div>

	
</div>
<!-- pop-up de operações -->
<div id="pop_trocaLogo"></div>

<!-- pop-up mudar senha -->
<div id="pop_mudarSenha"></div>

<!-- pop-up altgerar dados de cadastro -->
<div id="pop_alterCadastro"></div>
