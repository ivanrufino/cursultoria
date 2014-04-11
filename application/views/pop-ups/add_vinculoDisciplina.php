<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/jquery/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/1.2.15/bootstrap/css/bootstrap.css">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/locaweb-style/img/locastyle.css">
<link rel="stylesheet" type="text/css" href="/locawebstyle/v1/assets/legacy/stylesheets/manual.css">-->
<style>
    th,th:hover{background-size: auto 100% ;white-space: nowrap;padding: 10px}
    .trTopicos td{width: 135px !important;text-align: center;}
    #Tabletopicos{width: auto; max-width:none;}
    .chosen-container{width: auto !important;min-width: 264px}
    .morePage{cursor: pointer;}

</style>
<script type="text/javascript">
    $(function() {
        atualizar();
        //$('#').jqTransform({imgPath:'<?= site_url() ?>/assets/css/jqTransform/'});
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




        var quantidadeTotal = $("#disciplina option").length

        $("#disciplina").change(function() {
            atualizar();
        });
        $('.multiselect').multiselect({
            includeSelectAllOption: true,
            maxHeight: 250,
            buttonWidth: '500px',
        });



    });
function atualizar(){
    var quantidade = $("#disciplina option:selected").length;
            var ids = "";
            $("#disciplina option:selected").each(function() {
                ids += $(this).val() + "-";
            });
            var codProj=$("#cod_projeto").val();
            if (quantidade != 0) {
                $("#Tabletopicos").load("<?= site_url() ?>/admin/json/buscarTopico/" + ids+'/'+codProj);
            } else {
                $("#Tabletopicos").html("Nenhuma disciplina Selecionada")
            }
            $("#quantidade").val(quantidade);
}

</script>
<style>
    .chosen-results{max-height: 180px;} 
    //  .dropdown-menu .active > a{  background: red !important;color:blue !important;}
    .dropdown-menu .active > a,.dropdown-menu li > a:hover{height: 22px; }
    .dropdown-menu .active > a >label,.dropdown-menu li > a >label:hover{color: #fff !important}

</style>
<div id="detalheDominio" style="overflow:hidden;">
    <form id="form_addLivro" name="form_add" method="post" action="" enctype="multipart/form-data">

        <fieldset>
            <div class="line">
                <input name="cod_projeto" id="cod_projeto" type="hidden" class="textfield-text is_required" readonly=""  required="required" value="<?= $projeto->CODIGO ?>"  />
                <input name="quantidade" type="hidden" id="quantidade" class="textfield-text is_required" readonly=""  required="required" value="0"  />
                <label style=" float:left; width:270px;">
                    Projeto
                    <br />
                    <input name="Projeto" type="text" class=" disabled" required="required" readonly="" value="<?= $projeto->NOME ?>" style="width:250px;">
                </label>
            </div>
            <?php
//            if ($disciplinasVinculadas==null){
//                echo "Nenhuma disciplina vinculada";
//            }else{
//                echo "encontrada disciplina vinculada";
//                
//                
//            }
            ?>
            <div class="line">
                <label >
                    Disciplina
                    <br />
                    <div class="btn-group">
                        <select id="disciplina" name="DISCIPLINAS[]" class="multiselect" multiple="multiple" title="Nenhum Selecionado">
                            <?php
                            foreach ($disciplinas as $key => $disciplina):
                                $selected = "";

                                foreach ($disciplinasVinculadas as $key => $disciplinasVinculada):
                                    if ($disciplina->CODIGO == $disciplinasVinculada['COD_DISCIPLINA']) {
                                        $selected = "selected";
                                    }
                                endforeach;
                                ?>

                                <option value="<?= $disciplina->CODIGO ?>" <?= $selected ?> > <?= $disciplina->DESCRICAO ?> </option>
<?php endforeach; ?>
                        </select>
                        <!--                                                    <button id="example21-toggle" class="btn btn-primary">Marcar Todos</button>-->
                        <!--								<button id="example34-select" class="btn btn-primary">Select</button>
                                                                                        <button id="example34-deselect" class="btn btn-primary">Deselect</button>
                                                                                        <button id="example34-values" class="btn btn-primary">Values</button>-->
                    </div>

                </label>



            </div>
        </fieldset>

        <fieldset>
            <!--<legend><a class="selectTopico" href="">Selecionar tópicos</a></legend>-->
            <div class="line" style="overflow: auto;width: auto;">
                <div id="Tabletopicos" style="overflow: hidden;">

                </div>

                <div style="float:left; width:99%;">
                    <span class="biblio-0" > Selecione ao menos uma Disciplina </span>
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