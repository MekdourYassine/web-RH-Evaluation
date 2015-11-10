<?php

/**
 * This is the model class for table "competition".
 *
 * The followings are the available columns in table 'competition':
 * @property integer $id_comp
 * @property integer $id_module
 * @property string $nom_comp
 * @property string $date_debut_comp
 * @property string $date_fin_comp
 * @property string $categorie_comp
 * @property string $description_comp
 * @property string $niveau_comp
 * @property integer $comp_Is_public
 * 
 * The followings are the available model relations:
 * @property Module $idModule
 * @property Compte[] $comptes
 * @property Exppro[] $exppros
 * @property Compterepondrecompetitionproposition[] $compterepondrecompetitionpropositions
 * @property Module[] $modules
 * @property Question[] $questions
 * @property Question[] $questions1
 */
class Competition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'competition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_module, nom_comp, date_debut_comp, date_fin_comp', 'required'),
			array('id_module, comp_Is_public', 'numerical', 'integerOnly'=>true),
			array('nom_comp, categorie_comp, niveau_comp', 'length', 'max'=>128),
			array('description_comp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_comp, id_module, nom_comp, date_debut_comp, date_fin_comp, categorie_comp, description_comp, niveau_comp, comp_Is_public', 'safe', 'on'=>'search'),
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
			'idModule' => array(self::BELONGS_TO, 'Module', 'id_module'),
			'comptes' => array(self::MANY_MANY, 'Compte', 'compteperformancecompetition(id_comp, id_compte)'),
			'exppros' => array(self::MANY_MANY, 'Exppro', 'comptepossedeexppro(id_compte, id_exp_pro)'),
			//'compterepondrecompetitionpropositions' => array(self::HAS_MANY, 'Compterepondrecompetitionproposition', 'id_comp'),
			'modules' => array(self::MANY_MANY, 'Module', 'modulecontientcompetiton(id_comp, id_module)'),
			'questions' => array(self::MANY_MANY, 'Question', 'questionappartenircompetition(id_comp, id_quest)'),
			'questions1' => array(self::MANY_MANY, 'Question', 'questionappartenirentrainement(id_entrain, id_quest)'),
                        'compterepondrequestioncompetitions' => array(self::HAS_MANY, 'Compterepondrequestioncompetition', 'id_comp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_comp' => 'Id Comp',
			'id_module' => 'Id Module',
			'nom_comp' => 'Nom de la Compétition',
			'date_debut_comp' => 'Date Début',
			'date_fin_comp' => 'Date Fin',
			'categorie_comp' => 'Catégorie',
			'description_comp' => 'Description',
			'niveau_comp' => 'Niveau',
                        'comp_Is_public' => 'Comp Is Public',
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

		$criteria->compare('id_comp',$this->id_comp);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('nom_comp',$this->nom_comp,true);
		$criteria->compare('date_debut_comp',$this->date_debut_comp,true);
		$criteria->compare('date_fin_comp',$this->date_fin_comp,true);
		$criteria->compare('categorie_comp',$this->categorie_comp,true);
		$criteria->compare('description_comp',$this->description_comp,true);
		$criteria->compare('niveau_comp',$this->niveau_comp,true);
                $criteria->compare('comp_Is_public',$this->comp_Is_public);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Competition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
