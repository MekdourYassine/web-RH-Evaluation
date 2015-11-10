<?php

class EntrainementController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','viewEntrainUser','ViewEntrainPub'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','indexAjax','index_perfo','viewPerfoUsersEntr','viewPerfoEntrainUserEntr','viewPerfoUserAllEntrain'),
                'roles' => array('admin_entr', 'admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('admin','admin_entr'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('viewEntrainUser', 'viewPerfoEntrain','indexAjax','viewPerfoEntrainUserEntr'),
                'roles' => array('user_entr','public'),
            ),
            
             
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
  /*  public function beforeAction($action)
    {
        
   if(!isset(Yii::app()->user->user_id) && !($action->controller->id == 'site' && $action->id == 'login'))
        {   
            $this->redirect(array('site/login')); 
        }
return true; 

        }*/
    
    public function actionView($id) {

        //$questions = Question::model()->find('id_quest=' .$model->id_quest);
        $criteria = new CDbCriteria;
        $criteria->with = array('entrainements' => 
            array( 'condition'=>'`entrainements`.`id_entrain`=' .$id, 'together'=>true));
        //$criteria->addCondition("`entrainements`.`id_entrain`=" . $id);
        //$criteria->compare('id_entrain', $id);
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
        $this->render('view', array(
            'questDataProvider' => $dataProvider,
              'model' => $this->loadModel($id)
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id_module) {


        $model = new Entrainement;
        $modelB = new Question;
        $modelC = new Proposition;


// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Entrainement'])) {

            $model->attributes = $_POST['Entrainement'];

            $compte = Compte::model()->find('email="' . Yii::app()->user->name . '"');
            $model->id_module = intval($id_module);

            $model->auteur_entrain = $compte->nom;

            if ($model->save())
                if (isset($_POST['quest'])) {
                    foreach ($_POST['quest'] as $key => $value) {
                        $questionEntrainement = new Questionappartenirentrainement;
                        $questionEntrainement->id_quest = $key;
                        $questionEntrainement->id_entrain = $model->id_entrain;
                        $questionEntrainement->save();
                        
                        
                    }
               $this->redirect(array('view','id'=>$model->id_entrain) );
     
                }
        }

        if (isset($_POST['Question'])) {

            $modelB->attributes = $_POST['Question'];
            $modelB->lien_quest = $_POST['Question']['lien_quest'];
            $modelB->id_module = intval($id_module);

            $typequestion = Typequestion::model()->find('typeQuest="' . $modelB->id_typeQuest . '"');
            $modelB->id_typeQuest = intval($typequestion->id_typeQuest);

            if ($modelB->save()) {
                if (isset($_POST['Proposition'])) {
                    $propositions = $_POST['Proposition'];
                    for ($i = 0; $i < count($propositions) / 2; $i++) {
                        $prop = new Proposition;
                        $prop->desc_prop = $propositions['desc_prop' . $i];
                        $prop->reponse = $propositions['reponse' . $i];
                        $prop->id_quest = $modelB->id_quest;
                        $prop->save();
                    }
                }
            }
            $this->redirect(array('create', 'id_module' => $modelB->id_module));
        }
        if (isset($_POST['Prosition'])) {
            $modelC->attributes = $_POST['Proposition'];
            $modelC->id_quest = $modelB->id_quest;

            if ($modelC->save())
                $this->redirect(array('view', 'id' => $modelC->id_quest));
        }
        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        $Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');
        $Module = Module::model()->find('id_entr="' . $Entreprise->id_entr . '"');
        $criteria = new CDbCriteria;
        $criteria->addCondition('id_module="' . $Module->id_module . '"');
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));

        $this->render('create', array('model' => $model, 'dataProvider' => $dataProvider, 'modelB' => $modelB, 'modelC' => $modelC, 'id_module' => $id_module));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Entrainement'])) {
            $model->attributes = $_POST['Entrainement'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_entrain));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {

    $criteria = new CDbCriteria;
    $entrainement= Entrainement::model()->find('id_entrain='.$id);
    $criteria->addCondition('id_module="'.$entrainement->id_module.'"');
    $dataProvider=new CActiveDataProvider('Entrainement',  array(
			'criteria'=>$criteria,
		));
    $this->loadModel($id)->delete();
    $this->render('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$entrainement->id_module,
        ));
  
}
            
           
    /**
     * Lists all models.
     */
    public function actionIndex($id_module) {
        $this->render('index', array(
            'dataProvider' => $this->getListDataProvider($id_module),
            'id_module' => $id_module,
        ));
    }
    public function actionIndexAjax($id_module) {
        $this->renderPartial('index', array(
            'dataProvider' => $this->getListDataProvider($id_module),
            'id_module' => $id_module,
        ));
    }
    public function getListDataProvider($id_module) {
        $criteria = new CDbCriteria;
         if (isset($_GET['query'])) {
            $criteria->addSearchCondition('id_entrain', $_GET['query']);
            $criteria->addSearchCondition('auteur_entrain', $_GET['query'],true, 'OR');
            
       
        }

        $criteria->addCondition('id_module=' . $id_module);
        return new CActiveDataProvider('Entrainement', array(
            'criteria' => $criteria,
        ));
    }
    public function actionIndex_perfo($id_module) {
        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('id_entrain', $_GET['query']);
            $criteria->addSearchCondition('auteur_entrain', $_GET['query'],true, 'OR');
        }
        $criteria->addCondition('id_module=' . $id_module);
        $criteria->with=array("comptes");
        $dataProvider= new CActiveDataProvider('Entrainement', array(
            'criteria' => $criteria,));
        $this->renderPartial('index_perfo', array(
            'dataProvider' => $dataProvider,
            'id_module' => $id_module,
        ));
    
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Entrainement('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Entrainement']))
            $model->attributes = $_GET['Entrainement'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function actionViewEntrainPub ()
    {
 
       $model = Entrainement::model()->find(array(
          'select'=>'*, rand() as rand',
          'condition'=>'auteur_entrain=:auteur_entrain',
          'params'=>  array(':auteur_entrain'=>"admin"), 
            'limit'=>'1',
            'order'=>'rand'
      
        ));
    $id_entrain=$model->id_entrain;    
    
    $score = 0;
        $questions = Question::model()->with('entrainements', 'propositions')->findAll("entrainements.id_entrain=" . $id_entrain);
        if (count($_POST) > 0) {
                $this->redirect(array('/site/DemandeInscri'));
        }
        $this->render('viewEntrainUser', ['questions' => $questions, 'id_entrain' => $id_entrain]);
    }
    
    public function actionViewEntrainUser($id_entrain) {
        $score = 0;
        $durre_tot;
        $questions = Question::model()->with('entrainements', 'propositions')->findAll("entrainements.id_entrain=" . $id_entrain);
        if (count($_POST) > 0) {
            for ($index = 0; $index < count($questions); $index++) {
                $propositions = $questions[$index]->propositions;
                $isTrue = TRUE;
                foreach ($propositions as $key => $value) {
                    //try {
                    if ($questions[$index]->id_typeQuest == 2) {
                        if (isset($_POST['radio_' . $index])) {
                            if ($value->reponse != intVal($key == intVal($_POST['radio_' . $index]))) {
                                $isTrue = FALSE;
                            }
                        }
                    } else if ($value->reponse != $_POST[$index . '_' . $key]) {
                        $isTrue = FALSE;
                    }
                }
                /* catch (Exception $exc) {
                  echo $exc->getTraceAsString();
                  } */
                //if (isset($_POST[$index.'_'.$key]))

                $reponse = new Compterepondrequestionentrainement;

                $reponse->id_compte = Yii::app()->user->id;
                $reponse->id_quest = $questions[$index]->id_quest;
                $reponse->id_entrain = $id_entrain;
                $res = Compterepondrequestionentrainement::model()->find
                        ("id_compte=" . $reponse->id_compte . " and id_quest=" . $reponse->id_quest . " and id_entrain=" . $id_entrain);
                if ($res != null)
                    $reponse = $res;
                $reponse->rep_compte = ($isTrue) ? 1 : 0;
                 if ($reponse->rep_compte==1) $score=$score+1;
                 if ($index == count($questions)- 1 )
                    $reponse->duree= $questions[$index]->duree_quest;
                 else {
                $y = $index;
                $ro= count($questions); 
                 $reponse->duree = $_POST["duree_".$index];
               
                 
                 }
                 $reponse->save();
            }
            $score = $score / count($questions) * 100;
            $performance = new Compteperformanceentrainement;
            $performance->id_compte = Yii::app()->user->id;
            $performance->id_entrain = $id_entrain;
            $per = Compteperformanceentrainement::model()->find
                    ("id_compte=" . $performance->id_compte . " and id_entrain=" . $performance->id_entrain);
            if ($per != null)
                $performance = $per;
            $performance->score =round($score, 2);
            
            
             
            
            if ($performance->save())
                $this->redirect(array('viewPerfoEntrain', 'id_entrain' => $id_entrain));
        }
        $this->render('viewEntrainUser', ['questions' => $questions, 'id_entrain' => $id_entrain]);
    }
    function heure_to_secondes($heure){
	$array_heure=explode(":",$heure);
	$secondes=3600*$array_heure[0]+60*$array_heure[1]+$array_heure[2];
	return $secondes;
}

    
    public function actionviewPerfoUsersEntr($id_entrain) {
        
        // meme id entreprise
     
        //$Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        //$id_entr = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"')->id_entr;

      // $performance_user=Entrainement::model()->with('comptes')->findAll
        //("t.id_entrain=".$id_entrain);
       
        $criteria = new CDbCriteria;
        $criteria->with = array('entrainements' => 
            array( 'condition'=>'`entrainements`.`id_entrain`=' .intval($id_entrain), 'together'=>true));
        /*$dataProvider = new CActiveDataProvider('Compte', array(
            'criteria' => $criteria,
        ));*/
     $performance_user = Compte::model()
             ->with('comptesEntrainements')->findAll("comptesEntrainements.id_entrain=".$id_entrain);
     foreach ($performance_user as $key => $value){
         //Compteperformanceentrainement::model()->find('id_compte='.$value->id_compte);
     }
        $this->render('viewPerfoUsersEntr', array(
            'performance_user' => $performance_user,
             'id_entrain' => $id_entrain,
        ));
      
    }

    
    public function actionviewPerfoEntrain($id_entrain) {
        // $modelRep = new Compterepondrequestionentrainement;
        $modelPer = Compteperformanceentrainement::model()->find
                ("id_compte=" . Yii::app()->user->id . " and id_entrain=" . $id_entrain);


        $modelRep = Compterepondrequestionentrainement::model()->with('idQuest')->findAll
                ("id_compte=" . Yii::app()->user->id . " and id_entrain=" . $id_entrain);
        $this->render('viewPerfoEntrain', array('modelPer' => $modelPer, 'modelRep' => $modelRep,
            'id_entrain' => $id_entrain));
    }
    public function actionviewPerfoEntrainUserEntr($id_entrain,$id_user) {
        // $modelRep = new Compterepondrequestionentrainement;
        $modelPer = Compteperformanceentrainement::model()->find
                ("id_compte=" . $id_user. " and id_entrain=" . $id_entrain);

        $modelRep = Compterepondrequestionentrainement::model()->with('idQuest')->findAll
                ("id_compte=" . $id_user. " and id_entrain=" . $id_entrain);
        $this->render('viewPerfoEntrain', array('modelPer' => $modelPer, 'modelRep' => $modelRep,
            'id_entrain' => $id_entrain));
    }
    
    public function actionViewPerfoUserAllEntrain($id_compte)
    {
        
     $performance_user_entrain = Compteperformanceentrainement::model()->findAll("id_compte=".$id_compte);
     
        $this->render('viewPerfoUserAllEntrain', array(
           'performance_user_entrain' => $performance_user_entrain,
             'id_compte' => $id_compte,
        ));
    }
    
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Entrainement::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'entrainement-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
