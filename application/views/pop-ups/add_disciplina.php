 <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/jquery/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/1.2.15/bootstrap/css/bootstrap.css">
 <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/locaweb-style/img/locastyle.css">
<link rel="stylesheet" type="text/css" href="/locawebstyle/v1/assets/legacy/stylesheets/manual.css">-->
<style>
th,th:hover{background-size: auto 100% ;white-space: nowrap;padding: 10px}
.trTopicos td{width: 135px !important;text-align: center;}
#Tabletopicos{width: auto; max-width:none;}
.chosen-container{width: auto !important;min-width: 264px}
.morePage{cursor: pointer;}

</style>
<script type="text/javascript">
$(function(){
	//$('#').jqTransform({imgPath:'<?=site_url()?>/assets/css/jqTransform/'});
	$('.easyui-tabs').tabs();
	$('.easyui-combobox').combobox();
	$('.easyui-numberspinner').numberspinner();
	
	$('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
	$('.ch-single').chosen({disable_search: true});
	
	$('#bt_ver_mes').linkbutton({  
		iconCls: 'icon-search'  
	});
	
  $('#tabs a').click(function(e) {
   $(this).tab('show');
   e.preventDefault();
}); 



function adcionarPagina(td){
  var id="5";
  tdPag='<input type="text" name="PAGINA_INCIO['+id+'][]" placeholder="1" style="width: 50px;"><input type="text" name="PAGINA_FIM['+id+'][]" placeholder="1"  style="width: 50px;"> ';
  
  $(td).append(tdPag);
}
function copiarLinha(table){
  var clone =$(table+" tr:last").clone();
  clone.find('input').val('');
  clone.appendTo($(table));
  
}
$(".morePage").on('click',function(){
  var td=$(this).parent();
 // alert(td);
  adcionarPagina(td);
});
$(".inserir ").on('click',function(e){
  e.preventDefault();
  e.stopPropagation();
    copiarLinha("#Tabletopicos");
 return false;
})

$(".addTopico").click(function(){
  var quantidade= $("#biblio option:selected").length ;
  if (quantidade ==0){
  $(".biblio-0").show();
}else{
  $('.inserir').show();
  var table="";
  var tdPag="";
  
  //$(".topicos").append('');
  table+='<tr><th>Tópicos</th>';
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
  $("#Tabletopicos").html(table);
}
  return false;
})

});


</script>

<div id="detalheDominio" style="overflow:hidden;">
	<form id="form_addLivro" name="form_add" method="post" action="" enctype="multipart/form-data">
    	
        <fieldset>
            <div class="line">
                
                <label style=" float:left; width:270px;">
                    Descrição
                    <br />
                     <input name="DESCRICAO" type="text" class="textfield-text" required="required" style="width:250px;">
                </label>
               </div>
                  <div class="line">
                <label >
                     Bibliografia
                     <br />
                       <select name="BIBLIOGRAFIAS[]" id="biblio" data-placeholder="Selecione as bibliografias..." required="required"  size="4" multiple="multiple" class="ch-select" style="min-width:600px !important;">
                         <option value="0"></option>
                         <?php foreach($bibliografias as $key =>$bibliografia): ?>
                             <option value="<?=$bibliografia->CODIGO?>"> <?=$bibliografia->DESCRICAO.' - '.$bibliografia->NOME_EDITORA?></option>
                             <?php endforeach;?>
                       </select>
                 </label>
                

                
            </div>
        </fieldset>
        
        <fieldset><legend><a class="addTopico" href="">Criar tópicos</a></legend>
            <div class="line" style="overflow: auto;width: auto;">
              <table id="Tabletopicos">
              
              </table>
              <a class="inserir" style="display:none" href="">+Topico</a>
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
                
                <p class="msg alert " style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">
                    Atenção: </b> Lembre-se todos os campos são obrigatórios.</p>
            </div>
        </fieldset>
    <div id="top" style="display:none">Conteúdo Tab 3</div>
    
        </form>
    </div>
</div>