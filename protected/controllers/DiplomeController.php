<?php

class DiplomeController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/


public function actionCreate()
{
$model=new Diplome;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Diplome']))
{
$model->attributes=$_POST['Diplome'];
$model->id_compte = Yii::app()->user->id;
$model->date_obtention=$_POST['Diplome']['date_obtention'];
// Uncomment the following line if AJAX validation is needed


if($model->save())
$this->redirect(array('view','id'=>$model->id_diplome));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Diplome']))
{
$model->attributes=$_POST['Diplome'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_diplome));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
    $criteria=new CDbCriteria;
    if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_diplome', $_GET['query']);
            $criteria->addSearchCondition('date_obtention', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('type_diplome', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('etablissement_diplome', $_GET['query'],true, 'OR');
            
        }
    $criteria->addCondition('id_compte='.Yii::app()->user->id);
    $dataProvider=new CActiveDataProvider('Diplome',  array(
			'criteria'=>$criteria,
		));

$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Diplome('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Diplome']))
$model->attributes=$_GET['Diplome'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Diplome::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='diplome-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
