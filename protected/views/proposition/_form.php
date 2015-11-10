<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'proposition-form',
	'enableAjaxValidation'=>false,
         'id' => 'horizontalForm',
	'type' => 'horizontal',
)); ?>

<p class="help-block">champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textAreaGroup($model,'desc_prop', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>30, 'class'=>'span8')))); ?>

	
       <?php echo $form->switchGroup($model,'reponse', array('widgetOptions'=>array('htmlOptions'=>array('id'=>'unique_id')))); ?>
     
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Ajouter' : 'Enregistrer',
		)); ?>
</div>

<?php $this->endWidget(); ?>
