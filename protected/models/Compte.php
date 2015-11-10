<?php

/**
 * This is the model class for table "compte".
 *
 * The followings are the available columns in table 'compte':
 * @property integer $id_compte
 * @property integer $id_entr
 * @property string $nom
 * @property string $email
 * @property string $mdp
 * @property string $prenom
 * @property string $dateNaissance
 * @property integer $numTel
 * @property string $compteLinkedIn
 * @property string $compteViadeo
 * @property string $pays
 * @property string $langue
 * @property string $roles
 *
 * The followings are the available model relations:
 * @property Entreprise $idEntr
 * @property Competition[] $competitions
 * @property Entrainement[] $entrainements
 * @property Test[] $tests
 * @property Comptepossedediplome[] $comptepossedediplomes
 * @property Comptepossedediplome[] $comptepossedediplomes1
 * @property Compterepondrecompetitionproposition[] $compterepondrecompetitionpropositions
 * @property Compterepondretestproposition[] $compterepondretestpropositions
 * @property Evenement[] $evenements
 */
class Compte extends CActiveRecord {

    static $user_entr = 'user_entr';
    static $user_public = 'public';
    static $admin_entr = 'admin_entr';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'compte';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('roles, id_entr, email, mdp', 'required'),
            array('email', 'unique'),
            array('email', 'email'),
            //array('dateNaissance', 'date'),
            array('compteLinkedIn, compteViadeo', 'url'),
            array('id_entr, numTel', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_compte, id_entr, nom, email, mdp, prenom, dateNaissance, numTel, compteLinkedIn, compteViadeo, pays, langue', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEntr' => array(self::BELONGS_TO, 'Entreprise', 'id_entr'),
            //'competitions' => array(self::MANY_MANY, 'Competition', 'compteperformancecompetition(id_compte, id_competition)'),
            //'entrainements' => array(self::MANY_MANY, 'Entrainement', 'compteperformanceentrainement(id_compte, id_entrain)'),
           // 'tests' => array(self::MANY_MANY, 'Test', 'compteperformancetest(id_compte, id_test)'),
            'comptepossedediplomes' => array(self::HAS_MANY, 'Comptepossedediplome', 'id_compte'),
            'comptepossedediplomes1' => array(self::HAS_MANY, 'Comptepossedediplome', 'id_diplome'),
            'compterepondrecompetitionpropositions' => array(self::HAS_MANY, 'Compterepondrecompetitionproposition', 'id_compte'),
            'compterepondretestpropositions' => array(self::HAS_MANY, 'Compterepondretestproposition', 'id_compte'),
            'evenements' => array(self::HAS_MANY, 'Evenement', 'id_compte'),
            'comptesEntrainements' => array(self::HAS_MANY, 'Compteperformanceentrainement', 'id_compte'),
            'entrainements' => array(self::HAS_MANY, 'Entrainement', 'id_entrain', 'through' => 'comptesEntrainements'),
            'comptesTests' => array(self::HAS_MANY, 'Compteperformancetest', 'id_compte'),
            'tests' => array(self::HAS_MANY, 'Test', 'id_test', 'through' => 'comptesTests'),
            'comptesCompetitions' => array(self::HAS_MANY, 'Compteperformancecompetition', 'id_compte'),
            'competitions' => array(self::MANY_MANY, 'Competition', 'id_comp','through'=>'comptesCompetitions'),
            
            
  
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_compte' => 'Id Compte',
            'id_entr' => 'Id Entr',
            'nom' => 'Nom',
            'email' => 'Email',
            'mdp' => 'Mot de passe',
            'prenom' => 'Prénom',
            'dateNaissance' => 'Date de naissance',
            'numTel' => 'Numéro de téléphone',
            'compteLinkedIn' => 'Lien du compte LinkedIn',
            'compteViadeo' => 'Lien du compte Viadeo',
            'pays' => 'Pays',
            'langue' => 'Langue',
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
        $criteria->compare('id_entr', $this->id_entr);
        $criteria->compare('nom', $this->nom, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('mdp', $this->mdp, true);
        $criteria->compare('prenom', $this->prenom, true);
        $criteria->compare('dateNaissance', $this->dateNaissance, true);
        $criteria->compare('numTel', $this->numTel);
        $criteria->compare('compteLinkedIn', $this->compteLinkedIn, true);
        $criteria->compare('compteViadeo', $this->compteViadeo, true);
        $criteria->compare('pays', $this->pays, true);
        $criteria->compare('langue', $this->langue, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Compte the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function validatePassword($password) {
        return CPasswordHelper::verifyPassword($password, $this->mdp);
    }

    public function hashPassword($password) {
        return CPasswordHelper::hashPassword($password);
    }

}
