<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'exppro-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',

)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->datePickerGroup($model,'date_debut_exp_pro',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')),'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->datePickerGroup($model,'date_fin_exp_pro',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'entreprise',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)), 'prepend'=>'<i class="glyphicon glyphicon-home"></i>')); ?>

	<?php echo $form->textFieldGroup($model,'secteur',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'fonction',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>
            
     	<?php echo $form->textAreaGroup($model,'desc_exp', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')))); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Ajouter' : 'Sauvegarder',
		)); ?>
</div>

<?php $this->endWidget(); ?>
