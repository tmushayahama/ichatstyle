<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-profile-header-1 row"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_HEADER; ?>"
     data-gb-del-message-key="">
 <div class="gb-profile-header-img-container-1 col-lg-2 col-md-2 col-sm-2 col-xs-2">
  <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/profile/gb_about_me.png" class="gb-profile-header-img-1" alt="">
 </div>
 <div class="gb-panel-display col-lg-7 col-md-7 col-sm-7 col-xs-10">
  <div class="gb-heading-9">
   <?php echo $profile->firstname . " " . $profile->lastname; ?>
  </div>
  <?php echo $profile->welcome_message; ?>
  <?php if ($profile->welcome_message != ""): ?>
   <?php echo $profile->welcome_message; ?>
  <?php else: ?>
   <?php echo "Write yur welcome meessage "; ?>
   <a class="gb-edit-form-show">
    write welcome message
   </a>
  <?php endif; ?>

  <div id="gb-profile-welcome-form-container" class="row gb-hide gb-panel-form col-lg-7 col-md-7 col-sm-10 col-xs-10">
   <?php
   $this->renderPartial('user.views.profile.forms._profile_welcome_form', array(
     "formId" => "gb-profile-welcome-form",
     "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
     "prependTo" => "",
     "profileModel" => $profile,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
   ));
   ?>
  </div>
 </div>
 <div class = "col-lg-3 col-md-3 col-sm-3 col-xs-12 gb-padding-medium">
  <div class = "row">
   <div class="btn btn-default gb-edit-form-show gb-backdrop-disappear col-lg-12 col-md-12 col-sm-12 col-xs-6"
        data-gb-target-container="#gb-profile-welcome-form-container"
        data-gb-target="#gb-profile-welcome-form">
    <i class = "glyphicon glyphicon-edit"></i> Edit
   </div>
   <br>
   <br>
   <div class = "gb-disabled-1 btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-6">
    <i class = "glyphicon glyphicon-cog"></i> Settings
   </div>
  </div>
 </div>
</div>