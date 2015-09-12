<?php
$this->beginContent('//layouts/ic_main');
?>
<?php echo CHtml::errorSummary(array($registerModel, $profile, $loginModel), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'container alert alert-danger')); ?>

<div class="ic-intro-header-1 row">
 <div class="container">
  <div class="row">
   <?php if (Yii::app()->user->hasFlash('betaRequestSent')): ?>
    <div class="flash-success">
     <?php echo Yii::app()->user->getFlash('betaRequestSent'); ?>
    </div>
   <?php endif; ?>
   <h2 class="text-center">Enjoy the extra benefits of having an account</h2>
   <br>
   <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 col-lg-offset-4 col-md-offset-4 col-sm-offset-6 col-xs-offset-8">
    <div class="ic-signup-box">
     <br>
     <a href="#ic-registration-modal" role="button" data-toggle="modal" class="btn btn-primary btn-block btn-lg">Beta Access FREE</a>
     <br>
     <a href="#ic-login-modal" role="button" data-toggle="modal" class="btn btn-default btn-block btn-lg">Login</a>
     <br>
     <p>Just Play.</p>
     <a href="../app" class="btn btn-default btn-block btn-lg">Back to Play</a>
    </div>
   </div>
  </div>
  <br>
  <div class="row">
   <div class="text-center col-lg-8 col-md-8 col-sm-8 col-xs-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
    <div class="ic-description">
     You can write themes and chats, assign chats.
     ohh!! you can save your chats and see history. You can also assign, challenge chats
     You can ... many more
    </div>
   </div>
  </div>
 </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
  'loginModel' => $loginModel
));
?>
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
  'registerModel' => $registerModel,
  'profile' => $profile
));
?>
<?php
echo $this->renderPartial('application.views.site.modals._demo', array(
));
?>
<?php $this->endContent(); ?>
