<div id="mainframe" style="padding:10px; overflow:auto;"><!-- wrap -->
	<div id="tit_ticket_status">
    	<div id="tit_ticket">
        	<?=$ticket->TITULO?>
		</div>
        <div id="ticket_status">

			<?php 
                switch($ticket->STATUS){
                    case 1 	: echo "<span class='label label-success'>ABERTO</span>"; break;
                    case 2 	: echo "<span class='label label-info'>ENVIADO</span>"; break;
                    case 3 : echo "<span class='label label-warning'>RESPONDIDO</span>"; break;
					case 4 	: echo "<span class='label label-important'>FECHADO</span>"; break;
                    case 5 : echo "<span class='label label-inverse'>RESOLVIDO</span>"; break;
                }
            ?>
            
        </div>
	</div><!-- /tit_ticket_status -->
    <div id="numero_ticket">
       <li style="padding-left:0px;"><i class="icon-tag espaco-icon"></i><b>Ticket </b> #<?=$ticket->CODIGO?></li>
       <li><b>Criado em:</b> <?=dateFormat($ticket->DATA, "d/m/Y H:i")?></li>
       <li style="border:none;"><b>Domínio</b> : <?=$ticket->DOMINIO?></li>
    </div><!-- /numero_ticket -->
    <p>
    	Histórico do ticket <span class="btn-link"> (mostrar todas as interações)</span>
    </p>
	<?php foreach($ticket_mesagens as $mensagem): $operador = $this->users->getUsuarioById($mensagem->RESPONSAVEL);?>   
    
    <div class="ticket_pergunta_resposta borda5px well" style="margin-bottom:15px; margin-top:15px; <?=($mensagem->TIPO == "cliente")? "" : "background-color:#e2e2e2;";?>">
		<div class="ticket_nome_data" style="border-bottom: dotted 1px #fff;">
        	<div class="ticket_nome" style="<?=($mensagem->TIPO == "cliente")? "" : "color:#c00;";?>">
            	<?=($mensagem->TIPO == "cliente")? $cadastro->RAZAO_NOME." (Você)" : $operador->NOME." (Operador)";?>
            </div> 
            <div class="ticket_data alert-error borda5px">
            	<?=dateFormat($ticket->DATA, "d/m/Y - H:i")?>
            </div>
		</div>
        <div class="ticket_area_texto">
        	<?=nl2br($mensagem->MENSAGEM)?>
        </div>
        
	</div>
    
    <?php endforeach; ?>
    <div id="ticket_resposta">
    	<b>Nova resposta</b>
    	<form id="submit_respostaTicket" method="post">
        	<input type="hidden" name="RESPONSAVEL" value="<?=$cadastro->CODIGO?>" />
            <input type="hidden" name="TICKET" value="<?=$ticket->CODIGO?>" />
            <textarea none id="ticket_resposta_textarea" name="MENSAGEM"></textarea><br/>
            <button type="button" id="btSubmitRespostaTicket" class="btn btn-mini btn-inverse">Responder</button>
            <input type="checkbox" id="check_resolvido" name="RESOLVIDO" value="sim" /> 
        
        	<font id="texto_checkbox">Esse problema foi resolvido!</font>
        </form>
    </div>
     

</div>