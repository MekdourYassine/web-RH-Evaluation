<?php

class ModuleController extends Controller {

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
                'actions' => array('index', 'ViewPub','view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete', 'admin','index_perfo','indexComp'),
                'roles' => array('admin', 'admin_entr'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin', 'admin_entr'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('listemodule'),
                'roles' => array('user_entr','public'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('perfor'),
                'roles' => array('admin_entr','admin'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('indexPerfoAdminGen','indexAdminGenModules','indexModuleEntr','viewModuleEntr'),
                'roles' => array('admin'),
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
    public function actionViewPub($id) {
        $this->render('viewPub', array(
            'model' => $this->loadModel($id),
        ));
    }
    
    public function actionViewModuleEntr($id) {
        $this->render('viewModuleEntr', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Module;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Module'])) {
            $model->attributes = $_POST['Module'];
            $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
            $Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');
            $model->id_entr = $Entreprise->id_entr;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_module));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = Module::model()->with('questions1')->find('t.id_module=' . $id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Module'])) {
            $model->attributes = $_POST['Module'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_module));
        }
        $criteria = new CDbCriteria;
        $criteria->addCondition('id_module='. $id);
        //$criteria->compare('id_module',$id);
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => $criteria,
        ));
        $quest = new Question;
        $this->render('update', array(
            'model' => $model, 'questDataProvider' => $dataProvider, 'filter' => $quest
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        
        $criteria = new CDbCriteria;
    $test= Test::model()->find('id_module='.$id);
    $dataProvider=new CActiveDataProvider('Module',  array(
			'criteria'=>$criteria,
		));
    $this->loadModel($id)->delete();
    $this->render('index', array(
           'dataProvider' => $dataProvider,
        ));
  
        
        
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        
        if (Yii::app()->user->checkAccess('public'))
        {
            $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }    
            
        $criteria->addCondition('id_entr="8"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
            
        }
        else 
        {
        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        $Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');

        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('id_entr="' . $Entreprise->id_entr . '"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    }
    public function actionIndexComp() {
        
       if (Yii::app()->user->checkAccess('admin_entr'))
        {
        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        $Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');

        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('id_entr="' . $Entreprise->id_entr . '"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->render('indexComp', array(
            'dataProvider' => $dataProvider,
        ));
    
        }else 
         if (Yii::app()->user->checkAccess('public'))   
        {
        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('comp_Is_public=0');
        $dataProvider = new CActiveDataProvider('Competition', array(
            'criteria' => $criteria,
        ));

        $this->render('indexComp', array(
            'dataProvider' => $dataProvider,
        ));
 
        }
        
        }
    
    public function actionIndexAdminGenModules($id) {

        
        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('id_entr="' . $id. '"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->render('indexModuleEntr', array(
            'dataProvider' => $dataProvider,
        ));
    }
    public function actionIndexPerfoAdminGen($id) {

        $criteria = new CDbCriteria;
        if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('id_entr="' . $id. '"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->renderPartial('index_perfo', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    public function actionIndex_perfo() {

        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        $Entreprise = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"');

        $criteria = new CDbCriteria;
         if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_module', $_GET['query']);
      
        }
        $criteria->addCondition('id_entr="' . $Entreprise->id_entr . '"');
        $dataProvider = new CActiveDataProvider('Module', array(
            'criteria' => $criteria,
        ));

        $this->render('index_perfo', array(
            'dataProvider' => $dataProvider,
        ));
    }


    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Module('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Module']))
            $model->attributes = $_GET['Module'];

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
        $model = Module::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionListemodule($id) {
        if (Yii::app()->user->checkAccess('user_entr'))
        {                        
        $this->render('listemodule', array(
            'model' => $this->loadModel($id),
        ));
        }else
            if (Yii::app()->user->checkAccess('public'))
        {                        
        $this->render('listemodule_pub', array(
            'model' => $this->loadModel($id),
        ));
        }
            
    }
    
    
        public function actionPerfor($id) {
        $this->render('perfor', array(
            'model' => $this->loadModel($id),
        ));
    }


    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'module-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
