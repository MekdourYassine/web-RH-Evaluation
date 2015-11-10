<?php
$this->breadcrumbs=array(
	'Evenements'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Evenement','url'=>array('index')),
array('label'=>'Manage Evenement','url'=>array('admin')),
);
?>

<h1>Création de l'évènement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>