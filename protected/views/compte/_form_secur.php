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
    
	<?php echo $form->textAreaGroup($model,'mdp', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8', 'disabled'=>'true')),'prepend'=>'<i class="glyphicon glyphicon-lock"></i>')); ?>
<div class="form-group">
        <label class="col-sm-3 control-label required" for="Compte_mdp">Nouveau mot de passe <span class="required">*</span></label>
        <div class="col-sm-9">
            <div class="input-group">
                  <textarea rows="1" cols="10" class="span8 form-control"></textarea>
            </div>
        </div>
      
</div>       
<div class="form-group">
        <label class="col-sm-3 control-label required" for="Compte_mdp">Confirmer le mot de passe <span class="required">*</span></label>
        <div class="col-sm-9">
            <div class="input-group">
                  <textarea rows="1" cols="10" class="span8 form-control"></textarea>
            </div>
        </div>
      
</div>       
	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'danger',
			'label'=>$model->isNewRecord ? 'Create' : 'Valider ',
		)); ?>

    
</div>
<div>
    <br>
</div>
<div class="form-actions">
	
        <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'button',
			'context'=>'warning',
			'label'=>'Annuler ',
		)); ?>
</div>

<div>
    <br>
</div>

    
    <?php $this->endWidget(); ?>
