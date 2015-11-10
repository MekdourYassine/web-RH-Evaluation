<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';

?>
<div class="errorCantaner" style="margin-left: 30%"><h2 style="margin-left: 20%">Error <?php echo $code; ?></h2>
<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
<img src="themes/myTheme/images/error404.gif" alt="screen"/></div>