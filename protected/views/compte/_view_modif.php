<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_compte),array('view','id'=>$data->id_compte)); ?>
	<br />
        
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('prenom')); ?>:</b>
	<?php echo CHtml::encode($data->prenom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateNaissance')); ?>:</b>
	<?php echo CHtml::encode($data->dateNaissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numTel')); ?>:</b>
	<?php echo CHtml::encode($data->numTel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compteLinkedIn')); ?>:</b>
	<?php echo CHtml::encode($data->compteLinkedIn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compteViadeo')); ?>:</b>
	<?php echo CHtml::encode($data->compteViadeo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pays')); ?>:</b>
	<?php echo CHtml::encode($data->pays); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('langue')); ?>:</b>
	<?php echo CHtml::encode($data->langue); ?>
	<br />

	 ?>

</div>