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
      'basedackColor' => 0xFFFFFF,
    ),
    // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
    'page' => array(
      'class' => 'CViewAction',
    ),
  );
 }

 public function actionApp() {
  $this->redirect('app');
 }

 public function actionUsers() {
  $users = Profile::getPeople(true);
  echo CJSON::encode(array(
    "users" => $users,
  ));
 }

 public function actionChats() {
  $chats = Chat::getChats();
  echo CJSON::encode(array(
    "chats" => $chats,
  ));
 }

 public function actionRequestChat() {
  $chatId = Yii::app()->request->getParam('chat_id');
  $userId = Yii::app()->request->getParam('user_id');
  $requested = ChatAssignment::RequestChat($userId, $chatId);
  echo CJSON::encode(array(
    "success" => $requested,
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
  $actions = Action::getRandomActions();
  /* $actions = array();
    foreach ($chatActions as $chatAction) {
    array_push($actions, array(
    "chatAction" => $chatAction,
    "action" => $chatAction->action,
    ));
    } */
  echo CJSON::encode(array(
    "results" => $actions,
  ));
 }

 public function actionAllChatActions($chatId) {
  $this->getChatActions($chatId, true);
 }

 public function actionInviteChat($chatId = null) {
  $newChat = new Chat();

  $newChat->creator_id = 1;
  $newChat->title = "temp 1";
  $newChat->status = 2;

  if ($newChat->save(false)) {
   if ($chatId) {
    ChatAction::copyActions($chatId, $newChat->id);
   } else {
    ChatAction::setRandomActions($newChat->id);
   }
   $chatInvite = new ChatInvite();
   $chatInvite->chat_id = $newChat->id;
   $chatInvite->assignCode(4, 250);
   //$chatInvite->passcode =
   $chatInvite->status = -1;
   $chatInvite->save(false);
  }

  echo CJSON::encode(array(
    "inviteChat" => $chatInvite,
  ));
 }

 public function actionIsReady() {
  $chatId = Yii::app()->request->getParam('chat_id');
  $codename = Yii::app()->request->getParam('codename');
  // $passcode = Yii::app()->request->getParam('passcode');
  $chatInvite = ChatInvite::chatReady($chatId, $codename);
  if ($chatInvite) {
   $this->getChatActions($chatId, false);
  } else {
   echo CJSON::encode(array(
     "status" => -1,
   ));
  }
 }

 public function actionAcceptInvitation() {
  $codename = Yii::app()->request->getParam('codename');
  $chatInvite = ChatInvite::acceptInvitation($codename);
  if ($chatInvite) {
   $this->getChatActions($chatInvite->chat_id, false);
  } else {
   echo CJSON::encode(array(
     "error" => "Incorrect/Expired Code",
   ));
  }
 }

 public function actionNextAction() {
  $charAction = ChatAction::getNextAction();
  echo CJSON::encode(array(
    "chatAction" => $charAction,
    "action" => $charAction->action,
  ));
 }

 private function getChatActions($chatId, $rand) {
  $chatActions = ChatAction::getAllActions($chatId, $rand);
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

}
