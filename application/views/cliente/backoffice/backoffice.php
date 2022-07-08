<section id="saque" class="d-flex justify-content-center align-items-center py-5 mt-3 my-auto">
    <div class="container">
        <div class="row justify-content-center text-center">
			
			<!--== Notifications ==-->
			<?php
            if($this->UsuarioModel->MinhasNotificacoes() !== false){
				$contNoti = 0;
            	foreach($this->UsuarioModel->MinhasNotificacoes() as $notificacao){
					$contNoti++;
					if($contNoti==1){
            ?>
			<div class="col-12 col-md-12 col-lg-12 p-3" id="notiSystem">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2>Metabiz <?php echo lang('title_dialog1')?> <span id="closeNoti"><i class="fas fa-times-circle"></i></span></h2>
                            <div class="linea"></div>
                        </div>
                        
						<div class="col-12 mt-3">
							
							<?php
							$imgNoti = strlen($notificacao->icone);
							
							if($imgNoti<8){
								$imgNotiIcon = "62bace9580d90-logo.png";
							}else{
								
								$imgNotiIcon = $notificacao->icone;
							}
							
							?>
							
							<img src="<?php echo base_url();?>assets/imgs/plan/<?php echo $imgNotiIcon;?>"
								 class="imgNotificaciones">
						
							<!--<p><?php //echo $notificacao->mensagem;?></p>-->
                            <p><?php echo lang('welcome_dialog1')?></p>
							<small><?php echo TempoAtras(strtotime($notificacao->data));?></small>
						
						</div>
						
						


                    </div>
                </div>
            </div>
			<?php
					
						
					}	
					
            	}
            }
            ?>
			
			
			<?php


            foreach ($userPlain as $usrpln) {
            }

            
            ?>
			<!--== Notifications ==-->
			
			<!--== points ==--> 
			
			<div class="col-12 col-md-4 col-xl-4 p-3">
                <h5 class="fw-normal"><?php echo lang('title_dialog2')?></h5>
                <div class="content py-4 px-4 position-relative">
                    <div class="detalle w-100 position-relative table-responsive">
                        <table class="table table-sm table-borderless">
                            <thead class="">
                                <tr>
                                    <!--<th>#</th>-->
                                    <th class="text-nowrap"><?php echo lang('htleft_table')?></th>
                                    <th><?php echo lang('htright_table')?></th>
                                    <!-- <th>Total</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<!--<td>1</td>-->
                                    <td>
                                        <?php echo number_format($pontos['hoje']['esquerdo'], 0, ".", "."); ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['hoje']['direito'], 0, ".", "."); ?>
                                    </td>
<!--                                     <td>
                                        <?php //echo number_format($pontos['hoje']['esquerdo'] + $pontos['hoje']['direito'], 0, ".", "."); ?>
                                    </td> -->
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
			
								

            <div class=" col-12 col-md-4 col-xl-4 p-3">
                <h5 class="fw-normal"><?php echo lang('title_dialog3')?></h5>
                <div class="content py-4 px-4 position-relative">
					
					
								

                    <div class="detalle w-100 position-relative table-responsive">
                        <table class="table table-sm table-borderless">
                            <thead class="">
                                <tr>
                                    <!--<th>#</th>-->
                                    <th class="text-nowrap"><?php echo lang('htleft_table')?></th>
                                    <th><?php echo lang('htright_table')?></th>
                                    <th><?php echo lang('httotal_table')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<!--<td>1</td>-->
                                    <td>
                                        <?php echo number_format($pontos['total']['esquerdo'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['total']['direito'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['total']['esquerdo'] + $pontos['total']['direito'], 0, ".", ".");?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
		
			<div class="col-12 col-md-4 col-xl-4 p-3">
                <h5 class="fw-normal"><?php echo lang('title_dialog4')?></h5>
                <div class="content py-4 px-4 position-relative">

                    <div class="detalle w-100 position-relative table-responsive">
                        <table class="table table-sm table-borderless">
                            <thead class="">
                                <tr>
                                    <!--<th>#</th>-->
                                    <th class="text-nowrap"><?php echo lang('htleft_table')?></th>
                                    <th><?php echo lang('htright_table')?></th>
                                    <th><?php echo lang('httotal_table')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<!--<td>1</td>-->
                                    <td>
                                        <?php echo number_format($pontos['transferir']['esquerdo'], 0, ".", "."); ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['transferir']['direito'], 0, ".", "."); ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['transferir']['esquerdo'] + $pontos['transferir']['direito'], 0, ".", "."); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <?php 

                                            $suma_total_points = $pontos['total']['esquerdo'] + $pontos['total']['direito'];
                                            $suma_points_transfer = $pontos['transferir']['esquerdo'] + $pontos['transferir']['direito'];

                                            if( $suma_total_points > $suma_points_transfer ){
                                                $acumulado = $suma_total_points - $suma_points_transfer;
                                            }elseif ( $suma_points_transfer > $suma_total_points ) {
                                                $acumulado = $suma_points_transfer - $suma_total_points;
                                            }
										
									 
										//echo '<pre>';

										$idUsuarioPlan = $this->session->userdata('uid'); 
										//echo "<pre>";                              
										$planActivoUser =  verDirectosID($idUsuarioPlan);
										//print_r($planActivoUser);
										$dosLados = sizeof($planActivoUser);
										//echo "</pre>";
										
										
										if($dosLados>=2){                                    
											echo lang('title_dialog3')." : " . number_format( $acumulado , 0, ".", ".");  
										}else{
											echo "Binary: not activated";
										}
									 

                                            ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
			
			<!--== points ==-->
			
			<!--== earnings charts ==-->
			
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2><?php echo number_format(InformacoesUsuario('saldo_rendimentos'), 2, ",", "."); ?> USD</h2>
                            <p class="fw-bold fst-italic mb-0"><?php echo lang('profits')?></p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">
                            <!-- <div class="way_icon">
                  <i class="mdi mdi-cash"></i>
                </div> -->

                            <span class="way-icon verIcon"><i class="mdi mdi-cash"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
			
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2> <?php echo number_format(InformacoesUsuario('saldo_indicacoes'), 2, ",", "."); ?> USD</h2>
                            <p class="fw-bold fst-italic mb-0"><?php echo lang('referral_bonus')?></p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">
                            <!-- <div class="way_icon">
                  <i class="mdi mdi-cash"></i>
                </div> -->

                            <span class="way-icon verIcon"><i class="mdi mdi-account-plus"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2><?php echo PlanoCarreira(InformacoesUsuario('plano_carreira'), 'nome'); ?></h2>
                            <p class="fw-bold fst-italic mb-0"><?php echo lang('rank')?></p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">
                            <!-- <div class="way_icon">
                  <i class="mdi mdi-cash"></i>
                </div> -->

                            <span class="way-icon verIcon"><i class="mdi mdi-laptop"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            
							<h2>
							<?php
                                //echo '<pre>';

                                $idUsuario = $this->session->userdata('uid'); 
                                //echo $idUsuario;                              
                                $planActivoUser =  usersPlanActive($idUsuario);
                                if($planActivoUser == false){                                    
                                    ?>
                                    <a href="<?php echo base_url('plans'); ?>" >Buy a Plan</a>
                                    <?php
                                }else{
                                    echo $planActivoUser;
                                }
                                ?>
							
							</h2>
							
                            <p class="fw-bold fst-italic mb-0">
							   Business plan
							
							</p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">


                            <span class="way-icon verIcon"><i class="mdi mdi-align-vertical-top"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2><?php echo $rede; ?></h2>
                            <p class="fw-bold fst-italic mb-0"><?php echo lang('my_network')?></p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">
                            <!-- <div class="way_icon">
                  <i class="mdi mdi-cash"></i>
                </div> -->
 
                            <span class="way-icon verIcon"><i class="mdi mdi-account-multiple-plus"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2><?php echo consultaPatrocinador(InformacoesUsuario('id')); ?></h2>
                            <p class="fw-bold fst-italic mb-0"><?php echo lang('sponsor')?></p>
                            <div class="linea"></div>
                        </div>
                        <div class="d-flex align-items-end pt-4 pb-0 justify-content-between">
                            <!-- <div class="way_icon">
                  <i class="mdi mdi-cash"></i>
                </div> -->
 
                            <span class="way-icon verIcon"><i class="mdi mdi-account-multiple-plus"></i></span>

                            <!--<button class="btn badge btn-secundario">View All</button>-->
                        </div>


                    </div>
                </div>
            </div>
			
			<!--== earnings charts ==-->
			
			<!--== Plan time ==-->
			<?php
            if($this->DashboardModel->PlanoAtivo() !== false){
            ?>
			<div class="col-5 col-md-5 col-lg-5 p-3" id="notiSystem">
                    <div class="content style-content py-4 px-4 position-relative text-center ">


                        <div class="detalle row position-relative w-100">
                            <div class="text-end">
                                <h2><?php echo lang('title_dialog5')?></h2>
                                <p class="fw-bold fst-italic mb-0">

                                    <?php
                                    echo $usrpln['ganancias'] . ' of ' . $usrpln['ganhos_maximo'] . ' USD';

                                    ?>
                                </p>
                                <div class="linea"></div>
                                <?php
                                   $porcentaje = InformacoesUsuario('ganancias') * 100 / consultaPlanGanancias(InformacoesUsuario('id'));
                                ?>
                            </div>
                            <div class="col-sm-3  d-flex align-items-center justify-content-center">




                                <div>
                                    <span style="color: white; font-size: 20px; font-weight: bold;">
										<?php 
				
										$progress =  round($porcentaje); 
										echo empty($progress)?"0": $progress;
										
										?>%

                                    </span>
                                    <span style="color: #15e0b2; font-weight: bold;">
                                        <?php echo lang('progress')?>
                                    </span>
                                </div>
                            </div>

                            <div class="col-sm-7 mt-4  d-flex align-items-center justify-content-center text-white bg2 " style="height: 200px;">


                                <div class="chartPro  d-flex align-items-center justify-content-center " data-percent="<?php echo round($porcentaje) ?>">
                                    <span><?php  echo round($porcentaje) ; //echo round($porcentaje) ?></span>%
                                </div>


                            </div>
                            <div class="col-sm-2 d-flex align-items-center justify-content-center">




                                <div>
                                    <span style="color: white; font-size: 20px; font-weight: bold;">275%
                                    </span>
                                    <span style="color: #15e0b2; font-weight: bold;"><?php echo lang('goal')?>
                                    </span>
                                </div>


                            </div>



                        </div>

                    </div>
                </div>




                <div class="col-7 col-md-7 col-lg-7 p-3" id="notiSystem">
                    <div class="content style-content py-4 px-4 position-relative">

                        <div class="detalle position-relative w-100">

                            <div class="text-end">
                                <h2><?php echo lang('title_dialog6')?></h2>
                                <div class="linea"></div>
                            </div>

                            <div class="col-12 mt-3">
                                <h1 class="light-txt" id="fim_plano"></h1>
                                <strong class="text-uppercase"><?php echo lang('expire')?></strong>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
			<!--== Plan time ==-->
			
			
			<!--== direct referrals ==-->
			
			<div class="col-12 col-md-12 col-lg-12 p-3" id="notiSystem">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end">
                            <h2><?php echo lang('title_dialog7')?></h2>
                            <div class="linea"></div>
                        </div>
                        
						<div class="col-12 mt-3">
							
							<table id="tableUSers"  width='100%' class="tableUSers w-100">
								<thead class="">
									<tr>

										<th class="text-nowrap">#</th>
										<th><?php echo lang('ht_name')?><!--Name--></th>
										<th><?php echo lang('ht_email')?><!--Email--></th>
										<th><?php echo lang('ht_plan')?><!--Plan--></th>										
										<th><?php echo lang('ht_phone')?><!--Phone--></th>
										<th><?php echo lang('ht_date')?><!--Date--></th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($directuser !== false) {
										
										$contRD = 0;
										
										foreach ($directuser as $direct) {
											$contRD++;
									?>
											<tr>
												<td>
													<?php echo $contRD ?>
												</td>
												
												<td>
													<?php echo InformacoesUsuario('nome', $direct->id_usuario);?> 
												</td>
												
												<td>
													<?php echo InformacoesUsuario('email', $direct->id_usuario);?> 
												</td>
												
												<td>
                                                    <?php  
													$valorPlan = usersPlanActive($direct->id_usuario); 
                                                    if($valorPlan == false){ 
														echo 'Without Plan';
													}else{ 
														echo $valorPlan;
													}
													
													?>
                                                </td>
												
												<td>
													<?php echo InformacoesUsuario('celular', $direct->id_usuario);?> 
												</td>
												
												<td>
													<?php echo InformacoesUsuario('data_cadastro', $direct->id_usuario);?> 
												</td>
											</tr>

									<?php
										}
									}
									?>

								</tbody>
							</table>
							
							
						
						</div>
						
						


                    </div>
                </div>
            </div>
			
			
			<!--== direct referrals ==-->
			
			
			<!--== Recommendation Link ==-->
            <div class="col-12 col-md-6 col-lg-6 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-start">
                            <h2 class="mb-5"><?php echo lang('title_dialog8')?></h2>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="textArea" value="<?php echo base_url('register/' . InformacoesUsuario('login')); ?>" />

                                </div>
                                <div class="col-md-4 copyLinkHome">
                                    <button onclick="copyToClipBoard()" class="btn btn-primario clipboard" data-clipboard-target="#linkIndicacao">
                                        <?php echo lang('button1')?>
                                    </button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
			<!--== Recommendation Link ==-->
			
			
			
			<!--== Binary key ==-->
			<div class="col-12 col-md-6 col-lg-6 p-3">
			
				<div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle w-100 position-relative">
                        <p class="alerta p-2 text-white text-center text-small">
                        <?php echo lang('button2')?>
                        </p>
                        <div class="opciones pt-2 d-md-flex justify-content-evenly align-items-md-center">

                            <h6 class="m-md-0 fw-bolder"><?php echo lang('binary_key')?></h6>

                            <div class="form-check">
                                <label class="radio-inline i-checks m-4">
                                    <input name="chave_binaria" id="chave_binaria" value="1" type="radio" <?php echo (InformacoesUsuario('chave_binaria') == 1) ? 'checked' : ''; ?>>
                                    <i></i> <?php echo lang('htleft_table')?>
                                </label>
                                <label class="radio-inline i-checks m-4">
                                    <input name="chave_binaria" id="chave_binaria" value="2" type="radio" <?php echo (InformacoesUsuario('chave_binaria') == 2) ? 'checked' : ''; ?>>
                                    <i></i> <?php echo lang('htright_table')?>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
			
			</div>	
			
			<!--== Binary key ==-->
			 
			
			
			
            <div class="col-md-12 col-xl-12 p-3">
                <div class="content style-content py-4 px-4 position-relative">

                    <div class="detalle position-relative w-100">

                        <div class="text-end table-responsive">
                            <table class="marketTable table table-responsive w-100">
                                <tr class="text-center">
                                    <th><?php echo lang('ht_market')?><!--MARKET--></th>
                                    <th><?php echo lang('ht_sell')?><!--BULL/SELL--></th>
                                    <th><?php echo lang('ht_id')?><!--ID--></td>
                                    <th><?php echo lang('ht_eth_quantity')?><!--ETH QUANTITY--></th>
                                    <th><?php echo lang('ht_total_quantity')?><!--USD QUANTITY--></th>
                                </tr>
                                <tr>
                                    <td id='td0'></td>
                                    <td id='td1'></td>
                                    <td id='td2'></td>
                                    <td id='td3'></td>
                                    <td id='td4'></td>
                                </tr>

                                <tr>
                                    <td id='td5'></td>
                                    <td id='td6'></td>
                                    <td id='td7'></td>
                                    <td id='td8'></td>
                                    <td id='td9'></td>
                                </tr>
                                <tr>
                                    <td id='td10'></td>
                                    <td id='td11'></td>
                                    <td id='td12'></td>
                                    <td id='td13'></td>
                                    <td id='td14'></td>
                                </tr>
                                <tr>
                                    <td id='td15'></td>
                                    <td id='td16'></td>
                                    <td id='td17'></td>
                                    <td id='td18'></td>
                                    <td id='td19'></td>
                                </tr>
                                <tr>
                                    <td id='td20'></td>
                                    <td id='td21'></td>
                                    <td id='td22'></td>
                                    <td id='td23'></td>
                                    <td id='td24'></td> 
                                </tr>

                            </table>

                        </div>



                    </div>
                </div>
            </div>
		
		
		<!--== edward ==-->
		
		<div class="clearfix"></div>
		
		
		<div class="col-md-12 col-xl-12 p-3">
			<div class="content style-content py-4 px-4 position-relative">

            	<div class="detalle position-relative w-100 row">
				
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class="w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=859&pref_coin_id=1505" width="250" height="196px"  scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class="w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=145&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class="w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=585&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class=" w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=157&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class=" w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=359&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class=" w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=122882&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget -->
					
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class=" w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=1026&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget --> 
					
					
					<!-- widget -->
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 pt-3 pb-3">
					
						<div class="criptoPrice w-100" style="width: 250px; height:220px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:220px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px;"><div style="height:200px; padding:0px; margin:0px; width: 100%;">
							<iframe class=" w-100" src="https://widget.coinlib.io/widget?type=single_v2&theme=dark&coin_id=280&pref_coin_id=1505" width="250" height="196px" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
						
					</div>
					<!-- widget --> 

				</div>
			</div>
			
			
			
			
		</div>	
		
		
		<!--== edward ==-->
		
		
		
        </div>

    </div>
</section>

<style>
    .bg2 {
        background: url('<?php echo base_url(); ?>assets/imgs/chartBack.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .chartPro {
        position: relative;
        display: inline-block;
        width: 110px;
        height: 110px;
        margin-top: 50px;
        margin-bottom: 50px;
        text-align: center;
    }

    .chartPro canvas {
        position: absolute;
        top: 0;
        left: 0;
    }

    .percent {
        display: inline-block;
        line-height: 110px;
        z-index: 2;
    }

    .percent:after {
        content: '%';
        margin-left: 0.1em;
        font-size: .8em;
    }
</style>

<?php
$url = "https://api.etherscan.io/api?module=stats&action=ethprice&apikey=YJXUP24PXND823YDSI1CKTPZGXD79IQ6NZ";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
$salidas = json_decode($output, true);


// echo $salidas['result']['ethusd'];

?>



<script>
    function copyToClipBoard() {

        var content = document.getElementById('textArea');

        content.select();
        document.execCommand('copy');


    }




    function cantidad(min, max) {
        return (Math.random() * (max - min + 1));
    }



    function mercado() {
        var myArray = ['Coinbase', 'Binance', 'FTX', 'KuCoin', 'Bitfinex', 'Coinbase', 'Binance', ];
        var rand = Math.floor(Math.random() * myArray.length);
        var rValue = myArray[rand];
		
		let rImage = "";
		/*edward*/
		if(rValue=='Coinbase'){
			rImage = "coinbase.png";
		}
		
		if(rValue=='Binance'){
			rImage = "binance.png";
		}
		
		if(rValue=='FTX'){
			rImage = "ftx.png";
		}
		
		if(rValue=='KuCoin'){
			rImage = "kucoin.png";
		}
		
		if(rValue=='Bitfinex'){
			rImage = "bitfinex.png";
		}
		
		/*edward*/
		
		
		
		rValue = "<span><img src='<?php echo base_url(); ?>assets/imgs/market/"+rImage+"' class='markImg'>"+rValue+"</span>";
        // console.log(rValue)
        return rValue;
    }
    mercado();


    function book() {
        var myArray = ['Buy', 'Sell'];
        var rand = Math.floor(Math.random() * myArray.length);
        var rValue = myArray[rand];
		
		let flechas ="";
		let color ="";
		
		let td1_c ="";
		
		
		if(rValue=="Buy" ){
			flechas ="<i class='fas fa-arrow-up flechasMarket' style='color:green'></i>";
			color = "txtMarkGreen";
		 
			/*td1_c = document.getElementById("td1");
			td1_c.closest('tr').removeAttribute('class');
			td1_c.closest('tr').classList.add("trGreen");*/
		 
		 
		}
		
		if(rValue=="Sell"){
			flechas ="<i class='fas fa-arrow-down flechasMarket' style='color:red'></i>";
			color = "txtMarkRed";
			
			/*td1_c = document.getElementById("td1");
			td1_c.closest('tr').removeAttribute('class');
			td1_c.closest('tr').classList.add("trRed");*/
			
		}
		
		
		
		
		rValue = "<span class='"+color+"'>"+flechas+rValue+"</span>";
		
         //console.log(rValue)
        return rValue;
    }

    function id() {
        let id_trans = Math.floor(Math.random() * (55559878 - 21110000)) + 1;
        return id_trans;
    }
    id();

    function crearArray() {
        var precio = '<?php echo $salidas['result']['ethusd'] ?>';
        n_format = precio * cantidad(0.01, 3.5);
		
		let colorN ="";
		
		
        var datos = [

            [mercado(), book(), id(), cantidad(0.01, 3.5), '<span class="'+colorN+'">'+n_format.toFixed(2) + ' USD</span>']
        ];
        var cant2 = cantidad(0.1, 3.0);
        var datos2 = [
            [mercado(), book(), id(), cant2, precio * cant2]
        ];
        var cant3 = cantidad(0.1, 3.0);
        var datos3 = [
            [mercado(), book(), id(), cant3, precio * cant3]
        ];
        var cant4 = cantidad(0.1, 3.0);
        var datos4 = [
            [mercado(), book(), id(), cant4, precio * cant4]
        ];
        var datos5 = [
            [mercado(), book(), id(), cant4, precio * cant4]
        ];
        var cant6 = cantidad(0.1, 3.0);
        var datos6 = [
            [mercado(), book(), id(), cant6, precio * cant6]
        ];
        var cant7 = cantidad(0.1, 3.0);
        var datos7 = [
            [mercado(), book(), id(), cant7, precio * cant7]
        ];
        var cant8 = cantidad(0.1, 3.0);
        var datos8 = [
            [mercado(), book(), id(), cant8, precio * cant8]
        ];
        var cant9 = cantidad(0.1, 3.0);
        var datos9 = [
            [mercado(), book(), id(), cant9, precio * cant9]
        ];
        var cant10 = cantidad(0.1, 3.0);
        var datos10 = [
            [mercado(), book(), id(), cant10, precio * cant10]
        ];
        var unir = datos.concat(datos2, datos3, datos4, datos5, datos6, datos7, datos8, datos9, datos10);
        return unir;

    }

    function selectDate(id, in1, in2) {
        document.getElementById(id).innerHTML = crearArray()[in1][in2];
    }

    function mostrarDate(idD, in1, in2) {
        selectDate(idD, in1, in2);
        setInterval(function() {
            selectDate(idD, in1, in2);
        }, 5000);

    }
    onload =
        mostrarDate('td0', 0, 0),//Title 
		mostrarDate('td1', 0, 1), 
		mostrarDate('td2', 0, 2), 
		mostrarDate('td3', 0, 3), 
		mostrarDate('td4', 0, 4),//usd amount
		
    	mostrarDate('td5', 0, 0),//titulo 
		mostrarDate('td6', 0, 1), 
		mostrarDate('td7', 0, 2), 
		mostrarDate('td8', 0, 3), 
		mostrarDate('td9', 0, 4),//usd amount
		
        mostrarDate('td10', 0, 0),//Title 
		mostrarDate('td11', 0, 1), 
		mostrarDate('td12', 0, 2), 
		mostrarDate('td13', 0, 3), 
		mostrarDate('td14', 0, 4),
		
        mostrarDate('td15', 0, 0),//Title 
		mostrarDate('td16', 0, 1), 
		mostrarDate('td17', 0, 2), 
		mostrarDate('td18', 0, 3), 
		mostrarDate('td19', 0, 4),//usd amount
	
    	mostrarDate('td20', 0, 0),//Title 
		mostrarDate('td21', 0, 1), 
		mostrarDate('td22', 0, 2), 
		mostrarDate('td23', 0, 3), 
		mostrarDate('td24', 0, 4);//usd amount
    // mostrarDate('td5', 0, 0), mostrarDate('td6', 0, 1), mostrarDate('td7', 0, 2), mostrarDate('td8', 0, 3), mostrarDate('td9', 0, 4)
</script>

<script>
/*	
var xValues = ["Ganancia", "Total"];
var yValues = [100, 300];
var barColors = [
  "#b91d47",
  "#00aba9",

];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    },


    aspectRatio: 2,
    borderColor: 'black',
        width: 2,

  }
});*/
</script> 