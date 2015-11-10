<?php
$this->breadcrumbs=array(
	'Diplomes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Diplome','url'=>array('index')),
array('label'=>'Manage Diplome','url'=>array('admin')),
);
?>

<h1>Create Diplome</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>