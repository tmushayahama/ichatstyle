<?php

class SiteController extends Controller {

 /**
  * Declares class-based actions.
  */
 public function actions() {
  return array(
// captcha action renders the CAPTCHA image displayed on the contact page
    'captcha' => array(
      'class' => 'CCaptchaAction',
      'backColor' => 0xFFFFFF,
    ),
    // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
    'page' => array(
      'class' => 'CViewAction',
    ),
  );
 }

 public function actionChats() {
  $chats = Chat::getChats();
  echo CJSON::encode(array(
    "chats" => $chats,
  ));
 }

 public function actionCanStart() {
  $chatId = Yii::app()->request->getParam('chat_id');
  echo CJSON::encode(array(
    "result" => ChatAction::canStart($chatId, Yii::app()->user->id),
  ));
 }

 public function actionSetCanStartStatus($chatId) {
  //$dataSource = Yii::app()->request->getParam('data_source');
  echo CJSON::encode(array(
    "result" => ChatAction::setCanStartStatus($chatId),
  ));
 }

 public function actionAllActions() {
  $chatActions = ChatAction::getAllActions(1);
  $actions = array();
  foreach ($chatActions as $chatAction) {
   array_push($actions, array(
     "chatAction" => $chatAction,
     "action" => $chatAction->action,
   ));
  }
  echo CJSON::encode(array(
    "results" => $actions,
  ));
 }

 public function actionNextAction() {
  $charAction = ChatAction::getNextAction();
  echo CJSON::encode(array(
    "chatAction" => $charAction,
    "action" => $charAction->action,
  ));
 }

}
