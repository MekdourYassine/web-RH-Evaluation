<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <section id="portfolio">
        <div class="container">
            <div class="center">
            <div class="center wow fadeInDown">
                <br>
               <h2>CHOISISSEZ LE MODE</h2>
                <br>
            </div>
                <div class="center wow fadeInLeft">    
               <p class="lead"><b>Mode entraînement</b>  ce mode vous permet de vous entraîner avec un questionnaire composé de 20 questions. Vous êtes chronométré pour chaque question, et il vous faut trouver la bonne réponse à chaque question pour passer à la question suivante.</p>
               <p class="lead"><b>Mode test</b> ce mode vous permet de vous tester avec un questionnaire composé de 20 questions. Vous êtes chronométré pour chaque question. Vous validez vos réponses sans savoir s’il s’agit de la bonne ou de la mauvaise réponse. Une note vous est attribuée à la fin du questionnaire en fonction de vos réponses (1 point par bonne réponse).</p>
               <p class="lead"><b>Compétition</b> Les compétitions permettent aux utilisateurs du portail de se mesurer entre eux. Ces compétitions vous permettent également d’accéder à des questionnaires exclusifs et conçus pour les compétitions..</p>
                


            <ul class="portfolio-filter text-center">
                <li ><a style="border: solid 2px #000;" class="btn btn-default" id="addEntr" href="<?php echo $this->createUrl('/entrainement' , array('id_module'=>$model->id_module))?>" data-filter=".bootstrap">ENTRAÎNEMENT</a></li>
                <li><a style="border: solid 2px #000;" class="btn btn-default" id="addTest" href="<?php echo $this->createUrl('/test' , array('id_module'=>$model->id_module))?>" data-filter=".html">TEST</a></li>
                <li><a style="border: solid 2px #000;" class="btn btn-default" id="addComp"  href="<?php echo $this->createUrl('/competition' , array('id_module'=>$model->id_module))?>" data-filter=".wordpress">COMPETITION</a></li>
            </ul><!--/#portfolio-filter-->
                </div>
                </div>
            </div>
        
        <div id="result">
                
            </div>    
            
    </section><!--/#portfolio-item-->

    <script>
       $('#addEntr').click(function () {
           
         $("#result").empty();  
        $("#result").load( "index.php?r=entrainement/indexAjax&id_module=<?php echo $model->id_module; ?>");
    });
    
      $('#addTest').click(function () {
        $("#result").empty();
        $("#result").load( "index.php?r=test&id_module=<?php echo $model->id_module; ?>");
    });
     
      $('#addComp').click(function () {
          $("#result").empty();
        $("#result").load( "index.php?r=competition/indexAjax&id_module=<?php echo $model->id_module; ?>");
    });
     
     
        </script>