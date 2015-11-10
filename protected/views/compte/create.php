<?php
$this->breadcrumbs=array(
	'Comptes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Compte','url'=>array('index')),
array('label'=>'Manage Compte','url'=>array('admin')),
);
?>

<h1>Création d'un administrateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>