<?php

/**
 * This is the model class for table "jqcalendar".
 *
 * The followings are the available columns in table 'jqcalendar':
 * @property integer $Id
 * @property integer $id_entr
 * @property string $Subject
 * @property string $Location
 * @property string $Description
 * @property string $StartTime
 * @property string $EndTime
 * @property integer $IsAllDayEvent
 * @property string $Color
 * @property string $RecurringRule
 *
 * The followings are the available model relations:
 * @property Entreprise $idEntr
 */
class Jqcalendar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jqcalendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_entr, IsAllDayEvent', 'required'),
			array('id_entr, IsAllDayEvent', 'numerical', 'integerOnly'=>true),
			array('Subject', 'length', 'max'=>1000),
			array('Location, Color', 'length', 'max'=>200),
			array('Description', 'length', 'max'=>255),
			array('RecurringRule', 'length', 'max'=>500),
			array('StartTime, EndTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, id_entr, Subject, Location, Description, StartTime, EndTime, IsAllDayEvent, Color, RecurringRule', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'idEntr' => array(self::BELONGS_TO, 'Entreprise', 'id_entr'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'id_entr' => 'Id Entr',
			'Subject' => 'Subject',
			'Location' => 'Location',
			'Description' => 'Description',
			'StartTime' => 'Start Time',
			'EndTime' => 'End Time',
			'IsAllDayEvent' => 'Is All Day Event',
			'Color' => 'Color',
			'RecurringRule' => 'Recurring Rule',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('id_entr',$this->id_entr);	
                $criteria->compare('Subject',$this->Subject,true);
		$criteria->compare('Location',$this->Location,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);
		$criteria->compare('IsAllDayEvent',$this->IsAllDayEvent);
		$criteria->compare('Color',$this->Color,true);
		$criteria->compare('RecurringRule',$this->RecurringRule,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jqcalendar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
