<script type="text/javascript">
$(function(){
	$('.dropdown-toggle').dropdown();  
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-accordion').accordion();
});
</script>
<div id="aa" class="easyui-accordion"> 
    
    <div title="Controle de Acesso">  
        <ul>
            <li><a onClick="getURL('cadastros/clientes');">Gerenciar Usuários</a></li>
            <li><a onClick="getURL('cadastros/fornecedores');">Grupos de Usuários</a></li>
            <li><a onClick="getURL('cadastros/agentes');">Permissões de acesso</a></li>
        </ul>
    </div>
    
    <div title="Suporte Técnico">  
        <ul>
            <li><a onClick="getURL('comercial/pedidos');">Departamentos de Suporte</a></li>
            <li><a onClick="getURL('comercial/pedidos');">Status dos Tickets</a></li>
        </ul>
    </div>
    
    <div title="Ferramentas">  
        <ul>
            <li><a onClick="getURL('financeiro/caixa');">Gerenciar Servidores</a></li>
            <li><a onClick="getURL('financeiro/contas_pagar');">Códigos de Integração</a></li>
            <li><a onClick="getURL('financeiro/contas_receber');">Importar / Exportar</a></li>
            <li><a onClick="getURL('financeiro/faturas');">Configurar servidor SMTP</a></li>
        </ul>
    </div>
    
    <div title="Financeiro">  
        <ul>
            <li><a onClick="getURL('suporte/tickets');">Moedas</a></li>
            <li><a onClick="getURL('suporte/base_de_conhecimento');">Gateways de Pagamento</a></li>
            <li><a onClick="getURL('suporte/ordens_servico');">Gerenciar Contas Bancárias</a></li>
        </ul>
    </div>
    
    <div title="Produtos e Serviços">  
        <ul>
            <li><a onClick="getURL('relatorios/competitividade');">Gerenciar Produtos / Serviços</a></li>
            <li><a onClick="getURL('relatorios/consumo_disco');">Opções Configuráveis</a></li>
            <li><a onClick="getURL('relatorios/consumo_trafego');">Serviços Adicionais</a></li>
            <li><a onClick="getURL('relatorios/uptime');">Preços dos Domínios</a></li>
            <li><a onClick="getURL('relatorios/adicionais');">Registrantes de Domínio</a></li>
        </ul>
    </div>

    <div title="Módulos e Plugins">  
        <ul>
            <li><a id="mItem_cadastros">cPanel / WHM</a></li>
            <li><a id="mItem_suporte">Plesk</a></li>
        </ul>
    </div>
    
</div>  