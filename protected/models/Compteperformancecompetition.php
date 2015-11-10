<?php

/**
 * This is the model class for table "compteperformancecompetition".
 *
 * The followings are the available columns in table 'compteperformancecompetition':
 * @property integer $id_compte
 * @property integer $id_comp
 * @property double $score
 * @property integer $nbr_tentives
 * @property string $duree
 * @property integer $statut
 */
class Compteperformancecompetition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compteperformancecompetition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compte, id_comp, score', 'required'),
			array('id_compte, id_comp, nbr_tentives, statut', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
                        // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_compte, id_comp, score, nbr_tentives, duree, statut', 'safe', 'on'=>'search'),
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
                     'comptesCompetitions' => array(self::HAS_MANY, 'Compteperformancecompetition', 'id_compte'),
                     'competitions' => array(self::HAS_MANY, 'Competition', 'id_comp',  'through' => 'comptesCompetitions'),
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
			'score' => 'Score',
			'nbr_tentives' => 'Nbr Tentives',
			'duree' => 'Duree',
			'statut' => 'Statut',
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
		$criteria->compare('score',$this->score);
		$criteria->compare('nbr_tentives',$this->nbr_tentives);
		$criteria->compare('duree',$this->duree,true);
		$criteria->compare('statut',$this->statut);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compteperformancecompetition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
