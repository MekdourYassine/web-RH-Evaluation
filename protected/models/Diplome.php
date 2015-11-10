<?php

/**
 * This is the model class for table "diplome".
 *
 * The followings are the available columns in table 'diplome':
 * @property integer $id_diplome
 * @property integer $id_compte
 * @property string $nom_diplome
 * @property string $date_obtention
 * @property string $libelle_diplome
 * @property string $type_diplome
 * @property string $etablissement_diplome
 *
 * The followings are the available model relations:
 * @property Compte $idCompte
 */
class Diplome extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'diplome';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compte, nom_diplome, date_obtention, type_diplome, etablissement_diplome', 'required'),
			array('id_compte', 'numerical', 'integerOnly'=>true),
			array('nom_diplome, etablissement_diplome', 'length', 'max'=>128),
			array('libelle_diplome', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_diplome, id_compte, nom_diplome, date_obtention, libelle_diplome, type_diplome, etablissement_diplome', 'safe', 'on'=>'search'),
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
			'id_diplome' => 'Id Diplome',
			'id_compte' => 'Id Compte',
			'nom_diplome' => 'Nom de diplôme',
			'date_obtention' => 'Date d\'obtention',
			'libelle_diplome' => 'Libelle',
			'type_diplome' => 'Type',
			'etablissement_diplome' => 'Etablissement',
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

		$criteria->compare('id_diplome',$this->id_diplome);
		$criteria->compare('id_compte',$this->id_compte);
		$criteria->compare('nom_diplome',$this->nom_diplome,true);
		$criteria->compare('date_obtention',$this->date_obtention,true);
		$criteria->compare('libelle_diplome',$this->libelle_diplome,true);
		$criteria->compare('type_diplome',$this->type_diplome,true);
		$criteria->compare('etablissement_diplome',$this->etablissement_diplome,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diplome the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
