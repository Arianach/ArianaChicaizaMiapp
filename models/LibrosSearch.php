<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libros;

/**
 * LibrosSearch represents the model behind the search form of `app\models\Libros`.
 */
class LibrosSearch extends Libros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLibros', 'Autores_idautores', 'Categorias_idCategoria'], 'integer'],
            [['titulo', 'añopublicacion'], 'safe'],
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
        $query = Libros::find();

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
            'idLibros' => $this->idLibros,
            'añopublicacion' => $this->añopublicacion,
            'Autores_idautores' => $this->Autores_idautores,
            'Categorias_idCategoria' => $this->Categorias_idCategoria,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo]);

        return $dataProvider;
    }
}
