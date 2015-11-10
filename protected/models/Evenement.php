<?php

/**
 * This is the model class for table "evenement".
 *
 * The followings are the available columns in table 'evenement':
 * @property integer $id_event
 * @property integer $id_compte
 * @property string $libelle_event
 * @property string $date_event
 *
 * The followings are the available model relations:
 * @property Compte $idCompte
 */
class Evenement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evenement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compte, libelle_event, date_event', 'required'),
			array('id_compte', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_event, id_compte, libelle_event, date_event', 'safe', 'on'=>'search'),
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
			'idCompte' => array(self::BELONGS_TO, 'Compte', 'id_compte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_event' => 'Id Event',
			'id_compte' => 'Id Compte',
			'libelle_event' => 'Libelle',
			'date_event' => 'Date de l\'évènement',
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

		$criteria->compare('id_event',$this->id_event);
		$criteria->compare('id_compte',$this->id_compte);
		$criteria->compare('libelle_event',$this->libelle_event,true);
		$criteria->compare('date_event',$this->date_event,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evenement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
