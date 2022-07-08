<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
    <title><?php echo ConfiguracoesSistema('nome_site'); ?></title>

    <!-- inject:css -->
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/themify-icons/css/themify-icons.css">
    <!-- endinject -->

    <!-- Main Style  -->


    <!--mega dropdown menu-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/js/mega-dropdown/css/reset.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/js/mega-dropdown/css/style.css">

    <!--horizontal-timeline-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/js/horizontal-timeline/css/style.css">

    <!-- notify -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/needim/noty/lib/noty.css">

    <!-- sweet alert 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.css">

    <!-- orgchart -->
    <link href="<?php echo base_url(); ?>assets/plugins/orgchart/jquery.orgchart.css" rel="stylesheet" type="text/css">

    <!-- tooltipster -->
    <link href="<?php echo base_url(); ?>assets/plugins/tooltipster/css/tooltipster.bundle.min.css" rel="stylesheet" type="text/css">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">



    <!-- TEMPLATE START -->
    <link href="<?php echo base_url(); ?>assets/template/libs/rd-navbar/dist/css/rd-navbar.css" rel="stylesheet">
    
	
	
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.1.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/libs/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/libs/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/libs/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/css/estilos.css" rel="stylesheet">
    <!-- TEMPLATE END -->
	
	<!--edward-->
 	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">	

	<link href="<?php echo base_url(); ?>assets/template/css/custom.css" rel="stylesheet">





    <script src="<?php echo base_url(); ?>assets/assets/js/modernizr-custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/mega-dropdown/js/modernizr.js"></script>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11&appId=1864723207107336';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>

<body style="height: 100vh;">

    <header class="sliderss">

        <div class="rd-navbar-wrap">
            <nav class="rd-navbar">
                <div class="encabezado">

                </div> <!-- header -->
                <!-- * Tag navbar -->
                <div class="rd-navbar-outer">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel-canvas"></div>
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-2">
                                    <a href="<?php echo base_url('dashboard'); ?>">
                                        <img src="<?php echo base_url(); ?>uploads/<?php echo ConfiguracoesSistema('logo'); ?>" alt="Logo" class="img-fluid rd-navbar-brand" width="180">
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <div class="rd-navbar-menu-wrap">
                                        <div class="rd-navbar-nav-wrap">
                                            <ul class="rd-navbar-nav list-unstyled mb-0">

                                                <li><a href="<?php echo base_url('dashboard'); ?>"><?php echo lang('menu_item1')?></a></li>
                                                <li><a href="<?php echo base_url('plans'); ?>" class="<?php echo (isset($active) && $active == 'planos') ? 'bg-linear-active' : ''; ?>"><?php echo lang('menu_item2')?></a></li>



                                                <li><a href="#about"><?php echo lang('menu_item3')?></a>

                                                    <!-- RD Navbar Dropdown -->
                                                    <ul class="rd-navbar-dropdown twodrop list-unstyled">
                                                        <!--<li><a href="<?php //echo base_url('pending'); ?>"><?php //echo lang('menu_item4')?></a></li>-->
                                                        <!-- <li><a href="<?php //echo base_url('rede'); ?>">Binary Network</a></li> -->
                                                        <li><a href="<?php echo base_url('network'); ?>"><?php echo lang('menu_item5')?></a></li>
                                                        <!--<li><a href="<?php //echo base_url('pontos'); ?>">Points</a></li>
                                                        <li><a href="<?php //echo base_url('chave'); ?>">Chave Binária</a></li>-->
                                                        <li><a href="<?php echo base_url('carreira'); ?>"><?php echo lang('menu_item6')?></a></li>

                                                    </ul>
                                                    <!-- END RD Navbar Dropdown -->

                                                </li>
                                                <li>
                                                    <!-- submenu -->
                                                    <a href="#" class="<?php echo (isset($active) && $active == 'financeiro') ? 'bg-linear-active' : ''; ?>"><?php echo lang('menu_item7')?></a>
                                                    <ul class="rd-navbar-dropdown list-unstyled">
                                                    	<li><a href="<?php echo base_url('invoices'); ?>">Invoices</a></li>


                                         
                                                        <li><a href="<?php echo base_url('reports'); ?>">Reports</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?php echo base_url('ticket'); ?>"><?php echo lang('menu_item8')?></a></li>
												<li><a href="#about"><i class="fa-solid fa-globe"></i></a>
                                                
                                                    <ul class="rd-navbar-dropdown list-unstyled">
                                                        <li><a href="<?php echo base_url('CambiarIdioma/lenguaje')?>/english"><img src="<?php echo base_url(); ?>assets/imgs/flags/united_kingdom.png"> English</a></li>
                                                        <li><a href="<?php echo base_url('CambiarIdioma/lenguaje')?>/chinese"><img src="<?php echo base_url(); ?>assets/imgs/flags/china_flags.png"> Chinese</a></li>
														
                                                        <li><a href="<?php echo base_url('CambiarIdioma/lenguaje')?>/korean"><img src="<?php echo base_url(); ?>assets/imgs/flags/korean_flags.png"> Korean</a></li>
														
                                                        <li><a href="<?php echo base_url('CambiarIdioma/lenguaje')?>/spanish"><img src="<?php echo base_url(); ?>assets/imgs/flags/spain_flags.png"> Spanish</a></li>
                                                        <li><a href="<?php echo base_url('CambiarIdioma/lenguaje')?>/portuguese"><img src="<?php echo base_url(); ?>assets/imgs/flags/brazil_flags.png"> Portuguese</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <!-- submenu -->
                                                    <a href="#">
                                                            <span class="mdi mdi-account">
                                                            <?php echo InformacoesUsuario('login') ?>
                                                        </span>
                                                    </a>
                                                    <ul class="rd-navbar-dropdown list-unstyled">
                                                        <!--<li><a href="<?php //echo base_url('configuracoes'); ?>"><?php //echo lang('menu_item9')?></a>
                                                        </li>--->
                                                        <li>
                                                            <a href="<?php echo base_url('logout'); ?>">
                                                                <?php echo lang('menu_item10')?>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-3">


                                    <div class="rd-navbar-inner px-0">
                                        <div class="rd-navbar-panel py-0">
                                            <button class="rd-navbar-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-nav-wrap">
                                                <span></span>
                                            </button>






                                        </div> <!-- rd-navbar-inner -->
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!--header end-->

    <!--main content start-->
<div class="container">
<?php echo $contents; ?>
</div>
    <!--main content end-->

    <!--footer start-->
    <div id="footer" class="ui-footer">
        <!-- <?php echo date('Y'); ?> &copy; <?php echo ConfiguracoesSistema('nome_site'); ?> -->
    </div>
    <!--footer end-->

    <script>
        var baseURL = '<?php echo base_url(); ?>';

        <?php
        if (isset($active) && $active == 'dashboard') {

            if ($this->DashboardModel->PlanoAtivo() !== false) {

        ?>
                var data_inicio = '<?php echo $this->DashboardModel->PlanoAtivo(); ?>';
        <?php
            }
        }
        ?>
    </script>
    <!-- inject:js -->
     <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script> 
	
<script>
	
/*change table color*/
if( $('table.marketTable').length ){	
	setInterval(function() {

		/**/
		if ( $('#td1 span').hasClass("txtMarkGreen") ) { 	
			$('#td4 span').addClass("txtMarkGreen"); 

		}

		if( $('#td1 span').hasClass("txtMarkRed") ){
			$('#td4 span').addClass("txtMarkRed");
		}
		/**/
		
		/**/
		if ( $('#td6 span').hasClass("txtMarkGreen") ) { 	
			$('#td9 span').addClass("txtMarkGreen"); 

		}

		if( $('#td6 span').hasClass("txtMarkRed") ){
			$('#td9 span').addClass("txtMarkRed");
		}
		/**/
		
		/**/
		if ( $('#td11 span').hasClass("txtMarkGreen") ) { 	
			$('#td14 span').addClass("txtMarkGreen"); 

		}

		if( $('#td11 span').hasClass("txtMarkRed") ){
			$('#td14 span').addClass("txtMarkRed");
		}
		/**/
		
		/**/
		if ( $('#td16 span').hasClass("txtMarkGreen") ) { 	
			$('#td19 span').addClass("txtMarkGreen"); 

		}

		if( $('#td16 span').hasClass("txtMarkRed") ){
			$('#td19 span').addClass("txtMarkRed");
		}
		/**/
		
		/**/
		if ( $('#td21 span').hasClass("txtMarkGreen") ) { 	
			$('#td24 span').addClass("txtMarkGreen"); 

		}

		if( $('#td21 span').hasClass("txtMarkRed") ){
			$('#td24 span').addClass("txtMarkRed");
		}
		/**/


	}, 100);	
	
}	
	
	
	
	
/*change table color*/		
</script>	
	
	
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/autosize/dist/autosize.min.js"></script>
    <!-- endinject -->

    <!--horizontal-timeline-->
    <script src="<?php echo base_url(); ?>assets/assets/js/horizontal-timeline/js/jquery.mobile.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/horizontal-timeline/js/main.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/js/modernizr-custom.js"></script>

    <!-- Common Script   -->
    <script src="<?php echo base_url(); ?>assets/dist/js/main.js"></script>

    <!--Mega Dropdown Menu js-->
    <script src="<?php echo base_url(); ?>assets/assets/js/mega-dropdown/js/jquery.menu-aim.js"></script> <!-- menu aim -->
    <script src="<?php echo base_url(); ?>assets/assets/js/mega-dropdown/js/main.js"></script>

    <script src="<?php echo base_url(); ?>assets/pages/geral.js"></script>




    <!--TEMPLATE SCRIPT START-->
    <script src="<?php echo base_url(); ?>assets/template/libs/popper.js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/libs/rd-navbar/dist/js/jquery.rd-navbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/libs/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/libs/aos/aos.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/libs/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url(); ?>assets/pages/cliente/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/pages/cliente/chartProfit.js"></script>
    <script src="https://kit.fontawesome.com/eac9696490.js" crossorigin="anonymous"></script>
	
	
	
    <script src="<?php echo base_url(); ?>assets/template/js/mis-scripts.js"></script>
	    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <!--TEMPLATE SCRIPT END-->
	
	
<!--== edward ==-->	
<script>
 
	
	
/*hide notification*/
	
$("#closeNoti").on('click', function () {
    $("#notiSystem").hide(); 
});	
	
/*hide notification*/	
	
	
/*withdrawals*/
if( $('select.timeSaque').length ){
	
	$('select.timeSaque').on('change', function() {
		
		let timeText = $( "select.timeSaque option:selected" ).text();
		$( "#timeText" ).val(timeText);
		console.log(timeText)
	});
	
}
	
/*withdrawals*/	
	
</script>
<!--== edward ==-->	





    <?php
    if (isset($jsLoader)) {

        foreach ($jsLoader as $type => $script) {

            $link = ($type === 'external') ? $script : base_urL($script);

            echo '<script src="' . $link . '"></script>';
        }
    }
    ?>
	

    <script>
        $.extend($.fn.dataTable.defaults, {
            responsive: true
        });

        $(document).ready(function() {
            $('#tblDateEx').DataTable();
			$('.tableUSers').dataTable( {
			  "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ]
			} );
        });
    </script>




</body>

</html>