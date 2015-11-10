<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'module-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->timePickerGroup($model, 'duree_test', array('widgetOptions' => array('wrapperHtmlOptions' => array('class' => 'col-sm-3'), 'options' => array('showMeridian' => false)))); ?> 

<?php
echo $form->dropDownListGroup($model, 'note_min_test', array('wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'widgetOptions' => array('data' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),), 'prepend' => '<i class="glyphicon glyphicon-thumbs-up"></i>') );
?>
<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Créer le test' : 'Enregistrer',
    ));
    ?>
    
<?php $this->endWidget(); ?>
   
</div>
