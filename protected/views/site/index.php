<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/modernizr-2.6.1.min.js"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/lean-slider.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/lean-slider.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/sample-styles.css" type="text/css" />
  <div class="bg1">  
		   <div class="content">
			<div class="container_12">
				
                <div class="slider-wrapper">
        <div id="slider">
            <div class="slide1">
                <img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/imagen1.png" alt="" />
            </div>
            <div class="slide2">
                <img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/imagen2.png" alt="" />
            </div>
            <div class="slide3">
                <img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/imagen3.png" alt="" />
            </div>
        </div>
        <div id="slider-direction-nav"></div>
        <div id="slider-control-nav"></div>
    </div>
                                      
                </div>
            </div>
        </div>
        <div class="bottom_block1">
            <div class="container_12">
                <div class="grid_4">
                    <figure class="page1_img"><img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/pic1.png" alt="" class=""></figure>
                </div>
                <div class="grid_8">
                    <h3 class="mb0">Gestión de mantenimiento

                        <span class="text1 col1"><a href="w">    </a></span></h3>
                    Servicio de gestión de mantenimiento preventivo y correctivo a sistemas de aires acondicionado de mediana y alta capacidad.
 <br> <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/servicio" class="btn">Leer mas</a>
                </div>
            </div>
            <div class="container_12">
                <div class="grid_4">
                    <figure class="page1_img"><img src="<?php echo Yii::app() -> request -> baseUrl; ?>/images/pic1.png" alt="" class=""></figure>
                </div>
                <div class="grid_8">
                    <h3 class="mb0">Proyectos<span class="text1 col1"><a href="#"></a></span></h3>
                    Elaboración de proyectos con visión  de aprovechamiento de recursos, eficientes y amigables con el medio ambiente.
 <br> <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/servicio" class="btn">Leer mas</a>
                </div>
            </div>
        </div>
        
<script type="text/javascript">
    $(document).ready(function() {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav'
        });
    });
    </script>