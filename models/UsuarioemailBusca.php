<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarioemail;

/**
 * UsuarioemailBusca represents the model behind the search form about `app\models\Usuarioemail`.
 */
class UsuarioemailBusca extends Usuarioemail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'email'], 'safe'],
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
        $query = Usuarioemail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('usuario');
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'usuario.nome', $this->idUsuario]);

        return $dataProvider;
    }
}
