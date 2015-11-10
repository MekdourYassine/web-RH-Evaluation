<?php
/* @var $this TypequestionController */
/* @var $model Typequestion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_typeQuest'); ?>
		<?php echo $form->textField($model,'id_typeQuest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'typeQuest'); ?>
		<?php echo $form->textArea($model,'typeQuest',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->