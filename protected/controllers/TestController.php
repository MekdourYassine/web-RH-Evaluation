<?php

class TestController extends Controller {

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
                'actions' => array('index', 'view','ViewTestPub'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array('admin', 'admin_entr'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','index_perfo','viewPerfoUsersEntr','viewPerfoTestUserEntr'),
                'roles' => array('admin','admin_entr'),
            ),
            
            array('allow',  // allow all users to perform 'index' and 'view' actions
            'actions'=>array('viewTestUser','viewPerfoTest','viewPerfoTestUserEntr','viewPerfoUsersEntr'),
            'roles'=>array('user_entr','public'),
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
    public function actionView($id) {
       
        $criteria = new CDbCriteria;
        $criteria->with = array('tests' => 
            array( 'condition'=>'`tests`.`id_test`=' .$id, 'together'=>true));
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
        $model = new Test;
        $modelB = new Question;
        $modelC = new Proposition;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Test'])) {
            $model->attributes = $_POST['Test'];
            $compte = Compte::model()->find('email="' . Yii::app()->user->name . '"');
            $model->id_module = intval($id_module);
            $model->auteur_test = $compte->nom;
            if ($model->save()) {
                    if (isset($_POST['quest'])) {
                        foreach ($_POST['quest'] as $key => $value) {
                            $questionTest = new Questionappartenirtest;
                            $questionTest->id_quest = $key;
                            $questionTest->id_test = $model->id_test;
                            $questionTest->save();
                        }
                    
                    $this->redirect(array('view','id'=>$model->id_test) );
     
                    }
                    
                //$this->redirect(array('view','id'=>$model->id_test));
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
        
        $this->render('create', array('model' => $model, 'dataProvider' => $dataProvider, 'modelB' => $modelB, 'modelC' => $modelC,'id_module'=>$id_module));
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

        if (isset($_POST['Test'])) {
            $model->attributes = $_POST['Test'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_test));
        }
        $criteria = new CDbCriteria;
        $criteria->with = array('tests' => 
            array( 'condition'=>'`tests`.`id_test`=' .$id, 'together'=>true));
        //$criteria->addCondition("`entrainements`.`id_entrain`=" . $id);
        //$criteria->compare('id_entrain', $id);
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
        $this->render('update', array(
            'DataProvider' => $dataProvider,
              'model' => $model
        ));       
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
    
    $criteria = new CDbCriteria;
    $test= Test::model()->find('id_test='.$id);
    $criteria->addCondition('id_module="'.$test->id_module.'"');
    $dataProvider=new CActiveDataProvider('Test',  array(
			'criteria'=>$criteria,
		));
    $this->loadModel($id)->delete();
    $this->render('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$test->id_module,
        ));
  

            
            
    }

    /**
     * Lists all models.
     */
    public function actionIndex($id_module) {
        $criteria = new CDbCriteria;
         if (isset($_GET['query'])) {
            $criteria->addSearchCondition('id_test', $_GET['query']);
            $criteria->addSearchCondition('auteur_test', $_GET['query']);
      
        }
        $criteria->addCondition('id_module=' .$id_module);
        $dataProvider = new CActiveDataProvider('Test', array(
            'criteria' => $criteria,
        ));
         if (Yii::app()->user->checkAccess('user_entr')||Yii::app()->user->checkAccess('public') ) 
             {
          $this->renderpartial('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
             }
          else 
          {
           $this->render('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
        
          }
              
          }
      public function actionIndex_perfo($id_module) {
        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('id_test', $_GET['query']);
            $criteria->addSearchCondition('auteur_test', $_GET['query']);
      
        }
        $criteria->addCondition('id_module=' . $id_module);
        $criteria->with=array("comptes");
        $dataProvider= new CActiveDataProvider('Test', array(
            'criteria' => $criteria,));
        $this->renderPartial('index_perfo', array(
            'dataProvider' => $dataProvider,
            'id_module' => $id_module,
        ));
           }


 public function actionViewTestPub ()
    {
 
       $model = Test::model()->find(array(
          'select'=>'*, rand() as rand',
          'condition'=>'auteur_test=:auteur_test',
          'params'=>  array(':auteur_test'=>"admin"), 
            'limit'=>'1',
            'order'=>'rand'
      
        ));
    $id_test=$model->id_test;
           $score=0;
       $questions = Question::model()->with('tests','propositions')->findAll("tests.id_test=".$id_test);
       
       if (count($_POST) > 0) {
                     $this->redirect(array('/site/demandeInscri'));
        }
       
        $this->render('viewTestUser', ['questions'=>$questions, 'id_test'=>$id_test]);

    }            
           
public function actionViewTestUser($id_test)
{
       $score=0;
       $questions = Question::model()->with('tests','propositions')->findAll("tests.id_test=".$id_test);
       
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
                    } /*catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }*/
                    //if (isset($_POST[$index.'_'.$key]))
                
                $reponse = new Compterepondretestproposition;
                
                $reponse->id_compte = Yii::app()->user->id;
                $reponse->id_quest = $questions[$index]->id_quest;
                $reponse->id_test= $id_test;
                $res = Compterepondretestproposition::model()->find
                        ("id_compte=".$reponse->id_compte." and id_quest=".$reponse->id_quest." and id_test=".$id_test);
                if($res != null) $reponse = $res;
                $reponse->rep_compte = ($isTrue) ? 1:0;
                  if ($reponse->rep_compte==1) $score=$score+1;
           
                $reponse->save();
                
                 
            }
                $score=$score/ count($questions)*100;
                $performance =new Compteperformancetest(); 
                $performance->id_compte = Yii::app()->user->id;
                $performance->id_test =$id_test;
                $per = Compteperformancetest::model()->find
                        ("id_compte=".$performance->id_compte." and id_test=".$performance->id_test);
                if ($per !=null) $performance=$per;
                $performance->score=$score;
                if ($performance->save())
                     $this->redirect(array('viewPerfoTest','id_test'=>$id_test));
        }
       
        $this->render('viewTestUser', ['questions'=>$questions, 'id_test'=>$id_test]);
            
}
          public function actionviewPerfoTest ($id_test)
    {
        $modelPer= Compteperformancetest::model()->find 
                ("id_compte=".Yii::app()->user->id." and id_test=".$id_test);
        $modelRep = Compterepondretestproposition::model()->with('idQuest')->findAll
                ("id_compte=".Yii::app()->user->id." and id_test=".$id_test);
        
        $this->render('viewPerfoTest',array('modelPer' => $modelPer,'modelRep'=>$modelRep, 'id_test' => $id_test));

    }
    public function actionviewPerfoTestUserEntr($id_test,$id_user) {
        // $modelRep = new Compterepondrequestionentrainement;
        $modelPer = Compteperformancetest::model()->find
                ("id_compte=" . $id_user. " and id_test=" . $id_test);

        $modelRep = Compterepondretestproposition::model()->with('idQuest')->findAll
                ("id_compte=" . $id_user. " and id_test=" . $id_test);
        $this->render('viewPerfoTest', array('modelPer' => $modelPer, 'modelRep' => $modelRep,
            'id_test' => $id_test));
    }
    
    
    public function actionviewPerfoUsersEntr($id_test) {
        
        // meme id entreprise
     
        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        //$id_entr = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"')->id_entr;

      // $performance_user=Entrainement::model()->with('comptes')->findAll
        //("t.id_entrain=".$id_entrain);
       
        $criteria = new CDbCriteria;
        $criteria->with = array('tests' => 
            array( 'condition'=>'`tests`.`id_test`=' .intval($id_test), 'together'=>true));
        /*$dataProvider = new CActiveDataProvider('Compte', array(
            'criteria' => $criteria,
        ));*/
     $performance_user = Compte::model()
             ->with('comptesTests')->findAll("comptesTests.id_test=".$id_test);
     foreach ($performance_user as $key => $value){
         //Compteperformanceentrainement::model()->find('id_compte='.$value->id_compte);
     }
        $this->render('viewPerfoUsersEntr', array(
            'performance_user' => $performance_user,
             'id_test' => $id_test,
        ));
      
    }
    
          
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Test('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Test']))
            $model->attributes = $_GET['Test'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Test::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'test-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function php2JsTime($phpDate){
    //echo $phpDate;
    //return "/Date(" . $phpDate*1000 . ")/";
    return date("m/d/Y H:i", $phpDate);
}

    public function php2MySqlTime($phpDate){
    return date("Y-m-d H:i:s", $phpDate);
}


}
