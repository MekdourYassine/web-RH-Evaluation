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
            <h2>Résultat de l'entraînement N° :<?php echo $id_entrain; ?></h2>
        </div>
        <div class="row" style="text-align: center;">
            <h2 style=""> Votre score est : <b> <?php echo $modelPer->score; ?> %</b></h2> <hint></hint>

        </div>  
        <br>
        <br>

        <div class="CSSTableGenerator col-lg-12"  >
            <table >
                <tr>
                    <td class="col-lg-1">N°</td>
                    <td class="col-lg-6">Question</td>
                    <td class="col-lg-2">Réponse</td>
                    <td class="col-lg-1">Durée</td>
                    <td class="col-lg-1">Tentatives</td>

                </tr>
                <?php
                
                for ($index = 0; $index < count($modelRep); $index++) {
                    $rep =($modelRep[$index]->rep_compte) ? 'Bonne': 'Mauvaise';
                    echo '<tr>
                        <td >
                            '.$modelRep[$index]->id_quest.'
                        </td>
                        <td>
                            '.$modelRep[$index]->idQuest->enonce_quest.' 
                        </td>';
                            if ($rep=='Bonne')
                            {
                                echo '<td style= color:#1ECD2E;">
                                '.$rep.'
                                </td>';
                            }
                        else {
                             echo '<td style= color:#F42B11;">
                                '.$rep.'
                                </td>';
                        }  
                        echo '<td>
                            '.$modelRep[$index]->duree.'
                        </td>
                        <td>
                            '.$modelRep[$index]->idQuest->nbr_tentatives_quest.'
                        </td>
                    </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</section>
