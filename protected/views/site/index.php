<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a  <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Su ultima conexion fue: <?php echo Yii::app()->user->getState('last_login')?></p>

