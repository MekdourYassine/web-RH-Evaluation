<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_event')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_event),array('view','id'=>$data->id_event)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compte')); ?>:</b>
	<?php echo CHtml::encode($data->id_compte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('libelle_event')); ?>:</b>
	<?php echo CHtml::encode($data->libelle_event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_event')); ?>:</b>
	<?php echo CHtml::encode($data->date_event); ?>
	<br />


</div>