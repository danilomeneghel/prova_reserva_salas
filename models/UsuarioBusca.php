<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioBusca represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioBusca extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'ativo'], 'integer'],
            [['nome', 'sexo', 'cargo', 'setor', 'dataCriacao'], 'safe'],
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
        $query = Usuario::find();

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
            'idUsuario' => $this->idUsuario,
            'nome' => $this->nome,
            'cargo' => $this->cargo,
            'setor' => $this->setor,
            'ativo' => $this->ativo,
            'dataCriacao' => $this->dataCriacao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
                ->andFilterWhere(['like', 'cargo', $this->cargo])
                ->andFilterWhere(['like', 'setor', $this->setor]);

        return $dataProvider;
    }
}
