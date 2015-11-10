    <section id="portfolio">
        <div class="container">
            <div class="center">
            <div class="center wow fadeInDown">
                <br>
               <h2>PERFORMANCE DES UTILISATEURS</h2> 
            </div>   
            <div class="center wow fadeInLeft">
            
                <h3> L'entreprise : <b><?php echo $model->nom_entr; ?></b> </h3>
                <br>
                <br>
                
               <p class="lead"><b>PAR MODULE :</b>  performance des utilisateurs dans un module.</p>
               <p class="lead"><b>PAR UTILISATEUR : </b> perofmance d'un utilisateur dans toutes ses évaluations dans un module</p>
            </div>   


            <ul class="portfolio-filter text-center">
                <li><a style="border: solid 2px #000;" class="btn btn-default" id="addEntr" href="" data-filter=".bootstrap">PAR MODULE</a></li>
                <li><a  style="border: solid 2px #000;" class="btn btn-default" id="addTest" href="" data-filter=".html">PAR UTILISATEUR</a></li>
            </ul><!--/#portfolio-filter-->

            </div>
            </div>
        
        <div id="result">
                
            </div>    
            
    </section><!--/#portfolio-item-->

    <script>
       $('#addEntr').click(function () {
           
         $("#result").empty();  
        $("#result").load( "index.php?r=module/indexPerfoAdminGen&id=<?php echo $model->id_entr ?>");
    });
    
      $('#addTest').click(function () {
        $("#result").empty();
        $("#result").load( "index.php?r=compte/index_perfoAdminGen&id=<?php echo $model->id_entr ?>");
    });
     
      
     
        </script>