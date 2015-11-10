<style type="text/css">
#recent-works .col-xs-12.col-sm-4.col-md-2 {
    padding: 0;
    margin-left: 1%;
    margin-right: 1%;
    margin-bottom: 1%;
    margin-top: 1%;
}
   .recent-work-wrap {
 border:2px solid black;
 }

</style>

<div class="view">
     <div class="col-xs-12 col-sm-4 col-md-3">
                     <div class="carre_modules">
                        <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/31179.png" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                          <h3><a href=""> <?php echo CHtml::link(CHtml::encode($data->nom_entr),array('view_choix','id'=>$data->id_entr));   ?>
                              </a></h3>
                        

                                  
        <div class="module_desc">
        <br>
        <b><?php echo CHtml::encode($data->getAttributeLabel('nom_entr')); ?>:</b>
	<?php echo CHtml::encode($data->nom_entr); ?>
	<br />
        <br/>
	<b><?php echo CHtml::encode($data->getAttributeLabel('code_entr')); ?>:</b>
	<?php echo CHtml::encode($data->code_entr); ?>
	<br />
        <br/>
	<b><?php echo CHtml::encode($data->getAttributeLabel('domaine_entr')); ?>:</b>
	<?php echo CHtml::encode($data->domaine_entr); ?>
	<br />
        <br/>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_tel_entr')); ?>:</b>
	<?php echo CHtml::encode($data->num_tel_entr); ?>
	<br />
        <br/>
       </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   

             </div>   
</div>
    </div>