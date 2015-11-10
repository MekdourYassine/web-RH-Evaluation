<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id_quest,
);

$this->menu=array(
array('label'=>'List Question','url'=>array('index')),
array('label'=>'Create Question','url'=>array('create')),
array('label'=>'Update Question','url'=>array('update','id'=>$model->id_quest)),
array('label'=>'Delete Question','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_quest),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Question','url'=>array('admin')),
);
?>

<h1>View Question #<?php echo $model->id_quest; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_quest',
		'id_module',
		'id_typeQuest',
		'enonce_quest',
		'duree_quest',
		'nbr_tentatives_quest',
),
)); ?>
