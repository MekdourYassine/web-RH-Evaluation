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
             <div class="carre_modules">
               
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/dse-desk1.png" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                <h3>Entraînement N°=<a href=""><?php
                                if (Yii::app()->user->checkAccess('user_entr')|| Yii::app()->user->checkAccess('public')):
                                echo CHtml::link(CHtml::encode($data->id_entrain),array('viewEntrainUser','id_entrain'=>$data->id_entrain));
                                else : 
                                      {
                                    echo CHtml::link(CHtml::encode($data->id_entrain),array('view','id'=>$data->id_entrain));
                                      }
                                endif;
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
