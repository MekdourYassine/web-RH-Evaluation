<style type="text/css">

    .progress, .progress-bar {
        background: rgba(197, 45, 47, 1);
    }
    li {
        list-style:none; 
    } 
    .time-logo 
    {
        line-height: 54px !important;
    }
</style>

<h1>Entraînement N°=<?php echo $id_entrain; ?></h1>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools |  Templates
 * and open the template in the editor.
 */
?>
<?php
$a = 1;
$questions_ids = [];
$propositions = [];

function getQuestionProposition($question, $index) {
    $propositions = $question->propositions;

    $propHtml = '<h2>' . $question->enonce_quest . '</h2>';
    if (count($propositions) == 0) {
        
    } else {
        if ($question->id_typeQuest == 2) {
            $propHtml.='<ul>';
            foreach ($propositions as $key => $value) {
                $propHtml .= '<li> <input value="' . $key . '" type="radio" name="radio_' . $index . '" id="' . $index . '_' . $key . '"/>  ' . $value->desc_prop . '</li>';
            }
            $propHtml .= '</ul>';
        } else {
            if ($question->id_typeQuest == 4) {
                $propHtml .= '<div class=col-md-12 style="margin-bottom:10px;"><div class="col-md-8"><textarea rows="3" class="form-control"></textarea></div></div> </br> </br>';
            }
            if ($question->id_typeQuest == 5) {
                $propHtml .= '<div class=col-md-12 style="margin-bottom:10px;"><div class="col-md-8"><img src="' . $question->lien_quest . '"> </img></div></div> </br> </br>';
                $propHtml.='<ul style="list-item:none;">';
                foreach ($propositions as $key => $value) {
                    $propHtml .= '<input type="hidden" name="' . $index . '_' . $key . '" value="0" />';
                    $propHtml .= '<li> <input value="1" type="checkbox" name="' . $index . '_' . $key . '" id="' . $index . '_' . $key . '" style="list-style:none;"/>  ' . $value->desc_prop . '</li>';
                }
                $propHtml .= '</ul>';
            }
            if ($question->id_typeQuest == 6) {
                $propHtml .= '<div class=col-md-12 style="margin-bottom:10px;"><div class="col-md-8"><audio src="' . $question->lien_quest . '" controls> </audio></div></div> </br> </br>';
                $propHtml.='<ul>';
                foreach ($propositions as $key => $value) {
                    $propHtml .= '<input type="hidden" name="' . $index . '_' . $key . '" value="0" />';
                    $propHtml .= '<li> <input value="1" name="' . $index . '_' . $key . '" id="' . $index . '_' . $key . '" type="checkbox"/>  ' . $value->desc_prop . '</li>';
                }
                $propHtml .= '</ul>';
            }
            if ($question->id_typeQuest == 7) {
                $propHtml .= '<div class=col-md-12 style="margin-bottom:10px;"><div class="col-md-8">'
                        . '<div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">'
                        . '<div class="embed-responsive embed-responsive-16by9">'
                        . '<iframe id="video-frame' . $question->id_quest . '" class="embed-responsive-item" src="' . $question->lien_quest . '" allowfullscreen=""></iframe></div></div>
                </div></div> </br> </br>';
                $propHtml.='<ul>';
                foreach ($propositions as $key => $value) {
                    $propHtml .= '<input type="hidden" name="' . $index . '_' . $key . '" value="0" />';
                    $propHtml .= '<li> <input value="1" name="' . $index . '_' . $key . '" id="' . $index . '_' . $key . '" type="checkbox"/>  ' . $value->desc_prop . '</li>';
                }
                $propHtml .= '</ul>';
            }
            if ($question->id_typeQuest == 3) {
                $propHtml .= '<ul>';
                foreach ($propositions as $key => $value) {
                    $propHtml .= '<input type="hidden" name="' . $index . '_' . $key . '" value="0" />';
                    $propHtml .= '<li> <input value="1" name="' . $index . '_' . $key . '" id="' . $index . '_' . $key . '" type="checkbox"/>  ' . $value->desc_prop . '</li>';
                }
                $propHtml .= '</ul>';
            }
        }
        $propHtml.='<input type="hidden" name="ten_' . $index . '" id="ten_' . $index . '" value="0"/>';
        $propHtml.='<input type="hidden" name="duree_' . $index . '" id="duree_' . $index . '"/>';
    }
    return $propHtml;
}

for ($index = 0; $index < count($questions); $index++) {
    $timer = '<div class="col-xs-12"><div class="countdown col-xs-4" style="float : right;"><h3 class="col-xs-5"> Temps écoulé : </h3><h3 class="col-xs-3" id="clock_' . $index . '"> </h3> <img src="images/images.jpg" class="col-xs-2 time-logo" width="40" height="35"></img></div></div>';
    $questions_ids[$index] = array(
        'label' => CHtml::encode('Question N°' . $a),
        'content' => "" . $timer . getQuestionProposition($questions[$index], $index),
        'pagerContent' => ''
    );
    $a = $a + 1;
}

function getArrayProposition($questions) {
    $code = '';
    $code .= '[';
    for ($index = 0; $index < count($questions); $index++) {
        $propositions = $questions[$index]->propositions;
        $code .= '[';
        foreach ($propositions as $key => $value) {
            $code .= $value->reponse;
            if ($key != count($propositions))
                $code .= ',';
        }
        $code .= ']';
        if ($index != count($questions))
            $code .= ',';
    }
    $code .= ']';
    return $code;
}

function getArrayQuestions($questions) {
    $code = '';
    $code .= '[';
    for ($index = 0; $index < count($questions); $index++) {
        $question = $questions[$index];
        $duree = 60000 * explode(':', $question->duree_quest)[0] + 1000 * explode(':', $question->duree_quest)[1];
        $code .= '{"duree":' . $duree . ', "id_quest":' . $question->id_quest .', "duree_quest":"' . $question->duree_quest .'"}';
        if ($index != count($questions))
            $code .= ',';
    }
    $code .= '];';
    return $code;
}

function timerRun($questions) {
    $code = '';
    for ($index = 0; $index < count($questions); $index++) {
        $question = $questions[$index];
        $code .= 'function start_' . $index . '(){';
        $code .= 'var date = new Date(new Date().getTime() + 60000*' . explode(':', $question->duree_quest)[0]
                . '+ 1000 *' . explode(':', $question->duree_quest)[1] . ');';
        $code .= "$('#clock_" . $index . "').countdown(date)";
        $code .= ".on('update.countdown', function (event) {
    var format = '%M:%S';
    $(this).html(event.strftime(format));
    })
    .on('finish.countdown', function (event) {
    $(this).html('This offer has expired!')
    .parent().addClass('disabled')
    });";
        $code .= '}';
    }
    return $code;
}
?>

<?php
$this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'entrainement-form',
    'enableAjaxValidation' => false,
));
?>

<?php
$this->widget(
        'booster.widgets.TbWizard', array(
    'type' => 'pills', // 'tabs' or 'pills'
    'pagerContent' => '<div class=col-xs-12><div class="col-xs-3"style="float:right">
        <input type="button" class="btn button-next btn-success" name="next" value="Question suivante" />
    </div>
    </div>
    <div style="float:left">

    </div><br /><br />',
    'options' => array(
        'nextSelector' => '.button-next',
        // 'previousSelector' => '.button-previous',
        // 'firstSelector' => '.button-first',
        'lastSelector' => '.button-last',
        'onNext' => 'js:function(tab, navigation, index) {
                return onClickNext(tab, navigation, index);
    }',
        'onTabClick' => 'js:function(tab, navigation, index){return false;}',
    ),
    'tabs' => $questions_ids
        ,
        )
);
?> 
<div><h4><b class='valid-resp'></b></h4></div>

<div class="form-actions col-xs-12">
    <div class="col-xs-6" id="bouton" style=" float: right; display: none;">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'id' => 'valid-form',
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Valider',
            'size' => 'large'
        ));
        ?>
    </div>
</div>
<br />
<?php $this->endWidget(); ?>


<div id="wizard-bar" class="progress progress-striped active" style="margin-top : 40px;">
    <div class="progress-bar"  style="width: 0"></div>
</div>
<script>
    var questTable = <?php echo getArrayQuestions($questions) ?>;
    var questPropArray = <?php echo getArrayProposition($questions) ?>;
    var isForce = false;
    function getDiffrence(date1, date2) {
        var d1 = date1.split(':', 2);
        var d2 = date2.split(':', 2);
        m = parseInt(d1[0]) - parseInt(d2[0]);
        s1 = parseInt(d1[1]);
        s2 = parseInt(d2[1]);
        if (s2 > s1) {
            m -= 1;
            s1 += 60;
        }
        s = s1 - s2+1;
        return m + ":" + s;
    }
    function startCounter(index) {

        var date = new Date(new Date().getTime() + questTable[index].duree);
        $("#clock_" + index).countdown(date)
                .on('update.countdown', function (event) {
                    var format = '%M:%S';
                    $(this).html(event.strftime(format));
                    if ($(this).html() === '00:03') {
                        $(this).css('color', 'red');
                        $(this).css('font-weight', 'bold');
                        $(this).pulsate({color: "#09f"});

                    }
                    var nbr_quest;
                    nbr_quest = questTable.length - 1;
                    if (($(this).html() === '00:01') && (index === nbr_quest))
                    {

                        document.getElementById('valid-form').click();

                    }

                })
                .on('finish.countdown', function (event) {
                    isForce = true;
                    $(".button-next").click();
                    $("#ten_" + index).val(parseInt($("#ten_" + index).val()) + 1);


        $(".valid-resp").text("");
                    //$('#yw0').bootstrapWizard('next');
                });
    }
    function onClickNext(tab, navigation, index) {
        startCounter(index);
        index = index - 1;
        var reponseArray = questPropArray[index];
        var $total = navigation.find("li").length;
        var $current = index + 2;
        var $percent = ($current / $total) * 100;
        if ($percent === 100)
        {
            $("#bouton").css('display', 'block');
        }
        $("#wizard-bar > .progress-bar").css({width: $percent + "%"});
        if (!isForce)
            for (i = 0; i < reponseArray.length; i++) {
                var resp = reponseArray[i] ? true : false;
                $("#ten_" + index).val(parseInt($("#ten_" + index).val()) + 1);
                if ($("#" + index + "_" + i).is(":checked") != resp) {
                    $(".valid-resp").text("Vous devez choisir la ou les  bonnes réponses");
                    $(".valid-resp").css("color", "red");
                    return false;
                }
                $(".valid-resp").text("");
            }
        var date1 = questTable[index].duree_quest;
        var date2 = $("#clock_" + index).html();
        console.log(date1);
        console.log(date2);
        console.log(getDiffrence(date1, date2));
        $("#duree_" + index).val(getDiffrence(date1, date2));
        $("#clock_" + index).countdown('stop');

        return true;

    }
    startCounter(0);


    function getEmbedUrlOfVideo(url) {
        if (url !== undefined) {
            if (url.length > 0) {
                var youtube_rx = /^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/;
                var vimeo_rx = /https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/;
                // var daily_motion_rx= /^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/;
                var ma = url.match(vimeo_rx);
                if (ma) {
                    return '//player.vimeo.com/video/' + ma[3];
                }
                var maa = url.match(youtube_rx);
                if (maa) {
                    return 'https://www.youtube.com/embed/' + maa[1];
                }
                /* var maaa = url.match(daily_motion_rx);
                 if (maaa) {
                 console.log(url);
                 return 'https://www.youtube.com/embed/' + maa[1];
                 }*/
            }
        }
        return undefined;
    }
    ;

    $(document).ready(function () {
        for (var i = 0; i < questTable.length; i++) {
            var id = 'video-frame' + questTable[i].id_quest;
            $('#' + id).attr('src', getEmbedUrlOfVideo($('#' + id).attr('src')));
        }
    });
</script>