<?php
$this->breadcrumbs=array(
	'Propositions',
);

$this->menu=array(
array('label'=>'Create Proposition','url'=>array('create')),
array('label'=>'Manage Proposition','url'=>array('admin')),
);
?>

<h1>Propositions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
