<p>
	Você contrata o seu domínio <b>válido por 1 ano</b>. 
	Ao final deste período, você deverá fazer a renovação caso haja interesse em mantê-los.
</p>
        
<div class="titulo_operacao borda" style="margin-bottom:10px; font-size:14px;">
    Selecione abaixo os domínios que deseja registrar
</div>

<!-- ********************************************* lista de resultado -->
<?php 
$dot = strpos($lista, '.');
$dominio = substr($lista, 0, $dot);
$extensao = substr($lista, $dot+1);
?>
<div class="lista_resultado borda5px">
    <label>
    	<?php if($this->whois->getWhois($dominio, $extensao)){
			echo '<input name="dominio" type="checkbox" value="'.$lista.'" /> '.$lista;
			echo '<input type="hidden" name="valor_dominio" value="'.$this->dominios->getPreco('.'.$extensao).'" />';
			echo '<input type="hidden" name="extensao" value="'.'.'.$extensao.'" />';
		}else{
			echo '<input type="checkbox" value="" disabled="disabled" /> '.$lista;
		}?>
    </label>
    <div class="status">
    	<?php if($this->whois->getWhois($dominio, $extensao)){
			echo '<span class="label label-success">DISPONÍVEL</span>';
		}else{
			echo '<span class="label label-important">INDISPONÍVEL</span>';
		}?>
    </div>
    <div class="preco">
    	<?php if($this->whois->getWhois($dominio, $extensao)){
			echo 'R$ '.numFormat($this->dominios->getPreco('.'.$extensao)).' /ano';
		}else{
			echo '';
		}?>
    </div>
</div>


<!--<div class="lista_resultado borda5px">
    <label>
        <input name="" type="checkbox" value="" disabled="disabled" /> codemax.com
    </label>
    
    <div class="status"><span class="label label-important">INDISPONÍVEL</span></div>
    <div class="preco" style="display:none;">R$ 15,00 /ano</div>
</div>-->


<!-- ********************************************* lista de resultado -->