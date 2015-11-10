<?php
/* @var $this TypequestionController */
/* @var $model Typequestion */

$this->breadcrumbs=array(
	'Typequestions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Typequestion', 'url'=>array('index')),
	array('label'=>'Manage Typequestion', 'url'=>array('admin')),
);
?>

<h1>Create Typequestion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>