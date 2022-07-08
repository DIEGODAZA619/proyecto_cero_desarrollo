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

                </div> <!-- encabezado -->
                <!-- * Etiqueta hermana del contenido desplegable-->
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

                                                <li><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                                                <li><a href="<?php echo base_url('plans'); ?>" class="<?php echo (isset($active) && $active == 'planos') ? 'bg-linear-active' : ''; ?>">Plans</a></li>



                                                <li><a href="#about">Network</a>

                                                    <!-- RD Navbar Dropdown -->
                                                    <ul class="rd-navbar-dropdown twodrop list-unstyled">
                                                        <li><a href="<?php echo base_url('pending'); ?>">Pending</a></li>
                                                        <!-- <li><a href="<?php //echo base_url('rede'); ?>">Binary Network</a></li> -->
                                                        <li><a href="<?php echo base_url('network'); ?>">Binary Network</a></li>
                                                        <!--<li><a href="<?php //echo base_url('pontos'); ?>">Points</a></li>
                                                        <li><a href="<?php //echo base_url('chave'); ?>">Chave Binária</a></li>-->
                                                        <li><a href="<?php echo base_url('carreira'); ?>">Career Plans</a></li>

                                                    </ul>
                                                    <!-- END RD Navbar Dropdown -->

                                                </li>
                                                <li>
                                                    <!-- crando un submenu -->
                                                    <a href="#" class="<?php echo (isset($active) && $active == 'financeiro') ? 'bg-linear-active' : ''; ?>">Finance</a>
                                                    <ul class="rd-navbar-dropdown list-unstyled">
                                                    <!--    <li><a href="<?php echo base_url('invoices'); ?>">Invoices</a></li>-->


                                                        <!-- <li><a href="#">Withdraws</a></li> -->
                                                        <!-- <li><a href="<?php echo base_url('reports'); ?>">Reports</a></li> -->
                                                    </ul>
                                                </li>
                                                <li><a href="<?php echo base_url('ticket'); ?>">Support/Ticket</a></li>
												                                                <li><a href="#about"><i class="fa-solid fa-globe"></i></a>

                                                    <!-- RD Navbar Dropdown -->
                                                    <ul class="rd-navbar-dropdown twodrop list-unstyled">

                                                        <!-- GTranslate: https://gtranslate.io/ -->
                                                        <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

                                                        <style type="text/css">
                                                           
                                                            a.gflag {
                                                                vertical-align: middle;
                                                                font-size: 20px;
                                                                padding: 1px 0;
                                                                background-repeat: no-repeat;
                                                                background-image: url(//gtranslate.net/flags/16.png);
                                                            }

                                                            a.gflag img {
                                                                border: 0;
                                                            }

                                                            a.gflag:hover {
                                                                background-image: url(//gtranslate.net/flags/16a.png);
                                                            }

                                                            #goog-gt-tt {
                                                                display: none !important;
                                                            }

                                                            .goog-te-banner-frame {
                                                                display: none !important;
                                                            }

                                                            .goog-te-menu-value:hover {
                                                                text-decoration: none !important;
                                                            }

                                                            body {
                                                                top: 0 !important;
                                                            }

                                                            #google_translate_element2 {
                                                                display: none !important;
                                                            }
                                                      
                                                        </style>

                                                        <br /><select onchange="doGTranslate(this);">
                                                            <option value="">Select Language</option>
                                                            <option value="en|af">Afrikaans</option>
                                                            <option value="en|sq">Albanian</option>
                                                            <option value="en|ar">Arabic</option>
                                                            <option value="en|hy">Armenian</option>
                                                            <option value="en|az">Azerbaijani</option>
                                                            <option value="en|eu">Basque</option>
                                                            <option value="en|be">Belarusian</option>
                                                            <option value="en|bg">Bulgarian</option>
                                                            <option value="en|ca">Catalan</option>
                                                            <option value="en|zh-CN">Chinese (Simplified)</option>
                                                            <option value="en|zh-TW">Chinese (Traditional)</option>
                                                            <option value="en|hr">Croatian</option>
                                                            <option value="en|cs">Czech</option>
                                                            <option value="en|da">Danish</option>
                                                            <option value="en|nl">Dutch</option>
                                                            <option value="en|en">English</option>
                                                            <option value="en|et">Estonian</option>
                                                            <option value="en|tl">Filipino</option>
                                                            <option value="en|fi">Finnish</option>
                                                            <option value="en|fr">French</option>
                                                            <option value="en|gl">Galician</option>
                                                            <option value="en|ka">Georgian</option>
                                                            <option value="en|de">German</option>
                                                            <option value="en|el">Greek</option>
                                                            <option value="en|ht">Haitian Creole</option>
                                                            <option value="en|iw">Hebrew</option>
                                                            <option value="en|hi">Hindi</option>
                                                            <option value="en|hu">Hungarian</option>
                                                            <option value="en|is">Icelandic</option>
                                                            <option value="en|id">Indonesian</option>
                                                            <option value="en|ga">Irish</option>
                                                            <option value="en|it">Italian</option>
                                                            <option value="en|ja">Japanese</option>
                                                            <option value="en|ko">Korean</option>
                                                            <option value="en|lv">Latvian</option>
                                                            <option value="en|lt">Lithuanian</option>
                                                            <option value="en|mk">Macedonian</option>
                                                            <option value="en|ms">Malay</option>
                                                            <option value="en|mt">Maltese</option>
                                                            <option value="en|no">Norwegian</option>
                                                            <option value="en|fa">Persian</option>
                                                            <option value="en|pl">Polish</option>
                                                            <option value="en|pt">Portuguese</option>
                                                            <option value="en|ro">Romanian</option>
                                                            <option value="en|ru">Russian</option>
                                                            <option value="en|sr">Serbian</option>
                                                            <option value="en|sk">Slovak</option>
                                                            <option value="en|sl">Slovenian</option>
                                                            <option value="en|es">Spanish</option>
                                                            <option value="en|sw">Swahili</option>
                                                            <option value="en|sv">Swedish</option>
                                                            <option value="en|th">Thai</option>
                                                            <option value="en|tr">Turkish</option>
                                                            <option value="en|uk">Ukrainian</option>
                                                            <option value="en|ur">Urdu</option>
                                                            <option value="en|vi">Vietnamese</option>
                                                            <option value="en|cy">Welsh</option>
                                                            <option value="en|yi">Yiddish</option>
                                                        </select>
                                                        <div id="google_translate_element2"></div>
                                                        <script type="text/javascript">
                                                            function googleTranslateElementInit2() {
                                                                new google.translate.TranslateElement({
                                                                    pageLanguage: 'pt',
                                                                    autoDisplay: false
                                                                }, 'google_translate_element2');
                                                            }
                                                        </script>
                                                        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


                                                        <script type="text/javascript">
                                                            /* <![CDATA[ */
                                                            eval(function(p, a, c, k, e, r) {
                                                                e = function(c) {
                                                                    return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                                                                };
                                                                if (!''.replace(/^/, String)) {
                                                                    while (c--) r[e(c)] = k[c] || e(c);
                                                                    k = [function(e) {
                                                                        return r[e]
                                                                    }];
                                                                    e = function() {
                                                                        return '\\w+'
                                                                    };
                                                                    c = 1
                                                                };
                                                                while (c--)
                                                                    if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                                                                return p
                                                            }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
                                                            /* ]]> */
                                                        </script>

                                                    </ul>
                                                    <!-- END RD Navbar Dropdown -->

                                                </li>
                                                <li>
                                                    <!-- crando un submenu -->
                                                    <a href="#">
                                                            <span class="mdi mdi-account">
                                                            <?php echo InformacoesUsuario('login') ?>
                                                        </span>
                                                    </a>
                                                    <ul class="rd-navbar-dropdown list-unstyled">
                                                        <li><a href="<?php echo base_url('configuracoes'); ?>">Profile</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url('logout'); ?>">
                                                                Logout
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
	
/*cambiar color a la tabla*/
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
	
	
	
	
/*cambiar color a la tabla*/		
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
/*traducir moneda* 
	
$("tr td span").text(function () {
    return $(this).text().replace("R$", "USD"); 
});
	
	
$(".detalle li").text(function () {
    return $(this).text().replace("R$", "ETH"); 
});
	
$(".detalle label b").text(function () {
    return $(this).text().replace("R$", "ETH"); 
});	
 
/*traducir moneda*/	
	
	
/*ocultar notificacion*/
	
$("#closeNoti").on('click', function () {
    $("#notiSystem").hide(); 
});	
	
/*ocultar notificacion*/	
	
	
/*retiros*/
if( $('select.timeSaque').length ){
	
	$('select.timeSaque').on('change', function() {
		
		let timeText = $( "select.timeSaque option:selected" ).text();
		$( "#timeText" ).val(timeText);
		console.log(timeText)
	});
	
}
	
/*retiros*/	
	
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

    <style>
        
    </style>	


</body>

</html>