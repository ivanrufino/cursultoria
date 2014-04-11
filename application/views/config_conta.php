<?php
$this->load->view('json/config');
?>
<script type="text/javascript">
$(document).ready(function(){
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatTEL0800").mask("9999 999 9999");
	
	$('input[id=lefile]').change(function() {
	   $('#photoCover').val($(this).val());
	   
	});
	
	$('.clickFotoLogo').click(function(){
		$('#lefile').click();
	});
	
	$('.submit_contaPersonalizacao').click(function(){		
		$('#contaPersonalizacao').ajaxForm({
	
			url: '<?=site_url()?>/admin/json/enviaTema',
			resetForm: true,
			/*dataType: 'json',*/
			beforeSend: function(){
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},  
			success: function(response) {
				$.unblockUI();
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/conta');
				getNomeChave();
			}		
		}).submit();
	});
	
	$('.submit_contaEndereco').click(function(){		
		$('#contaEndereco').ajaxForm({
	
			url: '<?=site_url()?>/admin/json/editaEndereco',
			resetForm: true,
			beforeSend: function(){
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},  
			success: function(response) {
				$.unblockUI();
				$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
				getURL('configuracoes/conta');
				getNomeChave();
			}		
		}).submit();
	});
	
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
				
				var largura = $('#img_prev').width();
				var altura = $('#img_prev').height();
				
				$('#img_prev').attr('src', e.target.result);								
				$("#data_prev").html("<b>Tamanho:</b> "+largura+"x"+altura+" px");			
		};

		reader.readAsDataURL(input.files[0]);
	}
}
</script>
<script type="text/javascript">
var myPicker = new jscolor.color(document.getElementById('myField1'), {});
</script>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b>Meu GerentePRO</b></p>    
</div><!-- #breadcrumb -->

<div id="tit_session" style="border-bottom:0px;">Meu GerentePRO</div>
	
<div id="configContas" style="padding:10px;">

    <div class="easyui-tabs wrap borda5px" fit="true" border="false" id="tt">
        <ul>
            <li><a href="#tabs-1">Assinatura</a></li>
            <li><a href="#tabs-2">Personalização</a></li>
            <li><a href="#tabs-3">Endereço</a></li>
            <li><a href="#tabs-4">Faturas</a></li>
        </ul>
        
        <div id="tabs-1" style="overflow:hidden;"> 
        	<p>Você pode visualizar os detalhes do seu plano atual ou comparar os preços e recursos dos outros planos.</p>
            
            <div class="alert" style="margin-top:5px;">
            	<p><b>Adquira seu GerentePRO Hoje!</b><br />
                Você está testando a versão <strong>Beta</strong> e possui <strong><?=diferencaData($chave->VALIDADE)?> dias</strong> restantes em sua versão de teste. Selecione um plano e efetue o pagamento da fatura para continuar usando o GerentePRO.</p>
            </div>
        </div><!-- /Assinatura-->
        
        <div id="tabs-2" style="overflow:hidden;"> 
        	<p>As opções de personalização de marca permitem que você personalize seu nome, URL, cores e logotipo da sua Central de Clientes e também para aplicativos móveis.</p>
            <form id="contaPersonalizacao" method="post">
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">O nome de sua conta do GerentePRO</td>
                        <td valign="top"><input name="NOME_GERENTEPRO" type="text" value="<?=$chave->EMPRESA?>" class="textfield-text borda5px" style="width:360px; padding:4px;" />
                        <p style="margin-top:10px;">
                        	O nome de seu GerentePRO. Ele aparece na página inicial da sua Central de Cliente, em notificações por email e feeds RSS.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Logotipo do cabeçalho</td>
                        <td valign="top">
                        <input id="lefile" name="LOGOTIPO" onchange="readURL(this);" type="file" style="display:none;" />
                        <div class="input-append" style="margin-top:5px;">
                           <input id="photoCover" style="width:240px; height:22px;" class="input-large textfield-text" type="text">
                           <a class="btn clickFotoLogo">Arquivo</a>
                        </div>
                        
                        <p style="margin-top:10px;">
                        	Esse logo aparece no lado esquerdo do cabeçalho da sua Central de Cliente. O logotipo do GerentePRO é exibido a menos que você o altere. Adicione um logotipo de 200px de largura por 70px de altura de dimensão. O plano de fundo do logotipo deve ser transparente ou corresponder à cor do plano de fundo do cabeçalho escolhida.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Cores</td>
                        <td valign="top">
                        
                        <input name="COR_PADRAO" id="myField1" type="text" value="<?=$this->temas->getCor()?>" class="textfield-text borda5px color" style="width:80px; height:22px; margin-top:5px;" />
                        
                        <p style="margin-top:10px;">
                        	Clique para selecionar a cor ou inserir um código hexadecimal.</p>
                        </td>
                    </tr>
                </table>
            </div>
            <!--
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Mapeamento do host</td>
                        <td valign="top"><input name="MAPEAMENTO" type="text" value="<?=$chave->MAPEAMENTO?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        <p style="margin-top:10px;">
                        	Use esta configuração para mapear um de seus próprios nomes de domínio para o GerentePRO (por exemplo, use <strong>central.minhaempresa.com.br</strong> ao invés de <strong>mundvs.gerentepro.com.br</strong>). O nome do domínio inserido aqui também será usado nas notificações por email enviadas de seu GerentePRO.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Subdomínio</td>
                      <td valign="top">
                        <p>
                        	A URL do seu GerentePRO tem duas partes: um nome de subdomínio, escolhido quando você configurou sua conta, seguido por gerentepro.com.br (por exemplo: minhaempresa.gerentepro.com.br). Você pode mudar o nome do subdomínio escolhido (a parte minhaempresa) mas fazer isso tem consequências. </p>
                            
                        <p style="margin-top:10px;">
                        	Seu subdomínio atual:<br />
							<b>mundvs</b>.gerentepro.com.br
                          
                        	<input type="hidden" name="USUARIO" value="<?=$chave->USUARIO?>" />
                        <p style="margin-top:10px;">
                        	<a href="" class="btn">Mudar seu subdomínio</a>
                        </p>
                        </td>
                    </tr>
                </table>
            </div>
            -->
            </form>
            
            <div class="line_config" style="border-bottom:0px; padding-bottom:0px;">
            	<a class="btn btn-inverse submit_contaPersonalizacao">Salvar aba</a>
            </div>
        </div><!-- /Personalização-->
        
        <div id="tabs-3" style="overflow:hidden;"> 
        	<p>A seção Endereço permite que você insira informações sobre sua empresa. O endereço inserido aqui é exibido nas faturas dos seus clientes.</p>
            <form id="contaEndereco" method="post">
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Nome da empresa</td>
                        <td valign="top"><input name="NOME_EMPRESA" type="text" value="<?=($dadosConta != NULL)? $dadosConta->NOME_EMPRESA : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        <p style="margin-top:10px;">
                        	O nome de sua empresa.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">CNPJ</td>
                        <td valign="top"><input name="CNPJ" type="text" value="<?=($dadosConta != NULL)? $dadosConta->CNPJ : "";?>" class="textfield-text borda5px formatCNPJ" style="width:320px; padding:4px;" />
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">CEP</td>
                        <td valign="top"><input name="CEP" type="text" value="<?=($dadosConta != NULL)? $dadosConta->CEP : "";?>" class="textfield-text borda5px formatCEP" style="width:180px; padding:4px;" /> <a href="" class="btn">Buscar CEP</a>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Endereço</td>
                        <td valign="top"><input name="ENDERECO" type="text" value="<?=($dadosConta != NULL)? $dadosConta->ENDERECO : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        <p style="margin-top:10px;">
                        	Ex: Nome da rua, Nº.
                        </p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Bairro</td>
                        <td valign="top"><input name="BAIRRO" type="text" value="<?=($dadosConta != NULL)? $dadosConta->BAIRRO : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Cidade</td>
                        <td valign="top"><input name="CIDADE" type="text" value="<?=($dadosConta != NULL)? $dadosConta->CIDADE : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Estado</td>
                        <td valign="top"><input name="ESTADO" type="text" value="<?=($dadosConta != NULL)? $dadosConta->ESTADO : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Telefone</td>
                        <td valign="top"><input name="TELEFONE" type="text" value="<?=($dadosConta != NULL)? $dadosConta->TELEFONE : "";?>" class="textfield-text borda5px formatTEL" style="width:320px; padding:4px;" /><br />
                        	<input name="TEL_0800" type="text" value="<?=($dadosConta != NULL)? $dadosConta->TEL_0800 : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px; margin-top:5px;" />
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Site</td>
                        <td valign="top"><input name="SITE" type="text" value="<?=($dadosConta != NULL)? $dadosConta->SITE : "";?>" class="textfield-text borda5px" style="width:320px; padding:4px;" />
                        <p style="margin-top:10px;">
                        	Adicione a URL para o site de sua empresa e vincularemos o logo no cabeçalho da página da sua Central de Cliente.
                        </p>
                        </td>
                    </tr>
                </table>
            </div>
            
             <div class="line_config" style="border-bottom:0px; padding-bottom:0px;">
            	<a class="btn btn-inverse submit_contaEndereco">Salvar aba</a>
            </div>
            </form>
            
        </div><!-- /Endereço-->
        
        <div id="tabs-4" style="overflow:hidden;"> 
        	<p>As faturas mostram o responsável pela conta e permitem que você copie outros em suas faturas. Você também pode visualizar os detalhes de sua fatura.</p>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Responsável pela conta</td>
                        <td valign="top"><input name="NOME_GERENTEPRO" type="text" value="<?=$chave->RESPONSAVEL?>" class="textfield-text borda5px" style="width:360px; padding:4px;" />
                        
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="line_config">
            	<table>
                	<tr>
                    	<td class="th" valign="top">Faturas</td>
                        <td valign="top">
                        	
                            <div id="users-contain" class="ui-widget">
                            <table width="100%" id="list_cadastros" class="ui-widget ui-widget-content dataTable display" style="width:700px">
                                <thead>
                                    <tr class="ui-widget-header">
                                        <th width="18%">Período</th>
                                        <th width="16%">Descrição</th>
                                        <th width="5%">Valor</th>
                                        <th width="5%" align="center">Situação</th>
                                    </tr>
                                </thead>
                                <tbody>        
                                
                                    <label for="item">
                                        <td>07/08/2013 até 07/09/2013</td>
                                        <td>Plano Plus - GerentePRO</td>
                                      
                                        <td>R$ 19,90</td>
                                        <td><p class="tag_yellow" style="color:#fff;">Pendente</p></td>
                                    </label>
                                    
                                  </tr>
                                
                                </tbody>
                            </table>
                            </div>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div><!-- /Faturas-->
    
    </div><!-- /.easyui-tabs -->
</div>