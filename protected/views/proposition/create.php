<?php
$this->breadcrumbs=array(
	'Propositions'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'List Proposition','url'=>array('index')),
//array('label'=>'Manage Proposition','url'=>array('admin')),
//);
//
?>

<h1>Création d'un proposition</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>