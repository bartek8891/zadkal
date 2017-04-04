<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $username
 * @property string $task
 * @property string $description
 * @property string $date_b
 * @property string $date_e
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'task', 'description', 'date_b', 'date_e'], 'required'],
            [['date_b', 'date_e'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['task', 'description'], 'string', 'max' => 100],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'task' => 'Task',
            'description' => 'Description',
            'date_b' => 'START',
            'date_e' => 'END',
        ];
    }
}
