<?php
/* @var $this TypequestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Typequestions',
);

$this->menu=array(
	array('label'=>'Create Typequestion', 'url'=>array('create')),
	array('label'=>'Manage Typequestion', 'url'=>array('admin')),
);
?>

<h1>Typequestions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
