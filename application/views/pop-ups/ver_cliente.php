<script type="text/javascript" src="<?=site_url()?>/assets/js/jquery.pstrength.js"></script>
<script type="text/javascript">
	

$(function(){
		
	$(".password_adv").passStrength({
		shortPass: 		"top_shortPass",
		badPass:		"top_badPass",
		goodPass:		"top_goodPass",
		strongPass:		"top_strongPass",
		baseStyle:		"top_testresult",
		userid:			".pstrength",
		messageloc:		0
	});

	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('#list_afiliado').combobox();
	$('#list_tipoconta').combobox();
	$('#list_banco').combobox();
	
	$('#list_estados_edit').combobox({
		mode:'remote',
		enabled:true,
		onChange:function(newValue) {
			$('#list_cidades_edit').combobox({
				mode:'remote',
				enabled:true,		
				url: "<?=site_url()?>/admin/json/lista_cidades/" + newValue,
				valueField:'DESCRICAO',  
				textField:'DESCRICAO'				
			});	
		}
	});
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	
	$("#tipo_pessoa").attr("value",'<?=$dados->TIPO_PESSOA?>');
	if($("#tipo_pessoa").val() == 'juridica'){
		$("#exibe_juridica").show();
		$("#exibe_fisica").hide();
	}else{
		$("#exibe_fisica").show();
		$("#exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#tipo_pessoa").attr("value",$(this).val());
		if($(this).val() == 'juridica'){
			$("#exibe_juridica").show();
			$("#exibe_fisica").hide();
		}else{
			$("#exibe_fisica").show();
			$("#exibe_juridica").hide();
		}
		
	});
	
	var btns = ['pessoa_fisica', 'pessoa_juridica'];
		var input = document.getElementById('btn-input');
		for(var i = 0; i < btns.length; i++) {
		document.getElementById(btns[i]).addEventListener('click', function() {
		  input.value = this.value;
		  $("#tipo_pessoa").attr("value",input.value);
		});
	}
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatCEL").mask("(99) 9-9999-9999");
	
	
	$('.btClienteExtrato').click(function(){
		$.ajax({
			type: 'POST',
			url: '<?=site_url()?>admin/json/extratoCliente_admin',
			data:$('#exibe_mes').serialize(),
			beforeSend: function(){
				$(".btClienteExtrato").button('loading');
				$("#buscaMes").html("Carregando...");
			},
	
			success: function(data){
				$(".btClienteExtrato").button('reset');
				$("#buscaMes").html(data);
			}
		});
	});
});

</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
<form id="form_editCadastros" name="form_edit" method="post" action="" style="margin:0px;">
    <ul>
        <li><a href="#tabs-1">Dados Cadastrais</a></li>
        <li><a href="#tabs-3">Financeiro</a></li>
        <li><a href="#tabs-2">Informações Adicionais</a></li>
    </ul>
    
    <div id="tabs-1" style="height:405px; overflow:hidden;"> 

        <fieldset><legend>Informações de Contato</legend>
        <div class="line"> 
        	
            <div class="btn-group" data-toggle="buttons-radio" style="margin-top:10px;">  
              <button id="pessoa_fisica" type="button" data-toggle="button" name="option"  value="fisica" class="btn unique <?=($dados->TIPO_PESSOA == 'fisica') ? 'active' : '';?>">Pessoa Física</button>
              <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique <?=($dados->TIPO_PESSOA == 'juridica') ? 'active' : '';?>">Pessoa Jurídica</button>
            </div>            

            <input type="hidden" name="TIPO_PESSOA" id="tipo_pessoa" value="" />
            <input type="hidden" id="id_cadastro" name="CODIGO" value="<?=$dados->CODIGO?>" />
        </div>
        
        <div class="line">
            <label style=" float:right; height:155px; ">Grupo
            <br />
                <select name="GRUPO" size="8" style="width:170px; background:#666; color:#fff;">
                    <option value="1" <?=($dados->GRUPO == 1) ? 'selected="selected""' : '';?>>Alunos</option>
                    <option value="2" <?=($dados->GRUPO == 2) ? 'selected="selected""' : '';?>>Professores</option>
                </select>
            </label>
            
            <label>Nome / Razão Social
                <br />
                <input name="RAZAO_NOME" type="text" value="<?=$dados->RAZAO_NOME?>" class="textfield-text" style="width:460px;" />
            </label>
        
            <div id="exibe_juridica" class="aba_cadastro">                
                <label>CNPJ
                	<br />
                    <input name="CNPJ" type="text" value="<?=$dados->CNPJ?>" class="textfield-text formatCNPJ" style="width:150px;" />
                </label>
            </div>                
            
            <div id="exibe_fisica" class="aba_cadastro">                
                <label>CPF
                	<br />
                    <input name="CPF" type="text" value="<?=$dados->CPF?>" class="textfield-text formatCPF" style="width:150px;" />
                </label>
            </div>

            <label>E-mail
            	<br />
                <input name="EMAIL" type="text" class="textfield-text" value="<?=$dados->EMAIL?>" style="width:285px; text-transform:lowercase;" />
            </label>
            
            <label>Telefone
            	<br />
                <input name="TELEFONE" type="text" class="textfield-text formatTEL" value="<?=$dados->TELEFONE?>" style="width:140px;" />
            </label>
            
            <label>Fax
            	<br />
                <input name="FAX" type="text" class="textfield-text formatTEL" value="<?=$dados->FAX?>" style="width:130px;" />
            </label>
            
            <label>Celular
            	<br />
                <input name="CELULAR" type="text" class="textfield-text formatCEL" value="<?=$dados->CELULAR?>"style="width:140px;" />
            </label>
            
        </div>
        </fieldset>
        
        <fieldset><legend>Dados de Endereço</legend>
        
            <div class="line">
                <label>CEP
                	<br />
                    <input name="CEP" type="text" class="textfield-text formatCEP" value="<?=$dados->CEP?>" style="width:100px;" />
                </label>
                
                <label>Logradouro
                	<br />
                    <input name="LOGRADOURO" type="text" class="textfield-text" value="<?=$dados->LOGRADOURO?>" style="width:410px;" />
                </label>
                
                <label>Nº
                	<br />
                    <input name="NUMERO" type="text" class="textfield-text" value="<?=$dados->NUMERO?>" style="width:70px;" />
                </label>
            </div>
            
            <div class="line">                
                <label>Estado
                	<br />
                    <select name="UF" id="list_estados_edit" class="easyui-combobox" style="width:140px;">    
                    <option value=""></option>                	
                        <?php foreach($lista_estados as $rs){
							echo "<option ";
							if($rs->SIGLA == $dados->UF){
								echo 'selected="selected""';
							}
							echo " value=".$rs->SIGLA.">".$rs->DESCRICAO."</option>\n";
						}
						?>
                    </select>
                </label>
                
                
                <label>Cidade
                	<br />
                    <select name="CIDADE" id="list_cidades_edit" class="easyui-combobox" value="<?=$dados->CIDADE ?>" style="width:180px;">			
						<?php
						foreach($this->cadastros->getCidades($dados->UF) as $rs2){
							echo "<option ";
							if($rs2->DESCRICAO == $dados->CIDADE){
								echo 'selected="selected""';
							}
							echo " value=".$rs2->DESCRICAO.">".$rs2->DESCRICAO."</option>";
						}
						?>
                    	
                    </select>
                </label>
                
                <label>Bairro
                	<br />
                    <input name="BAIRRO" type="text" class="textfield-text" value="<?=$dados->BAIRRO?>" style="width:190px;" />
                    </label> 
            </div>

        </fieldset>
        
        
    </div><!-- /Inicio-->
    <style type="text/css">
		
		
	</style>
    <div id="tabs-2" style="height:365px; overflow:hidden;">
    	<fieldset><legend>Configuração da Conta</legend>
        	<div class="line borda5px" style="overflow: auto;background-color:#e7ecf0; border:1px solid #ccc; padding:20px 0;"> 
           
                <table id="tb_senhaCliente" border="0">
                
                  <tr>
                    <th>Nova Senha<span> *</span></th>
                    <td><input type="password" name="NOVA_SENHA" id="NOVA_SENHA"  required class="password_adv" autocomplete="off" style="width:190px;" /><div class="pstrength"></div></td>
                  </tr>
                  <tr>
                    <th>Confirma Senha<span> *</span></th>
                    <td><input type="password" name="NOVA_SENHA" id="NOVA_SENHA"  required class="password_adv" autocomplete="off" style="width:190px;" /><div class="pstrength"></div></td>
                  </tr>
                </table>
            </div>

        </fieldset>


    </div><!-- /Inicio-->
    </form>
    
    <div id="tabs-3" class="tableExtrato" style="height:395px; overflow:hidden;"> 
       <fieldset><legend>Extrato Financeiro</legend>
       
       <a class="btn ico-pin" style="float:right;">Inserir Lançamento</a>
       
       </fieldset>
       
       <?php 
	   	$creditos = 0.00;
		$debitos = 0.00;
		if($saldo != NULL){
	   	foreach($saldo as $val){
		   	$creditos += $val->VAL_ENTRADA;
			$debitos += $val->VAL_SAIDA;
		}}
		?>
       
       <div id="bar_financeiro_resumo">
       		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                	<td class="labelz">Total de Créditos</td>
                    <td class="labelz">Total de Débitos</td>
                    <td class="labelz destaqueVal"><b>Saldo</b></td>
                </tr>
                <tr>
                	<td width="35%" class="numValor">R$ <?=numFormat($creditos)?></td>
                    <td width="35%" class="numValor">R$ <?=numFormat($debitos)?></td>
                    <td width="30%" class="numValor destaqueVal <?=($creditos < $debitos)? 'numNegativo' : 'numPositivo'?>">
                    	R$ <?=numFormat($creditos - $debitos)?>
                    </td>
                </tr>
            </table>
       </div>

       	<?php
			$financeiro = $this->financeiro->getExtrato($dados->CODIGO);
			if($financeiro != NULL){
			?>

       		
        	<p class="alert" style="font-size:11px; padding:5px; margin-bottom:5px;">Escolha um mês e clique em <b>Ver mês</b> para abrir o histórico do mês correspondente</p>
				
                <form id="exibe_mes" method="post" style="margin:0px;">
                    <select name="MES_EXTRATO" class="easyui-combobox" panelHeight="auto" style=" margin-bottom:0px; font:14px Open Sans; width:100px;">
                        <?php
                        $por_data = $this->financeiro->getExtratoGroup($dados->CODIGO);
						foreach($por_data as $by_data){
							echo '<option value="'.dateFormat($by_data->DATA, "Y-m").'">'.dateFormat($by_data->DATA, "m/Y").'</option>';
						}
						?>
                    </select>
                    <input type="hidden" name="CLIENTE" value="<?=$dados->CODIGO?>" />
                    
                    <a id="ver_mes" class="btn ico-calendar-check btClienteExtrato">Ver mês</a>
                </form>
                
               	<p style="font-size:12px; color:#666; margin-top:5px;">Confira abaixo seu extrato mensal de lançamentos.</p>

    
    	<div id="buscaMes" style="float:left; width:100%; overflow:auto; height:200px;">
        	
				
            <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
              <tr class="tr_sim">
                <th class="extrato" width="15%"><b>01/04/2012</b></th>
                <th width="65%"><b>Saldo Anterior</b></th>
                <th width="2%"></th>
                <th class="final"><b>R$ 0.000,00</b></th>
              </tr>
              <?php 
			  	foreach($financeiro as $key =>$bill):
					if($key % 2){
						echo '<tr class="tr_sim">';
					}else{
						echo '<tr>';
					}
			  ?>
                <td class="extrato"><?=dateFormat($bill->DATA, "d/m/Y")?></td>
                <td><?=$bill->DESCRICAO?></td>
                <td align="center"><?=($bill->TIPO == "debito")? " - " : " + ";?></td>
                <td class="final <?=($bill->TIPO == "debito")? "vermelho" : "verde";?>">R$ <?=($bill->TIPO == "debito") ? numFormat($bill->VAL_SAIDA) : numFormat($bill->VAL_ENTRADA)?></td>
              </tr>
              <?php endforeach;?>
              <tr>
                <td class="extrato">30/04/2012</td>
                <td><b>Saldo do mês de Abril</b></td>
                <td><b>  </b></td>
                <td class="final"><b>R$ 0.000,00</b></td>
              </tr>
              
            </table>
            <?php
			}else{
			?>
            <div class="alert" style="font-weight:400; font-size:16px; text-align:center;">
                <img style="margin-bottom:10px;" src="<?=site_url()?>assets/images/error_icon3.png" /><br />
                Nenhum lançamento encontrado.
            </div>
			<?php }?>
        </div>
		
    </div><!-- /Inicio-->
    
</div><!-- /.easyui-tabs -->