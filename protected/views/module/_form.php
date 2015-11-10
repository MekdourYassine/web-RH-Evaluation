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

	
		<?php echo $form->textFieldGroup($model,'nom_module',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)), 'prepend'=>'<i class="glyphicon glyphicon-folder-close"></i>')); ?>

                <?php echo $form->textFieldGroup($model,'sous_titre_module',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)), 'prepend'=>'<i class="glyphicon glyphicon-tasks"></i>')); ?>

        	<?php echo $form->textAreaGroup($model,'desc_module', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')), 'prepend'=>'<i class="glyphicon glyphicon-comment"></i>')); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Créer' : 'Enregistrer',
		)); ?>
</div>

<?php $this->endWidget(); ?>
