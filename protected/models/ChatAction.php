<?php

/**
 * This is the model class for table "{{chat_action}}".
 *
 * The followings are the available columns in table '{{chat_action}}':
 * @property integer $id
 * @property integer $chat_id
 * @property integer $action_id
 * @property integer $action_order
 * @property integer $action_period
 * @property string $description
 * @property integer $privacy
 * @property integer $order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Chat $chat
 * @property Action $action
 */
class ChatAction extends CActiveRecord {

 public static function setCanStartStatus($chatId) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  $chatAction = ChatAction::Model()->find($chatActionCriteria);
  $chatAction->status++;
  return $chatAction->save(false);
 }

 public static function getCanStartStatus($chatId) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  return ChatAction::Model()->find($chatActionCriteria)->status;
 }

 public static function getNextAction($chatId = null) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  $chatActionCriteria->order = 'RAND()';
  return ChatAction::Model()->find($chatActionCriteria);
 }

 public static function getAllActions($chatId) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  $chatActionCriteria->order = 'RAND()';
  $chatActionCriteria->limit = 6;
  return ChatAction::Model()->findAll($chatActionCriteria);
 }

 public static function copyActions($fromChatId, $toChatId) {
  $fromChatActionCriteria = new CDbCriteria;
  $fromChatActionCriteria->addCondition("chat_id=" . $fromChatId);
  $fromChatActions = ChatAction::Model()->findAll($fromChatActionCriteria);

  foreach ($fromChatActions as $fromChatAction) {
   $toChatAction = new ChatAction();
   $toChatAction->chat_id = $toChatId;
   $toChatAction->action_id = $fromChatAction->id;
   $toChatAction->save(false);
  }
 }

 public static function setRandomActions($chatId) {
  $actions = Action::getRandomActions();
  foreach ($actions as $action) {
   $chatAction = new ChatAction();
   $chatAction->chat_id = $chatId;
   $chatAction->action_id = $action->id;
   $chatAction->save(false);
  }
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return ChatAction the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model(
      $className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{chat_action}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {

  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('chat_id, action_id', 'required'),
    array('chat_id, action_id, action_order, action_period, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 500),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, chat_id, action_id, action_order, action_period, description, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {

  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'chat' => array(self::BELONGS_TO, 'Chat', 'chat_id'),
    'action' => array(self::BELONGS_TO, 'Action', 'action_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'chat_id' => 'Chat',
    'action_id' => 'Action',
    'action_order' => 'Action Order',
    'action_period' => 'Action Period',
    'description' => 'Description',
    'privacy' => 'Privacy',
    'order' => 'Order',
    'status' => 'Status',
  );
 }

 /**
  * Retrieves a list of models based on the current search/filter conditions.
  * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
  */
 public function search() {

  // Warning: Please modify the following code to remove attributes that
  // should not be searched.

  $criteria = new CDbCriteria;

  $criteria->compare('id', $this->id);
  $criteria->compare('chat_id', $this->chat_id);
  $criteria->compare('action_id', $this->action_id);
  $criteria->compare('action_order', $this->action_order);
  $criteria->compare('action_period', $this->action_period);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('order', $this->order);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
