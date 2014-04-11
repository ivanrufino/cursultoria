 <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/jquery/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/1.2.15/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/locaweb-style/img/locastyle.css">
<!--<link rel="stylesheet" type="text/css" href="/locawebstyle/v1/assets/legacy/stylesheets/manual.css">-->
<style>
th,th:hover{background-size: auto 100% ;white-space: nowrap;padding: 10px}
.trTopicos td{width: 135px !important;text-align: center;}
#Tabletopicos2{width: auto; max-width:none;}
.chosen-container{width: auto !important;min-width: 264px}
.morePage{cursor: pointer;}

</style>

<?php $this->load->view("json/projetos");?>
<script type="text/javascript">
$(function(){

	
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-numberspinner').numberspinner();
	
	$('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
	$('.ch-single').chosen({disable_search: true});
	

	
/*  $('#tabs a').click(function(e) {
   $(this).tab('show');
   e.preventDefault();
}); */



function adcionarPagina(td){
  var id="5";
  tdPag='<input type="text" name="PAGINA_INCIO['+id+'][]" placeholder="1" style="width: 50px;"><input type="text" name="PAGINA_FIM['+id+'][]" placeholder="1"  style="width: 50px;"> ';
  
  $(td).append(tdPag);
}
function copiarLinha2(table){
  var clone =$(table+" tr:last").clone();
  clone.find('input').val('');
  clone.appendTo($(table));
  
}


$(".excluirLinha").on("click",function(){
    var tr=$(this).parent().parent();
    var quantidade= $('#Tabletopicos2 tr:visible').length ;
    if (quantidade==2){
      var clone =tr.clone();
      clone.find('input').val('');
      clone.find('td:first').html(" X ");
      clone.appendTo($("#Tabletopicos2"));
      //$(this).copiarLinha("#Tabletopicos2"); 
    }
    tr.html(" ");
    tr.hide();
});

$(".morePage").on('click',function(){
  var td=$(this).parent();
 // alert(td);
  adcionarPagina(td);
});

$(".inserir ").on('click',function(){  
    $(this).copiarLinha("#Tabletopicos2");
 return false;
})

var pode_inserir=false;
var cods=$("#biblio option:selected") ;

$("#biblio").change(function(){
  pode_inserir=true;
})
$(".addTopico").click(function(){
  $( "<input type='hidden' name='atualizar' value='atualizar' readonly> " ).prependTo( "#form_editLivro" );

  $(this).submitEdit_disciplina();
  //$("#pop_disciplina").dialog("close");
 
  $(this).verDisciplina();

  return false;
})
$(".addTopico2").click(function(){
    if (pode_inserir){
      var quantidade= $("#biblio option:selected").length ;
      if (quantidade ==0){
        $(".biblio-0").show();
      }else{
        $('.inserir').show();
        var table="";
        var tdPag="";
  
        //$(".topicos").append('');
          table+='<tr><th>Topicos</th>';
          $("#biblio option:selected").each(function(){
            //var  modelo = $("#top" ).html();
             var nome=$(this).text();
             var id = $(this).val();
            table+='<th>'+nome+'</th>';
            //tdPag+='<td><input type="text" name="PAGINA_INICIO['+id+'][]" placeholder="1" style="width: 50px;"><input type="text" name="PAGINA_FIM['+id+'][]" placeholder="1"  style="width: 50px;"> </td>';
            tdPag+='<td><input type="text" name="PAGINAS['+id+'][]" placeholder="por exemplo, 1-5, 8, 11-13" style=""> </td>';
            active=""; 
         });
      
        table+='</tr><tr class="trTopicos">';
    
        table+='<td><input type="text"  name="TOPICOS[]" class="txtTopicos textfield-text"></td>';
        table+=tdPag;
       table+='</tr>';
        $("#Tabletopicos2").html(table);
        $(".mensage").show();
        pode_inserir=false;
      }

    }
    return false;
  })
});


</script>

<div id="detalheDominio" style="overflow:hidden;">
	<form id="form_editLivro" name="form_edit" method="post" action="" enctype="multipart/form-data">
    	
        <fieldset>
            <div class="line">
                <input name="CODIGO" type="hidden" class="" value="<?=$disciplina->CODIGO; ?>" required="required" >
                <label style=" float:left; width:270px;">
                    Descrição
                    <br />
                     <input name="DESCRICAO" type="text" class="" value="<?=$disciplina->DESCRICAO; ?>" required="required" style="width:250px;">
                </label>
               </div>
                  <div class="line">
                <label >
                     Bibliografia
                     <br />
                     <?php foreach ($bibliografias_selecionadas as $key => $value) {
                                    echo "<input type='hidden' name='selecionado[]' value='$value[CODIGO]'>";
                                    $selecionados[]=$value['CODIGO'];
                                }
                              ?>
                       <select name="BIBLIOGRAFIAS[]" id="biblio" data-placeholder="Selecione as bibliografias..." required="required"  size="4" multiple="multiple" class="ch-select" style="min-width:600px !important;">
                         <option value="0"></option>
                         <?php foreach($bibliografias as $key =>$bibliografia): 
                               $selected="";
                                        if (in_array($bibliografia->CODIGO, $selecionados)) { 
                                            $selected="selected";
                                        }
                         ?>

                             <option value="<?=$bibliografia->CODIGO?>" <?=$selected?> > <?=$bibliografia->DESCRICAO.' - '.$bibliografia->NOME_EDITORA?></option>
                             <?php endforeach;?>
                       </select>
                 </label>
                

                
            </div>

        </fieldset>
         <div class="alert alert-success mensage" style="display:none">Os tópicos já cadastrados não sofreram nenhuma modificação</div>
         <p class="msg alert " style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">
                    Atenção: </b> Lembre-se todos os campos são obrigatórios.</p><br>
        <fieldset><legend style="text-transform:none"><a class="addTopico" data-id="<?=$disciplina->CODIGO; ?>" href="">Atualizar</a></legend>
            <div class="line" style="overflow: auto;width: auto;height: 228px;">
              <table id="Tabletopicos2">
                <tr><th></th> <th>Tópicos</th>
                <?php foreach ($bibliografias_selecionadas as $key => $value) {
                    echo "<th>$value[DESCRICAO]</th>";
                  }
                  
                ?>
                </tr>

                <?php 
              
                foreach ($topicos as $key => $topico) {
                  echo "<input type='hidden' name=COD_TOPICOS_GRAVADOS[] readonly value='$topico[CODIGO]'>";
                  echo "<tr><td style='text-align:center'><a class='excluirLinha' style='color:red'>X </a></td><td><input type='hidden' readonly name=COD_TOPICOS[] value='$topico[CODIGO]'> <input type='text' name=TOPICOS[] value='$topico[DESCRICAO]'></td>";
                      foreach ($bibliografias_selecionadas as $key => $value) { //$pagina[ $topico[CODIGO]] [$value[CODIGO]]
                        $N_pagina="";
                       if (isset($pagina[ $topico['CODIGO']] [$value['CODIGO']]->PAGINAS)){$N_pagina=$pagina[ $topico['CODIGO']] [$value['CODIGO']]->PAGINAS; }
                       echo "<td>";
                       echo "<input type='text' class='txtTopicos' name='PAGINAS[".$value['CODIGO']."][]' class='paginas'  value='".$N_pagina."'  placeholder='por exemplo, 1-5, 8, 11-13' >";
                            
                       echo "</td>";
                      }
                   echo "</tr>";
                  }
                  
                ?>
              </table>
              <a class="inserir" style="display:block" href="">+Topico</a>
              
             <div style="float:left; width:99%;">
                  <span class="biblio-0" > Selecione ao menos uma Bibliografia </span>
                   <!-- Tabs / Guias -->
                   <ul class="tabs" style=" width:100%;">
                     <!--  <li class="active"><a href="#tab1" data-toggle="tab">7 dias</a></li>
                       <li><a href="#tab2" data-toggle="tab">30 dias</a></li>
                       <li><a href="#tab3" data-toggle="tab">6 meses</a></li>-->
                   </ul>
                    
                   <!-- Código do conteúdo das tabs -->
                   <div class="tab-content">
                      <!--  <div class="tab-pane active" id="tab1">Conteúdo Tab 1</div>
                       <div class="tab-pane" id="tab2">Conteúdo Tab 2</div>
                       <div class="tab-pane" id="tab3">Conteúdo Tab 3</div>-->
                   </div>
          </div>
                
                
            </div>
        </fieldset>
    <div id="top" style="display:none">Conteúdo Tab 3</div>
    
        </form>
    </div>
</div>