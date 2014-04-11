

<div id="buscaMes" style="float:left; width:100%; overflow:auto; height:200px;">
    <table width="100%" id="painel" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0">
              <tr class="tr_sim">
                <th class="extrato" width="15%"><b>01/04/2012</b></th>
                <th width="65%"><b>Saldo Anterior</b></th>
                <th width="2%"></th>
                <th class="final"><b>R$ 0.000,00</b></th>
              </tr>
              <?php 
			  	foreach($financeiro as $key =>$bill):
					if($key % 2){
						echo '<tr class="tr_sim">';
					}else{
						echo '<tr>';
					}
			  ?>
                <td class="extrato"><?=dateFormat($bill->DATA, "d/m/Y")?></td>
                <td><?=$bill->DESCRICAO?></td>
                <td align="center"><?=($bill->TIPO == "debito")? " - " : " + ";?></td>
                <td class="final <?=($bill->TIPO == "debito")? "vermelho" : "verde";?>">R$ <?=($bill->TIPO == "debito") ? numFormat($bill->VAL_SAIDA) : numFormat($bill->VAL_ENTRADA)?></td>
              </tr>
              <?php endforeach;?>
              <tr>
                <td class="extrato">30/04/2012</td>
                <td><b>Saldo do mês de Abril</b></td>
                <td><b>  </b></td>
                <td class="final"><b>R$ 0.000,00</b></td>
              </tr>
              
            </table>

</div>
<?php //endforeach;?>