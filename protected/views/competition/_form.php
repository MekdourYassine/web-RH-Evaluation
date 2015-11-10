<style type="text/css">
    .input-group-addon{
  display: table;
}
</style>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'competition-form',
	'enableAjaxValidation'=>false,
        'id' => 'horizontalForm',
	'type' => 'horizontal',
    )); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>

	
	<?php echo $form->textFieldGroup($model,'nom_comp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128)))); ?>

	<?php echo $form->datePickerGroup($model,'date_debut_comp',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>' )); ?>

	<?php echo $form->datePickerGroup($model,'date_fin_comp',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	  <?php echo $form->dropDownListGroup($model,'categorie_comp',array('wrapperHtmlOptions' => array('class' => 'col-sm-5'),'widgetOptions' => array('data' => array('Cat1','Cat2','Cat3'),
					'htmlOptions' => array('value'=>12),
				), 'prepend'=>'<i class="glyphicon glyphicon-list"></i>'
			)
		); ?>
      
	<?php echo $form->dropDownListGroup($model,'niveau_comp',array('wrapperHtmlOptions' => array('class' => 'col-sm-5'),'widgetOptions' => array('data' => array('Débutant','intermédiaire','Confirmé','Expert'),
					'htmlOptions' => array('value'=>12),
				),'prepend'=>'<i class="glyphicon glyphicon-stats"></i>' 
			)
		); ?>
      
        <?php echo $form->textAreaGroup($model,'description_comp', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

      
        

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Enregistrer',
		)); ?>
</div>

<?php $this->endWidget(); ?>
