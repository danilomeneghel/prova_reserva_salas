<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $nome
 * @property string $sexo
 * @property integer $ativo
 * @property string $dataCriacao
 *
 * @property Dre[] $dres
 * @property UsuarioEmail[] $usuarioEmails
 * @property Login[] $logins
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rs_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sexo'], 'required'],
            [['ativo'], 'integer'],
            [['dataCriacao'], 'safe'],
            [['nome', 'setor', 'cargo'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'cargo' => 'Cargo',
            'setor' => 'Setor',
            'ativo' => 'Ativo',
            'dataCriacao' => 'Data Criacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioEmails()
    {
        return $this->hasMany(Usuarioemail::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogins()
    {
        return $this->hasMany(Login::className(), ['idUsuario' => 'idUsuario']);
    }

}
