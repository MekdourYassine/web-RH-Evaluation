<?php
$this->breadcrumbs=array(
	'Propositions'=>array('index'),
	$model->id_prop=>array('view','id'=>$model->id_prop),
	'Update',
);

//	$this->menu=array(
//	array('label'=>'List Proposition','url'=>array('index')),
//	array('label'=>'Create Proposition','url'=>array('create')),
//	array('label'=>'View Proposition','url'=>array('view','id'=>$model->id_prop)),
//	array('label'=>'Manage Proposition','url'=>array('admin')),
//	);
	?>

	<h1>Modification proposition N° <?php echo $model->id_prop; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>