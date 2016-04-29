<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SalaForm is the model behind the login form.
 */
class SalaForm extends Model
{
    public $nro_sala;
    public $tipo;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // nro_sala and tipo are both required
            [['nro_sala', 'tipo'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nro_sala' => 'Nro Sala',
            'tipo' => 'Tipo',
        ];
    }
    
}
