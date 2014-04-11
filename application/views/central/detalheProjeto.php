<script>
$(document).ready(function(){
//                $("#rec").click(function(){
//                    $(".recomendadas").show();
//                    $(".escolher").hide();
//                })
//                $("#opt").click(function(){
//                    $(".recomendadas").hide();
//                    $(".escolher").show();
//                })
                $(".escolher").show();
                $(".lnkBlb").click(function(){
                    var pai=$(this).parent().parent();
                    $(pai).children().removeClass("ativo");
                    $(this).parent().addClass("ativo");
                    
                })
              
                $(".btn_delete").click(function(){
                    //$(this).parent().parent(".boxCollapse").removeClass('active');
                    //$(this).parent().slideUp(1000);
                    $(this).parent().parent().fadeOut(1000,function(){
                        $(this).remove();
                    });
                   // $(this).parent().parent().remove();
                })
});
    </script>
<div class="boxGray" role="region">
                            <h2 class="titleContent" role="presentation"><?= $projeto->NOME ?></h2>
                            <p>Selecione as bibliografia desejadas, em seguida clique em "Ativar Projeto"</p>
                            <br class="clear">

                            <div class="btn-group" data-toggle="buttons-radio">  
                                <!--<button id="rec" type="button" data-toggle="button" name="option"  value="rec" class="btn unique active">Escolher Bibliografias Recomendadas</button>-->
                                <button id="opt" type="button" data-toggle="button" name="option" value="opt" class="btn unique active">Personalizar Projeto</button>
                            </div>  
                            <!--<div class="button_group">
                            <a href="#" class="btn btn-primary ico-right-1 fLeft" style="margin-right:10px">Escolher Bibliografias Recomendadas</a>
                            <a href="#" class="btn btn-primary ico-right-1 fRight">Personalizar alterando Bibliografias e Disciplinas</a>
                          </div>-->
                            <br class="clear">
                            <!-- INICIO DE BOX -->
<!--                            <div class="collapseGroup recomendadas" style="padding:1px;margin:0">
                                <?php $this->load->view('central/rec_proj') ?>
                            </div>-->
                            <div class="collapseGroup escolher" style="padding:1px;margin:0">
                                <?php  $this->load->view('central/per_proj') ?>
                            </div><!-- FIM ROW -->

                        </div><!-- FIM LIMITE -->
