<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
        
        
        public function actionInviter()
	{
		$model=new inviterForm;
		if(isset($_POST['inviterForm']))
		{
			$model->attributes=$_POST['inviterForm'];
                        
			if($model->validate())
			{
                        /*    $email = Yii::app()->email;
                            $email->to = 'ay_mekdour@esi.dz';
                            //$email->subject = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
                            $email->message = $model->message;
                            $email->send();*/
			//	$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
			//	$headers="From: $name <{$model->email}>\r\n".
			//		"Reply-To: {$model->email}\r\n".
		//			"MIME-Version: 1.0\r\n".
		//			"Content-Type: text/plain; charset=UTF-8";

		//		mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
			 $to      = 'ay_mekdour@esi.dz';
                        $subject = 'le sujet';
                        $message = 'Bonjour !';
                        $headers = 'From: evaluation.rh.dz@gmail.com' . "\r\n" .
                        'Reply-To: evaluation.rh.dz@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                         if(mail($to, $subject, $message, $headers)){
                             Yii::app()->user->setFlash('Invitation','un message d\'invitation est envoyé');
				$this->refresh();
                             
                         }
                         else{
                             
                             
                         }
                            
                            Yii::app()->user->setFlash('Invitation','un message d\'invitation est envoyé');
				$this->refresh();
			}
		}
		$this->render('inviter',array('model'=>$model));

	}
        
        public function actionInviterUser()
	{
		$model=new inviterForm;
		if(isset($_POST['inviterForm']))
		{
			$model->attributes=$_POST['inviterForm'];
                        
			if($model->validate())
			{
                            $email = Yii::app()->email;
                            $email->to = 'ay_mekdour@esi.dz';
                            //$email->subject = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
                            $email->message = $model->message;
                            $email->send();
			//	$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
			//	$headers="From: $name <{$model->email}>\r\n".
			//		"Reply-To: {$model->email}\r\n".
		//			"MIME-Version: 1.0\r\n".
		//			"Content-Type: text/plain; charset=UTF-8";

		//		mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('Invitation','un message d\'invitation est envoyé');
				$this->refresh();
			}
		}
		$this->render('inviterUser',array('model'=>$model));

	}


        
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		$modelB=new CompteForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{ 
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
                if(isset($_POST['CompteForm']))
		{ 
			$modelB->attributes=$_POST['CompteForm'];
                        $hash = CPasswordHelper::hashPassword($modelB->mdp);
                        $modelB->mdp = $hash;
                        
                        if($modelB->id_entr != NULL){
                            $entreprise = Entreprise::model()->find('code_entr="'.$modelB->id_entr.'"');
                            if($entreprise != NULL){
                                $modelB->id_entr = $entreprise->id_entr;
                                $modelB->roles = Compte::$user_entr;
                            }
                        }else{
                            $modelB->id_entr = Entreprise::model()->find('nom_entr="public"')->id_entr;
                            $modelB->roles = Compte::$user_public;
                        }
			// validate user input and redirect to the previous page if valid
			if($modelB->save())
                        {
				$this->render('index');
                        }
                        $this->redirect($this->createUrl('index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model, 'modelB'=>$modelB));
                
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='compte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		//if(isset($_POST['LoginForm']))
	//	{
		//	$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
		//	if($model->validate() && $model->login())
		//		$this->redirect(Yii::app()->user->returnUrl);
	//	}
		
	}
        public function actionProfil()
        {
            $model=new Profil;
		if(isset($_POST['Profil']))
		{
			$model->attributes=$_POST['Profil'];
			if($model->validate())
			{
				$prenom='=?UTF-8?B?'.base64_encode($model->prenom).'?=';
				$nom='=?UTF-8?B?'.base64_encode($model->nom).'?=';
				$datenaissance='=?UTF-8?B?'.base64_encode($model->datenaissance).'?=';
				$email='=?UTF-8?B?'.base64_encode($model->email).'?=';
				$tel='=?UTF-8?B?'.base64_encode($model->tel).'?=';
				$pays='=?UTF-8?B?'.base64_encode($model->pays).'?=';
				$langue='=?UTF-8?B?'.base64_encode($model->langue).'?=';
				$linkedin='=?UTF-8?B?'.base64_encode($model->linkedin).'?=';
				$viadeo='=?UTF-8?B?'.base64_encode($model->nom).'?=';
                                
                                
				}
		}
		$this->render('profil',array('model'=>$model));

        }
        public function actionSecur()
        {
            $model=new Profil;
		if(isset($_POST['Profil']))
		{
			$model->attributes=$_POST['Profil'];
			if($model->validate())
			{
				$mdp='=?UTF-8?B?'.base64_encode($model->mdp).'?=';
		
                                
				}
		}
		$this->render('profil',array('model'=>$model));

        }
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        public function actionDemandeInscri()
	{
      		$this->render('DemandeInscri');
        }
        
     public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
     
}