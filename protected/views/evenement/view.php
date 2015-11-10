<?php
$this->breadcrumbs=array(
	'Evenements'=>array('index'),
	$model->id_event,
);

$this->menu=array(
array('label'=>'List Evenement','url'=>array('index')),
array('label'=>'Create Evenement','url'=>array('create')),
array('label'=>'Update Evenement','url'=>array('update','id'=>$model->id_event)),
array('label'=>'Delete Evenement','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_event),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Evenement','url'=>array('admin')),
);
?>

<h1>View Evenement #<?php echo $model->id_event; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_event',
		'id_compte',
		'libelle_event',
		'date_event',
),
)); ?>
