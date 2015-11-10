<?php
$this->breadcrumbs=array(
	'Evenements'=>array('index'),
	$model->id_event=>array('view','id'=>$model->id_event),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Evenement','url'=>array('index')),
	array('label'=>'Create Evenement','url'=>array('create')),
	array('label'=>'View Evenement','url'=>array('view','id'=>$model->id_event)),
	array('label'=>'Manage Evenement','url'=>array('admin')),
	);
	?>

	<h1>Update Evenement <?php echo $model->id_event; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>