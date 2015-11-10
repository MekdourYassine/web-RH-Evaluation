<style type="text/css">
    #partner {
  background: url(images/partners/partner_bg.png) 50% 50% no-repeat;
  background-size: cover;
  color: #fff;
  text-align: center;
  padding: 70px 0;
 
}
    h1 {
    }

 
</style>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

  <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-7">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" style="color: #fff; ">Bienvenue sur le portail d’évaluation</h1>
                                    <h2 class="animation animated-item-2" style="margin-left:40px;color :cornsilk;">Ce portail vous permettra d’acquérir des compétences en vous entraînant et en passant des tests d’évaluation.</h2>
                                    
                                </div>
                            </div>

                            <div class="col-sm-5 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-7">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" style="color : #fff;">Evaluez-vous et suivez votre performance et vos progrès</h1>
                                    <h2 class="animation animated-item-2" style="margin-left:40px;color :cornsilk;">Le portail d’évaluation en ligne vous permet de vous évaluer en ligne, à travers des questionnaires d'évaluation et dans plusieurs domaines.</h2>
                                    
                                </div>
                            </div>

                            <div class="col-sm-5 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-7">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" style="color : #fff;">Vous êtes une entreprise ?</h1>
                                    <h2 class="animation animated-item-2" style="margin-left:40px;color :cornsilk;">Ce portail vous permet de proposer des évaluations à vos employés, sur des sujets métiers ainsi que sur des sujets spécifiques à votre entreprise.</h2>
                                    
                                </div>
                            </div>
                            <div class="col-sm-5 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->


    <br>
    <br>

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>EVALUATION</h2>
                <p class="lead">Vous pouvez accéder à certains tests d’évaluation sans avoir besoin de vous connecter <br> pour accéder à vos résultats et autres parties, vous devrez vous inscrire.</p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/dse-desk.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">    
                                <h3><a href="?r=entrainement/ViewEntrainPub"> ENTRAÎNEMENT </a></h3>
                                <p>Je souhaite passer un questionnaire d’entraînement</p>
                                <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> Cliquer Ici</a>
                            </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/18802.jpg" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="?r=test/viewTestPub"> TEST D'EVALUATION </a></h3>
                                <p>Je souhaite passer un test d’evaluation</p>
                                <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> Cliquer Ici</a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/COMPETION-1.jpg" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="?r=competition/indexCompPub"> CERTIFICATION </a></h3>
                                <p>Je souhaite Voir la liste des compétition</p>
                                <a class="preview" href="?r=competition/indexCompPub" rel=""><i class="fa fa-eye"></i> Cliquer Ici</a>
                            </div> 
                        </div>
                    </div>
                </div>   

                </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->
 <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <br>
                 <h2>NOS PARTENAIRES</h2>
                <p class="lead">Nos consultants collaborent avec des partenaires reconnus.</p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                </ul>
            </div>
            <div>
                <br>
            </div>
           </div><!--/.container-->
    </section><!--/#partner-->
    <br>
    
<section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="widget">
                        <h3>Entreprise</h3>
                        <ul>
                            <li><a href="#">A propos</a></li>
                            <li><a href="#">Conditions d'utilisation</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact</a></li>
                           
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 col-sm-4">
                    <div class="widget">
                        <h3>Evaluation</h3>
                        <ul>
                            <li><a href="#">Modules</a></li>
                            <li><a href="#">Entraînement</a></li>
                            <li><a href="#">Test</a></li>
                            <li><a href="#">Compétition</a></li>
                            
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                
                <div class="col-md-4 col-sm-4">
                    <div class="widget">
                        <h3>Nos Partenaires</h3>
                        <ul>
                            <li><a href="#">ANDPEt</a></li>
                            <li><a href="#">Le monde des 5 fleurs</a></li>
                            <li><a href="#">abcd</a></li>
                            <li><a href="#">BouribiatAssociés</a></li>
                                                  </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->
    <br>
    
   