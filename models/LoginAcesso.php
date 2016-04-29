<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rs_login_acesso".
 *
 * @property integer $idLoginAcesso
 * @property integer $idUsuario
 * @property integer $idLogin
 * @property string $data
 *
 * @property Login $idLogin0
 * @property Login $idLogin1
 * @property Usuario $idUsuario0
 */
class LoginAcesso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_login_acesso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idLogin'], 'required'],
            [['idUsuario', 'idLogin'], 'integer'],
            [['data'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLoginAcesso' => 'Id Login Acesso',
            'idUsuario' => 'Id Usuario',
            'idLogin' => 'Id Login',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogin0()
    {
        return $this->hasOne(Login::className(), ['idLogin' => 'idLogin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogin1()
    {
        return $this->hasOne(Login::className(), ['idLogin' => 'idLogin', 'idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
