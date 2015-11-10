<style type="text/css"> 
    @media (min-width: 768px) {.form-inline .input-group>.form-control {
                                   width: initial;
                               }}
    .input-group .form-control {

        width : initial;
    }
    .input-group {
        diplay: flex;
    }
    .input-group-addon{

        width: inherit;
    }
    .questions .ct-form-control
    {
        /*min-width: inherit !important;*/
    }
    
    @media (min-width: 768px)
    {.form-inline .input-group>.form-control {
        width: 100% !important;
    }
    }
    .row {
    margin-right: 0px;
    margin-left: 0px;
    }
    .input-group>.form-control {
        width: 100% !important;
      }
      
      .questions .btn-primary
      {
          margin-top: 0 !important;
      }
      
      
   
      /*.timepicker input
      {
          font-size:11px !important;
      }*/
</style>



<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
         'id' => 'horizontalForm',
	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires</p>

<?php echo $form->errorSummary($model); ?>


 <?php echo $form->textAreaGroup($model, 'enonce_quest', array('widgetOptions' => array('htmlOptions' => array('rows' => 2, 'cols' => 30, 'class' => 'span8')), 'prepend' => '<i class="glyphicon glyphicon-comment"></i>')); ?>

      
        <?php echo $form->dropDownListGroup(
			$model,
			'id_typeQuest',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'span8',
				),
				'widgetOptions' => array(
					'data' => array('Question à choix multiples'=>'Question à choix multiples', 'Question à réponses multiples'=>'Question à réponses multiples', 'Question à réponse Libre'=>'Question à réponse Libre', 'Question Avec image'=>'Question Avec image', 'Question Avec Son'=>'Question Avec Son', 'Question Avec Vidéo'=>'Question Avec Vidéo','Question avec une zone à identifier sur une image'=>'Question avec une zone à identifier sur une image','Question Matrices/grilles'=>'Question Matrices/grilles','Question Association'=>'Question Association','Textes à trou'=>'Textes à trou','Question à élément ordonnées'=>'Question à élément ordonnées','Question graduées/conditionnées'=>'Question graduées/conditionnées'),
					'htmlOptions' => array(),
				)
			)
		); ?>
            <?php echo $form->timePickerGroup($model,'duree_quest',array('widgetOptions' => array('wrapperHtmlOptions' => array('class' => 'col-sm-3'),'options' => array('showMeridian' => false)))); ?> 
        
	<?php echo $form->textFieldGroup($model,'nbr_tentatives_quest',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-check"></i>')); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Enregistrer',
		)); ?>
</div>

<?php $this->endWidget(); ?>
