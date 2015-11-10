<style>
   .col-lg-6 {
 border:1px dotted black;
 }
</style>

<div class="view col-lg-6">
    <h3><input type="checkbox" name="quest[<?php echo $data->id_quest; ?>]" /> 
        Question N° <a href=""><?php echo CHtml::link($data->id_quest); ?>
        </a></h3>
    <b><?php echo CHtml::encode($data->getAttributeLabel('enonce_quest')); ?>:</b>
    <?php echo CHtml::encode($data->enonce_quest); ?>
    
    <br>
    <b>Type :</b>
    <?php 
    if($data->id_typeQuest==2)
        echo CHtml::encode('choix multiples');
    if($data->id_typeQuest==3)
        echo CHtml::encode('réponses multiples');
    if($data->id_typeQuest==4)
        echo CHtml::encode('réponse Libre');
    if($data->id_typeQuest==5)
        echo CHtml::encode('Avec image');
    if($data->id_typeQuest==6)
        echo CHtml::encode('Avec Son');
     if($data->id_typeQuest==7)
        echo CHtml::encode('Avec Vidéo');
     if($data->id_typeQuest==8)
        echo CHtml::encode('zone identifiable sur image');
     if($data->id_typeQuest==9)
        echo CHtml::encode('Matrices/grilles');
     if($data->id_typeQuest==10)
        echo CHtml::encode('Association');
     if($data->id_typeQuest==11)
        echo CHtml::encode('Textes à trou');
     if($data->id_typeQuest==12)
        echo CHtml::encode('à élément ordonnées');
     if($data->id_typeQuest==13)
        echo CHtml::encode('graduées/conditionnées');
    
    ?>
    <br>
    <b><?php echo CHtml::encode('La liste des propositions :'); ?></b>
    <br>
     <?php
     $a=1;
    foreach ($data->propositions as $prop) {
        echo CHtml::encode('Proposition N°=');
        echo CHtml::encode(':'.$a);
        
        ?>
        <?php
        echo CHtml::encode($prop->desc_prop) ;
        if ($prop->reponse ==1) 
        echo CHtml::encode(',Bonne');
        if ($prop->reponse ==0)
        echo CHtml::encode(',Mauvaise');
        ?>
    <?php
    $a=$a+1;
    }
    ?>
    <br>
    <b><?php echo CHtml::encode($data->getAttributeLabel('duree_quest')); ?>:</b>
<?php echo CHtml::encode($data->duree_quest); ?>
    <br>
    <b><?php echo CHtml::encode($data->getAttributeLabel('nbr_tentatives_quest')); ?>:</b>
<?php echo CHtml::encode($data->nbr_tentatives_quest); ?>
    <br>

</div>
