<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
    <title><?php echo ConfiguracoesSistema('nome_site'); ?> - Cadastrar</title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>uploads/<?php ConfiguracoesSistema('favicon'); ?>">
    <script src="<?php echo base_url(); ?>assets/template/libs/jquery/jquery-3.4.1.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web&display=swap" rel="stylesheet" />

    <!--  * Instalando css de rd navbar -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/libs/rd-navbar/dist/css/rd-navbar.css" />

    <!-- * iconos fontawesome 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.1.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/libs/aos/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/estilos.css" />
	
	<!--edward-->
	<link href="<?php echo base_url(); ?>assets/template/css/custom.css" rel="stylesheet">

</head>

<body>


    <section id="login" class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-10 col-lg-8 col-xl-6 p-3">
                    <div class="content py-4 px-4 position-relative">

                        <div class="detalle position-relative w-100">
                            <h1 class="h2 py-3 text-white fw-bold">Register</h1>
                            <?php if(isset($message)) echo $message;?>
                            <div class="row px-3">

                                <form id="formMetabiz" role="form" action="" method="post"  class="p-0 m-0 row" autocomplete="off">
                                    <div class="col-md-6">
                                        <div class="mb-4 inputsito">
                                            <input type="text" class="form-control" id="user" required autocomplete="off" name="patrocinador" value="<?php echo ($patrocinador !== false && !empty($patrocinador)) ? $patrocinador : ConfiguracoesSistema('login_patrocinador'); ?>">
                                            <label for="user" class="form-label">Partner</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 inputsito">
                                            <input type="text" class="form-control" id="nombre" name="nome" required autocomplete="off">
                                            <label for="nombre" class="form-label">Name</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4 inputsito">
                                            <input type="email" class="form-control" id="correo" required autocomplete="off" name="email" value="<?php echo set_value('email'); ?>">
                                            <label for="correo" class="form-label">Email</label>
                                        </div>
                                    </div>
         
                                    <div class="col-md-6">
                                        <div class="mb-4 inputsito">
                                            <input type="text" class="form-control" required name="celular" id="celular" value="<?php echo set_value('celular'); ?>" autocomplete="off">
                                            <label for="celula" class="form-label">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 inputsito">
                                            <input type="text" class="form-control" required name="login" value="<?php echo set_value('login'); ?>" autocomplete="off">
                                            <label for="acceso" class="form-label">login</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 inputsito">
                                            <input type="password" class="form-control" required name="senha" value="<?php echo set_value('senha'); ?>" autocomplete="off">
                                            <label for="pass" class="form-label">Password</label>
                                        </div>
                                    </div>
									                                    <div class="col-md-12 d-flex justify-content-center mb-4">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>

                                    </div>
                                    <div class="col-12">
                                        <div class="col-md-8 col-lg-6 mx-auto">

                                            <input type="submit" name="submit" class="btn btn-primario text-decoration-none text-white" onClick="registroCookies()" value="REGISTER">
                                        </div>
                                    </div>
                                </form>
                                <p class="pt-2 p-0 small">Do you already have an account?</p>
                                <div class="col-12">
                                    <div class="col-md-8 col-lg-6 mx-auto"><button class="btn btn-secundario mx-auto"><a href="<?php echo base_url('login'); ?>" class="text-decoration-none text-white">Login</a></button></div>
									
									
									
                                </div>
								

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
	
jQuery(function($){
 
        $( '.g-recaptcha' ).attr( 'data-theme', 'dark' );
 
        });	
	</script>	




    <script src="<?php echo base_url(); ?>assets/template/libs/popper.js/popper.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/template/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/template/libs/rd-navbar/dist/js/jquery.rd-navbar.min.js"></script> -->

    <!--<script src="<?php //echo base_url();
                        ?>libs/swiper/swiper-bundle.min.js"></script>-->

    <!-- <script src="<?php echo base_url(); ?>assets/template/libs/aos/aos.js"></script> -->

    <!-- <script src="<?php echo base_url(); ?>assets/template/js/mis-scripts.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>



    <!-- <script>

 
        // check cookie
   async function connectWallet() {
            accounts = await window.ethereum.request({
                method: "eth_requestAccounts"
            }).catch((err) => {

                console.log(err.code);
                console.log(err.message);
                // var msj = document.getElementById('msj');
                // msj.innerHTML = err.message;
            });
			
			let wallet = accounts[0];
			
			$.cookie('myWallet', wallet);
			
			
            $('#fake').val(accounts[0]);
            // console.log(accounts);
			 
			 
        }
        connectWallet();
		

       
 
		
function registroCookies(){
	//alert('mi C'+ $.cookie("myWallet"))
	
	let hiddenInput = $.cookie("myWallet");
	
	$("<input>").attr({
                name: "cpf",
                id: "cpf",
                type: "hidden",
                value: hiddenInput
    }).appendTo("form");
	
	//formRegister
	$("#formMetabiz").submit();
	
	
}		 -->


	 

        
		
		  
		
		
    </script>








</body>

</html>