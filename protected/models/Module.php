<?php

/**
 * This is the model class for table "module".
 *
 * The followings are the available columns in table 'module':
 * @property integer $id_module
 * @property integer $id_entr
 * @property string $nom_module
 * @property string $sous_titre_module
 * @property string $desc_module
 *
 * The followings are the available model relations:
 * @property Competition[] $competitions
 * @property Entrainement[] $entrainements
 * @property Entreprise[] $entreprises
 * @property Entreprise $idEntr
 * @property Test[] $tests
 * @property Question[] $questions
 * @property Question[] $questions1
 * @property Test[] $tests1
 */
class Module extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'module';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_entr, nom_module', 'required'),
			array('id_entr', 'numerical', 'integerOnly'=>true),
			array('nom_module, sous_titre_module', 'length', 'max'=>128),
			array('desc_module', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_module, id_entr, nom_module, sous_titre_module, desc_module', 'safe', 'on'=>'search'),
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
			'competitions' => array(self::MANY_MANY, 'Competition', 'modulecontientcompetiton(id_module, id_comp)'),
			'entrainements' => array(self::HAS_MANY, 'Entrainement', 'id_module'),
			'entreprises' => array(self::MANY_MANY, 'Entreprise', 'entreprisecomportemodule(id_module, id_entr)'),
			'idEntr' => array(self::BELONGS_TO, 'Entreprise', 'id_entr'),
			'tests' => array(self::MANY_MANY, 'Test', 'modulecontienttest(id_module, id_test)'),
			'questions' => array(self::MANY_MANY, 'Question', 'moduledecomposequestion(id_module, id_quest)'),
			'questions1' => array(self::HAS_MANY, 'Question', 'id_module'),
			'tests1' => array(self::HAS_MANY, 'Test', 'id_module'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_module' => 'Id Module',
			'id_entr' => 'Id Entr',
			'nom_module' => 'Nom du module',
			'sous_titre_module' => 'Sous-Titre',
			'desc_module' => 'Description',
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

		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('id_entr',$this->id_entr);
		$criteria->compare('nom_module',$this->nom_module,true);
		$criteria->compare('sous_titre_module',$this->sous_titre_module,true);
		$criteria->compare('desc_module',$this->desc_module,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Module the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
