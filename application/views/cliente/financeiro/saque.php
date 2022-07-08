<!--main content start-->










<section id="saque" class="d-flex justify-content-center align-items-center mt-5">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-xl-10 p-3">
        <div class="text-center position-relative d-flex align-items-center justify-content-center">
          <img src="<?php echo base_url(); ?>/assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
          <h1 class="display-5 text-white fw-bold">Withdraw</h1>
        </div>
        <div class="content py-4 px-4 position-relative">

          <div class="detalle position-relative">
            <p class="alerta p-2 text-white text-center text-small">
              To request withdrawal, please enter the fields below. Remembering that the amount
              The minimum for withdrawal of income is  2.00 USD and the indication is  250.00 USD. I know
              will deduct a 10% fee from the withdrawal.
              After requesting the withdrawal, you will be able to see the discount on your account statement.
            </p>
            <div class="opciones pt-3 d-md-flex justify-content-evenly align-items-md-center">

              <div class="row">

                <div class="col-md-12 m-2">
                  <h6 class="m-md-0 fw-bolder">What do you want to withdraw?</h6>
                </div>

                <div class="col-md-6 form-check">
                  <input name="tipo_saque" id="tipo_saque" value="1" type="radio">
                  <i></i> Income <b>( <?php echo number_format(InformacoesUsuario('saldo_rendimentos'), 2, ",", "."); ?> USD) </b>
                </div>
                <div class="col-md-6 form-check">
                  <input name="tipo_saque" id="tipo_saque" value="2" type="radio">
                  <i></i> Recommendation <b>( <?php echo number_format(InformacoesUsuario('saldo_indicacoes'), 2, ",", ".");  ?> USD) </b>
                </div>




                <div class="lugar_recebimento col-md-12" style="display:none">

                  <div class="col-md-12 mt-3 w-100 form-check">

                    <span>
                      Where do you want to receive?
                    </span>

                  </div>

                  <div class="col-md-12 ">
                    <input name="local_recebimento" id="local_recebimento" value="2" type="radio">
                    <i></i> My Wallet Ethereum
                  </div>

                </div>



                <div class="recebimento_conta col-md-6" style="display:none">
                  <div class="form-group">
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#new_bank" style="margin-right:20px;"><i class="fa fa-bank"></i> Cadastrar</button>
                  </div>


                </div>

                <div class="recebimento_carteira col-md-6 mt-3" style="display:none; width: 100%;">


                  <table class="table table-borderd w-100">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Wallet</th>

                      </tr>
                    </thead>
                    <tbody id="append_carteira">
                      <tr data-id="<?php echo InformacoesUsuario('cpf'); ?>">
                        <td><input type="radio" name="carteira_bitcoin" id="carteira_bitcoin" value="<?php echo InformacoesUsuario('cpf'); ?>" /></td>
                        <td class="text-break"><?php echo InformacoesUsuario('cpf'); ?></td>

                      </tr>
                    </tbody>
                  </table>
                </div>



              </div>








            </div>





            <div id="bloco_confirmacao" style="display:none;">

              <div class="row mt-5 ">
                <div class="col-md-12 mb-3">
                  <span>Amount to Withdraw</span><br>
                </div>
            
                <div class="col-sm-6 mb-3  mt-3">
				  <label>Amount</label>	
                  <input type="text" id="valor_saque" class="form-control u-rounded ">
                </div>
				  
				<div class="col-sm-6 mb-3  mt-3">
					
				  	
				  <label>Withdraw Date</label>
					
					
					
					<select id="timeSaque" name="timeSaque"  class="timeSaque form-control u-rounded ">
					
						<option value="10">24 hours (fee 10%)</option>
						<option value="7">7 days (fee 7%)</option>
						<option value="5">15 days (fee 5%)</option>
						<option value="2">30 days (fee 2%)</option>
					
					</select>
					
					
                </div>  
				  
                <div class="col-sm-6 mb-3 mt-3">
					
					<input type="hidden" name="timeText" id="timeText" value="24 hours">
					
                  <button type="button" id="solicitar_saque" class="btn btn-primario w-100"><i class="fa fa-check"></i> Request Withdraw</button>
                </div>
              </div>



            </div>
          </div>


        </div>

      </div>

    </div>
  </div>

</section>