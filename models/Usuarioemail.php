<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_email".
 *
 * @property integer $idUsuarioEmail
 * @property integer $idUsuario
 * @property string $email
 *
 * @property Usuario $idUsuario0
 */
class Usuarioemail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_usuario_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'email'], 'required'],
            [['idUsuario'], 'integer'],
            [['email'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuarioEmail' => 'Usuario Email',
            'idUsuario' => 'Usuario',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
