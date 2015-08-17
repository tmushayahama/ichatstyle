<?php

class ProfileTabController extends Controller {
 /**
  * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
  * using two-column layout. See 'protected/views/layouts/column2.php'.
  */

 /**
  * @return array action filters
  */
 public function filters() {
  return array(
    'accessControl', // perform access control for CRUD operations
    'postOnly + delete', // we only allow deletion via POST request
  );
 }

 /**
  * Specifies the access control rules.
  * This method is used by the 'accessControl' filter.
  * @return array access control rules
  */
 public function accessRules() {
  return array(
    array('allow', // allow all users to perform 'index' and 'view' actions
      'actions' => array(),
      'users' => array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('profileOwnerOverview', 'ProfileOwnerOverview', 'profileFriendOverview', 'ProfileFriendOverview'),
      'users' => array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions' => array('admin', 'delete'),
      'users' => array('admin'),
    ),
    array('deny', // deny all users
      'users' => array('*'),
    ),
  );
 }

 public function actionProfileOwner() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "selected_tab_url" => "profile",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_7.css',
     "_post_row" => $this->renderPartial('user.views.profile.owner._profile_owner_pane', array(
       "profile" => Profile::model()->findByPk(Yii::app()->user->id),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_7.css',
     "_post_row" => $this->renderPartial('user.views.profile.owner.about_tab._owner_overview_pane', array(
       "profile" => Profile::model()->findByPk(Yii::app()->user->id),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerDiscoverMe() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.owner.about_tab._owner_discover_me_pane', array(
       "profile" => Profile::model()->findByPk(Yii::app()->user->id),
       "userQuestionModel" => new UserQuestionAnswer(),
       "userQuestionAnswers" => UserQuestionAnswer::getUserQuestionAnswers(Yii::app()->user->id, UserQuestionAnswer::$USER_QUESTION_ANSWERS_PER_PAGE, 0),
       "userQuestionAnswersCount" => UserQuestionAnswer::getUserQuestionAnswersCount(Yii::app()->user->id, 0),
       "nextQuestion" => UserQuestionAnswer::getRandomUserQuestion(Yii::app()->user->id),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerMySkills() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.owner.my_apps_tab.skill._owner_my_skills_pane', array(
       "profile" => Profile::model()->findByPk(Yii::app()->user->id),
       "skillModel" => new Skill(),
       "userSkills" => Skill::getSkills(null, Skill::$SKILLS_PER_PAGE, null, Yii::app()->user->id),
       "userSkillsCount" => Skill::getSkillsCount(null, null, Yii::app()->user->id),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerMyMentorships() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.owner.my_apps_tab.mentorship._owner_my_mentorships_pane', array(
       "profile" => Profile::model()->findByPk(Yii::app()->user->id),
       "mentorshipModel" => new Mentorship(),
       "userMentorships" => Mentorship::getMentorships(null, null, Mentorship::$MENTORSHIPS_PER_PAGE, null, Yii::app()->user->id),
       "userMentorshipsCount" => Mentorship::getMentorshipsCount(null, null, Yii::app()->user->id),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileFriend($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.friend._profile_friend_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileFriendOverview($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.friend.about_tab._friend_overview_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileFriendDiscoverMe($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.friend.about_tab._friend_discover_me_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       "userQuestionModel" => new UserQuestionAnswer(),
       "userQuestionAnswers" => UserQuestionAnswer::getUserQuestionAnswers($userId, UserQuestionAnswer::$USER_QUESTION_ANSWERS_PER_PAGE, 0),
       "userQuestionAnswersCount" => UserQuestionAnswer::getUserQuestionAnswersCount($userId, 0),
       "nextQuestion" => UserQuestionAnswer::getRandomUserQuestion($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

}
