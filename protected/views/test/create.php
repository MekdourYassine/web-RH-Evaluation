<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'List Test','url'=>array('index')),
//array('label'=>'Manage Test','url'=>array('admin')),
//);
?>

<h1>Création d'un test</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelB'=>$modelB,'modelC'=>$modelC,'id_module' => $id_module)); ?>