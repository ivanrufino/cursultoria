

<?php $this->load->view('json/clientes');?>

<script type="text/javascript">

	/*chart_area = new Highcharts.Chart({
		chart: {
			renderTo: 'report_area',
			defaultSeriesType: 'area'
		},
		title: {
			text: 'Fluxo de Caixa		',
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
		/*	floating: true,
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
	*/
	$('.layout-button-left').click(function(){
		chart_area.setSize($(document).width() - 30, 200);
		//chart_pie.setSize($(chart_area).width(), 200);
		
		
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
	height:213,
	//height: $('body').height() - altura_sistema
	
});

/* ########### Jquery Knob ############## */

$(".knob").knob({
	/*change : function (value) {
		//console.log("change : " + value);
	},
	release : function (value) {
		console.log("release : " + value);
	},
	cancel : function () {
		console.log("cancel : " + this.value);
	},*/
	draw : function () {
	
		// "tron" case
		if(this.$.data('skin') == 'tron') {

			var a = this.angle(this.cv)  // Angle
				, sa = this.startAngle          // Previous start angle
				, sat = this.startAngle         // Start angle
				, ea                            // Previous end angle
				, eat = sat + a                 // End angle
				, r = 1;
	
			this.g.lineWidth = this.lineWidth;
	
			this.o.cursor
				&& (sat = eat - 0.3)
				&& (eat = eat + 0.3);
	
			if (this.o.displayPrevious) {
				ea = this.startAngle + this.angle(this.v);
				this.o.cursor
					&& (sa = ea - 0.3)
					&& (ea = ea + 0.3);
				this.g.beginPath();
				this.g.strokeStyle = this.pColor;
				this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
				this.g.stroke();
			}
	
			this.g.beginPath();
			this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
			this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
			this.g.stroke();
	
			this.g.lineWidth = 2;
			this.g.beginPath();
			this.g.strokeStyle = this.o.fgColor;
			this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
			this.g.stroke();
	
			return false;
		}
	}
});
	
</script>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home</b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
	<div id="tit_session"><?=$nome_pagina?></div>
	
    <!--div id="atalhosDashboard" class="row-fluid">
        <div class="span2"><img src="<?=site_url()?>/assets/img/icons/64x64/ticket.png" /></div>
        <div class="span2"><img scr="<?=site_url()?>assets/img/icons/128x128/task.png" style="width:128px; height:128px" /></div>
        <div class="span2"><img scr="<?=site_url()?>assets/img/icons/128x128/task.png" style="width:128px; height:128px" /></div>
        <div class="span2"><img scr="<?=site_url()?>assets/img/icons/128x128/task.png" style="width:128px; height:128px" /></div>
    </div-->    

		
        
	
</div>
<!-- pop-up de operações -->
