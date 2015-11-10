<?php

/**
 * This is the model class for table "entrainement".
 *
 * The followings are the available columns in table 'entrainement':
 * @property integer $id_entrain
 * @property integer $id_module
 * @property string $auteur_entrain
 *
 * The followings are the available model relations:
 * @property Compte[] $comptes
 * @property Compterepondrequestionentrainement[] $compterepondrequestionentrainements
 * @property Module $idModule
 * @property Modulecontienttest[] $modulecontienttests
 * @property Question[] $questions
 */
class Entrainement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entrainement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_module, auteur_entrain', 'required'),
			array('id_module', 'numerical', 'integerOnly'=>true),
			array('auteur_entrain', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_entrain, id_module, auteur_entrain', 'safe', 'on'=>'search'),
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
			'comptes' => array(self::MANY_MANY, 'Compte', 'compteperformanceentrainement(id_entrain, id_compte)'),
			'compterepondrequestionentrainements' => array(self::HAS_MANY, 'Compterepondrequestionentrainement', 'id_entrain'),
			'idModule' => array(self::BELONGS_TO, 'Module', 'id_module'),
			'modulecontienttests' => array(self::MANY_MANY, 'Modulecontienttest', 'modulecontiententrainement(id_entrain, id_module)'),
			'questions' => array(self::MANY_MANY, 'Question', 'questionappartenirentrainement(id_entrain, id_quest)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_entrain' => 'Id Entrain',
			'id_module' => 'Id Module',
			'auteur_entrain' => 'Crée par',
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

		$criteria->compare('id_entrain',$this->id_entrain);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('auteur_entrain',$this->auteur_entrain,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entrainement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
