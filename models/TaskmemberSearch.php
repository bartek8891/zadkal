<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;
use dektrium\user\Finder;
use dektrium\user\helpers\Password;
use dektrium\user\traits\ModuleTrait;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;
/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */

class TaskmemberSearch extends Task
{
    use ModuleTrait;

    /** @var string User's email or username */
    public $login;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'task', 'description', 'date_b', 'date_e'], 'safe'],
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
        $query = Task::find();

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
            'date_b' => $this->date_b,
            'date_e' => $this->date_e,
            'username'=> Yii::$app->user->identity->username,
        ]);


        $query->andFilterWhere(['like', 'username',  $this->username])
            ->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'description', $this->description])

        ;

        return $dataProvider;
    }

}
