<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Login;

/**
 * LoginBusca represents the model behind the search form about `app\models\Login`.
 */
class LoginBusca extends Login
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLogin', 'nivel', 'ativo'], 'integer'],
            [['idUsuario', 'usuario', 'senha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Login::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idLogin' => $this->idLogin,
            'nivel' => $this->nivel,
            'ativo' => $this->ativo,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
              ->andFilterWhere(['like', 'senha', $this->senha])
              ->andFilterWhere(['like', 'usuario.nome', $this->idUsuario]);

        return $dataProvider;
    }
}
