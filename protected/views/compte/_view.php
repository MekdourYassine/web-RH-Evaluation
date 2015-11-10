<style type="text/css">
.carre_modules .recent-work-wrap .overlay1 {
  height: 25% !important;
}
   .recent-work-wrap {
 border:2px solid black;
 }


</style>

<div class="view">
     <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="carre_modules">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/User-icon-1.png" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                <h3><a href=""><?php echo CHtml::link(CHtml::encode($data->nom, $data->prenom),array('view','id'=>$data->id_compte)); ?>
	 </a></h3>

        <div class="module_desc">
  	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	
	<b>Tel: </b>
	<?php echo CHtml::encode($data->numTel); ?>
	<br />

        </div>  
                                </div>                            
                            </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   

                
</div>
