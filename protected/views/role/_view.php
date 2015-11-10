<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_role')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_role), array('view', 'id'=>$data->id_role)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_role')); ?>:</b>
	<?php echo CHtml::encode($data->type_role); ?>
	<br />


</div>