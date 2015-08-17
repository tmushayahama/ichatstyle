<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Skill Section Main</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_components.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jscrollpane.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-themes-1.10.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"/>
  <link id="gb-theme" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_theme_1.css" type="text/css" rel="stylesheet"/>
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php
  Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/gb_init.js', CClientScript::POS_END
  );
  ?>
  <script id="" type="text/javascript">
   var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
   var ajaxSearchUrl = "<?php echo Yii::app()->createUrl("search/ajaxSearch"); ?>";
  </script>
 </head>
 <body>

  <!-- top nav -->
  <div id="gb-navbar" class="navbar navbar-static-top">
   <div class="container gb-padding-none">
    <div class="row">
     <div class="navbar-header col-lg-9 col-md-9 col-sm-7 col-xs-9">
      <a class="gb-logo gb-no-margin" href="<?php echo Yii::app()->createUrl("app/skill"); ?>">
       <strong>SKILL</strong>SECTION<small>BETA</small>
      </a>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-5 col-xs-3 gb-padding-none">
      <div id="gb-navbar-nav" class="row">
       <a href="#gb-registration-modal"
          class="col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-none"
          data-toggle="modal">
        <h3 class='fa fa-key'></h3>
        <span class='hidden-xs'> Beta Access</span>
       </a>
       <a href="#gb-login-modal"
          class="col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-none"
          data-toggle="modal">
        <h3 class='fa fa-sign-in'></h3>
        <span class='hidden-xs'> Log In</span>
       </a>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="" id="main-container">
   <?php echo $content; ?>
  </div>
  <div class="gb-dummy-height">

  </div>

  <!-- JavaScript -->
  <script id="" type="text/javascript">
   var getPostsUrl = "<?php echo Yii::app()->createUrl("site/getPosts", array()); ?>";
  </script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery1.9.0.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.0.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap3/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tour.js"></script>
  <script type='text/javascript'>
   $(document).ready(function () {
    /* off-canvas sidebar toggle */
    $('[data-toggle=offcanvas]').click(function () {
     $(this).toggleClass('visible-xs text-center');
     $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
     $('.row-offcanvas').toggleClass('active');
     $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
     $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
     $('#btnShow').toggle();
    });
   });
  </script>
 </body>
</html>