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


	<?php echo $form->textFieldGroup($model,'nom',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>

	<?php echo $form->textAreaGroup($model,'prenom', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')))); ?>

	<?php echo $form->datePickerGroup($model,'dateNaissance',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); 
        ?>
	<?php echo $form->textFieldGroup($model,'numTel',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-phone"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'compteLinkedIn', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'compteViadeo', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'pays', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')), 'prepend'=>'<i class="glyphicon glyphicon-globe"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'langue', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-comment"></i>' )); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Valider les modifications',
		)); ?>

    
</div>
<div>
    <br>
</div>
<div class="form-actions">
	
        <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'button',
			'context'=>'warning',
			'label'=>'Annuler les modifications',
		)); ?>
</div>

<div>
    <br>
</div>

    
    <?php $this->endWidget(); ?>
