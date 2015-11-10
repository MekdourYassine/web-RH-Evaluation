<style type="text/css">
.carre_modules .recent-work-wrap .overlay1 {
  height: 30% !important;
}
   .recent-work-wrap {
 border:2px solid black;
 }


</style>


<div class="view">
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div>
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/dse-desk1.png" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                <h3>Entraînement N°=<a href=""><?php
                                echo CHtml::link(CHtml::encode($data->id_entrain),array('viewPerfoUsersEntr','id_entrain'=>$data->id_entrain));
                                                                ?>
                    
                                    </a></h3>
                                    
                    <div class="module_desc">
  	                         
                    <b> Créé par: </b>
                       <?php echo CHtml::encode($data->auteur_entrain); ?>
                    <br />
                            </div> 
                    </div>            
                            </div> 
                        </div>
                    </div>
                </div>   
                </div>
                
</div>
