<style type="text/css">
    .input-group-addon{
  display: table;
}

@media(min-width: 768px){ .col-sm-9 {
  width: 50%;
}
}
</style>
<br>
<br>
<section id="contact-page">
        <div class="container">
            <div class="center">  
                   
                <h2>Inviter des utilisateurs</h2>
                 
            </div>
        </div> 
 </section>
<?php if(Yii::app()->user->hasFlash('inviter')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('inviter'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'inviter-form',
	'enableAjaxValidation'=>false,
        'id' => 'verticalForm',
    	'type' => 'horizontal',
)); ?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires.</p>

<?php echo $form->errorSummary($model); ?>

        <?php echo $form->textAreaGroup($model,'email', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'class'=>'col-md-4')),'prepend'=>'<i class="glyphicon glyphicon-envelope"></i>')); ?>
                <div id="mailsec">
                    
                </div>  
                
                <div class="col-md-12">
                <div class="col-md-6">
                    <input id="addmail" type="button" value="Ajouter" class="btn btn-success" style="float: right;">  
            </div>
                <div class="col-md-6">
            <input id="supprmail" type="button" value="Supprimer" class="btn btn-warning">  
                </div>
            </div>
               
        <?php echo $form->textAreaGroup($model,'message', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8', 'style'=>'margin-top:10px;')))); ?>
        
        
<br>
<br>
	<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'danger',
			'label'=>'Inviter',
		)); ?>

    
        </div>
<br>
<br>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
<script>
    
    var numbermail = 0;
    $('#addmail').click(function () {  
        newmail = '<div class="mails'+numbermail+'">';
        newmail += '<div class="form-group">';
        newmail +='<label class="col-sm-3 control-label required" for="inviterForm_email">Email <span class="required">*</span></label>';
        newmail +='<div class="col-sm-9">';
        newmail +='<div class="input-group">';
        newmail += '<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>';
        newmail += '<textarea rows="1" class="col-md-4 form-control" placeholder="Email" name="inviterForm[email]" id="inviterForm_email"></textarea>';
        newmail += '</div>';
        newmail += '</div>';
        newmail +='</div>';
        newmail +='</div>';
        $('#mailsec').append(newmail);
        numbermail++;
     });
     
     
       $('#supprmail').click(function(){
	if (numbermail==0)
	{
		alert('Vous avez rien a supprimé');
	}
	else
	{
	if (confirm('Etes-vous sur de vouloir supprimer ce champ de saisie ?')) {
		
                numbermail--;
                $('.mails'+numbermail).remove();
                 
	}
	}

}
);

    </script>
