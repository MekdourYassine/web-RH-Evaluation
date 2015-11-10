<?php
$this->breadcrumbs=array(
	'Evenements',
);

$this->menu=array(
array('label'=>'Create Evenement','url'=>array('create')),
array('label'=>'Manage Evenement','url'=>array('admin')),
);
?>

<h1>Evenements</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
