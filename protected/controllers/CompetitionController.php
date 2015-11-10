<?php

class CompetitionController extends Controller
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
'actions'=>array('create','update','indexAjax','index_perfo','viewPerfoUsersEntr','viewPerfoCompUserForEntr','compPub','indexPub'),
'roles'=>array('admin','admin_entr'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('delete'),
'roles'=>array('admin_entr'),
),    
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('indexCompPub','view_pub','indexPub'),
'users'=>array('*'),
),
    
    
 array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('viewCompUser','index_perfo','indexAjax','viewPerfoCompUser','viewPerfoCompUserForEntr'),
'roles'=>array('user_entr'),
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
        $criteria = new CDbCriteria;
        $criteria->with = array('competitions' => 
            array( 'condition'=>'`competitions`.`id_comp`=' .$id, 'together'=>true));
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

public function actionView_pub($id)
{
        $module= Module::model()->find('id_module='.$this->loadModel($id)->id_module);
        $entreprise=  Entreprise::model()->find('id_entr='.$module->id_entr);
        $this->render('view_pub', array(
              'model' => $this->loadModel($id),
              'module'=>$module,
              'entreprise'=>$entreprise,  
            ));
}

public function actionviewPerfoCompUser ($id_comp)
{
    $comp=  Competition::model()->find('id_comp='.$id_comp);
    $this->render('viewPerfoCompUser', array(
              'id_comp' => $id_comp, 'comp'=>$comp
        ));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id_module)
{
$model=new Competition;
$modelB=new Question;
$modelC=new Proposition;


// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Competition']))
{
$model->attributes=$_POST['Competition'];
$model->date_debut_comp=$_POST['Competition']['date_debut_comp'];
$model->date_fin_comp=$_POST['Competition']['date_fin_comp'];
$model->id_module= intval($id_module);

if($model->save())
if (isset($_POST['quest'])) {
                        foreach ($_POST['quest'] as $key => $value) {
                            $questionComp = new Questionappartenircompetition;
                            $questionComp->id_quest = $key;
                            $questionComp->id_comp = $model->id_comp;
                            $questionComp->save();
                            
                            
                    
                        }
                    $Compte=  Compte::model()->find('id_compte='.yii::app()->user->id);
                    $Entreprise = Entreprise::model()->find('id_entr='.$Compte->id_entr);
                     $event= new Jqcalendar;
                    $event->id_entr=$Entreprise->id_entr;
                    $event->Subject='Competition '.$model->nom_comp;
                    
                    $event->StartTime=$model->date_debut_comp;
                    $event->EndTime=$model->date_fin_comp;
                    $event->Description=$model->description_comp;
                    $event->Location=$Entreprise->nom_entr;
                    
                    $event->IsAllDayEvent=0;
                    $event->Color=rand(0, 20);
                    $event->save();

                $this->redirect(array('view','id'=>$model->id_comp) );
     
                    
                       
                        
                    }
}


   if (isset($_POST['Question'])) {

            $modelB->attributes = $_POST['Question'];
            $modelB->lien_quest=$_POST['Question']['lien_quest'];
            $modelB->id_module = intval($id_module);

            $typequestion = Typequestion::model()->find('typeQuest="' . $modelB->id_typeQuest . '"');
            $modelB->id_typeQuest = intval($typequestion->id_typeQuest);

            if ($modelB->save()) {
                if (isset($_POST['Proposition'])) {
                    $propositions = $_POST['Proposition'];
                    for ($i = 0; $i < count($propositions)/2; $i++) {
                        $prop = new Proposition;
                        $prop->desc_prop = $propositions['desc_prop'.$i];
                        $prop->reponse = $propositions['reponse'.$i];
                        $prop->id_quest = $modelB->id_quest;
                        $prop->save();
                    }
                }
            }
            $this->redirect(array('create','id_module'=>$modelB->id_module) );
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
 
        $this->render('create', array('model' => $model,'dataProvider' => $dataProvider, 'modelB' => $modelB, 'modelC'=>$modelC,'id_module'=>$id_module));


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

if(isset($_POST['Competition']))
{
$model->attributes=$_POST['Competition'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_comp));
}

        $criteria = new CDbCriteria;
        $criteria->with = array('competitions' =>array( 'condition'=>'`competitions`.`id_comp`=' .$id, 'together'=>true));
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

public function actionCompPub($id) {
       // we only allow deletion via POST request
        $id_module= Competition::model()->find('id_comp='.$id)->id_module; 
        $comp=new Competition;   
         $comp=$this->loadModel($id);
         $comp->comp_Is_public=0;
         $comp->save();

           $criteria=new CDbCriteria;
           if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_comp', $_GET['query']);
            $criteria->addSearchCondition('date_debut_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('date_fin_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('niveau_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('categorie_comp', $_GET['query'],true, 'OR');
        }
           $criteria->addCondition('id_module="'.$id_module.'"');
           $dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));

           $this->render('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
        
          }
public function actionIndexCompPub() {
        
         $criteria = new CDbCriteria;
         if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_comp', $_GET['query']);
            $criteria->addSearchCondition('date_debut_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('date_fin_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('niveau_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('categorie_comp', $_GET['query'],true, 'OR');
        }
        $criteria->addCondition('comp_Is_public=0');
        $dataProvider = new CActiveDataProvider('Competition', array(
            'criteria' => $criteria,
        ));

        $this->render('indexPub', array(
            'dataProvider' => $dataProvider,
        ));
 
        }
        
              
          
          
       // $this->render(array('index','id_moduel' => $id_module));
      
         
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
 

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
    $criteria = new CDbCriteria;
    $competition= Competition::model()->find('id_comp='.$id);
    $criteria->addCondition('id_module="'.$competition->id_module.'"');
    $dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));

// we only allow deletion via POST request
    $this->loadModel($id)->delete();
                
    $this->render('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$competition->id_module,
        ));
  
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
}
/**
* Lists all models.
*/
public function actionIndex($id_module)
{
  $criteria=new CDbCriteria;
$criteria->addCondition('id_module="'.$id_module.'"');
$dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));

 if (Yii::app()->user->checkAccess('user_entr')) 
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
public function actionIndexPub($id_module)
{
  $criteria=new CDbCriteria;
$criteria->addCondition('id_module="'.$id_module.'" and comp_Is_public=0');
$dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));

 if (Yii::app()->user->checkAccess('user_entr')) 
             {
          $this->renderpartial('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
             }
          else 
          {
           $this->render('indexPub', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
        
          }
           
}
public function actionIndexAjax ($id_module)
{
$criteria=new CDbCriteria;
$criteria->addCondition('id_module="'.$id_module.'"');
$dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));
       $this->renderpartial('index', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
}

public function actionIndex_perfo ($id_module)
{
$criteria=new CDbCriteria;
if (isset($_GET['query'])) {
            $criteria->addSearchCondition('nom_comp', $_GET['query']);
            $criteria->addSearchCondition('date_debut_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('date_fin_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('niveau_comp', $_GET['query'],true, 'OR');
            $criteria->addSearchCondition('categorie_comp', $_GET['query'],true, 'OR');
        }
$criteria->addCondition('id_module="'.$id_module.'"');
$dataProvider=new CActiveDataProvider('Competition',  array(
			'criteria'=>$criteria,
		));
       $this->renderpartial('index_perfo', array(
           'dataProvider' => $dataProvider,
            'id_module' =>$id_module,
        ));
   
  
}


public function actionViewCompUser($id_comp) {
        $score = 0;
        $comp=  Competition::model()->find('id_comp="'.$id_comp.'"');
        $questions = Question::model()->with('competitions', 'propositions')->findAll("competitions.id_comp=" . $id_comp);
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
                } /* catch (Exception $exc) {
                  echo $exc->getTraceAsString();
                  } */
                //if (isset($_POST[$index.'_'.$key]))

                $reponse = new Compterepondrequestioncompetition;

                $reponse->id_compte = Yii::app()->user->id;
                $reponse->id_quest = $questions[$index]->id_quest;
                $reponse->id_comp = $id_comp;
                $res = Compterepondrequestioncompetition::model()->find
                        ("id_compte=" . $reponse->id_compte . " and id_quest=" . $reponse->id_quest . " and id_comp=" . $id_comp);
                if ($res != null)
                    $reponse = $res;
                $reponse->rep_compte = ($isTrue) ? 1 : 0;
                if ($reponse->rep_compte==1) $score=$score+1;
           
                $reponse->save();
            }
            $score = $score / count($questions) * 100;
            $performance = new Compteperformancecompetition;
            $performance->id_compte = Yii::app()->user->id;
            $performance->id_comp = $id_comp;
            $per = Compteperformancecompetition::model()->find
                    ("id_compte=" . $performance->id_compte . " and id_comp=" . $performance->id_comp);
            if ($per != null)
                $performance = $per;
            $performance->score = $score;
            if ($performance->save())
                
                $this->redirect(array('viewPerfoCompUser','id_comp' => $id_comp));
        }
        $this->render('viewCompUser', ['questions' => $questions, 'id_comp' => $id_comp,'comp'=>$comp]);
    }





    public function actionviewPerfoUsersEntr($id_comp) {
        
        // meme id entreprise
     
     
      // $performance_user=Entrainement::model()->with('comptes')->findAll
        //("t.id_entrain=".$id_entrain);
       
        $Compte = Compte::model()->find('id_compte="' . Yii::app()->user->id . '"');
        $id_entr = Entreprise::model()->find('id_entr="' . $Compte->id_entr . '"')->id_entr;
        $comp=  Competition::model()->find('id_comp="'.$id_comp.'"');


      // $performance_user=Entrainement::model()->with('comptes')->findAll
        //("t.id_entrain=".$id_entrain);
       
        $criteria = new CDbCriteria;
        $criteria->with = array('competitions' => 
            array( 'condition'=>'`competitions`.`id_comp`=' .intval($id_comp), 'together'=>true));
        /*$dataProvider = new CActiveDataProvider('Compte', array(
            'criteria' => $criteria,
        ));*/
     $performance_user = Compte::model()
             ->with('comptesCompetitions')->findAll("comptesCompetitions.id_comp=".$id_comp);
     foreach ($performance_user as $key => $value){
         //Compteperformanceentrainement::model()->find('id_compte='.$value->id_compte);
     }
        $this->render('viewPerfoUsersEntr', array(
            'performance_user' => $performance_user,
             'id_comp' => $id_comp,
            'comp'=>$comp,
        ));

    }
    
    public function actionviewPerfoCompUserForEntr($id_comp,$id_user) {
        // $modelRep = new Compterepondrequestionentrainement;
        $modelPer = Compteperformancecompetition::model()->find
                ("id_compte=" . $id_user. " and id_comp=" . $id_comp);

        $modelRep = Compterepondrequestioncompetition::model()->with('idQuest')->findAll
                ("id_compte=" . $id_user. " and id_comp=" . $id_comp);
        $comp=Competition::model()->find("id_comp=".$id_comp);
        $user=Compte::model()->find("id_compte=".$id_user);
        $this->render('viewPerfoCompUserForEntr', array('modelPer' => $modelPer, 'modelRep' => $modelRep,
            'id_comp' => $id_comp,'comp'=>$comp, 'user'=>$user));
    }

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Competition('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Competition']))
$model->attributes=$_GET['Competition'];

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
$model=Competition::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='competition-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
