<?php
$this->breadcrumbs=array(
	'Exppros'=>array('index'),
	$model->id_exp_pro=>array('view','id'=>$model->id_exp_pro),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Exppro','url'=>array('index')),
	array('label'=>'Create Exppro','url'=>array('create')),
	array('label'=>'View Exppro','url'=>array('view','id'=>$model->id_exp_pro)),
	array('label'=>'Manage Exppro','url'=>array('admin')),
	);
	?>

	<h1>Update Exppro <?php echo $model->id_exp_pro; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>