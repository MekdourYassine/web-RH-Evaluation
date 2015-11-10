<?php

/**
 * This is the model class for table "entreprise".
 *
 * The followings are the available columns in table 'entreprise':
 * @property integer $id_entr
 * @property string $nom_entr
 * @property string $code_entr
 * @property string $domaine_entr
 * @property string $adr_entr
 * @property integer $num_tel_entr
 * @property string $pays
 *
 * The followings are the available model relations:
 * @property Compte[] $comptes
 * @property Module[] $modules
 */
class Entreprise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entreprise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom_entr, code_entr, adr_entr, pays', 'required'),
                        array('code_entr, nom_entr', 'unique'),
			array('num_tel_entr', 'numerical', 'integerOnly'=>true),
			array('nom_entr, code_entr, domaine_entr', 'length', 'max'=>128),
			array('pays', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_entr, nom_entr, code_entr, domaine_entr, adr_entr, num_tel_entr, pays', 'safe', 'on'=>'search'),
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
			'comptes' => array(self::HAS_MANY, 'Compte', 'id_entr'),
			'modules' => array(self::MANY_MANY, 'Module', 'entreprisecomportemodule(id_entr, id_module)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_entr' => 'Id Entr',
			'nom_entr' => 'Nom de l\'entreprise',
			'code_entr' => 'Code entreprise',
			'domaine_entr' => 'Domaine ',
			'adr_entr' => 'Adresse ',
			'num_tel_entr' => 'Numéro de téléphone',
			'pays' => 'Pays',
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

		$criteria->compare('id_entr',$this->id_entr);
		$criteria->compare('nom_entr',$this->nom_entr,true);
		$criteria->compare('code_entr',$this->code_entr,true);
		$criteria->compare('domaine_entr',$this->domaine_entr,true);
		$criteria->compare('adr_entr',$this->adr_entr,true);
		$criteria->compare('num_tel_entr',$this->num_tel_entr);
		$criteria->compare('pays',$this->pays,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entreprise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
