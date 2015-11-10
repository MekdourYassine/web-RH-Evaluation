<?php
$this->breadcrumbs=array(
	'Comptes'=>array('index'),
	$model->id_compte=>array('view_secur','id'=>$model->id_compte),
	'Update',
);

	?>


	<h1>Sécurité</h1>
        <h3>Changer le mot de passe</h3>

<?php echo $this->renderPartial('_form_secur',array('model'=>$model)); ?>