<style type="text/css">
#recent-works .col-xs-12.col-sm-4.col-md-3 {
    padding: 0;
    margin-left: 1%;
    margin-right: 1%;
    margin-bottom: 1%;
    margin-top: 1%;
}
.carre_modules .recent-work-wrap .overlay1 {
  height: 29% !important;
}

.recent-work-wrap {
 border:2px solid black;
 }

</style>


<div class="view">
     <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="carre_modules">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="images/exp1.jpg" alt="">
                        <div class="overlay overlay1">
                            <div class="recent-work-inner">
                                <div class="recent-work-inner">
                                    <h2>EXPERIENCE N° <a href=""><?php echo CHtml::link(CHtml::encode($data->id_exp_pro),array('view','id'=>$data->id_exp_pro)); ?></a></h2>

        <div class="module_desc">
	<b>Entre :</b>
	<?php echo CHtml::encode($data->date_debut_exp_pro); ?>
	<br />

	<b> Et :</b>
	<?php echo CHtml::encode($data->date_fin_exp_pro); ?>
	<br />

	<b>En: </b>
	<?php echo CHtml::encode($data->entreprise); ?>
	<br />

	<b>Secteur :</b>
	<?php echo CHtml::encode($data->secteur); ?>
	<br />

	<b>Fonction</b>
	<?php echo CHtml::encode($data->fonction); ?>
	<br />

                    </div> 
                      
                            </div> 
                        </div>
                    </div>
                </div>   
        </div>      
                
</div>
    </div>