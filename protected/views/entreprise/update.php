<?php
$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entr=>array('view','id'=>$model->id_entr),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Entreprise','url'=>array('index')),
	array('label'=>'Create Entreprise','url'=>array('create')),
	array('label'=>'View Entreprise','url'=>array('view','id'=>$model->id_entr)),
	array('label'=>'Manage Entreprise','url'=>array('admin')),
	);
	?>

	<h1>Update Entreprise <?php echo $model->id_entr; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>