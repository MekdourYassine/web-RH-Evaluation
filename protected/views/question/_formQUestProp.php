<style type="text/css">
   
    .input-group-addon{
  display: table;
    }

    .input-group{
        display: flex;
    }
    .input-group-addon questions{

        width: inherit;
    }
    .row{
    margin-right: 0px;
    margin-left: 0px;
    }
    
    @media (min-width: 768px)
    {.form-inline .input-group>.form-control {
        width: 100% !important;
    }
    }
    .input-group>.form-control {
        width: 100% !important;
      }
      
      .questions .btn-primary
      {
          margin-top: 0 !important;
      }
    
      .form-actions
      {
          margin: 5px 5px 5px 5px;
      }
</style>


<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'question-form',
    'enableAjaxValidation' => false,
    'id' => 'inlineForm',
    'type' => 'inline',
        ));
?>

<p class="help-block">Les champs avec <span class="required">*</span> sont obligatoires</p>

<?php echo $form->errorSummary($model); ?>


<div class="row questions">
    <div class="col-xs-3">
        <?php echo $form->textAreaGroup($model, 'enonce_quest', array('widgetOptions' => array('htmlOptions' => array('rows' => 2, 'cols' => 30, 'class' => 'span8')), 'prepend' => '<i class="glyphicon glyphicon-comment"></i>')); ?>
    </div>
    <div class=" col-xs-3 row">
        <div style="float: left">
      <?php echo CHtml::activeLabel($model,'Type: '); ?>
        </div>
        <div class="col-xs-10 addcase">
        <?php echo $form->dropDownListGroup(
                $model, 'id_typeQuest', array(
            'wrapperHtmlOptions' => array(
                'class' => 'span1',
            ),
            'widgetOptions' => array(
                'data' => array('choix multiples' => 'choix multiples', 'réponses multiples' => 'réponses multiples', 'réponse Libre' => 'réponse Libre', 'Avec image' => 'Avec image', 'Avec Son' => 'Avec Son', 'Avec Vidéo' => 'Avec Vidéo', 'zone identifiable sur image' => 'zone identifiable sur image', 'Matrices/grilles' => 'Matrices/grilles', 'Association' => 'Association', 'Textes à trou' => 'Textes à trou', 'à éléments ordonnés' => 'à éléments ordonnés', 'graduées/conditionnées' => 'graduées/conditionnées'),
                'htmlOptions' => array( 'id'=>'typeQuestion'),
            ), 'prepend' => '<i class="glyphicon glyphicon-th-list"></i>'
                )
        );
        ?>
            </div>
    </div>
    <div class="col-xs-2">
<?php echo $form->timePickerGroup($model, 'duree_quest', array('widgetOptions' => array('wrapperHtmlOptions' => array('class' => 'span1 timepicker'), 'options' => array('showMeridian' => false)))); ?> 
    </div>
    <div class="col-xs-2">
        <?php echo $form->textFieldGroup($model, 'nbr_tentatives_quest', array('widgetOptions' => array('htmlOptions' => array('class' => 'span8')), 'prepend' => '<i class="glyphicon glyphicon-check"></i>')); ?>
    </div>
    
    <div class="col-xs-2" id="liensec">
        <input style="display:none" class="span8 form-control" placeholder="Lien" type="url"
                  name="Question[lien_quest]" id="Question_lien" />
        
    </div>
    
</div>
<div class="row col-xs-4" id="buttonSec" style="display: block" >
        <div class="col-xs-6" style="margin-bottom:10px; margin-top: 10px;">
            <a class="btn btn-success" id="addProp">Ajouter une proposition</a>
        </div>

    <div class="col-xs-6" id="supp" style="margin-bottom:10px; margin-top: 10px; display: none; ">
            <a class="btn btn-warning" id="supprForm">Supprimer une proposition</a>
        </div>
      
</div>
<div class="col-xs-12">
    
</div>
<div id="propSection" class="row" style="display: list-item; list-style-type: none; ">
               
        </div>

<div class="form-actions row col-xs-12">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $modelB->isNewRecord ? 'Créer' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

<div class="row" id="result"></div>
<script>
    $("#result").load( "index.php?r=question&id_module=<?php echo $id_module; ?>");

    /* la fonction d'ajout d'un participant */
    var numberprop = 0;
    $('#addProp').click(function () {
       
         
        
        newProp = ' <div class="row col-xs-3 propsection'+numberprop+'">';
        newProp += '<div class="form-group">';
        newProp += '<div class="input-group">';
        newProp +='<span class="input-group-addon">';
        newProp +='<i class="glyphicon glyphicon-comment"></i>'
        newProp +='</span>';
        newProp +='<textarea rows="1" cols="30" class="span8 form-control" placeholder="Proposition" name="Proposition[desc_prop'+numberprop+']" id="Proposition_desc_prop'+numberprop+'"></textarea>';
        newProp +='</div>';
        newProp +='</div>';
        newProp +='<div class="form-group">';
        newProp +='<input id="ytProposition_reponse'+numberprop+'" type="hidden" value="" name="Proposition[reponse'+numberprop+']">';
        newProp +='<span id="Proposition_reponse'+numberprop+'">';
        newProp +='<label class="radio" style="margin-left: 20px; margin-top :10px;">';
        newProp +='<input placeholder="Réponse" id="Proposition_reponse_0" value="1" type="radio" name="Proposition[reponse'+numberprop+']">Bonne</label>';
        newProp +='<label class="radio" style="margin-left: 20px; margin-top :10px;">';
        newProp+='<input placeholder="Réponse" id="Proposition_reponse_1" value="0" type="radio" name="Proposition[reponse'+numberprop+']">Mauvaise</label>';
        newProp+='</span>';
        newProp+='</div>';
        $('#propSection').append(newProp);
        numberprop++;
        if (numberprop==1)
        $('#supp').css("display","block");

    });
    
    $("#typeQuestion").change(function(){
         var choix =$(this).val();
         if(choix.indexOf("Avec") == 0) $("#Question_lien").css("display", "block");
         else $("#Question_lien").css("display", "none");
         if (choix.indexOf("réponse Libre")==0)  
         {
             $("#buttonSec").css("display","none");
          
             $('#propSection').css("display","none");
             
        }
            else {$('#buttonSec').css("display","block");
                $('#propSection').css("display","block");
            }
        
    });
    
       $('#supprForm').click(function(){
	if (numberprop==0)
	{
		alert('Vous avez rien a supprimé');
	}
	else
	{
	if (confirm('Etes-vous sur de vouloir supprimer cette proposition ?')) {
		
                numberprop--;
                $('.propsection'+numberprop).remove();
                if (numberprop==0)
                    $("#supp").css("display","none");
                
	}
	}

}
);

   
    
</script>    
