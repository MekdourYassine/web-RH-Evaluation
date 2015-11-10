<?php
$this->breadcrumbs=array(
	'Entrainements'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'List Entrainement','url'=>array('index')),
//array('label'=>'Manage Entrainement','url'=>array('admin')),
//);
?>

<h1>Création d'un entraînement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelB'=>$modelB,'modelC'=>$modelC,'id_module'=>$id_module)); ?>