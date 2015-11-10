<style>
    .gmap-area {
  background-image: url("images/map.jpg");
    }
    </style>

<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<br>
<br>
 <section id="contact-info">
        <div class="center">                
            <h2>Comment nous trouver?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>

<div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.fr/maps/place/Touring/@36.7789758,3.0588993,19z/data=!4m6!1m3!3m2!1s0x128fad428a92117d:0x6245e01d329d6023!2sOkprod!3m1!1s0x0000000000000000:0x38cddd72df4c65fa"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.fr/maps/place/62+Rue+de+Caumartin,+75009+Paris/@48.8756275,2.3287817,17z/data=!4m2!3m1!1s0x47e66e35dc213d0b:0xcbe9efe41126f763"></iframe>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                            
                            <li class="col-sm-6 text-center">
                                <address>
                                    <h5>Bureau Algérien</h5>
                                    <p>6 rue Said Yakoub <br>
                                    16 000 Alger</p>
                                    <p>Numéro de téléphone : (+213) 6 61 53 02 50<br>
                                  </address>

                            </li>


                            <li class="col-sm-6 text-center">
                                <address>
                                    <h5>Bureau Français</h5>
                                    <p>62 rue Caumartin <br>
                                    75009 Paris</p>                                
                                   <p>Numéro de téléphone : (+33) 6 32 63 19 89<br>
                                  </address>
                         
                </div>
                        </ul>
                    </div>
                </div>
</section>  <!--/gmap_area -->
     
<br>
<br>
<section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Laisser Votre Message </h2>
             
              <p class="lead">Si vous avez des questions, veuillez remplir le formulaire suivant pour nous contacter. Merci.</p>
            </div>
        </div> 
 </section>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldGroup($model,'nom',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 col-sm-5','maxlength'=>128)))); ?>

	<?php echo $form->textAreaGroup($model,'email', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')),'prepend'=>'<i class="glyphicon glyphicon-envelope"></i>')); ?>


	<?php echo $form->textAreaGroup($model,'sujet', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8')))); ?>


        <?php echo $form->textAreaGroup($model,'message', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

        <?php if(CCaptcha::checkRequirements()): ?>
	<div class="">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
                <?php echo $form->textField($model,'verifyCode'); ?>
                <?php $this->widget('CCaptcha'); ?>
	
		</div>
		<div class="hint">S'il vous plait entrer les lettres telles qu'elles figurent dans l'image ci-dessus. 
		<br/>Lettres ne sont pas sensibles à la casse.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
<br>
<br>
	<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'danger',
			'label'=>'Envoyer',
		)); ?>

<br>
<br>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>


