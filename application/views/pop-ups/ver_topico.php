<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/jquery/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/1.2.15/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/locaweb-style/img/locastyle.css">
<!--<link rel="stylesheet" type="text/css" href="/locawebstyle/v1/assets/legacy/stylesheets/manual.css">-->
<style>
    th,th:hover{background-size: auto 100% ;white-space: nowrap;padding: 10px}
    .trTopicos td{width: 135px !important;text-align: center;}
    #Tabletopicos2{width: auto; max-width:none;}
    .chosen-container{width: auto !important;min-width: 264px}
    .morePage{cursor: pointer;}

</style>

<?php $this->load->view("json/projetos"); ?>
<script type="text/javascript">
    $(function(){

    $('.easyui-tabs').tabs();
            $('.easyui-combobox').combobox();
            $('.easyui-numberspinner').numberspinner();
            $('.ch-select').chosen({no_results_text: 'Nenhum registro para'});
            $('.ch-single').chosen({disable_search: true});


</script>

<div id="detalheDominio" style="overflow:hidden;">
    <form id="form_editTopico" name="form_edit" method="post" action="" enctype="multipart/form-data">

        <fieldset>
            <div class="line">
                <input name="CODIGO" type="hidden" class="" value="<?= $topicos['CODIGO']; ?>" required="required" >
                <label style=" float:left; width:270px;">
                    Descrição
                    <br />
                    <input name="DESCRICAO" type="text" class="" value="<?= $topicos['DESCRICAO']; ?>" required="required" style="width:422px">
                </label>
            </div>


        </fieldset>
        <fieldset style="width:470px; height:260px;overflow: auto;">
            <table>
                <tr><th>Bibliografia</th><th>Páginas</th></tr>
                <?php foreach ($detalheTopico as $key => $detalhe) { ?>
                    <tr>
                        <td>
                            <input type="hidden" name="cod_detalhe[]" value="<?php echo $detalhe['CODIGO']?>" readonly="">
                            <input type="text" name="nome_bibliografia" value="<?php echo $detalhe['DESCRICAO']?>" readonly="">
                        </td>
                        <td>
                        <input type="text" name="pagina[]" value="<?=$detalhe['PAGINAS']?>" > </td>

                    </tr>
                <?php } ?>

            </table>        
        </fieldset>
        <p class="msg alert " style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">
                Atenção: </b> Lembre-se todos os campos são obrigatórios.</p><br>

        <div id="top" style="display:none">Conteúdo Tab 3</div>

    </form>
</div>
</div>