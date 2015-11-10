<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'evenement-form',
	'enableAjaxValidation'=>false,
        'id' => 'horizontalForm',
	'type' => 'horizontal', 
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>

        <?php echo $form->datePickerGroup($model,'date_event',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'libelle_event', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')), 'prepend'=>'<i class="glyphicon glyphicon-edit"></i>')); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
