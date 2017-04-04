<?php

namespace app\models;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm{

    public $name;

    public function rules(){
        $rules = parent::rules();

        $rules['usernameLength'] = ['username', 'string', 'min' => 4, 'max' => 255];
        $rules[] = ['name','required'];
        return $rules;

    }
    public function  attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user','Full Name');
        return $labels;
    }
    public function  loadAttributes(User $user)
    {
       $user->setAttributes($this->attributes);

       $profile = \Yii::createObject(Profile::className());
       $profile->setAttributes([

               'name'=>$this->name,
           ]);
       $user->setProfile($profile);


    }
}