<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id_quest
 * @property integer $id_module
 * @property integer $id_typeQuest
 * @property string $enonce_quest
 * @property string $duree_quest
 * @property integer $nbr_tentatives_quest
 *
 * The followings are the available model relations:
 * @property Module[] $modules
 * @property Proposition[] $propositions
 * @property Competition $idModule
 * @property Typequestion $idTypeQuest
 * @property Competition[] $competitions
 * @property Test[] $tests
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_module, id_typeQuest, enonce_quest', 'required'),
			array('id_module, id_typeQuest, nbr_tentatives_quest', 'numerical', 'integerOnly'=>true),
                        array('lien_quest','url'),
			array('duree_quest, lien_quest ', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quest, id_module, id_typeQuest, enonce_quest, duree_quest, nbr_tentatives_quest', 'safe', 'on'=>'search'),
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
			'modules' => array(self::MANY_MANY, 'Module', 'moduledecomposequestion(id_quest, id_module)'),
			'propositions' => array(self::HAS_MANY, 'Proposition', 'id_quest'),
			'idTypeQuest' => array(self::BELONGS_TO, 'Typequestion', 'id_typeQuest'),
			'idModule' => array(self::BELONGS_TO, 'Module', 'id_module'),
			'competitions' => array(self::MANY_MANY, 'Competition', 'questionappartenircompetition(id_quest, id_comp)'),
			'entrainements' => array(self::MANY_MANY, 'Entrainement', 'questionappartenirentrainement(id_quest, id_entrain)'),
			'tests' => array(self::MANY_MANY, 'Test', 'questionappartenirtest(id_quest, id_test)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_quest' => 'Id Quest',
			'id_module' => 'Id Module',
                        'id_typeQuest'=>'Type de question',
			'enonce_quest' => 'Enoncé',
			'duree_quest' => 'Durée',
			'nbr_tentatives_quest' => 'Nombre de tentatives',
                        'lien_quest'=>'Lien',
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

		$criteria->compare('id_quest',$this->id_quest);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('id_typeQuest',$this->id_typeQuest);
		$criteria->compare('enonce_quest',$this->enonce_quest,true);
		$criteria->compare('duree_quest',$this->duree_quest,true);
		$criteria->compare('nbr_tentatives_quest',$this->nbr_tentatives_quest);
                $criteria->compare('lien_quest', $this->lien_quest);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
