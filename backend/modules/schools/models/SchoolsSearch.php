<?php
namespace backend\modules\schools\models;

use yii\data\ActiveDataProvider;

class SchoolsSearch extends Schools
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'name', 'number', 'active', 'country', 'city', 'state', 'street'], 'safe'],

            [['name', 'phone', 'country', 'city', 'state', 'street', 'email'], 'string'],

            [['owner_id', 'number', 'active'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Schools::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'active' => $this->active,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}