<style type="text/css">
   .recent-work-wrap {
 border:2px solid black;
 }

</style>


<div class="view col-xs-6 col-sm-4 col-md-3">
                <div class="carre_modules">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/39326.png" alt="">
                         <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                <h3><a href=""><?php 
                                            echo CHtml::link(CHtml::encode($data->nom_module),array('viewModuleEntr','id'=>$data->id_module));
                                ?> </a></h3>
                                 <div class="module_desc">
                               
                                <?php echo CHtml::encode($data->sous_titre_module); ?>
                                <br />

                                <b><?php echo CHtml::encode($data->getAttributeLabel('desc_module')); ?>:</b>
                                <?php echo CHtml::encode($data->desc_module); ?>
                                 </div>
                                    
                            </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>
  

                
</div>
