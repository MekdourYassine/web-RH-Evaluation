<?php
$this->breadcrumbs=array(
	'Comptes'=>array('index'),
	$model->id_compte,
);

//$this->menu=array(
//array('label'=>'List Compte','url'=>array('index')),
//array('label'=>'Create Compte','url'=>array('create')),
//array('label'=>'Modifier','url'=>array('update','id'=>$model->id_compte)),
//array('label'=>'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_compte),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Compte','url'=>array('admin')),
//);
?>

<h1><?php echo $model->nom;?> <?php echo $model->prenom;?> </h1>
<div class="row">
    <div class="col-md-9">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
//		'id_compte',
//		'id_entr',
		'nom',
		'email',
		'mdp',
		'prenom',
		'dateNaissance',
		'numTel',
		'compteLinkedIn',
		'compteViadeo',
		'pays',
		'langue',
),
)); 
?>
  </div>
    <div class="col-md-3">
        <?php
        $this->widget(
            'booster.widgets.TbMenu',
            array(
                'type' => 'list',
                'items' => array(
                    array(
                        'label' => 'Compte',
                        'itemOptions' => array('class' => 'nav-header')
                    ),
                    array(
                        'label' => 'Modifier',
                        'url'=>array('update','id'=>$model->id_compte),
                        'itemOptions' => array('class' => 'active')
                    ),
                    array('label'=>'Supprimer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_compte),'confirm'=>'Etes-vous sur de vouloir supprimer ce compte?')),

                    
                )
            )
        );

      ?>
    </div>
</div>