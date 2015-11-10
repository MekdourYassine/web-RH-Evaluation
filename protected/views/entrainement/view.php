<?php
$this->breadcrumbs=array(
	'Entrainements'=>array('index'),
	$model->id_entrain,
);

//$this->menu=array(
//array('label'=>'List Entrainement','url'=>array('index')),
//array('label'=>'Create Entrainement','url'=>array('create&id_module='.$model->id_module)),
//array('label'=>'Update Entrainement','url'=>array('update','id'=>$model->id_entrain)),
//array('label'=>'Delete Entrainement','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_entrain),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Entrainement','url'=>array('admin')),
//);
?>

<?php
if (Yii::app()->user->checkAccess('admin_entr') || Yii::app()->user->checkAccess('admin') )
{
$this->menu=array(
//array('label'=>'List Module','url'=>array('index')),
array('label'=>'Ajouter des questions','url'=>array('question/create&id_module='.$model->id_module)),
array('label'=>'Supprimer l\'entraînement','url'=>array('delete&id='.$model->id_entrain),'linkOptions'=>array('confirm'=>'Êtes-vous de vouloir supprimer cet entraînement?')),

    );

}
?>

<h1>Entraînement N°=<?php echo $model->id_entrain; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'auteur_entrain',
),
)); ?>

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
    'dataProvider' => $questDataProvider,
    
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
            'template' => "{view}  {delete} {update}",
            'deleteButtonUrl' => '"index.php?r=question/delete&id=$data->primaryKey"',
            'viewButtonUrl'=>'"index.php?r=question/view_quest&id=$data->primaryKey"',
            'updateButtonUrl'=>'"index.php?r=question/update&id=$data->primaryKey"'
        ),
       
    ),
));
?>


