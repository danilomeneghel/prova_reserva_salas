<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rs_login".
 *
 * @property integer $idReservaSala
 * @property integer $idUsuario
 * @property integer $idSala
 * @property string $periodo
 * @property string $duracao
 */
class Reservasala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_reserva_sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idSala', 'periodo', 'duracao'], 'required'],
            [['idUsuario', 'idSala'], 'integer'],
            [['periodo', 'duracao'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idReservaSala' => 'Reserva de Sala',
            'idUsuario' => 'Usuario',
            'idSala' => 'Sala',
            'periodo' => 'Periodo',
            'duracao' => 'Duracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(Sala::className(), ['idSala' => 'idSala']);
    }
}
