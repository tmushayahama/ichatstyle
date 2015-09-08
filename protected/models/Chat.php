<?php

/**
 * This is the model class for table "{{chat}}".
 *
 * The followings are the available columns in table '{{chat}}':
 * @property integer $id
 * @property integer $creator_id
 * @property string $created_date
 * @property integer $type_id
 * @property string $chat_youtube_url
 * @property string $title
 * @property string $description
 * @property integer $privacy
 * @property integer $order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property ChatAction[] $chatActions
 * @property ChatAssignment[] $chatAssignments
 */
class Chat extends CActiveRecord {

 public static function getChats() {
  $chatCriteria = new CDbCriteria;
  $chatCriteria->addCondition("status=" . 0);
  return Chat::Model()->findAll($chatCriteria);
 }

 public static function getUsers() {
  $userCriteria = new CDbCriteria;
  return User::Model()->findAll($userCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Chat the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{chat}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('creator_id, title', 'required'),
    array('creator_id, type_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('chat_youtube_url', 'length', 'max' => 1000),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, creator_id, created_date, type_id, chat_youtube_url, title, description, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'chatActions' => array(self::HAS_MANY, 'ChatAction', 'chat_id'),
    'chatAssignments' => array(self::HAS_MANY, 'ChatAssignment', 'chat_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'creator_id' => 'Creator',
    'created_date' => 'Created Date',
    'type_id' => 'Type',
    'chat_youtube_url' => 'Chat Youtube Url',
    'title' => 'Title',
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
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('chat_youtube_url', $this->chat_youtube_url, true);
  $criteria->compare('title', $this->title, true);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('order', $this->order);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
