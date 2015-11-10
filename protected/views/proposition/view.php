<?php
$this->breadcrumbs=array(
	'Propositions'=>array('index'),
	$model->id_prop,
);

$this->menu=array(
array('label'=>'List Proposition','url'=>array('index')),
array('label'=>'Create Proposition','url'=>array('create')),
array('label'=>'Update Proposition','url'=>array('update','id'=>$model->id_prop)),
array('label'=>'Delete Proposition','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_prop),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Proposition','url'=>array('admin')),
);
?>

<h1>View Proposition #<?php echo $model->id_prop; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_prop',
		'id_quest',
		'desc_prop',
		'reponse',
),
)); ?>
