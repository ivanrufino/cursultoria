<?php $this->load->view("json/frontend");?>
<table class="table table-striped">
    <div id="ver_mes">
    <form id="extrato_mes" method="post">
        <select name="MES_EXTRATO" style=" margin-bottom:0px; font:14px Open Sans; width:100px;">
            <?php foreach($por_data as $by_data):?>
                <option value="<?=dateFormat($by_data->DATA, "Y-m");?>">
                    <?=dateFormat($by_data->DATA, "m/Y");?>
                </option>
                
            <?php endforeach; ?>
            
        </select>
        <input type="hidden" name="CLIENTE" value="<?=$this->session->userdata('clienteLogado')?>" />
        <button type="button" class="btn btClienteExtrato" style="font:12px Arial; font-weight:bold; padding:6px;">Ver mês</button>
    </form>
        
    </div>
    
        <tbody>
            <thead>
                <tr>
                  <th width="10%">01/11/2012</th>
                  <th width="73%">Saldo Anterior</th>
                  <th width="3%">&nbsp;</th>
                  <th style="text-align:right;" width="17%">R$ 0,00</th>
                </tr>
            </thead>
            <?php if($financeiro != NULL):?>
            <?php foreach($financeiro as $bill):?>
            <tr>
              <td><?=dateFormat($bill->DATA, "d/m/Y");?></td>
              <td>
                    <span class="tip" title="<?=$bill->PERIODO?>">
                        <?=$bill->DESCRICAO?>
                    </span></td>
              <td><?=($bill->TIPO == "credito")? "+" : "-"?></td>
              <td style="text-align:right;">R$ <?=numFormat($bill->VALOR)?></td>
            </tr>
            <?php endforeach;?>
            
            <tr>
              <td><b>28/02/2013</b></td>
              <td><b>Saldo do mês</b></td>
              <td><b>
              <?php
                $total = 0;
                foreach($financeiro as $bill){
                    if($bill->TIPO == "credito"){
                        $total += $bill->VALOR;
                    }else{
                        $total -= $bill->VALOR;
                    }
                }

              ?>
              </b></td>
              <td style="text-align:right;"><b>R$ <?=numFormat($total)?></b></td>
            </tr>
            <?php endif;?>
        </tbody>
    
</table>