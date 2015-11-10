<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->id_comp,
);
$this->menu=array(
//array('label'=>'List Competition','url'=>array('index')),
//array('label'=>'Create Competition','url'=>array('create')),
array('label'=>'Modifier compétition','url'=>array('update','id'=>$model->id_comp)),
array('label'=>'Supprimer compétition','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comp),'confirm'=>'Êtes-vous de vouloir supprimer cette compétition?')),
array('label'=>'Rendre Compétition publique','url'=>'#','linkOptions'=>array('submit'=>array('compPub','id'=>$model->id_comp),'confirm'=>'Êtes-vous de vouloir publier cette compétition?')),
);
?>

<h1>Compétition :<?php echo $model->nom_comp; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'date_debut_comp',
		'date_fin_comp',
		'categorie_comp',
    		'niveau_comp',
		'description_comp',
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
