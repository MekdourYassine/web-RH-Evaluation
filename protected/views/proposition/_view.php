<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_prop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_prop),array('view','id'=>$data->id_prop)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_quest')); ?>:</b>
	<?php echo CHtml::encode($data->id_quest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_prop')); ?>:</b>
	<?php echo CHtml::encode($data->desc_prop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reponse')); ?>:</b>
	<?php echo CHtml::encode($data->reponse); ?>
	<br />


</div>