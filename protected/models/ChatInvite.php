<?php

/**
 * This is the model class for table "{{chat_invite}}".
 *
 * The followings are the available columns in table '{{chat_invite}}':
 * @property integer $id
 * @property integer $chat_id
 * @property string $codename
 * @property string $passcode
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Chat $chat
 */
class ChatInvite extends CActiveRecord {

 public static function chatReady($chatId, $codename) {
  $chatInviteCriteria = new CDbCriteria;
  $chatInviteCriteria->addCondition("chat_id='" . $chatId . "'");
  $chatInviteCriteria->addCondition("codename='" . $codename . "'");
  $chatInviteCriteria->addCondition("status=" . 2);
  return ChatInvite::Model()->find($chatInviteCriteria);
 }

 public static function acceptInvitation($codename) {
  $chatInviteCriteria = new CDbCriteria;
  $chatInviteCriteria->addCondition("codename='" . $codename . "'");
  //$chatInviteCriteria->addCondition("passcode='" . $passcode . "'");

  $chatInvite = ChatInvite::Model()->find($chatInviteCriteria);
  if ($chatInvite) {
   $chatInvite->status = 2;
   if ($chatInvite->save(false)) {
    return $chatInvite;
   }
  }
  return null;
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return ChatInvite the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{chat_invite}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('chat_id, codename, passcode', 'required'),
    array('chat_id, status', 'numerical', 'integerOnly' => true),
    array('codename, passcode', 'length', 'max' => 500),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, chat_id, codename, passcode, status', 'safe', 'on' => 'search'),
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
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'chat_id' => 'Chat',
    'codename' => 'Codename',
    'passcode' => 'Passcode',
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
  $criteria->compare('codename', $this->codename, true);
  $criteria->compare('passcode', $this->passcode, true);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
