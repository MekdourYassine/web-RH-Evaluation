<?php
/* @var $this TypequestionController */
/* @var $data Typequestion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_typeQuest')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_typeQuest), array('view', 'id'=>$data->id_typeQuest)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeQuest')); ?>:</b>
	<?php echo CHtml::encode($data->typeQuest); ?>
	<br />


</div>