<?php
$this->breadcrumbs=array(
	'Diplomes'=>array('index'),
	$model->id_diplome=>array('view','id'=>$model->id_diplome),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Diplome','url'=>array('index')),
	array('label'=>'Create Diplome','url'=>array('create')),
	array('label'=>'View Diplome','url'=>array('view','id'=>$model->id_diplome)),
	array('label'=>'Manage Diplome','url'=>array('admin')),
	);
	?>

	<h1>Update Diplome <?php echo $model->id_diplome; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>