<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'List Competition','url'=>array('index')),
//array('label'=>'Manage Competition','url'=>array('admin')),
//);
?>

<h1>Création d'une compétition</h1>

<?php echo $this->renderPartial('form_create_comp', array('model'=>$model,'modelB'=>$modelB,'modelC'=>$modelC,'id_module'=>$id_module)); ?>