<script type="text/javascript">
	$('.easyui-combobox').combobox();
</script>

<div class="line" style="border-top:1px dotted #ccc; margin-top:15px; float:left; width:665px;">
    <div style="float:left; width:325px; border-right:1px dotted #ccc;">
        <label>Espaço em disco (MB)
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px; margin-right:10px;">
                <input name="HOST_DISCO" type="text" value="" class="textfield-text" style="width:45px;" />
                <input name="HOST_DISCO_ILIMITADO" type="checkbox" value="sim" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <label>Tráfego mensal (MB)
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px;">
                <input name="HOST_TRAFEGO" type="text" class="textfield-text" style="width:45px;" />
                <input name="HOST_TRAFEGO_ILIMITADO" type="checkbox" value="1" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <label>Caixas postais
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px; margin-right:10px;">
                <input name="HOST_EMAILS" type="text" class="textfield-text" style="width:45px;" />
                <input name="HOST_EMAILS_ILIMITADO" type="checkbox" value="sim" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <label>Bancos de Dados
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px;">
                <input name="HOST_BANCO" type="text" class="textfield-text" style="width:45px;" />
                <input name="HOST_BANCO_ILIMITADO" type="checkbox" value="sim" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <label>Domínios adicionais
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px; margin-right:10px;">
                <input name="HOST_DOMINIOS" type="text" class="textfield-text" style="width:45px;" /> 
                <input name="HOST_DOMINIOS_ILIMITADO" type="checkbox" value="sim" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <label>Mapeamentos adicionais
        
            <div style="background:#e8e8e8; padding:2px 5px 2px 2px;">
                <input name="HOST_APONTAMENTOS" type="text" class="textfield-text" style="width:45px;" /> 
                <input name="HOST_APONTAMENTOS_ILIMITADO" type="checkbox" value="sim" style="float:right; margin-top:7px; margin-left:5px;" /> &nbsp;&nbsp;ilimitado
            </div>
        </label>
        
        <p style=" float:left; font-size:11px; line-height:16px; color:#666; margin-top:5px;"><b style="margin-right:5px;">Atenção: </b> Lembre-se que ao editar as configurações de um plano caso ele já esteja vinculado à um servidor, as mesmas serão atualizadas também no WHM.</p>
    </div>
    
    <div style="float:right; overflow:auto; width:325px;">
        <label style=" float:right; text-align:right; width:100%;">
            Permitir consumo de disco excedente:
            <input name="PERM_DISCO_LIMIT" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            Permitir consumo de tráfego excedente:
            <input name="PERM_TRAFEGO_LIMIT" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            IP Dedicado
            <input name="IP_DEDICADO" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            Acesso Shell
            <input name="SHELL" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            Acesso CGI
            <input name="CGI" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            Extensões do FrontPage
            <input name="FRONTPAGE" type="checkbox" value="1" style="float:right; margin-left:5px;" />
        </label>
        
        <label style=" float:right; text-align:right; width:100%;">
            Tema cPanel
            <select name="TEMA_PAINEL" class="easyui-combobox" panelHeight="auto" style="width:60px; float:right; margin-left:5px;">
                <option value=""></option>
                    <option value="x">x</option>
                    <option value="x2">x2</option>
                    <option value="x3" selected="selected">x3</option>     
                    <option value="x3mail">x3mail</option>
                    <option value="xmail">xmail</option>
                </select>
        </label>
        
    </div>
</div>
<!-- fim divConfig_cpanel -->