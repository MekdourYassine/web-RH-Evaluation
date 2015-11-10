<?php

/**
 * This is the model class for table "test".
 *
 * The followings are the available columns in table 'test':
 * @property integer $id_test
 * @property integer $id_module
 * @property string $duree_test
 * @property string $auteur_test
 * @property integer $note_min_test
 *
 * The followings are the available model relations:
 * @property Compte[] $comptes
 * @property Compterepondretestproposition[] $compterepondretestpropositions
 * @property Module[] $modules
 * @property Question[] $questions
 * @property Module $idModule
 */
class Test extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_module, duree_test, auteur_test, note_min_test', 'required'),
			array('id_module, note_min_test', 'numerical', 'integerOnly'=>true),
			array('auteur_test', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_test, id_module, duree_test, auteur_test, note_min_test', 'safe', 'on'=>'search'),
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
			'comptes' => array(self::MANY_MANY, 'Compte', 'compteperformancetest(id_test, id_compte)'),
			'compterepondretestpropositions' => array(self::HAS_MANY, 'Compterepondretestproposition', 'id_test'),
			'modules' => array(self::MANY_MANY, 'Module', 'modulecontienttest(id_test, id_module)'),
			'questions' => array(self::MANY_MANY, 'Question', 'questionappartenirtest(id_test, id_quest)'),
			'idModule' => array(self::BELONGS_TO, 'Module', 'id_module'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_test' => 'Id Test',
			'id_module' => 'Id Module',
			'duree_test' => 'Durée',
			'auteur_test' => 'Crée par',
			'note_min_test' => 'Note Minimale : /20',
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

		$criteria->compare('id_test',$this->id_test);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('duree_test',$this->duree_test,true);
		$criteria->compare('auteur_test',$this->auteur_test,true);
		$criteria->compare('note_min_test',$this->note_min_test);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Test the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
