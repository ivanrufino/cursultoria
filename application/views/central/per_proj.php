<?php /* tela de escolha de projetos com disciplinas e conteudos personalizados  */ ?>
<form action="<?php base_url()?>projetos/gravarTopicosUsuario" method="POST">
    <input type="hidden" name="cod_projeto" value="<?=$projeto->CODIGO?>" readonly="">
<div class="collapseGroup" style="padding:0;margin:0">
    <?php
    if (!is_null($disciplinas)) {
        
        foreach ($disciplinas as $key => $disciplina) {
            $nome=$disciplina['DESCRICAO'];
            $cod_Disciplina=$disciplina['CODIGO'];
            ?>
            <div class="boxCollapse" style="padding:0;margin:0">
                <div class="collapseGroup" style="padding:0;margin:0">
                <header data-target="#<?php echo $disciplina['CODIGO']?>" data-toggle="collapse" class="collapsed" > 
                    

            <a href="#<?php echo $disciplina['CODIGO']?>" role="button" aria-haspopup="true" aria-controls="#d1" aria-label="<?=$nome?>" title="<?=$nome?>" class="lnkCollapse" tabindex="3"></a>
            <h3><?=$nome?> </h3>
        </header>
        
        <div class="boxGray collapse " id= "<?php echo $disciplina['CODIGO']?>" role="region"  aria-hidden="false" aria-expanded="true" style="height: 0px;padding:0;">
            

            <div class="shortcutBox expandBox microbox ">
                <?php 
                           
                    
                    foreach ($detalhebibliografia[$disciplina['CODIGO']] as $key => $biblio) { ?>
                        <div>
                            
                            <label for="<?php echo "b_".$biblio->CODIGO."_d_".$disciplina['CODIGO'] ?>" class="lnkBlb">
                                <input type="radio" checked name="<?php echo "COD_".$cod_Disciplina ?>" value ='<?php echo "b_".$biblio->CODIGO."_d_".$disciplina['CODIGO'] ?>' id='<?php echo "b_".$biblio->CODIGO."_d_".$disciplina['CODIGO'] ?>' style='display:none'>
                            <!--<a href="#" class="lnkBlb" tabindex="3" title="<?=$biblio->DESCRICAO?>">-->
                                <h4><span class="shortcutTitle"><?=$biblio->DESCRICAO?></span> </h4>
                                <p><img src="<?php echo base_url().'uploads/livros/'.$biblio->FOTO ?>" style="width:180px"><br>
                                    <?=$biblio->NOME_EDITORA?> <?=$biblio->EDICAO?>, <?=$biblio->ANO?></p>
                            <!--</a>-->
                                </label>
                        </div>
                
                            <?php }
                ?>
            
                <br class="clear">
                <a href="#" class="btn btn-primary ico-attach fLeft" style="margin-right:10px">Adcionar Video</a>

                <a href="#" class="btn btn-primary ico-attach fLeft">Adcionar PDF</a>
            </div>
            <br>
            <a href="#"  aria-label="Excluir Disciplina" class="ico-trash btn_delete" id="modalDestroy" tabindex="3" title="Excluir Disciplina">Excluir Disciplina</a>
            <a href="#" class="lnkArrow fLeft minShortcuts" data-text="Ver Detalhes">Mostrar Detalhes</a>

        </div>
    </div>
                </div>
<!--            echo $disciplina['DESCRICAO'];-->
        <?php }
    } else {
        echo "Este projeto não tem disciplinas vinculadas";
    }
    ?> 
</div><!--fim collapseGroup-->

<!-- FIM DE BOX-->
<br class="clear">
<input type='submit' class="btn btn-primary ico-ok-circle fRight" value="Ativar Projeto">
<!--<a href="#" class="btn btn-primary ico-ok-circle fRight">Ativar Projeto</a>-->
<a href="#" class="btn btn-primary ico-left-open-1 fRight" style="margin-right:10px">Voltar</a>
<br class="clear">
</form>
