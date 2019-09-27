<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $text;

    public function rules()
    {
        return [
            [['name', 'email','text'], 'required'],
            ['name', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            ['email', 'email'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Имя ',
            'email' => 'Почта',
            'text' => 'Сообщение',

        ];
    }

}