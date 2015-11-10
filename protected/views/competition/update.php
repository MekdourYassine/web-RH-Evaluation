<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->id_comp=>array('view','id'=>$model->id_comp),
	'Update',
);



	//$this->menu=array(
	//array('label'=>'List Competition','url'=>array('index')),
	//array('label'=>'Create Competition','url'=>array('create')),
	//array('label'=>'View Competition','url'=>array('view','id'=>$model->id_comp)),
	//array('label'=>'Manage Competition','url'=>array('admin')),
	//);
	//
$this->menu=array(
//array('label'=>'List Module','url'=>array('index')),
array('label'=>'Ajouter des questions','url'=>array('question/create&id_module='.$model->id_module)),
        );
?>

	<h1>Modification de la compétition <?php echo $model->id_comp; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>LISTE DES QUESTIONS</h2>
            </div>
        </div>
</section>   
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'question-grid',
    'dataProvider' => $DataProvider,
    'columns' => array(
        array(
        'name'=>'id_quest',
        'header'=> 'N°'
         ),
        array(
        'name'=>'enonce_quest',
        'header'=> 'Question'
         ),
        'duree_quest',
        'nbr_tentatives_quest',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => "{delete} {update}",
            'deleteButtonUrl' => '"index.php?r=question/delete&id=$data->primaryKey"',
            'updateButtonUrl' => '"index.php?r=question/update&id=$data->primaryKey"',
            
        ),
       
    ),
));
?>

        