		
			/* Define two custom functions (asc and desc) for string sorting */
			jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
				return ((x < y) ? -1 : ((x > y) ?  1 : 0));
			};
			
			jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
				return ((x < y) ?  1 : ((x > y) ? -1 : 0));
			};
			
			$(document).ready(function() {
				/* Build the DataTable with third column using our custom sort functions */
				$('#example').dataTable( {
					"aaSorting": [ [1,'asc'], [2,'asc'] ],
					"aoColumnDefs": [
						{ "sType": 'string-case', "aTargets": [ 2 ] }
					]
				} );


				$("#todos").click(function(){
					
					 if ($("#todos").attr("checked")){
				      $('.marcar').each(
				         function(){
				            $(this).attr("checked", true);
				         }
				      );
				   }else{
				      $('.marcar').each(
				         function(){
				            $(this).attr("checked", false);
				         }
				      );
				   }
				})
				


			} );
		//funcões para abrir forms
		$(document).ready(function(){
			$("#cadastro_noticia").click(function(){
				window.location.href="noticias/abrirform"
			})
		})