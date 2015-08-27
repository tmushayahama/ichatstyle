<?php

/**
 * This is the model class for table "{{chat_assignment}}".
 *
 * The followings are the available columns in table '{{chat_assignment}}':
 * @property integer $id
 * @property integer $chat_id
 * @property integer $assignee_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Chat $chat
 * @property User $assignee
 */
class ChatAssignment extends CActiveRecord {

 public static function RequestChat($userId, $chatId) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  $chatActions = ChatAction::Model()->findAll($chatActionCriteria);

  $chat = new CHat();
  $chat->type_id = 2;
  $chat->description = "poo";
  $chat->creator_id = Yii::app()->user->id;
  if ($chat->save(false)) {
   $this->copyChat($chatId, $originalChatActions);
   $chatAssignment = new ChatAssignment();
   $chatAssignment->chat_id = $chatId;
   $chatAssignment->assignee_id = $userId;
   return $chatAssignment->save(false);
  }
 }

 public static function CanStart($chatId) {
  $chatActionCriteria = new CDbCriteria;
  $chatActionCriteria->addCondition("chat_id=" . $chatId);
  $chatAction = ChatAction::Model()->find($chatActionCriteria);
  $chatAction->status++;
  return $chatAction->save(false);
 }

 private static function copyChat($chatId, $originalChatActions) {
  foreach ($originalChatActions as $originalChatAction) {
   $chatAction = new ChatAction();
   $chatAction->action_id = $originalChatAction->action_if;
   $chatAction->save(false);
  }
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return ChatAssignment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{chat_assignment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('chat_id, assignee_id', 'required'),
    array('chat_id, assignee_id, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, chat_id, assignee_id, status', 'safe', 'on' => 'search'),
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
    'assignee' => array(self::BELONGS_TO, 'User', 'assignee_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'chat_id' => 'Chat',
    'assignee_id' => 'Assignee',
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
  $criteria->compare('assignee_id', $this->assignee_id);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
