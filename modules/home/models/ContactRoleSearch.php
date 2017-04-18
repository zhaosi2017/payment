<?php

namespace app\modules\home\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ContactRoleSearch represents the model behind the search form about `app\modules\home\models\ContactRole`.
 */
class ContactRoleSearch extends ContactRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pay_company_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = ContactRole::find();

        $company_id = Yii::$app->request->get('company_id');
        if($company_id){
            $query->andWhere(['pay_company_id' => $company_id]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'pay_company_id' => $this->pay_company_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
