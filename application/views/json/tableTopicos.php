<style>
    .ltopicos{max-height: 400px;overflow: auto}
    .ltopicos li,inativo{list-style:none;border:1px solid grey;padding: 4px; color:grey}   
    .ativo{color:#000 !important;background:grey}
</style>
<script>

        $('.topicos').click(function() {
            if($(this).is(':checked')){
                $(this).parent().removeClass('inativo').addClass('ativo');
            }else{
                $(this).parent().removeClass('ativo').addClass('inativo')
            }
            
        });
        
  function checar(){
      $('.topicos').each(function() {
            if($(this).is(':checked')){
                $(this).parent().removeClass('inativo').addClass('ativo');
            }else{
                $(this).parent().removeClass('ativo').addClass('inativo')
            }
            
        });
  }  
  checar();
</script>

<div class="ltopicos accordion" id="accordion2">

    <?php
    $col = 1;
    foreach ($topicos as $disciplinas => $topicos) {
        ?>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?= $col ?>">
                    <?= $disciplinas ?>
                </a>
            </div>
            <div id="collapse_<?= $col ?>" class="accordion-body collapse" style="height: 0px;">
                <div class="accordion-inner">
                    <?php
                    echo "<ul>";
                    foreach ($topicos as $key => $topico) { ?>
                    <?php $checked = "";
                            if (!is_null($topicosVinculados)){
                                foreach ($topicosVinculados as $key => $topicoVinculado):
                                    if ($topico['CODIGO'] == $topicoVinculado['COD_TOPICO']) {
                                        $checked = "checked";
                                    }
                                endforeach; 
                            }?>
                        <label  for='t_<?=$topico['CODIGO']?>'> <li> <input type='checkbox' class='topicos'  name=TOPICOS[] id='t_<?=$topico['CODIGO']?>' value= '<?=$topico['CODIGO']?>' <?= $checked; ?> ><?=$topico['DESCRICAO']?></li></label>
                 <?php    }
                   
                  echo "</ul>";
                    ?>
                </div>
            </div>
        </div>
        <?php

        $col++;
    }
    ?>
</div>

