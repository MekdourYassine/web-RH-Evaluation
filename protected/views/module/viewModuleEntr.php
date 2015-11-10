<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->id_module,
);

?>


<h1> Module :<?php echo $model->nom_module; ?></h1>
<div class="row">
    <div class="">
        <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
                        'nom_module',
                        'sous_titre_module',
                        'desc_module',
        ),
        )); ?>
    </div>
    </div>
</div>