<style type="text/css">
    
    </style>
<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Profil';
$this->breadcrumbs=array(
	'Sécurité',
);
?>

<h1>Sécurité</h1>

<h3>Changer le mot de passe</h3>

<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'secur-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>


	
	<?php echo $form->errorSummary($model); ?>

	        <div class="col-md-4">
		<?php echo $form->labelEx($model,'mdp', array("class"=>"")); ?>
		<?php echo $form->textField($model,'mdp', array("class"=>"")); ?>
		<?php echo $form->error($model,'mdp'); ?>
            
            </div>
	
        <div class="row">
            <div class="col-md-4">
             Nouveau mot de passe:<br>
            <input type="text" name="nouvmdp">
            <br>
            Confirmer mot de passe:<br>
        <input type="text" name="confirmmdp">   
            
            </div>
	</div>
        
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Valider les modifications'); ?>
        </div>
    <div class="row buttons">
		<?php echo CHtml::submitButton('Annuler'); ?>
        </div>
    

<?php $this->endWidget(); ?>

</div><!-- form -->
