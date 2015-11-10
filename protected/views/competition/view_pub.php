<style type="text/css">
#recent-works .col-xs-12.col-sm-4.col-md-2 {
padding: 0;
margin-left: 1%;
margin-right: 1%;
margin-bottom: 1%;
margin-top: 1%;
}
.summary
{
    display: none;
}
</style>




<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->id_comp,
);
?>

<section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">


                <h1>COMPETITION :<?php echo $model->nom_comp; ?></h1>
                <br>
                <h2> DE L'ENTREPRISE :<?php echo CHtml::link(CHtml::encode($entreprise->nom_entr),array('entreprise/viewPub','id'=>$entreprise->id_entr));?></h2>
                <br>
                <h3> DANS LE MODULE :<?php echo CHtml::link(CHtml::encode($module->nom_module),array('module/viewPub','id'=>$module->id_module));?> </h3>
                <br>

                <div>
                 Veuillez contactez l'entreprise pour plus de détail
                </div>
                
            </div>
        </div>
</section>
