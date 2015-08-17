<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="<?php echo $modalId ?>"  gb-type="<?php echo $modalType ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-mentorship-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        <div class="">Skill Share With </div>
      </div>
      <div class="modal-body gb-padding-thin">
        <div class="list-group">
          <a class="list-group-item active gb-select-sharing-type" gb-type="<?php echo Type::$SHARE_PRIVATE; ?>">
            <h4 class="list-group-item-heading">Private</h4>
            <p class="list-group-item-text">Noone can see this except you.</p>
          </a>
          <a class="list-group-item gb-select-sharing-type" gb-type="<?php echo Type::$SHARE_PUBLIC; ?>" >
            <h4 class="list-group-item-heading">Public</h4>
            <p class="list-group-item-text">Everyone can see this skill.</p>
          </a>
          <a class="list-group-item gb-select-sharing-type gb-hide" gb-type="<?php echo Type::$SHARE_CUSTOMIZE; ?>">
            <h4 class="list-group-item-heading">Select People</h4>
            <p class="list-group-item-text">Select members who you want to share with.</p>
          </a>
          <div class="gb-share-with-people-list modal-body-scroll gb-background-light-grey-1 row gb-hide">
            <br>
            <?php foreach ($people as $person): ?>
              <div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
                <div class="row ">
                  <div class="col-lg-2 col-sm-2 col-xs-2">
                    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
                  </div>
                  <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-advice-top-border gb-padding-none">
                    <div class='panel-heading'>
                      <h5 class="gb-person-name">
                        <?php echo $person->firstname . " " . $person->lastname; ?>
                      </h5>
                    </div>
                    <div class="panel-body"> 
                      <div class="row">
                        <div class="btn-group pull-right">
                          <a class="gb-select-person-btn btn btn-info" 
                             gb-type="<?php echo $modalType ?>" 
                             gb-selected=0>Select
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">Done</a>
      </div>
    </div>
  </div>
</div>

