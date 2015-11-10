<?php
Yii::app()->clientscript
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.min.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/font-awesome.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/animate.min.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/prettyPhoto.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/responsive.css')
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.prettyPhoto.js')
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.isotope.min.js')
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/main.js')
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/wow.min.js')
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.countdown.min.js')
        
        ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.pulsate.min.js')
       ->registerScriptFile(Yii::app()->theme->baseUrl . '/js/highcharts.js')
        
//->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
// use it when you need it!
/*
  ->registerCoreScript( 'jquery' )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
  ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="fr">
        <link rel="shortcut icon" href="icon.png">
        <title>Portail d'évaluation</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->


        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>

    <body>

        <header id="header">
            
            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if (Yii::app()->user->isGuest): ?>

                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" width="300" height="75" alt="logo"></a>
                        <?php else: ?>
                        <?php if (Yii::app()->user->checkAccess('admin')): ?>
                        <a></a>
                        <?php else: ?>
                        <?php if (Yii::app()->user->checkAccess('user_entr')): ?>
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" width="250" height="65" alt="logo"></a>
                        <?php else: ?>
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" width="130" height="50" alt="logo"></a>
                        <?php endif;?>  
                        <?php endif;?>  
                        <?php endif;?>  
                        
                        </div>
                    <?php if (Yii::app()->user->isGuest): ?>

                        <div class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">

                                <li ><a href="index.php">Acceuil</a></li>
                                <li><a href="?r=site/login">Connexion</a></li>
                                <li><a href="?r=site/contact">Qui sommes-nous ?</a></li>
                                <li><a href="?r=site/contact">FAQ</a></li>
                                <li><a href="?r=site/contact">Contact</a></li>                        
                            </ul>
                        </div>
                    <a href="main.php"></a>
                    <?php else: ?>
                        <div class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">

                                <li><a href="index.php">Acceuil</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Compte <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('compte/update' , array('id'=>Yii::app()->user->id))?>">Profil</a></li>
                                        <li><a href="<?php echo $this->createUrl('compte/updatesecur' , array('id'=>Yii::app()->user->id))?>">Sécurité</a></li>
                                        <li><a href="<?php echo $this->createUrl('diplome/')?>">Diplômes et certifications </a></li>
                                        <li><a href="?r=exppro">Expériences profesionnelles </a></li>
                                    </ul>
                                </li>

                                <li><a href="?r=wdcalendar">Agenda</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Evaluation <i class="fa fa-angle-down"></i></a>
                                    <?php if (Yii::app()->user->checkAccess('public')) { ?>
                            
                                    <ul class="dropdown-menu">
                                     <li><a href="?r=module/index"> Modules</a></li>
                                     <li><a href="?r=competition/indexCompPub"> Compétitions publiques</a></li>
                                    
                                    </ul>
                                    </li>
                                    <li><a href="<?php echo $this->createUrl('compte/viewPerfoUsers' , array('id'=>Yii::app()->user->id))?>">Performance</a></li>
                                
                                    <?php } else {?>
                                    
                                    <?php if (Yii::app()->user->checkAccess('user_entr')){ ?>
                            
                                    <ul class="dropdown-menu">
                                    <li><a href="?r=module/index"> Liste Modules</a></li>
                                    </ul>
                                    </li>
                                    <li><a href="<?php echo $this->createUrl('compte/viewPerfoUsers' , array('id'=>Yii::app()->user->id))?>">Performance</a></li>
                                
                                    <?php } else {?>
                                    
                                     <?php if (Yii::app()->user->checkAccess('admin')){ ?>
                            
                                    <ul class="dropdown-menu">
                                        <li><a href="?r=module/create"> Créer Module</a></li>
                                        <li><a href="?r=module/index"> Liste Modules publics</a></li>
                                        <li><a href="?r=entreprise/indexModules"> Liste Modules entreprises</a></li>
                                    
                                    </ul>
                                    </li>
                                    
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                            <li><a href="?r=compte">Utilisateurs publics</a></li>
                                     
                                    </ul>
                                    </li>
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Performance<i class="fa fa-angle-down"></i></a>
                                    <ul  class="dropdown-menu">
                                        <li><a href="?r=entreprise/indexPerfo" >Entreprises</a></li>
                                        <li><a href="?r=entreprise/view_choix_pub"> Publics</a></li>
                                    </ul>
                                    
                                    </li>
                                        
                                    <?php } else {?>
     
                                    <?php if (Yii::app()->user->checkAccess('admin_entr')){ ?>
                            
                                    <ul class="dropdown-menu">
                                        <li><a href="?r=module/create"> Créer Module</a></li>
                                        <li><a href="?r=module/index"> Liste Modules</a></li>
                                        <li><a href="?r=module/indexComp"> Compétitions</a></li>
        
                                    </ul>
                                     </li>
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Performance<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="?r=module/index_perfo"> Par module</a></li>
                                        <li><a href="?r=compte/index_perfo"> Par utilisateur</a></li>
                                    </ul>
                                    </li>
                                    <?php } }}}?>
     
                                    
                                    
                                    <?php if (Yii::app()->user->checkAccess('admin_entr')) { ?>
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="?r=site/inviter">Inviter Utilisateur</a></li>
                                         <li><a href="?r=compte">Liste Utilisateurs</a></li>
                                     
                                        </ul>
                                       </li>

                                    <?php }?>
                                       
                                       <?php if (Yii::app()->user->checkAccess('admin')){ ?>
                                        <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entreprises<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="?r=entreprise/create">Créer entreprise</a></li>
                                        <li><a href="?r=site/inviter">Inviter administrateurs</a></li>
                                        <li><a href="?r=entreprise">Liste entreprises</a></li>
                                   
                                        </ul>
                                       </li>

                                       <?php }else { ?>

                                    <?php if (Yii::app()->user->checkAccess('admin_entr')): ?>
                                   
                                    <li><a href="?r=site/contact">Contact</a></li>
                                    <?php endif ;?>
                                
                                    <?php if (Yii::app()->user->checkAccess('user_entr')): ?>
                                   
                                    <li><a href="?r=site/contact">Contact</a></li>
                                    <?php endif ;?>
                                
                                <?php if (Yii::app()->user->checkAccess('public')): ?>
                                   
                                <li><a href="?r=site/contact">Contact</a></li>
                                <?php endif ;?>
                                
                                       <?php }?>
                                <li><a href="?r=site/logout"  >Se déconnecter (<?php echo Yii::app()->user->name; ?>)</a></li>

                            </ul>
                        </div>
                    <?php endif ?>


                </div><!--/.container-->
            </nav><!--/nav-->

        </header><!--/header-->

        <div id="mainContent" class="container" >
            <?php echo $content ?>
        </div>
        
        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                    </div>
                    <div class="col-sm-5">
                        <ul class="pull-right">
                            <li><a href="?r=site/contact">Qui sommes-nous ?</a></li>
                            <li><a href="?r=site/contact">FAQ</a></li>     
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
 </body>
</html>
