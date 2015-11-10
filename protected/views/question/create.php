<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'Ajouter une proposition','url'=>array('proposition/create&id_quest='.$model->id_quest)),
//array('label'=>'Manage Question','url'=>array('admin')),
//);
//?>

<h1>Créer des questions</h1>

<?php echo $this->renderPartial('_formQUestProp', array('model'=>$model,'modelB'=>$modelB, 'id_module' => $id_module)); ?>
