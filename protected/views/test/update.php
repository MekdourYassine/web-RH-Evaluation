<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->id_test=>array('view','id'=>$model->id_test),
	'Update',
);

//	$this->menu=array(
//	array('label'=>'List Test','url'=>array('index')),
//	array('label'=>'Create Test','url'=>array('create')),
//	array('label'=>'View Test','url'=>array('view','id'=>$model->id_test)),
//	array('label'=>'Manage Test','url'=>array('admin')),
//	);
	?>

<h1>Modification du test N° <?php echo $model->id_test; ?></h1>

<?php echo $this->renderPartial('_form_update',array('model'=>$model)); ?>

<?php
$this->menu=array(
//array('label'=>'List Module','url'=>array('index')),
array('label'=>'Ajouter des questions','url'=>array('question/create&id_module='.$model->id_module)),
        );
?>

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

        