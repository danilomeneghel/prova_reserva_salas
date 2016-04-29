<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rs_login".
 *
 * @property integer $idLogin
 * @property integer $idUsuario
 * @property string $usuario
 * @property string $senha
 * @property integer $nivel
 * @property integer $ativo
 *
 * @property UsuarioAcesso $usuarioAcesso
 * @property Usuario $idUsuario0
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'usuario', 'senha', 'nivel'], 'required'],
            [['idUsuario', 'nivel', 'ativo'], 'integer'],
            [['usuario', 'senha'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLogin' => 'Login',
            'idUsuario' => 'Usuario',
            'usuario' => 'Usuario',
            'senha' => 'Senha',
            'nivel' => 'Nivel',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioAcesso()
    {
        return $this->hasOne(UsuarioAcesso::className(), ['idLogin' => 'idLogin', 'idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
