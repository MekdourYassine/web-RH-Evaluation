<?php
$this->breadcrumbs=array(
	'Exppros'=>array('index'),
	$model->id_exp_pro,
);

$this->menu=array(
//array('label'=>'List Exppro','url'=>array('index')),
//array('label'=>'Create Exppro','url'=>array('create')),
array('label'=>'Modifier','url'=>array('update','id'=>$model->id_exp_pro)),
array('label'=>'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_exp_pro),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Exppro','url'=>array('admin')),
);
?>

<h1> L'éxperience profesionnelle N° : <?php echo $model->id_exp_pro; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'date_debut_exp_pro',
		'date_fin_exp_pro',
		'entreprise',
		'secteur',
		'fonction',
		'desc_exp',
),
)); ?>
