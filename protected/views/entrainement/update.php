<?php
$this->breadcrumbs=array(
	'Entrainements'=>array('index'),
	$model->id_entrain=>array('view','id'=>$model->id_entrain),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Entrainement','url'=>array('index')),
	array('label'=>'Create Entrainement','url'=>array('create')),
	array('label'=>'View Entrainement','url'=>array('view','id'=>$model->id_entrain)),
	array('label'=>'Manage Entrainement','url'=>array('admin')),
	);
	?>

<? php //	<h1>Update Entrainement <?php echo $model->id_entrain; ?></h1> ?>

<?php echo $this->renderPartial('viewAddQuest',array('model' => $model,'dataProvider' => $dataProvider, 'modelB' => $modelB, 'modelC'=>$modelC,'id_module'=>$id_module)); ?>