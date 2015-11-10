<?php
$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entr,
);

?>

<h1> Entreprise :<?php echo $model->nom_entr; ?></h1>
<div class="row">
    <div class="col-md-12"> 
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nom_entr',
		'domaine_entr',
		'adr_entr',
		'num_tel_entr',
		'pays',
),
)); ?>
    </div>
  
    <div>
        <br>
        <br>
    </div>
</div>        