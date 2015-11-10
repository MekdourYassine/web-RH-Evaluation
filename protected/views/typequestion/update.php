<?php
/* @var $this TypequestionController */
/* @var $model Typequestion */

$this->breadcrumbs=array(
	'Typequestions'=>array('index'),
	$model->id_typeQuest=>array('view','id'=>$model->id_typeQuest),
	'Update',
);

$this->menu=array(
	array('label'=>'List Typequestion', 'url'=>array('index')),
	array('label'=>'Create Typequestion', 'url'=>array('create')),
	array('label'=>'View Typequestion', 'url'=>array('view', 'id'=>$model->id_typeQuest)),
	array('label'=>'Manage Typequestion', 'url'=>array('admin')),
);
?>

<h1>Update Typequestion <?php echo $model->id_typeQuest; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>