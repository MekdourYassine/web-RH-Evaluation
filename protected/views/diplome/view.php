<?php
$this->breadcrumbs=array(
	'Diplomes'=>array('index'),
	$model->id_diplome,
);

$this->menu=array(
array('label'=>'Modifier','url'=>array('update','id'=>$model->id_diplome)),
array('label'=>'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_diplome),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1> Diplôme :<?php echo $model->id_diplome; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nom_diplome',
		'date_obtention',
		'libelle_diplome',
		'type_diplome',
		'etablissement_diplome',
),
)); ?>
