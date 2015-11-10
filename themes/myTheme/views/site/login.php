<link rel="stylesheet" type="text/css" href="themes/myTheme/css/style3.css" />

<div id="container_demo" >

    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper" style="margin-bottom: 40px;">
        <div id="login" class="animate form">
            <div class="form">
                <?php
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => TRUE,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>
                <h1>Se connecter</h1> 

                <div class="row">
                    <label for="LoginForm_username" class="required" data-icon="u">Nom d'utilisateur <span class="required">*</span></label>		
                    <?php echo $form->textField($model, 'username'); ?>	
                    <?php echo $form->error($model, 'username'); ?>
                </div>

                <div class="row">
                    <label for="LoginForm_password" class="required" data-icon="p">Mot de passe <span class="required">*</span></label>	
                    <?php echo $form->passwordField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>

                </div>

                <div class="row rememberMe">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <label for="LoginForm_rememberMe">souvenir de mois</label>	
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </div>

                <p class="login button"> 
                    <input type="submit" name="yt0" value="Connecter" />
                </p>
                <p class="change_link">
                    vous n'êtes pas un membre?
                    <a href="#" class="to_register" id="toinscrit">s'inscrire</a>
                </p>

                <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>

        <div id="register" class="animate form">
            <div class="form">

                <?php
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'user-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>



                <?php echo $form->errorSummary($user); ?>
                <h1> S'inscrire</h1> 

                <div class="row">
                    <label for="User_username" class="required" class="uname" data-icon="u">Nom d'utilisateur <span class="required">*</span></label>
                    <?php echo $form->textField($user, 'username', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($user, 'username'); ?>
                </div>

                <div class="row">
                    <label for="User_password" class="youpasswd" data-icon="p">Mot de passe <span class="required">*</span></label>	
                    <?php echo $form->passwordField($user, 'password', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($user, 'password'); ?>
                </div>

                <div class="row">
                    <label for="User_email" class="required" class="youmail" data-icon="e" >Email <span class="required">*</span></label>	
                    <?php echo $form->textField($user, 'email', array('size' => 60, 'maxlength' => 512)); ?>
                    <?php echo $form->error($user, 'email'); ?>
                </div>



                <div class="row">
                    <label for="User_last_name" class="required" class="youmail" data-icon="N">Nom </label>
                    <?php echo $form->textField($user, 'last_name', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($user, 'last_name'); ?>
                </div>
                <div class="row">
                    <label for="User_firt_name" class="required" class="youmail" data-icon="P">Prénom </label>	
                    <?php echo $form->textField($user, 'firt_name', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($user, 'firt_name'); ?>
                </div>

                <p class="signin button"> 
                    <input type="submit" value="s'inscrire"/> 
                </p>
                <p class="change_link">  
                    un membre déjâ ?
                    <a href="#" class="to_register" id="toconnecter"> Se connecter </a>
                </p>

                <?php $this->endWidget(); ?>

            </div><!-- form -->

        </div>

    </div>
</div>



