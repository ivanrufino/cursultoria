<script type="application/javascript">
	$("a[rel='fecharModal']").click(function(){
		$('.modal').modal('hide');
	});
	
</script>
<div class="modal-header" style="background-color:#<?php echo$cor_default?>">
    <a type="button" class=" close" rel="fecharModal" data-dismiss="modal" aria-hidden="true">×</a>
    <h3 id="myModalLabel"><b>Alterar plano</b></h3>
</div>

<div class="modal-body">
	<p>Escolha o novo plano que desejar. Para planos com valor superior ao atual, cobraremos o valor proporcional (pro rata).</p>
	
    <?php foreach($produtos as $plano):
		  $modulo = $this->produtos->getModulosById($plano->COD_SERVIDOR, $plano->CODIGO);
	?>
    
    <div class="novoPlano">
    	<div class="label"><input type="radio" name="NOVO_PLANO" value="<?=$plano->CODIGO?>" /></div>
    	<div class="nome_plano">
        	<b><?=$plano->DESCRICAO?></b>
            
            <b class="preco">R$ <?=numFormat($plano->PRECO_MENSAL)?> /mês</b>
        </div>
        
        <div class="desc_plano" style="width:90px;">
        	<p>Disco</p>
            <b><?=($modulo->HOST_DISCO != 99999999999)? convertSize('GB', $modulo->HOST_DISCO) : "Ilimitado"?></b>
        </div>
        <div class="desc_plano" style="width:90px;">
        	<p>Tráfego</p>
            <b><?=($modulo->HOST_TRAFEGO != 99999999999)? convertSize('GB', $modulo->HOST_DISCO) : "Ilimitado"?></b>
        </div>
        <div class="desc_plano" style="width:90px;">
        	<p>E-mails</p>
            <b><?=($modulo->HOST_EMAILS != 999)? $modulo->HOST_EMAILS : "Ilimitado"?></b>
        </div>
    </div>
    
    <?php endforeach;?>

    
<!--    <div class="novoPlano">
    	<div class="label"><input type="radio" /></div>
    	<div class="nome_plano">
        	<b>RevendaMega</b>
            <b class="preco">R$ 19,90 /mês</b>
        </div>
        
        <div class="desc_plano" style="width:70px;">
        	<p>Domínios</p>
            <b>250</b>
        </div>
        <div class="desc_plano" style="width:100px;">
        	<p>Disco</p>
            <b>Ilimitado</b>
        </div>
        <div class="desc_plano" style="width:90px;">
        	<p>Tráfego</p>
            <b>Ilimitado</b>
        </div>
        
    </div>
    
    <div class="novoPlano">
    	<div class="label"><input type="radio" /></div>
    	<div class="nome_plano">
        	<b>Rádio Profissinoal</b>
            <b class="preco">R$ 19,90 /mês</b>
        </div>
        
        <div class="desc_plano" style="width:70px;">
        	<p>Ouvintes</p>
            <b>2000</b>
        </div>
        <div class="desc_plano" style="width:100px;">
        	<p>Bitrade</p>
            <b>64Kbps</b>
        </div>
        <div class="desc_plano" style="width:90px;">
        	<p>Tráfego</p>
            <b>Ilimitado</b>
        </div>
        
    </div>
    
    <div class="novoPlano">
    	<div class="label"><input type="radio" /></div>
    	<div class="nome_plano">
        	<b>SetorNitro</b>
            <b class="preco">R$ 19,90 /mês</b>
        </div>
        
        <div class="desc_plano" style="width:70px;">
        	<p>Disco</p>
            <b>20GB</b>
        </div>
        <div class="desc_plano" style="width:100px;">
        	<p>Tráfego</p>
            <b>Ilimitado</b>
        </div>
        <div class="desc_plano" style="width:90px;">
        	<p>E-mails</p>
            <b>20</b>
        </div>
    </div>-->
    
    
    <!--<p style="h4">Valor referente ao período de hoje até a próxima fatura: <b>R$ 20,52</b></p>-->

</div>
<!-- Content --->

<div class="modal-footer">
    <a rel="fecharModal" class="btn btn-danger">Cancelar</a>
    <button class="fechar_trocarPlano btn btn-success">Contratar</button>
    
</div>
<!-- Footer --->