<style type="text/css">
    .CSSTableGenerator {
        margin:0px;padding:0px;
        width:100%;
        box-shadow: 10px 10px 5px #888888;
        border:1px solid #000000;

        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;

        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;

        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;

        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }.CSSTableGenerator table{
        border-collapse: collapse;
        border-spacing: 0;
        width:100%;
       // height:50%;
        margin:0px;padding:0px;
    }.CSSTableGenerator tr:last-child td:last-child {
        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;
    }.CSSTableGenerator tr:last-child td:first-child{
        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;
    }.CSSTableGenerator tr:hover td{

    }
    .CSSTableGenerator tr:nth-child(odd){ background-color:#e5e5e5; }
    .CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
        vertical-align:middle;


        border:1px solid #000000;
        border-width:0px 1px 1px 0px;
        text-align:left;
        padding:7px;
        font-size:14px;
        font-family: sans-serif;
        font-weight:bold;
        color:#000000;
    }.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator tr:first-child td{
        background:-o-linear-gradient(bottom, #ffffff 5%, #e5e5e5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #e5e5e5) );
        background:-moz-linear-gradient( center top, #ffffff 5%, #e5e5e5 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#e5e5e5");	background: -o-linear-gradient(top,#ffffff,e5e5e5);

        background-color:#ffffff;
        border:0px solid #000000;
        text-align:center;
        border-width:0px 0px 1px 1px;
        font-size:15px;
        font-family:sans-serif;
        font-weight:bold;
        color:#191919;
    }
    .CSSTableGenerator tr:first-child:hover td{
        background:-o-linear-gradient(bottom, #ffffff 5%, #e5e5e5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #e5e5e5) );
        background:-moz-linear-gradient( center top, #ffffff 5%, #e5e5e5 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#e5e5e5");	background: -o-linear-gradient(top,#ffffff,e5e5e5);

        background-color:#ffffff;
    }
    .CSSTableGenerator tr:first-child td:first-child{
        border-width:0px 0px 1px 0px;
    }
    .CSSTableGenerator tr:first-child td:last-child{
        border-width:0px 0px 1px 1px;
    }
#recent-works {
  padding-bottom: 40px;
}


</style>

<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <br>
            <h2>Performance de l'utilisateur : <?php echo $model->nom; ?></h2>
        </div>
        <div class="row" style="text-align: center;">
            <h2 style=""> Choissisez le type de questionnnaire  : </h2> <hint></hint>
            <br>
        </div>
        </div>
    
</section>

<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default portfolio-filter text-center">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
          ENTRAÎNEMENT
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <br>
            <h4>Peformance des entraînements </h4>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5" style="float: left;">    
        <div class="CSSTableGenerator">
            <table >
                <tr>
                    <td class="col-lg-1">Entraînement</td>
                    <td class="col-lg-2">Score (%)</td>
                    <td class="col-lg-1">Temps écoulé</td>
                    <td class="col-lg-1">Detail</td>
  
                </tr>
                
                 <?php
                
                for ($index = 0; $index < count($performance_user_entrain); $index++) {
                    //$rep =($DataProvider[$index]->rep_compte) ? 'Bonne': 'Mauvaise';
                    echo '<tr>
                        <td >
                            '.$performance_user_entrain[$index]->id_entrain.'
                        </td>
                        <td>
                            '.$performance_user_entrain[$index]->score.' 
                        </td>
                        <td>
                                '.$performance_user_entrain[$index]->score.'
                        </td>
                        <td>
                            <a href="?r=entrainement/viewPerfoEntrainUserEntr&id_entrain='.$performance_user_entrain[$index]->id_entrain.'&id_user='.$id.'">Afficher</a>
                        </td>
                        </tr>';
                }
                ?>
                
                </table>
        </div>
         </div>   
            <?php
       
            $record=array();
            for ($index = 0; $index < count($performance_user_entrain); $index++) {
                    
                    $record[$index]['type']='column';
                    $record[$index]['name']=$performance_user_entrain[$index]->id_entrain;
                    $record[$index]['data']=array(intval($performance_user_entrain[$index]->score));
            }
                
            
            ?>
            
            <div class="col-xs-12 col-sm-4 col-md-6">
             
                 <?php 
            $this->Widget('ext.highcharts.HighchartsWidget', array(
   'scripts' => array(
        'modules/exporting',
        'themes/sand-signika',
    ),
    'options'=>array(
        'chart'=> array(
            'type'=> 'bar'),
      'title' => array('text' => 'Performance de l\'utilisateur: '.$model->nom),
        'subtitle'=> array(
            'text'=>'Pour tous les entraînements'
        ),
      'xAxis' => array(
         'categories' => array('score')
      ),
      'yAxis' => array(
         'max'=> 100,
         'title' => array(
             'text' => 'Score (sur 100)',
             'align'=> 'high',
             
             )
      ),
      'tooltip'=> array(
                'shared'=>true,
				//Ajout d'une unité de mesure lors du survole d'un point du graphique
		'valueSuffix'=> '%',
         ),
        'plotOptions'=> array(
            'bar'=> array(
                'dataLabels'=> array(
                    'enabled'=> true,
                )
            )
        ),
       'credits'=> array(
            'enabled'=>false,
        ),
      'series' =>$record
      
          
   )
));
?>

      </div>
      </div>
    </div>
</section>
      </div>
    </div>
  </div>
  <div class="panel panel-default portfolio-filter text-center ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          TEST
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">    
     <section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <br>
            <h4>Peformance des tests </h4>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5" style="float: left;">    
        <div class="CSSTableGenerator">
            <table >
                <tr>
                    <td class="col-lg-1">Test</td>
                    <td class="col-lg-2">Score (%)</td>
                    <td class="col-lg-1">Temps écoulé</td>
                    <td class="col-lg-1">Detail</td>
  
                </tr>
                
                 <?php
                
                for ($index = 0; $index < count($performance_user_test); $index++) {
                    //$rep =($DataProvider[$index]->rep_compte) ? 'Bonne': 'Mauvaise';
                    echo '<tr>
                        <td >
                            '.$performance_user_test[$index]->id_test.'
                        </td>
                        <td>
                            '.$performance_user_test[$index]->score.' 
                        </td>
                        <td>
                                '.$performance_user_test[$index]->score.'
                        </td>
                        <td>
                            <a href="?r=test/viewPerfoTestUserEntr&id_test='.$performance_user_test[$index]->id_test.'&id_user='.$id.'">Afficher</a>
                        </td>
                        </tr>';
                }
                ?>
                
                </table>
        </div>
         </div>   
            <?php
       
            $record=array();
            for ($index = 0; $index < count($performance_user_test); $index++) {
                    
                    $record[$index]['type']='column';
                    $record[$index]['name']=$performance_user_test[$index]->id_test;
                    $record[$index]['data']=array(intval($performance_user_test[$index]->score));
            }
                
            
            ?>
            
            <div class="col-xs-12 col-sm-4 col-md-6">
             
                 <?php 
            $this->Widget('ext.highcharts.HighchartsWidget', array(
   'scripts' => array(
        'modules/exporting',
        'themes/sand-signika',
    ),
    'options'=>array(
        'chart'=> array(
            'type'=> 'bar'),
      'title' => array('text' => 'Performance de l\'utilisateur: '.$model->nom),
        'subtitle'=> array(
            'text'=>'Pour tous les tests'
        ),
      'xAxis' => array(
         'categories' => array('score')
      ),
      'yAxis' => array(
         'max'=> 100,
         'title' => array(
             'text' => 'Score (sur 100)',
             'align'=> 'high',
             
             )
      ),
      'tooltip'=> array(
                'shared'=>true,
				//Ajout d'une unité de mesure lors du survole d'un point du graphique
		'valueSuffix'=> '%',
         ),
        'plotOptions'=> array(
            'bar'=> array(
                'dataLabels'=> array(
                    'enabled'=> true,
                )
            )
        ),
       'credits'=> array(
            'enabled'=>false,
        ),
      'series' =>$record
      
          
   )
));
?>

        </div>
        </div>
    </div>
     </section>
      </div>
    </div>
  </div>
<?php if (Yii::app()->user->checkAccess('public')) {} else { ?>
  <div class="panel panel-default portfolio-filter text-center ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          COMPETITION
        </a>
      </h4>
    </div> 
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
     <section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <br>
            <h4>Peformance des compétition </h4>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5" style="float: left;">    
        <div class="CSSTableGenerator">
            <table >
                <tr>
                    <td class="col-lg-1">Compétition</td>
                    <td class="col-lg-2">Score (%)</td>
                    <td class="col-lg-1">Temps écoulé</td>
                    <td class="col-lg-1">Detail</td>
  
                </tr>
                
                 <?php
                
                for ($index = 0; $index < count($performance_user_comp); $index++) {
                    //$rep =($DataProvider[$index]->rep_compte) ? 'Bonne': 'Mauvaise';
                    echo '<tr>
                        <td >
                            '.$performance_user_comp[$index]->competitions[0]->nom_comp.'
                        </td>
                        <td>
                            '.$performance_user_comp[$index]->score.' 
                        </td>
                        <td>
                                '.$performance_user_comp[$index]->score.'
                        </td>
                        <td>
                            <a href="?r=competition/viewPerfoCompUserForEntr&id_comp='.$performance_user_comp[$index]->id_comp.'&id_user='.$id.'">Afficher</a>
                        </td>
                        </tr>';
                }
                ?>
                
                </table>
        </div>
         </div>   
            <?php
       
            $record=array();
            for ($index = 0; $index < count($performance_user_comp); $index++) {
                    
                    $record[$index]['type']='column';
                    $record[$index]['name']=$performance_user_comp[$index]->competitions[0]->nom_comp;
                    $record[$index]['data']=array(intval($performance_user_comp[$index]->score));
            }
                
            
            ?>
            
            <div class="col-xs-12 col-sm-4 col-md-6">
             
                 <?php 
            $this->Widget('ext.highcharts.HighchartsWidget', array(
   'scripts' => array(
        'modules/exporting',
        'themes/sand-signika',
    ),
    'options'=>array(
        'chart'=> array(
            'type'=> 'bar'),
      'title' => array('text' => 'Performance de l\'utilisateur: '.$model->nom),
        'subtitle'=> array(
            'text'=>'Pour toutes les compétitions'
        ),
      'xAxis' => array(
         'categories' => array('score')
      ),
      'yAxis' => array(
         'max'=> 100,
         'title' => array(
             'text' => 'Score (sur 100)',
             'align'=> 'high',
             
             )
      ),
      'tooltip'=> array(
                'shared'=>true,
				//Ajout d'une unité de mesure lors du survole d'un point du graphique
		'valueSuffix'=> '%',
         ),
        'plotOptions'=> array(
            'bar'=> array(
                'dataLabels'=> array(
                    'enabled'=> true,
                )
            )
        ),
       'credits'=> array(
            'enabled'=>false,
        ),
      'series' =>$record
      
          
   )
));
            ?>

        </div>
        </div>
    </div>
     </section> </div>
    </div>
  </div>
<?php  }?>  
</div>
<?php $this->endWidget(); ?>


<script>
    $('#addEntr').click(function () {
           
         $("#result").empty();  
        $("#result").load( "index.php?r=entrainement/viewPerfoUserAllEntrain&id_compte=<?php// echo $model->id_compte; ?>");
    });
    
      $('#addTest').click(function () {
        $("#result").empty();
        $("#result").load( "index.php?r=test&id_module=<?php //echo $model->id_module; ?>");
    });
     
      $('#addComp').click(function () {
          $("#result").empty();
        $("#result").load( "index.php?r=competition&id_module=<?php //echo $model->id_module; ?>");
    });
     
     
        </script>
