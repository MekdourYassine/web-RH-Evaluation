<?php
$this->breadcrumbs=array(
	'Exppros'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Exppro','url'=>array('index')),
array('label'=>'Manage Exppro','url'=>array('admin')),
);
?>

<h1>Create Exppro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>