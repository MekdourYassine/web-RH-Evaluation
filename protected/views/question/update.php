<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id_quest=>array('view','id'=>$model->id_quest),
	'Update',
);

//	$this->menu=array(
//	array('label'=>'List Question','url'=>array('index')),
//	array('label'=>'Create Question','url'=>array('create')),
//	array('label'=>'View Question','url'=>array('view','id'=>$model->id_quest)),
//	array('label'=>'Manage Question','url'=>array('admin')),
//	);
	?>

	<h1>Modifier Question N° <?php echo $model->id_quest; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>


<section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>LISTE DES PROPOSITIONS</h2>
            </div>
        </div>
</section>   
        
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'proposition-grid',
    'dataProvider' => $DataProvider,
    
    'columns' => array(
        array(
        'name'=>'id_prop',
        'header'=> 'N°'
         ),
        array(
        'name'=>'desc_prop',
        'header'=> 'Description'
         ),
        'reponse',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => "{delete} {update}",
            'deleteButtonUrl' => '"index.php?r=proposition/delete&id=$data->primaryKey"',
            'updateButtonUrl'=>'"index.php?r=proposition/update&id=$data->primaryKey"'
        ),
        
            ),
));
?>
<?php        
$this->menu=array(
array('label'=>'Ajouter proposition','url'=>array('proposition/create','id_quest'=>$model->id_quest)),
);
?>
        