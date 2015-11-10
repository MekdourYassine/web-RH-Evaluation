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
                        <img class="img-responsive" src="images/portfolio/recent/item1.jpg" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                    
                                <h3><a href=""><?php
                                 if (Yii::app()->user->checkAccess('user_entr')){
                                     {echo CHtml::link(CHtml::encode($data->nom_comp),array('viewCompUser','id_comp'=>$data->id_comp));}
                                 }else {
                                     if (Yii::app()->user->checkAccess('admin_entr')) {
                                      echo CHtml::link(CHtml::encode($data->nom_comp),array('view','id'=>$data->id_comp));
                                        } else {
                                   echo CHtml::link(CHtml::encode($data->nom_comp),array('view_pub','id'=>$data->id_comp));
                                        
                                 }} ?>
                                 
                             	 </a></h3>


	<div class="module_desc">
                                
	<b>Entre :</b>
	<?php echo CHtml::encode($data->date_debut_comp); ?>
	<br />

	<b>ET : </b>
	<?php echo CHtml::encode($data->date_fin_comp); ?>
	<br />
        </div>
	                    </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   
     </div>
    
                
</div>
