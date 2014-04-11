

<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>
<script type="text/javascript">
var altura_sistema = $('#header').height() + 36 + 26 + 43 + 50;
var largura_sistema = $(document).width() - 280;

/*var refreshId = setInterval(function() {
	$("#report_area").load('relatorio.php?randval='+ Math.random());
}, 1000);*/

</script>
<script type="text/javascript">

	chart_area = new Highcharts.Chart({
		chart: {
			renderTo: 'report_area',
			defaultSeriesType: 'area'
		},
		title: {
			text: 'Despesas X Manutencao',
			align: 'left'
		},
		
		exporting: {
			enabled: false
		},
		

		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			/*x: 30,*/
			/*y: '10%',*/
			floating: true,
			borderWidth: 0,
			backgroundColor: '#FFFFFF'
		},
		xAxis: {
			categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20','21', '22', '23', '24', '25', '26', '27', '28', '29', '30']
		},
		yAxis: {
			title: {
				text: ''
			},
			labels: {
				formatter: function() {
					return this.value;
				}
			}
		},
		tooltip: {
			formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +':<b> '+ this.y +'</b>';
			}
		},
		plotOptions: {
			area: {
				fillOpacity: 0.5
			}
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Despesas',
			data: [31, 27, 24, 24, 15, 12, 23, 20, 19, 21, 24, 24, 25, 22, 23, 7, 0, 1, 4, 4, 5, 2, 3, 7, 0, 1, 4, 4, 5, 2]
		}, {
			name: 'Manutencao',
			data: [1, 0, 3, 1, 2, 2, 2, 1, 1, 0, 3, 1, 2, 2, 2, 1, 1, 12, 13, 1, 2, 2, 2, 1, 11, 20, 23, 21, 22, 22]
		}]
	});
	
	$('.layout-button-left').click(function(){
		chart_area.setSize($(document).width() - 30, 200);
		//chart_pie.setSize($(chart_area).width(), 200);
		
		
	});
	






	chart_pie = new Highcharts.Chart({
		chart: {
			renderTo: 'report_pie'
		},
		title: {
			text: 'Centro de custos',
			align: 'left'
		},
		credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			/*x: 30,*/
			/*y: '10%',*/
			floating: false,
			borderWidth: 0,
			backgroundColor: '#FFFFFF'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			type: 'pie',
			name: 'Browser share',
			data: [
				['Operacional',   45.0],
				['Comercial',       26.8],
				{
					name: 'Administrativo',    
					y: 12.8,
					sliced: true,
					selected: true
				},
				['Terceiros',    8.5],
				['Outros',     6.2]
			]
		}]
	});


$(".flexme4").flexigrid({
	url : 'post-xml.php',
	dataType : 'xml',
	colModel : [ {
		display : 'ID Transação',
		name : 'transacao',
		width : 140,
		sortable : true,
		align : 'center'
	}, {
		display : 'Tipo',
		name : 'tipo',
		width : 200,
		sortable : true,
		align : 'left'
	}, {
		display : 'Valor',
		name : 'valor',
		width : 100,
		sortable : true,
		align : 'left'
	}, {
		display : 'Data',
		name : 'data',
		width : 92,
		sortable : true,
		align : 'left'
	} ],
	/*buttons : [ {
		name : 'Add',
		bclass : 'add',
		onpress : test
	}, {
		name : 'Delete',
		bclass : 'delete',
		onpress : test
	}, {
		separator : true
	} ],*/
	searchitems : [ {
		display : 'ISO',
		name : 'iso'
	}, {
		display : 'Name',
		name : 'name',
		isdefault : true
	} ],
	sortname : "transacao",
	sortorder : "asc",
	usepager : false,
	resizable: false,
/*			title : 'Countries',*/
	useRp : false,
	rp : 10,
	showTableToggleBtn : false,
	height:213
	//height: $('body').height() - altura_sistema
	
});
	
</script>
<div style="background:#fff; display:block; overflow:auto;">

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home » <b><?=$nome_pagina?></b></p>    
</div><!-- #breadcrumb -->


<div style="display:block; padding:5px;">
<div id="tit_session"><?=$nome_pagina?></div>

<!-- #tools_sys -->
<?php $this->load->view('buttons/suporte_tickets'); ?>



<div id="valores_financeiro">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      	<td align="center" class="label_financeiro">Total Mes Anterior</td>
        <td align="center" class="label_financeiro">Despesas</td>
        <td align="center" class="label_financeiro">Manutencao</td>
        <td align="center" class="label_financeiro">Total:</td>
      </tr>
      <tr>
      	<td align="center" class="values_financeiro val_positivo">R$ 1.581,35</td>
        <td align="center" class="values_financeiro val_positivo">R$ 1.582,19</td>
        <td align="center" class="values_financeiro val_negativo">R$ 918,57</td>
        <td align="center" class="values_financeiro val_positivo">R$ 2.224,97</td>
      </tr>
    </table>
</div>

<div id="report_area" style="height:200px;"></div>

<div class="table_busca_div">

<img src="<?=site_url()?>/assets/images2/icons/search.png" class="fl_left" style="margin-top:2px;" />
    <font class="txt_busca_coluns" style="margin-left:3px; float:left; margin-top:6px;">Busca:</font>
    <input class="input_busca" name="busca" type="text" style="width:300px;" />    
    <form name="formulario" id="deleteItem" method="post" action="?action=del">

	<div class="demo" style="float:right;"> 
		<div class="btn-group2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="font-family:Arial, Helvetica, sans-serif; padding:6px; margin-right:10px; font: 12px Arial, Helvetica, sans-serif; font-weight: bold;">
            <i class="icon-wrench" style="margin:3px 3px 0 0;"></i> Opções
            <span span class="caret"></span>
          </a>
          
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-download-alt"></i> Exportar para CSV</a></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-envelope"></i> Enviar Mensagem</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" href="#" style="font-size:12px;"><i class="icon-trash"></i> Excluir</a></li>
            </ul>
            <a class="btn" href="#"><i class="icon-plus"></i> Adicionar</a>
         </div>
		
    </div>
</div><!-- ./table_busca_div -->

<!--<div id="report_pie" style=" float:right; width:35%; height:250px;"></div>-->

<div class="admin_list_table">
    <div id="users-contain" class="ui-widget"> 
	<table width="100%" id="users" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header">
                <th width="2%"><input type="checkbox" id="seleciona" onclick="selectAll();" /></th>
                <th width="5%">Data</th>
                <th width="11%">Identificação</th>
                <th width="15%">Favorecido</th>
                <th width="15%">Plano de Conta</th>
                <th width="5%">Crédito</th>
                <th width="5%">Débito</th>
                <th width="2%">Inf</th>
            </tr>
        </thead>
        <tbody>
        	
		<?php for($i = 0; $i < 20; $i++):
			if($i % 2){
				echo '<tr class="td_line_alter">';
			}else{
				echo '<tr class="td_line">';
			}
		?>
            <label for="item">
              <td><input type="checkbox" id="item" name="item[]" value="" /></td>
                <td><a href="#">00/00/0000</a></td>
                <td>#00000000000</td>
                <td>Silva e Amaral Transportes Ltda</a></td>
                <td>Serviços: Desenvolvimento</td>
                <td>22.690,00</a></td>
                <td>(460,00)</td>
                <td><img src="<?=site_url()?>/assets/images/icons/info.gif" /></td>
            </label>
          </tr>
        <?php endfor; ?>
               
          
         
        </tbody>
    </table>

    </div>
</div>

</div>