<?php

class QuestionController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','indexNoAjax','view_quest','delete_quest_test'),
                'roles' => array('admin', 'admin_entr'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin','admin_entr'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionView_quest($id) {
        
        $criteria = new CDbCriteria;
        //$criteria->with = array('propositions');
        $criteria->addCondition('id_quest="' . $id . '"');
        $dataProvider = new CActiveDataProvider('Proposition', array(
            'criteria' => $criteria,
        ));
        
        $this->render('view_quest', array(
            'model' => $this->loadModel($id), 'DataProvider'=>$dataProvider
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id_module) {
        $model = new Question;
        $modelB = new Proposition;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Question'])) {
            
            $model->attributes = $_POST['Question'];
            $model->lien_quest=$_POST['Question']['lien_quest'];
            $model->id_module = intval($id_module);
                // TODO update question type names in database 
            $typequestion = Typequestion::model()->find('typeQuest="' . $model->id_typeQuest . '"');    
            $model->id_typeQuest = intval($typequestion->id_typeQuest);

            if ($model->save()) {
                if (isset($_POST['Proposition'])) {
                    $propositions = $_POST['Proposition'];
                    for ($i = 0; $i < count($propositions)/2; $i++) {
                        $prop = new Proposition;
                        $prop->desc_prop = $propositions['desc_prop'.$i];
                        $prop->reponse = $propositions['reponse'.$i];
                        $prop->id_quest = $model->id_quest;
                        $prop->save();
                    }
                }
            }
            $this->redirect(array('create','id_module'=>$model->id_module) );
        }


        if (isset($_POST['Prosition'])) {
            $modelB->attributes = $_POST['Proposition'];
            $modelB->id_quest = $model->id_quest;

            if ($modelB->save())
                $this->redirect(array('view', 'id' => $modeBl->id_quest));
        }
        //$Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        //$Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');
        //$Module = Module::model()->find('id_entr="' . $Entreprise->id_entr . '"');
        
        $criteria = new CDbCriteria;
        $criteria->with = array("propositions");
        $criteria->addCondition('id_module="' . $id_module . '"');
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
        
        //$data = $dataProvider->data;
        //$props = $dataProvider->data[0]->propositions;
        $questionWithProp = Question::model()->with('propositions')->findAll();
        $tab = $questionWithProp;
        $this->render('create', array('model' => $model,
            'dataProvider' => $dataProvider, 
            'modelB' => $modelB, 'id_module' => $id_module));
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

        if (isset($_POST['Question'])) {
            $model->attributes = $_POST['Question'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_quest));
        }
        
        $criteria = new CDbCriteria;
        //$criteria->with = array('propositions');
        $criteria->addCondition('id_quest="' . $id . '"');
        $dataProvider = new CActiveDataProvider('Proposition', array(
            'criteria' => $criteria,
        ));
        $this->render('update', array(
            'model' => $model,'DataProvider'=>$dataProvider
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    public function actionDelete_quest_test($id_quest, $id_test) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $link= Questionappartenirtest::model()->find("id_quest=".$id_quest." and id_test=".$id_test);
            
            $link->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($id_module) {
        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('id_quest', $_GET['query']);
            $criteria->addSearchCondition('enonce_quest', $_GET['query']);
      
        }
        $criteria->with = array('propositions');
        $criteria->addCondition('id_module="' . $id_module . '"');
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
         
        $this->renderPartial('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    public function actionIndexNoAjax($id_module) {
        $criteria = new CDbCriteria;
        $criteria->with = array('propositions');
        $criteria->addCondition('id_module="' . $id_module . '"');
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
         
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Question('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Question']))
            $model->attributes = $_GET['Question'];

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
        $model = Question::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'question-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
