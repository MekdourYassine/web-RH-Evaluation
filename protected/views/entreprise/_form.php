<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'entreprise-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nom_entr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)),'prepend'=>'<i class="glyphicon glyphicon-home"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'code_entr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)), 'prepend'=>'<i class="glyphicon glyphicon-ban-circle"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'domaine_entr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)),'prepend'=>'<i class="glyphicon glyphicon-asterisk"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'adr_entr', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-align-justify"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'num_tel_entr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')),'prepend'=>'<i class="glyphicon glyphicon-phone-alt"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'pays',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>64)),'prepend'=>'<i class="glyphicon glyphicon-globe"></i>')); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Créer' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>