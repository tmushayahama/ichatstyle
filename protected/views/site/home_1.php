<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_bluish.css" type="text/css" rel="stylesheet"/>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="" type="text/javascript">
 var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
 var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
 var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
 var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
 var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";

 var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
 var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";

 var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

</script>
<div class="gb-background hidden-sm hidden-xs">
 <div class="container-fluid gb-padding-none">
  <div class="gb-background-dark col-lg-6"></div>
  <div class="gb-background-light-grey-1 col-lg-6"></div>
 </div>
</div>
<div class="container">
 <div class="gb-background-dark col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav">
  <br>
  <div class="gb-top-heading row">
   <h1 class="">Home</h1>
  </div>
  <br>
  <div class="panel-group" id="gb-getting-started">
   <div class="panel gb-padding-none">
    <h3 class="gb-heading-1">
     <a class="" data-toggle="collapse" data-parent="#gb-getting-started" href="#collapseOne">
      Wondering how it works.
     </a>
    </h3>
    <div id="collapseOne" class="panel-collapse collapse">
     <div class="panel-body gb-padding-none">
      <a id="gb-start-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
       <div class="thumbnail">
        <img class="hidden-xs"  src="<?php echo Yii::app()->request->baseUrl; ?>/img/take_tour_icon_2.png" alt="">
        <div class="caption">
         <h5 class="">Take A Tour</h5>
        </div>
       </div>
      </a>
      <a id='gb-start-skill-tour-btn' class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
       <div class="gb-step-display hidden-xs">1</div>
       <div class="thumbnail">
        <img class="hidden-xs"  src="<?php echo Yii::app()->request->baseUrl; ?>/img/define_skill_icon.png" alt="">
        <div class="caption">
         <h5 class="">List your skills</h5>
        </div>
       </div>
      </a>
      <a id="gb-explore-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
       <div class="gb-step-display hidden-xs">2</div>
       <div class="thumbnail">
        <img class="hidden-xs"  src="<?php echo Yii::app()->request->baseUrl; ?>/img/explore_skill_icon.png" alt="">
        <div class="caption">
         <h5 class="">Explore & Discover</h5>
        </div>
       </div>
      </a>
      <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
       <div class="gb-step-display hidden-xs">3</div>
       <div class="thumbnail">
        <img class="hidden-xs"  src="<?php echo Yii::app()->request->baseUrl; ?>/img/apply_skill_icon.png" alt="">
        <div class="caption">
         <h5 class="">Apply Skills</h5>
        </div>
       </div>
      </a>
     </div>
    </div>
   </div>
  </div>
  <br>
  <div id="gb-primary-apps-panel" class="panel panel-default panel-borderless">
   <h3 class="gb-heading-1">
    Ist Generation Apps
    <span class="pull-right badge badge-info">3</span>
   </h3>
   <div class="row gb-home-nav">
    <a id="gb-tour-skill-1" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-skill-form-container"
       data-gb-target="#gb-skill-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Add a<br>Skill</h5>
      </div>
     </div>
    </a>
    <a id="" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-goal-list-form-container"
       data-gb-target="#gb-goal-list-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Add a<br>Goal</h5>
      </div>
     </div>
    </a>
    <a id="" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-promise-list-form-container"
       data-gb-target="#gb-goal-list-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Add a<br>Promise</h5>
      </div>
     </div>
    </a>
   </div>
   <div id="gb-skill-form-container" class="row gb-hide gb-panel-form">
    <div class="row">
     <?php
     $this->renderPartial('skill.views.skill.forms._skill_form', array(
       "formId" => "gb-skill-form",
       "actionUrl" => Yii::app()->createUrl("skill/skill/addSkill", array()),
       "prependTo" => "#gb-posts",
       'skillModel' => $skillModel,
       'skillLevelList' => $skillLevelList,
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
     ));
     ?>
    </div>
   </div>
  </div>
  <br>
  <div id="gb-secondary-apps-panel" class="panel panel-default panel-borderless">
   <h3 class="gb-heading-1">
    2nd Generation Apps
    <span class="pull-right badge badge-info">6</span>
   </h3>
   <div class="row gb-home-nav">
    <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-mentorship-form-container"
       data-gb-target="#gb-mentorship-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Create a<br>Mentorship</h5>
      </div>
     </div>
    </a>
    <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-advice-page-form-container"
       data-gb-target="#gb-advice-page-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Add an<br>Advice</h5>
      </div>
     </div>
    </a>
    <a class="gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Add to<br>Skill Bank</h5>
      </div>
     </div>
    </a>
   </div>
   <div class="row gb-home-nav">

    <a class="gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Create A<br>Journal</h5>
      </div>
     </div>
    </a>
    <a class="gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/just_answer_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">About your<br>Skills</h5>
      </div>
     </div>
    </a>

    <a class="gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center"><br>See More</h5>
      </div>
     </div>
    </a>
   </div>
   <!--
   <div id="gb-connections-panel" class="panel panel-default gb-disabled">
     <h3 class="gb-heading-1"><a>
         My Connections
         <span class="pull-right badge badge-info">5</span>
       </a>
     </h3>
     <div class="panel-body gb-padding-none">

        <div class="row">
         <a href="" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
           <img src="<?php //echo Yii::app()->request->baseUrl . "/img/gb_public.png";                           ?>" alt="">
           <div class="menu-heading">
             <h4>Public</h4>
           </div>
         </a>

   <?php //foreach ($connections as $connection): ?>
           <a href="<?php //echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id));                           ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
             <img src="<?php //echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture;                           ?>" alt="">
             <div class="menu-heading">
               <h4>
   <?php //echo $connection->name ?>
               </h4>
             </div>
           </a>
   <?php //endforeach; ?>

       </div>
     </div>

 </div> -->
  </div>
  <br>
  <div id="gb-tertiary-apps-panel" class="panel panel-default panel-borderless">
   <h3 class="gb-heading-1">
    3rd Generation Apps
    <span class="pull-right badge badge-info">6</span>
   </h3>
   <div class="row gb-home-nav">
    <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-project-form-container"
       data-gb-target="#gb-project-form">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Create a<br>Project</h5>
      </div>
     </div>
    </a>
    <a class="gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
     <div class="thumbnail">
      <div class="gb-img-container">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon_1.png" alt="">
      </div>
      <div class="caption">
       <h5 class="text-center">Create a<br>Group</h5>
      </div>
     </div>
    </a>
   </div>
  </div>
 </div>
 <div id="gb-home-activity" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-padding-none gb-background-light-grey-1">
  <div class="row">
   <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
    <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-home-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Activities</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-home-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Activities</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
   </ul>
  </div>
  <br>
  <div class="tab-content row gb-side-margin-thick gb-padding-none gb-background-light-grey-1">
   <div class="tab-pane active" id="gb-home-all-pane">
    <h3 class="gb-heading-2">Recent Activities</h3>
    <div id="gb-posts" class="panel-body gb-padding-none gb-background-light-grey-1">
     <br>
     <?php
     foreach ($postShares as $postShare):
      switch ($postShare->post->type) {
       case Post::$TYPE_GOAL_LIST:
        $skill = Skill::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('skill.views.skill._skill_post_row', array(
          'skill' => $skill,
          'source' => Skill::$SOURCE_SKILL
        ));
        break;
       case Post::$TYPE_MENTORSHIP:
        $mentorship = Mentorship::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
          "mentorship" => $mentorship,
        ));
        break;
       case Post::$TYPE_NEED_MENTEE:
        $mentorshipRequest = Notification::model()->findByPk($postShare->post->source_id);
        if ($mentorshipRequest != null) {
         echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
           "mentorshipRequest" => $mentorshipRequest,
         ));
        }
        break;
       case Post::$TYPE_ADVICE:
        $advicePage = AdvicePage::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('pages.views.pages._goal_page_row', array(
          "advicePage" => $advicePage,
        ));
        break;
      }
     endforeach;
     ?>
    </div>
   </div>
   <div class="tab-pane" id="gb-my-home-pane">
    <h3 class="gb-heading-2">My Activities</h3>
   </div>
  </div>
 </div>
 <!--- ----------------------------HIDDEN THINGS ------------------------->
 <div id="gb-forms-home" class="gb-hide">

 </div>
 <!-- -------------------------------MODALS --------------------------->

 <?php $this->endContent() ?>
