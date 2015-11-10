<style type="text/css">
   .recent-work-wrap {
 border:2px solid black;
 }
 
 .carre_modules .recent-work-wrap .overlay1 {
  height: 30% !important;
}


</style>


<div class="view">
     <div class="col-xs-12 col-sm-4 col-md-2">
         <div class="carre_modules">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/portfolio/recent/18802.jpg" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                          <h3>Test N°=<a href=""><?php
                          if (Yii::app()->user->checkAccess('user_entr') || Yii::app()->user->checkAccess('public') )  : 
                          {
                          echo CHtml::link(CHtml::encode($data->id_test),array('viewTestUser','id_test'=>$data->id_test));
                          } else: 
                           {
                           echo CHtml::link(CHtml::encode($data->id_test),array('view','id'=>$data->id_test));
                           }
                            endif;
                       ?>
                              </a></h3>
                        
        <div class="module_desc">
	<b><?php echo CHtml::encode($data->getAttributeLabel('duree_test')); ?>:</b>
	<?php echo CHtml::encode($data->duree_test); ?>
	<br />

	<b> Note minimale(/20):</b>
	<?php echo CHtml::encode($data->note_min_test); ?>
	<br />
        <b> Créer par:</b>
	<?php echo CHtml::encode($data->auteur_test); ?>
	<br />



                            </div> 
        </div>              
                            </div> 
                        </div>
                    </div>
                </div>   
         </div>
                
</div>