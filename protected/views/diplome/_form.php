<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'diplome-form',
	'enableAjaxValidation'=>false,
           'id' => 'verticalForm',
            'type' => 'horizontal',

)); ?>

<p class="help-block">Champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldGroup($model,'nom_diplome',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)),'prepend'=>'<i class="glyphicon glyphicon-list-alt"></i>')); ?>

	<?php echo $form->datePickerGroup($model,'date_obtention',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'libelle_diplome', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-edit"></i>')); ?>
        
       <?php echo $form->dropDownListGroup(
			$model,
			'type_diplome',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => array('Diplôme','Certification'),
					'htmlOptions' => array(),
				)
			)
		); ?>	

	<?php echo $form->textFieldGroup($model,'etablissement_diplome',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)),'prepend'=>'<i class="glyphicon glyphicon-home"></i>' )); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Créer' : 'Sauvegarder',
		)); ?>
</div>

<div><br>
</div>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'button',
			'context'=>'warning',
			'label'=>'Annuler',
		)); ?>
</div>
<div><br>
</div>

<?php $this->endWidget(); ?>
