<?php

/**
 * This is the model class for table "compterepondrequestioncompetition".
 *
 * The followings are the available columns in table 'compterepondrequestioncompetition':
 * @property integer $id_compte
 * @property integer $id_comp
 * @property integer $id_quest
 * @property integer $rep_compte
 * @property string $duree
 * @property integer $nbr_tentatives
 *
 * The followings are the available model relations:
 * @property Question $idQuest
 * @property Compte $idCompte
 * @property Competition $idComp
 */
class Compterepondrequestioncompetition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compterepondrequestioncompetition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compte, id_comp, id_quest, rep_compte', 'required'),
			array('id_compte, id_comp, id_quest, rep_compte, nbr_tentatives', 'numerical', 'integerOnly'=>true),
			array('duree', 'safe'),
                        // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_compte, id_comp, id_quest, rep_compte, duree, nbr_tentatives', 'safe', 'on'=>'search'),
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
			'idQuest' => array(self::BELONGS_TO, 'Question', 'id_quest'),
			'idCompte' => array(self::BELONGS_TO, 'Compte', 'id_compte'),
			'idComp' => array(self::BELONGS_TO, 'Competition', 'id_comp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_compte' => 'Id Compte',
			'id_comp' => 'Id Comp',
			'id_quest' => 'Id Quest',
			'rep_compte' => 'Rep Compte',
                        'duree' => 'Duree',
			'nbr_tentatives' => 'Nbr Tentatives',
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

		$criteria->compare('id_compte',$this->id_compte);
		$criteria->compare('id_comp',$this->id_comp);
		$criteria->compare('id_quest',$this->id_quest);
		$criteria->compare('rep_compte',$this->rep_compte);
                $criteria->compare('duree',$this->duree,true);
		$criteria->compare('nbr_tentatives',$this->nbr_tentatives);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compterepondrequestioncompetition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
