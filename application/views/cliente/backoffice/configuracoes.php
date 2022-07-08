<!--main content start-->
<section id="" class="min-vh-100 d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-8 p-3">
      <div class="text-center position-relative d-flex align-items-center justify-content-center">
                    <img src="<?php echo base_url(); ?>/assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
                    <h1 class="display-5 text-white fw-bold w-50">Profile Settings</h1>
                </div>
                <div class="content py-4 px-4 position-relative">
        <div class="content py-4 px-4 position-relative">

          <div class="detalle position-relative w-100">

            <?php if (isset($message)) echo $message; ?>
            <div class="row px-3">

              <form role="form" action="" method="post" class="p-0 m-0 row" autocomplete="off">

                <div class="col-md-6">
                  <div class="mb-4 inputsito">
                    <input class="form-control u-rounded" name="nome" type="text" value="<?php echo InformacoesUsuario('nome'); ?>" required>
                    <label for="nombre" class="form-label">Username</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-4 inputsito">
                    <input class="form-control u-rounded" name="email" type="email" value="<?php echo InformacoesUsuario('email'); ?>" required>
                    <label for="correo" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-4 inputsito">
                    <input class="form-control "  name="cpf" type="text" value="<?php echo InformacoesUsuario('cpf'); ?>">
                    <label for="cartera" class="form-label">Wallet</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4 inputsito">
                    <input class="form-control u-rounded" id="celular" name="celular" type="text" value="<?php echo InformacoesUsuario('celular'); ?>" required>
                    <label for="celula" class="form-label">Phone</label>
                  </div>
                </div>
				
				  <?php
				  $recoverPassF= 1;
				  
				  if($recoverPassF==2){
				  
				  ?>
				  
                <div class="col-md-6">
                  <div class="mb-4 inputsito">
                    <input class="form-control u-rounded" name="nova_senha" type="password" autocomplete="off">
                    <label for="celula" class="form-label">New Password</label>

                  </div>
                </div>
				  <?php
				  }
				  
				  ?>
				  
				<div class="col-md-6">
                  <div class="mb-4 inputsito">
                    <a href="<?php echo base_url('recover')?>" class="btn btn-primario w-100" >Reset Password</a>

                  </div>
                </div>
				  
				<input class="form-control u-rounded" name="nova_senha" type="hidden" autocomplete="off">  


                <div class="form-group mt-5">
     
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-primario w-100" name="submit" value="SAVE">
                  </div>
                </div>

              </form>


            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

</section>
<!--main content end-->