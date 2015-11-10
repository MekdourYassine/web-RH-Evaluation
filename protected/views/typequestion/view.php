<?php
/* @var $this TypequestionController */
/* @var $model Typequestion */

$this->breadcrumbs=array(
	'Typequestions'=>array('index'),
	$model->id_typeQuest,
);

$this->menu=array(
	array('label'=>'List Typequestion', 'url'=>array('index')),
	array('label'=>'Create Typequestion', 'url'=>array('create')),
	array('label'=>'Update Typequestion', 'url'=>array('update', 'id'=>$model->id_typeQuest)),
	array('label'=>'Delete Typequestion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_typeQuest),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Typequestion', 'url'=>array('admin')),
);
?>

<h1>View Typequestion #<?php echo $model->id_typeQuest; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_typeQuest',
		'typeQuest',
	),
)); ?>
