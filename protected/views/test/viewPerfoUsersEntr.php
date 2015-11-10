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
    //    height:50%;
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


</style>
<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <br>
            <h2>Résultat du test N° :<?php echo $id_test; ?></h2>
        </div>
        <div class="row" style="text-align: center;">
       
        </div>  
        <br>
        <br>
        <div class="row" >
        <div class="col-xs-12 col-sm-4 col-md-5" style="float: left;">    
        <div class="CSSTableGenerator ">
            <table >
                <tr>
                    <td class="col-lg-1">Utilisateur</td>
                    <td class="col-lg-2">E-mail</td>
                    <td class="col-lg-1">Score (%)</td>
                    <td class="col-lg-1">Temps écoulé</td>
                    <td class="col-lg-1">Detail</td>
  
                </tr>
                
                 <?php
                
                for ($index = 0; $index < count($performance_user); $index++) {
                    //$rep =($DataProvider[$index]->rep_compte) ? 'Bonne': 'Mauvaise';
                    echo '<tr>
                        <td >
                            '.$performance_user[$index]->nom.'
                        </td>
                        <td>
                            '.$performance_user[$index]->email.' 
                        </td>
                        <td>
                                '.$performance_user[$index]->comptesTests[0]->score.'
                        </td>
                         <td>
                                '.$performance_user[$index]->comptesTests[0]->score.'
                        </td>
                       
                        <td>
                            <a href="?r=test/viewPerfoTestUserEntr&id_test='.$id_test.'&id_user='.$performance_user[$index]->id_compte.'">Afficher</a>
                        </td>
                        </tr>';
                }
                ?>
                
                </table>
        </div>
        </div>
            <?php
       
            $record=array();
            
            
            for ($index = 0; $index < count($performance_user); $index++) {
                    
                    $record[$index]['type']='column';
                    $record[$index]['name']=$performance_user[$index]->nom;
                    $record[$index]['data']=array(intval($performance_user[$index]->comptesTests[0]->score));
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
      'title' => array('text' => 'Performance des utilisateurs'),
        'subtitle'=> array(
            'text'=>'Pour le test N°'.$id_test
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
