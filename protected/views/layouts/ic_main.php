<?php ?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Theme Chat Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/app/css/lib/bootstrap.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/app/css/lib/font-awesome.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/app/css/app.css" type="text/css" rel="stylesheet"/>
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
 </head>
 <body>
  <div id="ic-navbar" class="navbar navbar-static-top">
   <div class="container ic-padding-none">
    <div class="row">
     <div class="text-center navbar-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a class="ic-logo">
       <strong>THEME</strong>CHAT<small>BETA</small>
      </a>
      <div class="pull-right">
       <a href="../app"
          class="btn btn-primary">
        <h5><span class=""> Home</span></h5>
       </a>
      </div>
     </div>
    </div>
   </div>
  </div>
  <?php echo $content; ?>
 </body>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/lib/jquery.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/lib/bootstrap.js"></script>
</html>