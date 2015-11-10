<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_compte),array('view','id'=>$data->id_compte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mdp')); ?>:</b>
	<?php echo CHtml::encode($data->mdp); ?>
	<br />

	 ?>

</div>