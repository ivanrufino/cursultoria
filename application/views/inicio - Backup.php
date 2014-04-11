
<?php $this->load->view('json/default');?>
<?php $this->load->view('json/clientes');?>

<div id="breadcrumb">
	<img src="<?=site_url()?>/assets/images2/icons/home3.png" />
    <p>Home</b></p>    
</div><!-- #breadcrumb -->


<div style=" display:block; padding:5px;">
	<div id="tit_session"><?=$nome_pagina?></div>
	
	<table border="0" cellspacing="0" cellpadding="0" style=" display:block; overflow:auto; margin-top:10px;">
      <tr> 
        <td width="100%">
			<div id="fatura">
        
				<table class="table table-bordered" style="border:none;">
                  <tr style="border:none;" >
                    <td>TOTAL FATURADO</td>
                    <td>TOTAL PAGO</td>
                    <td>SALDO A RECEBER</td>
                  </tr>
                  <tr >
                    <td style="border-top:1px solid #d8d6d6;font: 29px 'Franklin Gothic Medium Cond'; font-weight:300;">R$ 90,00</td>
                    <td align="center" style="border-top:1px solid #d8d6d6;font: 29px 'Franklin Gothic Medium Cond'; font-weight:300;">RR$ 90,00</td>
                    <td align="center" style="border-top:1px solid #d8d6d6;font: 29px 'Franklin Gothic demi Cond'; font-weight:300;">R$ 00,00</td>
                  </tr>
                </table>
                <div style="font-size:14px;"><i class=" icon-info-sign" style="width:16px; height:16px"></i> São considerados apenas faturas já enviadas e não arquivadas. </div>
            </div><!-- ./fatura -->
            
			<div id="status_servidor">
                <div class="easyui-tabs" fit="true" border="false" id="tt">
                    <form id="form_ativ_status_serv" name="form_edit" method="post" action="">
                        <ul class="btn-group">
                            <li class="btn"><a href="#tabs-1" >Atividades</a></li>
                            <li class="btn"><a href="#tabs-2" >Status do Servidor</a></li>
                        </ul>
            
                        <div id="tabs-1" style="overflow:hidden; border:none"> 
                          <table width="100%" style="min-width:400px;" border="0" cellspacing="0" cellpadding="0">
                              <tr style="height:85px;" align="center">
                                <td><img src="<?=site_url()?>/assets/img/teste/img-1.png" alt="" /></td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-2.png" alt="" /></td>
                                <td style="font-size:40px; color:#0C0; font-weight:bold;">Good</td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-4.png" alt="" /></td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-1.png" alt="" /></td>
                              </tr>
                              <tr id="atividade_status_serv2">
                                <td align="center" style="padding:5px; font-size:16px">Leads per hour</td>
                                <td align="center" style="padding:5px; font-size:16px"">Daily Hits</td>
                                <td align="center" style="padding:5px; font-size:16px"">Remote Status</td>
                                <td align="center" style="padding:5px; font-size:16px"">Resources</td>
                                <td align="center" style="padding:5px; font-size:16px"">Connections</td>
                              </tr>
                            </table>
                        </div>
                      <div id="tabs-2" style="overflow:hidden; border:none">
                            <table width="100%" style="min-width:400px;"cellspacing="0" cellpadding="0">
                              <tr style="height:85px;" align="center">
                                <td><img src="<?=site_url()?>/assets/img/teste/img-1.png" alt="" /></td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-2.png" alt="" /></td>
                                <td style="font-size:40px; color:black; font-weight:bold;">Fair</td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-4.png" alt="" /></td>
                                <td><img src="<?=site_url()?>/assets/img/teste/img-1.png" alt="" /></td>
                              </tr>
                              <tr id="atividade_status_serv2">
                                <td align="center" style="padding:5px;">Leads per hour</td>
                                <td align="center" style="padding:5px;">Daily Hits</td>
                                <td align="center" style="padding:5px;">Remote Status</td>
                                <td align="center" style="padding:5px;">Resources</td>
                                <td align="center" style="padding:5px;">Connections</td>
                              </tr>
                            </table>
                        </div>
                    </form>          
                </div>
            </div><!-- ./status_servidor -->
            
            <div id="tabs_form">
                <div class="easyui-tabs" fit="true" border="false" id="tt">
                    <form style="border:none;" name="form_edit" method="post" action="">
                        <ul>
                            <li><a href="#tabs-1">Atividades</a></li>
                            <li><a href="#tabs-2">Status do Servidor</a></li>
                        </ul>
                
                        <div id="tabs-1" style="overflow:hidden;"> 
                            <ul>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                                <li>Aenean tempor ullamcorper</li>
                            
                            </ul>
                        </div>
                        <div id="tabs-2" style="overflow:hidden;"> 
                            <h4>Lorem ipsum dolor sit amet</h4>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
                            <h4>Lorem ipsum dolor sit amet</h4>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        </div>
                    </form>
                </div><!--./easyui-tabs -->
                
                <form action="#" method="post" class="form_contact_inicio">
                    <p>
                        <label style=" float:left; width:100%;">Support Issue</label>
                        <input class="span4" name="" />
                    </p>
                    <br/>
                    <p>
                        <label>Description</label>
                        <textarea name="" style="float:left; width:100%; height:150px; resize:vertical;"></textarea>
                    </p>
                    <br/>
                    <p >
                         <div class="btn-group" style="float:left;">
                            <button class="btn">Regular</button>
                            <button class="btn">Urgente</button>
                         </div>
                     </p>
                     <br/>
                     <p style="margin-top:15px; float:left; width:100%;">
                        <button type="submit" class="btn btn-primary"><i class="icon-comment icon-white"></i> Contato</button>
                     </p>
                </form>
                
        	</div><!--./tabs_form -->
            
        </td>
        
        <td valign="top" align="center" style="width:250px; border:1px solid #c00;">
			 <div id="links_rapidos" style="border:1px solid #036;">
                <ul>
                     <li>
                        <a class="btn-link" href="#">
                            <div class="li_links_rapidos">
                            	<i class="icon-plus"></i>
                            </div>
                            <div style="margin:10px 0 0 50px; ">Novo Cliente</div>
                        </a>
                    </li>
                     <li>
                        <a class="btn-link" href="#">
                            <div class="li_links_rapidos">
                            	<i class="icon-plus"></i>
                            </div>
                            <div style="margin:10px 0 0 50px; ">Novo Cliente</div>
                        </a>
                    </li>
                     <li>
                        <a class="btn-link" href="#">
                            <div class="li_links_rapidos">
                            	<i class="icon-plus"></i>
                            </div>
                            <div style="margin:10px 0 0 50px; ">Novo Cliente</div>
                        </a>
                    </li>
                     <li>
                        <a class="btn-link" href="#">
                            <div class="li_links_rapidos">
                           		<i class="icon-plus"></i>
                            </div>
                            <div style="margin:10px 0 0 50px; ">Novo Cliente</div>
                        </a>
                    </li>
                    <li>
                        <a class="btn-link" href="#">
                            <div class="li_links_rapidos">
                            	<i class="icon-plus"></i>
                            </div>
                            <div style="margin:10px 0 0 50px; ">Novo Cliente</div>
                        </a>
                    </li>        
                
                </ul>
            </div> <!-- ./links_rapidos -->
            
            <div id="estatisticas" style="border:1px solid red;">
            	<div id="topo">
                	<div id="estatisticas_tit">Estatíticas</div>
                </div>
                <ul>
                	<li class="well well-small">
                    	<div class="num_estatisticas">
                        	17
                        </div>
                        <div class="tit_estatisticas">
                        	Novos Clientes
                        </div>	
                    </li>
                    
                	<li class="well well-small">
                    	<div class="num_estatisticas">
                        	30541
                        </div>
                        <div class="tit_estatisticas">
                        	Novos Pedidos
                        </div>	
                    </li>
                    
                    <li class="well well-small">
                    	<div class="num_estatisticas">
                        	20
                        </div>
                        <div class="tit_estatisticas">
                        	Faturas em aberto
                        </div>	
                    </li>
                    
                    <li class="well well-small">
                    	<div class="num_estatisticas">
                        	325
                        </div>
                        <div class="tit_estatisticas">
                        	Tickets de Suporte ativos
                        </div>	
                    </li>
                </ul>
            
            </div>
        </td>
      </tr>

    </table>
</div>
<!-- pop-up de operações -->
<div id="pop_view"></div>
<div id="add_view"></div>