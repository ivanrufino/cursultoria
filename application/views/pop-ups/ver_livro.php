<script type="text/javascript">
$(document).ready(function(){
    //$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
    $('.easyui-tabs').tabs();
    $('.easyui-combobox').combobox();
    $('.easyui-numberspinner').numberspinner();
    
    $('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
    $('.ch-single').chosen({disable_search: true});
    
    $('#bt_ver_mes').linkbutton({  
        iconCls: 'icon-search'  
    });
    
    $(".formatANO").mask("9999");
    
    $(".unique").live('click',function(){
        $("#TIPO").val($(this).val())
    })
});
</script>

<div id="detalheDominio" style="overflow:inherit;">
	<form id="form_editLivro" name="form_add" method="post" action="" enctype="multipart/form-data">

    	<input type="hidden" name="CODIGO" value="<?=$bibliografia->CODIGO?>" />
       
        <fieldset>
            <div class="line">
                
                <label style=" float:left; width:338px;">
                    Descrição
                    <br />
                     <input name="DESCRICAO" type="text" class="textfield-text" value="<?=$bibliografia->DESCRICAO?>" required="required" style="width:323px;">
                </label>
                
                <label class="extensao">
                    Edição
                    <br />
                     <input type="text" name="EDICAO"  class="textfield-text" required="required"  value="<?=$bibliografia->EDICAO ?>" style="width:100px; font-weight:bold;" />
                </label>

                <label class="extensao">
                    Ano
                    <br />
                     <input type="text" name="ANO" class="formatANO" required="required"  value="<?=$bibliografia->ANO?>" style="width:100px; font-weight:bold;" />
                </label>
            </div>
        </fieldset>
        
        <fieldset><legend>Detalhes da Bibliografia</legend>
            <div class="line">
                <div style="float:left; width:100%;">
                    <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
                      
                      <tr>
                        <td class="extrato" style="width:170px;" align="center">
                            <label>
                                Capa
                                <input type="hidden" name='nomeFoto' value="<?=$bibliografia->FOTO?>">
                            <div style="width:160px; height:200px; border:1px solid #ccc; background:#eee;text-align:center;">
                                 <img src="<?=site_url()?>uploads/livros/<?=$bibliografia->FOTO?>" style=" max-height: 100%;" />   
                            </div>
                            
                            </label>
                            
                        </td>
                        
                        <td class="final" valign="top">
                            
                            <div style="float:left; width:200px;">
                                <label >
                                    Editora
                                    <br />
                                      <select name="COD_EDITORA" data-placeholder="Selecione uma editora..." required="required"  class="ch-select">
                                        
                                        <?php foreach($editoras as $key =>$editora): 
                                            $selected="";
                                            if ($bibliografia->COD_EDITORA==$editora->CODIGO){
                                                $selected="selected";
                                            }
                                        ?>

                                        <option value="<?=$editora->CODIGO?>" <?=$selected?> > <?=$editora->DESCRICAO?></option>
                                        <?php endforeach;?>
                                      </select>
                                </label>
                                
                            </div>
                            
                            <div style="float:right; width:150px;">
                            <label >
                                Tipo<br />
                                <input type="hidden" value="<?=$bibliografia->TIPO?>" id="TIPO" name="TIPO" readonly>
                                <div class="btn-group" data-toggle="buttons-radio">  
                                    <?php 
                                        $leitura="";$video="";
                                    if ($bibliografia->TIPO =='Leitura') {$leitura="active";}else{$video="active";} ?>
                                  <button id="Leitura" type="button" data-toggle="button" name="option"  value="Leitura" class="btn unique <?=$leitura ?>  ico-pencil-alt">Leitura</button>
                                  <button id="Video" type="button" data-toggle="button" name="option" value="Video" class="btn unique <?=$video ?> ico-videocam">Video</button>
                                </div>
                                </label>
                            </div>
                            
                            <label >
                                Autores
                                <br />
                                <?php foreach ($autores_selecionados as $key => $value) {
                                    echo "<input type='hidden' name='selecionado[]' value='$value[CODIGO]'>";
                                    $selecionados[]=$value['CODIGO'];
                                }
                              ?>
                                  <select name="AUTOR[]" data-placeholder="Selecione os autores..." required="required"  size="4" multiple="multiple" class="ch-select" style="width:400px !important;">
                                    

                                    <?php foreach($autores as $key =>$autor): 
                                        $selected="";
                                        if (in_array($autor->CODIGO, $selecionados)) { 
                                            $selected="selected";
                                        }
                                    ?>
                                        <option value="<?=$autor->CODIGO?>" <?=$selected?> > <?=$autor->DESCRICAO?></option>
                                        <?php endforeach;?>
                                  </select>
                            </label>
                             <label >
                                Selecionar Capa
                                <br />
                                  <input type="file" name="FOTO">
                            </label>
                        
                        </td>
                      </tr>
                      
                    </table>
                </div>
                
                <p class="msg alert " style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">
                    Atenção: </b> Lembre-se todos os campos são obrigatórios.</p>
            </div>
        </fieldset>


        </form>
    </div>
</div>