<!--main content start-->
<section id="planes" class="d-flex justify-content-center align-items-center py-5 mt-3 my-auto">
    <div class="container">
        <div class="row justify-content-center text-center planes">
            <div class="text-center position-relative d-flex align-items-center justify-content-center mb-4">
                <img src="<?php echo base_url(); ?>assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
                <h1 class="display-5 text-white fw-bold w-50">PLANS</h1>
            </div>




            <?php


            if ($this->session->userdata('message_planos')) {

                echo $this->session->userdata('message_planos');
                $this->session->unset_userdata('message_planos');
            }
            ?>

            <?php
            if ($planos !== false) {
            ?>


                <?php
                $ocultar = 2;
                foreach ($planos as $plano) {
					
					$idPlan = $plano->id;
					
					
					if($idPlan != 89327542){
                    
                ?>
                    <div class="col-md-6 col-xl-4 p-3 position-relative mt-4 mt-xl-0">
                    <?php echo ($plano->recomendado == 1) ? '<div class="resaltado d-flex align-items-center justify-content-center">
                    <h1 class="h6 fw-bold m-0">RECOMMENDED</h1>
                    
                </div>' : ''; ?>
                        <div class="content py-4 px-4 position-relative">
                            <div class="detalle w-100 position-relative <?php echo ($plano->recomendado == 1) ? 'plan' : ''; ?>">

                               
                                <h2><?php echo $plano->nome; ?></h2>
								
								
								<?php
								  
								$imgPlan = $plano->img_plan;
								  
								if($imgPlan!=""){
									$imgPlan = $plano->img_plan;
								}else{
									$imgPlan = "no-image.jpg"; 
								}
								  
								?>
								
								
								<img src="<?php echo base_url();?>assets/imgs/plan/<?php echo $imgPlan;?>"  class="imgPlanes">
								
              
                                <h3 class="fw-bold mb-4">
                                    <span class="display-5 fw-bold">
                                    <?php echo number_format($plano->valor, 2, ",", "."); ?>
                                </span>
                                <small>USD</small>
                                </h3>
                                <ul class="list-unstyled">
                                <div class="divider"></div>                                    
                                    <li>- Binary <?php echo (is_null($plano->binario) || $plano->binario == 0) ? '<i class="fa fa-times text-danger"></i>' : ' = ' . $plano->binario . '%'; ?></li>
                             
                                        <div class="divider"></div>                                    
                                    <li>- Career Plan <?php echo (is_null($plano->plano_carreira) || $plano->plano_carreira == 0) ? '<i class="fa fa-times text-danger"></i>' : ' = ' . $plano->plano_carreira . ' points'; ?></li>


                                    <div class="divider"></div>
                                    <?php 
                                    if($ocultar == 3)
                                    {
                                    ?>
                                    <li>- Affiliate Network <?php echo ($plano->rede_afiliados == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; ?></li>
                                    <div class="divider"></div>
                                    <li>- Binary Earnings <?php echo (is_null($plano->teto_binario) || $plano->teto_binario == 0) ? '<i class="fa fa-times text-danger"></i>' : ' = USD ' . number_format($plano->teto_binario, 2, ",", ".") . '/dia'; ?> </li>
                                    <div class="divider"></div>
                                    <li>- Daily Earnings <?php echo (is_null($plano->ganhos_diarios) || $plano->ganhos_diarios == 0) ? '<i class="fa fa-times text-danger"></i>' : ' = USD ' . number_format($plano->ganhos_diarios, 2, ",", "."); ?> </li>
                                    <div class="divider"></div>
                                    <?php 
                                    }
                                    ?>
                                </ul>
                                <?php

                                $disabled = '';
                                $href = base_url('plans/comprar/' . $plano->id);

                                ?>
								
								<?php
								$redirPlan=1;
								if($redirPlan==2){
								?>
								
                                <a href="javascript:void(0);" <?php echo $disabled; ?> class="btn btn-primario my-4 w-100 fw-bold <?php echo ($plano->recomendado == 1) ? 'btn-success' : 'btn-info'; ?> <?php echo $disabled; ?>" onclick="window.location.href='<?php echo $href; ?>'"><h5>PURCHASE</h5></a>
								
								<?php
								}
								?>
								
								
								
                            </div>
                        </div>
                    </div>
                <?php
					}	
                }
                ?>

            <?php
            } else {
                echo '<div class="alert alert-danger text-center">We dont have any plans at the moment. Please, come back later.</div>';
            }
            ?>

        </div>

        

    </div>
    </div>
</section>
<!--main content end-->