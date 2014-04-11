<script type="text/javascript">
$(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('[name="PROX_VENCIMENTO"]').datebox();
	//$('.easyui-combotree').
	$('.easyui-numberspinner').numberspinner();
	
	$('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
	$('.ch-single').chosen({disable_search: true});
	
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
	/*$('[rel="trocaStatus"]').click(function(){
		$('[name="STATUS"]').attr("value", $(this).data('id'));
		
		if($('[name="STATUS"]').val() == 1){
			$('li#trocaStatus').html('<a data-id="0" rel="trocaStatus"><i class="icon-ban-circle"></i> Suspender</a>');
		}
		else if($('[name="STATUS"]').val() == 0){
			$('li#trocaStatus').html('<a data-id="1" rel="trocaStatus"><i class="icon-ok"></i> Ativar</a>');
		}
	});*/
	
	
	
	$('[rel="encerrarConta"]').click(function(){
	
		$.messager.confirm('Aviso','Tem certeza que deseja <b>ENCERRAR</b> este serviço?', function(resp){
			if(resp){  
				
				$.ajax({
					type: 'GET',
					url: '<?=site_url()?>/admin/json/submitEncerrar_servico/'+$('.idServico').val(),
					dataType: 'html',
					beforeSend: function(){
						$("#pop_viewServico").dialog("close");
						$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
					},
		
					success: function(response){
						$.unblockUI();
	
						if(response == "ok"){
							$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
							getURL('cadastros/servicos');
						}else{
							$.messager.alert('Aviso', response, 'error');
							getURL('cadastros/servicos');
						}
					}
				}); // fim do ajax
			}
		});

	});
	
	$('[rel="trocaStatus"]').click(function(){

		$.messager.confirm('Aviso','Tem certeza que deseja <b>suspender</b> este serviço?', function(resp){
			if(resp){  
				
				$.ajax({
					type: 'GET',
					url: '<?=site_url()?>/admin/json/submitSuspende_servico/'+$('.idServico').val(),
					dataType: 'html',
					beforeSend: function(){
						$("#pop_viewServico").dialog("close");
						$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
					},
		
					success: function(response){
						$.unblockUI();
	
						if(response == "ok"){
							$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
							getURL('cadastros/servicos');
						}else{
							$.messager.alert('Aviso', response, 'error');
							getURL('cadastros/servicos');
						}
					}
				}); // fim do ajax
			}
		});

	});
	
	
	$('[rel="reativarStatus"]').click(function(){
	
		$.ajax({
			type: 'GET',
			url: '<?=site_url()?>/admin/json/submitReativar_servico/'+$('.idServico').val(),
			dataType: 'html',
			beforeSend: function(){
				$("#pop_viewServico").dialog("close");
				$.blockUI({ message: '<div style="padding:10px; border:2px; height:20px; font:13px Open Sans; font-weight:600;"><img src="<?=site_url()?>assets/img/gif/ajax-loading.gif" /> Por favor aguarde, Carregando...</div>' });
			},

			success: function(response){
				$.unblockUI();

				if(response == "ok"){
					$.messager.alert('Aviso', 'Operação realizada com sucesso!', 'info');
					getURL('cadastros/servicos');
				}else{
					$.messager.alert('Aviso', response, 'error');
					getURL('cadastros/servicos');
				}
			}
		}); // fim do ajax
	});

	
	
	if($("#add_tipo_pessoa").val() == 'juridica'){
		$("#add_exibe_juridica").show();
		$("#add_exibe_fisica").hide();
	}else{
		$("#add_exibe_fisica").show();
		$("#add_exibe_juridica").hide();
	}
	
	$('button.unique').click(function() {
		$('button.unique:checked').not(this).removeAttr('checked');
		$("#novo_ciclo").attr("value",$(this).val());		
	});
	
	$(".formatDATE").mask("99/99/9999");
	$(".formatCPF").mask("999.999.999-99");
	$(".formatCNPJ").mask("99.999.999/9999-99");
	$(".formatCEP").mask("99.999-999");
	$(".formatTEL").mask("(99) 9999-9999");
	$(".formatMONEY").maskMoney({showSymbol:false,symbol:"R$", decimal:".", thousands:",", allowZero:true});
	
});




</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Geral</a></li>
    </ul>
    <form id="form_EditServico" name="form_add" method="post" action="">
    <div id="tabs-1" style="height:400px; overflow:hidden;"> 
        <fieldset>
        <div class="line">
                    

            <label>Área
                <br />
                <select name="EDITORA" data-placeholder="Selecione uma area..." class="ch-select">
                    <option value=""></option>
                    <option value="">Tribunais MPs e Defensorias</option>
                    <option value="">Segurança</option>
                    <option value="">Bancos e Estatais</option>
                    <option value="">Agencias Reguladoras</option>
                    <option value="">Auditor Fiscal</option>
                  </select>
            </label>
            
            
            
            <label>Status
                <br />
                <!--<div class="btn-group" data-toggle="buttons-radio">  
                	<button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique <?=($xml->STATUS == 1) ? 'active btn-success' : ''?>">Ativo</button>
                    <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="juridica" class="btn unique <?=($xml->STATUS == 0) ? 'active btn-danger' : ''?>">Inativo</button>
                </div>-->
                
                <div class="btn-group" data-toggle="dropdown">
                    <button class="btn <?=($xml->STATUS == 1) ? 'btn-success' : 'btn-danger'?>" style="width:80px;">
					<?=($xml->STATUS == 1) ? 'Ativo' : 'Suspenso'?></button>
                    <button class="btn <?=($xml->STATUS == 1) ? 'btn-success' : 'btn-danger'?> dropdown-toggle btIcon2" data-toggle="dropdown">
                    	<span class="caret"></span>
                    </button>
                    <input type="hidden" name="STATUS" value="<?=$xml->STATUS?>" />
                    <ul class="dropdown-menu pull-right">
                        <!-- dropdown menu links -->

                        <li id="trocaStatus" class="dropdown"><a data-id="<?=$xml->CODIGO?>" <?=($xml->STATUS == 1) ? 'rel="trocaStatus"' : 'rel="reativarStatus"'?>><?=($xml->STATUS == 1) ? '<i class="icon-ban-circle"></i> Suspender' : '<i class="icon-ok"></i> Reativar'?></a></li>

                        <li class="divider"></li>
                        <li class="dropdown"><a data-id="<?=$xml->CODIGO?>" rel="encerrarConta"><i class="icon-trash"></i> Encerrar conta</a></li>
                    </ul>
                </div>
                
            </label>
            
            <label>Curso
                <br />
                <select name="EDITORA" data-placeholder="Selecione uma area..." class="ch-select" style="width:510px;">
                    <option value=""></option>
                    <option value="">BB, CEF E BASA (Escriturário/Técnico Bancário) dasdad dasd</option>
                    <option value="">Segurança</option>
                    <option value="">Bancos e Estatais</option>
                    <option value="">Agencias Reguladoras</option>
                    <option value="">Auditor Fiscal</option>
                  </select>
            </label>
            
            
                       
        </div>
        </fieldset>
        
        <fieldset><legend>Ciclos do Projeto</legend>
            <div class="line">
                <div style="float:left; width:510px; overflow:auto;">
                    <div class="btn-group" data-toggle="buttons-radio">  
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="mensal" class="btn unique <?=($xml->CICLO == 'mensal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>1</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="trimestral" class="btn unique <?=($xml->CICLO == 'trimestral') ? 'active' : ''?>" style="padding:10px 15px;font-weight: normal; font-size:16px;">
                            <center>2</center>
                        </button>
                        
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="semestral" class="btn unique <?=($xml->CICLO == 'semestral') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>3</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="anual" class="btn unique <?=($xml->CICLO == 'anual') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>4</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>5</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>6</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>7</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>8</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>9</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>10</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>11</center>
                        </button>
                        <button id="pessoa_juridica" type="button" data-toggle="button" name="option" value="bienal" class="btn unique <?=($xml->CICLO == 'bienal') ? 'active' : ''?>" style="padding:10px 15px; font-weight: normal; font-size:16px;">
                            <center>12</center>
                        </button>
                    </div>
                </div>
                
                <input type="hidden" name="CICLO" id="novo_ciclo" value="<?=$xml->CICLO?>" />
                
                <p style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">Atenção: </b> Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            </div>
            
            <div class="line" style=" float:left; margin-top:20px;">
                <label>Cliente Desde
                    <br />
                    <input value="<?=dateFormat($xml->DATA, "d/m/Y")?>" disabled="disabled" type="text" class="textfield-text" style="width:105px;" />
                </label>
                
                <label>Próx. Vencimento
                    <br />
                    <input value="<?=dateFormat($xml->PROX_VENCIMENTO, "d/m/Y")?>" name="PROX_VENCIMENTO" type="text" class="textfield-text" style="width:105px;" />
            	</label>
            </div>
            <div class="line" style=" float:right; text-align:right; margin-top:40px;">
            	
                <p style=" float:right; font-size:11px; line-height:16px; color:#666;">
                    <font style="font-size:12px;">Para: <a id="6" rel="exibeCliente"><b><?=($cliente->TIPO_PESSOA == "juridica") ? $cliente->RAZAO_SOCIAL : $cliente->NOME_COMPLETO?></b> <i class="icon-user"></i></a></font><br />
                    <?=$cliente->EMAIL?>
                </p>
            </div>
        </fieldset>
        
    </div><!-- /Inicio-->

    </form>
</div><!-- /.easyui-tabs -->