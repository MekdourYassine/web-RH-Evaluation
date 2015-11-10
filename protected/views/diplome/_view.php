<style type="text/css">
.carre_modules .recent-work-wrap .overlay1 {
  height: 30% !important;
}

   .recent-work-wrap {
 border:2px solid black;
 }

</style>

<div class="view">
    <div class="carre_modules">
     <div class="col-xs-12 col-sm-4 col-md-2">
          
                        <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/diploma1.png" alt="">
                            <div class="overlay overlay1">
                                          <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                <h3><a href=""><?php echo CHtml::link(CHtml::encode($data->nom_diplome),array('view','id'=>$data->id_diplome)); ?>
	 </a></h3>
         <div class="module_desc">                            
	<b>Obtenu le :</b>
	<?php echo CHtml::encode($data->date_obtention); ?>
	<br />

	<b>Libelle :</b>
	<?php echo CHtml::encode($data->libelle_diplome); ?>
	<br />

	<b>Type :</b>
	<?php echo CHtml::encode($data->type_diplome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etablissement_diplome')); ?>:</b>
	<?php echo CHtml::encode($data->etablissement_diplome); ?>
	<br />
                                
                            </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   

              </div>
        </div>

</div>
