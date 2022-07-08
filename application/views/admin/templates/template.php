<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ConfiguracoesSistema('nome_site');?> - Administrativo</title>
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">


    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/themify-icons/css/themify-icons.css">
    <!-- endinject -->

    <!-- Main Style  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/main.css">

    <!--bootstrap sub menu-->
    <link href="<?php echo base_url();?>assets/assets/js/bootstrap-submenu/css/bootstrap-submenu.css" rel="stylesheet">

    <!--horizontal-timeline-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/js/horizontal-timeline/css/style.css">


    <script src="<?php echo base_url();?>assets/assets/js/modernizr-custom.js"></script>

    <!-- notify -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/needim/noty/lib/noty.css">
    
    <!-- sweet alert 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.css">
        

    <!-- data table -->
    <link href="<?php echo base_url();?>assets/bower_components/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/pages/admin/custom-admin.css" rel="stylesheet">
    
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    



    <script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
    
</head>
<body>

    <div id="ui" class="ui ui-aside-none">

        <!--header start-->
        <header id="header" class="ui-header">
            <div class="row">
                
                <div class="col-md-1">
                    <!-- GTranslate: https://gtranslate.io/ -->
                    <a href="#" onclick="doGTranslate('pt|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('pt|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('pt|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('pt|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('pt|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('pt|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('pt|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

                    <style type="text/css">
                    <!--
                    a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
                    a.gflag img {border:0;}
                    a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
                    #goog-gt-tt {display:none !important;}
                    .goog-te-banner-frame {display:none !important;}
                    .goog-te-menu-value:hover {text-decoration:none !important;}
                    body {top:0 !important;}
                    #google_translate_element2 {display:none!important;}
                    -->
                    </style>

                    <br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="pt|af">Afrikaans</option><option value="pt|sq">Albanian</option><option value="pt|ar">Arabic</option><option value="pt|hy">Armenian</option><option value="pt|az">Azerbaijani</option><option value="pt|eu">Basque</option><option value="pt|be">Belarusian</option><option value="pt|bg">Bulgarian</option><option value="pt|ca">Catalan</option><option value="pt|zh-CN">Chinese (Simplified)</option><option value="pt|zh-TW">Chinese (Traditional)</option><option value="pt|hr">Croatian</option><option value="pt|cs">Czech</option><option value="pt|da">Danish</option><option value="pt|nl">Dutch</option><option value="pt|en">English</option><option value="pt|et">Estonian</option><option value="pt|tl">Filipino</option><option value="pt|fi">Finnish</option><option value="pt|fr">French</option><option value="pt|gl">Galician</option><option value="pt|ka">Georgian</option><option value="pt|de">German</option><option value="pt|el">Greek</option><option value="pt|ht">Haitian Creole</option><option value="pt|iw">Hebrew</option><option value="pt|hi">Hindi</option><option value="pt|hu">Hungarian</option><option value="pt|is">Icelandic</option><option value="pt|id">Indonesian</option><option value="pt|ga">Irish</option><option value="pt|it">Italian</option><option value="pt|ja">Japanese</option><option value="pt|ko">Korean</option><option value="pt|lv">Latvian</option><option value="pt|lt">Lithuanian</option><option value="pt|mk">Macedonian</option><option value="pt|ms">Malay</option><option value="pt|mt">Maltese</option><option value="pt|no">Norwegian</option><option value="pt|fa">Persian</option><option value="pt|pl">Polish</option><option value="pt|pt">Portuguese</option><option value="pt|ro">Romanian</option><option value="pt|ru">Russian</option><option value="pt|sr">Serbian</option><option value="pt|sk">Slovak</option><option value="pt|sl">Slovenian</option><option value="pt|es">Spanish</option><option value="pt|sw">Swahili</option><option value="pt|sv">Swedish</option><option value="pt|th">Thai</option><option value="pt|tr">Turkish</option><option value="pt|uk">Ukrainian</option><option value="pt|ur">Urdu</option><option value="pt|vi">Vietnamese</option><option value="pt|cy">Welsh</option><option value="pt|yi">Yiddish</option></select><div id="google_translate_element2"></div>
                    <script type="text/javascript">
                    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'pt',autoDisplay: false}, 'google_translate_element2');}
                    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2">
                    </script>


                    <script type="text/javascript">
                    /* <![CDATA[ */
                    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
                    /* ]]> */
                    </script>
                </div>
                <div class="col-md-1">                    
                </div>
                <div class="col-md-8">
                    <div class="navbar-header">
                            <!--logo start-->

                            <a href="<?php echo base_url('admin');?>" class="navbar-brand">
                                <span class="logo"><img src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" width="130px" alt=""/></span>
                            </a>
                            <!--logo end-->
                    </div>
                    <div class="navbar-collapse nav-responsive-disabled">

                            <!--notification start-->
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" id="aba_notificacoes_admin" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bell-o"></i>
                                        <?php if($this->UsuarioModel->QuantidadeNotificacoesAdmin() > 0){ echo '<span class="badge" id="quantidade_notificacoes_pendentes_admin">'.$this->UsuarioModel->QuantidadeNotificacoesAdmin().'</span>'; } ?>
                                    </a>
                                    <!--dropdown -->
                                    <ul class="dropdown-menu dropdown-menu--responsive">
                                        <div class="dropdown-header">Notificações (<span id="total_notificacoes_pendentes_admin"><?php echo $this->UsuarioModel->QuantidadeNotificacoesAdmin();?></span>)</div>
                                        <ul class="Notification-list Notification-list--small niceScroll list-group">
                                            <?php
                                            if($this->UsuarioModel->MinhasNotificacoesAdmin() !== false){
                                                foreach($this->UsuarioModel->MinhasNotificacoesAdmin() as $notificacao){
                                            ?>
                                            <li class="Notification list-group-item">
                                                <a href="">
                                                    <div class="Notification__avatar Notification__avatar--danger pull-left" href="">
                                                        <i class="Notification__avatar-icon fa fa-exclamation"></i>
                                                    </div>
                                                    <div class="Notification__highlight">
                                                        <p class="Notification__highlight-excerpt"><b><?php echo $notificacao->mensagem;?></b></p>
                                                        <p class="Notification__highlight-time"><?php echo TempoAtras(strtotime($notificacao->data));?></p>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <div class="dropdown-footer"><a href="<?php echo base_url('admin/notificacoes/admin');?>">Ver todas</a></div>
                                    </ul>
                                    <!--/ dropdown -->
                                </li>

                                <li class="dropdown dropdown-usermenu">
                                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <span class="hidden-sm hidden-xs"><?php echo InformacoesUsuario('nome', $this->session->userdata('uid_admin'));?></span>
                                        <!--<i class="fa fa-angle-down"></i>-->
                                        <span class="caret hidden-sm hidden-xs"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                        <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--notification end-->

                        </div>
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>

        </header>
        <!--header end-->

        <!--nav start-->
        <nav class="navbar navbar-inverse yamm navbar-default hori-nav " role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">

                            <!--toggle bar for responsive star-->
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--toggle bar for responsive end-->

                        </div>

                        <div class="collapse navbar-collapse" id="main-navigation">
                            <ul class="nav navbar-nav">
                                <?php foreach($rolescero as $rol):?>
                                    
                                    <?php if($rol->nivel == 0){ ?>
                                    <li class="dropdown">
                                        <a href="<?php echo site_url($rol->link);?>" class="dropdown-toggle"><?=$rol->opcion?></a>
                                    </li>
                                    <?php }?>

                                    <?php if($rol->nivel == 1){ ?>
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-submenu>
                                            <?=$rol->opcion?> <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <?php 
                                        
                                        $rolesUser = opcionesRoles($rol->id,$roles);                                          
                                        foreach($rolesUser as $rolOpcion)
                                        {
                                            if($rolOpcion->rama == 0)
                                            {
                                            ?>                                            
                                                <li><a href="<?php echo site_url($rolOpcion->link);?>" class="dropdown-toggle"><?=$rolOpcion->opcion?></a></li>
                                            <?php 
                                            }
                                            if( $rolOpcion->rama == 1)
                                            {?>
                                                <li class="dropdown-submenu">
                                                    <a tabindex="0"><?=$rolOpcion->opcion?></a>
                                                    <ul class="dropdown-menu">
                                                        <?php $rolesUser2 = opcionesRoles($rolOpcion->id,$roles); 
                                                        foreach($rolesUser2 as $rolOpcion2)
                                                        {
                                                        ?>
                                                        <li><a href="<?php echo site_url($rolOpcion2->link);?>" tabindex="0"><?=$rolOpcion2->opcion?></a></li>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </ul>
                                                </li>                                            
                                            <?php
                                            }
                                             
                                        }
                                        ?>
                                        </ul>
                                    </li>
                                    <?php }?>
                                <?php endforeach?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!--nav end-->
        <?php echo $contents;?>

<!--footer start-->
        <div id="footer" class="ui-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo date('Y');?> &copy; <?php echo ConfiguracoesSistema('nome_site');?>.
                    </div>
                </div>
            </div>
        </div>
        <!--footer end-->

    </div>

    <script>
    var baseURL = '<?php echo base_url();?>';
    </script>

    <!-- inject:js -->
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/autosize/dist/autosize.min.js"></script>
    <!-- endinject -->

    <!--bootstrap-submenu & dropdown-->
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap-submenu/js/bootstrap-submenu.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap-hover-dropdown.js"></script>

    <script>
        $(document).ready(function () {

            // yamm mega menu

            $(document).on('click', '.yamm .dropdown-menu', function(e) {
                e.stopPropagation()
            });

            //bootstrap sub menu

            $('[data-submenu]').submenupicker();


        });
    </script>

    
    <!-- Common Script   -->
    <script src="<?php echo base_url();?>assets/dist/js/main.js"></script>

    <script src="<?php echo base_url();?>assets/pages/geral.js"></script>

    <?php
        if(isset($jsLoader)){

            foreach($jsLoader as $type=>$script){

                $link = ($type === 'external') ? $script : base_urL($script);

                echo '<script src="'.$link.'"></script>';
            }
        }
        ?>
    
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>    
    
    

<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>          
      
      
<script>
$(document).ready(function() {
    $("#fileuploader").uploadFile({
        url:"<?php echo base_url();?>assets/imgs/upload.php",
        multiple:false,
        dragDrop:true,
        maxFileCount:1,
        allowedTypes: "jpg,jpeg,gif,png",
        fileName:"myfile",
        returnType:"json",
            onLoad:function(obj)
            {
                    //$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Widget Loaded:");
                //$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
            },
            onSuccess:function(files,data,xhr,pd)
            {

                $("#eventsmessage").html($("#eventsmessage").html()+"<br/><img src='<?php echo base_url();?>assets/imgs/plan/"+data+"' height='100px' width='100px'> ");
                $("#img").val(data);
                $("#img_actual").hide();

            },
            afterUploadAll:function(obj)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>File Loaded Correctly");


            },
            onError: function(files,status,errMsg,pd)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>File upload failed: "+JSON.stringify(files));
            },
            onCancel:function(files,pd)
            {
                    $("#eventsmessage").html($("#eventsmessage").html()+"<br/>File upload was canceled: "+JSON.stringify(files));
            }
    });
    
        
     
});
</script>   
    

</body>
</html>
