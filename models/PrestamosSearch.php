<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestamos;

/**
 * PrestamosSearch represents the model behind the search form of `app\models\Prestamos`.
 */
class PrestamosSearch extends Prestamos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPrestamos', 'Usuarios_idusuario'], 'integer'],
            [['fechaprestamo', 'fechadevolucion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Prestamos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPrestamos' => $this->idPrestamos,
            'Usuarios_idusuario' => $this->Usuarios_idusuario,
        ]);

        $query->andFilterWhere(['like', 'fechaprestamo', $this->fechaprestamo])
            ->andFilterWhere(['like', 'fechadevolucion', $this->fechadevolucion]);

        return $dataProvider;
    }
}
