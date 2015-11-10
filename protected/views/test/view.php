<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->id_test,
);
$this->menu=array(
//array('label'=>'List Test','url'=>array('index')),
array('label'=>'Modifier','url'=>array('update','id'=>$model->id_test)),
//array('label'=>'Update Test','url'=>array('update','id'=>$model->id_test)),
array('label'=>'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_test),'confirm'=>'Êtes-vous sûr de vouloir supprimer ce test ?')),
//array('label'=>'Manage Test','url'=>array('admin')),
//array('label'=>'Ajouter des questions','url'=>array('')),    
);
?>

<h1>Test N°=<?php echo $model->id_test; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'duree_test',
		'auteur_test',
		'note_min_test',
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
            'template' => "",
        ),
       
    ),
));
?>
