<?php

/**
 * This is the model class for table "compteperformanceentrainement".
 *
 * The followings are the available columns in table 'compteperformanceentrainement':
 * @property integer $id_compte
 * @property integer $id_entrain
 * @property double $score
 * @property integer $nbr_tentatives
 * @property string $duree
 * @property integer $statut
 */
class Compteperformanceentrainement extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'compteperformanceentrainement';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_compte, id_entrain, score', 'required'),
            array('id_compte, id_entrain, nbr_tentatives, statut', 'numerical', 'integerOnly' => true),
            array('score', 'numerical'),
            array('duree', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_compte, id_entrain, score, nbr_tentatives, duree, statut', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
           'comptesEntrainements' => array(self::HAS_MANY, 'Compteperformanceentrainement', 'id_compte'),
           'entrainements' => array(self::HAS_MANY, 'Entrainement', 'id_entrain',  'through' => 'comptesEntrainements'),
            //'products' => array(self::HAS_MANY, 'Product', 'product_id', 'through' => 'CartProduct'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_compte' => 'Id Compte',
            'id_entrain' => 'Id Entrain',
            'score' => 'Score',
            'nbr_tentatives' => 'Nbr Tentatives',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_compte', $this->id_compte);
        $criteria->compare('id_entrain', $this->id_entrain);
        $criteria->compare('score', $this->score);
        $criteria->compare('nbr_tentatives', $this->nbr_tentatives);
        $criteria->compare('duree', $this->duree, true);
        $criteria->compare('statut', $this->statut);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Compteperformanceentrainement the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
