<style type="text/css">

    .input-group-addon{
  display: table;
  border: dotted 2px #000;
    }
    #email{
     border: solid 1px #000;
     
    }
    #nom {
     border: solid 1px #000;
     
    }
    #mot {
     border: solid 1px #000;
     
    }
    .col-xs-5 .col-xs-8 input 
    {
     border: solid 1px #000;
        
    }
    .col-xs-8 input 
    {
     border: solid 1px #000;
        
    }
    
#titre {
        margin-left: 5%;
	margin-right: 5%;
        margin-top: 2%;
        margin-bottom: 2%;
	border-width: 5%;
        font-size: x-large;
        font-style: oblique;text-align: center;
}    
.op1{ font-size: medium;line-height: 10px; }
.border-left
{
    border-left-width: 2px;
    border-left-style: dashed;    
}
.span6 {
margin-top : 10px;
margin-bottom : 10px;
margin-left:11px;
margin-right:12px;

//border-radius: 5px 5px 5px 5px;
text-align: center;
text-height: 30px;
//font-size: medium;
float: left;
width: 48%;
//border-width: 10%;


//border-color: #0EA1D5;
//border-style: outset;
line-height:inherit;
	
}

.span7 {
	
}



.row {
    margin-left: 10%; 
    margin-right: 10%;
    
}
.row p {
    margin-left: 1%; 
    margin-right: 1%;
    
}

.form-group .col-sm-3   

{
    width : 21%;
}
div #mdp .form-group .col-sm-3      

{
    width : 25%;
}

.captcha
{
 
}


@media screen and (max-width: 1008px)
{
	.span6
	{
		width:97%;
	}
	
	
}

.btn-info,.btn-danger,.btn-warning,.btn-primary {
     	transition: padding .3s;
}	


.btn-info:hover, .btn-info:focus,.btn-danger:hover, .btn-danger:focus,.btn-primary:hover,.btn-primary:focus,.btn-warning:hover,.btn-warning:focus
{
    padding: 10px 10px 10px 10px;  
    color:#008000;
               
} 
</style>
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quiz Algérie</title>
<meta name="description" content="">
<link rel="stylesheet" href="../../themes/twitter/main.css" />
<meta name="author" content="">


</head>




<div id="titre"><p>Veuillez vous identifier</p></div>
<br>


<div class="span6"> 
    <div class="op1"> <div class="hint" > j'ai déja un compte</div> </div><br>
<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p><br>		
<div class="form">
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); */

 $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'compte-form',
	'enableAjaxValidation'=>true,
         'id' => 'verticalForm',
    	'type' => 'horizontal',
));


?>	
    <br>
        <?php echo $form->textFieldGroup($model,'email', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>10, 'class'=>'span8','id'=>'email')),'prepend'=>'<i class="glyphicon glyphicon-envelope"></i>')); ?>
    <br>
	<?php echo $form->passwordFieldGroup($model,'password', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span8','id'=>'mot')),'prepend'=>'<i class="glyphicon glyphicon-lock"></i>')); ?>
        
    <p class="note" style="text-align: right;">
                    <a href="?r=site/contact"> J'ai oublié le mot de passe </a>
        </p>
        
        <br>
        <div class="rememberme" style="text-align: center;" >
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
        
        
        <div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
                         'size'=>'large',   
			'label'=>'Se connecter',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

</div>
<div class="span6 border-left">
    <div class="op1"><div class="hint"> je n'ai pas un compte  </div></div><br>
    
    
    <p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p><br>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'compte-form',
	'enableAjaxValidation'=>false,
         'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

    <br>
    <div id="mdp">
	<?php echo $form->textFieldGroup($modelB,'nom',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>128,'id'=>'nom')),'prepend'=>'<i class="glyphicon glyphicon-user"></i>')); ?>

    <br>
           
           <?php echo $form->textFieldGroup($modelB,'email', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span8','id'=>'email')),'prepend'=>'<i class="glyphicon glyphicon-envelope"></i>')); ?>
    <br>
    
        <?php /* $this->widget('ext.EStrongPassword.EStrongPassword',array('form'=>$form, 'model'=>$modelB, 'attribute'=>'mdp'));*/?>
    <?php echo $form->passwordFieldGroup($modelB,'mdp', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span7','id'=>'mot')),'prepend'=>'<i class="glyphicon glyphicon-lock"></i>')); ?>
    
    
            <?php echo $form->error($modelB,'mdp'); ?>
    <br>
    </div>     
        <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row"> 
      <p>Entrer les lettres telles qu'elles figurent dans l'image ci-dessus.</p></div>
    
    <div class="captcha col-xs-12">
        <div class="col-xs-4">
		<?php echo $form->labelEx($modelB,'verifyCode'); ?>
        </div>
    <div class="col-xs-5">
            	<?php echo $form->textField($modelB,'verifyCode'); ?>
    </div>
      
            <?php $this->widget('CCaptcha'); ?>
     </div>
          	<?php echo $form->error($model,'verifyCode'); ?>
	<?php endif; ?>
        <div class="row">
            <br>
        </div>
    
            <!--<div class="row">
            <label class="label-control" for="Compte_mdp">Code d'entreprise </label>


            <input class="form-control" type="text" name="code_en"> </div>-->
            <div class="row">
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>
<div style="border: solid 2px #000;" class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
          J'ai été invité par une entreprise
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        Veuillez indiquer le code entreprise communiqué.
               <div class=" col-xs-12">
                   <br>
        
                <div class="col-xs-4" style="float:left;">
                <?php echo $form->labelEx($modelB,'Code d\'entreprise', array("class"=>"label-control")); ?>
                </div>
                   <div class="col-xs-8">   
                <?php echo $form->textField($modelB,'id_entr', array("class"=>"form-control")); ?>
                </div>
                <?php echo $form->error($modelB,'id_entr'); ?>
                </div>
             

      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
            </div>
            <input type ="checkbox"/>  J'accepte les <a href=""> conditions générales d'utilisation</a>
            
            
	<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
                         'size'=>'large',   
			'label'=>'S\'inscrire',
		)); ?>

        </div>
	
<?php $this->endWidget(); 
unset($form);
?>
</div><!-- form -->



</div>
