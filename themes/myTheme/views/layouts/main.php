
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
        <meta name="language" content="fr" >


        <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'/>

<script type="text/javascript" src="themes/myTheme/js/jquery.js"></script>
<!--<link rel="stylesheet" type="text/css" href="themes/myTheme/css/animate-custom.css" />-->


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <header>
            <div id="top">
                <div class="square orange"></div>
                <div class="square yellow"></div>
                <div class="square pink"></div>
                <p class="service">Service du sang</p>
                <p class="appName">Ness El Khir Groupe Sanguin</p>
            </div>
        </header>
        <div class="container" id="page">
            <div id="header">
                <div id="logo">
<?php if (!strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')): ?>
                    <div id="letter-container" class="letter-container">
                        <h2><a href="#">NSkGS</a></h2>
                        <p>Ness El Khir Groupe Sanguin</p>
                    </div>

<?php else : ?>
<div id="letter-container" class="letter-container">

                        <p>Ness El Khir Groupe Sanguin</p>
                    </div>
<?php endif ; ?>
                    <div class="logoImg">
                        <a href="?r=site/index">
                            <img src="themes/myTheme/images/header4.png" alt="header" width="55%"/>
                        </a>  
                    </div>
                </div>
            </div><!-- header -->
         
            <?php if (Yii::app()->user->isGuest): ?>
                <div id="fdw">
                    <!--nav-->
                    <nav>
                        <ul>
                            <li><a href="?r=site/index">Accueil<span class="arrow"></span></a></li>
                            <li><a href="?r=site/login"  >Se connecter</a></li>
                        </ul>
                    </nav>
                </div><!-- end fdw -->
            <?php else: ?>
                <div id="fdw">
                    <!--nav-->
                    <nav>
                        <ul>
                            <li><a href="?r=site/index">Accueil<span class="arrow"></span></a></li>
                            <li><a href="?r=donneur/recherche"  >Recherche</a></li>
                            <?php if (User::model()->find('username=\''.Yii::app()->user->name.'\'')->isAdministrator): ?>
                            <li><a href="?r=donneur/base"  >Base</a></li>
                            <li><a href="?r=user/admin"  >Utilisateur</a>
                                <ul style="display: none;" class="sub_menu">
                                    <li class="arrow_top"></li>
                                    <li><a href="?r=user/create">Créer</a></li>
                                    <li><a href="?r=user/admin">Gérer</a></li>
                                    <li><a href="?r=userLog/admin">Traces des utilisateurs</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li><a href="?r=site/logout"  >Se déconnecter (<?php echo Yii::app()->user->name; ?>)</a></li>
                        </ul>
                    </nav>
                </div><!-- end fdw -->
            <?php endif; ?>
            <?php echo $content; ?>



<script type="text/javascript" src="themes/myTheme/js/all.min.js"></script>
<script type="text/javascript" src="themes/myTheme/js/jquery.yiiactiveform.min.js"></script>

<script>
    $(function(){
       $('#toinscrit').click(function(){
           $('#login').fadeOut(1200);
         //  $('#register').css('opacity','1');
          // $('#register').css('display','none');
           $('#register').fadeIn(1200);
          // $('#login').css('opacity','0');
       });
       $('#toconnecter').click(function(){
           $('#register').fadeOut(1200);
          // $('#login').css('opacity','1');
          // $('#login').css('display','none');
           $('#login').fadeIn(1200);
          // $('#register').css('opacity','0');
       });
    });
    </script>
        </div><!-- page -->

        <div id="footer" style="font-size: 14px">
            Copyright &copy; <?php echo date('Y'); ?> par NSKGS.<br/>
            tous droits réservés..<br/>
        </div><!-- footer -->

    </body>
</html>


