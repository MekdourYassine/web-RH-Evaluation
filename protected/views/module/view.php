<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->id_module,
);

?>

<div>
<h1> Module :<?php echo $model->nom_module; ?></h1>
<div class="row">
    <div class="col-md-9">
        <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
                        'nom_module',
                        'sous_titre_module',
                        'desc_module',
        ),
        )); ?>
    </div>
     <div class="col-md-3">
        <?php if (Yii::app()->user->checkAccess('admin_entr')) {
              $this->widget(
            'booster.widgets.TbMenu',
            array(
                'type' => 'list',
                'items' => array(
                    array(   
                        'label' => 'Module',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array(
                        'label' => 'Modifier',
                        'url'=>array('update','id'=>$model->id_module),
                        'itemOptions' => array('class' => 'active')
                    ),
                    array('label' => 'Supprimer','url'=>array('delete&id='.$model->id_module),'confirm'=>'Etes-vous sûr de supprimer ce module?'),
                    array('label' => 'Ajouter un autre module','url'=>array('create') ),
                    array(
                        'label' => 'Contenu ',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array('label' => 'Ajouter des questions', 'url'=>array('question/create&id_module='.$model->id_module)),
                    array('label' => 'Liste des entraînements', 'url'=>array('/entrainement&id_module='.$model->id_module)),
                    array('label' => 'Liste des tests', 'url'=>array('/test&id_module='.$model->id_module)),
                   // array('label' => 'Liste des compétitions', 'url'=>array('/competition&id_module='.$model->id_module)),

                )
            )
        );
        } else
        {
                $this->widget(
            'booster.widgets.TbMenu',
            array(
                'type' => 'list',
                'items' => array(
                    array(   
                        'label' => 'Module',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array(
                        'label' => 'Modifier',
                        'url'=>array('update','id'=>$model->id_module),
                        'itemOptions' => array('class' => 'active')
                    ),
                    array('label' => 'Supprimer','url'=>array('delete&id='.$model->id_module),'confirm'=>'Etes-vous sûr de supprimer ce module?'),
                    array('label' => 'Ajouter un autre module','url'=>array('create') ),
                    array(
                        'label' => 'Contenu ',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array('label' => 'Ajouter des questions', 'url'=>array('question/create&id_module='.$model->id_module)),
                    array('label' => 'Liste des entraînements', 'url'=>array('/entrainement&id_module='.$model->id_module)),
                    array('label' => 'Liste des tests', 'url'=>array('/test&id_module='.$model->id_module)),
                )
            )
        );
        }
            
        // array('label' => 'Ajouter des questions', 'url'=>array('question/create&id_module='.$model->id_module)),
        //            array('label' => 'Liste des entrînements', 'url'=>array('entrainement/')),
        //            array('label' => 'Liste des tests', 'url'=>array('test/create&id_module='.$model->id_module)),
        //            array('label' => 'Liste des compétitions', 'url'=>array('competition/create&id_module='.$model->id_module)),
        ?>
    </div>
</div>
</div>