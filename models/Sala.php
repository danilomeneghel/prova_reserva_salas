<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rs_sala".
 *
 * @property integer $idSala
 * @property integer $nro_sala
 * @property integer $ativo
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nro_sala', 'tipo'], 'required'],
            [['ativo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSala' => 'Sala',
            'nro_sala' => 'Nro Sala',
            'tipo' => 'Tipo Sala',
            'ativo' => 'Ativo',
        ];
    }

}
