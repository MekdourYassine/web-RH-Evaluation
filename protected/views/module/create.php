<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List des modules','url'=>array('index')),
array('label'=>'Manage Module','url'=>array('admin')),
);
?>

<h1>Création d'un nouveau module</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>