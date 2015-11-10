<?php
$this->breadcrumbs=array(
	'Comptes'=>array('index'),
	$model->id_compte=>array('view_modif','id'=>$model->id_compte),
	'Update',
);

	?>


	<h1>Profil</h1>

<?php echo $this->renderPartial('_form_modif',array('model'=>$model)); ?>