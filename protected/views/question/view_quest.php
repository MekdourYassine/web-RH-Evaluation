<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id_quest,
);

?>
<h1> Question N°<?php echo $model->id_quest; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_typeQuest',
		'enonce_quest',
		'duree_quest',
		'nbr_tentatives_quest',
),
)); ?>
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
            'template' => "",
        ),
        
            ),
));
?>
