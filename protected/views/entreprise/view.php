<?php
$this->breadcrumbs=array(
	'Entreprises'=>array('index'),
	$model->id_entr,
);

?>

<h1> Entreprise :<?php echo $model->nom_entr; ?></h1>
<div class="row">
    <div class="col-md-9"> 
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nom_entr',
		'code_entr',
		'domaine_entr',
		'adr_entr',
		'num_tel_entr',
		'pays',
),
)); ?>
    </div>
    <div class="col-md-3">
         <?php
        $this->widget(
            'booster.widgets.TbMenu',
            array(
                'type' => 'list',
                'items' => array(
                    array(
                        'label' => 'Entreprise',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array(
                        'label' => 'Modifier',
                        'url'=>array('update','id'=>$model->id_entr),
                        'itemOptions' => array('class' => 'active')
                    ),
                    array('label' => 'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_entr),'confirm'=>'Etes-vous sûr de vouloir supprimer cette entreprise?')),
                    array(
                        'label' => 'Contenu ',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array('label' => 'Liste des utilisateurs', 'url'=>array('/compte/index1&id_entr='.$model->id_entr)),
                    array('label' => 'Liste des administrateurs', 'url'=>array('/compte/index2&id_entr='.$model->id_entr)),
                    array('label' => 'Créer administrateur', 'url'=>array('/compte/create&id_entr='.$model->id_entr)),

                )
            )
        );
       
?>
    </div>    
    <div>
        <br>
        <br>
    </div>
</div>        