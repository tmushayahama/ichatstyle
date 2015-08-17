<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class = "gb-block row gb-section-row-2"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_SUMMARY; ?>"
     data-gb-del-message-key="">
 <div class="gb-heading col-lg-12 gb-nav">
  <div class="gb-title col-lg-9 col-sm-2 col-xs-12">
   <p class="gb-ellipsis">SELF-SUMMARY</p>
  </div>
  <div class="gb-action col-lg-3 col-sm-2">
  </div>
 </div>
 <div class="gb-body">
  <p class="gb-panel-display"><?php echo $profile->summary; ?></p>
  <div id="gb-profile-summary-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="row ">
    <?php
    $this->renderPartial('user.views.profile.forms._profile_summary_form', array(
      "formId" => "gb-profile-summary-form",
      "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
      "prependTo" => "",
      "profileModel" => $profile,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
    ));
    ?>
   </div>
  </div>
 </div>
</div>
