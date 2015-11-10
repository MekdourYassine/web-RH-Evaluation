<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'compte-form',
	'enableAjaxValidation'=>false,
         'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textAreaGroup($model,'email', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-envelope"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'mdp', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-lock"></i>')); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
                         'size'=>'large',   
			'label'=>'Créer',
		)); ?>
</div>

<?php $this->endWidget(); ?>
