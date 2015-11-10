<?php

/**
 * This is the model class for table "proposition".
 *
 * The followings are the available columns in table 'proposition':
 * @property integer $id_prop
 * @property integer $id_quest
 * @property string $desc_prop
 * @property integer $reponse
 *
 * The followings are the available model relations:
 * @property Compterepondrecompetitionproposition[] $compterepondrecompetitionpropositions
 * @property Compterepondretestproposition[] $compterepondretestpropositions
 * @property Question $idQuest
 */
class Proposition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proposition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quest, desc_prop, reponse', 'required'),
			array('id_quest, reponse', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_prop, id_quest, desc_prop, reponse', 'safe', 'on'=>'search'),
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
			'compterepondrecompetitionpropositions' => array(self::HAS_MANY, 'Compterepondrecompetitionproposition', 'id_prop'),
			'compterepondretestpropositions' => array(self::HAS_MANY, 'Compterepondretestproposition', 'id_prop'),
			'idQuest' => array(self::BELONGS_TO, 'Question', 'id_quest'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_prop' => 'Id Prop',
			'id_quest' => 'Id Quest',
			'desc_prop' => 'Proposition',
			'reponse' => 'Réponse',
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

		$criteria->compare('id_prop',$this->id_prop);
		$criteria->compare('id_quest',$this->id_quest);
		$criteria->compare('desc_prop',$this->desc_prop,true);
		$criteria->compare('reponse',$this->reponse);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proposition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
