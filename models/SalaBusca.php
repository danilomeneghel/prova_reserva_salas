<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sala;

/**
 * SalaBusca represents the model behind the search form about `app\models\Sala`.
 */
class SalaBusca extends Sala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSala', 'nro_sala', 'tipo', 'ativo'], 'integer'],
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
        $query = Sala::find();

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
            'idSala' => $this->idSala,
            'nro_sala' => $this->nro_sala,
            'tipo' => $this->tipo,
            'ativo' => $this->ativo,
        ]);

        $query->andFilterWhere(['=', 'nro_sala', $this->nro_sala])
              ->andFilterWhere(['=', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
