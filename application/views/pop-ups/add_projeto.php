<script type="text/javascript">
    $(document).ready(function() {

        //$('#').jqTransform({imgPath:'<?= site_url() ?>/assets/css/jqTransform/'});
        $('.easyui-tabs').tabs();
        $('.easyui-combobox').combobox();
        //$('.easyui-combotree').
        $('.easyui-numberspinner').numberspinner();

        $('.is_required').validatebox({
            required: true,
            //validType: 'url',
            missingMessage: 'Esse campo é obrigatório!'
        });



        $(".formatDATE").mask("99/99/9999");
        $(".formatCPF").mask("999.999.999-99");
        $(".formatCNPJ").mask("99.999.999/9999-99");
        $(".formatCEP").mask("99.999-999");
        $(".formatTEL").mask("(99) 9999-9999");
        $(".formatMONEY").maskMoney({showSymbol: false, symbol: "R$", decimal: ".", thousands: ",", allowZero: true});
        
//        $(".catDisciplina").click(function(){
//            var codigo=$(this).val();
//            $("#divDisciplinas").load("<?= base_url()?>admin/configuracoes/getDisciplinabyCat/"+codigo);
//        });
           
    });




</script>

<div class="easyui-tabs" fit="true" border="false" id="tt">
    <ul>
        <li><a href="#tabs-1">Projeto</a></li>
        <!--        <li><a href="#tabs-2">Categoria</a></li>-->
    </ul>
    <form id="addProjeto" name="form_add" method="post" action="">
        <div id="tabs-1" style="height:550px; overflow:hidden;"> 

            <fieldset>
                <div class="line">


                    <label>Projeto
                        <br />
                        <input name="NOME" type="text" class="textfield-text is_required" required="required" style="width:175px;" />
                    </label>

                    <label>Categoria
                        <br />
                        <select id="selectCategoria" name="CATEGORIA" class="easyui-combobox" panelHeight="auto" style="width:190px;">
                            <option value="">Escolha uma categoria</option>
                            <?php foreach ($categorias as $cat) { ?>
                                <option value="<?= $cat->CODIGO ?>"><?= $cat->DESCRICAO ?></option>
                            <?php } ?>


                        </select>
                    </label>


                    <br class="clear">    
                    <label>Descrição do Projeto
                        <br />
                        <textarea name="DESCRICAO" class="is_required" style="width: 645px;height: 60px;"></textarea>

                    </label>
                </div>
            </fieldset>

            
         

        </div><!-- /Inicio-->




</div><!-- /Inicio-->
</form>
</div><!-- /.easyui-tabs -->