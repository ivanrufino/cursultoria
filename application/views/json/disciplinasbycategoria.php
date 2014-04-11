<?php
if (is_null($disciplinas)) {
    echo "<br><div class='alert alert-info' >Sem disciplinas nesta categoria</div>";
} else {
    ?>
    <div id="users-contain" class="ui-widget" >
        <table width="100%" id="tableDisciplinas" class="ui-widget ui-widget-content dataTable display">
            <thead>
                <tr class="ui-widget-header">
                    <th width="1%"></th>
                    <th width="80%">Descrição</th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($disciplinas as $key => $disciplina){
                    if ($key % 2) {?>
                        <tr class="td_line_alter">
                    <?php } else { ?>
                        <tr class="td_line">
                    <?php }
                    if ($todos){$codigo='item_'.$key;}else{$codigo='cod_'.$disciplina->CODIGO;}
                    
                    ?>
                <td><input type='checkbox' id='<?= $codigo ?>' name='disciplinas[]'  value='<?= $disciplina->CODIGO ?>' /></td>

                <td>
                    <b><label for="<?=$codigo ?>"> <?= $disciplina->DESCRICAO ?></label>
                        </a></b>
                </td>

                </tr>
    <?php } ?>


            </tbody>

        </table>
    </div>

<?php }?>