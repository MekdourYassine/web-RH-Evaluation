<body>
        
    <div>
      <div id="calhead" style="padding-left:1px;padding-right:1px;">          
            <div class="cHead"><div class="ftitle"><?php echo CHtml::link(Yii::app()->name, Yii::app()->controller->createUrl( '/' ) ); ?></div>
            <div id="loadingpannel" class="ptogtitle loadicon" style="display: none;">Chargement des données...</div>
             <div id="errorpannel" class="ptogtitle loaderror" style="display: none;">Erreur, chargement impossible, Réésseyer</div>
            </div>          
            
            <div id="caltoolbar" class="ctoolbar">
              <div id="faddbtn" class="fbutton">
                <?php if( ! array_key_exists( 'readonly', $this->module->wd_options ) || $this->module->wd_options[ 'readonly' ] != 'JS:true' ) : // TODO make this prettier ?>
                    <div>
                        <span title='Cliquer pour créer un nouveau évènement' class="addcal">
                            Nouveau événement               
                        </span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="btnseparator"></div>
             <div id="showtodaybtn" class="fbutton">
                <div><span title='Cliquer pour afficher le calendrier journalière' class="showtoday">
                Aujourd'hui</span></div>
            </div>
              <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Cliquer pour afficher le calendrier par jour' class="showdayview">Jour</span></div>
            </div>
              <div  id="showweekbtn" class="fbutton fcurrent">
                <div><span title='Cliquer pour afficher le calendrier par semaine' class="showweekview">Semaine</span></div>
            </div>
              <div  id="showmonthbtn" class="fbutton">
                <div><span title='Cliquer pour afficher le calendrier par mois' class="showmonthview">Mois</span></div>

            </div>
            <div class="btnseparator"></div>
              <div  id="showreflashbtn" class="fbutton">
                <div><span title='Rafraichir' class="showdayflash">Rafraichir</span></div>
                </div>
             <div class="btnseparator"></div>
            <div id="sfprevbtn" title="Précedent"  class="fbutton">
              <span class="fprev"></span>

            </div>
            <div id="sfnextbtn" title="suivant" class="fbutton">
                <span class="fnext"></span>
            </div>
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="txtdatetimeshow">Date</span>

                    </div>
            </div>
            
            <div class="clear"></div>
            </div>
      </div>
      <div style="padding:1px;">

        <div class="t1 ">
            &nbsp;</div>
        <div class="t2 chromeColor">
            &nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;">
            </div>
        </div>
        <div class="t2 chromeColor">

            &nbsp;</div>
        <div class="t1 chromeColor">
            &nbsp;
        </div>   
        </div>
        
  </div>
