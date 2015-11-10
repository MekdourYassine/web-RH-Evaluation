<?php

class CompteController extends Controller {

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
            array('allow', // Permet à n'importe qui d'accèder aux vues (index et view) 
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // Permet aux utilisateurs authentifiés d'acceder aux vues (update et updatesecur)
                'actions' => array('update', 'updatesecur'),
                'users' => array('@'),
            ),
            array('allow', // permet aux administrateurs des entreprises et aux admin Générale d'acceder aux vues (create, admin, delete)
                'actions' => array('create','admin', 'delete'),
                'roles' => array('admin','admin_entr'),
            ),
            array('allow', // permet au admin Générale d'acceder aux vues (index1, index2)
                'actions' => array('index1','index2','index_Perfo','viewPerfoUsers'),
                'roles' => array('admin_entr','admin'),
            ),
            array('allow', // permet au admin Générale d'acceder aux vues (index1, index2)
                'actions' => array('index_admin','index_perfo_pub','index_PerfoAdminGen','viewPerfoUsers','index2'),
                'roles' => array('admin'),
            ),
            
            array('allow', // permet au admin Générale d'acceder aux vues (index1, index2)
                'actions' => array('viewPerfoUsers'),
                'roles' => array('public','user_entr'),
            ),

            array('deny', // Interdit n'importe qu'elle autre cas
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id_entr) {
        $model = new Compte;
  
       
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Compte'])) {
            $model->attributes = $_POST['Compte'];
            $model->roles='admin_entr';

            $model->id_entr=intval($id_entr);
            //$hash = CPasswordHelper::hashPassword($model->mdp);
            //$model->mdp=$hash;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_compte));
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
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
       
        if (isset($_POST['Compte'])) {
            $model->attributes = $_POST['Compte'];
            $model->dateNaissance = $_POST['Compte']['dateNaissance'];
            $model->prenom = $_POST['Compte']['prenom'];
            
            if ($model->save())
            { 
                $this->redirect(array('view', 'id' => $model->id_compte));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionUpdatesecur($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Compte'])) {
            $model->attributes = $_POST['Compte'];
            if ($model->save())
                $this->redirect(array('view_secur', 'id' => $model->id_compte));
        }

        $this->render('updatesec', array(
            'model' => $model,
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

    /**
     * Lists all models.
     */
    public function actionIndex() {
    if (Yii::app()->user->checkAccess('admin_entr'))
    {
                                  
    $Compte = Compte::model()->find('id_compte="'.Yii::app()->user->id.'"');
    
    
    $Entreprise =  Entreprise::model()->find('id_entr="'.$Compte->id_entr.'"');


    $criteria=new CDbCriteria;
    if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }

    $criteria->addCondition('roles="user_entr" and id_entr="'.$Entreprise->id_entr.'"');
    $dataProvider=new CActiveDataProvider('Compte',  array(
                            'criteria'=>$criteria,
		));

            $this->render('index',array(
            'dataProvider'=>$dataProvider,
                ));
    }else
        if (Yii::app()->user->checkAccess('admin'))
    {
    

    $criteria=new CDbCriteria;
    if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }

    $criteria->addCondition('roles="public"');
    $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

            $this->render('index_pub',array(
            'dataProvider'=>$dataProvider,
                ));

    }
    
    }
    
    public function actionIndex_perfo_pub() {
    
    $criteria=new CDbCriteria;
    
    if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }

    
    $criteria->addCondition('roles="public"');
    $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

            $this->renderpartial('index_perfo_pub',array(
            'dataProvider'=>$dataProvider,
                ));

    
    }

    
    public function actionIndex_Perfo() {
    if (Yii::app()->user->checkAccess('admin_entr'))
    {
                                  
    $Compte = Compte::model()->find('id_compte="'.Yii::app()->user->id.'"');
    
    
    $Entreprise =  Entreprise::model()->find('id_entr="'.$Compte->id_entr.'"');


    $criteria=new CDbCriteria;
    $criteria->addCondition('roles="user_entr" and id_entr="'.$Entreprise->id_entr.'"');
    $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

$this->render('index_perfo',array(
'dataProvider'=>$dataProvider,
));
    }
    }
    
    
    public function actionIndex_PerfoAdminGen($id) {
   
     $criteria=new CDbCriteria;
     if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }

     
    $criteria->addCondition('roles="user_entr" and id_entr="'.$id.'"');
    $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

$this->renderPartial('index_perfo',array(
'dataProvider'=>$dataProvider,
));
    }
    

    
    
      public function actionviewPerfoUsers($id) {
         $compte = Compte::model()->find('id_compte='.$id);
         $performance_user_entrain = Compteperformanceentrainement::model()->findAll("id_compte=".$id);
         
         $performance_user_test = Compteperformancetest::model()->findAll("id_compte=".$id);
        // $performance_user_comp=  Compteperformancecompetition::model()->with('comptesCompetitions')->findAll("id_compte=".$id);
          $performance_user_comp = Compteperformancecompetition::model()
             ->with('competitions')->findAll("t.id_compte=".$id);

        // $comp= Competition::model()->find("id_comp=".$performance_user_comp->id_comp);
     
        $this->render('viewPerfoUsers', array(
            'performance_user_entrain' => $performance_user_entrain,
            'performance_user_test'=>$performance_user_test,
            'performance_user_comp'=>$performance_user_comp,
             'id' => $compte->id_compte,
            'model'=>$compte
                ));
       }
  
    
    
public function actionIndex1($id_entr) {
    
    if (Yii::app()->user->checkAccess('admin'))
    {
                                  
    

  $criteria=new CDbCriteria;
  
  if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }
  
  $criteria->addCondition('roles="user_entr" and id_entr="'.$id_entr.'"');
  $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

$this->render('index',array(
'dataProvider'=>$dataProvider,
));
    }
    
    }
    
 public function actionIndex2($id_entr) {
    
    if (Yii::app()->user->checkAccess('admin'))
    {
                                  
    

  $criteria=new CDbCriteria;
  if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom', $_GET['query']);
            $criteria->addSearchCondition('email', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('prenom', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('dateNaissance', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('numTel', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('pays', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('langue', $_GET['query'],true, 'OR');
       
        }
  $criteria->addCondition('roles="admin_entr" and id_entr="'.$id_entr.'"');
  $dataProvider=new CActiveDataProvider('Compte',  array(
			'criteria'=>$criteria,
		));

$this->render('index_admin',array(
'dataProvider'=>$dataProvider,
    'id_entr'=>$id_entr,
));
    }
    
    }
   

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Compte('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Compte']))
            $model->attributes = $_GET['Compte'];

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
        $model = Compte::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'compte-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
