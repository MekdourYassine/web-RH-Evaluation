<?php
$this->breadcrumbs = array(
    'Modules' => array('index'),
    $model->id_module => array('view', 'id' => $model->id_module),
    'Update',
);

//$this->menu = array(
//    array('label' => 'List Module', 'url' => array('index')),
//    array('label' => 'Create Module', 'url' => array('create')),
//    array('label' => 'View Module', 'url' => array('view', 'id' => $model->id_module)),
//    array('label' => 'Manage Module', 'url' => array('admin')),
//);
?>
<a href="update.php"></a>
<h1>Modification du module :<?php echo $model->nom_module; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
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
            'template' => "{delete}",
            'deleteButtonUrl' => '"index.php?r=question/delete&id=$data->primaryKey"',
        ),
       
    ),
));
?>
