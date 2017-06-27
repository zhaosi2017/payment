<?php

namespace app\modules\home\models;

//use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
//use app\modules\home\models\PayCompany;

/**
 * PayCompanySearch represents the model behind the search form about `app\modules\home\models\PayCompany`.
 */
class PayCompanySearch extends PayCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pay_channel_id', 'is_license', 'status'], 'integer'],
            [['name', 'grade', 'control_user'], 'safe'],
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
        $query = PayCompany::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pay_channel_id' => $this->pay_channel_id,
            'is_license' => $this->is_license,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'control_user', $this->control_user]);

        return $dataProvider;
    }
}
