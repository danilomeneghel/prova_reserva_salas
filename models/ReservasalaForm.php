<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ReservasalaForm is the model behind the login form.
 */
class ReservasalaForm extends Model
{
    public $periodo;
    public $duracao;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['periodo', 'duracao'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'periodo' => 'Periodo',
            'duracao' => 'Duracao',
        ];
    }

}
