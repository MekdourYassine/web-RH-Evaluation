<?php
$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Entreprise','url'=>array('index')),
array('label'=>'Manage Entreprise','url'=>array('admin')),
);
?>

<h1>Création d'une entreprise</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>