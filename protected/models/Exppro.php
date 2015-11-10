<?php

/**
 * This is the model class for table "exppro".
 *
 * The followings are the available columns in table 'exppro':
 * @property integer $id_exp_pro
 * @property integer $id_compte
 * @property string $date_debut_exp_pro
 * @property string $date_fin_exp_pro
 * @property string $entreprise
 * @property string $secteur
 * @property string $fonction
 * @property string $desc_exp
 *
 * The followings are the available model relations:
 * @property Competition[] $competitions
 * @property Compte $idCompte
 */
class Exppro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exppro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_compte, date_debut_exp_pro, date_fin_exp_pro', 'required'),
			array('id_compte', 'numerical', 'integerOnly'=>true),
                               
			array('entreprise, secteur, fonction', 'length', 'max'=>128),
			array('desc_exp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_exp_pro, id_compte, date_debut_exp_pro, date_fin_exp_pro, entreprise, secteur, fonction, desc_exp', 'safe', 'on'=>'search'),
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
			'competitions' => array(self::MANY_MANY, 'Competition', 'comptepossedeexppro(id_exp_pro, id_compte)'),
			'idCompte' => array(self::BELONGS_TO, 'Compte', 'id_compte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_exp_pro' => 'Id Exp Pro',
			'id_compte' => 'Id Compte',
			'date_debut_exp_pro' => 'Date Début de l\'éxpérience',
			'date_fin_exp_pro' => 'Date Fin',
			'entreprise' => 'Entreprise',
			'secteur' => 'Secteur',
			'fonction' => 'Fonction',
			'desc_exp' => 'Description',
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

		$criteria->compare('id_exp_pro',$this->id_exp_pro);
		$criteria->compare('id_compte',$this->id_compte);
		$criteria->compare('date_debut_exp_pro',$this->date_debut_exp_pro,true);
		$criteria->compare('date_fin_exp_pro',$this->date_fin_exp_pro,true);
		$criteria->compare('entreprise',$this->entreprise,true);
		$criteria->compare('secteur',$this->secteur,true);
		$criteria->compare('fonction',$this->fonction,true);
		$criteria->compare('desc_exp',$this->desc_exp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Exppro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
