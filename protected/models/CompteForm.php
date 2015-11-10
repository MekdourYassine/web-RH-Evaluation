<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CompteForm extends Compte {
    public $verifyCode;
    public function rules() {
        return array(
			array('roles, id_entr, nom, email, mdp, verifyCode','required', ),
			array('email', 'unique'),
			array('email', 'email'),
			array('compteLinkedIn, compteViadeo', 'url'),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		
                        array('id_entr, numTel', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_compte, id_entr, nom, email, mdp, prenom, dateNaissance, numTel, compteLinkedIn, compteViadeo, pays, langue', 'safe', 'on'=>'search'),
		);
    }
    public function attributeLabels()
	{
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
                    	'verifyCode'=>'Code de vérification',

		);
	}
}