<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<section id="error" class="container text-center">
        <h2>Erreur <?php echo $code; ?></h2>
        <p><div class="error"> <?php echo CHtml::encode($message); ?> </div></p>
<a class="btn btn-primary" href="index.php">Aller vers l'acceuil</a>
    </section><!--/#error-->

